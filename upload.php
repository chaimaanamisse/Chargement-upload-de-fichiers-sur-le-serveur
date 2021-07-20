<?php 

    //   echo "<pre>";
    //   var_dump($_FILES);
    //   echo "</pre>";
    //   die;

    // on vérifie si un fichier a été envoyé

    if(isset($_FILES["image"]) && $_FILES["image"]["error"] === 0){
        // On a reçu l'image
        // On procède aux vérifications
        // On vérifie toujours l'extension ET le type Mime
        $allowed = [
            "jpg" => "image/jpeg",
            "jpeg" => "image/jpeg",
            "png" => "image/png",
        ];
        $filename = $_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];
         
        // pour récupèrer l'extension
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        // on vérifie l'absence de l'extension dans les clés de $allowed ou l'absence du type mime dans les valeurs
        if(!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed)){

            // Ici soit l'extension soit le type est incorrect
            die("Erreur : format de fichier incorrect");
        }
            // Ici le type est correct
            // On limite à 1 Mo 
            if($filesize > 1024 * 1024){
                die("Fichier trop volumineux");
            }

            // On génère un nom unique
            $newname = md5(uniqid());
            // On génère le chemin complet
            $newfilename = __DIR__ . "/uploads/$newname.$extension";
            
            // On déplace le fichier de tmp à uploads en le renommant
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)){
                die("L'upload a échoué");
            }

            chmod($newfilename, 0644); // changement de mode

            // Nom de l'image à manipuler

            // $fichier = $newname.$extension;
            // $image   = $newfilename;

            // // on récupère les infos de l'image

            // $infos =getimagesize($image);

            // $largeur = $infos[0];
            // $hauteur = $infos[1];
            // $ratio   = $largeur/$hauteur;

            // $maxDim = 800;
            // $file_name = $_FILES['myFile']['tmp_name'];
            // list($width, $height, $type, $attr) = getimagesize( $file_name );
            // if ( $width > $maxDim || $height > $maxDim ) {
            //     $target_filename = $file_name;
            //     $ratio = $width/$height;
            //     if( $ratio > 1) {
            //         $new_width = $maxDim;
            //         $new_height = $maxDim/$ratio;
            //     } else {
            //         $new_width = $maxDim*$ratio;
            //         $new_height = $maxDim;
            //     }
            //     $src = imagecreatefromstring( file_get_contents( $file_name ) );
            //     $dst = imagecreatetruecolor( $new_width, $new_height );
            //     imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
            //     imagedestroy( $src );
            //     imagepng( $dst, $target_filename ); // adjust format as needed
            //     imagedestroy( $dst );
            // }
            

            // On doit vérifier si l'image est portrait

            // on crée une nouvelle image "vierge" en mémoire


       
        


    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajout un fichier</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">

    <div>
        <label for="images">images</label>
        <input type="file" name="image" id="images">
    </div>
    <button type="submit">Envoyer</button>



    

   </form>
    
</body>
</html>