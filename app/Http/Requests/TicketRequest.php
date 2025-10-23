<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'showtime_id' => 'required|exists:showtimes,showtime_id',
            'seat_id' => 'required|exists:seats,seat_id',
            'price' => 'required|numeric|min:0',
            'booking_time' => 'sometimes|nullable|date',
            'status' => 'sometimes|nullable|in:pending,paid,cancelled',
        ];
    }
}
