<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    protected $table = 'showtimes';
    protected $fillable = [
        'movie_id', 'room_id', 'show_date', 'start_time', 'price'
    ];
    protected $guarded = ['showtime_id'];
    protected $primaryKey = 'showtime_id';
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s';

    // Một suất chiếu thuộc về một phim
    public function movie() {
        return $this->belongsTo(Movie::class, 'movie_id', 'movie_id');
    }
    // Một suất chiếu thuộc về một phòng
    public function room() {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }
    // Một suất chiếu có nhiều vé
    public function tickets() {
        return $this->hasMany(Ticket::class, 'showtime_id', 'showtime_id');
    }
    // Một suất chiếu có nhiều trạng thái ghế
    public function seatStatuses() {
        return $this->hasMany(SeatStatus::class, 'showtime_id', 'showtime_id');
    }
}
