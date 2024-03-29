<?php
if (!$_SESSION["article"])
    return;
$article = $_SESSION["article"];
if (!isset($article["name"]) && isset($_SESSION["user"])) {
    $article["name"] = $_SESSION["user"]["name"];
    $article["avatar"] = $_SESSION["user"]["avatar"];
}
?>

<div class="shortInfo">
    <div class="shortInfoAuthor">
        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($article['avatar']) . '" width="36" height="36"/>' ?>
        <a href="user.php?name=<?php echo $article['name'] ?>">
            <?php echo $article["name"] ?>
        </a>
    </div>
    <div class="shortInfoTimestamp">
        <?php echo date('F d, Y', strtotime($article["created_at"])) ?>
    </div>
</div>