<?php
    namespace Controllers;

    use Models\Client as Client;
    use DAO\ClientDAO as ClientDAO;
    use \Exception as Exception;

    class ClientController{
        private $clientDao;

        public function __construct() {
            $this->clientDao = new ClientDAO();
        }

        public function ShowClient()
        {
            session_start();
            if(isset($_SESSION["loggedUser"]))
            {
                try{
                    $clients = $this->clientDao->getAll();
                    include VIEWS_PATH . "showCostumers.php";
                }
                catch(Exception $e)
                {
                    echo($e);
                }
            }else
            include VIEWS_PATH . "home.php";
        }

        public function AddClient($name="", $phone="")
        {
            session_start();
            if(isset($_SESSION["loggedUser"])){
                try{
                    $this->clientDao->Add($name,$phone);
                    $clients = $this->clientDao->getAll();
                    include VIEWS_PATH . "showCostumers.php";
                }
                catch(Exception $e)
                {
                    echo($e);
                }
            }else
            include VIEWS_PATH . "home.php";
        }
        
        public function Delete($id)
        {
            session_start();
            if(isset($_SESSION["loggedUser"])){
                try{
                    $this->clientDao->remove($id);
                    $clients = $this->clientDao->getAll();
                    include VIEWS_PATH . "showCostumers.php";
                }
                catch(Exception $e)
                {
                    echo($e);
                }
            }else
            include VIEWS_PATH . "home.php";
        }
        
        
    }   
?>