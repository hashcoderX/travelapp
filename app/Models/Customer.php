<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\Contracts\HasApiTokens;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";

    public $timestamps = false;
}
