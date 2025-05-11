<?php

// $nama = ucwords("ilham");
// $nama = strtoupper("ilham");
$nama = strtolower("ilham");

function message()
{
    echo "tolong kirim kan ke layar anda...";
}

message();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
</head>

<body>
    <h1>HALO AKU, <?php echo $nama ?></h1>
</body>

</html>