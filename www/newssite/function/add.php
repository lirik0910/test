<?php

function newsUpload()
{
    if(!empty($_POST['title']) && !empty($_POST['descript']) && !empty($_POST['date'])){
        return true;
    } else {
        return false;
    }
}