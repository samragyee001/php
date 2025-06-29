<!-- <?php
include "./controller/db_operation.php";
    $connString = connectToDatabase();
    $tableName = 'std_details';
    $students = table($tableName, $connString);
?> -->
<style>
    table {
        border-collapse: separate; 
        border-spacing: 10px 10px; /* horizontal vertical spacing */
        width: 80%;
        margin: 20px auto;
    }
    th, td {
        padding: 10px 15px; /* inner spacing inside each cell */
        border: 1px solid #ccc;
        text-align: left;
    }
</style>

<table border="2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Symbol</th>
            <th>Semester</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($students as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['id']) ?></td>
                <td><?= htmlspecialchars($student['fullname']) ?></td>
                <td><?= htmlspecialchars($student['symbol']) ?></td>
                <td><?= htmlspecialchars($student['semester']) ?></td>
                <td><a href="../modal/medit.php?id=<?= urlencode($student['id'])?>">Edit</a></td>
                <td><a href="../modal/delete.php?id=<?= urlencode($student['id']) ?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
