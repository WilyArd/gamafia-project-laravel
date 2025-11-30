<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'game_id',
        'name',
        'description',
        'ram',
        'cpu',
        'storage',
        'price_monthly',
        'price_premium_addon', // PERUBAHAN: Menambahkan kolom baru
        'is_popular',
        'stock',
    ];

    /**
     * Mendapatkan game yang memiliki package ini.
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
