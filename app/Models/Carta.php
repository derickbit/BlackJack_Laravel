<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    protected $fillable = ['id','numero','naipe'];

    protected $primaryKey = 'id';
}
