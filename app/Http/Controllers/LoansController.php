<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $loans = Loan::with(['book', 'user'])->get();
        $books = Book::all();
        return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        $users = User::all();
        return view('loans.create', compact('books', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
            'loan_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:loan_date',
        ]);

        $book = Book::findOrFail($request->book_id);

        // Cek ketersediaan buku
        if ($book->quantity < $request->quantity) {
            return redirect()->back()->withErrors('Not enough books available for this loan.');
        }
        // Mengurangi jumlah buku yang tersedia jika dipinjam
        $book->quantity -= $request->quantity;
        $book->save();

        //Transaksi peminjaman
        Loan::create($request->all());
        return redirect()->route('loans.index')->with('success', 'Loan created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        return view('loans.show', compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        $books = Book::all();
        $users = User::all();
        return view('loans.edit', compact('loan', 'books', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
            'loan_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:loan_date',
        ]);

        $book = Book::findOrFail($request->book_id);

        // Kembalikan jumlah buku yang dipinjam sebelumnya
        $book->quantity += $loan->quantity;

        // Cek ketersediaan untuk update jumlah buku
        if ($book->quantity < $request->quantity) {
        return redirect()->back()->withErrors('Not enough books available for this update.');
    }

        // Kurangi jumlah buku yang baru dipinjam
        $book->quantity -= $request->quantity;
        $book->save();

    //    $loan->update($request->all());
    //    return redirect()->route('loans.index')->with('success', 'Loan updated successfully');

        // Update transaksi peminjaman
        $loan->update([
        'user_id' => $request->user_id,
        'book_id' => $request->book_id,
        'quantity' => $request->quantity,
        'loan_date' => $request->loan_date,
        'due_date' => $request->due_date,
    ]);

        return redirect()->route('loans.index')->with('success', 'Loan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index')->with('success', 'Loan deleted successfully');
    }
}
