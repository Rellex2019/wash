<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleaningRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'desired_date',
        'service_type',
        'custom_service',
        'payment_type',
        'status',
        'cancel_reason'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getServiceNameAttribute()
    {
        $services = [
            'general_cleaning' => 'Общий клининг',
            'deep_cleaning' => 'Генеральная уборка',
            'post_construction' => 'Послестроительная уборка',
            'carpet_cleaning' => 'Химчистка ковров и мебели',
            'other' => 'Иная услуга'
        ];

        return $services[$this->service_type] ?? $this->service_type;
    }
}