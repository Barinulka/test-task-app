<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class OrderType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function order(): HasMany
    {
        return $this->hasMany(Order::class, 'type_id');
    }

    public function exWorkers(): MorphToMany
    {
        return $this->morphedByMany(Worker::class, 'workers_ex_order_types');
    }
}
