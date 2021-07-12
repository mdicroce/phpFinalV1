<?php
    include_once('./Views/header.php');
    if(isset($_SESSION['loggedUser']))
    {
        $loggedUser = $_SESSION['loggedUser'];
    }
?>

        <main>
            <header>
                <h2>Welcome <?php echo($loggedUser->getName())?></h2>
            </header>
            <a href="<?php echo(FRONT_ROOT)?>Client/ShowClient">Show Clients / Add New Client</a>
            <a href="<?php echo(FRONT_ROOT)?>ToRepair/ShowJobs">Show Jobs</a>
        </main>
    </body>
</html>
