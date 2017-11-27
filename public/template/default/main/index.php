<!DOCTYPE html>
<html>
<head>

    <?php
    echo $this->_title;
    echo $this->_metaHTTP;
    echo $this->_metaName;
    echo $this->_fileCSS;

    $imageURL = $this->_dirImg;
    ?>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700,900' rel='stylesheet' type='text/css'>
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
            document, 'script', '//connect.facebook.net/en_US/fbevents.js');

        fbq('init', '1031554816897182');
        fbq('track', "PageView");
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=1031554816897182&ev=PageView&noscript=1"
        />
    </noscript>


</head>
<body id="page-top" class="home">

<!-- PAGE WRAP -->
<div id="page-wrap">

    <!-- PRELOADER -->
    <?php include_once 'html/preloader.php' ?>
    <!-- END / PRELOADER -->

    <!--header-->
    <?php include_once 'html/header.php' ?>
    <!--//header-->

    <!--content-->
    <?php include_once MODULE_PATH . DS . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php'; ?>
    <!--//content-->

    <!--footer-->
    <?php include_once 'html/footer.php' ?>
    <!--//footer-->

</div>
<!-- END / PAGE WRAP -->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-20585382-5', 'megadrupal.com');
    ga('send', 'pageview');
</script>
<?php
echo $this->_fileJS;
?>
</body>
</html>
