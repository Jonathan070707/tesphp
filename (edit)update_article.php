<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $article_id = intval($_POST['id']);
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image_path = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    if ($image_path) {
        $stmt = $conn->prepare("UPDATE articles SET title = ?, content = ?, image_path = ? WHERE id = ?");
        $stmt->bind_param('sssi', $title, $content, $image_path, $article_id);
    } else {
        $stmt = $conn->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
        $stmt->bind_param('ssi', $title, $content, $article_id);
    }

    if ($stmt->execute()) {
        echo "Article updated successfully.";
    } else {
        echo "Error updating article: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
} else {
    echo "Invalid request method.";
}
?>

<!-- Edit Button -->
<button class="edit-button" data-article-id="<?php echo htmlspecialchars($row["id"]); ?>">Edit</button>

<!-- JavaScript -->
<script>
    // Add event listener to all edit buttons
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function() {
            const articleId = this.getAttribute('data-article-id');
            // Send AJAX request to fetch edit form
            fetch('(edit)edit_article.php?id=' + articleId)
            .then(response => response.text())
            .then(html => {
                // Display the edit form
                document.body.innerHTML += html;
            })
            .catch(error => {
                console.error('Error loading edit form:', error);
            });
        });
    });
</script>