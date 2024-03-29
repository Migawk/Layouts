<?php
session_start();

$name = $_GET["name"];
if (isset($name)) {
    $conn = mysqli_connect("localhost", "admin", "1", "blog");
    if (!$conn) {
        die(mysqli_connect_error());
    } else {
        $sql = "SELECT * FROM authors WHERE name=\"" . $name . "\"";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
        $_SESSION["user"] = $user;

        $sql = "SELECT * FROM article WHERE author=\"" . $user["id"] . "\"";
        $result = mysqli_query($conn, $sql);
        $user["articles"] = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <title> TheBlog | <?php echo $user["name"] ?></title>
</head>

<body>
    <?php include './modules/header.php' ?>
    <main class="user">
        <div class="userPanel">
            <div class="userField">
                <?php echo '<img class="userAvatar" src="data:image/jpeg;base64,' . base64_encode($user['avatar']) . '" alt="' . $user["name"] . '" width="64" height="64"/>' ?>
                <div class="userData">
                    <div class="userName">
                        <?php echo $user["name"] ?>
                    </div>
                    <div class="userStatus">
                        <?php echo $user["status"] ?>
                    </div>
                </div>
            </div>
            <div class="userDescription">
                <?php
                echo $user["description"] ?>
            </div>
            <div class="userContacts">
                <button><img src="./assets/ico/facebook.svg"/></button>
                <button><img src="./assets/ico/twitter.svg"/></button>
                <button><img src="./assets/ico/instagram.svg"/></button>
                <button><img src="./assets/ico/youtube.svg"/></button>
            </div>
        </div>
        <section>
            <h1>Latest Posts</h1>
            <div class="list">
                <?php
                foreach ($user["articles"] as $article) {
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
    </main>
    <?php
    include "./modules/footer.php";
    ?>
</body>

</html>