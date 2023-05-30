<?php

namespace controllers;

use core\Controller;
use  models\EmailMaivosModel;
use models\ClientesModel;

/**
 * Main controller. It will be responsible for site's main page behavior.
 */
class MainController extends Controller
{
	//-----------------------------------------------------------------------
	//        Methods
	//-----------------------------------------------------------------------
	/**
	 * @Override
	 */
	public function index()
	{

		
		$this->loadTemplate("mainView", []);
	}



	
}
