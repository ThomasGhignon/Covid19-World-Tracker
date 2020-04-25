<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infected extends Model
{
    protected $table = 'infected';

    protected $fillable = ['firstName', 'lastName', 'birthday', 'gender', 'phone', 'email', 'country', 'address'];
}
