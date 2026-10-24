<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * One room inspection record (table: room_checks).
 *
 * Columns: room_id, student_id, student_name — all typed by hand, with no
 * link to real rooms or students yet.
 */
class RoomCheck extends Model
{
    protected $fillable = ['room_id', 'student_id', 'student_name'];
}