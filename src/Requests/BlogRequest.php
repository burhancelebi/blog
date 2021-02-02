<?php

namespace Celebi\Commands\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title'             => 'required|max:200',
            'content'           => 'required|max:40000',
            'description'       => 'required|max:200',
            'lang'              => 'required|max:10',
        ];

        $rules['image'] = 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:30720';

        if (request()->isMethod('POST')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:30720';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required'        => 'Başlık Zorunlu Alandır.',
            'title.max'             => 'Başlık Maksimum 200 Karakter Olmalıdır.',
            'content.required'      => 'İçerik Zorunlu Alandır.',
            'content.max'           => 'İçerik Maksimum 20000 Karakter Olmalıdır.',
            'image.max'             => 'Resim Maksimum 30 MB Boyutunda Olmalıdır.',
            'image.required'        => 'Resim Zorunludur.',
            'image.mimes'           => 'Resim Sadece JPEG , JPG ve PNG Formatında Olmalıdır.',
            'image.image'           => 'Dosya Resim Olmalıdır.',
            'description.max'       => 'Açıklama Maksimum 200 Karakter Olmalıdır.',
            'description.required'  => 'Açıklama Zorunludur.',
            'lang.max'              => 'Dil Maksimum 10 Karakter Olmalıdır.',
            'lang.required'         => 'Dil Seçimi Zorunludur.',
        ];
    }
}
