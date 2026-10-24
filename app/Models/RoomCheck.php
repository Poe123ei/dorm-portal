<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCheck extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'student_id', 'student_name'];
}
