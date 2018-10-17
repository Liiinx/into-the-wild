<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 03/10/18
 * Time: 12:42
 */

namespace Model;


class AdminManager extends AbstractManager
{

    const TABLE = 'article';

    public function __construct($pdo)
    {
        parent::__construct(self::TABLE, $pdo);

    }



    // Ici des futures méthodes vont-arrivées.

}