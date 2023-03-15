<?php
    if(isset($_FILES['file'])){
        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $type = $_FILES['file']['type'];

        //the-joker.jpg
        $tabExtension = explode('.',$name);//('the joker','jpg')
        $extension = strtolower(end($tabExtension));//.jpg
        $tailleMax = 400000;//taille maximum

        $extensionAutorisees = [ 'jpg', 'jpeg', 'gif', 'png'];//tableau des extension autorisees


        if(in_array($extension, $extensionAutorisees)&& $size<= $tailleMax && $error == 0){//extension  et taille max autorisees et pas d'erreur
        
        $uniqueName = uniqid('',true);//cree un nom unique a l'image pour evite doublon
        $fileName = $uniqueName.'.'.$extension;

        

            move_uploaded_file($tmpName, './upload/'.$fileName);//deplace les fichier dans /upload/
        }
        else{
            echo "Mauvaise extension ou taille trop importante ou erreur";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="Post" enctype="multipart/form-data" >
    <label for="file">Fichier</label>    
    <input type="file" name="file" id="file">
        <button type="submit">Enrengistrer</button>
    </form>
</body>
</html>