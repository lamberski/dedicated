<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dedicated_CMS_Backups extends Controller_CMS {

	protected $prefix;

	public function before()
	{
		parent::before();

		ini_set('max_execution_time', '3600');
		ini_set('memory_limit', '10240M');

		require Kohana::find_file('vendor', 'Archive/Zip');

		$this->prefix = URL::title(Settings::get('project_name')).'-';

		// Delete old backup files
		$backups = array_merge(
			glob(APPPATH.'cache/'.$this->prefix.'files-*'),
			glob(APPPATH.'cache/'.$this->prefix.'database-*')
		);

		foreach ($backups as $backup)
		{
			@unlink($backup);
		}
	}

	public function action_index() {}

	public function action_database()
	{
		// Disable creating backups on testing environment
		if (Kohana::$environment == Kohana::TESTING)
		{
			$this->request->redirect(Route::get('cms-backups-index')->uri());
		}

		$tables = DB::query(Database::SELECT, 'SHOW TABLES')->execute()->as_array();

		// Create CSV file from each table data
		foreach ($tables as $table)
		{
			$table = reset($table);

			if (strpos($table, Database::instance()->table_prefix()) === 0)
			{
				// Change directory to /cache.
				chdir(APPPATH.'cache');

				$file = $table.'.csv';
				$files[] = $file;

				$file = fopen($file, 'w');

				$table_content = DB::query(Database::SELECT, 'SELECT * FROM '.$table)->execute()->as_array();

				foreach ($table_content as $record)
				{
					fputcsv($file, $record);
				}

				unset($table_content);
				fclose($file);
			}
		}

		// Create archive file from all CSV files
		$archive_file = $this->prefix.'database-'.date('YmdHis').'.zip';
		$archive = new Archive_Zip($archive_file, 'gz');
		$archive->create($files);

		// Delete CSV files.
		foreach ($files as $file)
		{
			@unlink($file);
		}

		// Send file to browser.
		$this->response->send_file($archive_file);
	}

	public function action_files()
	{
		if (Kohana::$environment == Kohana::TESTING)
		{
			$this->request->redirect(Route::get('cms-backups')->uri());
		}

		// Scan all directories to find all files
		$files = self::array_flatten(Kohana::list_files('', array(DOCROOT)));

		foreach ($files as &$file)
		{
			$file = str_replace(DOCROOT, '', $file);
		}

		// Change directory to /cache
		chdir(DOCROOT);

		$archive_file = APPPATH.'cache/'.$this->prefix.'files-'.date('YmdHis').'.zip';
		$archive = new Archive_Zip($archive_file, 'gz');
		$archive->create($files);

		// Send file to browser
		$this->response->send_file($archive_file);
	}

	protected function array_flatten($array, $return = array())
	{
		foreach ($array as $value)
		{
			if (is_array($value))
			{
				$return = self::array_flatten($value, $return);
			}
			else
			{
				$return[] = $value;
			}
		}

		return $return;
	}

}