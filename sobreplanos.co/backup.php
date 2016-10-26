
<?php

function zipData($source, $destination) {
	if (extension_loaded('zip')) {
		if (file_exists($source)) {
			echo 1;
			$zip = new ZipArchive();
			if ($zip->open($destination, ZIPARCHIVE::CREATE)) {
				$source = realpath($source);
				if (is_dir($source)) {
					$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
					foreach ($files as $file) {
						$file = realpath($file);
						if (is_dir($file)) {
							$zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
						} else if (is_file($file)) {
							$zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
						}
					}
				} else if (is_file($source)) {
					$zip->addFromString(basename($source), file_get_contents($source));
				}
			} 
			return $zip->close();
		}
		echo 2;
	}
	return false;
}


$date = date('m-d-Y-h-i-s-a', time());
$destiny='backups/backup-firebase'.$date.'.zip';
ini_set('max_execution_time', 600);
ini_set('memory_limit','1024M');


zipData('fireBase', $destiny);




?>