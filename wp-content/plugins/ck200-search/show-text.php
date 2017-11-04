<?php
/*
Plugin Name: Show Text
Plugin URI: http://www.example.com/plugin
Description: テキストを表示するだけのプラグイン
Author: my name
Version: 0.1
Author URI: http://www.example.com
*/

function ck200_show_text( $name ) {

    // if (!defined('DS')) {
    //     define('DS', DIRECTORY_SEPARATOR);
    // }
    
    if (!defined('ROOT')) {
        define('ROOT', dirname(dirname(dirname(__FILE__))));
    }
    
    // if (!defined('APP_DIR')) {
    //     define('APP_DIR', basename(dirname(dirname(__FILE__))));
    // }

    // if (!defined('WEBROOT_DIR')) {
    //     define('WEBROOT_DIR', basename(dirname(__FILE__)));
    // }
    
    // if (!defined('WWW_ROOT')) {
    //     define('WWW_ROOT', dirname(__FILE__) . DS);
    // }
    
    // if (php_sapi_name() == 'cli-server') {
    //     if ($_SERVER['REQUEST_URI'] !== '/' && file_exists(WWW_ROOT . $_SERVER['REQUEST_URI'])) {
    //         //return false;
    //         echo 'ありません';
    //     }
    //     $_SERVER['PHP_SELF'] = '/' . basename(__FILE__);
    // }

    // if (!defined('CAKE_CORE_INCLUDE_PATH')) {
    //     if (function_exists('ini_set')) {

              //echo '[a:' . dirname(ROOT) . ':a]';
    //         // echo 'b' . APP_DIR . '/b';
    //         // echo 'c' . WEBROOT_DIR . '/c';
    //         // echo 'd' . $_SERVER['REQUEST_URI'] . '/d';
    //         // echo 'e' . $_SERVER['PHP_SELF'] . '/e';

    //         ini_set('include_path', ROOT . DS . 'lib' . PATH_SEPARATOR . ini_get('include_path'));

    //     }
    //     // if (!include ('Cake' . DS . 'bootstrap.php')) {

    //     //     $failed = true;
    //     // }
    // } else {
    //     if (!include (CAKE_CORE_INCLUDE_PATH . DS . 'Cake' . DS . 'bootstrap.php')) {
    //         $failed = true;
    //     }
    // }
    // if (!empty($failed)) {
    //     trigger_error("CakePHP core could not be found. Check the value of CAKE_CORE_INCLUDE_PATH in APP/webroot/index.php. It should point to the directory containing your " . DS . "cake core directory and your " . DS . "vendors root directory.", E_USER_ERROR);
    // }

// for built-in server
if (php_sapi_name() === 'cli-server') {
    $_SERVER['PHP_SELF'] = '/' . basename(__FILE__);

    $url = parse_url(urldecode($_SERVER['REQUEST_URI']));
    $file = __DIR__ . $url['path'];
    if (strpos($url['path'], '..') === false && strpos($url['path'], '.') !== false && is_file($file)) {
        return false;
    }
}
//require dirname(__DIR__) . '/vendor/autoload.php';
//$cakephpRoot = realpath(dirname(__FILE__) . '/../program/cakephp');
//$cakephpRoot = realpath(dirname(ROOT) . '/app/vendor/cakephp');
$cakephpRoot = realpath(dirname(ROOT) . '/app/');
    //echo 'debugA:' . $cakephpRoot;
require $cakephpRoot . '/vendor/autoload.php';

// use App\Application;
// use Cake\Http\Server;

// // Bind your application to the server.
//$server = new Server(new Application(dirname(__DIR__) . '/config'));
//$server = new Server(new Application($cakephpRoot . '/config'));

    echo 'ここはプラグインから出力しています。<br />プラグインを作りこむことで、DB検索結果を出力します。';// . $cakephpRoot;
}
?>