<!DOCTYPE html>
<html lang='pt-BR'>
    <head>
        <?php require 'header.php';?>
        <script src='../resources/home/js/home.js'></script>
        <link rel='stylesheet' href='../resources/home/css/home.css' />
        <title>Imobille Site</title>

        <?php require 'slider.php';?>
    </head>
    <body>
        <div class="page">
            <?php require 'navbar.php';?>
            <div class="content">
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