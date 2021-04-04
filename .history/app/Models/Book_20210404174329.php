<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps=false;
    use HasFactory;

    public function rate(){
        return $this->belongsToMany('App\User', 'rates', 'book_id', 'user_id')
        ->withPivot('id', 'rate', 'comment', 'created_at', 'user_id');
    }
}
