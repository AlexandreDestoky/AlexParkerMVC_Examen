<?php
/*
 ./app/vues/posts/addForm.php
 FORMULAIRE D'UPDATE D'UN POST

*/

?>

<div class="row">
      <div class="sub-title">
        <a href="index.html" title="Go to Home Page"><h2>Back Home</h2></a>
        <a href="#comment" class="smoth-scroll"><i class="icon-bubbles"></i></a>
       </div>

      <div class="col-md-12 content-page">
        <div class="col-md-12 blog-post">

          <!-- Post Headline Start -->
          <div class="post-title">
            <h1>Edit Form</h1>
          </div>
             <!-- Post Headline End -->

        <!-- Form Start -->
          <form action="posts/<?php echo $post['id'];?>/<?php echo \Noyau\Fonctions\slugify($post['title']);?>/edit/update.html" method="post">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" class="form-control" value="<?php echo $post['title']; ?>" required />
            </div>
            <div class="form-group">
              <label for="text">Text</label>
              <textarea id="text" name="text" class="form-control" rows="5" required><?php echo $post['text']; ?></textarea>
            </div>
            <div class="form-group">
              <label for="quote">Quote</label>
              <textarea id="quote" name="quote" class="form-control" rows="5" required><?php echo $post['quote']; ?></textarea>
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select id="category" name="category_id" class="form-control">
                <?php foreach ($categories as $category): ?>
                  <option value="<?php echo $category['id'];?>"<?php if($category['id'] == $post['category_id']) {echo "selected=selected";}?>><?php echo $category['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div>
              <input class="btn btn-primary" type="submit" value="submit" />
              <input class="btn btn-secondary" type="reset" value="reset" />
            </div>
          </form>
          <!-- Form End -->




          </div>
       </div>

   </div>
