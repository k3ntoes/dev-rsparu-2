<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv=" Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RS Paru v2.0</title>

    <?= $this->include('template/css') ?>

    <?= $this->renderSection('view_css') ?>
</head>

<body>
    <?= $this->include('template/menubar') ?>

    <?= $this->include('template/navbar') ?>

    <div id="wrapper">
        <div class="main-content" style="min-height: 80vh;">

            <?= $this->renderSection('view_content') ?>

            <footer class="footer">
                <ul class="list-inline">
                    <li><?= date('Y') ?> © BKPM Purwokerto.</li>
                </ul>
            </footer>
        </div>
        <!-- /.main-content -->
    </div>
    <!--/#wrapper -->

    <?= $this->include('template/js') ?>

    <?= $this->renderSection('view_js') ?>
</body>

</html>