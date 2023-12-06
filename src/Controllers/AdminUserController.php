<?php

namespace App\Controllers;

use App\Controllers\AdminController;
use App\Models\User;

class AdminUserController extends AdminController
{
	public function viewUser()
	{
		$data = [
			'errors' => session_get_once('errors'),
			'messages' => session_get_once('messages')
		];
		$this->sendPage('admin/viewUser', $data);
	}
	public function viewEditUser()
	{
		$data = [
			'errors' => session_get_once('errors'),
			'messages' => session_get_once('messages'),
			'user' => User::find($_GET['id'])
		];
		$this->sendPage('admin/editUser', $data);
	}
	public function editUser()
	{
		$data = $_POST;

		try {
			$user = User::find($data['user_id']);
			$user['name'] = $data['user_name'];
			$user['email'] = $data['user_email'];
			$user['is_admin'] = $data['is_admin'];
			$_SESSION['is_admin'] = $data['is_admin'];
			$user->save();
			$_SESSION['messages'] = 'Update succesfully.';
			redirect('/admin/users', []);
		} catch (\Illuminate\Database\QueryException $ex) {
			$_SESSION['errors'] = 'Can not be update.';
			redirect('/admin/users', []);
		}
	}
	public function deleteUser()
	{
		$data = $_GET['id'];
		try {
			User::where('user_id', $data)->delete();
			$_SESSION['messages'] = 'User has been deleted.';
		} catch (\Illuminate\Database\QueryException $ex) {
			$_SESSION['errors'] = 'User can not be deleted.';
		}
		redirect('/admin/users', []);
	}
}
