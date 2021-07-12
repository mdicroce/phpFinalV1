<?php
    include_once("./Views/header.php");
?>

<main>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>¿Delete?</th>
            </tr>
        </thead>
        <tbody>
    
    
            <?php
                if(isset($clients))
                {
                    foreach($clients as $client)
                    {
                        echo("<tr>");
                        echo("<td>".$client->getName()."</td>");
                        echo("<td>".$client->getPhone()."</td>");
                        ?>
                        <td>
                            <form action="<?php echo(FRONT_ROOT)?>Client/Delete" method="post">
                                <input type="hidden" name="idToDelete" value=<?php echo($client->getId())?>>
                                <button type="submit">DELETE</button>
                            </form>
                        </td>
                        <?php
                    }
                }
            ?>
            <tr>
                <form action="<?php echo(FRONT_ROOT)?>Client/AddClient" method="post">
                    <th><input type="text" name="name" id=""></th>
                    <th><input type="text" name="phone"></th>
                    <th><button type="submit">Crear Nuevo Cliente</button>
                </form>
            </tr>
        </tbody>
    </table>
    <a href="<?php echo(FRONT_ROOT)?>User/ShowTecnicoPanel">go BACK</a>
</main>

</body>
</html>