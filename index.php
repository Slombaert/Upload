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

        <p><input type="submit" name="submit" value="Envoyer"></p>

    </form>

</section>


<section>



    <div class="row">
        <?php
        $allImages = scandir('img/');
        $images = array_diff($allImages, array('.','..'));
        ?>

        <?php
        if (!empty($_GET['image'])) {
            if (file_exists('img/'.$_GET['image'])) {
                $deleteResult = unlink('img/'.$_GET['image']);
                header('Location: index.php');
            }
        }
        ?>

        <?php foreach ($images as $image): ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="<?= 'img/'.$image ?>" alt="<?= $image ?>">
                    <div class="caption">
                        <h3><?= $image ?></h3>
                        <p><a href="?image=<?= $image ?>" class="btn btn-danger" role="button">Supprimer</a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</section>


</body>
</html>
