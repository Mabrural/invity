<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_name_1',
        'event_photo_1',
        'event_name_2',
        'event_photo_2',
        'event_date',
        'location',
        'link_googlemaps',
        'dresscode',
        'no_wa_confirmation',
        'other_information'
    ];
}
