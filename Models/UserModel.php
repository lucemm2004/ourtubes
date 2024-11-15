<?php

namespace App\Models;

class UserModel extends Model
{
    protected $id;
    protected $pseudo;
    protected $password_hash;

    public function __construct()
    {
        $this->table = "user";
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
     * Get the value of pseudo
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }


    /**
     * Get the value of password_hash
     */
    public function getPassword_hash()
    {
        return $this->password_hash;
    }

    /**
     * Set the value of password_hash
     *
     * @return  self
     */
    public function setPassword_hash($password_hash)
    {
        $this->password_hash = $password_hash;

        return $this;
    }
}
