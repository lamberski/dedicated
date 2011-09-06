<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CMS_Application extends Controller_Template_Twig {

	public function before()
	{
		parent::before();

		$this->template
			->set('current_uri',  Request::detect_uri() ? Request::detect_uri() : Kohana::$base_url)
			->set('current_url',  preg_replace('#'.Request::detect_uri().'$#', '', URL::base('http')))
			->set('base_uri',     Kohana::$base_url)
			->set('base_url',     preg_replace('#'.Kohana::$base_url.'$#', '', URL::base('http')))
			->set('settings',     Settings::get())
			->bind('request',     $this->request)
			->bind('environment', $environment)
			->bind('lang',        $lang)
			->bind('langs',       $langs);

    // Getting current environment's name
		switch (Kohana::$environment)
		{
			case Kohana::PRODUCTION:
				$environment = 'production';
			break;
			case Kohana::STAGING:
				$environment = 'staging';
			break;
			case Kohana::TESTING:
				$environment = 'testing';
			break;
			case Kohana::DEVELOPMENT:
				$environment = 'development';
			break;
		}

		$langs = Jelly::query('lang')->select();

		$current_lang = $this->request->param('lang', Settings::get($this->request->directory().'_default_lang'));

		foreach ($langs as $lang)
		{
			if ($current_lang == $lang->code)
			{
				$this->lang = $lang;
				I18n::lang($lang->code);

        break;
			}
		}

    // If current language is not found in database, show 404 page
		if (empty($this->lang))
		{
			throw new HTTP_Exception_404;
		}
	}

	public function after()
	{
		parent::after();

		if (isset($_GET['profile']) && Kohana::$environment != Kohana::PRODUCTION)
		{
			$this->response->body(View::factory('profiler/stats'));
		}
	}

}