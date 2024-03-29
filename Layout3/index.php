<?php
session_start();

$conn = mysqli_connect("localhost", "admin", "1", "blog");
if (!$conn) {
    die(mysqli_connect_error());
} else {
    $sql = "SELECT * FROM article INNER JOIN authors ON article.author=authors.id";
    $result = mysqli_query($conn, $sql);
    $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/index.css">
    <title>TheBlog</title>
    <link rel="shortcut icon" href="./assets/ico/logo.svg" type="image/x-icon">
</head>

<body>
    <?php include './modules/header.php' ?>
    <main>
        <?php include './modules/banner.php' ?>
        <article>
            <?php include "./components/advertisement.php" ?>
            <section>
                <h1>Latest Posts</h1>
                <div class="list">
                    <?php
                    foreach ($articles as $article) {
                        ?>
                        <div class="article">
                            <?php echo '<img class="articleImage" src="data:image/jpeg;base64,' . base64_encode($article['img']) . '" alt="' . $article["title"] . '"/>' ?>
                            <div class="topic">
                                <?php echo $article["topic"] ?>
                            </div>
                            <h2 class="articleName">
                                <?php echo '<a href="/post.php?title=' . $article["title"] . '">' . $article["title"] . '</a>' ?>
                            </h2>
                            <?php
                            $_SESSION["article"] = $article;
                            include "./components/shortInfo.php" ?>
                        </div>
                    <?php } ?>
                </div>
            </section>
            <?php include "./components/advertisement.php" ?>
        </article>
    </main>
    <?php include "./modules/footer.php" ?>
</body>

</html>