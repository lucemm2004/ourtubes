<?php

namespace App\Models;

class UserModel extends Model
{
    protected $id;
    protected $pseudo;
    protected $password_hash;
    protected $roles;

    public function __construct()
    {
        $this->table = "user";
    }

    /**
     * recupere un user à partir de son pseudo (on la met là expres car specifique à user model)
     * @param string $pseudo
     * @return mixed
     */
    public function findOneByPseudo(string $pseudo)
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE pseudo = ?", [$pseudo])->fetch();
    }

    /**
     * crée la session de l'utilisateur
     * @return void
     */
    public function setSession()
    {
        $_SESSION['user'] = [
            'id' => $this->id,
            'pseudo' => $this->pseudo,
            'roles' => $this->roles
        ];
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

    /**
     * Get the value of roles
     */
    public function getRoles(): array
    {
        $roles =  $this->roles;
        $roles[] = "ROLE_USER";
        return array_unique($roles);
    }

    /**
     * Set the value of roles
     *
     * @return  self
     */
    public function setRoles($roles)
    {
        // en base de donnees pour le champ roles on a du json
        $this->roles = json_decode($roles);

        return $this;
    }
}
