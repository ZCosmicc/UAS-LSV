-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2023 pada 08.13
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `forgot_password`
--

INSERT INTO `forgot_password` (`id`, `user_id`, `token`, `expiration`) VALUES
(0, 1, '64860042a874d', '2023-06-11 20:11:30'),
(0, 1, '648600b384abb', '2023-06-11 20:13:23'),
(0, 1, '6486017f9cc4b', '2023-06-11 20:16:47'),
(0, 1, '648601ea89808', '2023-06-11 20:18:34'),
(0, 1, '64860257d4284', '2023-06-11 20:20:23'),
(0, 1, '64868cf11bd71', '2023-06-12 06:11:45'),
(0, 1, '648694213a825', '2023-06-12 12:42:25'),
(0, 1, '648694be9c2f6', '2023-06-12 12:45:02'),
(0, 1, '64869aa2496e2', '2023-06-12 13:10:10'),
(0, 1, '64869b0c4b370', '2023-06-12 13:11:56'),
(0, 1, '6486a945f16a8', '2023-06-12 14:12:37'),
(0, 1, '6486b6626c19b', '2023-06-12 15:08:34'),
(0, 1, '6486d57d8a829', '2023-06-12 17:21:17'),
(0, 1, '64888173d8788', '2023-06-13 23:47:15'),
(0, 1, '648883c76bd3d', '2023-06-13 23:57:11'),
(0, 1, '648884b50587c', '2023-06-14 00:01:09'),
(0, 1, '6488859104f84', '2023-06-14 00:04:49'),
(0, 1, '64888663a8eaa', '2023-06-14 00:08:19'),
(0, 1, '6488888ab380e', '2023-06-14 00:17:30'),
(0, 1, '64888cf437cc8', '2023-06-14 00:36:20'),
(0, 1, '6488903a57bde', '2023-06-14 00:50:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` text NOT NULL,
  `deadline_date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_description`, `deadline_date`, `created_date`, `created_by`, `status`) VALUES
(10, 'gweh', 'njirrrrrrr', '2023-12-31', '2022-11-29 16:00:00', 7, 'In Progress'),
(11, 'UAS LSV', 'UAS LSV - SIMP \r\nSistem Informasi Manajemen Proyek ', '2023-01-30', '2022-11-29 16:00:00', 7, 'In Progress'),
(21, 'TUGAS PROJECT 2', 'ehehehhehehehe', '2023-06-30', '2023-06-02 16:00:00', 1, 'Completed'),
(37, 'Project Oppenheimer', 'ma little boi', '2023-06-30', '2023-06-11 16:00:00', 1, 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` text NOT NULL,
  `due_date` date NOT NULL,
  `responsible_user` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`, `task_description`, `due_date`, `responsible_user`, `status`, `project_id`) VALUES
(4, 'bfkbkbaf', 'xcad', '2023-06-07', 11, 'Completed', 21),
(18, 'Create Add Project button', 'Make add project button with their properties', '2023-07-06', 7, 'In Progress', 11),
(19, 'Create manage member feature', 'Create manage member for admin dashboard ', '2023-06-21', 7, 'In Progress', 11),
(20, 'Create projects page', 'Create projects page with different functionality between member and admin', '2023-07-07', 1, 'In Progress', 11),
(22, 'Buatkan Teh', 'mansa', '2023-06-14', 7, 'Pending', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_photo` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`, `user_photo`, `date_created`, `role`, `position`, `phone_number`, `address`, `gender`, `about`) VALUES
(1, 'Fariz Fadillah', 'farizfadillah612@gmail.com', '$2y$10$m1Z0y8Yuj1.mOcXbLjta8O7laPFgJDgGXjjykOMqjEe3UA3VSj3mS', 'Logo Z.Co.png', '2023-05-02 19:18:33', 'admin', 'Gwehj Hacker', '087873139405', 'Jl. Jalan', 'male', 'Hi saya lebahganteng :)'),
(7, 'Aulia Lita', 'lita@member.com', '$2y$10$ULmsGT.gOGLoeyC.dTS6oewGC7MsbvfQjDecw.vy8jqDarPJ.Dhb2', 'Logo Z.Co.png', '2023-06-01 13:08:03', 'member', 'Front-End', '087812346435', 'Jl. Street', 'female', 'Testing, saya adalah lita'),
(11, 'member', 'member@member.com', '$2y$10$0elQpUEQVWJG5H2/aZWZmeA0mOc7fAFSNvDAWEryanKF5CRo.qMsi', 'hirotaka.jpg', '2023-06-02 09:05:29', 'member', 'Back-End', '081245630990', 'Jl. Machi', 'male', 'Saya adalah seorang kapiten, mempunyai pedang panjang...');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `responsible_user` (`responsible_user`),
  ADD KEY `project_id` (`project_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD CONSTRAINT `forgot_password_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`responsible_user`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
