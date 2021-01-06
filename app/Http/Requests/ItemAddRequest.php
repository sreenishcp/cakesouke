<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemAddRequest extends FormRequest
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
                'name'        => 'required',
                'description' => 'required',
                'price'       => 'required',
                'image'       => 'required|mimes:jpeg,jpg,png,gif|required|max:2048'
            ];
       }
       else
       {
            return
            [
                'name'        => 'required',
                'description' => 'required',
                'price'       => 'required',
            ];
       }
    }
    //dimensions:width=750,height=450
}
