<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SeatStatus;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $primaryKey = 'ticket_id';

    protected $fillable = [
        'user_id', 'showtime_id', 'total', 'booking_time', 'status', 'payment_method'
    ];

    protected $guarded = ['ticket_id'];
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s';

    // Một vé thuộc về một user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Một vé thuộc về một suất chiếu
    public function showtime()
    {
        return $this->belongsTo(ShowTime::class, 'showtime_id', 'showtime_id');
    }

    // Một vé có nhiều chi tiết vé
    public function ticketItems()
    {
        return $this->hasMany(TicketItem::class, 'ticket_id', 'ticket_id');
    }

    // Khi xóa vé thì tự động xóa ticketItems và cập nhật ghế
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($ticket) {
            foreach ($ticket->ticketItems as $item) {
                // Trả ghế về trạng thái "available"
                SeatStatus::where('seat_id', $item->seat_id)
                    ->where('showtime_id', $ticket->showtime_id)
                    ->update(['status' => 'available']);
            }

            // Xóa chi tiết vé
            $ticket->ticketItems()->delete();
        });
    }
}
