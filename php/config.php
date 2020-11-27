<?php
function Check(){
if(isset($_GET['Tag']))
    return true;
else 
    return false;
}
?>