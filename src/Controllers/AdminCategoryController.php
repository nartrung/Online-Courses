<?php

namespace App\Controllers;

use App\Controllers\AdminController;
use App\Models\Category;

class AdminCategoryController extends AdminController
{
	public function viewCategory()
	{
		$data = [
			'errors' => session_get_once('c_name'),
			'messages' => session_get_once('messages')
		];
		$this->sendPage('admin/viewCategory', $data);
	}
	public function addCategory()
	{
		$data = $_POST['c_name'];
		$errors = Category::validate($data);
		if ($errors) {
			// Dữ liệu hợp lệ...
			Category::create(['name' => $data]);
			$_SESSION['messages'] = 'Category has been added.';
			redirect('/admin/category');
		}
		// Dữ liệu không hợp lệ...
		$_SESSION['c_name'] = 'Category is already exist.';
		redirect('/admin/category', []);
	}
	public function deleteCategory()
	{
		$data = $_GET['id'];
		try {
			Category::where('category_id', $data)->delete();
			$_SESSION['messages'] = 'Category has been deleted.';
		} catch (\Illuminate\Database\QueryException $ex) {
			$_SESSION['c_name'] = 'Category can not be deleted.';
		}
		redirect('/admin/category', []);
	}
}
