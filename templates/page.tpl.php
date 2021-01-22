<!DOCTYPE html>
<html>
    <head>
        <title>Journal-AI</title>
        <link href="build/static/css/main.275ba86d.chunk.css" rel="stylesheet">
    </head>
    <body>
        <div class="clearfix" id="header_fixed">
            <div id="page_header" class="container-fluid">
                <?php require_once "header.tpl.php"; ?>
            </div>
        </div>
        <div class="clearfix" id="page_full">
            <div id="page_body">
                <?php echo $html_content; ?>
            </div>

            <div id="page_footer">
                <div class="container">
                    <?php require_once "footer.tpl.php"; ?>
                </div>
            </div>
        </div>
        
        <script src="build/static/js/2.ca08ae6d.chunk.js"></script>
        <script src="build/static/js/main.b924854d.chunk.js"></script>
    </body>
</html>