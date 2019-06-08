<h3>ID: <?=  $id ?> </h3>
<h3> <?= $title ?> </h3>
<h3>SliderController - form</h3>

<?php 
    $linkList = route($controllerName);
?>
<a href="<?php echo $linkList ?>">Back</a>