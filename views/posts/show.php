<div class="panel panel-default">
  <div class="panel-heading"><?php echo '<p>Le livre : '.$post->title.' par :'.$post->author.'</p>' ?></div>
  <div class="panel-body">
    <?php echo $post->content; ?>
  </div>

  <a  class="glyphicon glyphicon-remove" href='?controller=posts&action=delete&id=<?php echo $post->id; ?>'>Remove</a>
</div>
