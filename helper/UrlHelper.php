<?php

class UrlHelper
{
    public function getModuleFromRequestOr($default){
        return !empty($_GET["module"]) ? $_GET["module"] : $default;
    }

    public function getActionFromRequestOr($default){
        return !empty($_GET["action"]) ? $_GET["action"] : $default;
    }
}