<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
   protected $table = 'files';

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'size',
        'daycare_id',


    ];

    use HasFactory;
    public function daycare()
    {
        return $this->belongsToMany(Daycare::class);
    }
    
}