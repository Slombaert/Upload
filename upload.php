<?php
if(isset($_POST['submit'])){
    if(count($_FILES['upload']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {

            //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
            $types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];

            if ($_FILES['upload']['size'][$i] > 1000000) {
                $errors['size'] = 'La taille du fichier dépasse 1Mo';
            }

            elseif (!in_array($_FILES['upload']['type'][$i], $types)) {
                $errors['type'] = 'Le type de fichier est incorrect';
            }

            else {
                $fileName = 'image' . rand() . '.' . pathinfo($_FILES['upload']['name'][$i], PATHINFO_EXTENSION);
                $moveResult [] = move_uploaded_file($_FILES['upload']['tmp_name'][$i], 'img/' . $fileName);
            }
        }
    }

    echo "<h1>Uploaded:</h1>";

    if(is_array($moveResult)){

        echo "<ul>";
        foreach($_FILES['upload']['name'] as $result){
            echo "<li>$result</li>";
        }
        echo "</ul>";
    }
    //show success message
    $images = array_diff(scandir('img'), array('.', '..'));
}


header('Location: index.php');