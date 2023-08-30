<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'color_palettes'; // Make sure this matches your table name
    protected $fillable = ['template_name', 'colors'];

    protected $casts = [
        'colors' => 'json', // Tell Eloquent to cast 'colors' column as JSON
    ];

}
