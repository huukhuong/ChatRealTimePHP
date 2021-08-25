-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 25, 2021 lúc 02:08 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `chat`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_user_id` int(11) NOT NULL,
  `receiver_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time_send` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `sender_user_id`, `receiver_user_id`, `message`, `time_send`) VALUES
(9, 122197, 122198, 'hello', '2021-08-25 11:41:41'),
(10, 122198, 122197, 'hi', '2021-08-25 11:42:41'),
(11, 122197, 122198, 'ok', '2021-08-25 11:42:46'),
(12, 122198, 122197, 'good job', '2021-08-25 11:42:52'),
(13, 122197, 122198, 'hahaa', '2021-08-25 12:12:31'),
(14, 122197, 122198, 'Alo', '2021-08-25 12:19:16'),
(15, 122198, 122197, 'Ahihi', '2021-08-25 12:19:19'),
(16, 122205, 122197, 'Hello anh', '2021-08-25 18:30:43'),
(17, 122197, 122205, 'alo', '2021-08-25 18:52:44'),
(18, 122197, 122205, 'hi', '2021-08-25 18:57:54'),
(19, 122205, 122197, 'nghe', '2021-08-25 18:57:57'),
(20, 122197, 122205, 'Hello', '2021-08-25 19:05:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `last_activity` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `img`, `last_activity`) VALUES
(122197, 'Trần Hữu Khương', 'huukhuong.it@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Avatar.jpg', '2021-08-25 19:08:06'),
(122198, 'Võ Hoàng Kiệt', 'kietml@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Kiet.jpg', '2021-08-25 19:08:18'),
(122205, 'Nguyễn Văn A', 'a@a.m', '0cc175b9c0f1b6a831c399e269772661', '2126186.jpg', '2021-08-25 19:03:57');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122206;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
