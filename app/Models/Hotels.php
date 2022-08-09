<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    
    protected $table = "hotels";

    public $timestamps = false;
    
    use HasFactory;
}
