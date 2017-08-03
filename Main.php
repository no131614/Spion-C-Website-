<html">

<head>
    <title> Main Page </title>
</head>

<style>
    <style type="text/css">
                          img {
                              width: 100px;
                              height: 100px;
                          }

    img.large {
        width: 200px;
        height: 200px;
    }
</style>
</style>


<body>

<h1>IMAGE DB </h1>


<?php
include('Config.php');


$folder_path = 'media/upload/'; //image folder path

$folder = opendir($folder_path);

while (false !== ($entry = readdir($folder))) {
    if ($entry != "." && $entry != ".." && $entry != "Thumb.db") {

        $file_path = $folder_path.$entry;
        $ext = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        if($ext=='jpg' || $ext =='png' || $ext == 'gif')
        {
            echo '<img src="'.$file_path.'" height="350" width="350" />';
        }
    }
}

closedir($folder );


?>



<h2><a href = "Logout.php">Sign Out</a></h2>
</body>

</html>