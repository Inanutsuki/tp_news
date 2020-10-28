<?php

namespace App\Controller;

use App\Model\Database\DatabasePDO;
use App\Model\Entity\News;
use App\Model\Manager\NewsManager;

class AppController extends BaseController
{
    public function home()
    {
        $title = "Accueil";
        $data = [
            'title' => $title,
        ];
        $this->render("home.html.php", $data);
    }

    public function newsList()
    {
        $title = "News";
        $db = DatabasePDO::dbConnect();
        $NewsManager = new NewsManager($db);
        $newsList = $NewsManager->getNewsList();
        $data = [
            'title' => $title,
            'newsList' => $newsList
        ];
        $this->render("newsList.html.php", $data);
    }

    public function news()
    {
        $db = DatabasePDO::dbConnect();
        $NewsManager = new NewsManager($db);
        if (isset($_GET['id'])); {
            $id = $_GET['id'];
        }
        $news = $NewsManager->getNewsInfos($id);
        $title = $news->title();
        $data = [
            'title' => $title,
            'news' => $news
        ];
        $this->render("news.html.php", $data);
    }

    public function newsManagement()
    {
        if (isset($_POST['author']) || isset($_POST['title']) || isset($_POST['content'])) {
            $this->updateNews();
        } else {
            $title = "Gestion des News";
            $db = DatabasePDO::dbConnect();
            $NewsManager = new NewsManager($db);
            $newsList = $NewsManager->getNewsList();
            $data = [
                'title' => $title,
                'newsList' => $newsList,
            ];
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $news = $NewsManager->getNewsInfos($id);
                $data['news'] = $news;
            }
            $this->render("newsManagement.html.php", $data);
        }
    }

    public function removeNews()
    {
        $title = "Gestion des News";
        $db = DatabasePDO::dbConnect();
        $NewsManager = new NewsManager($db);
        $newsList = $NewsManager->getNewsList();
        $data = [
            'title' => $title,
            'newsList' => $newsList,
        ];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $NewsManager->deleteNews($id);
            $this->render("newsManagement.html.php", $data);
        }
    }

    public function updateNews()
    {
        $title = "Gestion des News";
        $db = DatabasePDO::dbConnect();
        $NewsManager = new NewsManager($db);
        $newsUpdate = [
            'id' => $_GET['id'],
            'author' => $_POST['author'],
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ];
        $NewsManager->update($newsUpdate);

        $newsList = $NewsManager->getNewsList();
        $data = [
            'title' => $title,
            'newsList' => $newsList,
        ];
        $this->render("newsManagement.html.php", $data);
    }
}
