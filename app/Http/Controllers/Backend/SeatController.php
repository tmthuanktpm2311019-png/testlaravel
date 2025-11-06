<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use App\Models\Room;
use App\Models\Theater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeatController extends Controller
{
    public function index(Request $request)
    {
        $theater_id = $request->get('theater_id');
        $room_id = $request->get('room_id');

        // Lấy danh sách rạp và phòng để filter
        $theaters = Theater::all();
        $rooms = Room::when($theater_id, function ($query, $theater_id) {
            return $query->where('theater_id', $theater_id);
        })->get();

        // Truy vấn danh sách ghế, có thể lọc theo rạp/phòng
        $seats = Seat::with(['room.theater'])
            ->when($room_id, fn($q) => $q->where('room_id', $room_id))
            ->when($theater_id, fn($q) => $q->whereHas('room', fn($r) => $r->where('theater_id', $theater_id)))
            ->orderBy('seat_id', 'asc')
            ->paginate(10)
            ->appends($request->query()); // giữ tham số khi phân trang

        return view('backend.seats.index', compact('seats', 'rooms', 'theaters', 'theater_id', 'room_id'));
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
            'seat_number' => 'required|string|max:10',
            'seat_type' => 'required|in:standard,vip',
        ]);

        Seat::create($request->all());

        return redirect()->route('seats.index')->with('success', 'Tạo ghế thành công.');
    }

    public function storeMultiple(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,room_id',
            'rows' => 'required|integer|min:1|max:26',
            'columns' => 'required|integer|min:1|max:50',
            'seat_type' => 'required|in:standard,vip',
        ]);

        $letters = range('A', 'Z');
        $data = [];
        $room_id = $request->room_id;

        for ($i = 0; $i < $request->rows; $i++) {
            for ($j = 1; $j <= $request->columns; $j++) {
                $data[] = [
                    'room_id' => $room_id,
                    'seat_number' => $letters[$i] . $j,
                    'seat_type' => $request->seat_type,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::transaction(function () use ($data) {
            Seat::insert($data);
        });

        return redirect()->route('seats.index')->with('success', 'Tạo nhiều ghế thành công.');
    }

    public function edit($id)
    {
        $seat = Seat::with('room.theater')->findOrFail($id);
        $rooms = Room::with('theater')->get();
        return view('backend.seats.edit', compact('seat', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,room_id',
            'seat_number' => 'required|string|max:10',
            'seat_type' => 'required|in:standard,vip',
        ]);

        $seat = Seat::findOrFail($id);
        $seat->update($request->only(['room_id', 'seat_number', 'seat_type']));

        return redirect()->route('seats.index')->with('success', 'Cập nhật ghế thành công.');
    }

    public function destroy($id)
    {
        $seat = Seat::findOrFail($id);
        $seat->delete();
        return redirect()->route('seats.index')->with('success', 'Xóa ghế thành công.');
    }
}
