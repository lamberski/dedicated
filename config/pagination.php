<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'default' => array(
		'auto_hide' => FALSE,
	),
	'site' => array(
		'view' => 'pagination/site',
		'items_per_page' => 10,
	),
	'cms' => array(
		'view' => 'pagination/cms',
		'items_per_page' => max(15, Session::instance()->get('per_page')),
	),
);