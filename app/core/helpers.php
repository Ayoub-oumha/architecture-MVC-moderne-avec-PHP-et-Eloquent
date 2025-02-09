<?php

function view($view, $data = []) {
    extract($data);
    include __DIR__ . "/../view/{$view}.php";
    // include __DIR__ . "/../view/login.php";
}