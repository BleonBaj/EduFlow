<?php
/**
 * Script për të rivendosur ose vendosur PIN-in e menaxhimit
 * Përdorim: php reset_pin.php
 * 
 * Ky skript ju lejon të:
 * 1. Rivendosni PIN-in nëse e keni harruar
 * 2. Vendosni një PIN të ri nëse nuk keni një
 */

require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/helpers.php';

// Të dhënat e përdoruesit admin
$email = 'elonberisha1999@gmail.com';
$newPin = '1234'; // Vendosni PIN-in e ri që dëshironi

try {
    $pdo = get_db_connection();
    
    // Gjej përdoruesin admin
    $stmt = $pdo->prepare('SELECT id, name, email FROM admins WHERE email = :email LIMIT 1');
    $stmt->execute(['email' => strtolower($email)]);
    $admin = $stmt->fetch();
    
    if (!$admin) {
        echo "❌ Përdoruesi me email '$email' nuk u gjet!\n";
        exit(1);
    }
    
    // Hash PIN-in e ri
    $pinHash = password_hash($newPin, PASSWORD_BCRYPT);
    
    // Përditëso PIN-in
    $updateStmt = $pdo->prepare('UPDATE admins SET management_pin_hash = :pin_hash WHERE id = :id');
    $updateStmt->execute([
        'pin_hash' => $pinHash,
        'id' => (int) $admin['id']
    ]);
    
    echo "✅ PIN-i u rivendos me sukses!\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "Email: {$admin['email']}\n";
    echo "Name: {$admin['name']}\n";
    echo "PIN i ri: $newPin\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "\nTani mund të hyni në settings me këtë PIN.\n";
    echo "Nëse dëshironi ta ndryshoni, shkoni në Settings dhe ndryshoni PIN-in.\n";
    
} catch (PDOException $e) {
    echo "❌ Gabim në bazën e të dhënave: " . $e->getMessage() . "\n";
    exit(1);
} catch (Exception $e) {
    echo "❌ Gabim: " . $e->getMessage() . "\n";
    exit(1);
}

