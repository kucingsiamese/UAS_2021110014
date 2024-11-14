<?php

namespace App\Http\Controllers;


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
        Returns::with('loan')->get();
        $returns = Returns::all();
        return view('returns.index', compact('returns'));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Returns $return)
    {
        $return->delete();
        return redirect()->route('returns.index')->with('success', 'Return deleted successfully');
    }
}
