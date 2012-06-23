<?php
require_once '../control/controller.php';
abstract class view {
    public static function ejecutar(){
        if (!isset($_GET['action'])) {
            self::_index();
        }else{
            $action=$_GET['action'];
            if(isset ($_GET['id'])){
                $id=$_GET['id'];
            }
            switch ($action) {
                case 'new':
                    self::_new();
                    break;
                case 'create':
                    self::_create();
                    break;
                case 'show':
                    self::_show($id);
                    break;
                case 'edit':
                    self::_edit($id);
                    break;
                case 'update':
                    self::_update($id);
                    break;
                case 'delete':
                    self::_destroy($id);
                    break;
                default:
                    break;
            }
        }
    }
    private static function _index(){
        $tweets = Controller::getAll();
        require_once 'index.php';
    }
    private static function _new(){
        $msg_error_url = "";
        require_once 'new.php';
    }
    private static function _create(){
        $url = $_POST['url'];
        $arr = explode("/", $url);
        $id=end($arr);
        
        $tweet_url="https://api.twitter.com/1/statuses/show/$id.json";
        
        $ch = curl_init($tweet_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: api.twitter.com'));
        $output = curl_exec($ch);
        $result=json_decode($output,true);
        curl_close($ch);
        if(isset ($result["id"])){
            $screen_name="";
            $name="";
            $photo_url="";
            $background_url="";
            foreach ($result as $r) {
                if(is_array($r)){
                    $screen_name = $r["screen_name"];
                    $name = $r["name"];
                    $photo_url = $r["profile_image_url"];
                    $background_url = $r["profile_background_image_url_https"];
                    break;
                }
            }
            $id=$result["id_str"];
            $tweet_url=$url;
            $content=$result["text"];
            $tweeted_at=$result["created_at"];
            $tweeted_at = date("Y-m-d H:i:s",strtotime($tweeted_at));
            Controller::insertar($tweet_url, $screen_name, $content, $name, $photo_url, $tweeted_at, $background_url);
            self::_index();
        }else{
            $msg_error_url = "Invalid URL, write another.";
            require_once 'new.php';
        }
    }
    private static function _show($id){
        $tweet = Controller::getTweetById($id);
        require_once 'show.php';
    }
    private static function _edit($id){
        $msg_error_url = "";
        $tweet = Controller::getTweetById($id);
        require_once 'edit.php';
    }
    private static function _update($id_t){
        $url = $_POST['url'];
        $arr = explode("/", $url);
        $id=end($arr);
        
        $tweet_url="https://api.twitter.com/1/statuses/show/$id.json";
        
        $ch = curl_init($tweet_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: api.twitter.com'));
        $output = curl_exec($ch);
        $result=json_decode($output,true);
        curl_close($ch);
        if(isset ($result["id"])){
            $screen_name="";
            $name="";
            $photo_url="";
            $background_url="";
            foreach ($result as $r) {
                if(is_array($r)){
                    $screen_name = $r["screen_name"];
                    $name = $r["name"];
                    $photo_url = $r["profile_image_url"];
                    $background_url = $r["profile_background_image_url_https"];
                    break;
                }
            }
            $id=$result["id_str"];
            $tweet_url=$url;
            $content=$result["text"];
            $tweeted_at=$result["created_at"];
            $tweeted_at = date("Y-m-d H:i:s",strtotime($tweeted_at));
            Controller::modificar($id_t, $tweet_url, $screen_name, $content, $name, $photo_url, $tweeted_at, $background_url);
            self::_index();
        }else{
            $tweet = Controller::getTweetById($id);
            $msg_error_url = "Invalid URL, write another.";
            echo $msg_error_url;
            require_once 'edit.php';
        }
    }
    private static function _destroy($id){
        Controller::eliminar($id);
        self::_index();
    }
}
view::ejecutar();
?>
