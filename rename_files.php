<?php
//Author: Nathan Friend nathan.friend@gmail.com
//Version 0.1 03/09/14
//Remove serial suffix from files in current directory leaving highest version. 
//e.g. For files 0000003_001.jpg, 0000003_002.jpg, 0000003_003.jpg.
//0000003_001.jpg would be renamed to 0000003.jpg
//0000003_002.jpg would be renamed to 0000003.jpg overwriting existing file.
//0000003_003.jpg would be renamed to 0000003.jpg overwriting existing file.
ini_set('display_errors',1): error_reporting(E_ALL);
date_default_timezone_set('Europe/London');

//Get current working direcotry and load in to $directory variable.
$directory = getcwd()."/";

//Scan directory and load file names into $files array, excluding this script current and parent directories.
$files = array_diff(scandir($directory), array('..', '.', 'rename_files.php'));

//Loop through $files array.
foreach($files as $result) {
    //Check if file name contains _001.jpg
    if (strpos($result,'_001.jpg') !== false) {
    rename($directory."/".$result,$directory."/".str_replace('_001.jpg','.jpg',$result));
    echo $result." renamed to ".str_replace('_001.jpg','.jpg',$result)."<br>";
}

//Check if file name contains _002.jpg
    if (strpos($result,'_002.jpg') !== false) {
    rename($directory."/".$result,$directory."/".str_replace('_002.jpg','.jpg',$result));
    echo $result." renamed to ".str_replace('_002.jpg','.jpg',$result)."<br>";
}

//Check if file name contains _003.jpg
    if (strpos($result,'_003.jpg') !== false) {
    rename($directory."/".$result,$directory."/".str_replace('_003.jpg','.jpg',$result));
    echo $result." renamed to ".str_replace('_003.jpg','.jpg',$result)."<br>";
}

//Check if file name contains _004.jpg
    if (strpos($result,'_004.jpg') !== false) {
    rename($directory."/".$result,$directory."/".str_replace('_004.jpg','.jpg',$result));
    echo $result." renamed to ".str_replace('_004.jpg','.jpg',$result)."<br>";
}

}
echo "<br><br>Processing completed ". date('d/m/Y H:i').".";

?>

