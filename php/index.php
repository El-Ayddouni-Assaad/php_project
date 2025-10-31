<?php
// Autoriser les requêtes CORS depuis le frontend (port 3000)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

// Paramètres de connexion MySQL (définis dans docker-compose.yml)
$servername = "db";       // Nom du service Docker (pas localhost)
$username = "root";
$password = "root";
$database = "testdb";

// Tentative de connexion
$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    http_response_code(500);
    die("❌ Connexion échouée : " . $conn->connect_error);
}

// Requête simple pour tester la base
$sql = "SHOW DATABASES;";
$result = $conn->query($sql);

if ($result) {
    echo "✅ Connexion réussie à la base de données MySQL depuis Docker !<br>";
    echo "📦 Bases disponibles :<br><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row["Database"]) . "</li>";
    }
    echo "</ul>";
} else {
    echo "⚠️ Impossible d’exécuter la requête : " . $conn->error;
}

// Fermer la connexion
$conn->close();
?>