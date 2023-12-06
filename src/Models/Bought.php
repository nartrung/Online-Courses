<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bought extends Model
{
    //Lưu created_at, updated_at
    public $timestamps = false;
    //Tên bảng
    protected $table = 'bought';
    //Các thuộc tính
    protected $fillable = ['buy_at', 'rating'];

    protected $primaryKey = ['user_id', 'course_id'];
    public $incrementing = false;

    public function course() : BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    protected function setKeysForSaveQuery($query)
    {
        return $query->where('user_id', $this->getAttribute('user_id'))
            ->where('course_id', $this->getAttribute('course_id'));
    }

    public static function isBought(int $course_id)
    {
        if (!\App\SessionGuard::isUserLoggedIn()) return false;
        
        $course = Bought::where('user_id', \App\SessionGuard::user()->user_id)->where('course_id', $course_id)->first();

        if (isset($course)) return true;
        else return false;
    }
}