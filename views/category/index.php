<div class="section">
    <h1>Gestionar categorias</h1>
    <?=Utils::isIndentify()?>
</div>

<div class="table_cat">
<?php if(isset($_SESSION['deleted']) && $_SESSION['deleted'] == 'complete'):?>
<p class="alert_green">La categoria se ha borado correctamente</p>
<?php elseif(isset($_SESSION['deleted']) && $_SESSION['deleted'] == 'fail'):?>
    <p class="alert_red">La categoria no se ha borrado correctamente</p>
<?php endif;?>
<?php Utils::unsetSession('deleted')?>
<a href="<?=base_url?>categoria/create" class="button button_small">Crear categoria</a>
<table>
    <tr>
        <th>
            ID
        </th>
        <th>
            NOMBRE
        </th>
        <th>
            DELETE
        </th>
    </tr>
    <?php while($cat = $categorias->fetch_object()):?>
        <tr>
            <td>
                <?=$cat->id;?>
            </td>
            <td>
                <?=$cat->name;?>
            </td>
            <td>
                <a href="<?=base_url?>categoria/delete&id=<?=$cat->id?>" class="button_delete ">Borrar</a>
            </td>
        </tr>
    <?php endwhile;?>
</table>
</div>
