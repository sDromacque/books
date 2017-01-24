<p>List of books :</p>

<ul class="list-group">
  <?php foreach($posts as $post) { ?>
    <li class="list-group-item">

      <a  class="badge" href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>See content</a>
    <?php echo '<p>Title : '.$post->author.'</p>'?>
    <?php } ?>
  </li>

</ul>
