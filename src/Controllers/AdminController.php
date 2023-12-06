<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\SessionGuard as Guard;


class AdminController extends Controller
{
	public function __construct()
	{
		if (!Guard::isAdmin()) {
			redirect('/');
		}

		parent::__construct();
	}

	public function index()
	{
        $this->sendPage('admin/viewDashboard');
	}
}
