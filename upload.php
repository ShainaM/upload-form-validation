<?php

$countfiles = count($_FILES['file']['name']);
// echo "<br>you uploaded $countfiles files/s. <br> ";
$sumsize=0;
$name = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$size = $_FILES['file']['size'];
$type = $_FILES['file']['type'];

include_once('function.php');

//for checking overall size, do not erase!
// if (sizeCheck($size)){
//     echo "<br>Error: Invalid. file is too large. <br>";
// }

// for validating overall type, do not erase!
if (typeCheck($type)){
    echo "Error: File format is not allowed. Allowed formats are jpeg and png.";
    echo "<br><br>Your file/s: <br><br>";
    for($i=0;$i<$countfiles;$i++){
        echo "$name[$i]<br>";
    }   
}

// for overall validation.
if ( sizeCheck($size) || typeCheck($type)|| duplicateCheck($name)){
    echo "<br>Unfinished upload file/s. <br><br>";
}else{
    if(isset($_POST['submit'])){
        for($i=0;$i<$countfiles;$i++){
        $name = $_FILES['file']['name'][$i];
        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$name);
        }
        echo "You have successfully uploaded your file/s.<br><br>";
    }
};

// sizeCheck($size);
// typeCheck($type);
// duplicateCheck($name);

$folder = "upload";
$results = scandir('upload');
foreach($results as $result){
    if ($result === '.' or $result === '..') continue;

    if (is_file($folder . '/' . $result)){
        echo '<br>
            <div class="col-md-3">
                <img src= "'.$folder . '/' .$result.'" alt"..." style="width:200px; height:auto;">
            </div>';
    }
}

//  echo '<pre>', print_r($_FILES), '</pre>';








?>