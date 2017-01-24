<?php
  class PostsController {
    public function index() {
      $posts = Post::all();
      require_once('views/posts/index.php');
    }

    public function create(){
      if(isset($_POST['author']))
        $post = Post::create($_POST['title'], $_POST['author'], $_POST['content']);
      require_once('views/posts/create.php');
    }

    public function show() {
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $post = Post::find($_GET['id']);
      require_once('views/posts/show.php');
    }

    public function delete(){
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $post = Post::delete($_GET['id']);
      header('Location: http://127.0.0.1/php_mvc/?controller=index');
    }
  }
?>
