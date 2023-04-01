<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'avatar',
        'user_id',
        'blood_group',
        'profession',
        'bio',
    ];

    // One to one relationship
    public function user(){
        return $this->belongsTo(User::class);
    }
}
