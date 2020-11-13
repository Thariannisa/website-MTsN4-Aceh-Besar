<!DOCTYPE html>
<html lang="en" class="theme-primary">

<head>

    <?= $this->include('admin/layout/header'); ?>
    <?= $this->renderSection('style'); ?>
    <?= $this->renderSection('headScript'); ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?= $this->include('admin/layout/sidebar'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?= $this->include('admin/layout/navbar'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?= $this->renderSection('content'); ?>
                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?= $this->include('admin/layout/footer'); ?>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <?= $this->include('admin/component/scroll'); ?>
    <?= $this->include('admin/component/modal'); ?>

</body>
<?= $this->include('/admin/layout/scripts'); ?>
<?= $this->renderSection('scripts'); ?>

</html>