<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about';

    protected $fillable = [
        'title1',
        'description1',
        'image1',
        'title2',
        'description2',
        'image2',
        'card_title',
        'card_description',
        'card_image',
        'card_title1',
        'card_description1',
        'card_image1',
        'card_title2',
        'card_description2',
        'card_image2'
    ];
}
