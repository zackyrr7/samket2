<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PertanyaanRequest extends FormRequest
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
                'judul' => 'required|string|max:258',
                'jawaban' => 'required|string|max:99999999',
                
            ];
        }else {
            return[
                'judul' => 'required|string|max:258',
                'jawaban' => 'required|string|max:99999999',
                
            ];
        }
    }

    public function messages()
    {
        if (request ()->isMethod('post')) {
            return[
                'judul' => 'judul is required',
                'jawaban' => 'jawaban is required',
                
            ];
        }else {
            return[
                'judul' => 'Judul is required',
                'jawaban' => 'jawaban is required',
                
            ];
        }
    }
}
