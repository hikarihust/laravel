<a href="slider" target="_blank">list</a>
<a href="slider/form" target="_blank">add</a>
<a href="slider/form/12" target="_blank">edit</a>
<a href="slider/delete/12" target="_blank">delete</a>
<a href="slider/change-status-active/12" target="_blank">atatus</a>

<?php 
    $linkList = route($controllerName);
    $linkAdd = route($controllerName . '/form');
    $linkEdit = route($controllerName . '/form', ['id' => 12]);
    $linkDelete = route($controllerName . '/delete', ['id' => 12]);
    $linkStatus = route($controllerName . '/status', ['id' => 12, 'status' => 'active']);

    echo "<br />";
    echo $linkList;
    echo "<br />";
    echo $linkAdd;
    echo "<br />";
    echo $linkEdit;
    echo "<br />";
    echo $linkDelete;
    echo "<br />";
    echo $linkStatus;
    echo "<br />";
?>

<a href="<?php echo $linkAdd ?>">Add</a>