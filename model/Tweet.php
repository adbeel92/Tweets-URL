<?php
require_once '../persistence/Persistence.php';
class Tweet {
    private $_id;
    private $_tweet_url;
    private $_screen_name;
    private $_content;
    private $_name;
    private $_photo_url;
    private $_tweeted_at;
    private $_background_url;
    public function __construct($id="",$tweet_url="",$screen_name="",$content="",$name="",$photo_url="",$tweeted_at="",$background_url="") {
        $this->_id=$id;
        $this->_tweet_url=$tweet_url;
        $this->_screen_name=$screen_name;
        $this->_content=$content;
        $this->_name=$name;
        $this->_photo_url=$photo_url;
        $this->_tweeted_at=$tweeted_at;
        $this->_background_url=$background_url;
    }
    public function __toString() { return $this->_titulo; }
    public function getId() {return $this->_id;}
    public function getTweet_url() {return $this->_tweet_url;}
    public function getScreen_name() {return $this->_screen_name;}
    public function getContent() {return $this->_content;}
    public function getName() {return $this->_name;}
    public function getPhoto_url() {return $this->_photo_url;}
    public function getTweeted_at() {return $this->_tweeted_at;}
    public function getBackground_url() {return $this->_background_url;}
    
    public function eliminar($id){
        $twitter = Persistence::getInstancia();
        $twitter->eliminar($id);
    }
    public function insertar(){
        $twitter = Persistence::getInstancia();
        $twitter->insertar($this->_id,
            $this->_tweet_url,
            $this->_screen_name,
            $this->_content,
            $this->_name,
            $this->_photo_url,
            $this->_tweeted_at,
            $this->_background_url);
    }
    public function modificar(){
        $cd=Persistence::getInstancia();
        $cd->modificar($this->_id,
                $this->_tweet_url,
                $this->_screen_name,
                $this->_content,
                $this->_name,
                $this->_photo_url,
                $this->_tweeted_at,
                $this->_background_url);
    }

    public function getAll(){
        $array = array();
        $twitter = Persistence::getInstancia();
        $listaTweets = $twitter->getAll();
        foreach($listaTweets as $tweet){
            $id = $tweet['id'];
            $tweet_url = $tweet['tweet_url'];
            $screen_name = $tweet['screen_name'];
            $content = $tweet['content'];
            $name = $tweet['name'];
            $photo_url = $tweet['photo_url'];
            $tweeted_at = $tweet['tweeted_at'];
            $background_url = $tweet['background_url'];
            $array[] = new Tweet($id, $tweet_url, $screen_name, $content, $name, $photo_url, $tweeted_at, $background_url);
        }
        return $array;
    }
    public function getTweetById($id){
        $twitter = Persistence::getInstancia();
        $listaTweets = $twitter->getTweetBy($id);
        foreach($listaTweets as $tweet){
            $id = $tweet['id'];
            $tweet_url = $tweet['tweet_url'];
            $screen_name = $tweet['screen_name'];
            $content = $tweet['content'];
            $name = $tweet['name'];
            $photo_url = $tweet['photo_url'];
            $tweeted_at = $tweet['tweeted_at'];
            $background_url = $tweet['background_url'];
            return new Tweet($id, $tweet_url, $screen_name, $content, $name, $photo_url, $tweeted_at, $background_url);
        }
    }

}

?>
