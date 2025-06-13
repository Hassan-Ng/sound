<?php
include("./components/header.php");
$Id = $_GET['id'];

if ($Id) {
    $check_sql = "SELECT * FROM songs where id=$Id";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $sql = "delete from songs where id = $Id";
        $result = mysqli_query($conn, $sql);

        $fetched_row = mysqli_fetch_assoc($check_result);

        if ($result) {
            unlink('../songs/' . $fetched_row['song_path']);
            unlink('../images/' . $fetched_row['song_img']);
        }
    }
}

echo "<script>
    window.location.href = 'songs_show.php';
    </script>";