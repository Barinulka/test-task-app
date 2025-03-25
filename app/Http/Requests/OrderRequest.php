<?php

namespace App\Http\Requests;

class OrderRequest extends BaseAbstractRequest
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
            'type_id' => 'required|integer|exists:order_types,id',
            'partnership_id' => 'required|integer|exists:partnership,id',
            'user_id' => 'required|integer|exists:users,id',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'address' => 'nullable|string',
            'amount' => 'required|numeric',
            'status' => 'required|string',
        ];
    }
}
