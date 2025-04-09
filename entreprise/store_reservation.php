<?php
require '../config/config.php';

try {
    $sql = "INSERT INTO reservation (
        name, email, phone, currentAddress, newAddress, wilaya, date, time, details
    ) VALUES (
        :name, :email, :phone, :currentAddress, :newAddress, :wilaya, :date, :time, :details
    )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'currentAddress' => $_POST['currentAddress'],
        'newAddress' => $_POST['newAddress'],
        'wilaya' => $_POST['wilaya'],
        'date' => $_POST['date'],
        'time' => $_POST['time'],
        'details' => $_POST['details'] ?? null,
    ]);

    header("Location: list_reservations.php?success=1");
    exit;
} catch (PDOException $e) {
    die("Erreur d'insertion: " . $e->getMessage());
}
