<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormDangKyRequest extends FormRequest
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
            'txtMonHoc'    => 'required|unique:form_dangky,ten_mon_hoc', // yeu cau nhap vao, khac gia tri: khai bao ten bang minh su dung va truong du lieu can check
            'txtGiaTien'   => 'required',
            'txtGiangVien' => 'required',
            'fImages'      => 'required|image|max:1500',

        ];
    }
    /**
     * [messages custom hien error
     * @return [string] [string]
     */
    public function messages()
    {
        return [
            'txtMonHoc.required'    => 'Vui lòng nhập vào tên môn học',
            'txtGiaTien.required'   => 'Vui lòng nhập vào giá tiền',
            'txtGiangVien.required' => 'Vui lòng nhập vào tên giảng viên',
            'txtMonHoc.unique'      => 'Tên này đã có',
            'fImages.required'      => 'Chọn ảnh up lên',
            'fImages.image'         => 'file upload không được hỗ trợ',
            'fImages.max'           => 'Chỉ được tải lên file dưới 1.5 Mb',

        ];
    }
}
