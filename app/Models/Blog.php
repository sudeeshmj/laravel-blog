<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $fillable = ['user_id','title','content','image','postdate'];
    public function getPostdateAttribute($value){
        return date('d-m-Y', strtotime($value));
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
