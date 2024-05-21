<?php
include 'db_connect.php';

$sql = "SELECT id, title, content, image_path, created_at FROM articles ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Articles</title>
    <link rel="icon" type="image/x-icon" href="N Icon.png">
    <link rel="stylesheet" href="tes1.css">
    <link rel="stylesheet" href="tes2.css">
    <link rel="stylesheet" href="tes3backgroundimage.css">
    <link rel="stylesheet" href="tes4.css">

    <style>
    .add-article-button {
    padding: 5px;
    display: block;
    text-decoration: none;
    color: black;
    text-align: center;
    font-size: 15px;
}

.add-article-button:hover {
    color: red;
}
</style>
</head>
<body>

<div class="containerforbg">
    <nav>
        <ul id="navigation_bar" class="navigation_bar">
        </ul>
    </nav>

    <div id="fadeintext" class="boxheader">
      <header class="">
          <h1 class="textheader">BLOG</h1>
      </header>
    </div>

    <main class="dacontent">
        <div class="add-article-button">
            <a href="add_article.php">
                <h1>Add Article</h1>
            </a>
        </div>
        <div class="containerforboxforbottom">
            <div class="ccconten">
                <div class="grid-transition">
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $first_sentence = strtok($row["content"], '.');
                            echo '<div class="responsive2">';
                            echo '<div class="gallery2">';
                            echo '<div class="top-box">';
                            echo '<div class="linkhead">';
                            echo '<a target="_blank" href="article.php?id=' . htmlspecialchars($row["id"]) . '">';
                            echo '<h1>' . htmlspecialchars($row["title"]) . '</h1>';
                            echo '</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="bottom-boxes">';
                            echo '<div class="left-box">';
                            echo '<img src="' . htmlspecialchars($row["image_path"]) . '" alt="' . htmlspecialchars($row["title"]) . '" width="300" height="200">';
                            echo '</div>';
                            echo '<div class="split-line"></div>';
                            echo '<div class="right-box">';
                            echo '<div class="desc2">' . htmlspecialchars($first_sentence) . '.</div>';
                            echo '</div>';
                            echo '<div class="delete-box">';
                            echo '<a href="(edit)delete_article.php?id=' . htmlspecialchars($row["id"]) . '" onclick="return confirm(\'Are you sure you want to delete this article?\')">Delete</a>';
                            echo '</div>';
                            echo " - ";
                            echo '<div class="edit-box">';
                            echo '<a href="(edit)edit_article.php?id=' . htmlspecialchars($row["id"]) . '">Edit</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "<p>No articles found</p>";
                    }
                    $conn->close();
                    ?>
                </div>
                <div class="clearfix"></div>
            </div>
            
        </div>
    </main>

    <footer class="boxforbottom">
        <div id="footer" class="footercontent"></div>
    </footer>

</div>
<script src="js1.js"></script>
</body>
</html>
