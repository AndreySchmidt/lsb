<?php
// php artisan make:request Post/IndexRequest
namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'string',
            'content' => 'string',
            // 'image' => 'string',
            'category_id' => 'integer',
            // 'tags' => '',
        ];
    }
}
