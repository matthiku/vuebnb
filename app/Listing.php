<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    // An Eloquent model can be given a $casts property to declare the 
    // data type of any specific attribute. $casts is an array of key/values 
    // where the key is the name of the attribute being cast, and the 
    // value is the data type we want to cast to.
    protected $casts = [
        'amenity_wifi' => 'boolean',
        'amenity_pets_allowed' => 'boolean',
        'amenity_tv' => 'boolean',
        'amenity_kitchen' => 'boolean',
        'amenity_breakfast' => 'boolean',
        'amenity_laptop' => 'boolean'
    ];
}
