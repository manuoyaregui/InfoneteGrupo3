<?php

class IFrameController
{
    private $render;

    public function __construct($render){
        $this->render = $render;
    }

    public function execute(){
        echo $this->render->render("view/frames/defaultFrameView.mustache");
    }


    /*ACCIONES PRODUCTO*/
    public function crearProducto(){
        if( !isset($_SESSION['rol']) || $_SESSION['rol']['nombre'] == 'LECTOR' )
            $this->render->redirect('/');
        else
            echo $this->render->render("view/frames/crearProductoView.mustache");
    }
    public function editarProducto(){
        if( !isset($_SESSION['rol']) || $_SESSION['rol']['nombre'] == 'LECTOR' )
            $this->render->redirect('/');
        else echo $this->render->render("view/frames/editarProductoView.mustache");
    }
    public function eliminarProducto(){
        if( !isset($_SESSION['rol']) || $_SESSION['rol']['nombre'] == 'LECTOR' )
            $this->render->redirect('/');
        else echo $this->render->render("view/frames/eliminarProductoView.mustache");
    }

    /*ACCIONES PARA EDICIONES*/
    public function crearEdicion(){
        if( !isset($_SESSION['rol']) || $_SESSION['rol']['nombre'] == 'LECTOR' )
            $this->render->redirect('/');
        else
            echo $this->render->render("view/frames/crearProductoView.mustache");
    }
    public function editarEdicion(){
        if( !isset($_SESSION['rol']) || $_SESSION['rol']['nombre'] == 'LECTOR' )
            $this->render->redirect('/');
        else echo $this->render->render("view/frames/editarProductoView.mustache");
    }
    public function eliminarEdicion(){
        if( !isset($_SESSION['rol']) || $_SESSION['rol']['nombre'] == 'LECTOR' )
            $this->render->redirect('/');
        else echo $this->render->render("view/frames/eliminarProductoView.mustache");
    }

    /*ACCIONES PARA ARTICULOS*/
    public function crearArticulo(){
        if( !isset($_SESSION['rol']) || $_SESSION['rol']['nombre'] == 'LECTOR' )
            $this->render->redirect('/');
        else
            echo $this->render->render("view/frames/crearProductoView.mustache");
    }
    public function editarArticulo(){
        if( !isset($_SESSION['rol']) || $_SESSION['rol']['nombre'] == 'LECTOR' )
            $this->render->redirect('/');
        else echo $this->render->render("view/frames/editarProductoView.mustache");
    }
    public function eliminarArticulo(){
        if( !isset($_SESSION['rol']) || $_SESSION['rol']['nombre'] == 'LECTOR' )
            $this->render->redirect('/');
        else echo $this->render->render("view/frames/eliminarProductoView.mustache");
    }

}