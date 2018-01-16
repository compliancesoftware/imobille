        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>

        <link rel="apple-touch-icon" sizes="57x57" href="../admin/resources/main/icone/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../admin/resources/main/icone/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../admin/resources/main/icone/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../admin/resources/main/icone/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../admin/resources/main/icone/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../admin/resources/main/icone/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../admin/resources/main/icone/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../admin/resources/main/icone/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../admin/resources/main/icone/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="../admin/resources/main/icone/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../admin/resources/main/icone/icon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../admin/resources/main/icone/icon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../admin/resources/main/icone/icon-16x16.png">
        <link rel="manifest" href="../admin/resources/main/icone/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="../admin/resources/main/icone/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <link rel='stylesheet' href='../admin/resources/main/js/jquery-ui.structure.css' />
        <link rel='stylesheet' href='../admin/resources/main/js/jquery-ui.theme.css' />
        <link rel='stylesheet' href='../admin/resources/main/js/jquery-ui.css' />

        <script src='../admin/resources/main/js/jquery.js'></script>
        <script src='../admin/resources/main/js/jquery-ui.js'></script>
        
        <link rel='stylesheet' type='text/css' href='../admin/resources/main/css/fontawesome/css/font-awesome.css'/>

        <link rel='stylesheet' type='text/css' href='../admin/resources/main/css/main.css'/>
        <script type='text/javascript' src='../admin/resources/main/js/main.js'></script>

        <link rel='stylesheet' type='text/css' href='../admin/resources/main/messaging/messaging.css'/>
        <script type='text/javascript' src='../admin/resources/main/messaging/messaging.js'></script>
        <?php
                session_start();
                
                if(!(isset($_SESSION['logado']) && $_SESSION['logado'] != '')) {
                    echo '<script>changePage("/logout");</script>';
                }
        ?>