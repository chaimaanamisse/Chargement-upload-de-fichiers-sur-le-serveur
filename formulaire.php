<?php
// phpinfo();


foreach($_POST as $key=>$val)
  ${$key}=$val;
  $erreur="";
  if(isset($valider)){
    if(empty($nom)) $erreur="<li> Nom laissé vide </li>";
    if(empty($race)) $erreur.="<li> race laissé vide </li>";
    if(empty($espece)) $erreur.="<li> espece laissé vide </li>";
    if(empty($genre)) $erreur.="<li> genre laissé vide </li>";
    if(empty($age)) $erreur.="<li> age laissé vide </li>";
    if(empty($ville)) $erreur.="<li> ville laissé vide </li>";
    if(empty($description)) $erreur.="<li> description laissé vide </li>";
    
    $content_dir = 'uploads/'; // dossier où sera déplacé le fichier
 
    $tmp_file = $_FILES['profile_pic']['tmp_name'];
 
    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }
 
    
 
    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['profile_pic']['name'];
 
    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }
 
    echo "Le fichier a bien été uploadé";
  }
// $message="";
// if (isset($_POST["valider"])){
//     $message="Nom du fichier:<b> ".$_FILES["profile_pic"]["name"]."<b /><br />";
//     $message.="Nom temporaire du fichier: <b>".$_FILES["profile_pic"]["tmp_name"]."<b /><br />";
//     $message.="Type du fichier: <b>".$_FILES["profile_pic"]["type"]."<b /><br />";
//     $message.="Taille du fichier: <b>".$_FILES["profile_pic"]["size"]."<b /><br />";

//     if(move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "uploads/".$_FILES["profile_pic"]["name"])){

//         chmod("uploads/".$_FILES["profile_pic"]["name"], 0644 );
//         $message.="<li> Image chargé avec succés<li />";
//     }
//     else{
//         $message.="<li> Erreur de chargement <li />";
//     } //contient deux paramètres la source et la destination et retourne un booléan

//     // vulnérabilité upload 

//     // changer le droit du fichier  


// }

// if( isset($_POST['valider']) ) // si formulaire soumis
// {
//     $content_dir = 'uploads/'; // dossier où sera déplacé le fichier
 
//     $tmp_file = $_FILES['profile_pic']['tmp_name'];
 
//     if( !is_uploaded_file($tmp_file) )
//     {
//         exit("Le fichier est introuvable");
//     }
 
    
 
//     // on copie le fichier dans le dossier de destination
//     $name_file = $_FILES['profile_pic']['name'];
 
//     if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
//     {
//         exit("Impossible de copier le fichier dans $content_dir");
//     }
 
//     echo "Le fichier a bien été uploadé";
//     // et tu insères en base de données quelque chose du genre :
//     // $URL = $content_dir . $name_file;
    
  
// }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Publier une annonce</title>
	<link rel="stylesheet" href="styles.css">
</head>


<body>


<form action=""  method="POST" enctype="multipart/form-data"> <!-- on déclare souvent c'est on'est besoin d'uploader un fichier vers le serveur -->
<div class="wrapper">
    <div class="title">
      Remplir les informations de votre animal
    </div>
    <div class="form">
       <div class="inputfield">
          <label for="nom">Nom</label>
          <input type="text" class="input" name="nom" id="nom">
       </div>  
       <div class="inputfield">
        <label for="espese">Espèce</label>
        <div class="custom_select">
          <select name="espece" >
            <option value="">Select</option>
            <option value="chien">Chien/Chiot</option>
            <option value="chat">Chat/Chatton</option>
            <option value="autre">Autre espèce</option>
            
          </select>
        </div>
     </div>   
       <div class="inputfield">
          <label>Race</label>
          <input type="text" name="race" class="input">
       </div>  
      
        <div class="inputfield">
          <label>Gender</label>
          <div class="custom_select">
            <select name="genre">
              <option value="">Select</option>
              <option value="male">Màle</option>
              <option value="female">Femelle</option>
            </select>
          </div>
       </div> 

       <div class="inputfield">
        <label>Age</label>
        <div class="custom_select">
          <select name="age">
            <option value="">Select</option>
            <option value="bebe">Bebe</option>
            <option value="junior">junior</option>
            <option value="adulte">adulte</option>
            <option value="segnior">segnior</option>
            
          </select>
        </div>
     </div> 

     <div class="inputfield">
          <label>Ville</label>
          <input type="text" name="ville" class="input">
       </div> 
        
       
      <div class="inputfield">
          <label>Description</label>
          <textarea class="textarea" name="description"></textarea>
       </div> 
       
      <div  class="inputfield">
        <label for="fileselect" class="custom-file-upload">Sélectionnez une image</label>
        <input class="input" type="file" id="fileselect" name="profile_pic" accept=".jpg, .jpeg, .png">  <!-- // input de type file pour charger un fichier sur le serveur -->
      </div> 


   


   <!-- <input type="file" id="fileselect" accept="image/*" name="fileselect" /> -->

   <!-- <label for="file-upload" class="custom-file-upload">
        Upload
   </label>
   <input id="file-upload" type="file" name="test"/> -->

   


      <div class="inputfield">
        <input type="submit" value="Enregistrer" class="btn" name="valider" >
      </div>
    </div>
</div>

</form>
  <?php if(!empty($erreur)) {?>
<div>
    <?=$erreur ?>
</div>
<?php }?>
</body>
</html>

