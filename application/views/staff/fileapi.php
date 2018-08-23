<?php include_once('../../../application/classes/FileService.php') ;?>
<?php 
if (!empty($_SESSION["id"]) && $_SESSION["Role"]==2)
{
    if (isset($_GET["id"])
    {
        $fileservice = new FileService();
        $blob_result = $fileservice->getFileBlob($id, $staffid);

        foreach ($blob_result as $row)
        {
            $blobfile = $row;
        }

        $file_content = $blobfile->file;
        $file_name = $blobfile->name;
        $file_size = strlen($blobfile->file);
        $file_type = $blobfile->extension;

        return  
    }
}
?>