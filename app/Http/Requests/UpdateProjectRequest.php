<?php

namespace App\Http\Requests;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'short_description' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'value' => [
                'required',
            ],
            'youtube' => [
                'string',
                'nullable',
            ],
            'images' => [
                'array',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'reference' => [
                'string',
                'required',
            ],
            'beneficiary' => [
                'string',
                'required',
            ],
        ];
    }
}
