<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <title><?php echo htmlspecialchars($seitentitel);?></title> <!-- Dynamischer Seitentitel -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="keywords" content="" />
    <meta name="description" content="<?php echo htmlspecialchars($meta_description);?>" /> <!-- Dynamische Metainfo (nur in DevTools sichtbar) für Suchmaschinen-->

    <link href="css/screen.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <?php include "nav.php"; ?>
        <figure>
            <img src="images/stage.jpg" alt="" />
        </figure>
    </header>
    <section>
