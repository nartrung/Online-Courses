<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    //Lưu created_at, updated_at
    public $timestamps = true;
    //Tên bảng
    protected $table = 'courses';
    //Các thuộc tính
    protected $fillable = ['name', 'price', 'description', 'create_by', 'category_id', 'img_url'];

    protected $primaryKey = 'course_id';

    public function category() : HasOne
    {
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }

    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'user_id', 'create_by');
    }
}