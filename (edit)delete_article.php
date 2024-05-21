<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $article_id = intval($_GET['id']);

    // Delete the article
    $stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->bind_param('i', $article_id);

    if ($stmt->execute()) {
        echo "Article deleted successfully.";
    } else {
        echo "Error deleting article: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
} else {
    echo "No article ID.";
}
?>

<!-- Delete Button -->
<button class="delete-button" data-article-id="<?php echo htmlspecialchars($row["id"]); ?>">Delete</button>

<!-- JavaScript -->
<script>
    // Add event listener to all delete buttons
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function() {
            const articleId = this.getAttribute('data-article-id');
            if (confirm('Are you sure you want to delete this article?')) {
                // Send AJAX request to delete article
                fetch('delete_article.php?id=' + articleId, {
                    method: 'DELETE'
                })
                .then(response => {
                    if (response.ok) {
                        // Article deleted successfully
                        // Remove the article from the DOM
                        this.closest('.responsive2').remove();
                    } else {
                        // Error handling
                        console.error('Error deleting article:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Error deleting article:', error);
                });
            }
        });
    });
</script>

