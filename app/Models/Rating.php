<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    protected $fillable = [
        'id',
        'user_id',
        'item_id',
        'review',
        'rating',
        'status'
    ];

    public function ratings()
    {
        return $this->belongsTo(Item::class,'item_id');
    }
    public function poster()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
