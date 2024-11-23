<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Returns;
use App\Models\Loan;
use Illuminate\Http\Request;

class ReturnsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Returns::with('loan')->get();
        //$returns = Returns::all();

        // Ambil semua data pinjaman yang sedang aktif
        $loans = Loan::where('status', 'borrowed')->get();
        return view('returns.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loans = Loan::all();
        return view('returns.create', compact('loans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'return_date' => 'required|date',
        ]);

        Returns::create($request->all());
        return redirect()->route('returns.index')->with('success', 'Return created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Returns $return)
    {
        return view('returns.show', compact('return'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Returns $return)
    {
        $loans = Loan::all();
        return view('returns.edit', compact('return', 'loans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Returns $return)
    {
        $request->validate([
            'loan_id' => 'required|exists:loans,id',
            'return_date' => 'required|date',
        ]);

        $return->update($request->all());
        return redirect()->route('returns.index')->with('success', 'Return updated successfully');
    }

    public function returnBook($id)
{
    $loan = Loan::find($id);

    if ($loan && $loan->status === 'borrowed') {
        // Kembalikan jumlah buku yang dipinjam ke stok
        $book = Book::find($loan->book_id);
        $book->quantity += $loan->quantity;
        $book->save();

        // Ubah status pinjaman menjadi dikembalikan
        $loan->status = 'returned';
        $loan->save();

        return redirect()->route('returns.index')->with('success', 'Book returned successfully.');
    }

    return redirect()->route('returns.index')->withErrors('Loan record not found or already returned.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Returns $return)
    {
        $return->delete();
        return redirect()->route('returns.index')->with('success', 'Return deleted successfully');
    }
}
