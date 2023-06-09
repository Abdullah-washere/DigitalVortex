<?php
session_start();
if (!isset($_REQUEST["post_id"])) {
    header("location:index.php");
}
$post_id = $_REQUEST["post_id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php
        include "src/css/style.css";
        include "src/css/details.css";
        ?>
    </style>
    <title>Socio | Details</title>
</head>

<body>
    <?php include "nav.php" ?>
    <div class="container">
        <?php
        include "conn.php";
        $Q = "SELECT * FROM post WHERE id='$post_id'";
        $res = mysqli_query($conn, $Q) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <div class="post-container">
                <h2 class="post-title"><?php echo $row["title"]; ?></h2>
                <img src="<?php echo $row["img"]; ?>" alt="Post Image" class="post-image">
                <p class="post-summary">
                <?php echo $row["description"]; ?>
                </p>

                <br><br>
                <center>
                    <h2>All Comments</h2> <br>
                    <hr> <br>
                </center>
                <div class="comments">
                    <?php
                    $post_id = $row["id"];
                    $QC = "SELECT * FROM comments WHERE post_id = '$post_id'";
                    $resQ = mysqli_query($conn, $QC);
                    if (mysqli_num_rows($resQ) > 0) {
                        while ($comment_row = mysqli_fetch_array($resQ)) {
                            ?>
                            <div class="comment">
                                <?php echo $comment_row["comment"]; ?>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<font style='color:red'>No Comments Available for this post</font>";
                    }
                    ?>
                </div>
            <?php
        }
        ?>

        </div>
    </div>
</body>

</html>
