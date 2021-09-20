<?php 
$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/b2c/estoreb2c/storage/app/public';
$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/b2c/storage';
symlink($targetFolder,$linkFolder);
echo 'Symlink process successfully completed';