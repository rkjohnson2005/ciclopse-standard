<?php
/**
 * Created by PhpStorm.
 * User: Rick
 * Date: 10/15/2018
 * Time: 10:40 AM
 */

namespace CICLOPSE;


class Standard implements \StandardInterface
{
    public function getLink($url, $display, $class = '')
    {
        $link = vsprintf("<a class='%s' href='%s'>%s</a>", [$class, $url, $display]);
        return $link;
    }
}