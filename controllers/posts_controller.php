<?php
  class PostsController {
    public function index() {
      $posts = Post::all();
      require_once('views/posts/index.php');
    }

    public function create(){
      $post = Post::create($_GET['id']);
      require_once('views/posts/show.php');
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
      require_once('views/posts/index.php');
    }
  }
?>
