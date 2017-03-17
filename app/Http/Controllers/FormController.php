<?php

namespace App\Http\Controllers;

use App\FormDangKy;
use App\Http\Requests\FormDangKyRequest;

//use Validator; // them thang nay vao de check
class FormController extends Controller
{
    public function them(FormDangKyRequest $request)
    {

        $img                    = $request->file('fImages');
        $imgName                = $img->getClientoriginalName(); // lay ten file
        $dangky                 = new FormDangKy(); // khoi tao doi tuong
        $dangky->ten_mon_hoc    = $request->txtMonHoc;
        $dangky->gia_tien       = $request->txtGiaTien;
        $dangky->ten_giang_vien = $request->txtGiangVien;
        $dangky->images         = $imgName;
        $dangky->save();
        $des = "public/Upload/Images"; // duong dan noi chua hinh up len
        $img->move($des, $imgName); // day anh len folder co duong dan $des

        // lay gia tri va echo ra
        // echo $request->txtMonHoc . "<br>"; // lay du lieu ten mon hoc voi name=txtMonHoc
        // echo $request->txtGiaTien . "<br>"; // lay du lieu ten gia tien voi name=txtGiaTien
        // echo $request->txtGiangVien . "<br>"; // lay du lieu ten giang vien voi name=txtGiangVien
        return redirect('/'); // điều hướng lại trang chủ
        return $request->file('fImages');
        // echo "<pre>";
        // echo "Ten hinh: ".$request->file('fImages')->getClientoriginalName()."<br>";
        // echo "Duong dan: ".$request->file('fImages')->getRealPath()."<br>";
        // //print_r($request->file('fImages'));
        // echo "</pre>";
        // upload hinh len

    }
}
