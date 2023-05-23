<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $table = 'classrooms';

    protected $fillable = [
        'name',
        'daycare_id',
        'teacher_id',
    ];

    public function daycare()
    {
        return $this->belongsTo(Daycare::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
