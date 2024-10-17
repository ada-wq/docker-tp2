<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=data;dbname=tpdb', 'root', 'root');

// Création d'une table si elle n'existe pas
$pdo->exec("CREATE TABLE IF NOT EXISTS test_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
)");

// Insert une nouvelle entrée
$pdo->exec("INSERT INTO test_table (name) VALUES ('Entry " . rand(1, 100) . "')");

// Lire les entrées
$stmt = $pdo->query("SELECT * FROM test_table");
echo "<h1>Entries in Database:</h1>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: " . $row['id'] . " - Name: " . $row['name'] . "<br>";
}

// Optionnel : Mise à jour ou suppression d'une entrée
if (rand(0, 1)) { // Randomly update or delete
    $pdo->exec("UPDATE test_table SET name='Updated Entry' WHERE id = 1");
    echo "Updated entry with ID 1.<br>";
} else {
    $pdo->exec("DELETE FROM test_table WHERE id = 1");
    echo "Deleted entry with ID 1.<br>";
}
?>
