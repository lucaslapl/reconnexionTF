<?php
// Gestion de maintenance
// mettre true s'il y a une maintenance à effectuer, sinon laisser false

$maintenance = true;

if ($maintenance && $_SERVER["REMOTE_ADDR"] !== "81.65.117.129") {
    header('Location: maintenance.php');
    exit;
}