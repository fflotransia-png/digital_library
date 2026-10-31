<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        return response()->json(Publisher::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $publisher = Publisher::create($request->only('name'));

        return response()->json($publisher, 201);
    }

    public function show(string $id)
    {
        $publisher = Publisher::findOrFail($id);

        return response()->json($publisher, 200);
    }

    public function update(Request $request, string $id)
    {
        $publisher = Publisher::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $publisher->update($request->only('name'));

        return response()->json($publisher, 200);
    }

    public function destroy(string $id)
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();

        return response()->json([
            'message' => 'Data penerbit berhasil dihapus'
        ], 200);
    }
}
