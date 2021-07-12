<?php
    include_once("./Views/header.php");
?>

        <main>
            <form action="<?php echo(FRONT_ROOT)?>ToRepair/addJob" method="post">
                <label for="state">State of the job</label>
                <input type="radio" name="state" value="just-arrived" checked> Just arrived
                <input type="radio" name="state" value="in-review"> In review
                <input type="radio" name="state" value="in-repair"> In repair
                <input type="radio" name="state" value="job-done"> Job done
                <label for="name">Name of the product</label>
                <input type="text" name="name">
                <?php 
                $pepe = $_SESSION['loggedUser']->getId();
                echo('<input type="hidden" name="tecnico" value="'.  $pepe . '">')
                
                ?>
                <select name="client" id="">
                    <?php
                        foreach($clients as $client)
                        {
                            ?><option value="<?php echo($client->getId())?>"><?php echo($client->getName())?></option>
                            <?php
                        }
                    ?>
                </select>
                <button type="submit">Add New Job</button>
            </form>
            <a href="<?php echo(FRONT_ROOT)?>User/ShowTecnicoPanel">go BACK</a>
        </main>
    </body>
</html>