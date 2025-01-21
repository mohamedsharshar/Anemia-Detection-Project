<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorycenter extends Model
{
    use HasFactory;
    protected $table = 'categories_center';
    protected $primaryKey = 'id';
    protected $fillable = ['categoryName'];

    public function centers()
    {
        return $this->hasMany(Center::class);
    }
    
}
