<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return true;
        
        /* if ($this->user_id == auth()->user()->id) {
            return true;
        } else {
            return false;
        } */
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $empleo = $this->route()->parameter('empleo');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:empleos,slug,',
            'status' => 'required|in:1,2',
            'file' => 'image',
        ];

        if ($empleo) {
            $rules['slug'] = 'required|unique:empleos,slug,' . $empleo->id;
        }

        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'modos' => 'required',
                'extracto' => 'required',
                'descripcion' => 'required',
            ]);
        }

        return $rules;
    }
}
