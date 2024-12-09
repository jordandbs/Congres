<?php
include_once './models/bdd.php';
include_once './models/Session.php';
include_once './views/session/create.php'; // Charge la vue de création de session

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les données envoyées par le formulaire
    $date_session = $_POST['date_session'] ?? null;
    $heure = $_POST['heure'] ?? null;
    $prix = $_POST['prix'] ?? null;

    // Valide les données (optionnel mais recommandé)
    if (empty($date_session) || empty($heure) || empty($prix)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    // Crée une instance de la classe Session
    $database = new Database();
    $db = $database->connect();
    $session = new Session($db);

    // Prépare les données pour l'insertion
    $data = [
        'date_session' => $date_session,
        'heure' => $heure,
        'prix' => $prix
    ];

    // Appelle la méthode createSession
    try {
        $result = $session->createSession($data);
        if ($result) {
            echo "Session créée avec succès.";
            // Redirige ou affiche un message
            header("Location: ./views/session/list.php"); // Exemple : redirection vers la liste des sessions
            exit;
        } else {
            echo "Une erreur est survenue lors de la création de la session.";
        }
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// Récupérer et passer les sessions à la vue
$database = new Database();
$db = $database->connect();
$sessionModel = new Session($db);  // Crée une instance du modèle
$sessions = $sessionModel->getAllsession();  // Récupère toutes les sessions de la base de données

// Inclure la vue de la liste des sessions
include_once './views/session/list.php';  // Assurez-vous de passer la variable $sessions à la vue
