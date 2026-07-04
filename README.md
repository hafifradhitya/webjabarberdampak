# Jabar Berdampak 🌱

> *Membangun masa depan yang berkelanjutan, satu komunitas pada satu waktu. Bergabunglah dalam perjalanan kami menuju bumi yang lebih hijau.*

**Jabar Berdampak** adalah sebuah portal komunitas dan inisiatif lingkungan yang berfokus pada pelestarian alam dan pemberdayaan masyarakat di Jawa Barat. Website ini berfungsi sebagai pusat informasi untuk berbagai program kerja, aktivitas sosial, serta artikel edukasi dan inspirasi yang bertujuan untuk menciptakan dampak positif bagi lingkungan sekitar.

---

## ✨ Fitur Utama

- **Beranda Dinamis:** Menampilkan ringkasan statistik dampak (pohon ditanam, relawan, program berjalan) dan struktur organisasi *(carousel slider)*.
- **Direktori Program & Aktivitas:** 
  - Penelusuran program kerja dan kegiatan dengan visual berbasis *Card*.
  - Label status yang jelas (Akan Datang/Perencanaan, Sedang Berlangsung, Selesai).
  - Halaman detail dengan fitur rekomendasi program terkait (Slider Horizontal).
- **Portal Berita & Artikel:**
  - Artikel seputar lingkungan dengan sistem filter kategori (*Chips* & Modal "Lainnya").
  - Rekomendasi "Artikel Terkait" cerdas berdasarkan kategori.
- **UI/UX Modern & Responsif:**
  - **Widget Berbagi (Share):** Terintegrasi dengan WhatsApp, X (Twitter), Facebook, dan Instagram.
  - **Copy Link Custom Toast:** Notifikasi modern (*pop-up* halus) saat menyalin tautan artikel.
  - **Back to Top Button:** Navigasi cepat (*smooth scroll*) yang muncul secara dinamis.
  - Desain *Clean*, penggunaan *Glassmorphism* ringan, dan *Mobile-Friendly*.

## 🛠️ Teknologi yang Digunakan

Proyek ini dibangun menggunakan *stack* teknologi yang kokoh dan modern:
- **Backend:** [Laravel](https://laravel.com/) (PHP Framework)
- **Frontend:** Blade Templating Engine
- **Styling:** Vanilla CSS (dengan sistem variabel dan utilitas kustom)
- **Interaktivitas:** Vanilla JavaScript (tanpa ketergantungan jQuery berat)
- **Asset Bundler:** [Vite](https://vitejs.dev/)

## 🚀 Panduan Instalasi (Development)

Jika Anda ingin menjalankan proyek ini di lingkungan lokal Anda, ikuti langkah-langkah berikut:

1. **Clone Repository**
   ```bash
   git clone https://github.com/username-anda/webjabarberdampak.git
   cd webjabarberdampak
   ```

2. **Install Dependensi PHP & Node.js**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Lingkungan (.env)**
   Salin file konfigurasi bawaan dan sesuaikan kredensial database Anda.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Migrasi Database (opsional)**
   Jalankan migrasi jika Anda memiliki pengaturan *database* dan *seeder*.
   ```bash
   php artisan migrate --seed
   ```

5. **Jalankan Server Lokal**
   Anda perlu menjalankan dua *terminal* terpisah. Satu untuk PHP dan satu untuk Vite (Aset Frontend).
   
   *Terminal 1:*
   ```bash
   php artisan serve
   ```
   
   *Terminal 2:*
   ```bash
   npm run dev
   ```

6. **Akses Website**
   Buka browser Anda dan kunjungi: `http://localhost:8000`

## 🤝 Berkontribusi

Kami sangat menyambut kontribusi dalam bentuk apa pun! Baik itu perbaikan *bug*, penambahan fitur, maupun penyempurnaan desain.
1. *Fork* repository ini.
2. Buat *branch* fitur Anda (`git checkout -b fitur/NamaFitur`).
3. *Commit* perubahan Anda (`git commit -m 'Menambahkan fitur XYZ'`).
4. *Push* ke *branch* Anda (`git push origin fitur/NamaFitur`).
5. Buat *Pull Request*.

---

**© 2024 Jabar Berdampak.** Semua hak cipta dilindungi.
