<?php

class ErrorInfo
{
    public static function errorView($array) {
        foreach ($array as $error) {
            echo ("<li>$error</li>");
        }
    }
}