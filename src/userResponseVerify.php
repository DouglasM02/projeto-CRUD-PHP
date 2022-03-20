<?php

function cpfValidation($response) {
    if(is_numeric($response)) {
        if(strlen( $response ) < 11) {

            return  false;
        }
    }
    else {
        return false;
    }

    return true;

}

function userResponseVerify($response, $response2, $response3) {
    if(empty($response)) {
        return false;
    }
    if(empty($response2)) {
        return false;
    }
    if(empty($response3)) {
        return false;
    }

    return true;
}

function userParamVerify($param) {
    if(empty($param)) {
        return false;
    }

    return true;
}

?>
