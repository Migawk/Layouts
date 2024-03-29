<?php
$conn = mysqli_connect("localhost", "admin", "1", "blog");
if (!$conn) {
    die(mysqli_connect_error());
} else {
    $sql = "SELECT * FROM article INNER JOIN authors ON article.author=authors.id WHERE title=\"Linguistic determinism\"";
    $result = mysqli_query($conn, $sql);
    $article = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
}
?>

<div class="banner">
    <?php echo '<img class="bannerImg" src="data:image/jpeg;base64,' . base64_encode($article['img']) . '" alt="' . $article["title"] . '"/>' ?>
    <div class="window">
        <div class="topic windowTopic">
            <?php echo $article["topic"] ?>
        </div>
        <h1 class="windowTitle">Linguistic determinism</h1>
        <div class="windowBottom">
            <div class="author">
                <?php echo $article["name"] ?>
            </div>
            <div class="timestamp">
                <?php echo date('F d, Y', strtotime("2024-03-29 00:14:53")) ?>
            </div>
        </div>
    </div>
</div>