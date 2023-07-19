<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

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
}
