<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Crypt;

class Memo extends Model
{
    use HasFactory, SoftDeletes;

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

    public function scopeOrderByUpdated($query, $direction = 'desc')
    {
        return $query->orderBy('updated_at', $direction);
    }

    public function encryptId()
    {
        return Crypt::encrypt($this->id);
    }

    public static function decryptId($decrypt_id)
    {
        return Crypt::decrypt($decrypt_id);
    }
}
