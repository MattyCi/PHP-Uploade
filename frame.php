<html>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit"><br /><br />
    Enter date (dd/mm/yyy) to be displayed along with newsroom update.
    <input type="text" name="date" value="<?php echo date('m/d/y');?>"/><br /><br />
    Enter the text that will display as a link to the file.
    <input type="text" name="linktext"/>
    <input type="hidden" name="monthyear" value="<?php echo date("F Y");?>"/>
</form>
</body>
</html>
