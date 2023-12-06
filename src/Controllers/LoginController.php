<?php

namespace App\Controllers;

use App\Models\User;
use App\Controllers\Controller;
use App\SessionGuard as Guard;

class LoginController extends Controller{
    public function showLoginForm()
	{
		if (Guard::isUserLoggedIn()) {
			redirect('/');
		}

		$data = [
			'messages' => session_get_once('messages'),
			'old' => $this->getSavedFormValues(),
			'errors' => session_get_once('errors')
		];

		$this->sendPage('user/login', $data);
	}

	public function login()
	{
		
		$user_credentials = $this->filterUserCredentials($_POST);

		$errors = [];
		$user = User::where('email', $user_credentials['email'])->first();
		if (!$user) {
			// Người dùng không tồn tại...
			$errors['email'] = 'The email does not exist';
		} else if (Guard::login($user, $user_credentials)) {
			// Đăng nhập thành công...
			if(Guard::isAdmin()){
				redirect('/admin');	
			}
			else{
				redirect('/');
			}
		} else {
			// Sai mật khẩu...
			$errors['password'] = 'Invalid password.';	
		}
		$this->saveFormValues($_POST, ['password']);
		redirect('/login', ['errors'=>$errors]);
		// Đăng nhập không thành công: lưu giá trị trong form, trừ password
	}

	public function logout()
	{
		Guard::logout();
		redirect('/login');
	}

	protected function filterUserCredentials(array $data)
	{
		return [
			'email' => filter_var($data['email'], FILTER_VALIDATE_EMAIL),
			'password' => $data['password'] ?? null
		];
	}
}
