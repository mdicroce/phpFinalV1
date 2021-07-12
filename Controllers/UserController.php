<?php
    namespace Controllers;

    use Models\User as User;
    use DAO\UserDAO as UserDAO;
    use \Exception as Exception;

    class UserController{
        private $userDao;

        public function __construct() {
            $this->userDao = new UserDAO();
        }


        public function Login($username, $password){
            try{
                $usuarios = $this->userDao->getAll();
            }
            catch(Exception $e)
            {
                echo($e);
                throw($e);
            }
            $usuarioRegistrado = array_filter($usuarios, fn($actual)=> $actual->getUsername() == $username && $actual->getPassword() == $password);
    
            if($usuarioRegistrado)
            {
                session_start();
                $_SESSION["loggedUser"] = array_shift($usuarioRegistrado);
                include VIEWS_PATH . "tecnicoPanel.php";
            }else
            include VIEWS_PATH . "home.php";          
        }
        public function ShowTecnicoPanel(){
            session_start();
            if(isset($_SESSION['loggedUser']))
            {
                include VIEWS_PATH . "tecnicoPanel.php";
            }
            else
            include VIEWS_PATH . "home.php";
        }
        

        
    }
                 
?>