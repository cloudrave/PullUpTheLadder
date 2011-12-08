<?php
    // include common code
    require("include/common.php");
    
    // destroy session
    session_destroy();

    // transfer user to login page
    header("Location: go.php");
?>
