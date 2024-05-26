<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
            if ($method == "PUT") {
            return [
                'customerId' => ['required', 'integer'],
                'amount' => ['required', 'numeric'],
                'status' => ['required', Rule::in(['B', 'b', 'P', 'p', 'V', 'v'])],
                'billedDate' => ['required', 'date_format:Y-m-d H:i:s'],
                'paidDate' => ['nullable', 'date_format:Y-m-d H:i:s'],
            ];
        } else { //PATCH
            return [
                'customerId' => ['sometimes', 'required', 'integer'],
                'amount' => ['sometimes', 'required', 'numeric'],
                'status' => ['sometimes', 'required', Rule::in(['B', 'b', 'P', 'p', 'V', 'v'])],
                'billedDate' => ['sometimes', 'required', 'date_format:Y-m-d H:i:s'],
                'paidDate' => ['sometimes', 'nullable', 'date_format:Y-m-d H:i:s'],
            ];
        }
    }

    protected function prepareForValidation() {
        $data = [];
        if ($this->customerId) {
            $data['customer_id'] = $this->customerId;
        }
        if ($this->billed_date) {
            $data['billed_date'] = $this->billedDate;
        }
        $data['paid_date'] = $this->paidDate ?? null;
        $this->merge($data);
    }
}
