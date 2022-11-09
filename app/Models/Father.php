<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'amount', 'description', 'confirmed'];

    public function children(){
        return $this->hasMany('App\Models\Child');
    }
}
