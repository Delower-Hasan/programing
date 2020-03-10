<?php

// *********************INSERT *************
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





<!-- *************UPDATE************ -->

<?php 
if(isset($_FILES['banner_img_edit']) && isset($_POST['phone_edit']) && isset($_POST['title_edit']) && isset($_POST['subtitle_edit'])){
 
  $phone = $_POST['phone_edit'];
  $title = $_POST['title_edit'];
  $subTitle = $_POST['subtitle_edit'];
  $id = $_POST['edit_id'];

  $file = $_FILES['banner_img_edit'];
  $after_explode = explode('.',$file['name']);
  $extension = end($after_explode);
  $image = 'default.png';
  $allow_ext = array('png','jpg','jpeg','gif');
  if(in_array($extension,$allow_ext)){
     if($file['size']<2000000){

     if($file['name'] != ''){
      $slect_Edit = "SELECT * FROM `header`";
      $select_edit = mysqli_query($db,$slect_Edit);
      $after_assoc = mysqli_fetch_assoc($select_edit);
      $delete_from = 'imageFolder/header/'.$after_assoc['banner_img'];
      unlink($delete_from);
         $fileName = $id.'.'.$extension;
         $newLocation = 'imageFolder/header/'.$fileName;
         move_uploaded_file($file['tmp_name'],$newLocation);

         $update_id = "UPDATE `header` SET `phone`='$phone',`title`='$title',`subtitle`='$subTitle',`banner_img`='$file[name]' WHERE id = '$id'";
         $update_header_res = mysqli_query($db,$update_id);
     }else{
      $update_id = "UPDATE `header` SET `phone`='$phone',`title`='$title',`subtitle`='$subTitle' WHERE id = '$id'";
      $update_header_res = mysqli_query($db,$update_id);
     }

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
$('#headerForm_edit').submit(function(e){
          e.preventDefault()
          $.ajax({
          url:'HeaderCode.php',
          type:'POST',
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData:false,
          success:function(response){
            noneValue()
            $('#required').html(response);
            getRecords()
            warningOut()
            
          }
        })
      })


</script>


<!-- ***********DELETE******** -->

<?php

if(isset($_POST['id'])){
  $id = $_POST['id'];
  $slect_delete = "SELECT * FROM `header`";
  $select_del = mysqli_query($db,$slect_delete);
  $after_assoc = mysqli_fetch_assoc($select_del);
  $delete_from = 'imageFolder/header/'.$after_assoc['banner_img'];
  unlink($delete_from);

  $delete_items ="DELETE FROM `header` WHERE id= '$id'";
  $delete_res = mysqli_query($db,$delete_items);
  echo "SuccessFully Deleted";
}


?>

<script>
    function deleteItems(id){
      $.post({
          url:'HeaderCode.php',
          data:{
              id:id,
          },
          success:function(data){
              $('#required').html(data);
              getRecords()
              warningOut()
          }
      })
    }
</script>