<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seats';
    protected $fillable = [
        'seat_number', 'room_id', 'seat_type',
    ];
    protected $guarded = ['seat_id'];
    protected $primaryKey = 'seat_id';
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s';
    //một ghế thuộc về một phòng
    public function room() {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }   
    //Một ghế có nhiều trạng thái ghế
    public function seatStatuses() {
        return $this->hasMany(SeatStatus::class, 'seat_id', 'seat_id');
    }
}