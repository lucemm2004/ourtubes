<?php

namespace App\Models;

class AlbumModel extends Model
{
    protected $id;
    protected $idCategory;
    protected $idUser;
    protected $name;
    protected $title;
    protected $year;
    protected $link_youtube;

    public function __construct()
    {
        $this->table = "album";
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idCategory
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set the value of idCategory
     *
     * @return  self
     */
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of link_youtube
     */
    public function getLink_youtube()
    {
        return $this->link_youtube;
    }

    /**
     * Set the value of link_youtube
     *
     * @return  self
     */
    public function setLink_youtube($link_youtube)
    {
        $this->link_youtube = $link_youtube;

        return $this;
    }
}
