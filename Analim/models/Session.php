<?php
include_once './models/bdd.php';

class Session
{
    private $db; // Connexion à la base de données
    private $nom_id;
    private $date_session;
    private $prix;
    private $heure;

    // Constructeur avec les paramètres
    public function __construct($db = null, $nom_id = null, $date_session = null, $prix = null, $heure = null)
    {
        // Injecter l'objet PDO depuis l'extérieur ou créer une connexion
        if ($db === null) {
            $database = new Database();
            $this->db = $database->connect();
        } else {
            $this->db = $db;
        }

        $this->nom_id = $nom_id;
        $this->date_session = $date_session;
        $this->prix = $prix;
        $this->heure = $heure;
    }

    // Getters et Setters
    public function getNomID()
    {
        return $this->nom_id;
    }

    public function setNomID($nom_id)
    {
        $this->nom_id = $nom_id;
    }

    public function getDateSession()
    {
        return $this->date_session;
    }

    public function setDateSession($date_session)
    {
        $this->date_session = $date_session;
    }

    public function getHeureSession()
    {
        return $this->heure;
    }

    public function setHeureSession($heure)
    {
        $this->heure = $heure;
    }

    public function getPrixSession()
    {
        return $this->prix;
    }

    public function setPrixSession($prix)
    {
        $this->prix = $prix;
    }

    // Méthodes pour gérer les session
    public function getAllsession()
    {
        try {
            $query = $this->db->prepare("SELECT * FROM session");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des session : " . $e->getMessage());
        }
    }

    public function getSessionById($id)
    {
        try {
            $query = $this->db->prepare("SELECT * FROM session WHERE nom_id = ?");
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la récupération de la session : " . $e->getMessage());
        }
    }

    public function createSession($data)
    {
        try {
            $query = $this->db->prepare("INSERT INTO session (date_session, heure, prix) VALUES (?, ?, ?)");
            return $query->execute([$data['date_session'], $data['heure'], $data['prix']]);
        } catch (PDOException $e) {
            die("Erreur lors de la création de la session : " . $e->getMessage());
        }
    }

    public function updateSession($id, $data)
    {
        try {
            $query = $this->db->prepare("UPDATE session SET date_session = ?, heure = ?, prix = ? WHERE nom_id = ?");
            return $query->execute([$data['date_session'], $data['heure'], $data['prix'], $id]);
        } catch (PDOException $e) {
            die("Erreur lors de la mise à jour de la session : " . $e->getMessage());
        }
    }

    public function deleteSession($id)
    {
        try {
            $query = $this->db->prepare("DELETE FROM session WHERE nom_id = ?");
            return $query->execute([$id]);
        } catch (PDOException $e) {
            die("Erreur lors de la suppression de la session : " . $e->getMessage());
        }
    }
}