<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $article_id = intval($_GET['id']);

    $sql = "SELECT id, title, content, image_path, created_at FROM articles WHERE id = $article_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No article found.";
        exit;
    }
} else {
    echo "No article ID specified.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($row['title']); ?></title>
  <link rel="icon" type="image/x-icon" href="N Icon.png">
  <link rel="stylesheet" href="tes1.css">
  <link rel="stylesheet" href="tes2.css">
  <link rel="stylesheet" href="tes3backgroundimage.css">
  <link rel="stylesheet" href="tes4.css">
  <style>
    .article {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        text-align: center;
    }
    .article img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }
    .article-content {
        text-align: center;
        color: white;
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
    <header>
      <h1 class="textheader">BLOG</h1>
    </header>
  </div>

  <main class="dacontent">
    <div class="containerforboxforbottom">
      <div class="ccconten">
        <div class="forhomepagetext">
          <div class="article-content">
            <div class="article">
              <h1><?php echo htmlspecialchars($row['title']); ?></h1>
              <p><small>Published on <?php echo htmlspecialchars($row['created_at']); ?></small></p>
              <?php if (!empty($row['image_path'])): ?>
                <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
              <?php endif; ?>
              <div class="article-content">
                <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
              </div>
            </div>
          </div>
        </div>
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
