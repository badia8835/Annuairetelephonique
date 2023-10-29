 
<?php
    if(isset($_SESSION['message'])) :
?>
    <div class="alert alert-info alert-dismissible d-flex align-items-center fade show">
      	<i class="bi-info-circle-fill"></i>
        <strong class="mx-2">Info!</strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

<?php 
    unset($_SESSION['message']);
    endif;
?>