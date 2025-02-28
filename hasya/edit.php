<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'todolist_hasya');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tasks WHERE id=$id");
    $data = mysqli_fetch_assoc($query);
}

if (isset($_POST['update_task'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];

    mysqli_query($koneksi, "UPDATE tasks SET task='$task', priority='$priority', due_date='$due_date' WHERE id=$id");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Task</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <input type="text" name="task" value="<?= $data['task']; ?>" required>
            <select name="priority">
                <option value="Biasa" <?= $data['priority'] == 'Biasa' ? 'selected' : ''; ?>>Biasa</option>
                <option value="Penting" <?= $data['priority'] == 'Penting' ? 'selected' : ''; ?>>Penting</option>
                <option value="Penting Sekali" <?= $data['priority'] == 'Penting Sekali' ? 'selected' : ''; ?>>Penting Sekali</option>
            </select>
            <input type="date" name="due_date" value="<?= $data['due_date']; ?>" required>
            <button type="submit" name="update_task">Update</button>
        </form>
    </div>
</body>
</html>
