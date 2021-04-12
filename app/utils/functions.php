<?php

/**
 * @param array $params
 * @param bool $htmlScape
 * @param bool $exit
 * @return void
*/
function dd(array $params = [], bool $htmlScape = false, bool $exit = true): void
{
    echo '<pre>';
    print_r($htmlScape ? htmlspecialchars($params) : $params);
    echo'</pre>';

    if($exit) exit;
}

/**
 * Função responsável por renderizar as views (app/views)
 * 
 * @param string $viewName | Nome da view a ser renderizada
 * @param null|array $data | Dados para renderização
 * @param null|array $config | Configurações para alterar padrões da view
 * @return void
*/

function view(string $viewName, ?array $data = [], ?array $config = null): void
{
    if(!file_exists(__DIR__ . "\\..\\views\\{$viewName}.php"))
    {
        throw new Exception("Arquivo não existente");
    }
    
    if ($data)
    {
        extract($data);
    }    
    require __DIR__ . "\\..\\views\\template\\header.php";
    require __DIR__ . "\\..\\views\\{$viewName}.php";
    require __DIR__ . "\\..\\views\\template\\footer.php";
    
    
}

/**
 * Função responsável por montar uma URL válida, por exemplo
 * {{protocolo}}://{{host}}/{{caminho/para/a/raiz/do/projetp}}/
*/
function url(): string
{
    return $_SERVER['REQUEST_SCHEME'] . "://{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}/";
}

/**
 * Função responsável por linkar um arquivo da pasta public ou qualquer
 * arquivo dentro dela
*/
function asset(string $resource): string
{
    return url() . "public/{$resource}";
}

/**
 * Função responsável por linkar um arquivo CSS
*/
function css(string $fileName): string
{
    return url() . "public/css/{$fileName}.css";
}

/**
 * Função responsável por linkar um arquivo JavaScript
*/
function js(string $fileName): string
{
    return url() . "public/js/{$fileName}.js";
}