<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostEvent extends Model
{
    use HasFactory;

    protected $table = 'post_events';

    protected $fillable = [
        'user_id',
        'title',
        'description',
    ];

    //  // One to Many with PostEvent
    //  public function user(){
    //     return $this->belongsTo(User::class);
    // }
}
