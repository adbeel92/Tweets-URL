<?php
require_once '../model/Tweet.php';
abstract class Controller {
    public static function getAll(){
        try {
            $tweet = new Tweet();
            $lista = $tweet->getAll();
            return $lista;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    public static function insertar($tweet_url,$screen_name,$content,$name,$photo_url,$tweeted_at,$background_url){
        $id=NULL;
        $tweet = new Tweet($id, $tweet_url, $screen_name, $content, $name, $photo_url, $tweeted_at, $background_url);
        $tweet->insertar();
    }
    public static function modificar($id,$tweet_url,$screen_name,$content,$name,$photo_url,$tweeted_at,$background_url){
        $tweet = new Tweet($id, $tweet_url, $screen_name, $content, $name, $photo_url, $tweeted_at, $background_url);
        $tweet->modificar();
    }
    public static function eliminar($id){
        $tweet = new Tweet();
        $tweet->eliminar($id);
    }
    public static function getTweetById($id){
        $tweet = new Tweet();
        return $tweet->getTweetById($id);
    }
}

?>
