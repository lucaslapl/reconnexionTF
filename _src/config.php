<?php
// Gestion de maintenance
// mettre true s'il y a une maintenance à effectuer, sinon laisser false

$maintenance = false;

if ($maintenance && $_SERVER["REMOTE_ADDR"] !== "37.65.22.206") {
    header('Location: maintenance.php');
    exit;
}