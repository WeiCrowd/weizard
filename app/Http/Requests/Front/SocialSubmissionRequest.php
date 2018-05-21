<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class SocialSubmissionRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        if($this->request->get('old_logo_image') != ''){
            return [
                'short_description' => 'required|string|max:200',
                'concept' => 'required',
                'video' => 'url',
                'website' => 'required|url',
                'blog' => 'url',
                'whitepaper' => 'required|url',
                'banner_image' => 'image|mimes:jpeg,png,jpg,gif',
                'logo_image' => 'image|mimes:jpeg,png,jpg,gif',
    //             'link_type' => 'required',
    //            'url' => 'required|url',      
            ];
        }else{
            return [
                'short_description' => 'required|string|max:200',
                'concept' => 'required',
                'video' => 'url',
                'website' => 'required|url',
                'blog' => 'url',
                'whitepaper' => 'required|url',
                'banner_image' => 'image|mimes:jpeg,png,jpg,gif',
                'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif',
    //             'link_type' => 'required',
    //            'url' => 'required|url',      
            ];
        }
    }
    
     public function messages()
    {
        return [
            'short_description.required' => 'Short Description is required.',
            'concept.required' => 'Details is required.',
            'website.required' => 'Website is required.',
            'whitepaper.required' => 'Whitepaper is required.',
            'website.url' => 'Invalid URL.',
            'blog.url' => 'Invalid URL.',
            'whitepaper.url' => 'Invalid URL.',
            'video.url' => 'Invalid URL.',
//            'link_type.required' => 'Link Type is required.',
//            'url.required' => 'URL is required.',
//            'url.url' => 'Invalid URL.'
        ];
    }
}
