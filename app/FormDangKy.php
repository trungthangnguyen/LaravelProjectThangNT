<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormDangKy extends Model
{
	protected $table = 'form_dangky';
	protected $fillable = ['id','ten_mon_hoc','gia_tien','ten_giang_vien','images'];
}
