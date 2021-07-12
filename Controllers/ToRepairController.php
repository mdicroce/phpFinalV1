<?php
    namespace Controllers;

    use Models\User as User;
    use Models\client as Client;
    use Models\ToRepair as ToRepair;
    use DAO\ToRepairDAO as toRepairDAO;
    use DAO\ClientDAO as ClientDAO;
    use \Exception as Exception;

    class ToRepairController{
        private $toRepairDao;
        private $clientDao;
        public function __construct()
        {
            $this->toRepairDao = new toRepairDAO();
            $this->clientDao = new ClientDAO();
        }

        public function ShowJobs ($idContact = "")
        {
            session_start();
            if(isset($_SESSION['loggedUser']))
            {
                try{
                    $works = $this->toRepairDao->getWorkFrom($idContact, $_SESSION['loggedUser']->getId());
                    include_once VIEWS_PATH . "showJobs.php";
                }
                catch(Exception $er)
                {
                    echo $er;
                }
            }
            else
            include_once VIEWS_PATH . "home.php";
        }
        public function ShowAddJobView(){
            session_start();
            if(isset($_SESSION['loggedUser'])){
                try {
                    $clients = $this->clientDao->getAll();
                    include_once VIEWS_PATH . "addJobs.php";
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }else
            include_once VIEWS_PATH . 'home.php';
        }
        public function addJob($state, $name, $tecnico, $client)
        {
            session_start();
            
            if(isset($tecnico))
            {
                try{
                    $this->toRepairDao->add($state, $name, $tecnico, $client);
                    $works = $this->toRepairDao->getWorkFrom("",$_SESSION['loggedUser']->getId());
                    include_once VIEWS_PATH . "showJobs.php";
                }
                catch(Exception $er)
                {
                    echo $er;
                }
            }
            else
            include_once VIEWS_PATH . "home.php";
        }
        public function UpdateState($id, $state, $name)
        {
            session_start();
            if(isset($_SESSION['loggedUser']))
            {
                try{
                    $this->toRepairDao->modify($id,$name,$state);
                    $works = $this->toRepairDao->getWorkFrom("",$_SESSION['loggedUser']->getId());
                    include_once VIEWS_PATH . "showJobs.php";
                }
                catch(Exception $er)
                {
                    echo $er;
                }
            }
            else
            include_once VIEWS_PATH . "home.php";
        }


    }

?>