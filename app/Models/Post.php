<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function category(){
        return $this->belongsToMany(Category::class,'category_posts');
    }
    public function comment(){
        return $this->hasMany(Comment::class,'post_id','id');
    }
   
}
