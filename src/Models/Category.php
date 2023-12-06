<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Không lưu created_at, updated_at
    public $timestamps = false;
    protected $table = 'categories';
    protected $fillable = ['name'];

    protected $primaryKey = 'category_id';
    public static function validate($data) {
        $errors = true;

        if (static::where('name', $data)->count() > 0) {
            $errors = false;
        }   
        return $errors;
    }   
}
