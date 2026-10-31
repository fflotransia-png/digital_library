<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // GET: Menampilkan semua data
    public function index()
    {
        return response()->json(Member::all(), 200);
    }

    // POST: Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'phone' => 'required',
        ]);

        $member = Member::create($request->all());
        return response()->json($member, 201);
    }

    // GET: Menampilkan detail data berdasarkan ID
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return response()->json($member, 200);
    }

    // PUT: Memperbarui data
    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $member->update($request->all());
        return response()->json($member, 200);
    }

    // DELETE: Menghapus data

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return response()->json([
            'message' => 'Data anggota berhasil dihapus'
        ], 200);
    }

}