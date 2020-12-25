<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryAddRequest extends FormRequest
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
       $user_id =  $this->segment(3);
       if($user_id=='')
       {
            return
            [
                'category_id' => 'required',
                'name'        => 'required',
                'image'       => 'required|max:2048',
            ];
       }
       else
       {
            return
            [
                'category_id' => 'required',
                'name'        => 'required'
            ];
       }
    }
    //dimensions:width=750,height=450
}
