<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Bought;
use App\Controllers\CoursesController;

class UserController extends Controller
{
    public function myCourses()
	{
		$courses = Bought::where('user_id', $_SESSION['user_id'])->get();
		$data = [
			'myCourses' => $courses->groupBy('course_id'),
			'ratingList' => CoursesController::ratingList($courses)
		];

        $this->sendPage('user/myCourses', $data);
	}

    public function myProfile()
	{
        $this->sendPage('user/profile', []);
	}

	public function updateProfile()
	{
		$name = $_POST['name'];

		if (\App\SessionGuard::user()->name != $name){
			\App\SessionGuard::user()->name = $name;
			\App\SessionGuard::user()->save();
		}
		redirect('profile', []);
	}

	public function vote()
	{
		$course_id = $_POST['course_id'];
		$rating = $_POST['inlineRadioOptions'];
		print($rating . " " . $course_id . " " . \App\SessionGuard::user()->user_id);
		$course = Bought::where('user_id', \App\SessionGuard::user()->user_id)->where('course_id', $course_id)->first();
		print($course);
		$course->rating = (int)$rating;
		print($course);

		$course->save();

		$courses = Bought::where('user_id', $_SESSION['user_id'])->get();
		$data = [
			'myCourses' => $courses->groupBy('course_id'),
			'ratingList' => CoursesController::ratingList($courses)
		];

        redirect('../myCourses', $data);
	}
}