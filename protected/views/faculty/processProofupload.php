<?php  
session_start();
include("config.php");
$statusMsg = '';

// File upload path
$targetDir = "IPCRuploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$id=$_GET['id'];
$fcode=$_GET['fcode'];
$accomp=$_GET['accomp'];
if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = "INSERT into tbl_proof (id_ipcraccomp,FCode,file_name, uploaded_on) VALUES ('".$id."','".$fcode."','".$fileName."', NOW())";
            $result = mysqli_query($conn,$insert);
            if($insert){
                header('location: index.php?r=faculty/IPCRaddproof&msg=Proof has been uploaded.&msgType=succ&accomp='.$accomp.'&id='.$id.'&fcode='.$fcode.'');
            }else{
                header('location: index.php?r=faculty/IPCRaddproof&msg=File upload failed, please try again.&msgType=error&accomp='.$accomp.'&id='.$id.'&fcode='.$fcode.'');
            } 
        }else{
            header('location: index.php?r=faculty/IPCRaddproof&msg=Sorry, there was an error uploading your file.&msgType=error&accomp='.$accomp.'&id='.$id.'&fcode='.$fcode.'');
        }
    }else{
        header('location: index.php?r=faculty/IPCRaddproof&msg=Sorry, only JPG, JPEG, PNG files are allowed to upload.&msgType=error&accomp='.$accomp.'&id='.$id.'&fcode='.$fcode.'');
    }
}else{
    header('location: index.php?r=faculty/IPCRaddproof&msg=Please select a file to upload.&msgType=error&accomp='.$accomp.'&id='.$id.'&fcode='.$fcode.'');
}
?>