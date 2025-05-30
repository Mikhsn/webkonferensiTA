<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPrice extends Model
{
    use HasFactory;
    protected $table = 'membershipprices';
    protected $fillable = [
        'price',
        'membership_type',
    ];

}
