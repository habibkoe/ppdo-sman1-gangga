<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?= $this->renderSection('title') ?></title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?= base_url('theme/back/assets/images/favicon.ico') ?>">

    <link href="<?= base_url('theme/back/assets/plugins/morris/morris.css') ?>" rel="stylesheet">

    <link href="<?= base_url('theme/back/assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('theme/back/assets/css/icons.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('theme/back/assets/css/style.css') ?>" rel="stylesheet" type="text/css">

    <?= $this->renderSection('css') ?>
</head>

<body>
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Navigation Bar-->
    <header id="topnav">
        <?= $this->include('back_partials/topbar') ?>
        <?= $this->include('back_partials/navbar') ?>
    </header>
    <!-- End Navigation Bar-->


    <div class="wrapper">
        <div class="container-fluid">

        <?= $this->renderSection('content') ?>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
    <?= $this->include('back_partials/footer') ?>
    <!-- jQuery  -->
    <script src="<?= base_url('theme/back/assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('theme/back/assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('theme/back/assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('theme/back/assets/js/modernizr.min.js') ?>"></script>
    <script src="<?= base_url('theme/back/assets/js/waves.js') ?>"></script>
    <script src="<?= base_url('theme/back/assets/js/jquery.slimscroll.js') ?>"></script>
    <script src="<?= base_url('theme/back/assets/js/jquery.nicescroll.js') ?>"></script>
    <script src="<?= base_url('theme/back/assets/js/jquery.scrollTo.min.js') ?>"></script>

    <script src="<?= base_url('theme/back/assets/plugins/skycons/skycons.min.js') ?>"></script>
    <script src="<?= base_url('theme/back/assets/plugins/raphael/raphael-min.js') ?>"></script>
    <script src="<?= base_url('theme/back/assets/plugins/morris/morris.min.js') ?>"></script>

    <!-- App js -->
    <script src="<?= base_url('theme/back/assets/js/app.js') ?>"></script>
    <script>
        /* BEGIN SVG WEATHER ICON */
        if (typeof Skycons !== 'undefined') {
            var icons = new Skycons({
                    "color": "#fff"
                }, {
                    "resizeClear": true
                }),
                list = [
                    "clear-day", "clear-night", "partly-cloudy-day",
                    "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                    "fog"
                ],
                i;

            for (i = list.length; i--;)
                icons.set(list[i], list[i]);
            icons.play();
        };

        // scroll

        $(document).ready(function () {

            $("#boxscroll").niceScroll({
                cursorborder: "",
                cursorcolor: "#cecece",
                boxzoom: true
            });
            $("#boxscroll2").niceScroll({
                cursorborder: "",
                cursorcolor: "#cecece",
                boxzoom: true
            });

        });
    </script>
    <?= $this->renderSection('javascript') ?>
</body>

</html>