<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    protected $table = 'theaters';
    protected $fillable = [
        'name', 'address', 'city', 'phone_number', 'email', 'total_screens'
    ];
    protected $guarded = ['theater_id'];
    protected $primaryKey = 'theater_id';
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s';
    //một rạp thuộc về một hệ thống rạp
    public function theaterSystem() {
        return $this->belongsTo(TheaterSystem::class, 'theater_systems_id', 'theater_systems_id');
    }
    //Một rạp có nhiều phòng
    public function rooms() {
        return $this->hasMany(Room::class, 'theater_id', 'theater_id');
    }
}