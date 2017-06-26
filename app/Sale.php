<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sale';

    protected $fillable = [
        'address',
        'tax',
        'images',
        'area',
        'bathroom',
        'count_rooms',
        'ceiling_height',
        'type_of_building',
        'condition',
        'price',
        'facilities',
        'more_info',
        'contact_detalis',
        'video',
        'role',
        'lat',
        'lng'
    ];
}
