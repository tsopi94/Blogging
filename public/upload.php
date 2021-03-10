<?php
// Allowed origins to upload images
$accepted_origins = array("http://localhost:8000");

//images upload path
$imageFolder = "images/";
reset($_FILES);
$temp = current($_FILES);
$infofile = pathinfo($temp['name']);
$extension_upload = $infofile['extension'];
$newname = uniqid().".".$extension_upload;

if(is_uploaded_file($temp['tmp_name'])) {
  if(isset($_SERVER['HTTP_ORIGIN'])) {
    //same-origins requests won't set an origin. if the origin is set, it must be valid
    if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
      header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
    }else{
      header('HTTP/1.1 403 Origin Denied');
      return;
    }
  }

  //sanitize input
  if (preg_match("/([^\w\s\d\-_~,:;\[\]\(\).])|([\.]{2,})/", $newname)) {
    header('HTTP/1.1 400 Invalid file name.');
    return;
  }

  //verify extension
  if (!in_array(strtolower($extension_upload), array('gif', 'jpg', 'jpeg', 'png'))) {
    header('HTTP/1.1 400 Invalid extension.');
    return;
  }

  //Accept upload if there was no origin, or if it is an accepted origin
  $filetowrite = $imageFolder.$newname;
  move_uploaded_file($temp['tmp_name'], $filetowrite);

  // Respond to the successful upload with Json
  // Use the location key to specify the path to the saved image resource
  // {location: /your/uploaded/image/file}
  echo json_encode(array('location'=>$filetowrite));
}else{
  // Notify the editor that the upload failed
  header('HTTP/1.1 500 Server Error.');
}
 ?>
