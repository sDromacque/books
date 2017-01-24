<?php
  class Post {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $author;
    public $content;
    public $title;

    public function __construct($id, $author, $content, $title) {
      $this->id      = $id;
      $this->author  = $author;
      $this->content = $content;
      $this->title   = $title;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM post');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['author'], $post['content'], $post['title']);
      }

      return $list;
    }

    public static function delete($id){
      $db = Db::getInstance();
      $req = $db->prepare("DELETE FROM post WHERE id = :id");
      $req->execute(array('id' => $id));

      header('Location: http://127.0.0.1/php_mvc/?controller=index');
    }

    public static function create($author,  $title, $content){
      $db = Db::getInstance();
      $req = $db->prepare("INSERT INTO post (author, content, title) VALUES (:author, :content, :title)");
      $req->execute(array(
            "author" => $author,
            "content" => $content,
            "title" => $title
            ));

    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM post WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['id'], $post['author'], $post['content'], $post['title']);
    }
  }
?>
