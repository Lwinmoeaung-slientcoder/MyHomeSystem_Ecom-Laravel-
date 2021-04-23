<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesProductRequest extends FormRequest
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
        return [
            'name'          =>  'required|string|max:45',
            'goldquality'   =>  'required',
            'shopname'      =>  'required|string|max:24',
            'kyat'          =>  'required|integer|max:2',
            'pel'           =>  'required|integer|max:2',
            'yway'          =>  'required|integer|max:2',
            'ayaw'          =>  'required|integer|max:2',
            'k_price'       =>  'nullable|integer|max:10',
            'k_kyat'        =>  'nullable|integer|max:16',
            'k_pel'         =>  'nullable|integer|max:20',
            'k_yway'        =>  'nullable|integer|max:20',
            'total_cost'    =>  'required|integer',
            'sold_date'     =>  'required',
       
       
    ];
    }
}
