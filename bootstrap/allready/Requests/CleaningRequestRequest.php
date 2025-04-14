<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CleaningRequestRequest extends FormRequest
{
    public function rules()
    {
        return [
            'address' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}$/',
            'desired_date' => 'required|date|after:now',
            'service_type' => 'required|in:general_cleaning,deep_cleaning,post_construction,carpet_cleaning,other',
            'custom_service' => 'required_if:service_type,other|nullable|string|max:500',
            'payment_type' => 'required|in:cash,card',
        ];
    }

    public function messages()
    {
        return [
            'phone.regex' => 'Телефон должен быть в формате +7(XXX)-XXX-XX-XX.',
            'desired_date.after' => 'Дата должна быть в будущем.',
            'custom_service.required_if' => 'Пожалуйста, опишите услугу, которую вам требуется.',
        ];
    }
}
