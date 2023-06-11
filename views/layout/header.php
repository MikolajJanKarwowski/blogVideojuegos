<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games blog</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css">
</head>

<body>
    <div id="container">
        <header id="header">
            <div id="logo">
                <h1>Games blog</h1>
                <img src="<?=base_url?>assets/img/logo.png" alt="Photo logo web" >
            </div>
           
        </header>
        <nav id="menu">
            <ul>
                <li><a href="<?=base_url?>">Principal</a></li>
                <li><a href="<?=base_url?>user/register">Sing in</a></li>
                <li><a href="<?=base_url?>user/login">Log in</a></li>
                <li><a href="<?=base_url?>user/logout">Log out</a></li>
                <?php if(isset($_SESSION['admin'])):?>
                    <li><a href="<?=base_url?>categoria/index">Categorias</a></li>
                    <li><a href="<?=base_url?>news/create">Create New</a></li>
                <?php endif;?>
                <?php $categorias = Utils::getCategories();?>
                <?php if(isset($categorias) && is_object($categorias)):?>
                    <?php while($cat = $categorias->fetch_object()):?>
                        <li><a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->name?></a></li>
                    <?php endwhile;?>
                <?php endif;?>
            </ul>
            
        </nav>
        <div id="content">