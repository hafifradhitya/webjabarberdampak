-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2026 at 01:24 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jabarberdampak`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_publish` date DEFAULT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikels`
--

INSERT INTO `artikels` (`judul`, `slug`, `kategori`, `penulis`, `tanggal_publish`, `konten`, `gambar`, `status`, `created_at`, `updated_at`, `id`) VALUES
('Mengenal Laravel 11 untuk Pemula', 'mengenal-laravel-11-untuk-pemula-0dccf9e4-dccf-460e-852f-72d6ab472f14', 'edukasi', 'Lorem Ipsum', '2026-07-02', '<p data-start=\"796\" data-end=\"1025\" class=\"PDq2pG_selectionAnchorContainer\">Laravel 11 merupakan framework PHP modern yang dirancang untuk mempermudah proses pengembangan aplikasi web. Framework ini menggunakan pola MVC (Model-View-Controller) sehingga kode menjadi lebih terstruktur dan mudah dipelihara.<span aria-hidden=\"true\" class=\"PDq2pG_selectionAnchor\"></span></p><p data-start=\"1030\" data-end=\"1311\">Laravel menyediakan berbagai fitur seperti routing, middleware, authentication, migration, dan Eloquent ORM yang membantu developer membuat aplikasi dengan lebih cepat. Selain itu, Laravel juga memiliki komunitas yang besar sehingga dokumentasi dan tutorial sangat mudah ditemukan.</p><p>\r\n\r\n</p><p data-start=\"1316\" data-end=\"1478\">Bagi pemula, mempelajari Laravel merupakan langkah yang tepat untuk membangun website profesional karena sintaksnya sederhana dan banyak digunakan di dunia kerja.</p>', 'artikels/FPHjx7o3zygFTCtpNc2z9InkzvKJuAUYLVaSjuxl.png', 'published', '2026-07-01 22:34:02', '2026-07-02 06:09:48', '0dccf9e4-dccf-460e-852f-72d6ab472f14'),
('Perkembangan Artificial Intelligence di Tahun 2026', 'perkembangan-artificial-intelligence-di-tahun-2026-66b3e52d-e4bd-4129-88b7-c6f818944c4b', 'ai', 'Agus', '2026-07-02', '<p data-start=\"2238\" data-end=\"2467\" class=\"PDq2pG_selectionAnchorContainer\">Artificial Intelligence (AI) semakin banyak digunakan di berbagai sektor, mulai dari pendidikan, kesehatan, hingga industri kreatif. AI membantu meningkatkan efisiensi kerja melalui otomatisasi dan analisis data yang lebih cepat.<span aria-hidden=\"true\" class=\"PDq2pG_selectionAnchor\"></span></p><p data-start=\"2472\" data-end=\"2730\">Di bidang pendidikan, AI dimanfaatkan sebagai asisten belajar yang mampu memberikan penjelasan secara personal. Sementara itu, di dunia bisnis AI digunakan untuk menganalisis perilaku pelanggan sehingga perusahaan dapat mengambil keputusan yang lebih akurat.</p><p>\r\n\r\n</p><p data-start=\"2735\" data-end=\"2846\">Ke depan, AI diperkirakan akan menjadi salah satu teknologi yang paling berpengaruh terhadap kehidupan manusia.</p>', 'artikels/iuncKmmR6SmB4AwnXb8tplzc8hllRlpjmuqV9YUJ.png', 'published', '2026-07-01 22:35:49', '2026-07-02 06:09:48', '66b3e52d-e4bd-4129-88b7-c6f818944c4b'),
('Panduan Lengkap HTML, CSS, dan JavaScript', 'panduan-lengkap-html-css-dan-javascript-861067ea-bf1a-4dc7-bcf7-b7ceba2e8c43', 'edukasi', 'Adam', '2026-07-02', '<p data-start=\"2941\" data-end=\"3157\" class=\"PDq2pG_selectionAnchorContainer\">HTML digunakan untuk membangun struktur halaman website. CSS berfungsi mengatur tampilan agar lebih menarik, sedangkan JavaScript memberikan interaksi seperti animasi, validasi formulir, dan komunikasi dengan server.<span aria-hidden=\"true\" class=\"PDq2pG_selectionAnchor\"></span></p><p data-start=\"3162\" data-end=\"3400\">Ketiga teknologi tersebut merupakan fondasi utama dalam pengembangan website modern. Setelah menguasainya, developer dapat mempelajari framework seperti Bootstrap, React, Vue, maupun Laravel agar proses pengembangan menjadi lebih efisien.</p><p>\r\n\r\n</p><p data-start=\"3405\" data-end=\"3496\">Menguasai dasar web development akan mempermudah mempelajari teknologi yang lebih kompleks.</p>', 'artikels/9GVF3b0lJOiltxq4bGjOoKStArYnRWS8VW7JYwG5.png', 'published', '2026-07-01 22:36:21', '2026-07-02 06:09:48', '861067ea-bf1a-4dc7-bcf7-b7ceba2e8c43'),
('10 Tips Belajar Web Development Secara Efektif', '10-tips-belajar-web-development-secara-efektif-9baa655e-bacf-4f6a-9ff1-5dcb4f6d932c', 'edukasi', 'Lorem Ipsum', '2026-07-02', '<p data-start=\"1578\" data-end=\"1780\" class=\"PDq2pG_selectionAnchorContainer\">Belajar web development membutuhkan konsistensi dan latihan. Mulailah dengan memahami HTML sebagai struktur halaman, CSS untuk mempercantik tampilan, kemudian JavaScript agar website menjadi interaktif.<span aria-hidden=\"true\" class=\"PDq2pG_selectionAnchor\"></span></p><p data-start=\"1785\" data-end=\"1990\">Setelah menguasai dasar-dasarnya, pelajari framework seperti Bootstrap dan Laravel. Biasakan membuat proyek sederhana, membaca dokumentasi resmi, serta mengunggah hasil proyek ke GitHub sebagai portofolio.</p><p>\r\n\r\n</p><p data-start=\"1995\" data-end=\"2134\">Dengan belajar secara rutin setiap hari, kemampuan akan meningkat lebih cepat dibandingkan belajar dalam waktu lama tetapi tidak konsisten.</p>', 'artikels/jtGiJftpKTB5Ex7WuOb5z8oG3XvbEaMVIjHSVMyr.png', 'published', '2026-07-01 22:35:03', '2026-07-02 06:09:48', '9baa655e-bacf-4f6a-9ff1-5dcb4f6d932c'),
('Pentingnya Keamanan Website dari Serangan Siber', 'pentingnya-keamanan-website-dari-serangan-siber-af26c7b8-46fd-4f48-b121-769a57e3d4c9', 'edukasi', 'Agil', '2026-07-02', '<p data-start=\"3597\" data-end=\"3851\" class=\"PDq2pG_selectionAnchorContainer\">Keamanan website merupakan aspek penting dalam pengembangan aplikasi web. Developer harus menerapkan validasi input, menggunakan password yang dienkripsi, serta mengaktifkan proteksi terhadap serangan seperti SQL Injection dan Cross Site Scripting (XSS).<span aria-hidden=\"true\" class=\"PDq2pG_selectionAnchor\"></span></p><p data-start=\"3856\" data-end=\"4056\">Framework Laravel telah menyediakan berbagai fitur keamanan seperti CSRF Protection, Hashing Password, Authentication, dan Authorization sehingga membantu developer membangun aplikasi yang lebih aman.</p><p>\r\n\r\n</p><p data-start=\"4061\" data-end=\"4173\">Selain itu, melakukan update sistem secara berkala juga menjadi langkah penting untuk menjaga keamanan aplikasi.</p>', 'artikels/dI7OYNp8TtNSlDVIm5qOK1oujh14B9UmmPEZgoge.png', 'published', '2026-07-01 22:36:57', '2026-07-02 06:09:48', 'af26c7b8-46fd-4f48-b121-769a57e3d4c9');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatans`
--

CREATE TABLE `kegiatans` (
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `status` enum('upcoming','ongoing','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'upcoming',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatans`
--

INSERT INTO `kegiatans` (`thumbnail`, `nama_kegiatan`, `slug`, `tanggal_kegiatan`, `lokasi`, `deskripsi`, `status`, `created_at`, `updated_at`, `id`) VALUES
('thumbnails/CSWH5SXiSyYWzL69Ai7gDUQNwsx4kzIAJkAmB5aC.jpg', 'Workshop Laravel 11', 'workshop-laravel-11-125909da-367d-47f7-a17a-bd2334855651', '2026-07-03', 'Laboratorium Komputer SMKN 1 Bandung', 'Pelatihan pembuatan aplikasi web menggunakan Laravel 11 mulai dari instalasi hingga deployment.', 'upcoming', '2026-07-01 22:24:23', '2026-07-02 06:09:48', '125909da-367d-47f7-a17a-bd2334855651'),
('thumbnails/gmWYOgrZtnqqgY513IYlrjhQDbUf6KXSObaHrKWv.png', 'Lomba Web Development', 'lomba-web-development-8a7745af-bcef-45d2-a47f-d656b90316ab', '2026-07-02', 'Gedung Serbaguna Bandung', 'Kompetisi pembuatan website responsif menggunakan HTML, CSS, JavaScript, dan Laravel.', 'upcoming', '2026-07-01 22:25:12', '2026-07-02 06:09:48', '8a7745af-bcef-45d2-a47f-d656b90316ab'),
('thumbnails/A1vwpO37kKLoYUFMLFRIZmqVXjlJhs7lSCXotoyB.png', 'Seminar Teknologi AI 2027', 'seminar-teknologi-ai-2027-8f01728b-e587-4a06-805c-35f00c116db8', '2026-07-02', 'Aula Universitas Indonesia', 'Seminar mengenai perkembangan Artificial Intelligence, Machine Learning, dan implementasinya di dunia industri.', 'upcoming', '2026-07-01 22:23:46', '2026-07-02 06:09:48', '8f01728b-e587-4a06-805c-35f00c116db8'),
('thumbnails/t7qcPRmydC0BNbffqjQtdUgl1mRxXo9wNQtr0p0f.jpg', 'Bakti Sosial Desa Sukamaju', 'bakti-sosial-desa-sukamaju-d1c397d7-39e0-4c32-8381-6d19a6da0188', '2026-07-04', 'Desa Sukamaju, Garut', 'Kegiatan sosial berupa pembagian sembako, pemeriksaan kesehatan gratis, dan kerja bakti bersama warga.', 'completed', '2026-07-01 22:25:55', '2026-07-02 06:09:48', 'd1c397d7-39e0-4c32-8381-6d19a6da0188'),
('thumbnails/G0kUyldDX9URFyuUQZPR7uanKGQMWZbINxV41yuw.png', 'Festival Budaya Nusantara', 'festival-budaya-nusantara-eee5f397-a9e2-4e61-a43b-97afb8fd1527', '2026-07-03', 'Alun-Alun Kota Bandung', 'Festival yang menampilkan berbagai pertunjukan seni, kuliner tradisional, dan pameran budaya dari berbagai daerah di Indonesia.', 'upcoming', '2026-07-01 22:31:32', '2026-07-02 06:09:48', 'eee5f397-a9e2-4e61-a43b-97afb8fd1527');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_01_000001_create_kegiatans_table', 1),
(5, '2026_07_01_000002_create_artikels_table', 1),
(6, '2026_07_01_000003_create_prokers_table', 1),
(7, '2026_07_02_033557_add_gambar_to_prokers_table', 2),
(8, '2026_07_02_043330_add_thumbnail_to_kegiatans_table', 3),
(9, '2026_07_02_130232_add_slug_to_tables', 4),
(10, '2026_07_02_131409_change_user_id_to_uuid', 5),
(11, '2026_07_02_132000_change_tables_id_to_uuid', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prokers`
--

CREATE TABLE `prokers` (
  `nama_proker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anggaran` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` enum('planning','ongoing','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'planning',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prokers`
--

INSERT INTO `prokers` (`nama_proker`, `slug`, `tanggal_mulai`, `tanggal_selesai`, `penanggung_jawab`, `deskripsi`, `gambar`, `anggaran`, `status`, `created_at`, `updated_at`, `id`) VALUES
('Program Beasiswa Prestasi 2026', 'program-beasiswa-prestasi-2026-3c6d609e-2de6-4183-aeea-8a1cce816758', '2026-07-02', '2026-07-11', 'Udin', 'Program pemberian beasiswa kepada siswa dan mahasiswa berprestasi yang memiliki keterbatasan ekonomi. Beasiswa mencakup bantuan biaya pendidikan, perlengkapan belajar, dan pembinaan akademik.', 'proker_images/ayxYtskz7lAIq5JIXW74i1GyjW11432kdlya7xA6.png', 2000000.00, 'ongoing', '2026-07-01 22:42:36', '2026-07-02 06:09:48', '3c6d609e-2de6-4183-aeea-8a1cce816758'),
('Renovasi Fasilitas Sekolah', 'renovasi-fasilitas-sekolah-3d82aa0a-f4bf-4207-88c4-9694ff9a239a', '2026-07-02', '2026-07-04', 'Virgi', 'Renovasi meliputi perbaikan ruang kelas, laboratorium komputer, perpustakaan, serta pembangunan fasilitas sanitasi yang lebih baik untuk meningkatkan kenyamanan proses belajar mengajar.', 'proker_images/n19vcBueeMX3uSPZwhcOjOBSW3uSWWDEK28AEcnm.png', 4000000.00, 'planning', '2026-07-01 22:41:41', '2026-07-02 06:09:48', '3d82aa0a-f4bf-4207-88c4-9694ff9a239a'),
('Program Penghijauan Kota', 'program-penghijauan-kota-4a1211aa-155a-4491-a9a1-92fee7322010', '2026-07-02', '2026-07-04', 'Dimas', 'Program penghijauan bertujuan meningkatkan kualitas lingkungan melalui penanaman ribuan pohon di taman kota, sekolah, dan ruang terbuka hijau. Kegiatan juga melibatkan masyarakat untuk meningkatkan kesadaran terhadap pentingnya menjaga kelestarian lingkungan.', 'proker_images/BYOAeIdT2FDXAuko2b5lHFfGBMy0fbJTWNhB1SiS.png', 1000000.00, 'planning', '2026-07-01 22:40:19', '2026-07-02 06:09:48', '4a1211aa-155a-4491-a9a1-92fee7322010'),
('Festival Budaya dan Pariwisata Daerahhh', 'festival-budaya-dan-pariwisata-daerahhh-9788d42f-3d7e-43c6-bac0-7df49ca1e734', '2026-07-02', '2026-07-10', 'Putra', 'Kegiatan tahunan yang menampilkan pertunjukan seni tradisional, pameran UMKM lokal, kuliner khas daerah, serta promosi destinasi wisata untuk meningkatkan kunjungan wisatawan.', 'proker_images/CKmYV0ekqApvb1FBsJUDnHDdU8fFVW0LqmGbrRRc.png', 1000000.00, 'planning', '2026-07-01 22:43:38', '2026-07-02 06:09:48', '9788d42f-3d7e-43c6-bac0-7df49ca1e734'),
('Pelatihan Digital Marketing UMKM', 'pelatihan-digital-marketing-umkm-f91a4003-f8c2-450c-9ff7-1338929fcaf2', '2026-07-02', '2026-07-09', 'Ahmad', 'Program ini memberikan pelatihan kepada pelaku UMKM mengenai pemasaran digital, penggunaan media sosial, optimasi marketplace, dan strategi branding agar mampu meningkatkan penjualan secara online.', 'proker_images/cgec65WZc0ssfZHw2bGhE13V0StJ2vadAR0xKkeD.png', 2500000.00, 'ongoing', '2026-07-01 22:40:56', '2026-07-02 06:09:48', 'f91a4003-f8c2-450c-9ff7-1338929fcaf2');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LazVPBuhIBHkVRUiow0al2upir2IT7R36PZYyBbA', '1e915cb3-78c4-4e2e-9848-4e951536c4bd', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiU0ROenZLWUF0Q0hCUWk5OGJnM1Yzdm5veVVvRkJPUjZNMlgzTWE1eSI7czoxODoic2VjdXJlX2xvZ2luX3Rva2VuIjtzOjQwOiJPNlVTZXJaRjZYalRuWkJScEg2SkgzcUlWMzQ4RVY0MlIycmdjNmJqIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO3M6MzY6IjFlOTE1Y2IzLTc4YzQtNGUyZS05ODQ4LTRlOTUxNTM2YzRiZCI7czo1OiJhbGVydCI7YTowOnt9fQ==', 1782998614);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `id`) VALUES
('Admin', 'admin@admin.com', NULL, '$2y$12$918ghJh0y2x3rMgTH/bY5eW3YgUOptZdJa7Qq.z1PiP6aGeRJlldO', NULL, '2026-07-01 09:21:02', '2026-07-01 09:21:02', '1e915cb3-78c4-4e2e-9848-4e951536c4bd'),
('admin123', 'admin@gmail.com', NULL, '$2y$12$dm25gvZ.kJQ0HAFvOsZzHe1t3CKvDX4IeL5GfoAigMjLdP9BBXzbu', NULL, '2026-07-01 22:26:12', '2026-07-01 22:26:12', '9287c45d-5189-4b36-86eb-2630ea9bbc7d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artikels_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kegiatans_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `prokers`
--
ALTER TABLE `prokers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prokers_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
