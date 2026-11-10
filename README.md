## A. Identitas dan Capaian Praktikum

| | |
|---|---|
| **Nama** | Jumari |
| **NIM** | 312510077 |
| **Kelas** | I252A |
| **Mata Kuliah** | Pemrograman Web |
| **Nomor Modul** | 7 |
| **Topik** | Pemrograman server-side dengan PHP |
| **Cakupan** | Sintaks PHP, variabel, function, form processing, dan pengolahan data |
| **Perangkat** | Laptop/PC, web browser, Visual Studio Code, PHP, dan server lokal Laragon |

## B. Tujuan Praktikum

1. Memahami perbedaan pemrosesan client-side dan server-side.
2. Mengenali sintaks PHP dan menjalankan file PHP melalui server lokal.
3. Menggunakan variabel, tipe data, operator, percabangan, perulangan, dan function.
4. Menerima dan memproses data dari form HTML menggunakan metode GET dan POST.
5. Melakukan validasi dan sanitasi input dasar sebelum data ditampilkan atau diproses.
6. Membangun aplikasi sederhana yang menerima, memproses, dan menampilkan data pengguna.

## C. Latihan

Struktur Folder:

```
C:\laragon\www\Lab7_php\
|
|-- index.php
|-- miniproject.php
```

Cara menjalankan server lokal:

- Menggunakan Laragon yang telah memiliki Apache dan PHP
- Mengatur Path sehingga terhubung dengan VSCODE dan dapat menulis syntax via vscode
- Klik kanan pada Laragon > Tools > Path > Add Laragon to Path

![Laragon Add to Path](media/1.png)

- Cek di vscode untuk validasi
- Ketik `php -v` pada terminal

![php -v](media/2.png)

- Dengan output menghasilkan versi php, path telah tercipta dan dapat digunakan.

### 1. Menjalankan php

![Kode index.php](media/3.png)

Output:

Gunakan <http://localhost/Lab7_php/> di internet explorer untuk menghasilkan output.

![Output menjalankan php](media/4.png)

### 2. Variabel, operator, dan percabangan

Menggunakan logika if untuk menghasilkan predikat dengan perhitungan (tugas * 30%) + (uts * 30%) + (uas * 40%). Untuk hasil, rata-rata diatas 85 bernilai A, diatas 75 bernilai B, diatas 60 bernilai C, dibawah 60 bernilai D.

![Kode variabel, operator, dan percabangan](media/5.png)

Output:

![Output variabel, operator, dan percabangan](media/6.png)

### 3. Perulangan dan Array

Menggunakan echo untuk menampilkan output. `</ol>` untuk ordered list.

![Kode perulangan dan array](media/7.png)

Output:

![Output perulangan dan array](media/8.png)

### 4. Membuat Function

![Kode function](media/9.png)

Output:

![Output function](media/10.png)

### 5. Memproses Form dengan Get

![Kode form GET](media/11.png)

Output: Setelah mencari kata kunci "123". Catatan khusus: tidak boleh mengirim password menggunakan GET, karena akan muncul di halaman beranda.

![Output form GET](media/12.png)

### 6. Pemproses form dengan POST

![Kode form POST](media/13.png)

Output: Bila tidak mengisi form nama dan program studi

![Output form POST kosong](media/14.png)

Output: Bila memasukkan tanda kutip

Tetap bisa diterima karena tipe data text. Menerima huruf, simbol, dan angka

![Output form POST tanda kutip](media/15.png)

### 7. Pengolahan Data Sederhana

![Kode pengolahan data sederhana](media/16.png)

Output: kolom jumlah barang diisi desimal dan harga diisi bilangan bulat.

![Output jumlah desimal](media/17.png)

Output: Nama diisi, harga desimal dan jumlah bilangan bulat.

![Output harga desimal dan jumlah bulat](media/18.png)

## Mini Project

Buat aplikasi sederhana yang menerima data mahasiswa dan menampilkan ringkasan data setelah dikirim.

- Form memuat nama, NIM, program studi, semester, dan email.
- Gunakan metode POST untuk mengirim data.
- Lakukan validasi server-side: kolom wajib diisi, semester berupa bilangan bulat dalam rentang yang ditentukan, dan email memiliki format valid.
- Tampilkan kembali data dengan `htmlspecialchars()`.
- Pisahkan bagian pemrosesan data dari tampilan HTML jika memungkinkan.

Struktur Folder:

```
C:\laragon\www\Lab7_php\
|
|-- index.php
|-- miniproject.php
```

### 1. Penjelasan Potongan Kode Mini Project

![Kode mini project 1](media/19.png)

- `$data` dan `$error` berfungsi menyiapkan variabel penampung di tingkat teratas script.
- `trim` pada nama berfungsi menghilangkan spasi diawal dan diakhir input teks

![Kode mini project 2](media/20.png)

- `!ctype_digit` memastikan string nim murni berisi angka 0-9.
- `strlen` menghitung total jumlah digit angka
- `filter_validate` untuk memverifikasi apakah syntax email memiliki @
- int input < 1 || > 14 berfungsi memberikan peraturan nim hanya boleh ditulis pada banyak angka 1 sampai 14.
- `if(!$error)` untuk membuat array asosiatif secara otomatis berdasarkan nama variabel yang sudah ada.

![Kode mini project 3](media/21.png)

- `!empty` untuk memeriksa apakah array ada isinya
- `foreach` untuk mengulang dan mengeluarkan isi array satu persatu
- `htmlspecialchars` Menutup celah keamanan Cross-Site Scripting (XSS) dengan mengubah karakter khusus HTML (seperti < dan >) menjadi karakter entity aman

Output: Bila tidak memenuhi peraturan.

![Output tidak memenuhi peraturan](media/22.png)

Output: Bila sesuai

![Output sesuai](media/23.png)

## D. Pertanyaan Evaluasi

### 1. Perbedaan Pemrosesan Client-Side dan Server-Side

- **Client-Side Processing:** Proses dilakukan langsung di perangkat atau browser pengguna menggunakan teknologi seperti HTML, CSS, dan JavaScript. Tugas utamanya adalah mengatur tampilan (UI), menangani interaksi pengguna secara instan, dan melakukan validasi awal tanpa harus menghubungi server setiap kali ada aksi.
- **Server-Side Processing:** Proses dilakukan di komputer server sebelum hasilnya dikirim ke browser (contoh: PHP, Node.js, Python). Tugas utamanya adalah mengolah logika bisnis, berinteraksi dengan database, mengelola sesi login, serta memastikan keamanan data. Browser pengguna hanya menerima hasil akhir berupa kode HTML/CSS/JS yang sudah siap tampil.

### 2. Alasan File PHP Harus Dijalankan Melalui Web Server

PHP adalah bahasa pemrograman server-side scripting. Web browser (seperti Chrome atau Firefox) tidak memiliki mesin (interpreter) untuk membaca atau mengeksekusi sintaks kode PHP secara langsung.

File PHP membutuhkan web server (seperti Apache atau Nginx) yang terintegrasi dengan PHP Engine untuk: Menerjemahkan dan mengeksekusi semua baris skrip PHP di server, Mengolah logika dan query ke database, dan Mengubah hasil pemrosesan tersebut menjadi format yang dipahami browser (HTML/JSON) sebelum dikirimkan ke pengguna.

### 3. Fungsi Tanda $ pada Variabel PHP

Tanda dolar (`$`) berfungsi sebagai penanda wajib (identifier) untuk mendeklarasikan dan memanggil variabel dalam PHP. Tanpa tanda `$`, PHP akan menganggap kata tersebut sebagai konstan, kata kunci bawaan (keyword), atau perintah sintaks yang salah.

### 4. Perbedaan Metode GET dan POST

| Fitur | Get | Post |
|---|---|---|
| Pengiriman Data | Data digabungkan langsung pada URL (query string). | Data dikirim secara tersembunyi di dalam request body. |
| Kapasitas Data | Terbatas (sekitar 2.048 karakter tergantung browser). | Sangat besar / tidak terbatas secara praktis. |
| Keamanan | Kurang aman (data terlihat jelas di URL dan riwayat browser). | Lebih aman untuk data sensitif (password, nomor kartu kredit). |
| Penggunaan | Mengambil/pencarian data (misal: pencarian Google). | Mengirim/memperbarui data (misal: form login, registrasi). |
| Caching and Book Mark | Dapat di-bookmark dan disimpan di cache browser. | Tidak dapat di-bookmark atau di-cache. |

### 5. Pentingnya Validasi Input di Sisi Server

Validasi di sisi client (seperti menggunakan JavaScript atau atribut `required` HTML) sangat mudah dimanipulasi, dimatikan, atau dilewati oleh pengguna beritikad buruk melalui fitur Inspect Element, skrip otomatis, atau pengujian API (seperti Postman).

Validasi server-side adalah benteng keamanan utama untuk: Mencegah serangan siber berbahaya seperti SQL Injection, Cross-Site Scripting (XSS), dan Remote Code Execution, Memastikan data yang disimpan ke database benar-benar memenuhi format, tipe data, dan aturan bisnis yang sah.

### 6. Fungsi htmlspecialchars() saat Menampilkan Data Form

Fungsi `htmlspecialchars()` berguna untuk mengubah karakter khusus HTML menjadi karakter pelarian (HTML entities).

Contoh:

- `<` diubah menjadi `&lt;`
- `>` diubah menjadi `&gt;`
- `"` diubah menjadi `&quot;`

**Manfaat Utama:** Mencegah serangan Cross-Site Scripting (XSS). Jika pengguna menginput skrip berbahaya seperti `<script>alert('hacked')</script>`, perintah tersebut tidak akan dieksekusi oleh browser sebagai skrip program, melainkan hanya ditampilkan sebagai teks biasa di layar.

### 7. Manfaat Penggunaan Function dalam PHP

- **Reusabilitas Kode (Code Reusability):** Kode yang sering digunakan cukup ditulis satu kali dalam function dan dapat dipanggil berulang kali di berbagai bagian program.
- **Kemudahan Perawatan (Maintainability):** Jika ada bug atau perubahan logika, perbaikan cukup dilakukan pada function terkait tanpa perlu mengubah baris kode di banyak tempat.
- **Modularitas & Keterbacaan:** Program berukuran besar dapat dipecah menjadi bagian-bagian kecil yang lebih terstruktur dan lebih mudah dipahami oleh tim pengembang.
#
