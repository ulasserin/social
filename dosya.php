
<!DOCTYPE html>
<html>
<body>

<form action="" method="POST" enctype="multipart/form-data">

        <input type="file" name="file">
        <input type="submit" name="submit" value="submit">
</form>
<?php
    if(@$_POST["submit"]){

        if($_FILES['file']['size'] > 0){
            if($_FILES['file']['type'] =="image/png"){
               
                $uzanti = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $yeniad = "destek/deneme/".uniqid().".".$uzanti;
                print_r($_FILES['file']);
                if(move_uploaded_file(['file']["tmp_name"],$yeniad)){
                    echo "succes";
                }
                
            }
            
            
        }
        else{
            echo "dosya seçimi yapınız";
        }
    }
?>
</body>
</html>