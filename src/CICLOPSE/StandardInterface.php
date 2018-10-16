<?php
interface StandardInterface {
    public function getLink($url, $display, $class = '');
    public static function encode($object);
    public static function decode($object);
}