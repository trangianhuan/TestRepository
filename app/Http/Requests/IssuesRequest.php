<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class IssuesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('member')->check();;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //        
        'subject' => 'required|min:5',
        'startdate' => 'required|date',
        'duedate' => 'required|date',
        'assignesMember' => 'required',
        'status' => 'required',
        'tracker' =>'required',
        'descript' => 'required',
        ];
    }
}
