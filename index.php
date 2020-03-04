<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <div class="frame">
        <div class="center">
            <div class="title">
                <h1>Select file to upload</h1>
            </div>
            <div class="dropzone">
                <img src="cloud.png" class="upload-icon">
                <input type="file" class="upload-input" name="file[]" multiple required>
            </div>
            <input type="submit" name="submit" value="UPLOAD" class="btn">
        </div>    
    </div>
</form>
</body>
</html>
