<?php
    include_once("./Views/header.php");
?>

        <main>
        <a href="<?php FRONT_ROOT?>ShowAddJobView">Add new job</a>
            <table>
                <thead>
                    <tr>
                        <th>Name of the product</th>
                        <th>State</th>
                        <th>Client Name</th>
                        <th>Client Phone</th>
                        <th>Update State</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php 
                        foreach($works as $work)
                        {
                            echo('<tr><form action='.FRONT_ROOT.'ToRepair/UpdateState method="post">');
                            echo('<th>'.$work->getName().'</th>');
                            ?>
                            <th>
                                <input type="hidden" name="id" value='<?php echo($work->getId())?>'>
                                <select name="updatedState" id="">
                                    <option value="just-arrived" <?php echo("just-arrived" == $work->getState()?"selected" : "")?>>Just arrived</option>
                                    <option value="in-review" <?php echo("in-review" == $work->getState()?"selected" : "")?>>In review</option>
                                    <option value="in-repair" <?php echo("in-repair" == $work->getState()?"selected" : "")?>>In Repair</option>
                                    <option value="job-done" <?php echo("job-done" == $work->getState()?"selected" : "")?>>Job done</option>
                                </select>'
                                <input type="hidden" name="name" value='<?php echo($work->getName())?>'>
                            </th>
                            <?php 
                            echo('<th>'.$work->getClient()->getName().'</th>');
                            echo('<th>'.$work->getClient()->getPhone().'</th>');
                            echo('<th><button type="submit">Update State</button>');
                            echo('</form></tr>');
                        }
                    ?>
                </tbody>
            </table>
            <a href="<?php echo(FRONT_ROOT)?>User/ShowTecnicoPanel">go BACK</a>
        </main>
    </body>
</html>