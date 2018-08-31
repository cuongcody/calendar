<?php 

class Controller{

    public function model($model){
            require_once '../app/models/' . $model . '.php';
            return new $model();
    }

    public function view($view, $data = []){
        //including the header, the view and the footer    
        require_once '../app/views/layout/header.php';
        require_once '../app/views/' . $view . '.php';
        require_once '../app/views/layout/footer.php';
    }

}
