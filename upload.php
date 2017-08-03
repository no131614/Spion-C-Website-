<?php
/**
 * Created by PhpStorm.
 * User: Alexander Julianto
 * Date: 7/29/17
 * Time: 3:27 PM
 */


if($_SERVER['REQUEST_METHOD']=='POST'){

    $image = $_POST['key_image'];

    require_once('Config.php');

    $sql ="SELECT id FROM photos ORDER BY id ASC";

    $res = mysqli_query($db,$sql);

    $id = 0;

    while($row = mysqli_fetch_array($res)){
        $id = $row['id'];
    }

    $path = "upload/$id.png";

    $actualpath = "media/$path";

    $sql = "INSERT INTO photos (image) VALUES ('$actualpath')";
    //$sql2 = "INSERT INTO image (image) VALUES ('$image')";

    if(mysqli_query($db,$sql)){
        file_put_contents("media/upload/$id.png",base64_decode($image));
        //file_put_contents($path,base64_decode($image));

       // if(mysqli_query($db,$sql2)){

            echo "Successfully Uploaded";

        //}

    }

    //mysqli_close($db);
}else{
    echo "Error";
}

?>