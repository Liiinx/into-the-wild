<?php
/**
 * Created by IntelliJ IDEA.
 * User: bobbylatruffe
 * Date: 04/11/18
 * Time: 16:38
 */

namespace Controller;


class Utils
{

    public function generateToken()
    {
        $alphabet = "abcdefghijklmnopqrstuvwxyz";
        return bin2hex(bin2hex($alphabet));

    }

}