<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable =
    [
        'name',
        'slug',
        'braintree_plan',
        'cost',
        'description',
    ];

    // Method used to route to the 'slug' instead of the 'id'
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
