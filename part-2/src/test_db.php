<?php
$host = getenv('DB_HOST');
$db = getenv('DB_DATABASE');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Database connection successful!<br>";

    // Prepare and execute the query
    $stmt = $pdo->query('SELECT * FROM test');

    // Fetch all results
    $results = $stmt->fetchAll();

    // Display the results
    if ($results) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Property Type</th><th>Bedrooms</th><th>Created By</th><th>Created At</th><th>Updated At</th></tr>";
        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['propertyType']) . "</td>";
            echo "<td>" . htmlspecialchars($row['bedrooms']) . "</td>";
            echo "<td>" . htmlspecialchars($row['created_by']) . "</td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td>" . htmlspecialchars($row['updated_at']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
