
<!doctype html>
<html lang="en">
<head>
    <link href="css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"
            charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"
            charset="utf-8"></script>

    <script>
        $(function () {
            var sampleTags = ['c++', 'java', 'php', 'coldfusion', 'javascript', 'asp', 'ruby', 'python', 'c', 'scala', 'groovy', 'haskell', 'perl', 'erlang', 'apl', 'cobol', 'go', 'lua'];
            $('#singleFieldTags').tagit({
                availableTags: sampleTags,
                singleField: true,
                singleFieldNode: $('#mySingleField')
            });

        });
    </script>

</head>
<body>

<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>
<div id="wrapper">

    <div id="content">

        <form action="" method="post">
            <input name="tags" id="mySingleField" value="php javasript">
            <ul id="singleFieldTags"></ul>
            <input type="submit" value="Submit">
        </form>

    </div>


</div>
</body>
</html>

