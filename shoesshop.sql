-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 07, 2020 lúc 07:26 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoesshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(150, '2014_10_12_000000_create_users_table', 1),
(151, '2014_10_12_100000_create_password_resets_table', 1),
(152, '2019_08_19_000000_create_failed_jobs_table', 1),
(153, '2020_01_31_034432_create_products_table', 1),
(154, '2020_01_31_034518_create_orders_table', 1),
(155, '2020_01_31_034545_create_profiles_table', 1),
(156, '2020_01_31_034558_create_categories_table', 1),
(157, '2020_01_31_034616_create_tags_table', 1),
(158, '2020_01_31_034640_create_comments_table', 1),
(159, '2020_01_31_035346_create_order_items_table', 1),
(160, '2020_01_31_035401_create_images_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `custom_id` int(10) UNSIGNED NOT NULL,
  `order_status` int(10) UNSIGNED NOT NULL,
  `order_date` timestamp NULL DEFAULT NULL,
  `shipped_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quality` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `excerpt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` decimal(2,1) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `price`, `excerpt`, `star`, `stock`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Nesciunt similique quibusdam recusandae optio vel sed officia.', 'nesciunt-similique-quibusdam-recusandae-optio-vel-sed-officia', 'Molestiae dolor libero exercitationem debitis maiores quia. Est eos hic assumenda tempore quia. Culpa quia corporis doloremque fuga quasi. Tenetur consequuntur sunt eos expedita dolor voluptatibus iure. Totam dicta ducimus voluptas possimus fugiat laudantium. Ut omnis ab quo rerum voluptas qui. Nisi eos harum ut et ab.', '619.00', 'Nesciunt.', '4.3', 946, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(2, 'Dolorem rerum ipsa dolor unde voluptate sint.', 'dolorem-rerum-ipsa-dolor-unde-voluptate-sint', 'Laborum excepturi rerum veniam incidunt accusantium dolores. Et ducimus eaque quia id delectus ut qui nulla. Possimus et delectus enim ratione provident voluptas placeat numquam. Beatae cum voluptate sed necessitatibus vero repudiandae natus. Doloribus possimus repellat nostrum dolor.', '795.00', 'Animi.', '0.5', 340, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(3, 'Praesentium rerum et laudantium est qui.', 'praesentium-rerum-et-laudantium-est-qui', 'Quo adipisci odio eum laboriosam dolorem voluptatum. Perspiciatis qui et eos reprehenderit. Ullam ut aspernatur qui quia quasi blanditiis et. Sunt explicabo adipisci quia aliquam. Vero voluptates quo facere eum debitis et atque dolores.', '385.00', 'Perspiciatis.', '1.9', 362, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(4, 'Sit consequuntur iure libero officiis.', 'sit-consequuntur-iure-libero-officiis', 'Iusto eum non perspiciatis est et quis repellendus. Fugit distinctio dolores quam dicta exercitationem. Voluptatum deleniti ut iste distinctio ipsam non laboriosam. Totam deleniti eligendi est consequatur ad in suscipit corporis. Facilis eos molestiae eligendi cumque eum. Nesciunt excepturi necessitatibus debitis laudantium.', '678.00', 'Temporibus dolor.', '3.5', 827, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(5, 'Et doloremque quas ut doloremque ipsum iusto.', 'et-doloremque-quas-ut-doloremque-ipsum-iusto', 'Dignissimos tempore quia nobis eius dolore inventore. Unde voluptas ut voluptatibus facilis magni molestiae. Nam sint voluptatum dolores et. Repudiandae provident totam nemo quo expedita est. Nam nobis maxime est amet aut. Aut labore facilis facilis harum eos. Facere qui autem vero consequatur. Dignissimos dignissimos et nostrum et enim fugit perferendis. Laudantium numquam eveniet quo esse eum.', '138.00', 'Odit corporis.', '3.8', 903, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(6, 'Neque incidunt id possimus voluptate.', 'neque-incidunt-id-possimus-voluptate', 'Ipsum cupiditate expedita amet debitis vitae sit inventore. Et aliquid reiciendis vel quis perspiciatis hic. Deleniti minima expedita nobis voluptatem qui natus. Consequatur veritatis illum consequuntur occaecati ducimus voluptatum nisi. Qui ullam neque incidunt similique repellat suscipit officiis. Reiciendis omnis eum sunt magnam error dolore. In minima non accusantium odio porro perferendis.', '968.00', 'Et rem.', '3.3', 5, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(7, 'Et architecto est quasi quia nihil quos et.', 'et-architecto-est-quasi-quia-nihil-quos-et', 'Ullam voluptas non perferendis magnam aspernatur suscipit quia ut. Magnam saepe quod occaecati repellat eum. Omnis quo et ut enim ratione est dolore. Est impedit eos et velit dolor sunt ut. Quo nemo harum voluptatum enim placeat exercitationem et. Ad rerum saepe sapiente quis qui molestiae fuga ut. Fugiat omnis enim cupiditate distinctio. Non ut rerum fuga tenetur eum est. Repellat ab quia quia quibusdam error qui. Id sed iusto ut velit et veniam rerum.', '170.00', 'Non.', '0.7', 235, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(8, 'Temporibus tempora minima rerum corrupti sit.', 'temporibus-tempora-minima-rerum-corrupti-sit', 'Nemo reiciendis veritatis nihil maiores. Sed et perferendis id odio inventore voluptatem velit. Maxime quidem aut molestiae exercitationem. Tempora dicta est nisi. Fugiat a voluptates numquam dolor. Asperiores dolor sint animi excepturi ut. Et accusantium ipsam exercitationem quo debitis laboriosam laborum. Placeat cum consequatur expedita quo nemo.', '226.00', 'Soluta eaque.', '3.0', 134, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(9, 'Aut soluta alias dolor architecto ab.', 'aut-soluta-alias-dolor-architecto-ab', 'Quidem reiciendis id non pariatur. Quia ipsam et voluptatem et blanditiis cumque modi. Repudiandae aut sunt eligendi numquam voluptas excepturi. Beatae dolores magnam minus distinctio dicta commodi eligendi. Velit exercitationem ipsum tempore illo quod iure. Et atque aut officia distinctio consequatur. Rem minima aliquid quibusdam voluptatem ea et non. Ipsam corrupti qui amet sapiente aut eos ut. Eos repellendus et ea.', '520.00', 'Qui dolor.', '3.6', 89, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(10, 'Quibusdam quibusdam non odio ea dignissimos minima.', 'quibusdam-quibusdam-non-odio-ea-dignissimos-minima', 'Rerum quas quasi delectus veniam expedita. Necessitatibus facere est voluptas inventore voluptatem repellat. Ipsa qui porro itaque corporis expedita repellendus. Velit ex fugit et ut soluta eos harum fugit. Quia ut in recusandae qui. Magni ratione aspernatur cupiditate qui recusandae voluptates. Corporis illum praesentium nesciunt accusamus at molestiae. Porro minima labore quos molestiae sint. Illo provident cumque consequatur voluptates. Quis quia quibusdam consequatur consequuntur.', '315.00', 'Et ullam.', '2.2', 172, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(11, 'Voluptatem voluptatem quae aut vitae qui enim iusto.', 'voluptatem-voluptatem-quae-aut-vitae-qui-enim-iusto', 'Nihil et delectus et beatae accusamus recusandae aliquid. In cum maxime velit illum rerum. Doloribus nulla suscipit iure excepturi at consectetur. Placeat commodi quia aliquam maxime velit aut incidunt. Aut alias rerum ut veritatis natus laborum ut. Ullam doloribus in quae suscipit provident repellendus.', '815.00', 'Ea.', '3.0', 485, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(12, 'Cumque ut quae quia fugiat.', 'cumque-ut-quae-quia-fugiat', 'Officia dolor odit assumenda beatae accusamus non dolores quidem. A at a fugit consectetur cumque eveniet. Molestiae corporis voluptatem ipsa laborum inventore culpa. Nemo iste porro iste ut illo architecto debitis quis. Earum necessitatibus rem quidem qui. Sed molestiae odio et rem minima corporis. Optio cum repellendus tenetur sit et aut.', '851.00', 'Explicabo sed.', '2.5', 759, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(13, 'Culpa dolorem labore eum voluptas incidunt.', 'culpa-dolorem-labore-eum-voluptas-incidunt', 'Consequuntur nisi autem officiis ullam. Et incidunt dolor voluptas quo. Quisquam eligendi placeat dolore nam nihil esse minus. Facilis sint doloribus repudiandae architecto. Dolores architecto mollitia rerum optio qui itaque. Rem qui maiores consequatur. Nostrum aut ad in perferendis.', '376.00', 'Nesciunt.', '4.5', 646, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(14, 'Dolorem odit qui ea laudantium quo optio.', 'dolorem-odit-qui-ea-laudantium-quo-optio', 'Tenetur voluptate consequatur facere consequuntur cupiditate explicabo quisquam. Expedita laboriosam odio perferendis adipisci dicta deserunt similique. Hic quaerat quaerat unde rerum repellendus amet. Nulla ipsam aperiam nam delectus beatae magni atque. Blanditiis nesciunt perspiciatis iure. Ipsa velit eligendi nulla sunt aut atque adipisci.', '923.00', 'Omnis.', '1.1', 648, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(15, 'Et eos consequatur quas mollitia sit distinctio.', 'et-eos-consequatur-quas-mollitia-sit-distinctio', 'Odio ipsa voluptatum optio quia est. Totam alias omnis suscipit vel dicta vel. Doloribus rem debitis hic fuga nostrum eum quam autem. Ab porro iure quia est facere iure. Non quisquam odio est quam. Accusantium dolore quo adipisci quis praesentium beatae quis dolorem. Tempora ratione a totam quia numquam. Et et aliquam voluptas iste dignissimos repellat ut. Aut suscipit itaque expedita ab sunt suscipit. Dolores quisquam asperiores soluta dicta eos.', '987.00', 'Veniam earum.', '1.9', 258, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(16, 'Minus quidem cupiditate adipisci et quam.', 'minus-quidem-cupiditate-adipisci-et-quam', 'Enim ad voluptatibus omnis id. Voluptate ut rerum quis numquam enim minus. Cumque eos quos quaerat cum inventore possimus. Laboriosam totam nobis ullam pariatur ratione quis consequatur est. Qui reprehenderit provident dolorem sapiente ea unde eum vitae. Saepe illum numquam consequatur est fuga porro eius. Sed autem accusantium repudiandae enim voluptas quos illo.', '246.00', 'Pariatur.', '0.4', 76, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(17, 'Laboriosam saepe non corrupti.', 'laboriosam-saepe-non-corrupti', 'Est est voluptatum minus quis tempora recusandae. Ea nisi dignissimos harum laboriosam fugit possimus. Illo ea sed incidunt non. Alias omnis ea sint possimus et. Ipsam qui tempore reiciendis dignissimos velit consequatur.', '372.00', 'Nihil commodi.', '5.0', 606, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(18, 'Quis vel placeat hic.', 'quis-vel-placeat-hic', 'Consequatur voluptatem voluptates sint omnis voluptatem beatae velit. Pariatur laudantium minima cum accusantium. Provident est dolore consequatur nulla et asperiores omnis aperiam. Necessitatibus ut veritatis ea et minus reprehenderit. Delectus nihil iure iure non minus et. Qui rem id aut. Dolor debitis eum nam aperiam molestiae omnis.', '857.00', 'Voluptatum necessitatibus.', '3.0', 101, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(19, 'Accusantium voluptatem facere illo beatae.', 'accusantium-voluptatem-facere-illo-beatae', 'Quis at dolor modi nostrum. Quia molestiae qui consequuntur quos qui. Quaerat cum sunt quis praesentium ut molestiae dolorum. Nisi delectus molestiae culpa sequi est doloribus. Aut et est officia debitis. Laboriosam quas nemo accusantium exercitationem tenetur at et. Enim qui aut ipsam dolor dolores nihil molestiae in. At dolor natus esse dolore qui.', '507.00', 'Autem.', '0.8', 134, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(20, 'Dolor odit aliquam eaque voluptatum.', 'dolor-odit-aliquam-eaque-voluptatum', 'Quibusdam sit voluptates ab magni excepturi laborum odio in. Quos non voluptas et assumenda modi velit. Sapiente maiores repudiandae impedit vero dolorem. Aliquam provident animi ea pariatur totam rerum. Ad aut asperiores voluptas voluptatem reiciendis amet. Facere dolores sint laudantium voluptates et sunt occaecati.', '444.00', 'Aut excepturi.', '2.0', 597, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(21, 'Iusto quasi hic sunt.', 'iusto-quasi-hic-sunt', 'Nihil aut porro numquam qui sit molestias nostrum. Mollitia culpa qui delectus id officia. Ullam facere fugiat ut repellat. Recusandae quae est vel ea. Sit vel accusantium temporibus totam rerum. Totam placeat tempora quo. Cum explicabo exercitationem accusantium.', '184.00', 'Delectus.', '4.1', 675, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(22, 'Maiores autem facilis itaque soluta qui.', 'maiores-autem-facilis-itaque-soluta-qui', 'Incidunt quam adipisci non quod rerum provident blanditiis. Ea non in natus ut voluptatibus delectus in. Amet tenetur similique porro ea id amet voluptas. Assumenda necessitatibus nisi dolore assumenda dolor dolorum magni. Officiis voluptas aspernatur veniam nihil impedit blanditiis inventore.', '649.00', 'Qui in.', '4.5', 915, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(23, 'Ut placeat laboriosam velit vitae.', 'ut-placeat-laboriosam-velit-vitae', 'Dolorem possimus dignissimos perspiciatis totam dolorum aut impedit omnis. Exercitationem blanditiis incidunt pariatur. Alias maiores nesciunt non modi. Minus et aliquid omnis sed. Minima nulla vitae non voluptates voluptate accusamus. Voluptate sequi illum quo incidunt facere officiis voluptatibus quia. Est eum natus ut fuga ut ipsa.', '584.00', 'Ut.', '3.2', 619, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(24, 'Vitae voluptas rem eligendi iste unde omnis et.', 'vitae-voluptas-rem-eligendi-iste-unde-omnis-et', 'Praesentium reiciendis a molestias aspernatur quod quisquam explicabo. Quibusdam eos rerum exercitationem omnis. Consectetur quasi id suscipit. Magnam qui id ducimus sed maxime. Iusto rem sunt magnam incidunt non. Non enim fuga temporibus similique esse itaque eum. Debitis et eaque quo aut quia consequatur ut inventore. Dolore eius sed nam a doloremque delectus minima. Repudiandae est sed error.', '653.00', 'Similique.', '2.8', 419, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(25, 'Accusamus et similique numquam numquam repellat natus.', 'accusamus-et-similique-numquam-numquam-repellat-natus', 'Velit tempora omnis voluptatem ipsam. Sed deleniti optio eligendi aut. Neque beatae fugiat ab voluptatem animi harum. Sed et in dolorem quidem odit laudantium. Et corrupti enim cupiditate nemo. Assumenda voluptatem voluptate rem ut est cupiditate aspernatur. Architecto iure consequatur nobis repellat delectus. Quo eius tempore ut ut nesciunt deleniti dolore.', '887.00', 'Fugit vitae.', '4.4', 408, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(26, 'Quasi labore omnis cupiditate voluptas.', 'quasi-labore-omnis-cupiditate-voluptas', 'Eaque laudantium eum ea sit corrupti molestiae quaerat. Fuga eum et enim dolor cupiditate voluptate repellendus recusandae. Esse illo numquam voluptates nisi. Sed eum suscipit voluptatem optio sunt est deserunt rerum. Delectus qui nobis at omnis doloremque. Accusantium repudiandae aliquid sint repudiandae nisi quam quis. Aut consequatur dolorem quae excepturi. Vel recusandae exercitationem enim id veritatis quibusdam et. Repellendus voluptate ut aut nostrum sit.', '111.00', 'Enim.', '2.6', 43, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(27, 'Nobis temporibus et dolores dolorem blanditiis sint necessitatibus.', 'nobis-temporibus-et-dolores-dolorem-blanditiis-sint-necessitatibus', 'Doloribus asperiores sit ut est. Ut id accusantium non ut cum sed. Aliquam ex placeat voluptatum recusandae hic sed quisquam. Aut tenetur excepturi omnis ex tempore maxime. Debitis qui quis et voluptas soluta.', '466.00', 'Eaque.', '2.2', 625, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(28, 'Assumenda voluptates iusto vel.', 'assumenda-voluptates-iusto-vel', 'Delectus ratione qui est sequi. Ad corporis consectetur tempora voluptatem pariatur esse. Quam et ipsa error aliquam nemo dolor. Delectus voluptas sed consequatur eum aut omnis ratione. Vel soluta illo ducimus cum minus sint. Ut vitae vel facere praesentium vitae officiis consequatur fuga. Vitae rerum quia tenetur eos voluptatum autem dolorem in. Et suscipit enim voluptate aut voluptatem qui quae.', '586.00', 'Alias repellat.', '2.7', 697, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(29, 'Nihil quia debitis sed officiis rem ratione.', 'nihil-quia-debitis-sed-officiis-rem-ratione', 'Itaque saepe voluptate facere voluptatibus culpa. Asperiores laborum eos ea ut asperiores reiciendis sint est. Non mollitia ab numquam velit. Maiores numquam voluptatem asperiores doloribus unde ad sit. Quasi accusamus at voluptatem qui reiciendis omnis enim nobis. A pariatur repellendus laboriosam delectus nam alias.', '146.00', 'Quasi.', '1.2', 358, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(30, 'Ut necessitatibus sapiente dolorem.', 'ut-necessitatibus-sapiente-dolorem', 'Ut pariatur aut vero sunt nemo delectus quas. Facere sapiente consequatur in ipsa aut. Et voluptatum omnis totam. Vero quisquam eos nobis qui natus. Molestiae molestiae et consectetur aut porro.', '408.00', 'Pariatur at.', '2.1', 845, 1, '2020-02-03 20:39:26', '2020-02-03 20:39:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cường Lê', 'noname21062000@gmail.com', '2020-02-03 20:39:25', '$2y$10$vdTBW6Z5ZWn8cfEllrJx2e5hzRrQZjc3BgZkZOV5zNy08q2vn99P2', 'kHWUW0eet7', '2020-02-03 20:39:26', '2020-02-03 20:39:26'),
(2, 'CuongLeName', 'noname210620001@gmail.com', NULL, '$2y$10$Q3VU8lTxgE/j.kD5y7L4Zug.LBaEbhrHsFak3Ae/6XSP3z1KttC8a', NULL, '2020-02-04 01:49:44', '2020-02-04 01:49:44'),
(3, 'CuongLeName', 'noname2106200012@gmail.com', NULL, '$2y$10$SIpjs1/J5H4pyKg4P6ygs.HGm2tITKVRsUj85cpba/L/r1tRclxtK', NULL, '2020-02-04 02:07:58', '2020-02-04 02:07:58'),
(4, 'cuongle', 'test@gmail.com', NULL, '$2y$10$WjnyK/ZplSxlXwclA/aYJOl5ViQrIDz9W5Ao.U2HZ5mXBtHCbNRQq', NULL, '2020-02-05 21:27:09', '2020-02-05 21:27:09');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_custom_id_foreign` (`custom_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_custom_id_foreign` FOREIGN KEY (`custom_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
