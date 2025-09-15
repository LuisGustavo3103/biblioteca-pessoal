<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\EditBookRequest;
use App\Models\Book;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $searchTitle = $request->input('title');
        $searchGenero = $request->input('gender');

        $books = Book::query()
            ->when($searchTitle, function ($query) use ($searchTitle) {
                $query->where('title', 'like', '%' . $searchTitle . '%');
            })
            ->when($searchGenero, function ($query) use ($searchGenero) {
                $query->where('gender', 'like', '%' . $searchGenero . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(6);

        return view('books.index', [
            'books' => $books
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(BookRequest $request)
    {
        $filePath = Storage::disk('public')->put('books', $request->file('image'));

        $incommingFields = $request->validated();

        try {
            Book::create([
                'title' => data_get($incommingFields, 'title'),
                'author' => data_get($incommingFields, 'author'),
                'isbn' => data_get($incommingFields, 'isbn'),
                'publisher' => data_get($incommingFields, 'publisher'),
                'gender' => data_get($incommingFields, 'gender'),
                'sinopse' => data_get($incommingFields, 'sinopse'),
                'image' => $filePath,
                'publish_year' => data_get($incommingFields, 'publish_year')
            ]);
        } catch (Exception $e) {
            Log::error($e);

            return redirect()->route('books.create')->with('error', 'Não foi possível cadastrar este livro!');
        }

        return redirect()->route('books.index')->with('sucess', 'Livro cadastrado com sucesso!');
    }

    public function edit(Book $book)
    {
        return view('books.edit', [
            'book' => $book
        ]);
    }

    public function update(EditBookRequest $request, Book $book)
    {
        $incommingFields = $request->validated();
        $filePath = $book->image ?? null;

        if ($request->file('image')) {
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }
            $filePath = Storage::disk('public')->put('books', $request->file('image'));
        }

        try {
            $book->update([
                'title' => data_get($incommingFields, 'title'),
                'author' => data_get($incommingFields, 'author'),
                'publisher' => data_get($incommingFields, 'publisher'),
                'gender' => data_get($incommingFields, 'gender'),
                'sinopse' => data_get($incommingFields, 'sinopse'),
                'publish_year' => data_get($incommingFields, 'publish_year'),
                'image' => $filePath
            ]);
        } catch (Exception $e) {
            Log::error($e);

            return redirect()->route('books.create')->with('error', 'Não foi possível cadastrar este livro!');
        }

        return redirect()->route('books.index')->with('sucess', 'Livro alterado com sucesso!');
    }

    public function show(Book $book)
    {
        return view('books.show', [
            'book' => $book
        ]);
    }
}
