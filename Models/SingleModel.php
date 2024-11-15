<?php

namespace App\Models;

class SingleModel extends Model
{
    protected $id;
    protected $idUser;
    protected $idCategory;
    protected $name;
    protected $title;
    protected $year;
    protected $idAlbum;
    protected $link_youtube;

    public function __construct()
    {
        $this->table = "single";
    }
}
