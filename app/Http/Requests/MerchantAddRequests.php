<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MerchantAddRequests extends FormRequest
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
                'm_name'            => 'required',
                'm_phone'           => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'password'          => 'required|confirmed|min:6',
                'image'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'cover_photo'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'email'             => 'required|unique:users,email'
            ];
       }
       else
       {
            return
            [
                'm_name'            => 'required',
                'm_phone'       => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            ];
       }
    }
    //dimensions:width=750,height=450
}
