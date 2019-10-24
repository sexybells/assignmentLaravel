<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id'); //lấy dữ liệu user thông qua forienkey user_id
    }

    public function post() {
        return $this->belongsTo('App\Post', 'post_id', 'id'); //lấy dữ liệu post thông qua forienkey category_id
    }
}
