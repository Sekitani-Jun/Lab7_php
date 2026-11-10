<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Mahasiswa</title>
</head>
<body>
    <h1>Form Data Mahasiswa</h1>

    <?php
    
    $data = null;
    $error = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nama = trim($_POST["nama"] ?? "");
        $nim = trim($_POST["nim"] ?? "");
        $prodi = trim($_POST["prodi"] ?? "");
        $semesterInput = $_POST["semester"] ?? "";
        $email = trim($_POST["email"] ?? "");

        if ($nama === "") $error[] = "Nama wajib diisi.";
        
        if (!ctype_digit($nim) || strlen($nim) < 1 || strlen($nim) > 10) {
            $error[] = "NIM harus berupa angka sebanyak 1–10 digit.";
        }

        if ($prodi === "") $error[] = "Program studi wajib diisi.";
        
        if ($email === "") {
            $error[] = "Email wajib diisi.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Format email tidak valid.";
        }
        
        if (!ctype_digit((string)$semesterInput) || (int)$semesterInput < 1 || (int)$semesterInput > 14) {
            $error[] = "Semester harus berupa angka 1–14.";
        }

        if (!$error) {
            $data = compact("nama", "nim", "prodi", "email");
            $data["semester"] = (int)$semesterInput;
        }
    }
    ?>

    <!-- Tampil Pesan Error -->
    <?php if (!empty($error)): ?>
        <h3>Terjadi Kesalahan:</h3>
        <ul>
            <?php foreach ($error as $err): ?>
                <li><?= htmlspecialchars($err, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
        <hr>
    <?php endif; ?>

    <!-- Tampil Ringkasan Data -->
    <?php if ($data): ?>
        <h3>Ringkasan Data Mahasiswa</h3>
        <ul>
            <li>Nama: <?= htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8') ?></li>
            <li>NIM: <?= htmlspecialchars($data['nim'], ENT_QUOTES, 'UTF-8') ?></li>
            <li>Program Studi: <?= htmlspecialchars($data['prodi'], ENT_QUOTES, 'UTF-8') ?></li>
            <li>Semester: <?= htmlspecialchars($data['semester'], ENT_QUOTES, 'UTF-8') ?></li>
            <li>Email: <?= htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8') ?></li>
        </ul>
        <hr>
    <?php endif; ?>

    <!-- Form Input Data -->
    <form method="POST" action="">
        <p>
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($_POST['nama'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </p>
        <p>
            <label for="nim">NIM (1-10 digit):</label><br>
            <input type="text" id="nim" name="nim" value="<?= htmlspecialchars($_POST['nim'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </p>
        <p>
            <label for="prodi">Program Studi:</label><br>
            <input type="text" id="prodi" name="prodi" value="<?= htmlspecialchars($_POST['prodi'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </p>
        <p>
            <label for="semester">Semester (1-14):</label><br>
            <input type="number" id="semester" name="semester" value="<?= htmlspecialchars($_POST['semester'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </p>
        <p>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </p>

        <!-- Tombol Kirim -->
        <button type="submit">Kirim Data</button>
    </form>
</body>
</html>