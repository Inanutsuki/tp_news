<?php

namespace App\Model\Manager;

use App\Model\Entity\News;
use PDO;

class NewsManager extends Manager
{

    public function getNewsList()
    {
        $req = $this->_db->query('SELECT * FROM news ORDER BY id');
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, News::class);

        $newsList = $req->fetchAll();

        return $newsList;
    }

    public function getNewsInfos($id)
    {
        $req = $this->_db->prepare('SELECT * FROM news WHERE id = '.$id.'');
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, News::class);
        $req->execute();
        $news = $req->fetch();

        return $news;
    }

    public function deleteNews($id)
    {
        $req = $this->_db->prepare('DELETE FROM news WHERE id = :id');
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function update(array $news)
    {
        $req = $this->_db->prepare('UPDATE news SET author = :author, title = :title, content = :content, dateModif = NOW() WHERE id = :id');
        // $req->bindValue('id', $news->id(), PDO::PARAM_INT);
        // $req->bindValue('author', $news->author(), PDO::PARAM_STR);
        // $req->bindValue('title', $news->title(), PDO::PARAM_STR);
        // $req->bindValue('content', $news->content(), PDO::PARAM_STR);
        $req->execute($news);
    }
}
