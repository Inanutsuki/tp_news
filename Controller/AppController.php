<?php

namespace App\Controller;

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
}