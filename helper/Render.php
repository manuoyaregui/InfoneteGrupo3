<?php

class Render{
    private $mustache;

    public function __construct($partialsPathLoader){
        Mustache_Autoloader::register();
        $this->mustache = new Mustache_Engine(
            array(
            'partials_loader' => new Mustache_Loader_FilesystemLoader( $partialsPathLoader )
        ));
    }

    public function render($contentFile , $data = array() ){
        $contentAsString =  file_get_contents($contentFile);
        if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario']))
            $data['isLogged'] = true;
        else
            $data['isLogged'] = false;
        return  $this->mustache->render($contentAsString, $data);
    }
}