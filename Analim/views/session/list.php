<h1>Liste des sessions</h1>
<?php if (!empty($sessions)): ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Prix</th>
        </tr>
        <?php foreach ($sessions as $row): ?>
            <tr>
                <td><?php echo $row['nom_id']; ?></td>
                <td><?php echo $row['date_session']; ?></td>
                <td><?php echo $row['heure']; ?></td>
                <td><?php echo $row['prix']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Aucune session trouvée.</p>
<?php endif; ?>
