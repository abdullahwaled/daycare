<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $table = 'timetable';

    protected $fillable = [
        'day',
        'start_time',
        'end_time',
        'room',
        'teacher',
        'subject',
        'class',
        'group',
        'daycare_id',
    ];

    public function daycare()
    {
        return $this->belongsTo(Daycare::class, 'daycare_id');
    }
}
