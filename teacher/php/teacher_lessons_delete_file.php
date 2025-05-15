<?php

include '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $topic_id = $_POST['id'];

    // Start transaction
    $conn->begin_transaction();

    try {
        // Delete from lesson_video
        $sql = "DELETE FROM `lesson_video` WHERE `topic_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $topic_id);
        $stmt->execute();
        $stmt->close();

        // Delete from lesson_documents
        $sql = "DELETE FROM `lesson_documents` WHERE `topic_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $topic_id);
        $stmt->execute();
        $stmt->close();

        // Delete from lesson_content
        $sql = "DELETE FROM `lesson_content` WHERE `topic_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $topic_id);
        $stmt->execute();
        $stmt->close();

        // Delete from topics
        $sql = "DELETE FROM `topics` WHERE `id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $topic_id);
        $stmt->execute();
        $stmt->close();

        // Commit the transaction if all queries succeed
        $conn->commit();

        // ✅ Redirect after success
        echo "<script>
                alert('Record deleted successfully.');
                window.location.href='../php/teacher_lessons_page.php';
              </script>";
        exit();
    } catch (Exception $e) {
        // Rollback the transaction if any query fails
        $conn->rollback();

        // ✅ Redirect after failure
        echo "<script>
                alert('Something went wrong. Please try again.');
                window.location.href='../php/teacher_lessons_page.php';
              </script>";
        exit();
    }

    $conn->close();
}

