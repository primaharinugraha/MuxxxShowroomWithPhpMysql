-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2024 pada 16.48
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `showroomprima`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(2, 'sedan'),
(3, 'suv'),
(4, 'SportCar'),
(6, 'electric car'),
(7, 'Hybrid Car'),
(8, 'Minivan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `ketersediaan_stok` enum('Habis','Tersedia') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `ketersediaan_stok`) VALUES
(1, 2, 'audy', 8888, 'ELMNpp0DXkhKeY71FJs3.jpg.', '                    ubah          ', 'Tersedia'),
(2, 8, 'Alphard', 1000000000, '1zpUY1vuIx3ohYCKAY00.jpg', '                    oke Punya                    ', 'Tersedia'),
(3, 4, 'Ferrari', 9898989899898, 'I46LrlsRkXvQUrq2aOnW.jpg', '                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum sint incidunt iure ad dolore fuga laboriosam perferendis alias vitae modi iusto maiores eum reiciendis, voluptate, voluptas officia ipsa sunt odio itaque ab! Aut doloremque quaerat reiciendis ratione obcaecati debitis odit illo earum assumenda quam deleniti consectetur illum numquam fuga, vel ex accusamus velit harum ad non? Atque non ipsa voluptas sunt possimus dicta, in delectus qui eligendi optio eum ab ipsam tempora doloremque officia ullam magni natus. Repellat, natus aliquid totam delectus dolore quod, laboriosam praesentium blanditiis, necessitatibus consectetur ipsam ratione veniam corporis. Dolor sit odio adipisci libero quo eligendi.     ', 'Tersedia'),
(4, 6, 'mobil listrik', 4564646, 'W6RPfmKTeaq02swDFwjO.jpg.', 'bisaa', 'Tersedia'),
(5, 3, 'Rangerover', 80000000, 'aQVILE59qn9ISDvNQqLq.jpg', '                                                   Gaharrr                                                                        ', 'Tersedia'),
(7, 2, 'audy2', 9999999999999, 'NTOf7dkdX9M9ButXAQpy.jpg.', '                    Audy2 kencang', 'Tersedia'),
(8, 2, 'Jaguar', 898784768468748, 'Ko15JIfvmPeZwyPhz7R1.jpg.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum sint incidunt iure ad dolore fuga laboriosam perferendis alias vitae modi iusto maiores eum reiciendis, voluptate, voluptas officia ipsa sunt odio itaque ab! Aut doloremque quaerat reiciendis ratione obcaecati debitis odit illo earum assumenda quam deleniti consectetur illum numquam fuga, vel ex accusamus velit harum ad non? Atque non ipsa voluptas sunt possimus dicta, in delectus qui eligendi optio eum ab ipsam tempora doloremque officia ullam magni natus. Repellat, natus aliquid totam delectus dolore quod, laboriosam praesentium blanditiis, necessitatibus consectetur ipsam ratione veniam corporis. Dolor sit odio adipisci libero quo eligendi. ', 'Tersedia'),
(9, 2, 'Mercy S-class', 700000000, 'kvymsCaBYOIlHkR992S4.jpg.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum sint incidunt iure ad dolore fuga laboriosam perferendis alias vitae modi iusto maiores eum reiciendis, voluptate, voluptas officia ipsa sunt odio itaque ab! Aut doloremque quaerat reiciendis ratione obcaecati debitis odit illo earum assumenda quam deleniti consectetur illum numquam fuga, vel ex accusamus velit harum ad non? Atque non ipsa voluptas sunt possimus dicta, in delectus qui eligendi optio eum ab ipsam tempora doloremque officia ullam magni natus. Repellat, natus aliquid totam delectus dolore quod, laboriosam praesentium blanditiis, necessitatibus consectetur ipsam ratione veniam corporis. Dolor sit odio adipisci libero quo eligendi. ', 'Tersedia'),
(10, 2, 'Bmw', 88888888888, 'g0Oqzxr5WIJpaSaoOa32.jpg.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum sint incidunt iure ad dolore fuga laboriosam perferendis alias vitae modi iusto maiores eum reiciendis, voluptate, voluptas officia ipsa sunt odio itaque ab! Aut doloremque quaerat reiciendis ratione obcaecati debitis odit illo earum assumenda quam deleniti consectetur illum numquam fuga, vel ex accusamus velit harum ad non? Atque non ipsa voluptas sunt possimus dicta, in delectus qui eligendi optio eum ab ipsam tempora doloremque officia ullam magni natus. Repellat, natus aliquid totam delectus dolore quod, laboriosam praesentium blanditiis, necessitatibus consectetur ipsam ratione veniam corporis. Dolor sit odio adipisci libero quo eligendi. ', 'Tersedia'),
(11, 8, 'Toyota Velvire', 999999999, 'VAuosxBaRGfGcsOLDk9o.jpg.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum sint incidunt iure ad dolore fuga laboriosam perferendis alias vitae modi iusto maiores eum reiciendis, voluptate, voluptas officia ipsa sunt odio itaque ab! Aut doloremque quaerat reiciendis ratione obcaecati debitis odit illo earum assumenda quam deleniti consectetur illum numquam fuga, vel ex accusamus velit harum ad non? Atque non ipsa voluptas sunt possimus dicta, in delectus qui eligendi optio eum ab ipsam tempora doloremque officia ullam magni natus. Repellat, natus aliquid totam delectus dolore quod, laboriosam praesentium blanditiis, necessitatibus consectetur ipsam ratione veniam corporis. Dolor sit odio adipisci libero quo eligendi. ', 'Tersedia'),
(12, 8, 'Toyota Foxy', 99997878868, 'bFI04KP8Y5NM6lQbtRWc.jpg.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum sint incidunt iure ad dolore fuga laboriosam perferendis alias vitae modi iusto maiores eum reiciendis, voluptate, voluptas officia ipsa sunt odio itaque ab! Aut doloremque quaerat reiciendis ratione obcaecati debitis odit illo earum assumenda quam deleniti consectetur illum numquam fuga, vel ex accusamus velit harum ad non? Atque non ipsa voluptas sunt possimus dicta, in delectus qui eligendi optio eum ab ipsam tempora doloremque officia ullam magni natus. Repellat, natus aliquid totam delectus dolore quod, laboriosam praesentium blanditiis, necessitatibus consectetur ipsam ratione veniam corporis. Dolor sit odio adipisci libero quo eligendi. ', 'Tersedia'),
(13, 8, 'Hyundai Staria', 9999999999999, 'z8DioT4CBTRowGqNAnGR.jpg.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum sint incidunt iure ad dolore fuga laboriosam perferendis alias vitae modi iusto maiores eum reiciendis, voluptate, voluptas officia ipsa sunt odio itaque ab! Aut doloremque quaerat reiciendis ratione obcaecati debitis odit illo earum assumenda quam deleniti consectetur illum numquam fuga, vel ex accusamus velit harum ad non? Atque non ipsa voluptas sunt possimus dicta, in delectus qui eligendi optio eum ab ipsam tempora doloremque officia ullam magni natus. Repellat, natus aliquid totam delectus dolore quod, laboriosam praesentium blanditiis, necessitatibus consectetur ipsam ratione veniam corporis. Dolor sit odio adipisci libero quo eligendi. ', 'Tersedia'),
(14, 8, 'Mercy V-class', 9999999999999, 'OG2rQsAVUeOzrEHSTTEH.jpg.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum sint incidunt iure ad dolore fuga laboriosam perferendis alias vitae modi iusto maiores eum reiciendis, voluptate, voluptas officia ipsa sunt odio itaque ab! Aut doloremque quaerat reiciendis ratione obcaecati debitis odit illo earum assumenda quam deleniti consectetur illum numquam fuga, vel ex accusamus velit harum ad non? Atque non ipsa voluptas sunt possimus dicta, in delectus qui eligendi optio eum ab ipsam tempora doloremque officia ullam magni natus. Repellat, natus aliquid totam delectus dolore quod, laboriosam praesentium blanditiis, necessitatibus consectetur ipsam ratione veniam corporis. Dolor sit odio adipisci libero quo eligendi. ', 'Tersedia'),
(15, 3, 'Peugeot 5008', 77777777777777, 'Oun19G6feaWrngRchtbg.jpg.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum sint incidunt iure ad dolore fuga laboriosam perferendis alias vitae modi iusto maiores eum reiciendis, voluptate, voluptas officia ipsa sunt odio itaque ab! Aut doloremque quaerat reiciendis ratione obcaecati debitis odit illo earum assumenda quam deleniti consectetur illum numquam fuga, vel ex accusamus velit harum ad non? Atque non ipsa voluptas sunt possimus dicta, in delectus qui eligendi optio eum ab ipsam tempora doloremque officia ullam magni natus. Repellat, natus aliquid totam delectus dolore quod, laboriosam praesentium blanditiis, necessitatibus consectetur ipsam ratione veniam corporis. Dolor sit odio adipisci libero quo eligendi. ', 'Tersedia'),
(16, 3, 'Honda Crv', 9999999999999, 'cbnGfuAqcyYyoqaLWniQ.jpg.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum sint incidunt iure ad dolore fuga laboriosam perferendis alias vitae modi iusto maiores eum reiciendis, voluptate, voluptas officia ipsa sunt odio itaque ab! Aut doloremque quaerat reiciendis ratione obcaecati debitis odit illo earum assumenda quam deleniti consectetur illum numquam fuga, vel ex accusamus velit harum ad non? Atque non ipsa voluptas sunt possimus dicta, in delectus qui eligendi optio eum ab ipsam tempora doloremque officia ullam magni natus. Repellat, natus aliquid totam delectus dolore quod, laboriosam praesentium blanditiis, necessitatibus consectetur ipsam ratione veniam corporis. Dolor sit odio adipisci libero quo eligendi. ', 'Tersedia'),
(17, 3, 'Honda Hrv', 5555555555555, '4bvXsBUPMmc8QqbNWRWl.png.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum sint incidunt iure ad dolore fuga laboriosam perferendis alias vitae modi iusto maiores eum reiciendis, voluptate, voluptas officia ipsa sunt odio itaque ab! Aut doloremque quaerat reiciendis ratione obcaecati debitis odit illo earum assumenda quam deleniti consectetur illum numquam fuga, vel ex accusamus velit harum ad non? Atque non ipsa voluptas sunt possimus dicta, in delectus qui eligendi optio eum ab ipsam tempora doloremque officia ullam magni natus. Repellat, natus aliquid totam delectus dolore quod, laboriosam praesentium blanditiis, necessitatibus consectetur ipsam ratione veniam corporis. Dolor sit odio adipisci libero quo eligendi. ', 'Tersedia'),
(18, 3, 'Mazda Cx5', 444444444, 'o8tUBteMhTMrQhJYWFRC.jpg.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum sint incidunt iure ad dolore fuga laboriosam perferendis alias vitae modi iusto maiores eum reiciendis, voluptate, voluptas officia ipsa sunt odio itaque ab! Aut doloremque quaerat reiciendis ratione obcaecati debitis odit illo earum assumenda quam deleniti consectetur illum numquam fuga, vel ex accusamus velit harum ad non? Atque non ipsa voluptas sunt possimus dicta, in delectus qui eligendi optio eum ab ipsam tempora doloremque officia ullam magni natus. Repellat, natus aliquid totam delectus dolore quod, laboriosam praesentium blanditiis, necessitatibus consectetur ipsam ratione veniam corporis. Dolor sit odio adipisci libero quo eligendi. ', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ussername` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ussername`, `password`) VALUES
(1, 'admin', '$2y$10$SoVHqT/IER16Zyiom.T2lOv/RJwnkLWN5WYGQgnvWeTMWnUMCi/LO');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
