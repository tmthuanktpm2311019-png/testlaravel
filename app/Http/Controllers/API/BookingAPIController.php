<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theater;
use App\Models\Movie;
use App\Models\ShowTime;
use App\Models\Seat;

class BookingAPIController extends Controller
{
    public function theaters()
    {
        $theaters = Theater::all();
        return response()->json($theaters);
    }

    public function movies(Request $request)
    {
        $theater_id = $request->query('theater_id');
        $movies = Movie::whereHas('showtimes.room', function ($q) use ($theater_id) {
            $q->where('theater_id', $theater_id);
        })->get();

        return response()->json($movies);
    }

    public function showtimes(Request $request)
    {
    $movie_id = $request->query('movie_id');
    $theater_id = $request->query('theater_id');
    $date = $request->query('date'); // có thể null

    $query = \App\Models\ShowTime::with('room')
        ->where('movie_id', $movie_id)
        ->whereHas('room', function ($q) use ($theater_id) {
            $q->where('theater_id', $theater_id);
        });

    if ($date) {
        $query->where('show_date', $date);
    }

    $showtimes = $query->orderBy('show_date')->orderBy('start_time')->get();

    return response()->json($showtimes);
    }


    public function seats(Request $request)
    {
        $showtime_id = $request->query('showtime_id');

        $showtime = ShowTime::with('room.seats')->findOrFail($showtime_id);
        $seats = $showtime->room->seats->map(function ($seat) use ($showtime) {
            $occupied = $seat->seatStatuses()->where('showtime_id', $showtime->showtime_id)->exists();
            return [
                'seat_id' => $seat->seat_id,
                'seat_number' => $seat->seat_number,
                'seat_type' => $seat->seat_type,
                'price' => $seat->seat_type === 'vip' ? 100000 : 75000,
                'occupied' => $occupied,
            ];
        });

        return response()->json($seats);
    }
}
