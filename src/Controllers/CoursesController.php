<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Course;
use App\Models\Bought;

class CoursesController extends Controller
{
	public function index()
	{
		$courses = Course::all();
		$data = [
			'courses' => $courses->groupBy('category_id'),
			'ratingList' => $this->ratingList($courses),
			'title' => 'Courses',
			'pageContent' => 'Welcome to the courses page!'
		];

        $this->sendPage('user/courses', $data);
	}

	public function search()
	{
		$name = $_GET['name'];
		$courses = Course::all();
		foreach ($courses as $key => $course){
			if (!str_contains(strtolower($course->name), strtolower($name)))
				unset($courses[$key]);
		}

		$data = [
			'courses' => $courses->groupBy('category_id'),
			'ratingList' => $this->ratingList($courses),
			'title' => 'Searching',
			'pageContent' => 'Search result for \'' . $name . '\''
		];

		$this->sendPage('user/courses', $data);
	}

	public function buyCourse()
	{
		if (!\App\SessionGuard::isUserLoggedIn()){
			redirect('login', []);
		}

		$course_id = $_POST['course_id'];

		$bought = new Bought;
		$bought->user_id = \App\SessionGuard::user()->user_id;
		$bought->course_id = (int)$course_id;
		$bought->save();
		// It's not same???
		// $bought = Bought::create(['user_id' => \App\SessionGuard::user()->user_id, 'course_id' => (int)$course_id]);
		// $bought->save();

		$courses = Bought::where('user_id', $_SESSION['user_id'])->get();
		$data = [
			'myCourses' => $courses->groupBy('course_id'),
			'ratingList' => CoursesController::ratingList($courses)
		];
		redirect('myCourses', $data);
	}

	public static function ratingList($courses){
		$ratings = [];

		foreach($courses as $course){
			$courseVote = Bought::select('course_id', 'rating')->where('course_id', $course->course_id)->where('rating', '<>', '')->get();
			$sum = 0;
			$i = 0.0;
			foreach ($courseVote as $vote){
				$sum = $sum + $vote->rating;
				$i += 1.0;
			}

			if ($i != 0.0) $ratings[$course->course_id] = array("rate" => $sum / $i, "amount" => $i); //rate convert to string format 0.0 ???
			else $ratings[$course->course_id] = array("rate" => 0.0, "amount" => 0);
		}

		return $ratings;
	}
}
