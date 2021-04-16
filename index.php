<?php
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/utils/functions.php';

use App\Classes\Post;
use App\Classes\User;
use Steampixel\Route;
use App\Classes\PostManager;

session_start();

/*

---- GET REQUESTS ----

*/

Route::add('/', function () {
    $data = Post::getAll(4, 'DESC');
    $data = array_map(function ($line) {
        switch ($line['difficulty']) {
            case 1:
                $line['difficulty'] = 'Baixa';
                break;
            case 2:
                $line['difficulty'] = 'Media';
                break;
            case 3:
                $line['difficulty'] = 'Alta';
                break;
        }
        return $line;
    }, $data);
    view('index', $data);
});
Route::add('/login', function () {
    checkSession(true);
    rawView('login');
});


Route::add('/postagem/([0-9]+)', function ($id) {
    checkSession();
    $data = Post::getPost($id);
    if ($data) {
        view("post", $data[0]);
    } else {
        view('404', null, ["footerDark" => true]);
    }
});

Route::add('/criar', function () {
    checkSession();
    view('criar');
});

Route::add('/editar/([0-9]+)', function ($id) {
    checkSession();
    $data = Post::getPost($id);
    if ($data) {
        view('editar', $data[0]);
    } else {
        view('404', null, ["footerDark" => true]);
    }
});

Route::add('/teste', function () {
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
});

Route::add('/sair', function () {
    checkSession();
    session_destroy();
    header('Location:/');
    exit();
});

/*

---- POST REQUESTS ----

*/

Route::add('/criar', function () {
    checkSession();
    if (isset($_POST['postCode'])) {
        try {
            $res = Post::createPost($_POST['postName'], $_POST['imageUrl'], $_POST['postDifficulty'], $_POST['postCode']);
            if ($res) {
                http_response_code(200);
            } else {
                http_response_code(500);
            }
        } catch (PDOException $exception) {
            echo '<pre>';
            print_r($exception);
            echo '</pre>';
            http_response_code(505);
        }
    }
}, 'post');

Route::add('/editar', function () {
    if (isset($_POST['postCode'])) {
        try {
            $res = Post::updatePost($_POST['id'], $_POST['postName'], $_POST['imageUrl'], $_POST['postDifficulty'], $_POST['postCode']);
            if ($res) {
                http_response_code(200);
            } else {
                http_response_code(500);
            }
        } catch (PDOException $exception) {
            http_response_code(500);
            echo '<pre>';
            print_r($exception);
            echo '</pre>';
        }
    }
}, 'post');

Route::add('/login', function () {

    if (isset($_POST['email'])) {
        try {
            $res = User::login($_POST['email'], $_POST['password']);
            if ($res) {
                http_response_code(200);
            } else {
                http_response_code(500);
            }
        } catch (PDOException $exception) {
            http_response_code(500);
        }
    }
}, 'post');

/*

---- 404 PAGE ----

*/

Route::pathNotFound(function ($path) {
    header('HTTP/1.0 404 Not Found');
    view('404', null, ["footerDark" => true]);
});


Route::run('/');

function checkSession($reverse = false)
{
    if ($reverse) {
        if (isset($_SESSION['user'])) {
            header('Location:/');
            exit();
        }
    }else{
        if (!isset($_SESSION['user'])) {
            header('Location:/login');
            exit();
        }
    }
}
