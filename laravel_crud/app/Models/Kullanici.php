<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kullanici extends Model
{
    use HasFactory;
    protected $fillable=['name','surname','email','address'];
    public function company()
    {
        return $this->hasMany('App\Models\Company');
    }
    
}
