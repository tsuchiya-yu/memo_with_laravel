<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'is_public'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'is_public' => 'boolean',
    ];

    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    public function scopeNotPublic($query)
    {
        return $query->where('is_public', false);
    }
}
