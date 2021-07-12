<?php
    namespace Controllers;

    use \Exception as Exception;

    class HomeController{


        public function showHome($message = ""){
            include VIEWS_PATH."home.php";
        }
    }
                 
?>