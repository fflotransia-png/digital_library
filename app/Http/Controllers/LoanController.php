<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    // Menampilkan semua data peminjaman
    public function index()
    {
        return response()->json(Loan::all(), 200);
    }

    // Menambahkan data peminjaman
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:loan_date',
        ]);

        $loan = Loan::create($validated);

        return response()->json($loan, 201);
    }

    // Menampilkan satu data peminjaman
    public function show(string $id)
    {
        $loan = Loan::findOrFail($id);

        return response()->json($loan, 200);
    }

    // Mengubah data peminjaman
    public function update(Request $request, string $id)
    {
        $loan = Loan::findOrFail($id);

        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:loan_date',
        ]);

        $loan->update($validated);

        return response()->json($loan, 200);
    }

    // Menghapus data peminjaman
    public function destroy(string $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();

        return response()->json([
            'message' => 'Data peminjaman berhasil dihapus'
        ], 200);
    }
}
