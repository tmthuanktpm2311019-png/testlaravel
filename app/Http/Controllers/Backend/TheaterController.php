<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Theater;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    public function index()
    {
        $theaters = Theater::all();
        return view('backend.theaters.index', compact('theaters'));
    }

    public function create()
    {
        return view('backend.theaters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'total_screens' => 'required|integer',
        ]);

        Theater::create($request->all());

        return redirect()->route('theaters.index')
                         ->with('success', 'Theater created successfully.');
    }

    public function edit($id)
    {
        $theater = Theater::findOrFail($id);
        return view('backend.theaters.edit', compact('theater'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'total_screens' => 'required|integer',
        ]);

        $theater = Theater::findOrFail($id);
        $theater->update($request->all());

        return redirect()->route('theaters.index')
                         ->with('success', 'Theater updated successfully.');
    }

    public function destroy($id)
    {
        $theater = Theater::findOrFail($id);
        $theater->delete();

        return redirect()->route('theaters.index')
                         ->with('success', 'Theater deleted successfully.');
    }
}
