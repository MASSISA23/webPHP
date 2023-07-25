<?php
// Connexion à la base de données
$servername = "localhost";
$username = "nom_utilisateur";
$password = "mot_de_passe";
$dbname = "nom_bdd";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération des données des membres
$sql = "SELECT * FROM membres";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Affichage des données des membres dans un tableau
    echo "<table><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Date de naissance</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["nom"]."</td><td>".$row["prenom"]."</td><td>".$row["date_naissance"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Aucun membre trouvé.";
}

$conn->close();
?>
