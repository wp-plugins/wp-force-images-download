<?php
$filename = stripslashes(trim($_POST['pic_url']));
$file = basename($filename);
if(preg_match("/([^\.]+).(jpg|png|tiff|gif|JPG|PNG|TIFF|GIF)/",$file,$fil))
{
header("Content-type: image/jpg");
header("Content-Disposition:attachment; filename=$file");
header("Content-Type: application/force-download");
readfile("$filename");
}else{
	echo"No Way!";
}

?>