<?php

    include_once('session-manager.php');
    include_once('db-manager.php');

    include 'phpqrcode/qrlib.php';

    $code = $_SESSION["mifund_id"];

    $url = "https://mivedia.com/wallet-transfer.php?code=$code";

    QRcode::png($url);

?>
