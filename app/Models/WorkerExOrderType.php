<?php

namespace App\Models;

use Database\Factories\WorkerExOrderTypeFactory;
use Database\Factories\WorkerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerExOrderType extends Model
{
    /** @use HasFactory<WorkerExOrderTypeFactory> */
    use HasFactory;

    protected $table = 'workers_ex_order_types';

    protected $fillable = [
        'worker_id',
        'order_type_id',
    ];
}
