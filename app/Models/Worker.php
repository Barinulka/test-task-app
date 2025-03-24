<?php

namespace App\Models;

use Database\Factories\WorkerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Worker extends Model
{
    /** @use HasFactory<WorkerFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'second_name',
        'surname',
        'phone',
    ];

    public function orders(): MorphToMany
    {
        return $this->morphToMany(Order::class, 'order_worker');
    }

    public function exOrderTypes(): MorphToMany
    {
        return $this->morphToMany(OrderType::class, 'workers_ex_order_type');
    }
}
