<div class="section">
    <h1>Create Categories</h1>
    <?=Utils::isIndentify()?>
</div>
<div class="form">
<?php if(isset($_SESSION['category']) && $_SESSION['category'] == 'complete'):?>
<p class="alert_green">La categoria se ha registrado correctamente correctamente</p>
<?php elseif(isset($_SESSION['category']) && $_SESSION['category'] == 'fail'):?>
    <p class="alert_red">La categoria no se ha registrado correctamente</p>
<?php endif;?>
<?php Utils::unsetSession('category')?>
    <form action="<?= base_url ?>categoria/save" method="post" class="form">

        <label for="name">Name</label>
        <input type="text" name="name">
        <br>
        <input type="submit" value="Send data">

    </form>
    <a href="<?=base_url?>categoria/ver" class="button button_small">Ver todas las categorias</a>
</div>