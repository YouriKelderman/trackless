<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'name',
        'user_id',
        'description',
        'icon'
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function albums()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
