<?php

namespace App\Http\Requests\V1\Staff\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Str;

class UserLoginRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return[
            'username.required' => __('staff/validations.username_required'),
            'password.required' => __('staff/validations.password_required'),                        
        ];
    }
    
    /*
    protected function failedValidation(Validator $validator) {
        $codeList = $this->customeCode();        
        foreach( $validator->errors()->get('*') as $key => $fieldError) {              
            foreach( $fieldError AS $error) {                
                // $code = array_search( Str::slug($error), $codeList ) ;
                $code = array_search( $error, $codeList ) ;                
                $errors[] = [
                    'field' =>  $key,
                    'code' => $code != false ? $code : 5001,
                    'message' => $error 
                ];                
            }
        }
        throw new HttpResponseException(
          response()->json([
            'status' => __('messages.error'),
            'description' => __('messages.unprocessable_entry'),
            'errors' => $errors,
          ], 422)
        ); 
    } */

    /*
    protected function customeCode(){        
        $code = [
            4011 => __('staff/validations.bank_required'),
            4008 => __('staff/validations.bank_invalid'),
            4009 => __('staff/validations.bank_account_required'),
            4010 => __('staff/validations.bank_account_invalid'),            
        ];
        // return array_map(function($q){ 
        //     return \Illuminate\Support\Str::slug($q); 
        // },$code);
        return $code;
    }*/
}
