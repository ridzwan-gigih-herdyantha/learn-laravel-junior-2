<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Event
    // protected static function booted()
    // {
    //     static::created(function ($product) {
    //         ProductLogActivity::create([
    //             'description' => 'create product '.$product->name
    //         ]);
    //     });
    // }

}   
