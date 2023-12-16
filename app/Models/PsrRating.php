<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsrRating extends Model
{
    use HasFactory;

    protected $table = 'psr_rating';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pemesanan()
    {
        return $this->belongsTo(pemesanan::class, 'pemesanan_id', 'id');
    }
}
