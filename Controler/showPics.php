<?php
if(isset($_GET["pics"])){
    echo '<img src="../Files/'.$_GET["pics"].'" style="width:100%;height:100%;" alt="" />';
}else if(isset($_GET["resume"])){
    echo '<iframe src="../Files/'.$_GET["resume"].'" style="width:100%;height:100%;" alt="" />';
}else{
       header("Location: ../View/home.php");
}
