<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'judul' => 'required',
        //     'penulis' => 'required',
        //     'tahun' => 'required|integer',
        // ]);
        Book::create($request->all());
        return redirect('/books');
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->update($request->all());
        return redirect('/books');
    }

    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect('/books');
    }
}
