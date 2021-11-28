<?php

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
function view($name, $data = [])
{
    extract($data);
    //return require "app/views/{$name}.view.php";
    return require "app/views/{$name}.view.php";
}

/*function viewUser($name, $data = []) 
{
    extract($data);
    echo $name;
    return require "C:\Users\Cascata\Desktop\CoisasParaGuardar\ProjetoTraineeOficial\traineeCode-AdoraLer\app\views\admin\{$name}.view.php";
    //return require "app/views/admin/{$name}.html";
}*/

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
function redirect($path)
{
    header("Location: /{$path}");
}
