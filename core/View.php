<?php

namespace App\Core;

namespace App\Core;

class View
{
    public static function render($view, $data = [])
    {
        extract($data);
        $templateContent = file_get_contents("../App/Views/$view.php");
        // $templateContent = str_replace('@csrf', '<input type="hidden" name="csrf_token" value="' . Security::generateCSRFToken() . '">', $templateContent);

        echo $templateContent;
    }
}