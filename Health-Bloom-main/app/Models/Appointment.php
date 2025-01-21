<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Specialist;

class Appointment extends Model
{
    use HasFactory;
    //use Notifiable;
    public function client()
    {
        return $this->belongsTo(User::class);
    }
    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }
}
