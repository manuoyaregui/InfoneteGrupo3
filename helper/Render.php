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
        $data = array_merge( $data,$this->manejarDatosDeSesion() );

        $contentAsString =  file_get_contents($contentFile);
        return  $this->mustache->render($contentAsString, $data);
    }

    public function redirect($destination){
        header("'location: ".$destination ."'");
        exit();
    }

    private function estaElUsuarioLogeado():bool{
        return  isset($_SESSION['usuario']) &&
                !empty($_SESSION['usuario']);
    }

    private function manejarDatosDeSesion():array{
        $data = array();

        $data['isLogged'] = $this->estaElUsuarioLogeado();

        if($data['isLogged']){
            //Roles
            if (isset($_SESSION['rol'])) {
                $rolUsuario = $_SESSION['rol']['nombre'];
                $data['rol'] = $rolUsuario;
                switch ($rolUsuario) {
                    case 'ADMINISTRADOR':
                        $data['esAdmin'] = true;
                        $data['esEditor'] = false;
                        $data['esEscritor'] = false;
                        $data['esLector'] = true;
                        break;
                    case 'EDITOR':
                        $data['esEditor'] = true;
                        $data['esEscritor'] = false;
                        $data['esLector'] = true;
                        break;
                    case 'ESCRITOR':
                        $data['esEscritor'] = true;
                        $data['esLector'] = true;
                        break;
                    case 'LECTOR':
                        $data['esLector'] = true;
                        break;
                }
            }
        }
        return $data;
    }
}