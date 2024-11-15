<?php

namespace App\Models;

use App\Core\Db;

class Model extends Db
{
    // table de la base de données
    protected $table;
    // instance de la db
    private $db;

    public function findAll(string $orderBy = "")
    {
        $query = $this->requete('SELECT * FROM ' . $this->table . $orderBy);
        return $query->fetchAll();
    }

    public function findBy(array $criteres, string $orderBy = "")
    {
        // select * from clients where nom = ?
        // bindValues(1, valeur)
        // on explose les criteres en séparant champs et valeurs
        $champs = [];
        $valeurs = [];
        foreach ($criteres as $champ => $valeur) {
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }
        // on transforme le tableau champs en une chaine de caracteres
        $liste_champs = implode(' AND ', $champs);
        // echo ('<p>liste champs => ' . $liste_champs . '</p>');
        // var_dump($valeurs);

        // on exécute a requete
        return $this->requete('SELECT * FROM ' . $this->table . ' WHERE ' . $liste_champs . $orderBy, $valeurs)->fetchAll();
    }

    public function find(int $id)
    {
        return $this->requete("SELECT * FROM $this->table WHERE id = $id")->fetch();
    }

    public function findBetweenDate() {}

    public function findBetweenDateTime(array $valeurs)
    {
        // $sql = "SELECT * FROM $this->table WHERE DateCde >= ? AND DateCde < ? AND user_id = ?";
        $sql = "SELECT * FROM $this->table WHERE DateCde >= ? AND DateCde < ?";
        return $this->requete($sql, $valeurs);
    }

    public function create()
    {
        // var_dump($this);
        // die();


        // insert into clients (nom, adresse, ...) VALUES (?, ?, ...)
        // on explose les criteres en séparant champs et valeurs
        $champs = [];
        $inter = [];    // liste des points d'interrogation
        $valeurs = [];
        foreach ($this as $champ => $valeur) {
            if ($valeur !== null && $champ != 'db' && $champ != 'table') {
                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }
        // on transforme le tableau champs en une chaine de caracteres
        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);

        // var_dump($valeurs);
        // die();

        // on exécute a requete
        return $this->requete('INSERT INTO ' . $this->table . ' (' . $liste_champs . ') VALUES(' . $liste_inter . ')', $valeurs);
    }

    public function update()
    {
        //alert('Model.php - update');

        // update clients set nom = ?, adresse = ?, ... WHERE id = ?
        // on explose les criteres en séparant champs et valeurs
        $champs = [];
        $valeurs = [];

        // var_dump(champs);        //Ne fonctionne pas!
        // die();

        foreach ($this as $champ => $valeur) {
            if ($valeur !== null && $champ != 'db' && $champ != 'table') {
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        // $valeurs[] = $this->id;
        // on transforme le tableau champs en une chaine de caracteres
        $liste_champs = implode(', ', $champs);
        // on exécute a requete
        return $this->requete('UPDATE ' . $this->table . ' SET ' . $liste_champs . ' WHERE id = ?', $valeurs);
    }

    public function updateKeyVal(string $key, string $val)
    {
        //alert('Model.php - update');

        // update clients set nom = ?, adresse = ?, ... WHERE id = ?
        // on explose les criteres en séparant champs et valeurs
        $champs = [];
        $valeurs = [];

        // var_dump(champs);        //Ne fonctionne pas!
        // die();

        foreach ($this as $champ => $valeur) {
            if ($valeur !== null && $champ != 'db' && $champ != 'table') {
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        // $valeurs[] = $this->id;
        $valeurs[] = $val;
        // on transforme le tableau champs en une chaine de caracteres
        $liste_champs = implode(', ', $champs);
        // on exécute a requete
        return $this->requete("UPDATE " . $this->table . " SET " . $liste_champs . " WHERE {$key} = ?", $valeurs);
    }


    public function delete(int $id)
    {
        return $this->requete("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function deleteKeyVal(string $key, string $val)
    {
        return $this->requete("DELETE FROM {$this->table} WHERE {$key} = ?", [$val]);
    }


    public function requete(string $sql, array $attributs = null)
    {
        // echo ('<p>sql => ' . $sql . '</p>');
        // die();
        // echo ('<p>attributs => ' . $attributs . '</p>');

        // on récupère l'instance de db
        $this->db = Db::getInstance();
        // on vérifie si on a des attributs
        if ($attributs !== null) {
            // on a une requete préparée
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            // requete simple
            // var_dump($sql);

            return $this->db->query($sql);
        }
    }

    public function hydrate($donnees)
    {
        // consiste à passer les données d'un tableau issu d'un form p.ex à l'objet lui-même
        foreach ($donnees as $key => $value) {
            // on récupère le nom du setter correspondant à la clé
            // nom -> setNom
            $setter = 'set' . ucfirst($key);    //uppercase first
            // on verifie si le setter existe ($this represente l'objet model instancié)
            if (method_exists($this, $setter)) {
                // on appelle le setter
                $this->$setter($value);
            }
        }
        return $this;        //return de l'objet hydraté
    }
}
