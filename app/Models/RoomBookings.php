<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBookings extends Model
{
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
