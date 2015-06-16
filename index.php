<?php
/**
 * @author Oscar Batlle <oscarbatlle@gmail.com>
 */
session_start();
$token = md5(uniqid(rand(), true));
$_SESSION['token'] = $token;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PDF Image Extractor</title>
    <meta charset="UTF-8">
    <meta name=description content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <!-- Gallery CSS -->
    <link rel="stylesheet" href="css/blueimp-gallery.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1><i class="glyphicon glyphicon-transfer"></i> PDF Image Extractor</h1>

            <form action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="file">Upload PDF:</label>
                    <input type="file" name="file" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="hidden" name="token" value="<?= $token ?>"/>
                    <input type="submit" value="Submit" class="submit form-control btn btn-primary"/>
                </div>
                <div class="progress hide">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100"
                         aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        <span class="sr-only"></span>
                    </div>
                </div>
            </form>

            <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
                <div class="slides"></div>
                <h3 class="title"></h3>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
                <ol class="indicator"></ol>
            </div>
            <div id="result" class="text-center">
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<!-- Form Application -->
<script src="js/application.js"></script>
<!-- Gallery -->
<script src="js/blueimp-gallery.min.js"></script>
</body>
</html>