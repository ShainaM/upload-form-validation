<?php
// version1 : checking over all size.
// function sizeCheck($arr){
//     if ($arr){
//         $countfiles = count($_FILES['file']['name']);
//         $sumsize=0;
//         for($i=0;$i<$countfiles;$i++){
//             $size = $_FILES['file']['size'][$i];
//             $sumsize= $sumsize + $size;
//            // echo "<br>$size [$i]";    
//         }
//         //echo "<br> the total size is $sumsize";
//         return ($sumsize<=1000000)? false : true;
//     }
// }

//version2 : checking size individually.
function sizeCheck($arr){
    if ($arr){
        $countfiles = count($_FILES['file']['name']);
        for($i=0;$i<$countfiles;$i++){
            $size = $_FILES['file']['size'][$i];
            if ($size > 1000000){
                $samefile[$i]= $_FILES['file']['name'][$i];
                print_r($samefile[$i]);
                echo "==> This file exceeds 10mb. Unsuccessfully uploaded.<br><br>"; 
            }
        }
        return false;
    }
}

// validate type of image. all
function typeCheck($arr){
    if ($arr){
        $countfiles = count($_FILES['file']['name']);
        $allowed = array('jpeg','png');
        for($i=0;$i<$countfiles;$i++){
            $type = $_FILES['file']['type'][$i];
            $strArray = explode('/',$arr[$i]);
            if (in_array(end($strArray),$allowed)==null){
                return true;
            }
        }       
    }
}

//validate duplication of file
function duplicateCheck($arr){
    if($arr){
        $countfiles = count($_FILES['file']['name']);
        $ctr = 0;
        for($i=0;$i<$countfiles;$i++){
            $destination = "upload/".basename($_FILES['file']['name'][$i]);
            if (!file_exists($destination)) {
                $samefile[$i]= $_FILES['file']['name'][$i];
                print_r($samefile[$i]);
                echo "==> Successfully uploaded. <br><br>";
                // Upload file
                $name = $_FILES['file']['name'][$i];
                move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$name);
            }else{
                $ctr = $ctr + 1;
                $samefile[$i]= $_FILES['file']['name'][$i];
                print_r($samefile[$i]);
                echo "==> This file is already exist. Unsuccessfully uploaded.<br><br>"; 
            }
        }  
    }
    return ($ctr == 0)? false : true;
}


?>