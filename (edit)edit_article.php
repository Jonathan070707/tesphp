<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $article_id = intval($_GET['id']);
    
    $stmt = $conn->prepare("SELECT title, content, image_path FROM articles WHERE id = ?");
    $stmt->bind_param('i', $article_id);
    $stmt->execute();
    $stmt->bind_result($title, $content, $image_path);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "No article ID provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Article</title>
    <link rel="stylesheet" href="tes1.css">
    <link rel="stylesheet" href="tes4.css">
    <style>

        .form-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: 0 auto;
            width: 50%; 
        }


        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }


        .center-image {
            display: block;
            margin: 0 auto;
        }


        form {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input[type="text"],
        textarea,
        input[type="file"],
        button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
        .articleeditheader{
        color: black;
        text-align: center;
        }
    </style>
</head>
<body>

    <h1 class="articleeditheader">Edit Article</h1>

<form action="(edit)update_article.php" method="post" enctype="multipart/form-data" class="form-center">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($article_id); ?>">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($content); ?></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image">
    </div>
    <div class="form-group">
        <button type="submit">Save</button>
    </div>
</form>

</body>
</html>

