<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Center;
use App\Models\User;

class Center extends Model
{
    use HasFactory;


    public function feedbacks()
    {
        return $this->hasMany('App\Models\Feedback');
    }
    protected $table = 'centers';
    protected $primaryKey = 'id';
protected $fillable = ['name','description','address','email','phone','imagecenter'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
     public function categorycenter()
    {
        return $this->belongsTo(Categorycenter::class);
    }
    

}
