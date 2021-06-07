<?php
$file = $_POST['id'];

$directorio = "../ajax/archivos/ ".$file;
function rrmdir($dir)
{
	if (is_dir($dir)) {
		$objects = scandir($dir);

		foreach ($objects as $object) {
			if ($object != '.' && $object != '..') {
				if (filetype($dir . '/' . $object) == 'dir') {
					rrmdir($dir . '/' . $object);
				} else {
					unlink($dir . '/' . $object);
				}
			}
		}

		reset($objects);
		rmdir($dir);
	}
}

if (file_exists($directorio)) {
	rrmdir($directorio);
} else {
}
