<?php

namespace App\Model\Entity;

use DateTime;

class News
{

    // Attributs

    protected $errors = [];
    protected $_id;
    protected $_author;
    protected $_title;
    protected $_content;
    protected $_dateAdded;
    protected $_dateModif;

    // Constantes

    const AUTEUR_INVALIDE = 1;
    const TITRE_INVALIDE = 2;
    const CONTENU_INVALIDE = 3;

    // Construct

    public function __construct(?array $data = null)
    {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    // Function d'hydratation

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Methode magique

    public function __set($name, $value)
    {
        $property = "_" . $name;
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    // Getters

    public function id()
    {
        return $this->_id;
    }

    public function author()
    {
        return $this->_author;
    }

    public function title()
    {
        return $this->_title;
    }

    public function content()
    {
        return $this->_content;
    }
    public function dateAdded()
    {
        return $this->_dateAdded;
    }

    public function dateModif()
    {
        return $this->_dateModif;
    }

    // Setters

    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setAuthor($author)
    {
        if (!is_string($author) || empty($author)) {
            $this->errors[] = self::AUTEUR_INVALIDE;
        } else {
            $this->_author = $author;
        }
    }

    public function setTitle($title)
    {
        if (!is_string($title) || empty($title)) {
            $this->errors[] = self::TITRE_INVALIDE;
        } else {
            $this->_title = $title;
        }
    }

    public function setContent($content)
    {
        if (!is_string($content) || empty($content)) {
            $this->errors[] = self::CONTENU_INVALIDE;
        } else {
            $this->_content = $content;
        }
    }

    public function setDateAdded($dateAdded)
    {

        $this->_dateAdded = $dateAdded;
    }

    public function setDateModif($dateModif)
    {
        $this->_dateModif = $dateModif;
    }

    // Functions

    /**
     * Méthode permettant de savoir si la news est nouvelle.
     * @return bool
     */
    public function isNews()
    {
        return empty($this->_id);
    }

    /**
     * Méthode permettant de savoir si la news est valide.
     * @return bool
     */
    public function isValid()
    {
        return !(empty($this->_author) || empty($this->_title) || empty($this->_content));
    }
}
