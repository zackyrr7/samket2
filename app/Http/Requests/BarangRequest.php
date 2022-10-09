<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->isMethod('post')) {
            return[
                'nama' => 'required|string|max:258',
                'harga' => 'required|numeric|between:0,999.999',
                'foto' => 'required|image|mimes:jpeg,png,jpg,giv,svg|max:2048'
            ];
        }else {
            return[
                'nama' => 'required|string|max:258',
                'harga' => 'required|numeric|between:0,999.999',
                'foto' => 'required|image|mimes:jpeg,png,jpg,giv,svg|max:2048'
            ];
        }
        
    }
    public function messages()
   
    {
        if (request ()->isMethod('post')) {
            return[
                'nama' => 'Nama is required',
                'harga' => 'harga is required',
                'foto' => 'foto is required'
            ];
        }else {
            return[
                'nama' => 'Nama is required',
                'harga' => 'harga is required',
                
            ];
        }
        
    }

}