<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Service;

class Material extends Model
{
    use HasFactory;
    protected $table = 'materials';
    protected $primaryKey = 'id';
    protected $fillable = ['reference','name','description','price','nbItems','status'];  

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
