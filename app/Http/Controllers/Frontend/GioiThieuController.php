<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GioiThieuController extends Controller
{
    // action index
    public function index(){
        $row1 = [
            'stt'=> '1',
            'phuong_thuc'=>'email',
            'gia_tri'=>'thienthuan200@gmail.com'
        ];
        $row2 = [
            'stt'=> '2',
            'phuong_thuc'=>'Số điện thoại',
            'gia_tri'=>'033 502 7881'
        ];
        $row3 = [
            'stt'=> '3',
            'phuong_thuc'=>'email',
            'gia_tri'=>'thienthuan203@gmail.com'
        ];
        $ds_lienlac = [ $row1, $row2, $row3];
        return view('frontend.gioi-thieu')->with('ds_lienlac', $ds_lienlac);
    }
}
