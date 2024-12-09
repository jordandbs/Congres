<h1>Créer une nouvelle session</h1>
<form method="POST" action="">
    <label>Date de la session :</label>
    <input type="date" name="date_session" required><br>
    <label>Heure :</label>
    <input type="time" name="heure" required><br>
    <label>Prix :</label>
    <input type="number" name="prix" step="0.01" required><br>
    <button type="submit">Créer</button>
</form>