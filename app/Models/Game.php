<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Game extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        static::saving(function ($game) {
            // Jika slug diisi, pastikan formatnya benar (slugify)
            if (!empty($game->slug)) {
                $game->slug = Str::slug($game->slug);
            }
            // Jika slug kosong tapi nama ada, buat slug dari nama
            elseif ($game->isDirty('name') && empty($game->slug)) {
                $game->slug = Str::slug($game->name);
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // PERBAIKAN: Tambahkan properti $fillable
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image_url',
    ];

    /**
     * Mendapatkan semua package yang dimiliki game ini.
     */
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
