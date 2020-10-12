<?php
/*
 ./app/vues/posts/show.php
 Variables disponibles
   $post= ARRAY(id, title, content, created_at, updated_at)
*/
?>
<div class="single-post">
  <div class="feature-img">
     <img class="img-fluid" src="assets/img/blog/<?php echo $post['image']; ?>" alt="">
  </div>
  <div class="blog_details">
     <h2><?php echo $post['title']; ?></h2>
     <ul class="blog-info-link mt-3 mb-4">
        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
     </ul>
     <p class="excert"><?php echo $post['content']; ?></p>
  </div>
</div>

<div class="blog-author">
  <div class="media align-items-center">
     <img src="assets/img/blog/author.png" alt="">
     <div class="media-body">
        <a href="#">
           <h4>Harvard milan</h4>
        </a>
        <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
           our dominion twon Second divided from</p>
     </div>
  </div>
</div>
