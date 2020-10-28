<div class="container">
    <div class="row">
        <h2 class="news_title"><?=$news->title()?></h2>
    </div>
    <div class="row">
        <div class="news_content">
            <p class="content"><?=$news->content()?></p>
            <p class="author">Ajouté par : <?= $news->author() ?>, le <?= $news->dateAdded() ?>.</p>
        </div>
    </div>
</div>