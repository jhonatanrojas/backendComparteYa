<?php if (isset($librerias_css)): ?>
    <?php foreach($librerias_css as $libreria_css): ?>
        <link href="<?php echo  $_ENV['URL_BASE'].$libreria_css; ?>" rel="stylesheet" type="text/css">
    <?php endforeach; ?>
<?php endif; ?>


<?php if (isset($ficheros_css)): ?>
    <?php foreach($ficheros_css as $fichero_css): ?>
        <link href="<?php echo  $_ENV['URL_BASE'].$fichero_css; ?>" rel="stylesheet" type="text/css">
    <?php endforeach; ?>
<?php endif; ?>