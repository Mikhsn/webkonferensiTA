<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $table = 'conferences';
    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'location',
        'price',
        'discount',
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'transactions', 'conference_id', 'user_id')
                    ->withPivot('transaction_status', 'expired_at')
                    ->withTimestamps();
    }

}
