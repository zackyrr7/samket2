<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmasRequest extends FormRequest
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
                'gold' => 'required|string|max:10',
                'nomor_hp' => 'required|string|max:258',
            ];
        }else {
            return[
                'nama' => 'required|string|max:258',
                'gold' => 'required|string|max:10',
                'nomor_hp' => 'required|string|max:258',
            ];
        }
        
    }
    public function messages()
   
    {
        if (request ()->isMethod('post')) {
            return[
                'nama' => 'Nama is required',
                'gold' => 'emas is required',
                'nomor_hp' => 'Nomor_hp is required'
            ];
        }else {
            return[
                'nama' => 'Nama is required',
                'gold' => 'emas is required',
                'nomor_hp' => 'Nomor_hp is required'
                
            ];
        }
        
    }

}