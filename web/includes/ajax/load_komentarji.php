<?php
session_start();
include '../database.php';
$id = $_GET['id'];
			 $sql = "SELECT comment.content AS vsebina, comment.publish_date AS datum, user.id AS user_id, user.name AS ime, user.surname AS priimek, user.image AS slika FROM comment, user WHERE user.id=comment.user_id AND recipe_id='$id'";
			 $result = mysqli_query($con,$sql);
			 while($row = mysqli_fetch_array($result))
			 {
             ?>
              <section class="comments">
                <article class="comment">
                  <a class="comment-img" href="<?php echo('profile.php?id='.$row['user_id']); ?>">
                    <img src="<?php echo($row['slika']); ?>" alt="" width="50" height="50">
                  </a>
                  <div class="comment-body">
                    <div class="text">
                      <p><?php echo($row['vsebina']); ?></p>
                    </div>
                    <p class="attribution">by <a href="<?php echo('profile.php?id='.$row['user_id']); ?>"> <?php echo($row['ime'].' '.$row['priimek']); ?></a> at <?php echo($row['datum']); ?></p>
                  </div>
                </article>
              </section>
			 <?php }
mysqli_close($con);
?>