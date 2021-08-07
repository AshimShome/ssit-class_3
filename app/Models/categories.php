<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable=['user_id','name','slug','status'];
    public function posts(){
        return $this->hasMany(post::class,'post_id','id');


    }
}
