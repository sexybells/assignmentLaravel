<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    public function admin() {
        return $this->belongsTo('App\User', 'user_id', 'id'); //lấy dữ liệu user thông qua forienkey user_id
    }
}
