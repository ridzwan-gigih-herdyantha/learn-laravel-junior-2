<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLogActivity extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    // protected $table = 'hahaha'; //rollback on error

}
