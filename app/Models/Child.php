<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Child extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'url', 'father_id'];

    public function father(){
        return $this->belongsTo('App\Models\Father');
    }

}
