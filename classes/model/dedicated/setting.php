<?php defined('SYSPATH') or die('No direct script access.');

class Model_Dedicated_Setting extends Jelly_Model {

	public static function initialize(Jelly_Meta $meta)
	{
		$meta->fields(array(
			'key' => Jelly::field('string', array(
				'unique' => TRUE,
			)),
			'value' => Jelly::field('text'),
			'default' => Jelly::field('text'),
			'editable' => Jelly::field('boolean', array(
				'default' => TRUE,
			)),
		));

		$meta->primary_key('key');
	}

}