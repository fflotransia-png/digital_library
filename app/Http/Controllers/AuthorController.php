<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return response()->json(Author::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = Author::create($request->only('name'));

        return response()->json($author, 201);
    }

    public function show(string $id)
    {
        $author = Author::findOrFail($id);

        return response()->json($author, 200);
    }

    public function update(Request $request, string $id)
    {
        $author = Author::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update($request->only('name'));

        return response()->json($author, 200);
    }

    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json([
            'message' => 'Data penulis berhasil dihapus'
        ], 200);
    }
}
