<?php defined('SYSPATH') or die('No direct script access.');

class Model_CMF_Translation extends Jelly_Model {

	public static function initialize(Jelly_Meta $meta)
	{
		$meta->fields(array(
			'lang' => Jelly::field('belongsto'),
			'editable' => Jelly::field('boolean'),
			'key' => Jelly::field('string'),
			'value' => Jelly::field('text'),
		));

		$meta->table('i18n');

		$meta->load_with(array('lang'));
	}

}