<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Email Attachment Without Upload - Excellent Web World</title>
    <style>
        body{ font-family:Arial, Helvetica, sans-serif; font-size:13px;}
        th{ background:#999999; text-align:right; vertical-align:top;}
        input{ width:181px;}
    </style>
</head>
<body>
<form action="SubirProducto.php" method="post" name="mainform" enctype="multipart/form-data">
    <table width="500" border="0" cellpadding="5" cellspacing="5">
        <tr>
            <th>Your Name</th>
            <td><input name="fieldFormName" type="text"></td>
        </tr>
        <tr>
        <tr>
            <th>Your Email</th>
            <td><input name="fieldFormEmail" type="text"></td>
        </tr>
        <tr>
            <th>To Email</th>
            <td><input name="toEmail" type="text"></td>
        </tr>

        <tr>
            <th>Subject</th>
            <td><input name="fieldSubject" type="text" id="fieldSubject"></td>
        </tr>
        <tr>
            <th>Comments</th>
            <td><textarea name="fieldDescription" cols="20" rows="4" id="fieldDescription"></textarea></td>
        </tr>
        <tr>
            <th>Attach Your File</th>
            <td><input name="attachment" type="file"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;"><input type="submit" name="Submit" value="Send"><input type="reset" name="Reset" value="Reset"></td>
        </tr>
    </table>
</form>