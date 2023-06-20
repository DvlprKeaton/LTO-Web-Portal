<?php  

include("condb.php");

$file = $_GET['src'];

if(!empty($_GET['src'])){
    $fileName  = basename($_GET['src']);
    $filePath  = "renewal/".$fileName;
    
    if(!empty($fileName) && file_exists($filePath)){
        //define header
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        //read file 
        readfile($filePath);
        exit;
    }
    else{
        echo "file not exit";
    }
}
else{
    echo "huhu";
}
?>