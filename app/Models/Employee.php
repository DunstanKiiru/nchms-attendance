<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'department',
        'rfid_tag',
        'biometric_code',
        'fingerprint_id',
        'photo_path',
    ];

    // Employee belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor to get employee name from the related user
    public function getNameAttribute()
    {
        return $this->user?->name;
    }
}
