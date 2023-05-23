<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'email',
        'date',
        'comment',
        'daycare_id',];
 public function daycare()
    {
        return $this->belongsToMany(Daycare::class);
    }

}
