<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ['Analgesics', 'Antibiotics', 'Cardiovascular Drugs', 'Antidepressants', 'Gastrointestinal Agents'];
        $condition =     ['Available', 'Out of Stock'];

        return view('medicines.create', compact('categories', 'condition'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'medicine_name' => 'required',
            'generic_name' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'expiration_date' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        Medicine::create($request->all());

        return redirect()->route('medicines.index')->with('success', 'A medicine added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        return redirect()->route('medicines.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
    {
        $categories = ['Analgesics', 'Antibiotics', 'Cardiovascular Drugs', 'Antidepressants', 'Gastrointestinal Agents'];
        $condition =     ['Available', 'Out of Stock'];

        return view('medicines.edit', compact('medicine', 'categories', 'condition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            'medicine_name' => 'required',
            'generic_name' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            'expiration_date' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $medicine->update($request->all());

        return redirect()->route('medicines.index')->with('update', 'A medicine updated susccefully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()->route('medicines.index')->with('delete', 'A medicine deleted susccefully');
    }
}
