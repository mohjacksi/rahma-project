<?php

namespace App\Http\Requests;

use App\Models\DonationCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDonationCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('donation_category_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:donation_categories',
            ],
        ];
    }
}
