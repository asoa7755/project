<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php include_once('../../../application/classes/FileService.php') ;?>
<?php


//SECURITY:Only students and staff
if (!empty($_SESSION['Id']) && ($_SESSION['Role']==2 || $_SESSION['Role']==1))
{
    if (isset($_GET['id']))
    {
        $fileservice = new FileService();

        $id= $_GET['id'];
        $staffid = $_SESSION['Id'];
        $fileservice = new FileService();
        $blob_result = $fileservice->getFileBlob($id, $staffid);

        foreach ($blob_result as $row)
        {
            $blobfile = $row;   
        }

   
        $file_content = $blobfile[0];
        $file_name = $blobfile[1];
        $file_size = strlen($blobfile[0]);
        $file_type = $blobfile[2];
        $file_mime_type = $fileservice->getMimetypebyextension($file_type);
        
        header('Content-Disposition: attachment; filename=' . $file_name);
        header('Content-type: '.$fileservice->getMimetypebyextension($file_type));
        echo base64_decode($file_content);
    }
    else
    {
        echo "No file id";
    }
}
else
{
    echo "No Access";
}
?>