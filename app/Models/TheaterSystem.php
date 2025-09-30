<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheaterSystem extends Model
{
    protected $table = 'theater_systems';
    protected $fillable = [
        'name',
    ];
    protected $guarded = ['theater_systems_id'];
    protected $primaryKey = 'theater_systems_id';
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s';
    //Một hệ thống rạp có nhiều rạp
    public function theaters() {
        return $this->hasMany(Theater::class, 'theater_systems_id', 'theater_systems_id');
    }
}
