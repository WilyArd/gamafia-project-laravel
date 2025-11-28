<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

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
