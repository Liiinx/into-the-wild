<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 26/10/18
 * Time: 13:07
 */

namespace Model;


class Category
{
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
    private $id;
    private $name;
}