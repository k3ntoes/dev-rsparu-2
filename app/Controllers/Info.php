<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Info extends BaseController
{
	public function index()
	{
		echo phpinfo();
	}
}
