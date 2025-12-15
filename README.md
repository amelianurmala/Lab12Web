# Lab12Web

# Praktikum 12: Autentikasi dan Session

*Nama            : Amelia Nurmala Dewi*

*Kelas           : TI.24.A2*

*NIM             : 312410199*

*Mata Kuliah     : Pemrograman Web 1*

*Dosen Pengampu  : Agung Nugroho, S.Kom., M.Kom.*

---

## 1. Struktur Folder Proyek

```
lab11_php_oop/
├── index.php
├── config.php
├── class/
│   ├── Database.php
│   └── Form.php
├── module/
│   ├── home/
│   │   └── index.php
│   ├── artikel/
│   │   ├── index.php
│   │   ├── tambah.php
│   │   └── edit.php
│   └── user/
│       ├── login.php
│       ├── logout.php
│       └── profile.php
└── template/
    ├── header.php
    ├── footer.php
    └── sidebar.php
```

---

## 2. Konfigurasi Awal

### File: `config.php`

Digunakan untuk menyimpan konfigurasi database.

```php
$config = [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db'   => 'latihan_oop'
];
```

---

## 3. Routing & Session (index.php)

File `index.php` berfungsi sebagai **router utama**.

Fungsi utama:

* Mengaktifkan session
* Menentukan modul & halaman
* Membatasi akses halaman privat

```php
session_start();

$public_pages = ['home', 'user'];

if (!in_array($mod, $public_pages)) {
    if (!isset($_SESSION['is_login'])) {
        header('Location: user/login');
        exit;
    }
}
```

---

## 4. Database User

Tabel `users` digunakan untuk autentikasi.

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(255),
  nama VARCHAR(100)
);
```

Contoh data user (password sudah di-hash):

```sql
INSERT INTO users (username, password, nama)
VALUES (
 'admin',
 '$2y$10$5zqj9lYlK2rZ6nP3jYyF5eN0F0Z4l1xX5U0k1s9X5l6q0eJqYx5yG',
 'Administrator'
);
```

---

## 5. Fitur Login

### File: `module/user/login.php`

Login menggunakan:

* `password_verify()` untuk mencocokkan password
* Session untuk menyimpan status login

```php
if ($data && password_verify($password, $data['password'])) {
    $_SESSION['is_login'] = true;
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];

    header('Location: ../artikel/index');
    exit;
}
```

📌 **Username:** admin
📌 **Password:** admin123

---

## 6. Proteksi Halaman

Halaman seperti **artikel** dan **profil** hanya bisa diakses jika sudah login.

```php
if (!isset($_SESSION['is_login'])) {
    header('Location: ../user/login');
    exit;
}
```

---

## 7. Fitur Profil & Ganti Password

### File: `module/user/profile.php`

Pada fitur profil, user dapat:

* Melihat data diri
* Mengganti password

Password baru **wajib dienkripsi** menggunakan `password_hash()`.

```php
$hash = password_hash($password_baru, PASSWORD_DEFAULT);
$update = "UPDATE users SET password='{$hash}' WHERE username='{$username}'";
$db->query($update);
```

---

## 8. Logout

### File: `module/user/logout.php`

Logout berfungsi untuk:

* Menghapus session
* Mengarahkan user ke halaman login

```php
session_unset();
session_destroy();
header('Location: ../user/login');
exit;
```
---

## 9. Hasil Akhir

- Login berhasil menggunakan akun admin

- Menu logout muncul setelah login

- Halaman artikel tidak bisa diakses tanpa login

- Password dapat diganti dengan aman melalui halaman profil

---

## 10. Dokumentasi

### 1. Login dengan `admin / admin123`
<img width="1360" height="681" alt="Screenshot 2025-12-15 183039" src="https://github.com/user-attachments/assets/1a6b4717-4f06-4057-b8a8-3ddcd4af29df" />

### 2. Masuk ke halaman artikel
<img width="1357" height="678" alt="Screenshot 2025-12-15 193137" src="https://github.com/user-attachments/assets/d25d425e-51b1-4e6e-9194-1efb84f30b96" />

### 3. Home
<img width="1365" height="681" alt="Screenshot 2025-12-15 193116" src="https://github.com/user-attachments/assets/6d9bbaf7-bf0d-4de5-8205-badd3c5f20dd" />
<img width="1364" height="680" alt="Screenshot 2025-12-15 193234" src="https://github.com/user-attachments/assets/31cf6af9-4607-4965-a65a-410966f23534" />

### 4. Tambah Artikel
<img width="1365" height="676" alt="Screenshot 2025-12-15 193400" src="https://github.com/user-attachments/assets/a5ad8f00-e063-48cd-835e-49275692ca9c" />
<img width="1365" height="676" alt="Screenshot 2025-12-15 201710" src="https://github.com/user-attachments/assets/d073c21a-107b-4111-883d-35b43207c0ff" />

### 5. Edit Artikel
<img width="1365" height="675" alt="Screenshot 2025-12-15 193630" src="https://github.com/user-attachments/assets/71169b4e-dffe-4103-b166-21f9f968b824" />

### 6. Hapus Artikel
<img width="1361" height="674" alt="Screenshot 2025-12-15 193731" src="https://github.com/user-attachments/assets/6224c0b8-169b-4d0d-a3ef-bcdf23d009dc" />
<img width="1365" height="681" alt="Screenshot 2025-12-15 193824" src="https://github.com/user-attachments/assets/cfefbea4-f4e9-4975-872d-63015a55b48c" />

### 7. Detail Artikel
<img width="1363" height="679" alt="Screenshot 2025-12-15 193701" src="https://github.com/user-attachments/assets/54a62ab8-ab3a-42dd-a4a0-ab9c121166e6" />

### 8. Buka menu Profil
<img width="1364" height="678" alt="Screenshot 2025-12-15 194203" src="https://github.com/user-attachments/assets/53a8d592-5568-4270-b285-a5d4632472cd" />

### 9. Ganti password
<img width="1365" height="674" alt="Screenshot 2025-12-15 194842" src="https://github.com/user-attachments/assets/ed80e839-b81b-4d4a-afe1-0127cdc60bfb" />
<img width="1360" height="676" alt="Screenshot 2025-12-15 194904" src="https://github.com/user-attachments/assets/216fc0ac-4e45-45a3-8ace-04fe24bc2e9f" />

### 10. Logout
<img width="1364" height="677" alt="Screenshot 2025-12-15 194929" src="https://github.com/user-attachments/assets/a1fd9f21-44aa-4911-855a-8cc411bee344" />

### 11. Login ulang dengan password baru
<img width="1365" height="678" alt="Screenshot 2025-12-15 195247" src="https://github.com/user-attachments/assets/a3b708d5-5eed-4039-9e52-ad4054abdcaa" />
<img width="1365" height="680" alt="Screenshot 2025-12-15 195305" src="https://github.com/user-attachments/assets/e15ad992-6c39-4e69-936e-e9e097110fc3" />




