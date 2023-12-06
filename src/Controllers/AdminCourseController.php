<?php

namespace App\Controllers;

use App\Controllers\AdminController;
use App\Models\Course;
use DateTime;
use ErrorException;

class AdminCourseController extends AdminController
{
	public function viewCourse()
	{
		$data = [
			'errors' => session_get_once('c_name'),
			'messages' => session_get_once('messages')
		];
		$this->sendPage('admin/viewCourse', $data);
	}
	public function uploadCourse()
	{
		$targetDir = "images/courses/";
		$date = new DateTime();
		$targetFile = $targetDir . $date->format('Y-m-d-H-i-s'). basename($_FILES["course_img"]["name"]);
		$hasErrors = false;
		$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
		$extensions = array("jpeg", "jpg", "png", "gif");

		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["course_img"]["tmp_name"]);
		if ($check == false) {
			$hasErrors = true;
			$_SESSION['errors'] = "Sorry, your file was not uploaded.";
		}
		// Check if file already exists
		if (file_exists($targetFile)) {
			unlink($targetFile);
		}
		// Check file size
		if ($_FILES["course_img"]["size"] > 500000) {
			$hasErrors = true;
		}
		// Allow certain file formats
		if (!in_array($imageFileType, $extensions)) {
			$hasErrors = true;
		}

		// Check if $hasErrors is set to 0 by an error
		if ($hasErrors) {
			$_SESSION['errors'] = "Course can not be uploaded";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["course_img"]["tmp_name"], $targetFile)) {
				return basename($_FILES["course_img"]["name"]);
			}
			else{
				$_SESSION['errors'] = "Sorry, there was an error uploading your file.";
			}
		}
	}
	public function addCourse()
	{
		$data = $_POST;
		$course_img = static::uploadCourse();
		unset($_POST['course_img']);
		try {
			Course::create([
				'name' => $data['course_name'],
				'price' => $data['course_price'],
				'description' => $data['course_desc'],
				'create_by' => $_SESSION['user_id'],
				'category_id' => $data['category_id'],
				'img_url' => $course_img
			]);
			$_SESSION['messages'] = 'Course has been added.';
			redirect('/admin/courses');
		} catch (\Illuminate\Database\QueryException $e) {
			$_SESSION['errors'] = 'Course can not be added.';
			redirect('/admin/courses');
		}
	}

	public function viewEditCourse()
	{
		$data = [
			'errors' => session_get_once('c_name'),
			'messages' => session_get_once('messages'),
			'course' => Course::find($_GET['id'])
		];
		$this->sendPage('admin/editCourse', $data);
	}
	public function editCourse()
	{
		$data = $_POST;
		try {
			$course = Course::find($data['course_id']);
			$course['name'] = $data['course_name'];
			$course['price'] = $data['course_price'];
			$course['description'] = $data['course_desc'];
			$course['category_id'] = $data['category_id'];
			if(isset($_POST['course_img'])){
				$course['img_url'] = static::uploadCourse();
			}else{
				$course['img_url'] = $course['img_url'];
			}
			$course->save();
			$_SESSION['messages'] = 'Course has been updated.';
			redirect('/admin/courses', []);
		} catch (\Illuminate\Database\QueryException $ex) {
			$_SESSION['errors'] = 'Course can not be updated.';
			redirect('/admin/courses', []);
		}
	}
	public function deleteCourse()
	{
		$data = $_GET['id'];
		try {
			Course::where('course_id', $data)->delete();
			$_SESSION['messages'] = 'Course has been deleted.';
		} catch (\Illuminate\Database\QueryException $ex) {
			$_SESSION['errors'] = 'Course can not be deleted.';
		}
		redirect('/admin/courses', []);
	}
}
