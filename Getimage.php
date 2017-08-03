<?php
include('Config.php');

$sql_fetch_image = "SELECT image FROM image_table WHERE image_id=1";
$result = mysqli_query($db,$sql_fetch_image);
$image_data = mysqli_fetch_assoc($result);
mysqli_close($db);


header("Content-type: image/png");
echo $image_data['image'];

?>