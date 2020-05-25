<?php
$arr = ['PHP', 'HTML', 'CSS', 'JS'];
?>

<table border="1">
    <tr>
        <th>Ten khoa hoc</th>
    </tr>
    <?php foreach ($arr as $value) : ?>
    <tr>
        <td><?php echo $value; ?></td>
    </tr>
    <?php endforeach; ?>
</table>