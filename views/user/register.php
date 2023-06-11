<div class="section">
    <h1>Sign in</h1>
</div>
<div class="form">
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
<p class="alert_green">El usuario se ha registrado correctamente</p>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'fail'):?>
    <p class="alert_red">El usuario no se ha registrado correctamente</p>
<?php endif;?>
<?php Utils::unsetSession('register')?>
<form action="<?=base_url?>user/save" method="post" class="form">
    <label for="name">Name</label>
    <input type="text" name="name">
    <br>
    <label for="surname">Surname</label>
    <input type="text" name="surname">
    <br>

    <label for="email">Email</label>
    <input type="email" name="email">
    <br>

    <label for="password">Password</label>
    <input type="password" name="password">
    <br>

    <input type="submit" value="Send data">

</form>
</div>

