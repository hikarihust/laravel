<a href="slider" target="_blank">list</a>
<a href="slider/form" target="_blank">add</a>
<a href="slider/form/12" target="_blank">edit</a>
<a href="slider/delete/12" target="_blank">delete</a>
<a href="slider/change-status-active/12" target="_blank">atatus</a>

<?php 
    $linkList = route('slider');
    $linkAdd = route('slider/form');
    $linkEdit = route('slider/form', ['id' => 12]);
    $linkDelete = route('slider/delete', ['id' => 12]);
    $linkStatus = route('slider/status', ['id' => 12, 'status' => 'active']);

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
?>