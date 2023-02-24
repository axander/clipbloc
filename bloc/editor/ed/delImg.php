<?php

if (isset($_GET['img'])){
	$img=$_GET['img'];
        if(is_file($img)){
            unlink($img);
        }
    }
?>