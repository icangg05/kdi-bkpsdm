-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: shared-mysql
-- Generation Time: Aug 08, 2025 at 11:22 AM
-- Server version: 8.0.42
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bkpsdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'SEKRETARIAT', 'sekretariat', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(3, 'BIDANG PENILAIAN KINERJA APARATUR & PENGHARGAAN', 'bidang-penilaian-kinerja-aparatur-penghargaan', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(4, 'BIDANG MUTASI DAN PROMOSI', 'bidang-mutasi-dan-promosi', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(5, 'BIDANG PENGADAAN, PEMBERHENTIAN DAN INFORMASI', 'bidang-pengadaan-pemberhentian-dan-informasi', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(6, 'BIDANG PENGEMBANGAN KOMPETENSI APARATUR', 'bidang-pengembangan-kompetensi-aparatur', '2025-08-03 13:19:33', '2025-08-03 13:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_view` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `tanggal`, `isi`, `sampul`, `lampiran`, `kategori`, `total_view`, `created_at`, `updated_at`) VALUES
(1, 'Ucapan Selamat kepada Zamira Winarsih S.IP', 'ucapan-selamat-kepada-zamira-winarsih-sip', '2025-05-04', '<h4>Selamat!</h4><p>Laudantium cumque a qui enim omnis cupiditate et. Hic aut autem sunt odio. Velit et tempora totam dignissimos et ea amet. Dolore tempora perspiciatis voluptatem sequi error distinctio. Animi quam corporis laborum optio ducimus incidunt.</p><p><strong>Ipsum et omnis ducimus iure velit qui maiores harum.</strong> Maxime ex harum quae. Repudiandae perferendis voluptas et unde odit expedita. Debitis omnis ea est eligendi.</p><blockquote>Aut similique animi vel.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(2, 'Kegiatan eveniet di Pematangsiantar', 'kegiatan-eveniet-di-pematangsiantar', '2025-06-09', '<p>Molestiae expedita quaerat nulla magnam. Ipsum aliquam ut ab ipsa ea eos. Vel alias beatae veritatis. Quam quaerat architecto minus cum voluptas. Quasi laborum quia temporibus assumenda quidem incidunt alias.</p><p><strong>Amet rerum commodi sit.</strong> Autem deserunt aut consectetur ad minus voluptate necessitatibus. Ut amet voluptatem commodi et. Quia voluptatibus dolor officiis est.</p><p>Explicabo nesciunt voluptate blanditiis rerum dolore. Dignissimos consequatur at veritatis. Quis laudantium id dolor tenetur. Est et possimus quia odio.</p><ul><li>Ea quia sed nostrum quam.</li><li>Aut nihil omnis sit autem dicta vitae.</li><li>Modi nihil sit assumenda recusandae eos quia.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(3, 'Kegiatan quam di Dumai', 'kegiatan-quam-di-dumai', '2024-08-16', '<p>Vitae deserunt qui neque voluptatum corporis eaque excepturi impedit. Est vero commodi consectetur quas. Voluptatum magni distinctio et eum ea at unde. Tempore sapiente voluptates dignissimos occaecati maiores aut autem.</p><p><strong>Quia eligendi quia accusamus voluptatem cupiditate.</strong> Quia et fugiat quae eum aspernatur. Et in pariatur in repellendus libero sed.</p><p>Et aut ullam est aperiam. Et enim aperiam animi quos assumenda sit. Ex quia ut qui nostrum et.</p><ul><li>In voluptatem ut doloribus quis.</li><li>Aut et dolores ut sit qui et ut.</li><li>Enim incidunt veniam provident.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(4, 'Kegiatan adipisci di Bekasi', 'kegiatan-adipisci-di-bekasi', '2024-12-09', '<p>Quas eos quis dolorum possimus alias. Maiores laudantium praesentium consequatur sunt quam ut.</p><p><strong>Consequatur explicabo reiciendis molestias voluptas itaque aut laboriosam.</strong> Assumenda qui vel quidem consequatur qui ut et et. Placeat autem enim dolorum perferendis velit voluptates. Voluptas quisquam eligendi ut ut. Molestiae laudantium praesentium ipsa consequuntur aperiam incidunt facilis.</p><p>Quo vel pariatur voluptatum velit sed nemo vel perferendis. Cumque temporibus magnam recusandae. Nisi voluptas maxime ipsa velit tempore voluptas sit.</p><ul><li>Voluptatem repellendus beatae qui deleniti autem nesciunt sed.</li><li>Consequatur architecto consequuntur aut est alias.</li><li>Nisi aperiam aut voluptatem.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(5, 'Berita Duka: Fitria Yuniar Telah Berpulang', 'berita-duka-fitria-yuniar-telah-berpulang', '2025-07-22', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Sunt quia perspiciatis in sed consequuntur expedita perferendis. Asperiores recusandae explicabo natus consequatur eius quam. Doloremque iure pariatur fugiat fugit blanditiis. Error veritatis qui sit sint harum et.</p><p><strong>Darman Natsir</strong> Aut modi a repellat eum. Vel consectetur minima architecto corrupti. Sint et quidem ab minus harum. Non rem dicta autem.</p><p>Nobis vel vitae in sunt illo repudiandae. Saepe error corporis nemo quos. Praesentium voluptates accusantium perferendis aliquam ex neque sit voluptatum.</p>', NULL, NULL, 'berita-duka', 1, '2025-08-03 13:19:34', '2025-08-04 05:37:26'),
(6, 'Pengumuman Terkait Numquam', 'pengumuman-terkait-numquam', '2025-05-03', '<h3>Perhatian</h3><p>Qui rerum ipsum quia ad molestiae quia. Quo aut voluptas soluta nam saepe nam ad. Id recusandae assumenda odit commodi.</p><p><em>Quibusdam qui optio qui ad aspernatur vitae debitis.</em></p><ul><li>Nulla consequatur commodi molestiae fugiat repellat maiores.</li><li>Similique esse aperiam voluptatem reprehenderit asperiores dolorum quibusdam.</li><li>Et qui praesentium quam quo voluptatum est.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(7, 'Pengumuman Terkait Qui', 'pengumuman-terkait-qui', '2025-04-07', '<h3>Perhatian</h3><p>Consequatur corporis ut fugit deserunt commodi tempore dolor. Beatae et voluptatem minima est sunt dicta. Cum voluptatem et sit et dolor quia laboriosam.</p><p><em>Nihil delectus facilis commodi officiis.</em></p><ul><li>Magnam eos placeat assumenda voluptas.</li><li>Consequatur enim voluptas rerum in tempore.</li><li>Quaerat temporibus quo vel ut.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(8, 'Kegiatan et di Pasuruan', 'kegiatan-et-di-pasuruan', '2024-09-16', '<p>Voluptatem ducimus sit necessitatibus facere ex voluptatem. Et vel reprehenderit tempore vel vitae omnis animi. Animi excepturi est praesentium autem laboriosam voluptatem quaerat vel. Eum enim dicta sapiente ut magnam quas soluta quaerat.</p><p><strong>Deleniti possimus et eos qui.</strong> Autem necessitatibus aliquid asperiores ut labore. Occaecati quas natus soluta aspernatur aut minima ut aliquam. Et ea provident doloribus possimus.</p><p>Et quisquam rerum alias natus numquam quas consequatur. Perspiciatis rem est dignissimos numquam dolores quas et. Numquam explicabo minus amet necessitatibus perferendis et.</p><ul><li>Ad eos accusantium corrupti iure quis blanditiis rem.</li><li>Aspernatur saepe architecto deleniti et amet.</li><li>Placeat sapiente in deserunt magni at perferendis vero.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(9, 'Pengumuman Terkait Dolorem', 'pengumuman-terkait-dolorem', '2025-07-07', '<h3>Perhatian</h3><p>Consequatur quo ipsum voluptatem aut maiores. Voluptatibus et officia nobis aut praesentium.</p><p><i>Dolor quaerat excepturi dolor reprehenderit eos illo molestiae.</i></p><ul><li data-list-item-id=\"ede446b417c18573a469d80c96193a529\">Quia quis nobis eius.</li><li data-list-item-id=\"e42c308307393a0d7897eebc0068794ac\">Velit velit ea voluptatem voluptas autem dolor.</li><li data-list-item-id=\"e8d5948fbf5126ae16b5d6dbb1f518c10\">Voluptates autem ut non consequatur consectetur consequatur facilis.</li></ul>', 'pengumuman/17539590271045-08-03-08-2025.jpg', 'lampiran/dummy-08-03-08-2025.pdf', 'pengumuman', 4, '2025-08-03 13:19:34', '2025-08-04 05:48:18'),
(10, 'Ucapan Selamat kepada Kasiyah Pratiwi', 'ucapan-selamat-kepada-kasiyah-pratiwi', '2024-08-04', '<h4>Selamat!</h4><p>Pariatur et non saepe sit ea ut in. Corrupti nisi repudiandae consequatur velit eveniet aliquam. Magni et quisquam eos. Aut illum fugiat ipsam libero sit.</p><p><strong>Dignissimos quas voluptatem enim dignissimos fugit et est atque.</strong> Aut molestias tempora ipsum qui. Et et sunt rerum omnis suscipit tempore. Facilis velit expedita quasi nihil asperiores fugiat deleniti.</p><blockquote>Inventore temporibus vel mollitia exercitationem.</blockquote>', NULL, NULL, 'ucapan-selamat', 1, '2025-08-03 13:19:34', '2025-08-03 18:13:11'),
(11, 'Kegiatan ex di Bukittinggi', 'kegiatan-ex-di-bukittinggi', '2024-09-24', '<p>Sit esse ipsum impedit et ut similique voluptatum. Quo aut consectetur laudantium et cum aspernatur. Suscipit velit quasi quod atque fuga ipsa. Est rerum rerum nesciunt.</p><p><strong>Ipsum quia qui voluptate et sit iusto molestiae.</strong> Sint et sed autem asperiores voluptas. Optio rem enim ex sequi dignissimos. Fugiat occaecati quidem autem vel et similique eligendi rerum. Ut animi aliquam temporibus iste dolor nobis ab.</p><p>Illum mollitia porro et ut laboriosam nam sed. Dolores enim excepturi delectus aut. Et consequuntur modi aut consequuntur accusamus rerum. Ad velit ullam eum unde neque.</p><ul><li>Reiciendis possimus nisi quo ullam quos dicta porro architecto.</li><li>Quis rerum aut ut aut est possimus et.</li><li>Perferendis fugiat fuga error labore labore enim.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(12, 'Berita Duka: Jessica Haryanti S.Kom Telah Berpulang', 'berita-duka-jessica-haryanti-skom-telah-berpulang', '2024-09-10', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Fuga harum et quia omnis veritatis. Laboriosam et iste nihil quia qui magni quia. Dolore dolorem modi quo aperiam voluptatem laboriosam. Delectus voluptatem reiciendis in dolorum eum quia.</p><p><strong>Galar Saptono</strong> Et temporibus placeat quas nostrum dolores atque. Ullam est ut officia quasi aspernatur. Accusamus consequatur dolorum non quia quam incidunt sapiente. Porro voluptatibus quidem ab.</p><p>Animi quia pariatur incidunt repellendus dolor totam. Atque sint ex a praesentium quia et facilis. Voluptatem unde corporis voluptate rem laudantium consequatur et reprehenderit.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(13, 'Kegiatan pariatur di Palangka Raya', 'kegiatan-pariatur-di-palangka-raya', '2024-12-16', '<p>Alias enim explicabo similique rem. Excepturi saepe non et sed quia culpa dolorem. Dolor praesentium cupiditate mollitia et soluta.</p><p><strong>Blanditiis qui mollitia distinctio deserunt incidunt iusto.</strong> Minus cupiditate rem minima qui et iusto. Dolore dolores ut magni autem. Quos explicabo omnis accusamus est quas.</p><p>Et perspiciatis non maxime nihil. Distinctio quisquam harum beatae necessitatibus illo tempore et. Impedit delectus aut autem tempora provident ut quos. Cum magnam earum quo.</p><ul><li>Sunt quia odit quasi voluptas.</li><li>Placeat quis consequuntur quae rerum dolorem eos.</li><li>Deserunt occaecati cumque delectus dolorum quaerat qui.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(14, 'Ucapan Selamat kepada Balamantri Sitorus', 'ucapan-selamat-kepada-balamantri-sitorus', '2025-06-06', '<h4>Selamat!</h4><p>Consectetur rem dolor sunt ad repellendus minus sed. Delectus itaque voluptate omnis architecto sit dolor delectus aut. Laboriosam enim ab in dolor assumenda et omnis animi. Unde est esse eos et sed consequatur.</p><p><strong>Non hic ab rerum est praesentium.</strong> Cum adipisci eveniet minus qui possimus. Tempore similique magni rerum minima. In pariatur soluta quos in aperiam nobis. Vitae nostrum magnam exercitationem itaque optio eaque.</p><blockquote>Itaque aut ut rerum dolor ut hic esse.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(15, 'Ucapan Selamat kepada Sari Astuti', 'ucapan-selamat-kepada-sari-astuti', '2024-12-04', '<h4>Selamat!</h4><p>Debitis optio nostrum dolorem hic. Id eveniet consequatur dolorem rerum iusto. Incidunt impedit sed necessitatibus autem quod rerum quo.</p><p><strong>Sint natus blanditiis voluptas exercitationem.</strong> Doloribus recusandae nam cumque iusto omnis impedit occaecati. Harum voluptas quaerat eius architecto. Et facilis nemo est ut aperiam laudantium.</p><blockquote>Tenetur ab voluptatibus quidem rem voluptate voluptas.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(16, 'Berita Duka: Indah Nurdiyanti S.H. Telah Berpulang', 'berita-duka-indah-nurdiyanti-sh-telah-berpulang', '2025-07-07', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Dolore quisquam placeat delectus et quod minima necessitatibus. Aut at repellat officia aliquid ipsum. Alias quis itaque sed accusantium. Blanditiis id dolore suscipit.</p><p><strong>Uda Prabu Saefullah</strong> Quo ea itaque dicta dolorum qui. Deleniti distinctio eligendi cum a voluptas. Consequatur atque corrupti error quia aut laborum. Ullam nihil accusantium earum ratione possimus dolor necessitatibus quod.</p><p>Perferendis et magnam molestiae ut. Reiciendis velit nobis necessitatibus et iste. Consectetur est aut eius ut molestias minus totam. Praesentium aut reprehenderit rerum voluptatem libero sunt.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(17, 'Berita Duka: Rachel Rahmawati Telah Berpulang', 'berita-duka-rachel-rahmawati-telah-berpulang', '2025-07-06', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Aut libero officiis non qui. Asperiores omnis non aliquam et dolor eveniet ipsum. Ullam fugiat eius autem quas numquam. Nihil omnis molestiae eum quod et nostrum sapiente.</p><p><strong>Gawati Oktaviani</strong> Velit voluptatibus aut eos perspiciatis omnis dolor eos. At provident eveniet debitis earum corporis. Vero nam possimus officiis doloremque reprehenderit aut.</p><p>Qui dolore eum consequatur est veniam. Suscipit facilis repellat voluptatem non dolor. In et necessitatibus ut non soluta pariatur.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(18, 'Ucapan Selamat kepada Dodo Wacana', 'ucapan-selamat-kepada-dodo-wacana', '2025-03-15', '<h4>Selamat!</h4><p>Iusto voluptatem qui natus mollitia. Veniam itaque veniam sunt veniam ex et itaque. Veniam rem nulla perspiciatis provident dolorum ab quia.</p><p><strong>Autem sequi sit asperiores ipsa.</strong> Sequi voluptatem dolor sed ex quaerat molestiae aut. Nam ipsam tenetur perspiciatis corporis dolores. Ratione atque harum beatae delectus est.</p><blockquote>Est modi voluptas nisi saepe.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(19, 'Kegiatan nisi di Ternate', 'kegiatan-nisi-di-ternate', '2025-07-20', '<p>Optio exercitationem quasi et animi nam voluptatem qui. Nisi ut possimus consequatur repellat. Sed ut nostrum temporibus dolorem deserunt.</p><p><strong>Dicta sit qui eum illo similique eos deserunt.</strong> Dignissimos sapiente ut corrupti qui. Molestiae aut provident ab ipsam eius doloribus atque est. Beatae sit possimus architecto rerum enim provident. Aut sint libero incidunt cupiditate quis aut eos.</p><p>Quia eligendi et rerum nesciunt blanditiis. Rerum aliquid odit cumque aut. Dolores quis voluptatem impedit sed soluta aut qui. Voluptas ut nam id asperiores ab.</p><ul><li>Aut et sapiente temporibus minus natus corporis sed.</li><li>Iure consectetur dolor cumque laboriosam ab qui.</li><li>Hic voluptatem illum ut quia modi neque accusamus.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(20, 'Ucapan Selamat kepada Ratna Ina Pertiwi', 'ucapan-selamat-kepada-ratna-ina-pertiwi', '2025-03-03', '<h4>Selamat!</h4><p>Eum laboriosam atque facilis et pariatur et. Sunt quod suscipit sapiente. Nemo autem sed eos. Sequi laudantium fugit itaque est nulla.</p><p><strong>Excepturi nemo aut dolor explicabo quidem dolores.</strong> Error cupiditate reiciendis at. Aut ad ut aspernatur asperiores autem explicabo dolorum. Molestiae eos incidunt voluptate est sed quidem. Distinctio rerum soluta vitae sapiente nam eius.</p><blockquote>Amet est et minima vero suscipit.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(21, 'Kegiatan maiores di Administrasi Jakarta Pusat', 'kegiatan-maiores-di-administrasi-jakarta-pusat', '2025-04-04', '<p>Est qui tenetur non quam pariatur veritatis tempore omnis. Odit qui ut vel culpa officiis. Ut deserunt perferendis eligendi ab quas sunt. Nihil aut harum totam sint odit. Recusandae rem molestiae praesentium et.</p><p><strong>Reprehenderit culpa esse officiis officiis et eius ipsum repellat.</strong> Consequuntur culpa culpa voluptas inventore. Eveniet suscipit consectetur doloribus aspernatur. Sit qui et sint a sed ut beatae.</p><p>Aut blanditiis deleniti sunt nisi porro. Fugit alias necessitatibus dicta culpa eum non quia. Itaque sapiente vel provident amet libero error rem dolor.</p><ul><li>Aut vitae iste illo non ut est eveniet.</li><li>Voluptatem voluptate nisi ut amet.</li><li>Quis corporis omnis omnis quia.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(22, 'Ucapan Selamat kepada Tantri Yulianti', 'ucapan-selamat-kepada-tantri-yulianti', '2024-12-31', '<h4>Selamat!</h4><p>Et perspiciatis enim enim animi incidunt ut. Vel ullam ut magni. At culpa distinctio beatae. Rerum dicta commodi ut sit maxime odio reiciendis.</p><p><strong>Tempore aperiam et error quia qui.</strong> Quas rerum possimus doloribus facere neque enim. Voluptate a minus modi assumenda. Dolor atque sed non ad dolorum ut mollitia.</p><blockquote>Quae velit voluptatem fugiat nihil vel est.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(23, 'Ucapan Selamat kepada Maimunah Umi Mulyani', 'ucapan-selamat-kepada-maimunah-umi-mulyani', '2025-07-05', '<h4>Selamat!</h4><p>Id repudiandae ipsam ab non illum. Repudiandae architecto vel odio asperiores sequi. Ea hic quia animi voluptatem.</p><p><strong>Expedita aut sunt eos qui dicta sit.</strong> Autem quas tempora et consequatur. Et repellendus iusto omnis odio beatae. Repudiandae odit quia quaerat eum dolores earum.</p><blockquote>Voluptatem vel facere enim cum ut sequi.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(24, 'Berita Duka: Elisa Namaga Telah Berpulang', 'berita-duka-elisa-namaga-telah-berpulang', '2024-12-11', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Quis perspiciatis rerum velit repellat. Voluptatem velit corporis voluptates ex voluptatibus. Et quis nesciunt quod.</p><p><strong>Kasim Rajata S.Pt</strong> Omnis quod qui consequatur ad id voluptatem dolore. Consequatur veritatis ipsa accusamus repellendus non. Quis ut cumque at. Omnis incidunt officiis pariatur et non in. Eum eos possimus ut nulla qui quibusdam.</p><p>Amet odit libero quia sunt labore dolor. Numquam sunt in aut ut officia quos iusto. Modi asperiores dolores maiores corporis et. Vero exercitationem quis consequuntur consequuntur.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(25, 'Kegiatan animi di Pasuruan', 'kegiatan-animi-di-pasuruan', '2025-03-14', '<p>Quod nihil temporibus ipsum aspernatur sequi. Ad in debitis suscipit sed repudiandae repellendus et. Atque et enim recusandae dolor vel.</p><p><strong>Velit et tempora ea fugit recusandae quae impedit.</strong> Vel similique quisquam illum voluptatem iste iure culpa laudantium. Doloremque est necessitatibus dolor nobis dolorem. Natus aspernatur qui veritatis quia nostrum et. Voluptatem autem atque quasi rerum quo saepe velit.</p><p>Repellat repellendus rerum illo reiciendis. Corrupti fugit fugiat qui repellendus. Sint rerum maxime magni quis nulla.</p><ul><li>Odio molestiae minus aut animi eos ut.</li><li>Culpa voluptatem consequuntur voluptas debitis magni.</li><li>Et distinctio debitis quo ab.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(26, 'Ucapan Selamat kepada Irma Wani Yuliarti S.Pt', 'ucapan-selamat-kepada-irma-wani-yuliarti-spt', '2025-01-06', '<h4>Selamat!</h4><p>In pariatur omnis sequi quam sapiente omnis. Velit consequuntur reiciendis veniam sint id qui quaerat. Adipisci tempore aperiam facere saepe neque. Qui veritatis quidem et ea sed cupiditate. Odio facere impedit quia blanditiis et numquam nemo et.</p><p><strong>Veritatis sit nobis reiciendis.</strong> Quia praesentium quod consectetur maxime doloribus sint. Et quo asperiores dolorem esse laborum aperiam et omnis. Tenetur alias architecto delectus consequuntur sed tenetur quo. Velit sequi consectetur aut minima qui.</p><blockquote>Perspiciatis unde libero occaecati consequuntur.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(27, 'Berita Duka: Tirtayasa Darimin Pranowo S.E. Telah Berpulang', 'berita-duka-tirtayasa-darimin-pranowo-se-telah-berpulang', '2025-01-18', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Aut molestiae laboriosam quisquam enim itaque. Deserunt harum dolorem consequatur quasi et rerum quae. Vel ad quos laboriosam dolorem accusamus dolorem quia voluptas.</p><p><strong>Himawan Leo Narpati S.Gz</strong> Quis natus sit dolor tenetur. Illo eos dolores distinctio doloribus mollitia reiciendis. Modi et et consectetur suscipit voluptatum tenetur. Impedit aut totam dolorem sit.</p><p>Minima minima quod et illum provident aut. Temporibus repudiandae pariatur cumque et inventore voluptas similique et. Voluptas expedita dolor animi nobis molestiae unde et.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(28, 'Pengumuman Terkait Sunt', 'pengumuman-terkait-sunt', '2024-10-03', '<h3>Perhatian</h3><p>Id quia iusto nulla voluptates laborum qui necessitatibus. Adipisci nemo voluptatum quod amet. Ut aspernatur ea dolore alias exercitationem voluptas sit rerum. Quas culpa at architecto nesciunt dolor omnis voluptatem maxime.</p><p><em>Architecto eos omnis quisquam vel id.</em></p><ul><li>Aperiam labore cupiditate dicta.</li><li>Odio cum quisquam a et.</li><li>Repudiandae itaque quis sint eum enim.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(29, 'Ucapan Selamat kepada Kemba Mursita Habibi', 'ucapan-selamat-kepada-kemba-mursita-habibi', '2025-01-22', '<h4>Selamat!</h4><p>Quas repellendus eius inventore aut dignissimos est occaecati autem. Consequatur amet hic error voluptatem est architecto reiciendis eos. Culpa minus qui qui assumenda sunt aspernatur esse. Pariatur sapiente in nobis rerum optio ducimus eaque.</p><p><strong>Quo dolorum atque est et.</strong> Veritatis nesciunt voluptatem sint ad soluta in odit. Tenetur voluptate eum eveniet deserunt esse ea deleniti. Eius modi velit consequatur nostrum natus.</p><blockquote>Commodi ipsam sint consequatur odio corrupti ea cupiditate.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(30, 'Kegiatan assumenda di Tegal', 'kegiatan-assumenda-di-tegal', '2024-10-19', '<p>Cumque qui consequatur quibusdam voluptatum quia. Autem blanditiis eum fugiat error voluptates. Molestiae sint unde incidunt et excepturi sunt. Voluptates odio magni id soluta quia. Quo tenetur provident asperiores exercitationem quia.</p><p><strong>Est rem sequi qui molestiae et consectetur quia.</strong> Et assumenda quas sit incidunt est. Modi voluptatem odio ut amet aliquam omnis. Cumque laudantium quis dicta veniam quaerat nesciunt autem.</p><p>Est suscipit corrupti mollitia ipsum est aliquid iste non. Perspiciatis occaecati numquam est ullam hic. Minus ea assumenda delectus. Dignissimos nobis nisi unde alias.</p><ul><li>Vero accusantium eveniet quis quo maxime.</li><li>Omnis quia fugiat est.</li><li>In voluptatum ut iure officiis incidunt sit eum.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(31, 'Berita Duka: Kani Puspa Wahyuni M.Ak Telah Berpulang', 'berita-duka-kani-puspa-wahyuni-mak-telah-berpulang', '2025-02-18', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Ut atque exercitationem provident beatae ut. Sint deserunt et quod rerum ipsa odio in.</p><p><strong>Gilda Mandasari</strong> Non repudiandae molestiae omnis non dolor modi et. Recusandae est veritatis vero non ut neque quasi. Similique enim ut qui ut perferendis at est. Ut aperiam minus autem accusantium sed.</p><p>Architecto animi maxime et occaecati quis consequatur. Eaque iusto quos quia aperiam nulla facilis. Odio fugiat et ut unde et soluta eius.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(32, 'Berita Duka: Ulva Aryani Telah Berpulang', 'berita-duka-ulva-aryani-telah-berpulang', '2025-01-19', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Tempora ratione id qui maxime adipisci necessitatibus. Consequuntur saepe autem itaque consequatur et aut et. Exercitationem impedit laboriosam consequatur sit in.</p><p><strong>Mariadi Cengkal Iswahyudi S.T.</strong> Esse aspernatur deleniti dignissimos voluptates. Est esse veritatis corporis beatae sed recusandae minima ea. Sint iste eos ut quia culpa cupiditate sunt aut. Expedita ea omnis voluptatibus aliquid corporis aliquam officiis.</p><p>Necessitatibus nam voluptatem suscipit expedita. Eum amet nulla ut et aut repudiandae qui. Ratione et dolorum voluptas voluptas et excepturi. In ipsum cumque ipsa est qui.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(33, 'Kegiatan ut di Tidore Kepulauan', 'kegiatan-ut-di-tidore-kepulauan', '2024-10-14', '<p>Illo placeat eos et consequatur. Dolorum et ipsam aperiam mollitia est deserunt.</p><p><strong>Eum repellendus minima beatae sint vel voluptate.</strong> Cupiditate dicta animi omnis perferendis odit. Unde eos vel reprehenderit voluptas. At autem ab voluptatem aut aliquid. Omnis in voluptate id vitae voluptatem quasi.</p><p>Quibusdam ut quae voluptates velit. Quidem ut velit illum vitae accusamus fuga commodi. Et provident voluptas et illo. Neque illum rerum quia iusto alias.</p><ul><li>Officiis quos dolor illo non molestias.</li><li>Similique laboriosam dolorem dolorem et minus et.</li><li>Nesciunt vel molestiae enim itaque illum ipsum.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(34, 'Pengumuman Terkait Possimus', 'pengumuman-terkait-possimus', '2025-03-16', '<h3>Perhatian</h3><p>Quidem blanditiis aperiam id omnis recusandae dolorem. Perferendis deserunt omnis dolorum ut voluptatem ut quae quaerat. Amet a tempora nihil ut. Est ut earum voluptas modi.</p><p><em>Sunt numquam consectetur dicta corporis et ea tempore.</em></p><ul><li>Cupiditate tempore unde eum optio eos.</li><li>Omnis et veniam quo sit qui asperiores soluta corporis.</li><li>Eaque autem minus enim blanditiis.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(35, 'Berita Duka: Cemani Suwarno Telah Berpulang', 'berita-duka-cemani-suwarno-telah-berpulang', '2024-12-26', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Omnis nihil magni facilis eveniet nemo modi. Sint officiis repellat qui. Quaerat animi debitis molestiae itaque in ipsam quidem.</p><p><strong>Umi Yani Hassanah S.Gz</strong> Enim eum rerum qui. Ut nisi dolorum et dolor totam. Omnis animi quia et repellendus. Exercitationem magni nostrum aspernatur enim architecto dignissimos illum.</p><p>Omnis non quis quis totam voluptas nisi eveniet. Blanditiis ut est explicabo atque molestiae. Aut cum est culpa ratione cum odit.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(36, 'Berita Duka: Perkasa Dimaz Pratama Telah Berpulang', 'berita-duka-perkasa-dimaz-pratama-telah-berpulang', '2024-08-21', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Et quas cum voluptatem enim ab velit aliquid. Eum dolores doloribus quisquam culpa ad similique. Placeat veniam autem natus fugit modi consectetur.</p><p><strong>Shania Susanti M.TI.</strong> Voluptatem beatae cum mollitia. Amet modi harum dolor voluptas non exercitationem. Asperiores odit iste cupiditate sapiente sapiente repellat mollitia. Saepe molestiae dolorem consequuntur excepturi distinctio eos veniam. Consequatur ullam molestias quo et.</p><p>Ad accusantium placeat modi atque. Enim dolorem quia et atque cupiditate odio porro.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(37, 'Kegiatan laudantium di Gunungsitoli', 'kegiatan-laudantium-di-gunungsitoli', '2025-06-18', '<p>Consectetur veritatis nam magni ratione vitae quas atque fuga. Corrupti sapiente expedita accusantium omnis eos.</p><p><strong>Amet veritatis sint omnis.</strong> Nemo voluptate cum dolores incidunt est. Ea commodi molestias illum et maiores. Sint est est maiores sapiente et recusandae voluptas.</p><p>Quia numquam porro vitae accusantium voluptate voluptate explicabo. Commodi ab quaerat placeat aut nostrum hic quia incidunt. Occaecati quas sed sed qui blanditiis quos doloremque. Molestiae voluptate voluptate incidunt autem aut unde. Vel itaque voluptas dolor est et ipsum eveniet porro.</p><ul><li>Neque labore porro velit nihil repellendus illo rerum quia.</li><li>Illum ab occaecati voluptatem dicta ipsa quo.</li><li>Quia reiciendis cumque occaecati quos illo.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(38, 'Ucapan Selamat kepada Johan Wahyudin', 'ucapan-selamat-kepada-johan-wahyudin', '2024-11-24', '<h4>Selamat!</h4><p>Assumenda maiores sequi labore laudantium maiores eos est. Veniam sit libero eum accusantium voluptatibus ut. Iusto quo ipsam consequuntur ea sit. Ut qui dignissimos doloremque atque architecto sed.</p><p><strong>Dolorem qui esse autem assumenda sit similique dolorum ut.</strong> Omnis ipsam reiciendis in ut. Dolorum esse ipsa soluta est necessitatibus sint. Animi et officia nostrum voluptas id nemo molestias. Tempora deserunt non quam reiciendis.</p><blockquote>Nesciunt numquam aspernatur dolorum ad.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(39, 'Berita Duka: Juli Purnawati Telah Berpulang', 'berita-duka-juli-purnawati-telah-berpulang', '2025-04-18', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Asperiores aut vero et perferendis ut temporibus. Quo optio amet consequatur soluta. Minus omnis nostrum voluptatibus dolores quia eos veniam. Ut optio porro quasi autem officia nemo rem.</p><p><strong>Nardi Mansur S.Farm</strong> Doloribus eum exercitationem dolorem ipsam qui eius ratione. Atque neque consectetur accusantium in. Ut deserunt minima dolorum tenetur nihil quia.</p><p>Esse voluptates et quia aut est. Adipisci expedita aut debitis voluptas. Quaerat non incidunt sed. Consectetur et laboriosam vel necessitatibus.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(40, 'Pengumuman Terkait Et', 'pengumuman-terkait-et', '2025-05-19', '<h3>Perhatian</h3><p>Dolorem amet dignissimos possimus autem et. Necessitatibus aut voluptas harum odio voluptatum. Minima et laboriosam dolores culpa sit excepturi.</p><p><em>Qui ipsa assumenda quibusdam est reiciendis sint.</em></p><ul><li>Est temporibus id veniam tenetur ut natus.</li><li>Expedita repellendus ex a omnis delectus qui nihil.</li><li>Est fugit et atque ipsam temporibus qui.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(41, 'Berita Duka: Jane Wulandari M.Ak Telah Berpulang', 'berita-duka-jane-wulandari-mak-telah-berpulang', '2025-07-11', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Asperiores ducimus ut iste enim quia qui et. Nisi rerum tenetur fugiat. Sunt dolor vel libero. A ut repudiandae odio dignissimos quisquam. Dolores dolor iste ab ducimus molestiae consequatur ut.</p><p><strong>Vicky Mardhiyah</strong> Enim perferendis eaque ullam alias a harum. Voluptatibus deserunt magni iure eum amet incidunt. Numquam aut consequatur voluptas omnis.</p><p>Explicabo dolore perspiciatis omnis facere quis ex libero. Aspernatur velit sit neque inventore et et. Accusantium iure accusamus non tempore possimus.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(42, 'Pengumuman Terkait Quibusdam', 'pengumuman-terkait-quibusdam', '2025-07-11', '<h3>Perhatian</h3><p>Eum et officia et dolor placeat excepturi voluptatem. Provident repellat sequi nesciunt odio. Blanditiis voluptatem ab aut sit quisquam perspiciatis cumque. Ipsa quis earum nihil excepturi exercitationem.</p><p><em>Inventore atque aliquid commodi nobis incidunt maiores molestiae odio.</em></p><ul><li>Fugit iusto praesentium et doloribus aperiam.</li><li>Cumque dignissimos vel voluptatem quidem dolorem non voluptates.</li><li>Accusamus sunt voluptatum laudantium unde quis modi.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(43, 'Berita Duka: Shakila Andriani M.M. Telah Berpulang', 'berita-duka-shakila-andriani-mm-telah-berpulang', '2025-06-13', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Inventore rerum quidem quam nulla ea et velit. Sunt ut aut harum unde culpa omnis. Culpa impedit velit exercitationem ea minus optio. Ullam non eos reprehenderit minus exercitationem non sed. Atque quisquam omnis dolorem et recusandae neque.</p><p><strong>Mulyanto Sihombing</strong> Voluptas in praesentium sit quas. Aut consequatur rerum aut consequatur quia maiores. Et id et cupiditate ut facilis.</p><p>Non minus magnam delectus autem. Aperiam iure nisi minus eaque. Molestiae repellendus voluptas excepturi voluptas modi.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(44, 'Berita Duka: Oni Wahyuni S.Ked Telah Berpulang', 'berita-duka-oni-wahyuni-sked-telah-berpulang', '2025-08-01', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Quis quis blanditiis recusandae pariatur qui. Molestiae perspiciatis error laudantium dolore saepe perspiciatis. Quos quia id rerum esse perspiciatis similique optio. Incidunt non facere delectus fugit maiores aut enim.</p><p><strong>Harja Salahudin</strong> Accusamus dicta sit consequuntur necessitatibus et beatae non corporis. Dolore quibusdam rem voluptas et eveniet veritatis asperiores. Sit sint eaque voluptatem dolore aut.</p><p>Et voluptatem exercitationem hic aliquam. Ex eveniet voluptatem magni odio libero. Et eius est qui illo optio. Saepe earum sit minima. Veniam exercitationem voluptatem alias et.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(45, 'Kegiatan error di Padangpanjang', 'kegiatan-error-di-padangpanjang', '2024-10-12', '<p>Qui at cumque cumque accusamus et nihil blanditiis. Non ut aut quia enim fugiat est. Et voluptas enim illo ipsa soluta voluptas soluta.</p><p><strong>Minima autem non iste beatae maxime quia a.</strong> Rem tempore sit et porro rerum debitis. Accusamus aperiam dolores est soluta voluptatem sed quia. Eaque occaecati ut delectus qui in tempore aut.</p><p>Autem quibusdam aspernatur porro autem consequatur. Praesentium perferendis distinctio fugiat sit quas. Alias eos officia error nihil odit laborum magni.</p><ul><li>Dolores ut quaerat ipsum.</li><li>Quibusdam atque eaque architecto delectus.</li><li>Doloremque officiis provident soluta adipisci quia.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(46, 'Ucapan Selamat kepada Ibrahim Hutagalung M.Ak', 'ucapan-selamat-kepada-ibrahim-hutagalung-mak', '2025-05-22', '<h4>Selamat!</h4><p>Incidunt voluptas voluptatem commodi unde veniam eum. Facere et et labore voluptatem ipsum asperiores qui. Quia placeat sit atque nesciunt.</p><p><strong>Quis laborum in ratione voluptates id.</strong> Ut illo omnis sed dolorum deleniti molestiae eaque. Dolorem aliquid qui ut et tempore et error. Cum suscipit ducimus illo ut est eos. Enim suscipit consequatur quo. Consectetur ab ratione ducimus repellendus.</p><blockquote>Laborum facere expedita quisquam quod ut libero.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(47, 'Berita Duka: Asman Kasiran Mandala M.Pd Telah Berpulang', 'berita-duka-asman-kasiran-mandala-mpd-telah-berpulang', '2024-12-12', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Ea officia est tenetur qui totam rerum. Vero omnis dolor ipsa sit ullam id. Placeat cum recusandae in in. Dolorum necessitatibus ex alias nobis consectetur minus.</p><p><strong>Edi Gaduh Salahudin</strong> Ut rerum est non harum molestiae dolorem. Optio maxime sunt et. Perferendis deleniti porro quod quas dolor. Optio pariatur sed placeat.</p><p>Nisi id eveniet omnis sit culpa. Ut aut autem enim ut saepe occaecati magnam. Eos quisquam nesciunt odit ut quisquam natus totam. Tempore nam et ipsam quidem aut minus quasi.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(48, 'Kegiatan tempore di Solok', 'kegiatan-tempore-di-solok', '2025-05-20', '<p>Et soluta rerum aut tempore et. Temporibus et quidem perspiciatis. Tenetur sunt animi non voluptatem aliquid sint nostrum.</p><p><strong>Repellat reiciendis molestias qui quidem vitae corrupti.</strong> Commodi quis quis in nostrum enim. Et et sint nam voluptatum ut magnam. Eligendi porro ducimus repudiandae delectus sed corporis esse. Odit consequuntur vel quis sit voluptas molestiae nostrum. Eos qui facilis qui suscipit corrupti.</p><p>Vero ut nemo nobis. Ut magni atque omnis voluptatibus quis repellendus cupiditate. Laborum earum similique nobis. Iure reiciendis expedita esse voluptas excepturi est.</p><ul><li>Quo sint sint excepturi numquam.</li><li>Non consequatur temporibus est et est.</li><li>Magni reiciendis quo ut fugiat eius.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(49, 'Kegiatan sit di Tegal', 'kegiatan-sit-di-tegal', '2024-09-11', '<p>In eius eum voluptas debitis. Ipsam et vitae alias enim facere temporibus dolor. Fuga cum repellendus non nesciunt placeat. Voluptatibus quisquam necessitatibus et voluptate dolorem omnis possimus.</p><p><strong>Ut repellendus eos sequi id a laboriosam aut.</strong> Qui soluta ducimus et porro cum. Blanditiis recusandae vel cum officia. Facilis est qui delectus qui ex. Omnis ullam excepturi culpa veritatis exercitationem corrupti quae. Illo harum est sapiente ea suscipit.</p><p>Sed eius magni iure quia qui. Consequatur perspiciatis ea corporis quis libero omnis. Voluptate qui possimus officiis aut sit reiciendis facere dolorem. Quia numquam omnis rerum ut in est culpa.</p><ul><li>Dicta aut in aut perspiciatis corrupti excepturi.</li><li>Voluptas maxime corrupti qui minima.</li><li>Et harum quaerat non.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(50, 'Ucapan Selamat kepada Gading Ozy Tampubolon', 'ucapan-selamat-kepada-gading-ozy-tampubolon', '2024-09-03', '<h4>Selamat!</h4><p>Voluptas alias iure natus tempora. Minima et eligendi molestiae. Quos et quia et aliquam eum ut.</p><p><strong>Sit quam cumque est itaque accusantium.</strong> Dolores et consequatur nesciunt cupiditate harum. Tenetur non quis perferendis voluptatem. Delectus qui exercitationem quas ipsam. Ut doloremque perspiciatis ipsam. Placeat omnis at exercitationem et omnis sit sunt aliquid.</p><blockquote>Voluptates non quae architecto qui.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(51, 'Pengumuman Terkait Sunt', 'pengumuman-terkait-sunt', '2024-12-09', '<h3>Perhatian</h3><p>Voluptatem numquam sed esse sint. Dolor beatae delectus laboriosam quisquam ut voluptas impedit. Corporis reiciendis deserunt omnis occaecati animi facilis. Vero perspiciatis sequi voluptatem nihil eos soluta fuga illum. Animi aut excepturi repellendus autem eos amet molestiae dignissimos.</p><p><em>Debitis id ratione vitae odio.</em></p><ul><li>Odio accusamus officia magni aut ut praesentium.</li><li>Harum nam unde quod asperiores laboriosam non ab.</li><li>Id consequatur molestiae voluptatibus perspiciatis harum est.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(52, 'Ucapan Selamat kepada Oskar Salahudin S.I.Kom', 'ucapan-selamat-kepada-oskar-salahudin-sikom', '2025-03-23', '<h4>Selamat!</h4><p>Vel et aut aut cumque. Dolore nisi et sunt ab molestiae quos. Voluptatum quos delectus consequuntur autem. Optio nulla sapiente est quisquam. Eveniet velit maxime magni cupiditate ratione.</p><p><strong>Qui enim assumenda laboriosam laudantium vitae.</strong> Quasi praesentium voluptate saepe consequatur error omnis minus sint. Placeat reprehenderit eos nulla recusandae. Voluptatibus voluptate vel quaerat aperiam dolorem odio modi. Sequi quo in sit commodi. Aliquid maxime exercitationem est.</p><blockquote>Totam sunt quae vero nesciunt et.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(53, 'Pengumuman Terkait Architecto', 'pengumuman-terkait-architecto', '2024-11-08', '<h3>Perhatian</h3><p>Omnis tenetur officia minima. Occaecati maiores qui porro. Perferendis libero recusandae et iusto facilis eveniet consequatur exercitationem. Tempora est voluptatum assumenda aut numquam incidunt delectus ut.</p><p><em>Ut ea veritatis consequatur eligendi.</em></p><ul><li>Ex voluptates autem velit minus officia.</li><li>Maxime doloribus saepe nam enim asperiores et veniam.</li><li>Voluptatem officia et est expedita.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(54, 'Pengumuman Terkait Cum', 'pengumuman-terkait-cum', '2024-09-04', '<h3>Perhatian</h3><p>Qui ipsum consectetur numquam et recusandae. Quas voluptatibus rerum est nobis impedit provident aliquid. Dignissimos et officiis quia voluptatibus maxime delectus. Amet fugiat explicabo est iusto consequatur magni.</p><p><em>Iste commodi voluptatem est nihil.</em></p><ul><li>Ut officiis cupiditate sit voluptatem cumque eos voluptatem.</li><li>Atque occaecati deserunt beatae velit fugit tempora eos.</li><li>Dolorum expedita dolore expedita id sapiente voluptatem.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(55, 'Ucapan Selamat kepada Jumadi Prakasa', 'ucapan-selamat-kepada-jumadi-prakasa', '2024-09-14', '<h4>Selamat!</h4><p>Sequi voluptas rerum maxime ipsa. Repudiandae fugiat enim ut sed fugit eaque.</p><p><strong>Facere perspiciatis quo distinctio consequatur facilis assumenda et.</strong> Est et laudantium et architecto dolores perspiciatis est. Nulla odit suscipit corporis velit molestiae molestiae eos.</p><blockquote>Voluptatem repellendus rerum veritatis in tempore.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(56, 'Kegiatan exercitationem di Solok', 'kegiatan-exercitationem-di-solok', '2025-02-06', '<p>Exercitationem magnam accusantium sit ea et alias. Rerum tenetur consequuntur tempora quia. Quo quo esse officiis itaque aspernatur optio amet. Beatae praesentium vel nesciunt recusandae et. Sed fugiat sint earum eos cupiditate vitae.</p><p><strong>Nulla quasi modi saepe nam.</strong> Et quo explicabo qui id mollitia rerum mollitia omnis. Ex possimus error veritatis eum quis et. Cumque et qui accusamus cumque et. Qui neque qui neque quam sit nesciunt.</p><p>Qui quibusdam omnis aut temporibus nihil et error voluptatem. Nam repudiandae illum in. Maiores soluta id soluta porro vel aliquid.</p><ul><li>Provident vero repudiandae ut et qui.</li><li>Occaecati quam ea perspiciatis doloremque voluptate.</li><li>Illum et quam ipsam.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(57, 'Pengumuman Terkait Adipisci', 'pengumuman-terkait-adipisci', '2024-11-23', '<h3>Perhatian</h3><p>Ex distinctio voluptatem ex et excepturi. Et eum debitis incidunt reiciendis. Ut impedit quis neque nisi adipisci. Eum reiciendis maxime doloribus velit aliquid consectetur.</p><p><em>Libero non est fuga at et magni facere.</em></p><ul><li>Quia dolores magnam neque est fugit.</li><li>Omnis illo consequatur et.</li><li>A quam quaerat qui minus vel.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(58, 'Kegiatan dolorum di Blitar', 'kegiatan-dolorum-di-blitar', '2024-11-03', '<p>Fugit aliquid harum cumque voluptas esse quo. Atque sit quidem exercitationem recusandae culpa sit. Quaerat et consequuntur ut quam ut. Repudiandae itaque ducimus quo et exercitationem est explicabo.</p><p><strong>Deleniti ut eaque quae sapiente.</strong> Accusantium magni et ipsam qui. Enim quas sint sint mollitia et et eos. Quidem praesentium culpa ipsum sequi. Possimus ad soluta illo eius.</p><p>Sapiente saepe rem dolorem minus consequuntur voluptates vitae. Beatae est repudiandae aspernatur sunt pariatur adipisci aut. Qui accusamus repellat velit dolorum omnis.</p><ul><li>Qui vel eligendi omnis repudiandae quo eum.</li><li>Error beatae reprehenderit omnis nostrum sed architecto.</li><li>Iste qui doloribus rerum quo laboriosam iusto veniam.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(59, 'Ucapan Selamat kepada Eli Hastuti', 'ucapan-selamat-kepada-eli-hastuti', '2025-03-07', '<h4>Selamat!</h4><p>Nesciunt minima magnam sint molestiae. Iure placeat ut veritatis odio voluptatem rerum dolor. Dolorum voluptates quaerat optio cumque tempore est.</p><p><strong>Repudiandae non dolorem vitae sunt sint corporis.</strong> Nulla ea et quia placeat quo accusantium eligendi. Quam inventore quo repellendus quisquam magnam minima consequatur velit.</p><blockquote>Repellat quisquam sapiente in nulla voluptas.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(60, 'Ucapan Selamat kepada Azalea Namaga', 'ucapan-selamat-kepada-azalea-namaga', '2025-08-02', '<h4>Selamat!</h4><p>Vel quibusdam est numquam totam veniam natus omnis sunt. Quia magnam et non aut sed distinctio. Laudantium doloribus necessitatibus qui commodi nihil unde.</p><p><strong>Laborum molestiae harum fuga.</strong> Harum odit quia tempora reiciendis optio temporibus sed. Exercitationem cum earum soluta ipsam labore. Rerum incidunt qui consequatur voluptas officia vel. Qui qui corrupti minima.</p><blockquote>Et et est minima expedita qui.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(61, 'Ucapan Selamat kepada Yusuf Simbolon', 'ucapan-selamat-kepada-yusuf-simbolon', '2025-03-13', '<h4>Selamat!</h4><p>Tempore et harum omnis. Ipsum voluptate numquam amet saepe. Possimus enim corrupti officia.</p><p><strong>Minima quia ipsum amet nisi.</strong> Totam similique et perspiciatis et quas qui et error. Dolor aperiam nostrum provident occaecati facere. Magnam vel fugit atque perspiciatis maiores. Eum occaecati accusamus sed corporis ipsam sequi. In sit assumenda incidunt quis dolor.</p><blockquote>Dolore corrupti harum autem laborum enim quisquam.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(62, 'Ucapan Selamat kepada Padmi Usada', 'ucapan-selamat-kepada-padmi-usada', '2025-04-18', '<h4>Selamat!</h4><p>Molestiae vel illo aut labore voluptates. Voluptate cupiditate porro perferendis qui totam assumenda fuga. Quibusdam velit officiis recusandae quam dolorem molestias sapiente.</p><p><strong>Sequi aut iusto ex dignissimos modi esse consequatur.</strong> Quia quisquam unde voluptas autem et. Numquam voluptates optio qui. Molestiae expedita assumenda nemo porro ducimus iusto.</p><blockquote>Deserunt aut dicta aliquam corporis ipsam quisquam.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(63, 'Pengumuman Terkait Voluptatum', 'pengumuman-terkait-voluptatum', '2024-11-01', '<h3>Perhatian</h3><p>Alias dolores tenetur ratione nostrum nihil quia aliquam rerum. Quo incidunt velit aspernatur natus omnis saepe qui. Itaque iure a quam corrupti dolor. Corrupti eos exercitationem eum. Repellat dolore qui consequuntur possimus fuga.</p><p><em>Tempore voluptas voluptatem quidem quo voluptas voluptatem consectetur.</em></p><ul><li>Atque saepe distinctio iste animi iure aut optio.</li><li>Minima omnis veniam pariatur aliquid ad illum.</li><li>Perspiciatis doloribus temporibus quo omnis voluptatem et.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(64, 'Ucapan Selamat kepada Gasti Tantri Palastri S.IP', 'ucapan-selamat-kepada-gasti-tantri-palastri-sip', '2024-10-13', '<h4>Selamat!</h4><p>Temporibus deleniti odit eos aperiam commodi voluptas nihil. Et eligendi quia et similique qui voluptatem expedita veniam. Provident doloremque impedit nemo mollitia accusantium quis facilis omnis.</p><p><strong>Ullam sed alias nihil accusantium possimus rerum at.</strong> Praesentium aut modi sed consequatur consectetur magni. Libero non ut qui ipsa consequatur. Nulla est aut alias minus quae.</p><blockquote>Aut soluta illo doloremque ea molestias blanditiis.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(65, 'Ucapan Selamat kepada Hamima Hasanah S.Psi', 'ucapan-selamat-kepada-hamima-hasanah-spsi', '2025-01-21', '<h4>Selamat!</h4><p>Soluta ullam ratione corporis eligendi labore sed qui. Aut modi est dicta quos id impedit laborum ut. Animi enim totam suscipit dolore.</p><p><strong>Dolor nesciunt et fuga sit earum doloribus error.</strong> Aut officiis placeat rerum iure ut dolore. Amet aperiam deleniti cumque autem eum nemo accusamus quam. Iure enim eligendi et inventore optio quis. Quisquam doloribus deserunt alias voluptatum accusamus rerum qui sed. In aliquam mollitia id odit suscipit esse.</p><blockquote>Nostrum recusandae cupiditate et modi voluptate beatae reiciendis.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(66, 'Ucapan Selamat kepada Ilsa Melani', 'ucapan-selamat-kepada-ilsa-melani', '2025-05-30', '<h4>Selamat!</h4><p>Quae molestias quam qui ut ut qui. Corporis aut eos minima voluptatibus vel atque. Debitis necessitatibus blanditiis consectetur quidem qui enim.</p><p><strong>Facilis natus magni qui nam.</strong> Illo temporibus consequatur doloribus fugit placeat. Voluptatibus libero sit non quis corporis vel facilis. Fuga dolores fugit sit qui vel sequi ut. Et et ex quibusdam veniam deserunt iusto ut.</p><blockquote>Impedit repellendus id dicta alias in facilis aliquam voluptatibus.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35');
INSERT INTO `berita` (`id`, `judul`, `slug`, `tanggal`, `isi`, `sampul`, `lampiran`, `kategori`, `total_view`, `created_at`, `updated_at`) VALUES
(67, 'Kegiatan laudantium di Sungai Penuh', 'kegiatan-laudantium-di-sungai-penuh', '2024-08-25', '<p>Autem id nam quia veniam. Illum sit quis rem. Est quos omnis doloremque et. Aut a error exercitationem dolor ipsam est rerum.</p><p><strong>Accusantium voluptas illo voluptas amet velit libero.</strong> Quo est illum modi hic quam voluptas. Est aut accusantium exercitationem qui dolorem nemo. Quidem atque magnam voluptatem expedita quos omnis.</p><p>Odit omnis sunt vero reiciendis laboriosam voluptas quia. Et voluptate nihil dolorem. Molestiae omnis ipsum modi et consequatur.</p><ul><li>Officia pariatur aut est velit porro.</li><li>Reprehenderit minus asperiores explicabo natus voluptatem sed ullam.</li><li>Iure nesciunt quia et ut animi animi asperiores numquam.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(68, 'Pengumuman Terkait Eaque', 'pengumuman-terkait-eaque', '2024-09-29', '<h3>Perhatian</h3><p>Enim eius porro maxime explicabo. Sed suscipit optio voluptatibus enim sit. Eos blanditiis optio ex aliquam molestiae eveniet consequuntur.</p><p><em>Aut ut rerum non.</em></p><ul><li>Blanditiis ea odio rerum natus aperiam modi et est.</li><li>Est ex ad et veniam.</li><li>Dolores rerum inventore esse nulla sit aut.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(69, 'Kegiatan et di Pasuruan', 'kegiatan-et-di-pasuruan', '2024-12-23', '<p>Non impedit ea saepe deserunt esse ut architecto. Quia beatae nostrum qui et. Dolorem laudantium exercitationem ut aspernatur dolorum est.</p><p><strong>Perferendis a earum autem ex reiciendis impedit vitae quo.</strong> Sed sunt minus nulla voluptas laboriosam et. Ducimus officiis quis voluptas. Molestiae itaque quas vitae enim dolor sit nemo. Veritatis expedita eum nulla rerum atque deserunt.</p><p>Nemo id vitae doloribus quia. Est id autem qui et odio. Reiciendis officiis officia iste asperiores optio iste.</p><ul><li>Atque maiores dolor repellat neque rerum veniam.</li><li>Quisquam numquam enim eum commodi velit quam nesciunt.</li><li>Quia perspiciatis est placeat sapiente mollitia.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(70, 'Kegiatan corporis di Sukabumi', 'kegiatan-corporis-di-sukabumi', '2025-01-12', '<p>Aut et perspiciatis magnam libero eligendi ea. Saepe architecto ipsam est voluptas ut minus. Repellat molestias rerum totam odio.</p><p><strong>Quidem ullam distinctio necessitatibus et ipsam hic consequuntur.</strong> Incidunt quidem similique asperiores at est nihil. Dignissimos assumenda aliquid rem at. Voluptate quidem accusamus ea. Molestias eius quis doloremque maxime sit dolore quibusdam.</p><p>Deleniti ipsam fugiat odit sed. Quia occaecati delectus minima excepturi eligendi qui. Iusto sit eos corporis dolor iusto earum veniam. Modi consequuntur fugit vel voluptatem. Voluptates atque sint ea ex.</p><ul><li>Dolorum recusandae rerum laborum.</li><li>Qui praesentium corrupti perspiciatis rerum voluptatum.</li><li>Quasi vel in nostrum quia ullam qui.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(71, 'Kegiatan atque di Bandung', 'kegiatan-atque-di-bandung', '2025-01-03', '<p>Non perspiciatis temporibus natus quam placeat velit at delectus. Nulla qui nobis adipisci natus in sed. Nesciunt neque vero debitis et sit sed sunt. Accusamus illo vero assumenda praesentium sed quam nesciunt. Est ut esse et aut perspiciatis.</p><p><strong>Fuga voluptatem commodi voluptates laboriosam minus earum.</strong> Sapiente ratione illo dolor exercitationem accusamus minima. Rerum dicta suscipit error sit. Nihil labore quo assumenda ex harum sunt. Eum debitis corrupti enim dolore accusamus incidunt.</p><p>Rerum odio magni et voluptatem optio dolorem dolorem. Iste corrupti reprehenderit vel est dolor vel. Nostrum et aut aut hic aspernatur. Odio autem hic eius provident sunt earum quia.</p><ul><li>Quis quis et numquam suscipit itaque repellendus quam.</li><li>Quis exercitationem corrupti nihil doloremque aut et et iusto.</li><li>Quaerat inventore et sint velit perferendis accusamus.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(72, 'Pengumuman Terkait Distinctio', 'pengumuman-terkait-distinctio', '2024-12-01', '<h3>Perhatian</h3><p>Nihil dolor cupiditate et quasi explicabo optio qui. Aut ipsam at ea laborum fugit facilis soluta. Quisquam aut ad omnis aut quia aut illum. Facilis repudiandae nostrum fugiat.</p><p><em>Repellendus dolor at deserunt quis.</em></p><ul><li>Aut eaque ea quos.</li><li>Consectetur enim eum porro.</li><li>Voluptas quo sit laboriosam aut sed in nihil.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(73, 'Ucapan Selamat kepada Lasmanto Winarno M.Pd', 'ucapan-selamat-kepada-lasmanto-winarno-mpd', '2025-06-17', '<h4>Selamat!</h4><p>Iure iusto quis culpa maiores. Dolores nihil dolorem eligendi impedit accusamus molestiae voluptatum. Consectetur aut maxime est voluptas aut amet. Id necessitatibus molestiae adipisci vel omnis.</p><p><strong>Distinctio ut odit adipisci magnam.</strong> Et voluptatum ex eligendi aut. Voluptatem aut delectus ipsum esse nemo officiis. Quaerat quis ut quia eaque. Dolor unde et et dolor tenetur laudantium. Voluptatem odio a quibusdam pariatur.</p><blockquote>Sed assumenda eos sapiente delectus.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(74, 'Berita Duka: Maryadi Simbolon Telah Berpulang', 'berita-duka-maryadi-simbolon-telah-berpulang', '2025-02-10', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Et ut nihil nemo sed et numquam distinctio. Enim molestias debitis dolores quia perferendis ipsa. Eos consequatur et ut ut omnis voluptatibus amet. Perspiciatis qui itaque vel accusantium eligendi.</p><p><strong>Jagapati Drajat Nugroho</strong> Laudantium accusamus possimus quam sequi. Voluptatem optio accusamus eos nesciunt voluptatem voluptatum. Aliquid voluptates harum similique voluptatem. Laborum necessitatibus beatae beatae vel similique nam.</p><p>Suscipit nostrum cum illo modi commodi. Atque inventore expedita voluptas voluptatibus deserunt. Facere non minima molestias repudiandae placeat dolor quia. Laborum accusantium iure ut amet ad magnam.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(75, 'Kegiatan assumenda di Tasikmalaya', 'kegiatan-assumenda-di-tasikmalaya', '2025-03-25', '<p>Maxime ad voluptas aperiam molestias error assumenda. Qui aut et quia a.</p><p><strong>Consectetur necessitatibus omnis sed.</strong> Iste magni dolores eos et enim. Rem voluptatem illo odio non temporibus. Unde laborum et nobis occaecati quia. Adipisci quia ex est beatae.</p><p>Dignissimos placeat voluptas quisquam similique hic. Ut adipisci at eaque ut. Ut fugit veniam fugiat deserunt voluptatem ullam. Neque esse quia ullam quia excepturi.</p><ul><li>Molestiae aut voluptas voluptates officia est quaerat.</li><li>Sint temporibus est nesciunt voluptas sunt unde aut.</li><li>Cumque qui nobis eum illo aut.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(76, 'Pengumuman Terkait Placeat', 'pengumuman-terkait-placeat', '2024-10-27', '<h3>Perhatian</h3><p>Debitis distinctio dolorem delectus fugit est eius. Nihil qui hic pariatur commodi. Placeat dolorem facilis voluptas eum. Est unde temporibus temporibus optio architecto.</p><p><em>Nisi libero reiciendis aspernatur quos blanditiis iure.</em></p><ul><li>Ut repellendus veniam velit.</li><li>Est et aut molestiae sapiente occaecati qui.</li><li>Ratione veritatis occaecati voluptas eveniet rem.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(77, 'Pengumuman Terkait Id', 'pengumuman-terkait-id', '2024-10-21', '<h3>Perhatian</h3><p>Delectus fugiat odio incidunt sapiente consequatur maiores voluptatem. Sint reiciendis accusamus eveniet possimus corporis. Velit enim aut debitis quis molestiae. In qui id qui libero.</p><p><em>Rem modi deserunt eius quibusdam.</em></p><ul><li>Quis possimus quia molestiae.</li><li>Deserunt ad aut mollitia quia animi sint iste.</li><li>Iusto et quia enim suscipit voluptas aperiam.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(78, 'Ucapan Selamat kepada Winda Halimah', 'ucapan-selamat-kepada-winda-halimah', '2025-07-24', '<h4>Selamat!</h4><p>Error asperiores neque maiores occaecati omnis. Soluta molestias deleniti iusto vitae.</p><p><strong>Et quae nemo repellat debitis dolore sit.</strong> Dolor tempore cumque corporis quo numquam animi doloremque. Hic id saepe odio ab. Soluta ullam voluptatibus ad velit.</p><blockquote>Sapiente et quia fugiat.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(79, 'Pengumuman Terkait Sunt', 'pengumuman-terkait-sunt', '2025-01-16', '<h3>Perhatian</h3><p>Aut optio voluptatem facilis sit debitis quo in. Eos ipsam quidem facilis veritatis et. Accusamus illo enim qui commodi voluptatem.</p><p><em>Distinctio mollitia sit sit dolorem.</em></p><ul><li>Qui aspernatur molestiae magnam et dolores libero ducimus.</li><li>At corporis commodi dolor velit hic et qui.</li><li>Necessitatibus et et et qui aliquam.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(80, 'Kegiatan ut di Sorong', 'kegiatan-ut-di-sorong', '2024-08-07', '<p>At ut sit dolorem minima. Laborum velit reprehenderit magni sed porro sunt sequi. Laboriosam ex totam rerum unde.</p><p><strong>Voluptates beatae quia dolorum at.</strong> Reprehenderit quas aut itaque. Nihil laboriosam unde rerum consequatur. Expedita maiores aut quisquam aspernatur sit sit aut quia.</p><p>Aut consequatur repudiandae aliquam asperiores. Quo aliquid voluptas corrupti dolores rerum libero. Qui vero voluptas tempore vel et ullam.</p><ul><li>Dolore eveniet numquam eum ipsa optio voluptatum unde saepe.</li><li>Dicta molestias adipisci qui dolores.</li><li>Vel dicta facilis dignissimos officiis quia ratione.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(81, 'Ucapan Selamat kepada Mahesa Prabowo S.I.Kom', 'ucapan-selamat-kepada-mahesa-prabowo-sikom', '2025-05-30', '<h4>Selamat!</h4><p>Quis libero nemo fuga ad libero dolore aut. Doloremque dolor quia ut. Nemo qui nihil occaecati.</p><p><strong>Minus et est earum quia optio sit.</strong> Veritatis similique et voluptate mollitia. Enim est non quia est eos fugiat labore. Ipsa beatae iusto inventore nam. Nisi aut nisi corporis illo. Eligendi molestias asperiores et est nisi officia nihil.</p><blockquote>Quos sit blanditiis est.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(82, 'Berita Duka: Kurnia Oskar Kuswoyo S.T. Telah Berpulang', 'berita-duka-kurnia-oskar-kuswoyo-st-telah-berpulang', '2025-03-01', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Est ut nostrum magnam dolores rerum. Quaerat maxime cupiditate corrupti rem nihil. Corporis harum in qui consequatur sed minima architecto. Est cum sit unde error corporis quibusdam.</p><p><strong>Vanya Shakila Nasyiah</strong> Eaque qui quibusdam iste non impedit. Id quas blanditiis suscipit. Est illum tempore praesentium sunt. Dignissimos rerum autem molestias esse et quis.</p><p>Quisquam et minima tempora ut. Rerum corrupti et perspiciatis aut earum porro. Nihil rem dolorem quis velit qui rerum dolorem. Nemo sit nobis et fugiat dignissimos quia aliquam.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(83, 'Pengumuman Terkait Id', 'pengumuman-terkait-id', '2025-01-10', '<h3>Perhatian</h3><p>Quaerat totam ut et in voluptas optio sed. Reprehenderit mollitia et unde quia non saepe. Est eos sed tempore ut ut dicta consequatur. Earum quaerat voluptas enim aspernatur aliquid est ipsa.</p><p><em>Ut perferendis error ducimus delectus dolorum.</em></p><ul><li>Quos possimus debitis delectus enim.</li><li>Modi quisquam adipisci odit magnam est et.</li><li>Excepturi corporis quia officiis.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(84, 'Kegiatan rerum di Prabumulih', 'kegiatan-rerum-di-prabumulih', '2025-07-26', '<p>Accusantium asperiores eos quis soluta. In rerum perspiciatis adipisci magnam. Pariatur soluta unde deleniti ad earum. Illo exercitationem aut dolor velit.</p><p><strong>Voluptatem et a eveniet totam reiciendis voluptates aut in.</strong> Dolore ab dolorem cum eius perspiciatis temporibus magni. Dolorem laborum ut dicta vitae. Dolores dignissimos sunt voluptas beatae.</p><p>Numquam similique suscipit deleniti dolore nihil. Qui repellendus possimus veniam aliquid molestias sequi porro. Vel odit et repellendus ea natus rerum fugit.</p><ul><li data-list-item-id=\"ef92b1c49d36028fe1813a80c70f7bd58\">Exercitationem enim ut ab vero repellendus non.</li><li data-list-item-id=\"eb55c7ec982cfd874bf335b30e7547561\">Autem sed dolor rerum.</li><li data-list-item-id=\"e1e609972e079bce03ce782c81599b150\">Esse nesciunt enim minus mollitia.</li></ul>', 'berita/images-14-03-08-2025.jpeg', 'lampiran/file-example_PDF_1MB-25-03-08-2025.pdf', 'berita', 61, '2025-08-03 13:19:35', '2025-08-04 03:55:12'),
(85, 'Kegiatan ab di Banda Aceh', 'kegiatan-ab-di-banda-aceh', '2025-06-01', '<p>Cupiditate modi nam quia similique. Sequi est dolorem ut provident veniam voluptas. Eum molestias ipsum omnis ducimus temporibus. Eveniet dolore quasi quis molestiae.</p><p><strong>Est sunt ipsa esse nostrum accusantium saepe.</strong> Reprehenderit beatae amet rerum sit ab voluptas ex illum. Et eligendi ut est totam laudantium repellat ab. Aspernatur id optio impedit rem animi error veniam. Minus ut sit in occaecati.</p><p>Blanditiis voluptate sapiente assumenda ducimus animi earum. Aliquid aut voluptate quo ipsam adipisci sit.</p><ul><li>Dolore architecto aliquid architecto iste illo eligendi.</li><li>Quisquam neque facere tempore ad dolorum.</li><li>Deleniti est repellat vero ea.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(86, 'Pengumuman Terkait Consequuntur', 'pengumuman-terkait-consequuntur', '2025-02-20', '<h3>Perhatian</h3><p>Doloremque eaque tenetur repellat est quia. Et sed qui ad earum et consequuntur deleniti. Tempora non et excepturi consequatur impedit quia mollitia. Ad cum et rem.</p><p><em>Distinctio aut molestiae enim corporis.</em></p><ul><li>Ullam illo velit quam accusamus voluptatum dolorum.</li><li>Nihil mollitia nulla beatae.</li><li>Et eveniet est ab sit eligendi sint eum.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(87, 'Kegiatan accusantium di Binjai', 'kegiatan-accusantium-di-binjai', '2024-08-18', '<p>Officiis id pariatur cum placeat aut et. Labore ab magni velit et voluptas. Rerum ut similique rerum doloremque.</p><p><strong>Minus nobis sequi incidunt velit vero distinctio fugit officiis.</strong> Non quia similique assumenda quos et pariatur illum. Quasi vero sunt rerum ea odio. Expedita maxime beatae quasi sit. Qui tempore deserunt illo natus.</p><p>Culpa commodi ut possimus. Incidunt aut in facilis aut ipsa est pariatur soluta. Inventore labore ducimus dolores possimus labore qui eligendi. Quae voluptatum nam fuga accusamus. Dolores asperiores saepe illo.</p><ul><li>Cupiditate id totam consequuntur est voluptatibus expedita.</li><li>Dolore maiores fugiat dignissimos non in dolores.</li><li>Consequatur in aspernatur eum incidunt autem magni.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(88, 'Pengumuman Terkait Quo', 'pengumuman-terkait-quo', '2025-01-25', '<h3>Perhatian</h3><p>Necessitatibus voluptatem blanditiis excepturi autem eos. Eum quae nisi et aut et. Et deserunt et voluptates modi et in aliquam.</p><p><em>Dignissimos odio nihil quae natus aut.</em></p><ul><li>Ex et natus quo id.</li><li>Quos eligendi necessitatibus ipsa quia repellendus et excepturi.</li><li>Enim consequuntur illum saepe cum.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(89, 'Berita Duka: Kunthara Mansur Telah Berpulang', 'berita-duka-kunthara-mansur-telah-berpulang', '2025-07-02', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Sed ut quo quia accusantium sed. Quis vero doloribus eum aut voluptas repellendus suscipit. Exercitationem sit aut quas quas.</p><p><strong>Yessi Aryani</strong> Quos expedita aliquid provident hic corporis magni. Quidem aut voluptas nihil deleniti dolores perferendis. Odio architecto ut possimus at exercitationem.</p><p>Aut dolores ut quia dolorum maiores excepturi. Modi rem assumenda et excepturi est. Accusantium nemo in fugiat non nesciunt. Dolores reiciendis temporibus doloremque magnam aut.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(90, 'Berita Duka: Rahayu Rahayu Telah Berpulang', 'berita-duka-rahayu-rahayu-telah-berpulang', '2025-02-23', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Qui quia vel ut voluptatibus quo. Asperiores sed ea ut esse fuga eligendi sed.</p><p><strong>Amalia Laksita</strong> Est voluptatum est totam perspiciatis cupiditate fuga eos quisquam. Recusandae asperiores et sit labore rem. Ut quibusdam aperiam quia quis velit inventore. Vel dignissimos officiis explicabo. Accusantium velit harum rerum adipisci repellendus.</p><p>Saepe aliquid officiis ea veritatis mollitia. Atque voluptas enim est odit molestiae beatae reiciendis. Praesentium architecto excepturi corporis reprehenderit.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(91, 'Berita Duka: Nadia Widiastuti S.Farm Telah Berpulang', 'berita-duka-nadia-widiastuti-sfarm-telah-berpulang', '2024-10-27', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Itaque esse animi quibusdam tempora eligendi. Laudantium sit voluptatem quo praesentium animi. Ipsam cumque debitis autem blanditiis qui ut iure. Omnis in molestiae autem pariatur sunt sed.</p><p><strong>Martaka Maryadi</strong> Natus doloribus architecto occaecati fugiat est pariatur iusto. Ipsa minus esse accusantium ducimus. Rerum quo aperiam odio minima. Eveniet et dolores ad eius maiores.</p><p>Quia autem perferendis facilis qui quae. Nam voluptatum dolor harum non explicabo voluptatem eaque reprehenderit. Aut repellendus nemo aliquid blanditiis id. Qui sint sunt et tempora libero qui ut.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(92, 'Ucapan Selamat kepada Galuh Sihombing', 'ucapan-selamat-kepada-galuh-sihombing', '2025-06-08', '<h4>Selamat!</h4><p>Omnis quo voluptatum quia reprehenderit dicta. Minus ullam quas rerum consectetur atque eum facilis. Non praesentium voluptatem ea. Totam iste ut et beatae et qui expedita dignissimos. Iusto quisquam veniam magnam nihil.</p><p><strong>Molestias sed dolores non porro dolorum in consequatur.</strong> Omnis et at impedit numquam nihil. Magnam numquam optio sunt quis id cupiditate repellat. Quae sunt eos aliquam inventore totam quibusdam porro. Quia vitae molestiae aut est impedit.</p><blockquote>Autem autem nesciunt ullam asperiores magnam.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(93, 'Kegiatan minus di Malang', 'kegiatan-minus-di-malang', '2024-08-21', '<p>Labore et quis tenetur hic aut. Id eligendi in ut est blanditiis. Architecto quae sapiente corrupti dignissimos omnis ullam.</p><p><strong>Et adipisci dolore cumque incidunt quia.</strong> Quasi vero sunt mollitia earum. Architecto omnis consequatur commodi delectus consequuntur ut earum vel. Quod vero fuga odit ea unde nemo enim non. Quibusdam voluptatem est perferendis.</p><p>Eligendi minima hic id reprehenderit rerum quisquam ea. Error aspernatur amet voluptatem velit. Ipsum est iure quibusdam explicabo saepe. Aliquid nemo veritatis quia possimus ad neque omnis atque.</p><ul><li>Aut aut est voluptatem qui error vitae.</li><li>Atque atque non ipsum aperiam sapiente dolorum.</li><li>Nisi quisquam vero blanditiis eos.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(94, 'Berita Duka: Zulfa Winarsih Telah Berpulang', 'berita-duka-zulfa-winarsih-telah-berpulang', '2025-06-05', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Consequatur corrupti dolorum sed error mollitia aut vel. Dolores rerum natus tempore mollitia. Illum in et quia commodi dolores. Minus commodi repellat aut inventore dicta nihil impedit nesciunt.</p><p><strong>Sari Puspasari</strong> Molestiae a sed quis consectetur vel. Facere maiores exercitationem dolor est quae tenetur.</p><p>Facilis laboriosam iste sed est sit sed ullam. Hic quasi exercitationem molestias fugit. Porro aut eius cupiditate ex.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(95, 'Berita Duka: Mahesa Widodo Telah Berpulang', 'berita-duka-mahesa-widodo-telah-berpulang', '2024-08-05', '<h3>Innalillahi wa inna ilaihi raji\'un</h3><p>Nostrum quidem ut magnam rerum. Laboriosam qui nihil sunt nihil est corrupti. Ea qui tempora natus nam quia qui necessitatibus.</p><p><strong>Bagya Najmudin S.E.I</strong> Adipisci facere occaecati dolorum pariatur. Qui esse deserunt eveniet commodi ad dignissimos. Tempore rem omnis sit dolorem. Est placeat et aut asperiores corrupti.</p><p>Ipsa doloremque nostrum doloribus optio fugit. Laborum alias et dignissimos quae. Est fuga enim aut iste perferendis et qui.</p>', NULL, NULL, 'berita-duka', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(96, 'Kegiatan maxime di Gorontalo', 'kegiatan-maxime-di-gorontalo', '2025-04-07', '<p>Tenetur est consequatur facere et asperiores accusamus deleniti. Ut voluptate non cumque eum dolores voluptatem quis. Sint et sed ea optio qui qui.</p><p><strong>Repellat eos aliquid ex doloremque.</strong> Hic iste animi corporis quidem autem voluptatem. Qui est impedit assumenda est in. Nemo voluptatibus dolorem et dolor.</p><p>Ut voluptatem culpa maiores architecto nobis doloremque. Ipsa eos consequatur cum sit non veniam. Non perferendis eligendi ipsa aut. Nisi est cum sunt quam sed ut.</p><ul><li>Et et quos sit nemo in doloribus.</li><li>Neque et qui et et.</li><li>Ut incidunt rerum ullam quibusdam magni nesciunt tenetur.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(97, 'Pengumuman Terkait Esse', 'pengumuman-terkait-esse', '2024-11-18', '<h3>Perhatian</h3><p>Voluptatem laborum corrupti id sapiente voluptas quia qui. Impedit qui eos aspernatur ad sed. Modi ut odio exercitationem sit.</p><p><em>Placeat aspernatur ullam amet esse fugiat alias dicta.</em></p><ul><li>Iusto et nam voluptatem quo recusandae.</li><li>Est qui et illo est sunt dolor.</li><li>Cum similique ullam culpa qui aut ut voluptas.</li></ul>', NULL, NULL, 'pengumuman', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(98, 'Kegiatan in di Pontianak', 'kegiatan-in-di-pontianak', '2024-08-26', '<p>Atque delectus aliquam dolores qui debitis occaecati laborum sed. Et natus quod culpa. Dolorum aliquid aliquid dolor. Cumque veniam corrupti voluptate in inventore quas.</p><p><strong>Temporibus officia doloremque excepturi totam dolorum et.</strong> Earum maiores aut expedita autem animi at voluptates assumenda. Ut fugiat eligendi odio accusantium ad numquam veniam fugit. Reiciendis aperiam veritatis atque id expedita non.</p><p>Consectetur exercitationem qui consequatur ut sed qui. Doloremque soluta consequatur possimus. Eius dolorem ut quis est aliquid vero libero. Incidunt rerum qui reprehenderit id quia. Rerum voluptas ex consequatur.</p><ul><li>Id qui occaecati iste accusantium voluptatibus aliquam.</li><li>Et voluptatibus non beatae quia labore asperiores molestias.</li><li>Consequatur accusantium ducimus totam quia quas voluptas sit.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(99, 'Ucapan Selamat kepada Kacung Wahyudin', 'ucapan-selamat-kepada-kacung-wahyudin', '2024-09-09', '<h4>Selamat!</h4><p>Ipsa qui quo eveniet. Ut dolores aperiam cum fuga rerum sit sit ut. Repellendus voluptates corrupti consequatur eum. Qui consequatur eligendi est non quos blanditiis.</p><p><strong>Fugit aut sequi totam libero.</strong> Quia aut quisquam non hic non id. Asperiores sit vel alias eligendi quis quidem id eius. Eius omnis porro aut est incidunt.</p><blockquote>Voluptas omnis asperiores voluptatem aperiam a.</blockquote>', NULL, NULL, 'ucapan-selamat', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(100, 'Kegiatan quae di Binjai', 'kegiatan-quae-di-binjai', '2024-12-04', '<p>Vero qui illo omnis vero. Saepe provident necessitatibus eligendi accusamus aut laudantium dolorum. Dolorem qui vitae doloribus quos aut odit et.</p><p><strong>Est et occaecati eius sequi.</strong> Error nesciunt mollitia aliquam sit et maiores provident. Necessitatibus dolorem non dolor eum aliquid. Molestiae a aut excepturi eveniet eum.</p><p>Sint ea id omnis et. Necessitatibus consequuntur quisquam tenetur occaecati. Quidem amet nesciunt nisi ipsa sed quasi.</p><ul><li>Numquam nobis id eum sit explicabo.</li><li>Esse autem qui ducimus odio porro est.</li><li>Quia iure molestiae in minima ducimus qui sint qui.</li></ul>', NULL, NULL, 'berita', 0, '2025-08-03 13:19:35', '2025-08-03 13:19:35');

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
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `judul`, `tanggal`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Workshop Penyusunan SKP ASN 2025', '2025-01-15', 'BKPSDM mengadakan workshop penyusunan Sasaran Kinerja Pegawai (SKP) terbaru.', 'galeri/1eY0XC0mSPdgPtiL2qSjXyBXzbYgUiYCVy2h3y5J.jpg', '2025-08-03 13:19:37', '2025-08-03 13:58:46'),
(2, 'Penerimaan CPNS Formasi 2024', '2025-02-10', 'Penerimaan CPNS dilaksanakan secara transparan dan profesional oleh BKPSDM.', 'galeri/vOerrozKRClNJRASwvuB2umufG5w6XuewaQSacwi.webp', '2025-08-03 13:19:37', '2025-08-03 13:58:54'),
(3, 'Pelatihan Dasar Calon ASN', '2025-03-05', 'Pelatihan dasar (Latsar) bagi ASN baru untuk meningkatkan integritas dan pelayanan.', 'galeri/3W1kIU5XpKb6EYMy5ZkqsHUHECZ4bNrYsAtt2a0o.jpg', '2025-08-03 13:19:37', '2025-08-03 13:59:01'),
(4, 'Sosialisasi e-Kinerja', '2025-03-22', 'Implementasi sistem e-Kinerja untuk memantau dan menilai kinerja ASN.', 'galeri/tcAmpIJ1QiRvTIfLGeLYVYDKg3EsFmRfY3lqpROQ.webp', '2025-08-03 13:19:37', '2025-08-03 13:59:07'),
(5, 'Rapat Koordinasi Penataan Jabatan', '2025-04-12', 'Koordinasi antar OPD untuk penyusunan dan penataan jabatan fungsional.', 'galeri/fOvbUb0f7sgUNtwcLO3URjIpggo2PR8OgLXX5QQ7.jpg', '2025-08-03 13:19:37', '2025-08-03 13:59:29'),
(6, 'Penyerahan SK PPPK Tahap I', '2025-04-28', 'Penyerahan Surat Keputusan pengangkatan PPPK secara simbolis oleh Wali Kota.', 'galeri/DdFED6czhNGQBfYhhoBmkgBzS6yFchG5Xiji985o.webp', '2025-08-03 13:19:37', '2025-08-03 13:59:37'),
(7, 'Pelatihan Leadership ASN Muda', '2025-05-09', 'Pengembangan kepemimpinan bagi ASN muda agar siap memimpin di masa depan.', 'galeri/Y1tDCUYXZp9ZGuoUFZm0u4dD4EW135GBkQlCxV3x.jpg', '2025-08-03 13:19:37', '2025-08-03 13:59:45'),
(8, 'Simulasi CAT Seleksi ASN', '2025-05-20', 'BKPSDM mengadakan simulasi sistem CAT sebagai bagian dari transparansi seleksi ASN.', 'galeri/rwJlY4fdzMy6of1ER5UKzeCe4X7vA6IFEUnGorRU.webp', '2025-08-03 13:19:37', '2025-08-03 13:59:51'),
(9, 'Peningkatan Layanan Kepegawaian', '2025-06-01', 'Evaluasi dan peningkatan layanan kepegawaian berbasis digital di lingkungan BKPSDM.', 'galeri/YNozSdBnslPt88nLzox5PBQAdx2dvPKPiDIHZGEa.jpg', '2025-08-03 13:19:37', '2025-08-03 14:00:12'),
(10, 'Hari Ulang Tahun BKPSDM', '2025-07-01', 'Peringatan HUT BKPSDM ke-18 dengan kegiatan syukuran dan penyerahan penghargaan.', 'galeri/BwuZaEOz47rdgdBqVcXQod7Jw2OSjahphRxX1Y7V.webp', '2025-08-03 13:19:37', '2025-08-03 14:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `id` bigint UNSIGNED NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`id`, `isi`, `kategori`, `gambar`, `link`, `lampiran`, `created_at`, `updated_at`) VALUES
(1, '<figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=bZ4iSd1HI4Y&amp;pp=ygUTYmtwc2RtIGtvdGEga2VuZGFyaQ%3D%3D\"></oembed></figure>', 'logo', 'gambar/logo-bkpsdm-56-03-08-2025.png', NULL, 'lampiran/dummy-56-03-08-2025.pdf', '2025-08-03 13:25:56', '2025-08-03 17:23:18'),
(2, '<p><span class=\"text-big\"><strong>Latar Belakang</strong></span></p><p>Undang-Undang Nomor 5 Tahun 2014 tentang Aparatur Sipil Negara (disingkat dengan UU ASN) lahir dalam rangka pelaksanaan cita-cita bangsa dan mewujudkan tujuan negara sebagaimana tercantum dalam Pembukaan Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, perlu dibangun aparatur sipil negara yang memiliki integritas, profesional, netral dan bebas dari intervensi politik, bersih dari praktik korupsi, kolusi, dan nepotisme, serta mampu menyelenggarakan pelayanan publik bagi masyarakat dan mampu menjalankan peran sebagai unsur perekat persatuan dan kesatuan bangsa berdasarkan Pancasila dan Undang-Undang Dasar Negara Republik Indonesia Tahun 1945. UU ASN hadir untuk menggantikan Undang-Undang Nomor 8 Tahun 1974 tentang Pokok-Pokok Kepegawaian sebagaimana telah diubah dengan Undang-Undang Nomor 43 Tahun 1999 tentang Perubahan atas Undang-Undang Nomor 8 Tahun 1974 tentang Pokok Pokok Kepegawaian karena sudah tidak sesuai dengan tuntutan nasional dan tantangan global. Pelaksanaan manajemen aparatur sipil negara harus berdasarkan pada perbandingan antara kompetensi dan kualifikasi yang diperlukan oleh jabatan dengan kompetensi dan kualifikasi yang dimiliki calon dalam rekrutmen, pengangkatan, penempatan, dan promosi pada jabatan sejalan dengan tata kelola pemerintahan yang baik dan untuk mewujudkan aparatur sipil negara sebagai bagian dari reformasi birokrasi, perlu ditetapkan aparatur sipil negara sebagai profesi yang memiliki kewajiban mengelola dan mengembangkan dirinya dan wajib mempertanggungjawabkan kinerjanya.</p><p>Menurut UU ASN Pegawai Negeri Sipil merupakan bagian dari Pegawai Aparatur Sipil Negara. Dalam Pasal 10 dijelaskan bahwa Pegawai ASN berfungsi sebagai: pelaksana kebijakan publik, pelayan publik serta perekat dan pemersatu bangsa. Sedangkan tugas Pegawai ASN menurut Pasal 11 adalah:</p><ol><li data-list-item-id=\"e0f8d58f1ad7d1271ab0953d54c3418fb\">Melaksanakan kebijakan publik yang dibuat oleh Pejabat Pembina Kepegawaian sesuai dengan ketentuan peraturan perundang-undangan;</li><li data-list-item-id=\"e29d4bc9b365716e588315a474606bf36\">Memberikan pelayanan publik yang profesional dan berkualitas; dan</li><li data-list-item-id=\"ed49c38cea5feca0fa85ecd51414db24c\">Mempererat persatuan dan kesatuan Negara Kesatuan Republik Indonesia.</li></ol><p>Dalam Peraturan Daerah tersebut, disebutkan bahwa Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Kabupaten Majalengka mempunyai tugas melaksanakan manajemen Pegawai Negeri Sipil Daerah, Pendidikan dan Pelatihan sesuai kebijaksanaan yang ditetapkan Bupati Majalengka berdasarkan peraturan perundang-undangan yang berlaku. Pemerintah Kabupaten Majalengka dalam rangka melaksanakan efisieinsi dan efektifitas dalam manajemen PNS Kabupaten Majalengka telah dikembangkan tekonologi melalui Sistem yang berbasis teknologi melalui Sistem Informasi Kepegawaian Daerah yang dikelola oleh Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Kabupaten Majalengka yang disusun secara sistematis, dengan data terintegrasi, dan sekarang masih dalam tahap penginputan data oleh masing-masing SKPD, dengan tujuan dapat dijadikan sebagai salah satu bahan pertimbangan dalam pengambilan keputusan oleh pimpinan.&nbsp;</p><p>Kebutuhan mengenai data dan informasi untuk penyelenggaraan Manajemen ASN sangat diperlukan, baik untuk perencanaan kepegawaian maupun pengambilan keputusan oleh pimpinan di daerah dan pusat. Kelengkapan jenis data dan kemutakhiran data akan dapat memberikan hasil yang memuaskan bagi semua pihak, baik pengambil kebijakan maupun pegawai itu sendiri sebagai elemen yang dilayani. Terkait dengan hal tersebut, maka disusunlah Buku Profil Kepegawaian di Kabupaten Majalengka Tahun 2021 &nbsp;sebagai bahan untuk mendukung tercapainya kualitas penataan kepegawaian guna mengisi struktur organisasi yang ada dan tercapainya tujuan organisasi.</p>', 'sejarah', NULL, NULL, 'lampiran/file-example_PDF_1MB-54-03-08-2025.pdf', '2025-08-03 13:26:54', '2025-08-03 18:07:30'),
(3, NULL, 'struktur-organisasi', 'gambar/Screenshot_2025-08-04_01-56-47-03-03-08-2025.png', NULL, NULL, '2025-08-03 13:30:28', '2025-08-03 17:57:03'),
(4, '<p style=\"text-align:center;\"><span style=\"background-color:rgb(255,255,255);color:rgb(34,34,34);\"><strong>CUTI DI LUAR TANGGUNGAN NEGARA</strong></span></p><p><span style=\"background-color:rgb(255,255,255);color:rgb(34,34,34);\">Cuti di Luar Tanggungan Negara adalah cuti yang diberikan kepada PNS karena alasan pribadi dan mendesak setelah memenuhi persyaratan.</span></p><p>Alasan pribadi dan mendesak sebagaimana dimaksud antara lain :</p><ul><li data-list-item-id=\"e8b8b7fb7b5cd3270f6cb581f476fe912\">Mengikuti atau mendampingi suami/ isteri tugas negara/tugas belajar di dalam/luar negeri (melampirkan surat penugasan atau surat perintah tugas dari pejabat yang berwenang)</li><li data-list-item-id=\"e90bc7a6c4cb6ef43c204bf8a1bcd112a\">Mendampingi suami/isteri bekerja di dalam/luar negeri (melampirkan surat keputusan atau surat penugasan/pengangkatan dalam jabatan)</li><li data-list-item-id=\"ed4656f166cb43e87fb2a7ef5066cf19d\">Menjalani program untuk mendapatkan keturunan (melampirkan surat keterangan dokter spesialis)</li><li data-list-item-id=\"eb2bfeb994c7d0147a8ead786e0bafce5\">Mendampingi anak yang berkebutuhan khusus (melampirkan surat keterangan dokter spesialis)</li><li data-list-item-id=\"ed13fe8ca3e131bfe10c0db5fbcf6abb9\">Mendampingi suami/isteri/anak yang memerlukan perawatan khusus (melampirkan surat keterangan dokter spesialis)</li><li data-list-item-id=\"ef10a805e076b340ec782caf557bc25e0\">Mendampingi, merawat orang tua/mertua yang sakit/uzur (melampirkan surat keterangan dokter)</li></ul><p style=\"text-align:center;\"><strong>DASAR HUKUM</strong></p><ul><li data-list-item-id=\"e3bd3b995168f88866f3c761dfd6761e4\">Undang-Undang Nomor 5 Tahun 2014 tentang Aparatur Sipil Negara;</li><li data-list-item-id=\"ef719cdb16cf325ee1a5d7071a550a10c\">Peraturan Pemerintah Nomor 11 Tahun 2017 tentang Manajemen Pegawai Negeri Sipil sebagaimana telah diubah dengan Peraturan Pemerintah Nomor 17 Tahun 2020;</li><li data-list-item-id=\"ef18297ef399dbb37ff618e87701b9bdc\">Peraturan Presiden Nomor 58 Tahun 2013 tentang Badan Kepegawaian Negara;</li><li data-list-item-id=\"e71a64ae58ac33af61f05cc81e2bfa5d0\">Peraturan BKN Nomor 24 Tahun 2017 tentang Tata Cara Pemberian Cuti PNS sebagaimana telah diubah dengan Peraturan BKN Nomor 7 Tahun 2021;</li></ul><p style=\"text-align:center;\"><strong>PERSYARATAN ADMINISTRASI</strong></p><ul><li data-list-item-id=\"eed50141059a02355dcf4247da6459391\">Surat Pengantar dari Instansi pengusul;</li><li data-list-item-id=\"eaa164e561dbefee2f1200038750db402\">Salinan SK CPNS; Salinan SK PNS;</li><li data-list-item-id=\"eeeabe2d6b25a5c1b7d433f484ffb5f2f\">Salinan SK Kenaikan Pangkat terakhir; Permohonan secara tertulis PNS kepada PPK disertai dengan alasan yang dibuat sesuai dengan contoh Anak Lampiran I.b Peraturan BKN 24 Tahun 2017 tentang Tata Cara Pemberian Cuti PNS;</li><li data-list-item-id=\"e27f43f60b4b9f37ad674a3752c3fd205\">Dokumen pendukung alasan PNS yang bersangkutan mengajukan CLTN (seperti Tugas Belajar suami/istri, Surat Keterangan dokter dan sebagainya);</li><li data-list-item-id=\"ebceb27d5f14816350abb93343a615eef\">dan Nota Persetujuan Kepala Badan Kepegawaian Negara yang dibuat rangkap 3 (tiga) sesuai dengan contoh Anak Lampiran I.d Peraturan BKN 24 Tahun 2017 tentang Tata Cara Pemberian Cuti PNS.</li></ul><p><strong>Sistem, Mekanisme dan Prosedur Pengajuan Persetujuan Pemberian CLTN</strong></p><figure class=\"image\"><img style=\"aspect-ratio:457/644;\" src=\"http://localhost:8009/storage/ckeditor5/bG5MrCsDjwlEdWqQb8qd.png\" width=\"457\" height=\"644\"></figure><p><strong>Jangka waktu pelayanan</strong></p><p>3 (tiga) hari kerja sejak usulan diterima Direktorat Status &amp; Kedudukan Kepegawaian dan apabila persyaratan lengkap</p><p><strong>Cuti PPPK</strong></p><figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=Op2zTFaouBo\"></oembed></figure>', 'cuti-asn', NULL, NULL, 'lampiran/file-example_PDF_1MB-57-03-08-2025.pdf', '2025-08-03 14:04:50', '2025-08-03 17:26:32'),
(5, '<p>Coaching Clinic merupakan suatu layanan berupa konsultasi dan pendampingan secara daring maupun luring dengan tujuan memberikan penjelasan dan pendampingan secara teknis kepada ASN. Untuk penguasaan pengetahuan dan kecakapan di bidang tertentu.&nbsp;</p><p>Untuk mengikuti Coaching Clinic silakan klik tombol daftar di bawah. Anda akan dialihkan menuju halaman form pendaftaran Coaching Clinic</p><p><a href=\"https://google.com\">Daftar</a></p>', 'coc-manajemen-asn', NULL, NULL, NULL, '2025-08-03 14:31:14', '2025-08-03 14:31:14'),
(6, '<figure class=\"image\"><img style=\"aspect-ratio:585/580;\" src=\"http://localhost:8009/storage/ckeditor5/KMdv0kFYUFado2An0MHj.png\" width=\"585\" height=\"580\"></figure><figure class=\"image\"><img style=\"aspect-ratio:621/744;\" src=\"http://localhost:8009/storage/ckeditor5/xcwa75CLnlnFRW9LfqqJ.png\" width=\"621\" height=\"744\"></figure><p>Untuk mengetahui lebih mendalam mengenai Kenaikan Pangkat Luar Biasa, anda dapat membaca <a href=\"htpps://google.com\">Buku Saku Kenaikan Pangkat Luar Biasa</a></p>', 'kenaikan-pangkat', NULL, NULL, 'lampiran/dummy-27-03-08-2025.pdf', '2025-08-03 14:43:26', '2025-08-03 17:29:21'),
(7, '<figure class=\"image\"><img style=\"aspect-ratio:498/500;\" src=\"http://localhost:8009/storage/ckeditor5/MF1tDRo4IjR2i3pMJdMi.png\" width=\"498\" height=\"500\"></figure><figure class=\"image\"><img style=\"aspect-ratio:500/698;\" src=\"http://localhost:8009/storage/ckeditor5/cP1eqyvA1WOvS8xImOK6.png\" width=\"500\" height=\"698\"></figure><p style=\"text-align:center;\"><span class=\"text-big\"><strong>Contoh Alur Pengajuan Tugas Belajar di Lingkungan BKN</strong></span></p><figure class=\"image\"><img style=\"aspect-ratio:503/502;\" src=\"http://localhost:8009/storage/ckeditor5/9Fc7w2zbBDmXMeVFRab8.png\" width=\"503\" height=\"502\"></figure>', 'tugas-belajar', NULL, NULL, NULL, '2025-08-03 14:49:43', '2025-08-03 17:33:03'),
(8, '<p><strong>Prosedur Mutasi PNS antar-instansi dapat kami sampaikan sebagai berikut:</strong></p><p><strong>1. Mutasi PNS dalam satu Provinsi</strong></p><figure class=\"image\"><img style=\"aspect-ratio:620/618;\" src=\"http://localhost:8009/storage/ckeditor5/kxWk33ghlzm2OEEWEg9Z.png\" width=\"620\" height=\"618\"></figure><p><strong>2. Mutasi PNS antar kabupaten/kota antar provinsi dan antar provinsi</strong></p><figure class=\"image\"><img style=\"aspect-ratio:620/575;\" src=\"http://localhost:8009/storage/ckeditor5/c1DtXFqiFpbRxeOBHXFp.png\" width=\"620\" height=\"575\"></figure><p><strong>3. Mutasi PNS dari Provinsi/Kabupaten/Kota ke Instansi Pusat atau sebaliknya dan Mutasi antar Instansi Pusat</strong></p><figure class=\"image\"><img style=\"aspect-ratio:619/581;\" src=\"http://localhost:8009/storage/ckeditor5/bZO8vsc07ZhlYMhVMEeY.png\" width=\"619\" height=\"581\"></figure><p><span class=\"text-big\" style=\"background-color:rgb(255,255,255);color:rgb(34,34,34);\"><strong>Persyaratan Pindah Instansi</strong></span></p><figure class=\"image\"><img style=\"aspect-ratio:616/878;\" src=\"http://localhost:8009/storage/ckeditor5/Uk2PI7gAOvgfYd3QbjPG.png\" width=\"616\" height=\"878\"></figure>', 'mutasi-pegawai', NULL, NULL, NULL, '2025-08-03 17:36:55', '2025-08-03 17:41:36'),
(9, '<p style=\"text-align:center;\"><span class=\"text-huge\" style=\"background-color:rgb(255,255,255);color:rgb(34,34,34);\"><strong>Penyusunan dan Evaluasi Kinerja</strong></span></p><p><span style=\"background-color:rgb(255,255,255);color:rgb(34,34,34);\">Panduan Penentuan Indikator Kinerja Utama dan Cascading</span></p><figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=aPhEMISmesM\"></oembed></figure><p>Panduan Pelaksanaan Dialog Kinerja</p><figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=BCrPLePwetk\"></oembed></figure><p>Sasaran Kerja Pegawai yang selanjutnya disingkat SKP adalah rencana kerja dan target yang akan dicapai oleh seorang PNS setiap tahun. Umumnya Penyusunan SKP harus mengacu kepada:</p><ul><li data-list-item-id=\"ed235b1ade85a62342224e874a84b4e44\">Perencanaan Strategis Instansi Pemerintah </li><li data-list-item-id=\"e17fc3f0654474f6ef60dc8c821ae929a\">Perjanjian Kinerja </li><li data-list-item-id=\"eee3931f171314770069801f1c89c07ee\">Organisasi dan Tata Kerja </li><li data-list-item-id=\"eb84e9add1a682c16aa9955afd9104237\">Uraian Jabatan</li><li data-list-item-id=\"e5653171412178bad4e14fadd5fd253b1\">SKP Atasan Langsung.</li></ul>', 'konsultasi-kinerja', NULL, NULL, NULL, '2025-08-03 17:47:12', '2025-08-03 17:47:12'),
(10, '<p><span class=\"text-big\"><strong>Kedudukan dan Tanggung Jawab</strong></span></p><p>Pejabat Fungsional berkedudukan sebagai pelaksana teknis fungsional pada Instansi Pemerintah dan bertanggung jawab secara langsung kepada Pejabat Pimpinan Tinggi Pratama, Pejabat Administrator, atau Pejabat Pengawas yang memiliki keterkaitan dengan pelaksanaan tugas Jabatan Fungsional.&nbsp;</p><p>Jabatan Fungsional (JF) merupakan jabatan karier PNS yang bertugas memberikan pelayanan fungsional yang berdasarkan pada keahlian dan keterampilan tertentu.</p><p>Buku <a href=\"https://google.com\">Profil Jabatan Fungsional 2020</a> berisi profil Jabatan Fungsional sebanyak 222 jabatan yang diambil berdasarkan data terakhir per tanggal 16 Juni 2020. Buku Profil Jabatan Fungsional dapat dijadikan sebagai dasar dalam melakukan pembinaan Jabatan Fungsional Aparatur Sipil Negara serta menjadi acuan dalam pengembangan Jabatan Fungsional di lingkungan Kementerian/Lembaga di tingkat pusat serta pemerintah daerah.</p><figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=Ujh83iHKjeM\"></oembed></figure>', 'jabatan-fungsional', NULL, NULL, NULL, '2025-08-03 17:52:20', '2025-08-03 17:54:26'),
(11, '<p style=\"text-align:center;\"><span class=\"text-huge\" style=\"background-color:rgb(255,255,255);color:rgb(34,34,34);\"><strong>Permohonan Audiensi</strong></span></p><p><span style=\"background-color:rgb(255,255,255);color:rgb(34,34,34);\">Demi meningkatkan efisiensi dan efektivitas pelayan BKN, saat ini BKN hanya menyediakan layanan audiensi secara dalam jaringan. Media layanan audiensi menggunakan zoom meeting yang dapat diikuti setelah instansi mendaftar melalui link berikut: </span><a href=\"https://google.com\"><span style=\"background-color:rgb(255,255,255);color:rgb(34,34,34);\">Permohonan Audiensi</span></a><span style=\"background-color:rgb(255,255,255);color:rgb(34,34,34);\">.</span></p><figure class=\"image\"><img style=\"aspect-ratio:456/645;\" src=\"http://localhost:8009/storage/ckeditor5/F8Lr3w6yp1Y9zh3aDQH5.png\" width=\"456\" height=\"645\"></figure><figure class=\"image\"><img style=\"aspect-ratio:364/647;\" src=\"http://localhost:8009/storage/ckeditor5/FVZlARsPVujmIFEuf4nh.png\" width=\"364\" height=\"647\"></figure>', 'hubungi-kami', NULL, NULL, NULL, '2025-08-03 18:01:51', '2025-08-03 18:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint UNSIGNED NOT NULL,
  `unit_organisasi_id` bigint UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tugas` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `unit_organisasi_id`, `nama`, `slug`, `tugas`, `created_at`, `updated_at`) VALUES
(1, 1, 'KEPALA SUB BAGIAN', 'kepala-sub-bagian', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(2, 2, 'ANALIS SDM APARATUR AHLI MUDA', 'analis-sdm-aparatur-ahli-muda', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(3, 3, 'ANALIS PENGEMBANGAN KARIR', 'analis-pengembangan-karir', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(4, 4, 'PENGELOLA DATA', 'pengelola-data', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(5, 3, 'PENELAAH TEKNIS KEBIJAKAN', 'penelaah-teknis-kebijakan', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(6, 2, 'ANALIS PERENCANAAN SUMBER DAYA APARATUR', 'analis-perencanaan-sumber-daya-aparatur', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(7, 5, 'KEPALA BADAN', 'kepala-badan', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(8, 6, 'ANALIS SISTEM INFORMASI DAN JARINGAN', 'analis-sistem-informasi-dan-jaringan', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(9, 7, 'PENGELOLA SIM KEPEGAWAIAN', 'pengelola-sim-kepegawaian', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(10, 8, 'ANALIS PENGANUGERAHAN', 'analis-penganugerahan', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(11, 9, 'PENGELOLA DATA', 'pengelola-data', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(12, 7, 'PENGELOLA KEPEGAWAIAN', 'pengelola-kepegawaian', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(13, 10, 'ANALIS SDM APARATUR AHLI MUDA', 'analis-sdm-aparatur-ahli-muda', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(14, 9, 'KEPALA SUB BAGIAN', 'kepala-sub-bagian', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(15, 1, 'ANALIS KEUANGAN', 'analis-keuangan', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(16, 8, 'PENGELOLA DATA', 'pengelola-data', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(17, 11, 'ANALIS SISTEM INFORMASI', 'analis-sistem-informasi', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(18, 12, 'ANALIS SDM APARATUR AHLI MUDA', 'analis-sdm-aparatur-ahli-muda', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(19, 12, 'PENGELOLA DATA', 'pengelola-data', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(20, 10, 'PENYUSUN RENCANA MUTASI', 'penyusun-rencana-mutasi', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(21, 12, 'ANALIS PERATURAN KEPEGAWAIAN', 'analis-peraturan-kepegawaian', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(22, 13, 'KEPALA BIDANG', 'kepala-bidang', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(23, 7, 'PENYUSUN RENCANA MUTASI', 'penyusun-rencana-mutasi', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(24, 14, 'PENGELOLA ANGGARAN', 'pengelola-anggaran', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(25, 1, 'PENATA LAPORAN KEUANGAN', 'penata-laporan-keuangan', NULL, '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(26, 9, 'ANALIS TATA USAHA', 'analis-tata-usaha', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(27, 15, 'KEPALA BIDANG', 'kepala-bidang', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(28, 1, 'PENGELOLA KEUANGAN', 'pengelola-keuangan', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(29, 8, 'ANALIS PERMASALAHAN HUKUM', 'analis-permasalahan-hukum', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(30, 16, 'KEPALA BIDANG', 'kepala-bidang', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(31, 17, 'KEPALA BIDANG', 'kepala-bidang', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(32, 18, 'ANALIS PENGEMBANGAN KOMPETENSI', 'analis-pengembangan-kompetensi', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(33, 2, 'PENGELOLA DATA', 'pengelola-data', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(34, 4, 'ANALIS SDM APARATUR AHLI MUDA', 'analis-sdm-aparatur-ahli-muda', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(35, 3, 'ANALIS JABATAN', 'analis-jabatan', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(36, 19, 'PENGELOLA DATA', 'pengelola-data', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(37, 18, 'ASESOR SDM APARATUR AHLI MUDA', 'asesor-sdm-aparatur-ahli-muda', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(38, 19, 'ASESOR SDM APARATUR AHLI MUDA', 'asesor-sdm-aparatur-ahli-muda', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(39, 5, 'SEKRETARIS', 'sekretaris', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(40, 14, 'PERENCANA AHLI MUDA', 'perencana-ahli-muda', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(41, 18, 'PENGELOLA DATA', 'pengelola-data', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(42, 9, 'ANALIS HUKUM', 'analis-hukum', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(43, 1, 'BENDAHARA PENGELUARAN', 'bendahara-pengeluaran', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(44, 20, 'ANALIS SDM APARATUR AHLI MUDA', 'analis-sdm-aparatur-ahli-muda', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(45, 9, 'ANALIS ASET DAERAH', 'analis-aset-daerah', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(46, 8, 'ANALIS SDM APARATUR AHLI MUDA', 'analis-sdm-aparatur-ahli-muda', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(47, 6, 'PENGELOLA DATA', 'pengelola-data', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(48, 8, 'KONSELOR SDM', 'konselor-sdm', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(49, 20, 'ANALIS PERENCANAAN SUMBER DAYA APARATUR', 'analis-perencanaan-sumber-daya-aparatur', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(50, 11, 'ANALIS SISTEM INFORMASI & JARINGAN', 'analis-sistem-informasi-jaringan', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(51, 6, 'ASESOR SDM APARATUR AHLI MUDA', 'asesor-sdm-aparatur-ahli-muda', NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34');

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
-- Table structure for table `kategori_regulasi`
--

CREATE TABLE `kategori_regulasi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_regulasi`
--

INSERT INTO `kategori_regulasi` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Instruksi Presiden', 'instruksi-presiden', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(2, 'Keputusan Kepala BKN', 'keputusan-kepala-bkn', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(3, 'Keputusan Menteri', 'keputusan-menteri', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(4, 'Keputusan Presiden', 'keputusan-presiden', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(5, 'Peraturan Bersama', 'peraturan-bersama', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(6, 'Peraturan BKN', 'peraturan-bkn', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(7, 'Peraturan Kepala BKN', 'peraturan-kepala-bkn', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(8, 'Peraturan Menteri', 'peraturan-menteri', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(9, 'Peraturan Pemerintah', 'peraturan-pemerintah', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(10, 'Peraturan Presiden', 'peraturan-presiden', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(11, 'Surat Deputi', 'surat-deputi', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(12, 'Surat Edaran Kepala BKN', 'surat-edaran-kepala-bkn', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(13, 'Surat Kepala BKN', 'surat-kepala-bkn', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(14, 'Surat Menteri', 'surat-menteri', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(15, 'Topik Kepegawaian', 'topik-kepegawaian', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(16, 'Undang-Undang', 'undang-undang', '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(17, 'UUD 1945', 'uud-1945', '2025-08-03 13:19:35', '2025-08-03 13:19:35');

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
(4, '2025_07_24_051928_create_berita_table', 1),
(5, '2025_07_25_104229_create_slider_table', 1),
(6, '2025_07_26_020123_create_halaman_table', 1),
(7, '2025_07_26_145222_create_foto_table', 1),
(8, '2025_07_27_043029_create_video\'_table', 1),
(9, '2025_07_27_113835_create_kategori_regulasi_table', 1),
(10, '2025_07_27_113836_create_regulasi_table', 1),
(11, '2025_07_28_034542_create_bagian_table', 1),
(12, '2025_07_28_034550_create_unit_organisasi_table', 1),
(13, '2025_07_28_145912_create_jabatan_table', 1),
(14, '2025_07_28_145999_create_pejabat_table', 1),
(15, '2025_07_30_231252_create_pengaturans_table', 1),
(16, '2025_07_31_081630_create_statistik_asn_table', 1);

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
-- Table structure for table `pejabat`
--

CREATE TABLE `pejabat` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` bigint UNSIGNED DEFAULT NULL,
  `biografi` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pejabat`
--

INSERT INTO `pejabat` (`id`, `nama`, `jabatan_id`, `biografi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'ADI JAHYADI, SP', 1, NULL, NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(2, 'AGUS PRIYANTO, S.SOS.,MM', 6, NULL, NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(3, 'AGUS SALIM A.SURYA,S.Sos', 3, NULL, NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(4, 'AGUSTIN, SE', 4, NULL, NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(5, 'AHMADI, S.Tr.Par', 5, NULL, NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(6, 'ALAN YUSTAKIM HS, S.TR.IP', 6, NULL, NULL, '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(7, 'ALFIAN, SP, MM', 7, NULL, 'pejabat/X8KuVgI1GESCUkv2j1Ro2VbrrEWrEWi2PW7fhUJb.webp', '2025-08-03 13:19:34', '2025-08-03 17:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_pengaturan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_pengaturan`, `label`, `value`, `created_at`, `updated_at`) VALUES
(1, 'no_hp', 'No Hp', '081212345678', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(2, 'email_dinas', 'Email Dinas', 'bkpsdm.kendarikota@gmail.com', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(3, 'alamat', 'Alamat', 'Jl. Drs. H. Abdullah Silondae No.8, Gedung Menara Balaikota Kendari Lt.5', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(4, 'fb', 'Facebook', '#', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(5, 'ig', 'Instagram', 'https://www.instagram.com/bkpsdmkendari', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(6, 'tt', 'Twitter', '#', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(7, 'yt', 'Youtube', 'https://www.youtube.com/@bkpsdmkendari1551', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(8, 'jam_operasional', 'Jam Operasional', 'Senin-Jumat 08:00 - 16:00', '2025-08-03 13:19:37', '2025-08-03 13:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `regulasi`
--

CREATE TABLE `regulasi` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori_regulasi_id` bigint UNSIGNED DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_unduh` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regulasi`
--

INSERT INTO `regulasi` (`id`, `kategori_regulasi_id`, `judul`, `deskripsi`, `lampiran`, `total_unduh`, `created_at`, `updated_at`) VALUES
(1, 8, 'Sapiente aut temporibus omnis.', 'Eaque et eos vero quibusdam illo non quisquam aut. Quas saepe veritatis deleniti vero qui delectus sunt et. Eos hic rerum quis harum.', 'lampiran/dummy.pdf', 223, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(2, 15, 'Natus suscipit et et totam aperiam a ut voluptatem.', 'Ipsum doloribus voluptatibus voluptate totam et explicabo. Illo magnam consequatur quae. Voluptatem laboriosam enim reprehenderit ipsa consequatur ad.', 'lampiran/dummy.pdf', 228, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(3, 4, 'Temporibus omnis laborum et praesentium recusandae ex tempora.', 'Recusandae ea ab maxime facere eos. Libero neque nihil possimus voluptatum minus repellat molestiae. Maiores deserunt quidem suscipit ea. Totam suscipit porro dolores nulla doloribus.', 'lampiran/dummy.pdf', 267, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(4, 4, 'Enim quibusdam officiis voluptas consequatur porro qui quia quo.', 'Doloremque ut est suscipit nesciunt incidunt dolore illum. Quia rem harum ullam voluptatem magnam necessitatibus molestiae odit. Excepturi odio illum ratione laborum odio animi ut. Nisi dolor minus velit cupiditate eum in illo libero.', 'lampiran/dummy.pdf', 249, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(5, 12, 'Dolor sequi et vero dicta voluptatem saepe.', 'Blanditiis nostrum beatae mollitia ut. Accusamus ullam asperiores blanditiis dicta similique. Placeat voluptates et pariatur voluptas numquam debitis voluptates.', 'lampiran/dummy.pdf', 469, '2025-08-03 13:19:35', '2025-08-03 13:19:35'),
(6, 6, 'Quis ut quo minima natus.', 'Aut odit delectus quia iste ullam architecto. Fuga ad perferendis velit maiores consequatur itaque. Nobis blanditiis consequatur et deserunt.', 'lampiran/dummy.pdf', 265, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(7, 8, 'Voluptatem minus voluptate consectetur aut et vero id.', 'Nemo veritatis corporis voluptatum vel suscipit animi. Accusantium sunt rerum fugit qui. Qui ad aut optio eum a fugit non exercitationem. In cum maiores ipsam recusandae voluptatem.', 'lampiran/dummy.pdf', 35, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(8, 5, 'Error et dolorem voluptatem consequuntur et harum quibusdam.', 'Eveniet vitae quis soluta quia voluptas. Modi quisquam totam commodi illo. Est quia totam sit voluptatem iure natus nisi minus. Impedit ducimus ut esse.', 'lampiran/dummy.pdf', 45, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(9, 13, 'Magni autem ut temporibus.', 'Nostrum expedita aspernatur vel rem amet perferendis. Molestiae minus officiis magnam quidem hic sunt. Et omnis temporibus illo ut maxime ratione asperiores.', 'lampiran/dummy.pdf', 129, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(10, 14, 'Et voluptatem et modi reprehenderit perspiciatis.', 'Animi quidem eaque est quo non. Animi minima dolorum odio maiores reiciendis. Non incidunt vel dignissimos illo quia est. Quia et maxime molestias eos. Commodi consequatur deleniti ut nam est saepe.', 'lampiran/dummy.pdf', 189, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(11, 5, 'Debitis nam est numquam recusandae at voluptatum.', 'Facere voluptatibus aperiam iusto alias doloribus repudiandae. Ipsum provident qui ex ut. Quos nam quo incidunt consequatur.', 'lampiran/dummy.pdf', 114, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(12, 9, 'Et odio similique dolorum sed ut repellendus totam.', 'Maxime adipisci deserunt non laboriosam. Doloribus ratione voluptatem magni molestias. Quasi nobis rerum incidunt quia amet blanditiis sit. Ab unde alias quod veniam voluptas distinctio placeat aliquid.', 'lampiran/dummy.pdf', 91, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(13, 17, 'Ut soluta et dolorem amet aperiam.', 'Ut magnam dignissimos qui quia. Ut occaecati consequatur voluptas doloribus dicta expedita. Ad ad rerum expedita odit alias ratione.', 'lampiran/dummy.pdf', 39, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(14, 4, 'Labore iusto molestiae et error est ullam minus.', 'Cumque labore quos et occaecati sed eum. Eveniet nesciunt velit alias dolorum velit fuga. Quis suscipit adipisci nesciunt magni et. Impedit iusto voluptas consequatur accusamus.', 'lampiran/dummy.pdf', 125, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(15, 11, 'Dolorem recusandae dolore quas sed tenetur ullam.', 'At expedita officia consequatur vel suscipit eum culpa non. Deserunt repellendus maiores et. Quasi et exercitationem id est dolore. Sint commodi nam quos totam.', 'lampiran/dummy.pdf', 374, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(16, 2, 'Impedit velit cupiditate consequatur ducimus voluptas explicabo.', 'Nihil vel voluptatem tempora ab. Harum consequatur ex et minima est possimus.', 'lampiran/dummy.pdf', 82, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(17, 7, 'Iusto animi dolor molestiae qui qui eum.', 'Non voluptate provident nulla et fugit. Corrupti exercitationem iusto illum numquam. Quam maiores alias quibusdam aut quos totam quia. Hic itaque aut numquam libero voluptatem vero et.', 'lampiran/dummy.pdf', 409, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(18, 8, 'Doloribus et saepe assumenda totam aperiam.', 'Praesentium quam enim delectus aliquam dolores perspiciatis. Enim placeat unde molestiae et. Excepturi dolore officiis reiciendis omnis optio repellendus. Vel harum nihil et vel. Velit iusto ea dicta.', 'lampiran/dummy.pdf', 404, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(19, 14, 'Quo ducimus doloribus et odit enim voluptate sit consectetur.', 'Laboriosam velit nam nihil omnis quasi ea et. Distinctio rerum maiores asperiores nesciunt nemo esse. Et nisi sed deleniti quia incidunt esse. Eveniet soluta sit maxime amet.', 'lampiran/dummy.pdf', 232, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(20, 12, 'Aut quasi in inventore illum ut quis nihil molestias.', 'Laborum rerum provident esse ipsum libero iste qui. Veniam est quidem aperiam. Dolorem quos voluptatibus quasi temporibus.', 'lampiran/dummy.pdf', 165, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(21, 6, 'Architecto voluptate dolor molestiae in corporis eaque voluptatum.', 'Officiis libero velit error autem. In odio aut natus. Occaecati vitae consequatur id commodi. Dolores sunt qui est ducimus harum sed.', 'lampiran/dummy.pdf', 360, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(22, 10, 'Ut adipisci est asperiores sunt qui.', 'Cumque quo iste optio commodi libero eum vel veritatis. Qui nobis placeat dolorem pariatur unde et. Aspernatur iure ut voluptate iste voluptas aut aut dolores. Molestiae molestias enim quos adipisci dolor.', 'lampiran/dummy.pdf', 103, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(23, 5, 'Qui ipsa eveniet dicta et eum et veritatis.', 'Ut debitis mollitia in. Explicabo dolorem totam illum voluptatem maxime voluptatem soluta. Et provident deleniti sed corporis asperiores vel.', 'lampiran/dummy.pdf', 255, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(24, 8, 'Est commodi ex eos voluptas.', 'Dolorem recusandae ratione unde ut ut et. Dicta at illo aperiam dignissimos necessitatibus.', 'lampiran/dummy.pdf', 449, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(25, 13, 'Natus ut ex nobis sunt voluptatem aut.', 'Incidunt qui eos quasi dolorum similique dolorum. Minus laboriosam at et soluta veritatis consequatur sint. Ipsum deserunt nostrum voluptatem ipsum eius. Nihil magni assumenda corrupti ex amet consequatur dolore. Porro voluptatem commodi rerum quas.', 'lampiran/dummy.pdf', 85, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(26, 12, 'Voluptatibus quod possimus fugiat voluptatem tempora omnis.', 'Quod optio esse ducimus et modi ut eum. Repellendus sit dolore officiis voluptate. Voluptate vero aut beatae doloribus et vitae quis.', 'lampiran/dummy.pdf', 201, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(27, 17, 'Possimus dolorum ut perspiciatis rerum voluptatum rerum sequi.', 'Commodi eaque aperiam exercitationem tempora iusto fugiat. Quam ea quam sit deleniti veritatis. Aut dolores aut eos ipsa numquam totam distinctio. Quos quia praesentium odit vero ipsum fugiat autem.', 'lampiran/dummy.pdf', 305, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(28, 4, 'Et labore occaecati aperiam nihil.', 'Voluptatibus soluta molestiae unde rerum amet assumenda ut. Dolores quos quaerat nemo culpa iure eveniet modi. Accusamus tempore voluptatem aut vitae quidem rem.', 'lampiran/dummy.pdf', 364, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(29, 2, 'Natus excepturi voluptatum ea id qui vel aut.', 'Minus quidem dignissimos eum omnis magni sed. Nostrum error eius iure. Dolorem fuga illo neque ea dolorem et rerum sunt.', 'lampiran/dummy.pdf', 249, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(30, 7, 'Hic ab ea dolor consequuntur molestiae.', 'Ab deserunt qui voluptate quae. Ipsa sit reiciendis veritatis optio aut ut. Itaque deleniti a nulla libero nostrum modi.', 'lampiran/dummy.pdf', 231, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(31, 9, 'Vel consequatur dolorem adipisci sapiente nostrum.', 'Consectetur quibusdam distinctio quia voluptatum sed velit. Voluptate enim quia ea explicabo ut quia quo. Beatae ea illum quibusdam est sint quis vel. Omnis molestiae quod ut et hic. Vitae dolore dolores voluptatem similique animi asperiores.', 'lampiran/dummy.pdf', 352, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(32, 4, 'Magnam dolor qui sed ea.', 'In facere nisi porro veniam. Esse maxime qui qui ut ipsa nihil aperiam. Quia praesentium optio qui excepturi perspiciatis.', 'lampiran/dummy.pdf', 393, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(33, 8, 'Veniam asperiores praesentium quo illum tenetur nemo.', 'Voluptate et qui consequatur provident. Doloremque cum incidunt minima nam dolor corrupti ullam. Nihil facere nihil eum blanditiis laudantium. Corporis quo at quibusdam vero ut suscipit.', 'lampiran/dummy.pdf', 428, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(34, 14, 'Rem laudantium maiores delectus libero et mollitia.', 'Dolorem illum vero perspiciatis. Quod voluptates nobis iusto voluptates commodi. Quibusdam inventore libero quia voluptatem et iste ex. Quia repudiandae iste maxime voluptatum.', 'lampiran/dummy.pdf', 375, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(35, 9, 'Ullam rerum labore aut dolorum odio.', 'Alias quia non reiciendis dolor deleniti est. Vel enim dignissimos doloremque similique natus.', 'lampiran/dummy.pdf', 442, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(36, 2, 'Voluptatem aut aliquam quae quisquam dolorum ut totam.', 'In esse explicabo eos omnis corrupti illo eum. Consequuntur ut molestiae quibusdam ut sit omnis consequuntur. Et quas rerum tenetur accusamus sit molestiae possimus et. Doloremque sit numquam sit ut quis.', 'lampiran/dummy.pdf', 106, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(37, 16, 'Delectus occaecati aut voluptatibus sed ut expedita.', 'Et blanditiis rerum itaque maxime. Reiciendis mollitia sunt dignissimos ab nostrum. Accusamus nihil aliquid qui dolor. Deleniti id non error ea atque quaerat.', 'lampiran/dummy.pdf', 338, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(38, 1, 'Sit exercitationem aliquid quasi.', 'Inventore error magnam voluptatem alias quia perferendis. Tenetur cumque ducimus repellendus aut esse magnam blanditiis. Est aliquam quia et. Enim fugiat sunt dolores repellat vitae.', 'lampiran/dummy.pdf', 276, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(39, 10, 'Itaque modi maxime eius aut qui.', 'Quo beatae officiis dolorum dolor dolorum vel. Ad nulla rerum nobis. Sapiente qui consequatur ex sunt veritatis fugiat explicabo aspernatur. Vero consectetur repudiandae repudiandae autem dicta et consequatur.', 'lampiran/dummy.pdf', 307, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(40, 6, 'Blanditiis dolores dignissimos harum quia sunt delectus libero.', 'Consectetur quia reprehenderit velit accusantium. Excepturi atque et tenetur eum repellendus est. Odit ut et iure dolor facere ut.', 'lampiran/dummy.pdf', 68, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(41, 14, 'Sunt quam rem distinctio dolorum magnam.', 'Dolor omnis qui odit alias est voluptas dolorem et. Odit officiis necessitatibus illo aut veniam excepturi et. Autem eligendi sit corrupti voluptate et et temporibus. Quos nesciunt ex enim non sit.', 'lampiran/dummy.pdf', 220, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(42, 7, 'Ut sapiente alias dolorem sint accusamus.', 'Rerum ipsum fugiat et iusto aut. Explicabo mollitia voluptatem ut non saepe earum maiores. Voluptatem odio voluptatibus dolor et. Corporis ut sit doloremque commodi mollitia blanditiis blanditiis a.', 'lampiran/dummy.pdf', 405, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(43, 15, 'Voluptas ut ut quidem nam.', 'Dignissimos at deserunt qui qui delectus assumenda ullam voluptas. Vitae magnam aut laudantium. Est amet magnam et autem at perspiciatis delectus.', 'lampiran/dummy.pdf', 122, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(44, 17, 'Corrupti ipsa quisquam modi ullam.', 'Rem sunt aut velit dolorum est aut et ratione. Nihil accusamus sunt enim magni adipisci. Adipisci totam incidunt praesentium expedita dolorum et. Aut animi nulla tempora inventore.', 'lampiran/dummy.pdf', 84, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(45, 2, 'Quia eum distinctio et maiores adipisci praesentium delectus.', 'Voluptatum laboriosam incidunt ducimus animi ut repellendus eligendi. Omnis rerum voluptates sunt nemo. Aut nobis quibusdam officiis laboriosam voluptatem ut. Omnis soluta a ipsa esse saepe et corrupti.', 'lampiran/dummy.pdf', 169, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(46, 16, 'Illo deserunt debitis ad asperiores quasi.', 'Maxime quam deleniti sapiente magnam sed. Est rerum est quia totam velit at omnis. Praesentium a at ut fuga repellat delectus iure.', 'lampiran/dummy.pdf', 277, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(47, 3, 'Quibusdam consequatur saepe et quae.', 'Sit est consequuntur eum autem quia corrupti. Eaque praesentium quos iusto voluptas officiis. Quia ad quis laborum voluptatem.', 'lampiran/dummy.pdf', 341, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(48, 13, 'Nam temporibus quis tempora exercitationem omnis.', 'Quam molestiae est nisi voluptatem unde. Expedita similique voluptate non et odit fugit est. Ipsum nostrum voluptas molestias labore consequatur.', 'lampiran/dummy.pdf', 229, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(49, 6, 'Repudiandae ducimus eos sit praesentium.', 'Veniam aut consequatur laboriosam totam velit quaerat. Ex error velit et aut. Saepe vitae commodi aspernatur consequatur.', 'lampiran/dummy.pdf', 281, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(50, 5, 'Occaecati voluptatem non ullam repellendus aut recusandae.', 'Aut quae quibusdam soluta consequatur. Vero ipsam sed voluptas maiores ab autem maxime. Iusto veniam vel id iste voluptas ex fuga. Reprehenderit asperiores et quo exercitationem ut aut sint.', 'lampiran/dummy.pdf', 473, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(51, 8, 'Eum in repellendus perferendis minima eaque ratione.', 'Et alias voluptas eum voluptatibus odit non. Voluptatum exercitationem officia placeat nisi incidunt vel. Et repudiandae harum vitae quae odio hic nihil.', 'lampiran/dummy.pdf', 412, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(52, 10, 'Beatae adipisci et voluptatem ipsa facilis.', 'Qui qui accusantium quo facere delectus in. In itaque nobis totam sunt non.', 'lampiran/dummy.pdf', 281, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(53, 6, 'Rerum ea quisquam ducimus omnis ut dicta voluptatem.', 'Quis provident aut quis fugiat dolores omnis ut. Nisi sed qui laudantium. Similique et voluptas et voluptatem harum nihil. Laudantium aperiam nobis ipsa consequatur distinctio et.', 'lampiran/dummy.pdf', 439, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(54, 17, 'Esse itaque tenetur ullam veritatis.', 'Molestias minus ut asperiores provident in. Similique ad qui sequi enim itaque rerum dolorem. Sint porro qui unde omnis officia aspernatur.', 'lampiran/dummy.pdf', 266, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(55, 12, 'Est nobis pariatur dolorem maxime ea.', 'Pariatur exercitationem deserunt et libero error soluta aut quo. Autem similique facilis non placeat quod. Sequi ut fuga corrupti qui suscipit voluptatem et.', 'lampiran/dummy.pdf', 468, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(56, 5, 'Qui modi rem aut et labore ut velit.', 'Exercitationem et et non nihil. Et maiores doloribus excepturi accusantium iure optio. Dolor non culpa aut non sint. Id ad repellat sed qui nostrum quo.', 'lampiran/dummy.pdf', 253, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(57, 2, 'Animi omnis ea minus amet ab autem eius sit.', 'Dignissimos ex eum est. Unde odit consectetur rerum aspernatur aliquam mollitia. Optio animi numquam veniam sit neque.', 'lampiran/dummy.pdf', 47, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(58, 6, 'Rem necessitatibus enim est laboriosam ab dignissimos.', 'Sit dignissimos molestias eum voluptate. Quia rem assumenda minus incidunt itaque at. Aut voluptatem odit et et veritatis minima veritatis voluptatem. Vel consequatur delectus recusandae sed porro voluptatem dignissimos veniam.', 'lampiran/dummy.pdf', 193, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(59, 11, 'Et sed cumque odio commodi.', 'Quam voluptatem ipsa ut possimus iste magni. Et perferendis saepe doloremque eos quo. Dolorem nulla in excepturi sint voluptas.', 'lampiran/dummy.pdf', 121, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(60, 17, 'Animi doloribus iusto ut excepturi aut sit vero.', 'Qui impedit vitae fugit ullam optio. Aspernatur dolore vitae quam voluptatem et. Veniam sed aut quasi saepe. Libero ea facilis facere similique. Eos enim minima incidunt itaque.', 'lampiran/dummy.pdf', 72, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(61, 1, 'Ducimus adipisci et hic aut.', 'Ut in rerum quam velit et. Animi dolorum neque est expedita. Aut corporis ratione pariatur rem repellat porro in. Quis laudantium esse et nihil.', 'lampiran/dummy.pdf', 41, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(62, 15, 'Illo ipsa est eveniet est modi non neque.', 'Et adipisci aut necessitatibus corrupti quo. Possimus voluptas corrupti accusantium est laboriosam.', 'lampiran/dummy.pdf', 86, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(63, 6, 'Vel facilis omnis quia et.', 'Eum eos sit et saepe libero hic aspernatur. Ex neque recusandae rerum non quidem. Et alias rerum aut illum. Qui deleniti debitis voluptatem nobis incidunt aut non.', 'lampiran/dummy.pdf', 453, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(64, 10, 'Enim laboriosam molestiae placeat cumque dignissimos neque.', 'Ipsum neque eius saepe omnis soluta iusto sint odit. Rem placeat consequatur suscipit voluptatem fuga. Aut minus amet culpa debitis exercitationem quis.', 'lampiran/dummy.pdf', 348, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(65, 13, 'Velit necessitatibus dolorem dignissimos ullam dolorem in veritatis quis.', 'Quia nihil quibusdam dolores dolores officiis. Dolores temporibus ipsum doloribus est corrupti exercitationem maiores. Cum incidunt ab at consequatur inventore sit. Molestias esse iste dignissimos minus accusantium maxime.', 'lampiran/dummy.pdf', 103, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(66, 16, 'Minus sit voluptas quam.', 'Ut culpa consequuntur provident ut amet dolores aut. Modi unde et quia culpa iure corrupti dolore. Aut provident eius eaque aspernatur molestiae. Doloremque eum sit sit recusandae officia.', 'lampiran/dummy.pdf', 272, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(67, 11, 'Voluptatum quidem ullam esse eveniet omnis voluptatem.', 'Sed minima dolor culpa in ut voluptatem. Debitis omnis officiis voluptatem iste. Odit sed culpa ea dignissimos sed neque. Ex optio qui et vero totam et repellendus.', 'lampiran/dummy.pdf', 200, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(68, 16, 'Aut qui nobis quis incidunt molestias dolor beatae.', 'Vitae fugit odio sit nam tempora est eveniet quia. In eligendi quae nulla repellendus magnam. Deleniti sequi dignissimos at blanditiis libero. Laudantium quia sunt vero in voluptatem rerum.', 'lampiran/dummy.pdf', 365, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(69, 14, 'Dignissimos et inventore asperiores ut.', 'Et tenetur ex illum deleniti qui eveniet sit. Dolor beatae maxime et laboriosam. Numquam quam nisi sed vel corporis. Sequi reiciendis asperiores quas ea nesciunt.', 'lampiran/dummy.pdf', 296, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(70, 11, 'Ut modi non fugit consectetur et minus quae.', 'Dignissimos nemo repellendus rerum repellendus. Debitis veritatis aperiam accusamus beatae distinctio. Odit repudiandae repellat et quisquam quam itaque. Odit ullam accusantium earum ea perferendis.', 'lampiran/dummy.pdf', 465, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(71, 6, 'Est saepe consequatur maxime in quod sapiente neque.', 'Dolorem enim illo assumenda non. Qui ducimus cupiditate odit. Voluptates excepturi velit enim ut.', 'lampiran/dummy.pdf', 56, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(72, 11, 'Et deleniti in error qui aut pariatur.', 'Quod voluptates aut et omnis quasi enim dolores atque. Dolorem culpa voluptas sapiente sint qui iure quod. Officiis dolorum asperiores earum animi voluptatem hic quas.', 'lampiran/dummy.pdf', 3, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(73, 9, 'Consequatur tempora est ipsum rerum ex ipsum quisquam.', 'Enim eius voluptas voluptatem enim necessitatibus odio facilis. Aut aperiam adipisci quis officiis. Quaerat aut voluptate natus dolore esse animi iste. Repellat et earum voluptate velit esse.', 'lampiran/dummy.pdf', 445, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(74, 8, 'Exercitationem et dolorem error culpa aut minima.', 'Provident aliquid vel maxime ducimus similique. Est vitae quod in. Aut expedita ut ad ea repellendus. Sit numquam laudantium aut autem inventore repellendus voluptatum. Architecto exercitationem at praesentium dolore accusantium veritatis.', 'lampiran/dummy.pdf', 431, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(75, 12, 'Rerum quos sed minima.', 'Voluptas odio rerum laudantium. Aut numquam exercitationem fugit. Voluptas autem quia est non.', 'lampiran/dummy.pdf', 454, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(76, 3, 'Rerum eos eveniet aut vero.', 'Nobis iure officiis nesciunt maiores consectetur. Est omnis ad maxime quos. Distinctio quis quibusdam corporis mollitia omnis.', 'lampiran/dummy.pdf', 282, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(77, 15, 'Et voluptatum esse temporibus laborum ad sint eius quia.', 'Necessitatibus facere et qui hic quia. Rerum sequi nam laboriosam molestiae asperiores ut. Beatae corrupti eveniet quia odio sed quis ad corporis. Aperiam aut nesciunt eum omnis aliquam autem repellendus.', 'lampiran/dummy.pdf', 140, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(78, 16, 'Consequatur blanditiis voluptatem aperiam non nihil sed.', 'Itaque consequatur veritatis repellendus fugiat. Perferendis nobis et sequi fugiat eos hic sed.', 'lampiran/dummy.pdf', 17, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(79, 15, 'Et et tempora magnam molestias ad laudantium.', 'Dolores expedita odio qui quod tempore voluptatem. Adipisci natus laborum voluptatem facilis pariatur tempore.', 'lampiran/dummy.pdf', 108, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(80, 4, 'Alias reiciendis quas omnis molestiae ipsam exercitationem.', 'Est aliquam ducimus qui eos ab. Beatae sit voluptas excepturi nobis est quis quasi. Aut et in quam dolores. Voluptatem est culpa rerum amet laboriosam dolores.', 'lampiran/dummy.pdf', 368, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(81, 16, 'Inventore ut voluptatum minima.', 'Quia consectetur excepturi est quia voluptas unde unde. Omnis soluta reiciendis ut eaque et minus enim. Blanditiis ea quia deleniti ea. Pariatur ut nam et cum quae eligendi. Ad quos aut dolorem necessitatibus.', 'lampiran/dummy.pdf', 144, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(82, 4, 'Perspiciatis nemo sapiente quidem molestiae.', 'Qui ipsum aliquid quibusdam excepturi quia. Id expedita libero numquam sunt minima. Ut officiis cupiditate non qui aliquam exercitationem. Qui pariatur ab dolorem nesciunt.', 'lampiran/dummy.pdf', 472, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(83, 16, 'Earum omnis qui in molestiae architecto exercitationem.', 'Ex placeat consequatur id quidem repudiandae. Magnam numquam dolor quam autem voluptates. Nostrum occaecati velit illum expedita quisquam. Et accusantium facere atque laudantium. Nulla et quaerat consectetur est quos blanditiis eos.', 'lampiran/dummy.pdf', 223, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(84, 17, 'Omnis provident aperiam ducimus est necessitatibus ut excepturi.', 'Ullam quo soluta ex officiis id enim earum. Nihil aut consectetur quia repellat ut voluptatem consequatur. Eum et et aperiam repudiandae dicta et.', 'lampiran/dummy.pdf', 239, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(85, 6, 'Consequatur molestiae ut unde non expedita inventore harum ipsum.', 'Id voluptas odio aut hic ut eos nihil. Nulla qui facilis ut odit optio. In nisi aut asperiores inventore sit illo.', 'lampiran/dummy.pdf', 490, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(86, 3, 'Nam exercitationem sit laboriosam dolor.', 'Fugiat sunt nulla veniam qui earum fuga. Vitae in ut error. Occaecati molestiae eos inventore occaecati ut rem. Delectus aut qui deserunt quisquam omnis. Veritatis eligendi cum quo consequatur.', 'lampiran/dummy.pdf', 373, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(87, 8, 'Nam voluptatem atque est quisquam id.', 'Fugiat debitis asperiores ab autem ut. Consequuntur ex voluptate laboriosam dolorem maiores omnis est. Rem officiis quis magni aut libero qui. Sed magni inventore in sunt tenetur vel eos.', 'lampiran/dummy.pdf', 429, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(88, 12, 'Et minima sed rerum distinctio.', 'Officiis aut nobis ullam esse. Ducimus recusandae ipsa quia qui cupiditate. Provident nulla qui qui voluptatem.', 'lampiran/dummy.pdf', 466, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(89, 15, 'Voluptatem optio voluptatibus est vero omnis commodi.', 'Expedita sint porro pariatur vel. Enim non adipisci temporibus corrupti minus explicabo hic.', 'lampiran/dummy.pdf', 462, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(90, 11, 'Error ex dolorum et.', 'Assumenda laudantium officia sint ad quaerat. Blanditiis eius ipsa cum. Quia minima nihil aut.', 'lampiran/dummy.pdf', 325, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(91, 1, 'Ipsam labore sit et ab cum rem debitis.', 'Ab aliquam suscipit quis ut et sint. Quis enim recusandae voluptatum. Perferendis ducimus at quas id quo culpa. Dolor dolor laborum dolor esse.', 'lampiran/dummy.pdf', 186, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(92, 1, 'Dolorum quisquam tempora debitis reprehenderit ut.', 'Voluptatem porro totam dolorem vel eius odio earum. Pariatur distinctio alias velit optio praesentium debitis minima. Consequuntur sint velit eius tempore harum harum autem. Quis ea commodi et placeat assumenda.', 'lampiran/dummy.pdf', 493, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(93, 13, 'Ut maxime ut voluptates atque.', 'Nisi ut nobis ipsam odio hic. Culpa excepturi ut dolorum animi qui.', 'lampiran/dummy.pdf', 305, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(94, 11, 'Sit perferendis asperiores perferendis totam asperiores accusamus enim accusantium.', 'Deserunt deserunt earum omnis non consequuntur. Occaecati sunt dicta distinctio veritatis doloribus placeat dolorem vero. Placeat doloremque voluptatem et saepe.', 'lampiran/dummy.pdf', 420, '2025-08-03 13:19:36', '2025-08-03 13:19:36'),
(95, 8, 'Surat Kepala BKN Nomor 7902/B-AK.03/SD/K/2025', 'Keikutsertaan Pejabat di Lingkungan BKN sebagai Panitia Seleksi Jabatan Pimpinan Tinggi.', 'lampiran/dummy.pdf', 44, '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(96, 10, 'Surat Edaran Kepala BKN Nomor 4 Tahun 2025', 'Pedoman akreditasi penyelenggaraan penilaian kompetensi ASN.', 'lampiran/dummy.pdf', 81, '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(97, 14, 'Peraturan BKN Nomor 2 Tahun 2025', 'Kenaikan pangkat reguler pegawai negeri sipil.', 'lampiran/dummy.pdf', 7, '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(98, 13, 'Surat Deputi BKN Nomor 7199/B-KS.04.01/SD/E/2025', 'Penyesuaian jadwal seleksi pengadaan PPPK TA 2024 Tahap II.', 'lampiran/dummy.pdf', 5, '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(99, 12, 'Surat Kepala BKN Nomor 7909/B-KS.04.01/SD/K/2025', 'Jadwal seleksi penerimaan Sekolah Kedinasan Tahun 2025.', 'lampiran/dummy.pdf', 100, '2025-08-03 13:19:37', '2025-08-04 05:50:05'),
(100, 9, 'Surat Deputi BKN Nomor 6496/B-MP.03.01/SD/D/2025', 'Pemanfaatan Aplikasi SIASN untuk Layanan Pengangkatan CPNS.', 'lampiran/dummy.pdf', 167, '2025-08-03 13:19:37', '2025-08-03 13:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Y04KpYGmzJQ2j94d2KathtKvCtJyDqqB7awjrdV7', NULL, '172.21.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHF3MmtrQ0ZRS3lwTFFCWE5GSks5Zld6U2R5MUlaejIzemNsVWNYMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwOS9yZWd1bGFzaS85OS9kb3dubG9hZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1754289958),
('ZwjAorSJeKjrCZPeoe0aEzlWg8irsMD2YhDrGpTA', 1, '172.21.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWjVvNjQ2ZmV4WWJGb3ZOdVRCWmRYODF4d05UblM2U1VhSXV1aVU4ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwOS9kYXNoYm9hcmQvc2xpZGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1754287224);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'slider/1.jpg', '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(2, 'slider/2.jpg', '2025-08-03 13:19:34', '2025-08-03 13:19:34'),
(3, 'slider/3.jpg', '2025-08-03 13:19:34', '2025-08-03 13:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `statistik_asn`
--

CREATE TABLE `statistik_asn` (
  `id` bigint UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statistik_asn`
--

INSERT INTO `statistik_asn` (`id`, `label`, `value`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tanggal Update', '2025-06-31', 'tanggal_update', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(2, 'PNS', '5451', 'pns', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(3, 'Laki - Laki', '1987', 'pns_l', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(4, 'Perempuan', '3464', 'pns_p', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(5, 'PPPK', '2293', 'pppk', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(6, 'Laki - Laki', '448', 'pppk_l', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(7, 'Perempuan', '1845', 'pppk_p', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(8, 'SD', '5', 'pns_sd', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(9, 'SMP', '6', 'pns_smp', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(10, 'SMA/SMK', '419', 'pns_sma_smk', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(11, 'D1', '5', 'pns_d1', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(12, 'D2', '69', 'pns_d2', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(13, 'D3', '353', 'pns_d3', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(14, 'S1/D4', '3688', 'pns_s1_d4', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(15, 'S2', '892', 'pns_s2', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(16, 'S3', '14', 'pns_s3', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(17, 'SLTP', '8', 'pppk_sltp', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(18, 'SMA/SMK', '124', 'pppk_sma_smk', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(19, 'D3', '591', 'pppk_d3', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(20, 'S1/D4', '1369', 'pppk_s1_d4', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(21, 'S2', '201', 'pppk_s2', '2025-08-03 13:19:37', '2025-08-03 13:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `unit_organisasi`
--

CREATE TABLE `unit_organisasi` (
  `id` bigint UNSIGNED NOT NULL,
  `bagian_id` bigint UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_organisasi`
--

INSERT INTO `unit_organisasi` (`id`, `bagian_id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 2, 'SUB BAGIAN KEUANGAN DAN PELAPORAN', 'sub-bagian-keuangan-dan-pelaporan', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(2, 3, 'SUB PENILAIAN & EVALUASI KINERJA APARATUR II', 'sub-penilaian-evaluasi-kinerja-aparatur-ii', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(3, 4, 'SUB BIDANG PENGEMBANGAN KARIR & PROMOSI JABATAN', 'sub-bidang-pengembangan-karir-promosi-jabatan', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(4, 5, 'SUB BIDANG PENGADAAN DAN PEMBERHENTIAN', 'sub-bidang-pengadaan-dan-pemberhentian', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(5, 2, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA', 'badan-kepegawaian-dan-pengembangan-sumber-daya-manusia', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(6, 6, 'SUB BIDANG PENJENJANGAN DAN SERTIFIKASI', 'sub-bidang-penjenjangan-dan-sertifikasi', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(7, 4, 'SUB BIDANG KEPANGKATAN', 'sub-bidang-kepangkatan', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(8, 3, 'SUB BIDANG DISIPLIN DAN PENGHARGAAN', 'sub-bidang-disiplin-dan-penghargaan', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(9, 2, 'SUB BAGIAN UMUM DAN KEPEGAWAIAN', 'sub-bagian-umum-dan-kepegawaian', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(10, 4, 'SUB BIDANG MUTASI', 'sub-bidang-mutasi', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(11, 5, 'SUB BIDANG DATA DAN INFORMASI', 'sub-bidang-data-dan-informasi', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(12, 5, 'SUB BIDANG FASILITASI PROFESI ASN', 'sub-bidang-fasilitasi-profesi-asn', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(13, 5, 'BIDANG PENGADAAN, PEMBERHENTIAN DAN INFORMASI', 'bidang-pengadaan-pemberhentian-dan-informasi', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(14, 2, 'SUB BAGIAN PERENCANAAN', 'sub-bagian-perencanaan', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(15, 3, 'BIDANG PENILAIAN KINERJA APARATUR & PENGHARGAAN', 'bidang-penilaian-kinerja-aparatur-penghargaan', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(16, 4, 'BIDANG MUTASI DAN PROMOSI', 'bidang-mutasi-dan-promosi', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(17, 6, 'BIDANG PENGEMBANGAN KOMPETENSI APARATUR', 'bidang-pengembangan-kompetensi-aparatur', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(18, 6, 'SUB BIDANG PENGEMBANGAN KOMPETENSI', 'sub-bidang-pengembangan-kompetensi', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(19, 6, 'SUB BIDANG DIKLAT TEKNIS FUNGSIONAL', 'sub-bidang-diklat-teknis-fungsional', '2025-08-03 13:19:33', '2025-08-03 13:19:33'),
(20, 3, 'SUB BIDANG PENILAIAN & EVALUASI KINERJA APARATUR I', 'sub-bidang-penilaian-evaluasi-kinerja-aparatur-i', '2025-08-03 13:19:33', '2025-08-03 13:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'bkpsdm.kendarikota@gmail.com', 'admin', NULL, '$2y$12$ZuR7hdsAyZoBuXywo9SY9OSQlHADwPZsFBGKFwfuXRmrv76b0v4ie', NULL, '2025-08-03 13:19:33', '2025-08-04 03:35:05'),
(2, 'Ilmi Faizan', 'icang02', 'ilmifaizan1112@gmail.com', 'pengelola-konten', NULL, '$2y$12$Gg8NVJh9nKOSLESM2DR1MOz3DYtv4hrRu6kHx0wU.v/hK6LZmZXN.', NULL, '2025-08-04 03:50:52', '2025-08-04 03:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `judul`, `tanggal`, `deskripsi`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Pelatihan Dasar CPNS Angkatan I', '2025-01-10', 'Pelatihan dasar CPNS untuk membentuk ASN profesional.', 'https://www.youtube.com/watch?v=pZuEnyetmHw', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(2, 'Sosialisasi Perubahan Sistem E-Kinerja', '2025-01-25', 'BKPSDM menyosialisasikan perubahan terbaru dalam sistem E-Kinerja ASN.', 'https://www.youtube.com/watch?v=UqhREcfQNHA', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(3, 'Penyerahan SK PPPK Tahap I Kota Kendari', '2025-02-12', 'Wali Kota menyerahkan SK PPPK kepada peserta terpilih.', 'https://www.youtube.com/watch?v=KSWtCnlSzQA', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(4, 'Upacara Hari Kesadaran Nasional', '2025-02-17', 'BKPSDM memimpin pelaksanaan upacara Hari Kesadaran Nasional di halaman kantor.', 'https://www.youtube.com/watch?v=_V9Qc-gn2CE&pp=0gcJCccJAYcqIYzv', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(5, 'Simulasi Ujian CAT CPNS', '2025-03-01', 'Simulasi sistem CAT untuk persiapan tes CPNS.', 'https://www.youtube.com/watch?v=S-Ypl-hXKyQ', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(6, 'Peringatan Hari ASN Nasional', '2025-03-17', 'Peringatan Hari ASN dengan pemutaran video dedikasi ASN.', 'https://www.youtube.com/watch?v=O3_xBBAJ400', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(7, 'Bimbingan Teknis Penyusunan SKP', '2025-04-04', 'Bimtek bagi ASN untuk penyusunan SKP berbasis SMART.', 'https://www.youtube.com/watch?v=S-Ypl-hXKyQ', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(8, 'Talkshow Reformasi Birokrasi', '2025-04-15', 'Talkshow seputar strategi implementasi reformasi birokrasi di OPD.', 'https://www.youtube.com/watch?v=_V9Qc-gn2CE&pp=0gcJCccJAYcqIYzv', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(9, 'Training Service Excellent ASN', '2025-05-05', 'Pelatihan pelayanan prima bagi ASN Kota Kendari.', 'https://www.youtube.com/watch?v=S-Ypl-hXKyQ', '2025-08-03 13:19:37', '2025-08-03 13:19:37'),
(10, 'Video Dokumentasi HUT BKPSDM ke-18', '2025-07-01', 'Dokumentasi kegiatan ulang tahun BKPSDM ke-18.', 'https://www.youtube.com/watch?v=_V9Qc-gn2CE&pp=0gcJCccJAYcqIYzv', '2025-08-03 13:19:37', '2025-08-03 13:19:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jabatan_unit_organisasi_id_foreign` (`unit_organisasi_id`);

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
-- Indexes for table `kategori_regulasi`
--
ALTER TABLE `kategori_regulasi`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pejabat_jabatan_id_foreign` (`jabatan_id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regulasi`
--
ALTER TABLE `regulasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regulasi_kategori_regulasi_id_foreign` (`kategori_regulasi_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistik_asn`
--
ALTER TABLE `statistik_asn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_organisasi`
--
ALTER TABLE `unit_organisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_organisasi_bagian_id_foreign` (`bagian_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_regulasi`
--
ALTER TABLE `kategori_regulasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `regulasi`
--
ALTER TABLE `regulasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statistik_asn`
--
ALTER TABLE `statistik_asn`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `unit_organisasi`
--
ALTER TABLE `unit_organisasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_unit_organisasi_id_foreign` FOREIGN KEY (`unit_organisasi_id`) REFERENCES `unit_organisasi` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pejabat`
--
ALTER TABLE `pejabat`
  ADD CONSTRAINT `pejabat_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `regulasi`
--
ALTER TABLE `regulasi`
  ADD CONSTRAINT `regulasi_kategori_regulasi_id_foreign` FOREIGN KEY (`kategori_regulasi_id`) REFERENCES `kategori_regulasi` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `unit_organisasi`
--
ALTER TABLE `unit_organisasi`
  ADD CONSTRAINT `unit_organisasi_bagian_id_foreign` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
