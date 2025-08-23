<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'name',
        'slug'
    ];

    // Relasi ke Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Generate slug otomatis dari name
    protected static function booted()
    {
        static::creating(function ($guest) {
            $guest->slug = Str::slug($guest->name . '-' . Str::random(5));
        });
    }
}
