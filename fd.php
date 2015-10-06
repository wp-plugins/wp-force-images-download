<?php
//get filedata
$file_url = $_POST['pic_url'];
$file_new_name = $_POST['new_name'];

//clean the fileurl
$file_url  = stripslashes(trim($file_url ));

//get filename
$file_name = basename($file_url );

//get fileextension
#$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
$file_extension = pathinfo($file_name);

//security check
$fileName = strtolower($file_url);
$whitelist = array('png', 'gif', 'tiff', 'jpeg', 'jpg','bmp','svg');
if(!in_array(end(explode('.', $fileName)), $whitelist))
{
	exit('Invalid file!');
}
if(strpos( $file_url , '.php' ) == true)
{
	die("Invalid file!");
}

//check if file exist
if(file_exists( $file_url  ) == false){
	#exit("File Not Found!");
}

//rename                                                              //since 1.4
if(isset($file_new_name) and !empty($file_new_name))  {
	$file_new_name = $file_new_name.".".$file_extension['extension'];
} else{
	$file_new_name = $file_name;
}

//check filetype
switch( $file_extension['extension'] ) {
		case "png": $content_type="image/png"; break;
		case "gif": $content_type="image/gif"; break;
		case "tiff": $content_type="image/tiff"; break;
		case "jpeg":
		case "jpg": $content_type="image/jpg"; break;
		default: $content_type="application/force-download";
}
header("Expires: 0");
header("Cache-Control: no-cache, no-store, must-revalidate"); 
header('Cache-Control: pre-check=0, post-check=0, max-age=0', false); 
header("Pragma: no-cache");	
header("Content-type: {$content_type}");
header("Content-Disposition:attachment; filename={$file_new_name}");
header("Content-Type: application/force-download");
#header("Content-Type: application/download");
#header( "Content-Length: ". filesize($file_name) );
readfile("{$file_url}");
exit();
?>