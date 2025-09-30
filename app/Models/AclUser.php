<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AclUser extends Model
{
    protected $table = 'acl_users';
    //Cột được phép cập nhật
    protected $fillable= [
        '$username', '$password', '$full_name',
        '$email', '$phone', '$birthday', '$gender',
        '$avatar', '$status', '$remember_token', '$active_code'
    ];
    //Cột không được phép cập nhật
    protected $guarded = ['id'];
    //Cột khóa chính
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s';

    //Một user có nhiều vé:
    public function tickets() {
        return $this->hasMany(Ticket::class, 'user_id', 'id');
    }
    //Một user có nhiều trạng thái ghế
    public function seatStatuses() {
        return $this->hasMany(SeatStatus::class, 'user_id', 'id');
}
}
