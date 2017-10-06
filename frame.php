
<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php
$myfile = fopen("./news.php", "r+") or die("Unable to open file!");
$text = "hello there";
// $text = "<tr><td valign="top">08/04/17</td><td><a href="/phpsite/newsroom_repository/Genetic_Testing_Requirement_Reminder.pdf" target="_blank">TESTESTES</a><img src="/phpsite/newsroom_repository/pdf.gif" alt="PDF" border="0" align="absmiddle" /></td></tr>";
// fseek($myfile, 618); THIS IS WRITING TO THE WRONG SPOT
fwrite($myfile, $text);
fclose($myfile);
?>

</body>
</html>
