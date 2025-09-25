<?php

namespace App\Http\Controllers;

use App\Enums\BookStatusEnum;
use App\Enums\LendStatusEnum;
use App\Http\Requests\LendResquest;
use App\Jobs\LendReminder;
use App\Models\Book;
use App\Models\Lend;
use App\Models\Person;
use Exception;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class LendController extends Controller
{
    public function index(Request $request)
    {
        $searchEmail = $request->input('email');

        $lends = Lend::query()
            ->when($searchEmail, function ($query) use ($searchEmail) {
                $query->where('email', 'like', '%' . $searchEmail . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(9);

        return view('lends.index', [
            'lends' => $lends
        ]);
    }

    public function create()
    {
        $books = Book::query()
            ->whereDoesntHave('lends', function ($query) {
                $query->where('status', LendStatusEnum::IN_PROGRESS->value);
            })
            ->with('lends')
            ->get();

        $persons = Person::get();

        return view('lends.create', [
            'books' => $books,
            'persons' => $persons
        ]);
    }

    public function store(LendResquest $request)
    {
        $incommingFields = $request->validated();

        $lend = Lend::create([
            'book_id' => data_get($incommingFields, 'book_id'),
            'person_id' => data_get($incommingFields, 'person_id'),
            'loan_date' => now(),
            'expected_return_date' => data_get($incommingFields, 'expected_return_date'),
            'status' => LendStatusEnum::IN_PROGRESS->value,
            'description' => data_get($incommingFields, 'description', null)
        ]);

        $book = Book::findOrFail($lend->book_id);
        $book->status = BookStatusEnum::BORROWED->value;
        $book->save();

        $person = Person::findOrFail($lend->person_id);

        dispatch(new LendReminder($person->email))->delay($lend->expected_return_date->subDay(1));

        return redirect()->route('lends.index')->with('sucess', 'Livro reservado com sucesso!');
    }

    public function update(Lend $lend)
    {
        abort_if($lend->status != LendStatusEnum::IN_PROGRESS, 403);

        try{
            $lend->update([
                'status' => LendStatusEnum::FINISHED->value,
                'returne_date' => now(),
            ]);
            
            return redirect()->back()->with('sucess', 'Devolução realizada!');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Erro ao realizar devolução!');
        }
    }
}
