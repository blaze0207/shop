<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MerchandiseRequest extends FormRequest
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
            'status' => 'required|in:C,S',
            'name' => 'required|max:80',
            'name_en' => 'required|max:80',
            'introduction' => 'required|max:200',
            'introduction_en' => 'required|max:200',
            'photo' => 'file|image|max: 30000',
            'price' => 'required|integer|min:0',
            'remain_count' => 'required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => '商品狀態不能為空',
            'status.in' => '商品狀態錯誤',
            'name.required' => '商品名稱不能為空',
            'name.max' => '商品名稱不能超過 80 個字元',
            'name_en.required' => '商品英文名稱不能為空',
            'name_en.max' => '商品英文名稱不能超過 80 個字元',
            'introduction.required' => '商品介紹不能為空',
            'introduction.max' => '商品介紹不能超過 200 個字元',
            'introduction_en.required' => '商品英文介紹不能為空',
            'introduction_en.max' => '商品英文介紹不能超過 200 個字元',
            'photo.file' => '必須是檔案',
            'photo.image' => '圖片格式錯誤',
            'photo.max' => '圖片大小超出限制',
            'price.required' => '商品價格不能為空',
            'price.integer' => '商品價格只能是數字',
            'price.min' => '商品價格最小為 0 元',
            'remain_count.required' => '商品剩餘數量不能為空',
            'remain_count.integer' => '商品剩餘數量只能是數字',
            'remain_count.min' => '商品剩餘數量最小為 0 個',
        ];
    }
}
