<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrockphotographyPhoto extends Model
{
    protected $fillable = [
        'name',
        'image',
        'imageLarge',
        'description',
        'price',
        'CategoryId',
        'Height',
        'Width',
        'Aperture',
        'Exposer',
        'ISO',
        'FocalLength'
    ];
}
