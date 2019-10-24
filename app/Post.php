<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $talbe = "posts";

    public function admin() {
        return $this->belongsTo('App\User', 'user_id', 'id'); //lấy dữ liệu user thông qua forienkey user_id
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id'); //lấy dữ liệu user thông qua forienkey user_id
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id', 'id'); //lấy dữ liệu category thông qua forienkey category_id
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'post_id', 'id'); //lấy dữ liệu comment của post
    }
}
