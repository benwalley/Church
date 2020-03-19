<!DOCTYPE html>
<html>
<head>
    <meta name="description"
          content="Set the configuration for the live stream.">
    <link rel="stylesheet" type="text/css" href="/learn/css/learning.css">

    <title>Live Stream Admin</title>
    <link rel="stylesheet" href="./admin/css/admin.css">
    <?php include '../../includes/header.php'; ?>

    <?php require_once __DIR__ . '/../dataMethods.php';?>

    <?php
    // code for when post is hit and password is correct
        if (!empty($_POST) && $_POST['password'] === PASSWORD)
        {
            isset($_POST['iframe']) ? setData(IFRAME_FILE, htmlspecialchars($_POST['iframe'])) : setData(IFRAME_FILE, "");
            isset($_POST['banner-content']) ? setData(BANNER_CONTENTS_FILE,htmlspecialchars($_POST['banner-content'])) : setData(BANNER_CONTENTS_FILE, "");
            isset($_POST['banner-enabled']) ? setData(BANNER_ENABLE_FILE, $_POST['banner-enabled']) : setData( BANNER_ENABLE_FILE, "off");
        }
        else // $_POST is empty.
        {
        }

        function getChecked()
        {
            $checkValue = getData(BANNER_ENABLE_FILE);
            if (!$checkValue || $checkValue == "off") {
                return "";
            } else {
                return "checked='true'";
            }
        }
    ?>

    <div class="adminMain">
        <form class="adminForm" action="" method="POST">
            <div class="admin-form-field">
                <label>
                    iframe
                    <textarea name="iframe" id="" cols="30" rows="10"><?php echo getData(IFRAME_FILE) ?></textarea>
                </label>
            </div>
            <div class="admin-form-field">
                <label>
                    Banner enabled
                    <input name="banner-enabled" type="checkbox" <?php echo getChecked() ?>>
                </label>
            </div>
            <div class="admin-form-field">
                <label>
                    Banner content
                    <textarea name="banner-content" id="" cols="30" rows="10"><?php echo getData(BANNER_CONTENTS_FILE) ?></textarea>
                </label>
            </div>

            <div class="admin-form-field">
                <label>
                    password
                    <input name="password" type="password">
                </label>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        var currentPage = 2;
    </script>

    <?php include '../../includes/footer.php'; ?>
