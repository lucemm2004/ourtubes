<?php

namespace App\Core;

class Form
{
    private $formCode = "";

    /**
     * génère le formulaire HTML
     * @return string
     */
    public function create()
    {
        return $this->formCode;
    }

    /**
     * valide si tous les champs proposes sont remplis
     * $form, c'est le $_POST
     * @param array $form
     * @param array $champs tableau listant les champs obligatoires
     * @return bool
     */
    public static function validate(array $form, array $champs)
    {
        // var_dump($form);
        // var_dump($champs);

        // en static pour pouvoir l'interroger sans instancier l'objet
        // on récupère le formulaire ds un $_GET ou $_POST
        // on parcourt les champs
        foreach ($champs as $champ) {
            // on verifie si le champ est absent ou vide ds le formulaire
            if (!isset($form[$champ]) || empty($form[$champ])) {
                // on sort en etournant false
                return false;
            }
        }
        return true;
    }

    /**
     * ajoute les attributs envoyés à la balise
     * @param array $attributs taleau associatif ['class' => 'form-control', 'required' => true]
     * @return string
     */
    private function ajoutAttributs(array $attributs): string
    {
        $str = '';

        // on liste les attributs courts
        $courts = ['checked', 'disabled', 'readonly', 'multiple', 'required', 'autofocus', 'novalidate', 'formnovalidate'];

        // on boucle sur le tableau des attributs
        foreach ($attributs as $attribut => $valeur) {
            // si l'attribut est ds la liste des attributs courts
            if (in_array($attribut, $courts) && $valeur == true) {
                $str .= " $attribut";
            } else {
                // on ajoute $attribut = '$valeur'
                $str .= " $attribut = \"$valeur\"";
            }
        }
        return $str;
    }

    /**
     * on crée la balise d'ouverture du formulaire
     * @param string $methode get ou post
     * @param string $action
     * @param array $attributs
     * @return self
     */
    public function debutForm(string $methode = 'post', string $action = "#", array $attributs = []): self
    {
        // die('debutForm');

        $this->formCode .= "<form action='$action' method='$methode'";
        // var_dump($this->formCode);
        // die;

        // on ajoute les attributs éventuels
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) . '>' : '>';

        // die($this->formCode);

        return $this;   // permet d'enchainer les différentes méthodes
    }

    /**
     * balise de fermeture du formulaire
     * @return self
     */
    public function finForm(): self
    {
        $this->formCode .= "</form>";
        return $this;
    }

    /**
     * ouverture d'une balise div
     * @param array $attributs
     * @return self
     */
    public function debutDiv(array $attributs = []): self
    {
        $this->formCode .= "<div ";

        // on ajoute les attributs éventuels
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) . '>' : '>';

        return $this;
    }

    /**
     * balise de fermeture de la div
     * @return self
     */
    public function finDiv(): self
    {
        $this->formCode .= "</div>";
        return $this;
    }

    /**
     * ajout d'un label
     * @param string $for
     * @param string $texte
     * @param array $attributs
     * @return self
     */
    public function ajoutLabelFor(string $for, string $texte, array $attributs = []): self
    {
        // on ouvre la balise
        $this->formCode .= "<label for='$for'";
        // on ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        // on ajoute le texte et on ferme la balise
        $this->formCode .= ">$texte</label>";

        return $this;
    }

    /**
     * ajout d'un input
     * @param string $type
     * @param string $nom
     * @param array $attributs
     * @return self
     */
    public function ajoutInput(string $type, string $nom, array $attributs = []): self
    {
        // on ouvre la balise
        $this->formCode .= "<input type='$type' name='$nom'";
        // on ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) . ">" : ">";

        return $this;
    }

    /**
     * ajout d'un textarea
     *
     * @param string $nom
     * @param string $valeur
     * @param array $attributs
     * @return self
     */
    public function ajoutTextarea(string $nom, string $valeur = "", array $attributs = []): self
    {
        // on ouvre la balise
        $this->formCode = "<textarea nom='$nom'";
        // on ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        // on ajoute la valeur et on ferme la balise
        $this->formCode .= ">$valeur</textarea>";

        return $this;
    }

    /**
     * ajout d'un select
     * @param string $nom
     * @param array $options
     * @param array $attributs
     * @return self
     */
    public function ajoutSelect(string $nom, array $options, array $attributs = []): self
    {
        // on ouvre la balise select
        $this->formCode .= "<select name='$nom'";
        // on ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) . ">" : '>';
        // on ajoute les options
        foreach ($options as $valeur => $texte) {
            $this->formCode .= "<option value=\"$valeur\">$texte</option>";
        }
        // on ferme le select
        $this->formCode .= "</select>";

        // var_dump($this->formCode);
        // die();

        return $this;
    }

    /**
     * ajout d'un bouton
     * @param string $texte
     * @param array $attributs
     * @return self
     */
    public function ajoutBouton(string $texte, array $attributs = []): self
    {
        $this->formCode .= "<button ";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        $this->formCode .= ">$texte</button>";

        return $this;
    }
}
