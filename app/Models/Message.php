<?php
// app/Models/Message.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
    // Engedélyezzük a tömeges hozzárendelést (nev, email, uzenet)
    protected $fillable = [
        'nev',
        'email',
        'uzenet',
    ];
}