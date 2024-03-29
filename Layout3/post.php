<?php
session_start();

$title = $_GET["title"];
if (isset($title)) {
    $conn = mysqli_connect("localhost", "admin", "1", "blog");
    if (!$conn) {
        die(mysqli_connect_error());
    } else {
        $sql = "SELECT * FROM article INNER JOIN authors ON article.author=authors.id WHERE title=\"" . $title . "\"";
        $result = mysqli_query($conn, $sql);
        $article = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
        $_SESSION["article"] = $article;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/index.css">
    <link rel="shortcut icon" href="./assets/ico/logo.svg" type="image/x-icon">
    <title>TheBlog |
        <?php echo $article["title"] ?>
    </title>
</head>

<body>
    <?php include './modules/header.php' ?>
    <main>
        <div class="topic windowTopic">
            <?php echo $article["topic"] ?>
        </div>
        <h1 class="postTitle">
            <?php echo $article["title"] ?>
        </h1>
        <div class="postInfo">
            <?php include "./components/shortInfo.php" ?>
        </div>
        <?php echo '<img class="postImg" src="data:image/jpeg;base64,' . base64_encode($article['img']) . '" alt="' . $article["title"] . '"/>' ?>
        <div class="postContent">
            <?php echo $article["content"]; ?>
        </div>
    </main>
    <?php
    include "./modules/footer.php";
    ?>
</body>

</html>