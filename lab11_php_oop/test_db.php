<?php
include "config.php";
include "class/Database.php";

echo "<h3>Testing Database Connection</h3>";

try {
    $db = new Database();
    echo "<div style='color:green; padding:10px; border:2px solid green;'>
          ✓ Database connected successfully!</div>";
    
    // Cek tabel artikel
    $result = $db->query("SHOW TABLES LIKE 'artikel'");
    if ($result && $result->num_rows > 0) {
        echo "<div style='color:blue; padding:10px; border:2px solid blue;'>
              ✓ Tabel 'artikel' ditemukan!</div>";
        
        // Hitung total artikel
        $count = $db->query("SELECT COUNT(*) as total FROM artikel");
        if ($count) {
            $row = $count->fetch_assoc();
            echo "<div style='padding:10px;'>
                  Total artikel dalam database: <strong>" . $row['total'] . "</strong></div>";
        }
    } else {
        echo "<div style='color:orange; padding:10px; border:2px solid orange;'>
              ⚠ Tabel 'artikel' tidak ditemukan. Silakan buat tabel.</div>";
    }
    
} catch (Exception $e) {
    echo "<div style='color:red; padding:10px; border:2px solid red;'>
          ✗ Database Error: " . $e->getMessage() . "</div>";
}
?>