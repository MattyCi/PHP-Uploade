<html>
<body>
  <div align="left">
    <h1>Provider Newsroom Automatic Updates</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    Select PDF to upload:
    <input  type="file" name="fileToUpload" id="fileToUpload"><br /><br />
    Enter date (mm/dd/yyy): <img src="./images/newsroom_date.png" alt="date" style ="vertical-align: text-bottom;">
    <input type="text" name="date" value="<?php echo date('m/d/y');?>"/><br /><br />
    Enter text: <img src="./images/newsroom_text.png" alt="text" style ="vertical-align: text-bottom;">
    <input type="text" name="linktext"/>
    <input type="hidden" name="monthyear" value="<?php echo date("F Y");?>"/><br /><br />
    <input type="submit" value="Upload PDF" name="submit">
    </form>
  </div>
</body>
</html>
