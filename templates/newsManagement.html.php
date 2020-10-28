<?php

use App\Model\ViewHelpers\UI;
?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-9">
            <form action="index.php?action=newsManagement&id=<?= isset($news) ? $news->id() : '' ?>" method="POST">
                <div class="col-6">
                    <div class="form-group">
                        <label for="author">Auteur :</label>
                        <input name="author" type="text" class="form-control" id="author" value="<?= isset($news) ? $news->author() : '' ?>">
                        <label for="title">Titre :</label>
                        <input name="title" type="text" class="form-control" id="title" value="<?= isset($news) ? $news->title() : '' ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="content">Contenu de la news :</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"><?= isset($news) ? $news->content() : '' ?></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary btn-outline-dark">Publier</button>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Extrait du contenu</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($newsList as $news) {
                    ?>

                        <tr>
                            <th scope="row"><?= $news->id() ?></th>
                            <td><?= $news->author() ?></td>
                            <td><?= $news->title() ?></td>
                            <td><?= UI::truncate($news->content(), 20) ?></td>
                            <td><a href="index.php?action=newsManagement&id=<?= $news->id() ?>">Modifier</a></td>
                            <td><a href="index.php?action=removeNezs&id=<?= $news->id() ?>">Supprimer</a></td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>