<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use App\Models\Room;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::with('room.theater')->get();
        return view('backend.seats.index', compact('seats'));
    }

    public function create()
    {
        $rooms = Room::with('theater')->get();
        return view('backend.seats.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,room_id',
            'seat_number' => 'required|integer',
            'seat_type' => 'required|in:standard,vip',
        ]);

        Seat::create($request->all());

        return redirect()->route('seats.index')
                         ->with('success', 'Seat created successfully.');
    }

    public function edit($id)
    {
        $seat = Seat::findOrFail($id);
        $rooms = Room::with('theater')->get();
        return view('backend.seats.edit', compact('seat', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,room_id',
            'seat_number' => 'required|integer',
            'seat_type' => 'required|in:standard,vip',
        ]);

        $seat = Seat::findOrFail($id);
        $seat->update($request->all());

        return redirect()->route('seats.index')
                         ->with('success', 'Seat updated successfully.');
    }

    public function destroy($id)
    {
        $seat = Seat::findOrFail($id);
        $seat->delete();

        return redirect()->route('seats.index')
                         ->with('success', 'Seat deleted successfully.');
    }
}
