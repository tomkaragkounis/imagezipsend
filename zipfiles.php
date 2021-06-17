<?php
 /* Template Name: zip+send */ 
get_header();

$orderid = $_GET["order-id"];
$zip_dir= "***".$orderid.'.zip';
$photo_dir= "***".$orderid;

$zip = new ZipArchive;
if ($zip->open($zip_dir, ZipArchive::CREATE) === TRUE)
{
    if ($handle = opendir($photo_dir))
    {
        // Add all files inside the directory
        while (false !== ($entry = readdir($handle)))
        {
            if ($entry != "." && $entry != ".." && !is_dir($photo_dir.'/' . $entry))
            {
                $zip->addFile($photo_dir.'/'  . $entry, $entry);
            }
        }
        closedir($handle);
    }
 
    $zip->close();
}
include 'moveftp.php';
?>
<div class="container">
<div class="tanks">
    Ευχαριστούμε για την Παραγγελία σας. </br>
</div>
</div>
<?
get_footer();  
?>