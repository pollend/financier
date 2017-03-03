<?php  namespace OCA\Financier;

class MixHelper {

	public  static  function  getScript($application,$script,$manifest = "mix-manifest.json")
	{
		return  file_get_contents(self::generatePath($application,"/",$manifest));
	}

	public  static  function  getStyle($application,$script,$manifest = "mix-manifest.json")
	{
		return self::generatePath($application,"/",$manifest);
	}

	/**
	 * generates a path for JS/CSS files. If no application is provided it will create the path for core.
	 *
	 * @param string $application application to get the files from
	 * @param string $directory directory within this application (css, js, vendor, etc)
	 * @param string $file the file inside of the above folder
	 * @return string the path
	 */
	private static function generatePath($application, $directory, $file) {
		if (is_null($file)) {
			$file = $application;
			$application = "";
		}
		if (!empty($application)) {
			return "$application/$directory/$file";
		} else {
			return "$directory/$file";
		}
	}



}
