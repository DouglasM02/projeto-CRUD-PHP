<?php

function returnMessage($value) {
     if($value) {
        return "<div class='alert alert-primary mb-2 mt-2'>".$value."</div>";
    }
    else {
        return "<div class='alert alert-danger mb-2 mt-2'>".$value."</div>";
    }
}

?>
