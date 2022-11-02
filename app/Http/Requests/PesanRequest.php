<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PesanRequest extends FormRequest
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
                'barang' => 'required|string|max:258',
                'nomor_hp' => 'required|string|max:258',
                'alamat' => 'required|string|max:258',
                'tanggal' => 'required|string|max:258',
                
            ];
        }else {
            return[
                'nama' => 'required|string|max:258',
                'barang' => 'required|string|max:258',
                'nomor_hp' => 'required|string|max:258',
                'alamat' => 'required|string|max:258',
                'tanggal' => 'required|string|max:258',
                
            ];
        }
        
    }
    public function messages()
   
    {
        if (request ()->isMethod('post')) {
            return[
                
                'nama' => 'Nama is required',
                'barang' => 'Nama is required',
                'nomor_hp' => 'Nama is required',
                'alamat' => 'Nama is required',
                'tanggal' =>'Nama is required',
               
            ];
        }else {
            return[
                 
                'nama' => 'Nama is required',
                'barang' => 'Nama is required',
                'nomor_hp' => 'Nama is required',
                'alamat' => 'Nama is required',
                'tanggal' =>'Nama is required',
                
                
            ];
        }
        
    }

}