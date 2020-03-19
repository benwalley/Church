<!DOCTYPE html>
<html>
<head>
    <meta name="description" content="Watch our service live streamed on Sunday afternoons at 12:15pm">
    <link rel="stylesheet" type="text/css" href="/learn/css/learning.css">
    <link rel="stylesheet" href="/liveStream/css/liveStream.css">

    <title>Gospel of Grace Church Live Stream</title>
    <?php include '../includes/header.php'; ?>
    <?php require_once __DIR__ . '/dataMethods.php';?>

    <div class="mainContent">
        <?php echo htmlspecialchars_decode(getData(IFRAME_FILE)); ?>
    </div>

<?php include '../includes/footer.php'; ?>
