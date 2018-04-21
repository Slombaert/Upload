<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>

<section>


    <form action="upload.php" enctype="multipart/form-data" method="post">

        <div>
            <label for='upload'>Ajouter des fichiers </label>
            <input id='upload' name="upload[]" type="file" multiple="multiple" />
        </div>

        <p><input type="submit" name="submit" value="Submit"></p>

    </form>

</section>

</body>
</html>
