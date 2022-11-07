<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WalletRequest extends FormRequest
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
                'nomor_hp' => 'required|string|max:258',
                'jenis' => 'required|string|max:258',
                'total' => 'required|string|max:258',
                'no_wallet' => 'required|string|max:258',
            ];
        }else {
            return[
                'nama' => 'required|string|max:258',
                'nomor_hp' => 'required|string|max:258',
                'jenis' => 'required|string|max:258',
                'total' => 'required|string|max:258',
                'no_wallet' => 'required|string|max:258',
            ];
        }
        
    }
    public function messages()
   
    {
        if (request ()->isMethod('post')) {
            return[
                'nama' => 'Nama is required',
                'nomor_hp' => 'nomor_hp is required',
                'jenis' => 'jenis is required',
                'total' => 'total is required',
                'no_wallet' => 'jenis is required'
            ];
        }else {
            return[
                'nama' => 'Nama is required',
                'nomor_hp' => 'nomor_hp is required',
                'jenis' => 'jenis is required',
                'total' => 'total is required',
                'no_wallet' => 'jenis is required'
            ];
        }
        
    }

}