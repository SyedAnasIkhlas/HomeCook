<?php require_once 'common/header.php';?>

 <?php 
    $review = new Review();
    echo $review->addNewReview($userLoggedInObj);
  ?>

 <?php 
    require_once 'common/footer.php';

 ?>