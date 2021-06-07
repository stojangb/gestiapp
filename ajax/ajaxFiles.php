<?php
$files_post = $_FILES['file'];
$idservicio = $_POST['idservicio'];
$files = array();
$file_count = count($files_post['name']);
$file_keys = array_keys($files_post);
for ($i=0; $i < $file_count; $i++) { 
	foreach ($file_keys as $key) {
		$files[$i][$key] = $files_post[$key][$i];
	}
}
$dirMode = 0777;
//fin utf 8
if (!file_exists("archivos/{$idservicio}")) {
    mkdir("archivos/{$idservicio}",$dirMode, true);
}
foreach ($files as $fileID => $file) {
	//UTF8(ENCODE)
	$tmp_name1 = utf8_encode($file['tmp_name']);
	$fil2 = utf8_encode($file['name']);
	$fileContent = file_get_contents($tmp_name1);
	//file_put_contents(__DIR__."/archivos/$idservicio/".$file['name'], $fileContent);
	file_put_contents("archivos/$idservicio/".$file['name'], $fileContent);

}
?>