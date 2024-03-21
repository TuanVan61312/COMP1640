<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    protected $guarded=[];

    public function faculty(){
        return $this->hasOne(Faculty::class, 'id', 'faculty_id');
    }
}
