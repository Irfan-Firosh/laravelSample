<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contacts() {
        return $this->hasMany(Contacts::class , 'organization' , 'name');
    }
}
