<?php

use App\Model\ViewHelpers\UI;

foreach ($newsList as $news) {
?>
    <div class="container">
        <div class="row">
            <h2>
                <?= $news->title() ?>
            </h2>
            <div class="news_content">
                <?= UI::truncate($news->content(), 200) ?>
            </div>
            <div class="infos_content">
                <p class="author">Ajouté par : <?= $news->author() ?>, le <?= $news->dateAdded() ?>. <a href="index.php?action=news&id=<?= $news->id() ?>" class="full_content">Lire la suite</a></p>
            </div>
            
        </div>
    </div>
<?php
}
?>