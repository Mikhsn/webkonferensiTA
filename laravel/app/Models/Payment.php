<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'payment_type',
        'order_id',
        'amount',
        'transaction_status',
    ];

    // Definisi relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
