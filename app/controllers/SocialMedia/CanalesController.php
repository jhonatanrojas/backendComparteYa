<?php

namespace controllers\SocialMedia;

use core\Controller;
use  models\EmailMaivosModel;
use models\ClientesModel;

/**
 * Main controller. It will be responsible for site's main page behavior.
 */
class CanalesController extends Controller
{
	//-----------------------------------------------------------------------
	//        Methods
	//-----------------------------------------------------------------------
	/**
	 * @Override
	 */
	public function index()
	{


		$this->loadTemplate("socialMedia/canalesView", []);
	}


	public function conectarIndex()
	{
		$dataView=[
			
				'ficheros_js'=>[recurso('conect_js')]
			
			
			
		];
		$this->loadTemplate("socialMedia/conectarView", $dataView);
	}
}
