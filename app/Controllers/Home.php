<?php

namespace App\Controllers;

class Home extends BaseController {
	
    public function index() {


		
		//View
        return view('consume_rest_api', $data);
    }
	
}