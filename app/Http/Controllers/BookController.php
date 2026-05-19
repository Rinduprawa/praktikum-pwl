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
        $data = $request->except('cover');

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Book::create($data);
        return redirect('/books');
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $data = $request->except('cover');

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $book->update($data);
        return redirect('/books');
    }

    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect('/books');
    }
}
