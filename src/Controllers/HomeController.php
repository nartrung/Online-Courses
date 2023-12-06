<?php

namespace App\Controllers;

use App\Controllers\Controller;

class HomeController extends Controller
{
	public function index()
	{
		$data =
			[
				//Get 4 newest course with created_at (can be use updated_at), data need: name, description,
				'newest' => \App\Models\Course::orderBy('CREATED_AT', 'desc')->take(4)->select('name', 'description','img_url')->get()
			];

		$this->sendPage('user/home',$data);
	}

	public function notFound()
	{
		$this->sendPage('notFound',[]);
	}
}
