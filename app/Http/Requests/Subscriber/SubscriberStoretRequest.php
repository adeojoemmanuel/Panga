<?php

namespace App\Http\Requests\Subscriber;

use Illuminate\Foundation\Http\FormRequest;

class SubscriberStoretRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public $url;

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
      //
      "url" => "required|url"

    ];
  }

  public function messages()
  {
    return [
      'url.required' => 'The url is required',
      'url.url' => 'The url must have a url format',
    ];
  }
}
