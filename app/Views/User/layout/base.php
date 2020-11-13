<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('user/layout/header'); ?>
</head>

<body>
    <?= $this->include('user/layout/navbar'); ?>
    <?= $this->include('user/layout/component/backgroundImg'); ?>
    <?= $this->renderSection('content'); ?>

    <?= $this->include('user/layout/component/scrollUpButton'); ?>
    <?= $this->include('user/layout/footer'); ?>
</body>
<?= $this->include('user/layout/script'); ?>


</html>