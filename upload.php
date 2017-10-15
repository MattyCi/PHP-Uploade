<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$pdfFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists. ";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1500000) {
    echo "Sorry, your file is too large. ";
    $uploadOk = 0;
}
// Allow certain file formats
if($pdfFileType != "pdf" && $pdfFileType != "PDF" ) {
    echo "Sorry, only pdf files are allowed. ";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Your file was not uploaded. ";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
if ($uploadOk == 1) {
  $monthyear = $_POST['monthyear'];
  $date = $_POST['date'];
  $filename = basename($_FILES["fileToUpload"]["name"]);
  $name = $_POST['linktext'];
  $textlong = '<p><strong>' . $monthyear . '</strong></p><table cellpadding="5">
    <tr>
  <td valign="top">' . $date . '</td>
      <td><a href="/PHP-Uploade/uploads/' . $filename . '" target="_blank">' . $name . '	</a><img src="/phpsite/newsroom_repository/pdf.gif" alt="PDF" border="0" align="absmiddle" /></td>
    </tr>
    </table>' . PHP_EOL;
  $text =  PHP_EOL . '<tr>
  <td valign="top">' . $date . '</td>
      <td><a href="/PHP-Uploade/uploads/' . $filename . '" target="_blank">' . $name . '	</a><img src="/phpsite/newsroom_repository/pdf.gif" alt="PDF" border="0" align="absmiddle" /></td>
    </tr>' . PHP_EOL;
    if(strpos(file_get_contents("./newsadd.php"),$monthyear) !== false) {      //if the month and year already exists, create new table
            $key = '<p><strong>'.$monthyear.'</strong></p><table cellpadding="5">';

            //copy file to prevent double entry
            $file = "newsadd.php";
            $newfile = "newsaddbuffer.php";
            copy($file, $newfile) or exit("failed to copy $file");

            //load file into $lines array
             $fc = fopen ($file, "r");
             while (!feof ($fc))
             {
                $buffer = fgets($fc, 4096);
                $lines[] = $buffer;
             }

            fclose ($fc);

            //open same file and use "w" to clear file
            $f=fopen($newfile,"w") or die("couldn't open $file");


            //loop through array using foreach
            foreach($lines as $line)
            {
                if (strstr($line,$key)) //look for $key in each line
              {
            		$pos = strpos($key, '">');
            		$line = substr_replace($key, $text, $pos + 2, 0);
              }
                fwrite($f,$line); //place $line back in file
            }
            fclose($f);

            copy($newfile, $file) or exit("failed to copy $newfile");
  }else{
    $textlong .= file_get_contents('newsadd.php');
    file_put_contents('newsadd.php', $textlong);
  }
}
?>
