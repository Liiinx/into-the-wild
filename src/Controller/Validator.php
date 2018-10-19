<?php

namespace Controller;

/**
 * Class Validator
 * Cette classe sert à faire des validations de champs.
 * @package Controller
 * @copyright 2018 MARGERIT Frédéric
 */

class Validator {

    /**
     * sert à contenir les données de manière temporaire.
     * @var string $data
     */
    private $data;

    /**
     * Sert à contenir les erreurs
     * @var array $errors

     */
    private $errors = [];

    /**
     * Sert à récupérer les données.
     * @param array $data
     */

    public function sendData(array $data){
        $this->data = $data;
    }    /**
     * @param string $data
     * @return Validator
     */
    public function setData(string $data): Validator
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Sert à verifier si le champs demander est bien dans la data
     * @param $field
     * @return null
     */
    public function getField($field){
        if(!isset($this->data[$field])){
            return null;
        }
        return $this->data[$field];
    }

    /**
     * Verifie si le champ et vide ou pas
     * @param $value
     * @return bool
     */

    public function isNotEmpty($value){
        if(empty(trim($this->getField($value)))){
            $this->errors[$value] = "Le champ $value n'est pas valide !";
            return false;
        }
        return true;
    }

    /**
     * Verifie si le champs et alphaNumerique
     * @param $value
     * @return bool
     */

    public function isAlpha($value){
        if(!preg_match('/^[a-zA-Z]+$/', $this->getField($value))){
                $this->errors[$value] = "Le champ $value n'est pas valide";
            return false;
        }
        return true;
    }


    /* Validation d'adresse email */
    public function isEmail($value){
        if(!filter_var($this->getField($value), FILTER_VALIDATE_EMAIL)){
            $this->errors[$value] = "Merci de mettre une adresse email valide !";
            return false;
        }
        return true;
    }

    /**
     * Fonction qui sert à verifier si deux valeurs sont les mêmes ou non
     * @param string $first
     * @param string $last
     * @return bool
     */
    public function isSame(string $first, string $last){

        if($this->getField($first) != $this->getField($last)){
            $this->errors["confirmation"] = "Le champ $first n'est pas le même que $last";
            return false;
        }
        return true;
    }

    /**
     * Récupération des erreurs
     * @return array
     */

    public function getErrors(){
        if(!empty($this->errors)){
            return $this->errors;
        }
    }

    public function setErrors($errorMsg){
        array_push($this->errors, $errorMsg);
        return false;
    }

}