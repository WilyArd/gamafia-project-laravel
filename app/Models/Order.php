<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Order extends Model
{
    use HasFactory, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // PERBAIKAN: Menambahkan properti $fillable
    protected $fillable = [
        'user_id',
        'package_id',
        'total_amount',
        'billing_cycle',
        'payment_method',
        'status',
    ];

    /**
     * Mendapatkan pengguna yang memiliki pesanan ini.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mendapatkan paket yang dipesan.
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
