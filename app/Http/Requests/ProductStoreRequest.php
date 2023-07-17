<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id'=>[
                'required'
            ],
            'name'=>[
                'required',
                'string',
            ],
            'slug'=>[
                'required',
                'string',
            ],
            'description'=>[
                'required',
                'string',
            ],
            'original_price'=>[
                'nullable',
                'integer',
            ],
            'quntity'=>[
                'nullable',
                'integer',
            ],
            'selling_price'=>[
                'required',
                'integer',
            ],
            'status'=>[
                'nullable',
            ],
            'brand_id'=>[
                'nullable',
            ],
            'description'=>[
                'required',
                'string',
            ],
            'meta_title'=>[
                'required',
                'string',
            ],
            'meta_description'=>[
                'required',
                'string',
            ],
            'meta_keyword'=>[
                'required',
                'string',
            ],
            'popular'=>['nullable']

        ];
    }
}
