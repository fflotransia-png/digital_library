<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'stok' => 'required|integer|min:0',
            'publication_year' => 'nullable|integer',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
        ]);

        $book = Book::create($validated);

        return response()->json($book, 201);
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);

        return response()->json($book, 200);
    }

    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'stok' => 'required|integer|min:0',
            'publication_year' => 'nullable|integer',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
        ]);

        $book->update($validated);

        return response()->json($book, 200);
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json([
            'message' => 'Data buku berhasil dihapus'
        ], 200);
    }
}
