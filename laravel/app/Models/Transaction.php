<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'conference_id',
        'transaction_status',
        'expired_at',
        'status',
        'article_title',
        'presenter_name',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function conference() {
        return $this->belongsTo(Conference::class);
    }

}


