<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeeSupply;
use Illuminate\Support\Str;
class CoffeeSupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coffeeSupplies = CoffeeSupply::latest()->paginate(10);
        return view('CoffeeSupplys.index', compact('coffeeSupplies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CoffeeSupplys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'coffee_id' => 'required|unique:coffee_supplies,coffee_id',
            'name' => 'required',
            'category' => 'required|in:Arabica,Robusta,Liberica',
            'quantity' => 'required|integer|min:1',
            'unit_of_measure' => 'required|in:kg,lbs,oz',
            'price' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['uuid'] = Str::uuid();

        CoffeeSupply::create($data);

        return redirect()->route('CoffeeSupplys.index')->with('success', 'Coffee supply created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coffeeSupply = CoffeeSupply::findOrFail($id);
        return view('CoffeeSupplys.show', compact('coffeeSupply'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coffeeSupply = CoffeeSupply::findOrFail($id);
        return view('CoffeeSupplys.edit', compact('coffeeSupply'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required|in:Arabica,Robusta,Liberica',
            'quantity' => 'required|integer|min:1',
            'unit_of_measure' => 'required|in:kg,lbs,oz',
            'price' => 'required|numeric|min:0',
        ]);

        $coffeeSupply = CoffeeSupply::findOrFail($id);
        $coffeeSupply->update($request->all());

        return redirect()->route('CoffeeSupplys.index')->with('success', 'Coffee supply updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coffeeSupply = CoffeeSupply::findOrFail($id);
        $coffeeSupply->delete();

        return redirect()->route('CoffeeSupplys.index')->with('success', 'Coffee supply deleted successfully.');
    }
}
