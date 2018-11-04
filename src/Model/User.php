<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 03/10/18
 * Time: 12:43
 */

namespace Model;


class User
{
    private $id;
    private $name;
    private $firstname;
    private $mail;
    private $status_id;
    private $password;
    private $confirmation_token;
    private $is_validate;

    /**
     * @return mixed
     */
    public function getConfirmationToken()
    {
        return $this->confirmation_token;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getStatusId()
    {
        return $this->status_id;
    }

    /**
     * @param mixed $status_id
     */
    public function setStatusId($status_id)
    {
        $this->status_id = $status_id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $confirmation_token
     */
    public function setConfirmationToken($confirmation_token)
    {
        $this->confirmation_token = $confirmation_token;
    }


    public function getAll(){
        return [
            'id' => $this->id,
            'name' => $this->name,
            'firstname' => $this->firstname,
            'mail' => $this->mail,
            'status_id' => $this->status_id,
        ];
    }

    /**
     * @return mixed
     */
    public function getisValidate()
    {
        return $this->is_validate;
    }

    /**
     * @param mixed $is_validate
     */
    public function setIsValidate($is_validate)
    {
        $this->is_validate = $is_validate;
    }

}