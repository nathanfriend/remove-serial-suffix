<?php
//Author: Nathan Friend nathan.friend@gmail.com
//Version 0.2 01/10/14<br
//Remove serial suffix from files in current directory leaving highest version. 
//e.g. For files 0000003_001.jpg, 0000003_002.jpg, 0000003_003.jpg.
//0000003_001.jpg would be renamed to 0000003.jpg
//0000003_002.jpg would be renamed to 0000003.jpg overwriting existing file.
//0000003_003.jpg would be renamed to 0000003.jpg overwriting existing file.
ini_set('display_errors',1);
error_reporting(E_ALL);

date_default_timezone_set('Europe/London');

//Get current working direcotry and load in to $directory variable.
$directory = getcwd()."/";


//Stage 1
echo "Stage 1 (Remove serial)\r\n";
//Scan directory and load file names into $files array, excluding this script current and parent directories.
$files = array_diff(scandir($directory), array('..', '.', 'rename_files.php','nbproject','README.md','LICENSE','.git','.gitignore','skel'));

//Loop through $files array.
foreach($files as $result) {
    //Check if file name contains _001.jpg
    if (strpos($result,'_001.jpg') !== false) {
    rename($directory."/".$result,$directory."/".str_replace('_001.jpg','',$result));
    echo $result." renamed to ".str_replace('_001.jpg','',$result)."\r\n";
}
    if (strpos($result,'_002.jpg') !== false) {
    rename($directory."/".$result,$directory."/".str_replace('_002.jpg','',$result));
    echo $result." renamed to ".str_replace('_002.jpg','',$result)."\r\n";
}
    if (strpos($result,'_003.jpg') !== false) {
    rename($directory."/".$result,$directory."/".str_replace('_003.jpg','',$result));
    echo $result." renamed to ".str_replace('_003.jpg','',$result)."\r\n";
}
 

}
//Stage 2
echo "\r\nStage 2 (0 Pad to 8 chrarters)\r\n";
//Scan directory and load file names into $files2 array, excluding this script current and parent directories.
$files2 = array_diff(scandir($directory), array('..', '.', 'rename_files.php','nbproject','README.md','LICENSE','.git','.gitignore','skel'));

foreach($files2 as $result) {
echo $result." renamed to ".str_pad($result, 8, "0", STR_PAD_LEFT).".jpg\r\n"; 
rename($directory."/".$result,$directory."/".str_pad($result, 8, "0", STR_PAD_LEFT).".jpg");
}

echo "\r\nProcessing completed ". date('d/m/Y H:i').".";

?>

