<?php

namespace App\Http\Controllers;

use App\Enums\LendStatusEnum;
use App\Http\Requests\LendResquest;
use App\Models\Book;
use App\Models\Lend;
use App\Models\Person;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class LendController extends Controller
{
    public function index(Request $request)
    {
        $searchEmail = $request->input('email');

        $lends = Lend::query()
            ->when($searchEmail, function ($query) use ($searchEmail) {
                $query->where('email', 'like', '%' . $searchEmail . '%');
            })
            ->orderByDesc('returne_date')
            ->paginate(6);

        return view('lends.index', [
            'lends' => $lends
        ]);
    }

    public function create()
    {
        $books = Book::get();
        $persons = Person::get();

        return view('lends.create', [
            'books' => $books,
            'persons' => $persons
        ]);
    }

    public function store(LendResquest $request)
    {
        $incommingFields = $request->validated();

        Lend::create([
            'book_id' => data_get($incommingFields, 'book_id'),
            'person_id' => data_get($incommingFields, 'person_id'),
            'loan_date' => now(),
            'expected_return_date' => data_get($incommingFields, 'expected_return_date'),
            'status' => LendStatusEnum::IN_PROGRESS->value,
            'description' => data_get($incommingFields, 'description', null)
        ]);

        return redirect()->route('lends.index')->with('sucess', 'Livro reservado com sucesso!');
    }

    public function edit()
    {
        return view('lends.edit');
    }
}
