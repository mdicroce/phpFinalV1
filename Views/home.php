<?php
    include_once("./Views/header.php");
?>
<main>
    <form action="<?php echo(FRONT_ROOT)?>User/Login" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="login-form-username">
        <label for="password">Password</label>
        <input type="password" name="password" id="login-form-password">
        <button type="submit">Login</button>
    </form>
    <a href="<?php echo(FRONT_ROOT)?>User/SignIn">Create New User</a>
</main>
</body>

</html>