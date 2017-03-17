<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'News';
    protected $fillable = ['title', 'cate_id', 'sapo', 'content'];
    protected $hidden = ['create_at','update_at'];
}
