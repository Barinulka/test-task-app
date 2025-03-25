<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function order(): HasMany
    {
        return $this->hasMany(Order::class, 'type_id');
    }

    public function exWorkers(): BelongsToMany
    {
        return $this->belongsToMany(Worker::class, 'workers_ex_order_types', 'order_type_id', 'worker_id');
    }
}
