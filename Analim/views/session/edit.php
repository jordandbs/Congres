<h1>Modifier une session</h1>
<form method="POST" action="">
    <label>Date de la session :</label>
    <input type="date" name="date_session" value="<?= $session['date_session'] ?>" required><br>
    <label>Heure :</label>
    <input type="time" name="heure" value="<?= $session['heure'] ?>" required><br>
    <label>Prix :</label>
    <input type="number" name="prix" value="<?= $session['prix'] ?>" step="0.01" required><br>
    <button type="submit">Mettre à jour</button>
</form>
