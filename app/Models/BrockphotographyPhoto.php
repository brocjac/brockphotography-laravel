<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrockphotographyPhoto extends Model
{
    protected $fillable = [
        'Title',
        'ImgSrc',
        'LargeImgSrc',
        'Alt',
        'PhotoValuePrice',
        'CategoryId',
        'Height',
        'Width'
    ];
}
