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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNameAttribute()
{
    return $this->user?->name;
}

}
