<?php
session_start();
include '../database.php';
$id = $_GET['id'];
			 $sql = "SELECT comment.content AS vsebina, comment.publish_date AS datum, user.name AS ime, user.surname AS priimek FROM comment, user WHERE user.id=comment.user_id AND recipe_id='$id'";
			 $result = mysqli_query($con,$sql);
			 while($row = mysqli_fetch_array($result))
			 {
             ?>
              <section class="comments">
                <article class="comment">
                  <a class="comment-img" href="#non">
                    <img src="http://www.deviato.com/wp-content/uploads/2013/10/Original-Facebook-Geek-Profile-Avatar-deviato.com-17-300x300.jpg" alt="" width="50" height="50">
                  </a>
                  <div class="comment-body">
                    <div class="text">
                      <p><?php echo($row['vsebina']); ?></p>
                    </div>
                    <p class="attribution">by <a href="#non"> <?php echo($row['ime'].' '.$row['priimek']); ?></a> at <?php echo($row['datum']); ?></p>
                  </div>
                </article>
              </section>
			 <?php }
mysqli_close($con);
?>