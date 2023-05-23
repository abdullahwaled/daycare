<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
   protected $fillable = [
        'image',
        'daycare_id',
    ];

    public function daycare()
    {
        return $this->belongsTo(Daycare::class);
    }
    }

