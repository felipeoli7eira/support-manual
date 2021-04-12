<?php
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/utils/functions.php';

use Steampixel\Route;
use App\Classes\PostManager;

Route::add('/', function () {
    view('index');
});

Route::add('/postagem/([0-9]+)', function ($var1) {
    try {
        view('posts\post-' . $var1,null,["footerDark" => true]);
    } catch (Exception $e) {
        view('404', null, ["footerDark" => true]);
    }
});

Route::add('/creator', function () {
    view('creator');
});
Route::add('/t', function () {
    $postManager = new PostManager();
    $postManager->addPostName(2,"Clonagem de Banco de dados");
});

Route::add('/creator', function () {
    if(isset($_POST['postCode'])){
        $postManager = new PostManager();
        $postCode = $_POST['postCode'];
        $newPostCode = $postManager->createPost($postCode);
        echo "Acesse o seu novo post <a href='/postagem/$newPostCode'>Aqui!</a>";
    }
},'post');

Route::pathNotFound(function ($path) {
    header('HTTP/1.0 404 Not Found');
    view('404', null, ["footerDark" => true]);
});


Route::run('/');