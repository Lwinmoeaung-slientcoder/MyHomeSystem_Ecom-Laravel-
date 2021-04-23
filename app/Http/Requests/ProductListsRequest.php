<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductListsRequest extends FormRequest
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
                'kyat'          =>  'required|integer',
                'pel'           =>  'required|integer',
                'yway'          =>  'required|integer',
                'ayaw'          =>  'required|integer',
                'k_price'       =>  'nullable|integer',
                'k_kyat'        =>  'nullable|integer|max:16',
                'k_pel'         =>  'nullable|integer|max:20',
                'k_yway'        =>  'nullable|integer|max:20',
                'bought_date'   =>  'required',
           
           
        ];
    }
}
