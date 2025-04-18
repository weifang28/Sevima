<?php

namespace App\Models; // Ensure this matches the file location

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'posts';

    // protected $fillable = [
    //     'username',
    //     'password',
    //     'datecreated',
    //     'datadel',
    // ];

    public $timestamps = false;
}
