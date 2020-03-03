<?php
if(!empty($_FILES['logo'] )){
    $file = $_FILES['logo'];
    $after_explode = explode('.',$file['name']);
    $extension = end($after_explode);
    $logo = 'default.png';
    $allow_ext = array('png','jpg','jpeg','gif');
    if(in_array($extension,$allow_ext)){
       if($file['size']<2000000){
           $insert_logo = "INSERT INTO `logos`(`logo`) VALUES ('$logo')";
           $insert_logo_res = mysqli_query($db,$insert_logo);

           $last_id = mysqli_insert_id($db);
           $fileName = $last_id.'.'.$extension;
           $newLocation = 'uploads/'.$fileName;
           move_uploaded_file($file['tmp_name'],$newLocation);
           $update_logo = "UPDATE `logos` SET `logo`='$fileName' WHERE id = '$last_id'";
           $update_res = mysqli_query($db,$update_logo);

       }
       else{
           echo 'File Size is Big';
       }
    }
    else{
        echo 'File Not Found';
    }
 
}


?>

<script>
// jsCode

$('#logoForm').submit(function(e){
          e.preventDefault()
          let file  = document.forms['logoForm']['logo'];
          let x = 'logo'
          $.ajax({
          url:'logo.php',
          type:'POST',
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData:false,
          success:function(response){
            console.log(response)
          }
        })
      })

</script>