<?php

namespace App\Http\Requests;

use App\Models\Order;
use App\Models\Worker;

class AssignWorkerRequest extends BaseAbstractRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "worker_id" => "required|integer|exists:workers,id",
            "order_id" => "required|integer|exists:orders,id",
            "amount" => "required|integer",
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $order = Order::with('type')->find($this->input('order_id'));
            $worker = Worker::find($this->input('worker_id'));
            $orderTypeName = $order->type->name;

            if ($worker->exOrderTypes()->where('order_type_id', $order->type->id)->exists()) {
                $validator->errors()->add(
                    "worker_id",
                    "Исполнитель отказался от заказов этого типа ($orderTypeName)"
                );
            }
        });
    }
}
