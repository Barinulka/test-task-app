<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkersOrderTypeIdsRequest extends BaseAbstractRequest
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
            'order_type_ids' => 'required|array|min:1',
            'order_type_ids.*' => 'integer|exists:order_types,id',
        ];
    }
}
