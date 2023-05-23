<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
   protected $fillable = [
    'name', 'email','password', 'phone_number', 'image', 'daycare_id', 'facebook', 'twitter', 'instagram'

];
protected $table = 'teachers';



    public function daycare()
    {
        return $this->belongsToMany(Daycare::class);
    }
}
