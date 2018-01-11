<!DOCTYPE html>
<html lang='pt-BR'>
    <head>
        <?php require 'header.php';?>
        <title>Imobille Site</title>

        <link rel='stylesheet' type='text/css' href='resources/js/slick/slick.css'/>
        <link rel='stylesheet' type='text/css' href='resources/js/slick/slick-theme.css'/>
        
        <script src='resources/js/jquery.js'></script>
        <script src='resources/js/jquery-ui.js'></script>
        <script type='text/javascript' src='resources/js/slick/slick.js'></script>
        <script type='text/javascript' src='resources/js/home.js'></script>
    </head>
    <body>
        <div class="page">
            <?php require 'navbar.php';?>
            <div class="content">
                <?php require 'pelicula.php';?>
                <?php require 'loading.php';?>
                <?php require 'cover.php';?>

                <div class="content-render">
                    <p class="box-title">Lançamentos</p>
                    <div id="lancamentos" class="box"></div>

                    <p class="box-title">Usados</p>
                    <div id="usados" class="box"></div>
                    
                    <p class="box-title">Aluguel</p>
                    <div id="aluguel" class="box"></div>
                </div>

            </div>
        </div>
    </body>
</html>