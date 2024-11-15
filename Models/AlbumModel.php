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
}
