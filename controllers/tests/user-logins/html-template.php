<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Test User Logins</title>
    <link rel="stylesheet" type="text/css" href="../../../views/styles.css">
</head>

<body>


<div class="status-info">

    <input type="button" value = 'PROCESSING LOGIN...' style="background:#4CAF50;color: #FFFFFF">

    <input type = "button" value="<?php echo 'username entered: ' . $username;?>">

    <?php

    ?>
</div>

<div class="status-info">
    <button type="button" onclick="window.location='../../../views/tests/user-logins/user-logins.html';">
        try again</button>
</div>
</body>
</html>
