-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2024 at 07:27 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE DATABASE IF NOT EXISTS `web assignment` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `web assignment`;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

DROP TABLE IF EXISTS `cartitem`;
CREATE TABLE IF NOT EXISTS `cartitem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sku` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `colour` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sku` (`sku`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cartitem`
--

INSERT INTO `cartitem` (`id`, `sku`, `quantity`, `colour`, `username`) VALUES
(1, 'MK20221008CN1', 1, 'blue', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `title`, `content`, `date`, `status`) VALUES
(1, 'john@gmail.com', 'promotion', ' can i ask when it will got promotion, i love the keyboard so much but it is too expensive to me', '2024-03-28 17:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `category`, `question`, `answer`) VALUES
(1, 'delivery', 'How long will it take for my item to be delivered?', 'Delivery times vary depending on your location and the shipping method chosen. Typically, orders are delivered within 3-7 business days.'),
(2, 'delivery', 'Do you offer international shipping?', 'Yes, we offer international shipping to many countries. Shipping costs and delivery times may vary for international orders.'),
(3, 'delivery', 'How can I change the delivery address for my order?', 'You can only change your delivery address before the order is made. Once the payment is successfully completed, no changes can be made. However, you may attempt to contact the courier to see if they can deliver the order to another address.'),
(4, 'return', 'Can I return my item if I change my mind?', 'Yes, you can return your item within 30 days of purchase for a full refund. The item must be in its original packaging and in unused condition.'),
(5, 'return', 'How do I initiate a return?', 'To initiate a return, please contact our customer service team with your order number and reason for return. We will provide you with a return authorization and instructions on how to return the item.'),
(6, 'return', 'Do I have to pay for return shipping?', 'Yes, you will be responsible for the cost of return shipping unless the item is being returned due to a fault or error on our part.');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `password`, `email`, `name`, `gender`) VALUES
('john', 'john', 'john123@gmail.com', 'John Cena', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `sku` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`sku`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`sku`, `name`, `category`, `description`, `price`, `discount`, `type`, `image`) VALUES
('MK2022802CN-3', 'JAMESDONKEY R2 Aluminium Alloy Mechanical Keyboard', 'BRANDS', 'JamesDonkey R2 is a brand-new three-mode mechanical keyboard with an exquisite premium build quality. The keyboard features a CNC-machined premium finish with 6063 high-quality aluminium alloy material. JamesDonkey has designed the R2 with a gasket pro comfortable structure design with built-in multi-layered padding for smoother typing feedback. To further enhance the typing experience, we also have new customized White Wings POM material mechanical switches. JamesDonkey R2 is simply an amazing keyboard loaded with advanced components and features to provide a premium user experience!!', 149.99, 0.00, 'JAMESDONKEY', 'photo/product/MK2022802CN-3.png'),
('MK2022561CN', 'JAMESDONKEY A3 Grey Cyan Mechanical Keyboard', 'BRANDS', 'Meet the all-new JamesDonkey A3, a high-quality 75% compact mechanical keyboard with a multimedia volume knob. JamesDonkey has featured an advanced Gasket Pro design on the keyboard to ensure comfortable shock-proof typing with soft acoustics. It comes equipped with custom-developed ice crystal mechanical switches and also features a hot-swappable socket design for easy replacement of mechanical switches whenever required. A3 is an advanced keyboard designed with top-quality features including three-mode connectivity, full-key conflict-free operation, a Multimedia volume knob, and many more features!!', 129.99, 0.10, 'JAMESDONKEY', 'photo/product/MK2022561CN.png'),
('MK2022783CN', 'JAMESDONKEY RS2 3.0 Rosy Mechanical Keyboard', 'BRANDS', 'Presenting the all-new JamesDonkey RS2 3.0. It’s the third generation of the famous RS2 series of compact 99-key mechanical keyboards. The series has now got a multi-function colorful display screen right alongside the metallic multifunction knob. The keyboard adopts a gasket pro structure for improved typing comfort. You also get dynamic full-color 16.8 million color RGB backlight with 17 different effects to choose from!!', 155.99, 0.00, 'JAMESDONKEY', 'photo/product/MK2022783CN.png'),
('MK20223526CN1', 'JAMESDONKEY A3 Retro Mechanical Keyboard', 'BRANDS', 'Meet the all-new JamesDonkey A3, a high-quality 75% compact mechanical keyboard with a multimedia volume knob. JamesDonkey has featured an advanced Gasket Pro design on the keyboard to ensure comfortable shock-proof typing with soft acoustics. It comes equipped with custom-developed Moon Yellow linear mechanical switches and also features a hot-swappable socket design for easy replacement of mechanical switches whenever required. A3 is an advanced keyboard designed with top-quality features including three-mode connectivity, full-key conflict-free operation, a Multimedia volume knob, and many more features!!', 105.99, 0.20, 'JAMESDONKEY', 'photo/product/MK20223526CN1.png'),
('MK20223377CNKit1', 'JAMESDONKEY RS2 2.0 RGB Mechanical Keyboard', 'BRANDS', 'Meet the all-new James Donkey RS2 2.0 mechanical keyboard. A Black Grey-designed 99-key mechanical keyboard with a multimedia volume knob. It supports triple-connection mode including Bluetooth, Wireless 2.4GHz, and Wired USB Type-C connectivity. The keyboard comes equipped with high-quality Gateron G Pro 2.0 mechanical switches and also features a Hot-Swappable design for easy replacement of the switches. James Donkey has used high-quality dual-toned PBT material keycaps for a smooth and textured finish on the keyboard!!! Upgrade your desk space with the amazing James Donkey RS2 2.0 !!', 145.99, 0.10, 'JAMESDONKEY', 'photo/product/MK20223377CNKit1.png'),
('MK20223836CNB', 'FEKER Alice98 Gasket Mechanical Keyboard', 'BRANDS', 'Feker Alice98 is an ergonomic three-mode mechanical keyboard with a beautiful Alice Split Layout. The keyboard features a gasket-mounted structure design along with a PC positioning board and multi-layered padding that ensures comfortable, elastic typing feedback. Every keystroke is smooth, every keystroke is comfortable. The keyboard comes equipped with the latest launched Kailh Box Winter mechanical switches. It’s a great keyboard with a unique look!!', 179.99, 0.00, 'FEKER', 'photo/product/MK20223836CNB.png'),
('MK20223225CNBlack', 'FEKER Alice80 Gasket Keyboard Kit', 'BRANDS', 'Built with gasket mounted top notch including sound absorbing foam. Hot-swappable sockets for easy customization including Cheery MX, Kailh, Gateron switches, and other 3-pin/5-pin switches. Pre-lubed switches make it easier for customization providing smoother keystrokes.', 109.99, 0.10, 'FEKER', 'photo/product/MK20223225CNBlack.png'),
('MK20221070CN1', 'FEKER Galaxy80 Pro Aluminum Wireless Mechanical Keyboard', 'BRANDS', 'FEKER Galaxy80 Pro Aluminum Wireless Mechanical Keyboard is an ergonomic three-mode mechanical keyboard. The keyboard features a gasket-mounted structure design along with a PC positioning board and multi-layered padding that ensures comfortable, elastic typing feedback. Every keystroke is smooth, every keystroke is comfortable. It’s a great keyboard with a unique look!!', 199.99, 0.20, 'FEKER', 'photo/product/MK20221070CN1.png'),
('MK20223227CNSouth', 'FEKER Alice80 Corgi Mechanical Keyboard', 'BRANDS', 'Feker has released different trendy keyboards and DIY kits for enthusiasts. With this Alice layout, Feker has a 65% layout which is split into left and right halves, leaving a small gap in between. The letters and the bottom row are angled at a certain degree to fit the direction of your hands when staying on the desk naturally. The spacebar is split into two pieces to accommodate this design. It is considered to reach a balance in the aspect of ergonomics. Apart from the typical Alice features, the Feker’s Alice 80 goes further with a media control knob. With this keyboard, you can lay your hands on the keyboard freely and increase comfortable typing experiences simultaneously.', 169.99, 0.20, 'FEKER', 'photo/product/MK20223227CNSouth.png'),
('MK2022702CN1', 'FEKER K75 Mechanical Keyboard', 'BRANDS', 'Presenting the all-new FEKER K75 compact 75% mechanical keyboard with versatile three-mode connectivity function. The keyboard has got solid build design with a 1.28” round-shaped colourful TFT display screen. It has a compact 83-key arrangement and is available in four eye-catchy colour options. In order to provide an exceptional typing experience, the keyboard comes equipped with a high-quality PC material positioning plate and also features multiple layers of sound and shock-absorbing padding.', 139.99, 0.10, 'FEKER', 'photo/product/MK2022702CN1.png'),
('MK2022832CN-2', 'FEKER IK105/IK85 Series Gasket Mechanical Keyboard', 'BRANDS', 'FEKER IK105 and IK85 keyboards are made available in two different variants, the Plus and Pro variant. The keyboards are introduced in a stunning Ballad of Mulan theme for the Pro variants while the Plus variants have other color options. The Ballad of Mulan offers an amazing Cyan Green color theme with unique elements. Both the Plus and Pro variants are equipped with advanced features such as comfortable gasket structure, multi-layered padding, RGB backlight, single-key slotted PCB, etc. but the Pro variant brings more features such as a colorful display screen, specially customized switches, metallic volume knob, dye-sublimation JDA profile keycaps, etc.', 99.99, 0.20, 'FEKER', 'photo/product/MK2022832CN-2.png'),
('MK20221023CN1', 'MCHOSE K87 Three Mode Gasket Mechanical Keyboard', 'BRANDS', 'MCHOSE is here with a brand new flagship mechanical keyboard, the MCHOSE K87. The K87 keyboard is an 80% TKL keyboard with a comfortable gasket internal design featuring a single-key slotted PCB, a six-layered padded structure, a customized nameplate, and many advanced features. It has a colorful RGB backlight along with a light strip wrapped around the keyboard chassis. MCHOSE K87 keyboard is available in a variety of color options with high-quality components. Are you ready to upgrade your desktop with the all-new MCHOSE K87!!', 99.99, 0.10, 'MCHOSE', 'photo/product/MK20221023CN1.png'),
('MK2022886CN1', 'MCHOSE X75 Gasket Mechanical Keyboard', 'BRANDS', 'Presenting the all-new MCHOSE X75, a versatile 75% compact mechanical keyboard with three-mode versatile connectivity, With an efficient core chipset, the X75 offers excellent performance with a 3ms low-delay response time. MCHOSE has designed this one with a gasket-mounted structure design with five-layered internal padding for satisfying typing feedback!!', 109.99, 0.00, 'MCHOSE', 'photo/product/MK2022886CN1.png'),
('MK2022888CN-1', 'MCHOSE K99 Gasket Mechanical Keyboard', 'BRANDS', 'MCHOSE K99 is a versatile three-mode mechanical keyboard with a compact 98% arrangement. The keyboard uses a gasket-mounted structure design with six-layered internal padding for comfortable typing feedback. It comes with an Anode/PVD mirror counterweight. Enjoy comfortable typing with an ergonomic 99-key streamlined layout. It offers excellent wireless performance with three-mode connectivity and ultra-low delay connection!!', 99.99, 0.00, 'MCHOSE', 'photo/product/MK2022888CN-1.png'),
('MK2022792CNBlue', 'AULA F75 Gasket Three Mode Mechanical Keyboard', 'BRANDS', 'AULA F75 is a well-built premium mechanical keyboard with versatile three-mode connectivity and a super comfortable leaf-spring gasket-mounted structure design. AULA has featured five-layered internal padding for silky smooth typing feedback. You will feel every single keystroke and get a super satisfying typing experience every time you use the F75. It adopts 1.2mm single-key slotted PCB board that also helps in providing comfortable typing feedback with stable operation. We have OEM height dual-tone PBT keycaps for durable build along with full-key hot-swappable sockets for DIY switch replacement. With convenient three-mode connectivity, connect the Aula F75 to different sources with ease.', 89.99, 0.10, 'AULA', 'photo/product/MK2022792CNBlue.png'),
('MK2022988CN1', 'AULA F98 Gasket Mechanical Keyboard', 'BRANDS', 'AULA F98 is a brand new compact 98-key keyboard with versatile three-mode connectivity and a cool RGB backlight. With the help of a specially developed gasket structure, the AULA F98 keyboard provides users with comfortable typing feedback and soft acoustics. You get two types of mechanical switches as options while purchasing, and the keyboard also has full-key hot-swappable sockets for easy switch replacement. Upgrade your deskspace with the all-new AULA F98 and experience its rich and dynamic RGB backlight!!', 175.99, 0.20, 'AULA', 'photo/product/MK2022988CN1.png'),
('MK2022823CN1', 'Lofree Dot Series Foundation Mechanical Keyboard', 'BRANDS', 'Introducing the all-new Lofree Dot Series Liquid Foundation three-mode versatile mechanical keyboard. Designed with great precision and craftsmanship, the Dot Series Liquid Foundation has uniquely crafted keycaps with Liquid Foundation material. These specially crafted dual-tone keycaps achieve an exciting gradient finish treating the users with a premium design. They are not only durable and designer, but also offer comfortable grip with the fingertips making typing on the keyboard a fun and satisfying experience. Like every other product by Lofree, the Dot Series Liquid Foundation keyboard is designed with great precision and advanced functions including three-mode connectivity, single-colour backlight with seven lighting effects, comfortable gasket structure, customized mechanical switches, etc. Be ready for an amazing typing experience with the Lofree Dot Series Liquid Foundation Keyboard!!', 199.99, 0.10, 'LOFREE', 'photo/product/MK2022823CN1.png'),
('MK2022795CN', 'Lofree Land Of Mystery Mechanical Keyboard Combo', 'BRANDS', 'Presenting the all-new Lofree Land of Mystery keyboard combo, a premium set of keyboard, mouse, keyboard pad, and a notebook with exquisite designer pattern and a designer gift box. The Land of Mystery design is carefully designed in collaboration with Banana Design, it not only looks unique but also has a charming look to each and every single component in the combo!! It’s the perfect gift you can buy for your loved ones!!', 289.99, 0.20, 'LOFREE', 'photo/product/MK2022795CN.png'),
('MK2022560CN', 'Lofree Block 98 Mechanical Keyboard', 'BRANDS', 'Lofree Block98 is a retro-themed three-mode versatile keyboard with a 98-key layout. The keyboard adopts newly developed customized TTC small square switches with full POM material build. It features a gasket-mounted structure design with a multi-layered padded structure for comfortable typing feedback. With three-mode connectivity, users can connect the Block98 Keyboard with a variety of sources, and supports seamless switching between different connected devices. Lofree Block98 is a beautifully built keyboard that has a retro tablet form factor!!!', 169.99, 0.00, 'LOFREE', 'photo/product/MK2022560CN.png'),
('MK2022667CN1', 'Lofree FLOW Low Profile Mechanical Keyboard', 'BRANDS', 'Lofree Flow is a brand-new 84-Key Compact TKL keyboard with dual-mode connection options. It has an elegant form factor with a low-profile design. Lofree has designed the keyboard with specially-crafted all-aluminum chassis and premium-quality durable PBT keycaps. It has a monochrome backlight and RGB colorful ambient light. Lofree has joined hands with Kailh in designing two premium Full POM material mechanical switches for a satisfying typing experience on the keyboard. This includes silky smooth linear switches(Ghost), and rich, tactile switches(Phantom Switches). Upgrade your desk space with the all-new and amazing Lofree Flow mechanical keyboard!!', 179.99, 0.10, 'LOFREE', 'photo/product/MK2022667CN1.png'),
('MK20222008CN', 'Lofree 1% Dual Mode Transparent Mechanical Keyboard', 'BRANDS', 'Meet the all-new Lofree 1% mechanical keyboard. Designed to deliver 100% satisfaction to keyboard enthusiasts from all around the globe, the Lofree 1% mechanical keyboard brings you an ultimately unique experience. It has a completely transparent look, yes you guys read it right, we have designed a keyboard with a completely transparent design. The chassis, the keycaps, the switches, everything is designed to be transparent. On top of this stunning transparent design, Lofree has featured a white LED backlight design on the Lofree 1% mechanical keyboard.', 256.99, 0.20, 'LOFREE', 'photo/product/MK20222008CN.png'),
('MK20221538CN68', 'Lofree Loflick100/Loflick68 Triple Mode Connection Mechanical Keyboard', 'BRANDS', 'Lofree Loflick series of keyboards are newly designed compact mechanical keyboards built with high-quality PBT keycaps and ABS frame. The Loflick series has two keyboards LoFlick68 and LoFlick100, as you might have guessed, these are 68-keys and 100-keys keyboards. Lofree has given them an elegant touch with bold printed dye-sublimed keycaps. The keyboard supports full DIY, allowing you to add colorful keycaps and give a personalized touch to them!!!', 129.99, 0.00, 'LOFREE', 'photo/product/MK20221538CN68.png'),
('MK20223254CN', 'YUNZII Coffee Cat Cherry Keycap Set', 'KEYCAPS', 'The YUNZII keycap Set delivers in quality with ultra-durable PBT plastic whose legends will never wear away. Compared to ABS material, PBT is less common and feels textured and more durable.', 45.99, 0.00, 'PBT', 'photo/product/MK20223254CN.png'),
('MK20222054CN', 'Akko Herb Garden Green OSA PBT Keycaps', 'KEYCAPS', 'Quality with ultra-durable PBT plastic whose legends will never wear away. Compared to ABS material, PBT is less common and feels textured and more durable.', 65.99, 0.10, 'PBT', 'photo/product/MK20222054CN.png'),
('MK20223855CNW', 'YUNZII Pudding OEM Profile Keycap Set', 'KEYCAPS', 'PBT double-shot keycaps that are made from two layers of plastic molded into each other, eliminating the need for printing. The key legend will never fade or rub off. The OEM profile keycaps have cylindrical tops that conform to your fingertips to increase comfort during typing or gaming.', 45.99, 0.20, 'PBT', 'photo/product/MK20223855CNW.png'),
('MK2022777CN', 'NOPPOO Kiki Delivery Service Cherry Profile Keycaps Set', 'KEYCAPS', 'PBT double-shot keycaps that are made from two layers of plastic molded into each other, eliminating the need for printing.Dye sublimation PBT keycaps are crafted in Cherry profile, ensuring superior quality', 49.99, 0.10, 'PBT', 'photo/product/MK2022777CN.png'),
('MK20222585CNWE', 'YUNZII Weather XDA Profile Keycap Set', 'KEYCAPS', 'As to ensure an impressive color scheme and enjoyable typing experience, the YUNZII keycap applies high-quality PBT dye-sublimation technology. The Dye-Sub PBT keycaps enhance the overall durability with water, dust resistance.', 50.99, 0.20, 'PBT', 'photo/product/MK20222585CNWE.png'),
('MK20221035CN', 'WINMIX Oreo Cherry Profile Keycaps Set', 'KEYCAPS', 'Compatible with Cherry MX switches, MX-style clones. As to ensure an impressive color scheme and enjoyable typing experience, the YUNZII keycap applies high-quality PBT dye-sublimation technology. The Dye-Sub PBT keycaps enhance the overall durability with water, dust resistance.', 69.99, 0.00, 'PBT', 'photo/product/ MK20221035CN.png'),
('MK20223981CNBlack', 'RECCAZR Side Printed OEM Translucidus Keycaps', 'KEYCAPS', 'Note: only keycaps, no keyboard', 39.99, 0.10, 'PBT', 'photo/product/MK20223981CNBlack.png'),
('MK2022596CN1', 'KBDfans RŌNIN Cherry Profile Keycaps Set', 'KEYCAPS', 'This is inspired by a Rōnin, a master less fighter in the ancient Japan. We tried to depict the various aspects of this samurai, keeping in focus of what his virtues and way of life would have been. The colors are very true to that ancient period. The hiragana base contains a triple shot sublegends with a muted gold while the Latin base set does not. The novelties are all designed to create flow, a sense of action with the rōnin being at its centre!', 135.99, 0.10, 'ABS', 'photo/product/MK2022596CN1.png'),
('MK2022457CN3', 'KBDfans POCO Cherry Profile Keycaps', 'KEYCAPS', 'ABS keycaps tray with designed tray cover', 39.99, 0.20, 'ABS', 'photo/product/MK2022457CN3.png'),
('MK20222999CNAD', 'DOMIKEY Desert Island Cherry Profile Keycaps Set', 'KEYCAPS', 'Double shot ABS keycaps, designed in the iconic Cherry profile, offer a durable, premium typing experience, characterized by enhanced longevity, exceptional comfort, unparalleled aesthetic appeal.', 49.99, 0.20, 'ABS', 'photo/product/MK20222999CNAD.png'),
('MK2022610CN2', 'KBDfans COOKIES CREME Cherry Profile Keycaps Set', 'KEYCAPS', 'Only keycaps included, no keyboard', 19.99, 0.00, 'ABS', 'photo/product/MK2022610CN2.png'),
('MK20221048CN1', 'JTK Needy Candy Cherry Profile Purple Keycaps', 'KEYCAPS', 'Crafted from high-quality ABS material, designed in the renowned Cherry profile, our keycaps are manufactured using the advanced doubleshot production method, ensuring durability, precision, and a superior typing experience, making them an ideal choice for discerning enthusiasts seeking both style, functionality in their keyboards.', 109.99, 0.10, 'ABS', 'photo/product/MK20221048CN1.png'),
('MK20220890CN', 'G-MKY Dye-Subtion SA Chalk Colorway Keycap', 'KEYCAPS', 'This Keyset boasts an SA profile, offering a unique typing experience.Suitable for use with most Cherry MX, Gateron MX, Kailh MX, all other MX switch keyboards, it offers broad compatibility for seamless integration.Compatible with 108 standard ANSI keycaps, it ensures versatility across a wide range of keyboards.', 89.99, 0.10, 'SA PROFILE', 'photo/product/MK20220890CN.png'),
('MK20223796CN1', 'CoolKiller Transparent SA Keycaps Set', 'KEYCAPS', 'These transparent PC keycaps, totaling 142 keys, feature an SA profile for a distinctive typing feel and aesthetic. With their clear construction, they provide a sleek and modern appearance, offering compatibility with a wide range of keyboards and switch types.', 49.99, 0.00, 'SA PROFILE', 'photo/product/MK20223796CN1.png'),
('MK20222992CN', 'DOMIKEY Polar Light SA Profile Keycaps Set', 'KEYCAPS', 'Totaling 151 keys, feature an SA profile for a distinctive typing feel and aesthetic. With their clear construction, they provide a sleek and modern appearance, offering compatibility with a wide range of keyboards and switch types.', 149.99, 0.20, 'SA PROFILE', 'photo/product/MK20222992CN.png'),
('MK20222996CN', 'DOMIKEY Blue Wave SA Profile Keycaps Set', 'KEYCAPS', 'With an SA profile, a total of 159 keys, these keycaps deliver a unique typing experience while providing extensive coverage for various keyboard layouts.', 99.99, 0.20, 'SA PROFILE', 'photo/product/MK20222996CN.png'),
('MK20221858CN', 'MAXKEY Blue Doubleshot ABS SA 139 Keycaps', 'KEYCAPS', 'Featuring 139 keys and an SA profile, these keycaps are designed for Cherry MX switches, crafted from doubleshot ABS material for durability.', 119.99, 0.20, 'SA PROFILE', 'photo/product/MK20221858CN.png'),
('MK2022651CN', 'Soulcat Samurai Cherry Profile Keycap Set', 'KEYCAPS', 'Crafted with meticulous attention to detail, these keycaps feature the renowned Cherry profile, ensuring a comfortable typing experience. The dye sublimation printing process is employed to ensure vibrant, long-lasting legends on each keycap, enhancing both durability, aesthetics. Constructed from high-quality PBT material, these keycaps offer exceptional durability, resistance to wear, and tear, making them ideal for prolonged use. With a total of 151 keys, this comprehensive keycap set provides full coverage for a wide range of keyboard layouts, catering to the needs of both enthusiasts, professionals alike.', 59.99, 0.20, 'CHERRY PROFILE', 'photo/product/MK2022651CN.png'),
('MK20223929CN1', 'Z Review Rinko Touch Cherry Profile Keycaps Set', 'KEYCAPS', 'Introducing the all-new Rinko Touch keycaps designed in collaboration with Z Reviews. The set contains 156 artistic printed keys serving different layouts from 60% and above. The set has been designed to match the Rinko IEMs designed with Z Reviews. Rinko IEMs adopt a dual-driver hybrid combination featuring a powerful dynamic driver for rich lower end and a high-performance 6mm planar magnetic driver for outstanding extensions in the ultra-high-frequency region. Rinko is tuned with suggestions from Z Reviews, taking in his expertise in designing a great sounding set at a budget price point!!', 159.99, 0.20, 'CHERRY PROFILE', 'photo/product/MK20223929CN1.png'),
('MK20223643CN', 'KeyTok Back In The Game Cherry Profile Keycaps', 'KEYCAPS', 'Crafted in the iconic Cherry profile, these PBT keycaps feature vibrant legends achieved through dye sublimation, ensuring long-lasting durability and style. Note: Only keycaps included.', 69.99, 0.10, 'CHERRY PROFILE', 'photo/product/MK20223643CN.png'),
('MK2022657CN', 'Soulcat Indigo Blue Dunhuang Cherry Profile Keycap Set', 'KEYCAPS', 'Crafted with precision, these Cherry profile keycaps are made from high-quality PBT material, known for its durability, resistance to wear, and tear. The legends on each keycap are brought to life through the dye sublimation process, ensuring vibrant, long-lasting designs that would not fade over time. These keycaps not only provide a comfortable typing experience but also add a touch of style, personality to your keyboard setup, making them the perfect choice for enthusiasts looking for both functionality, aesthetics.', 59.99, 0.10, 'CHERRY PROFILE', 'photo/product/MK2022657CN.png'),
('MK20222238CNBrown', 'Akko POM Keyboard 45 Pieces Switch', 'KEYCAPS', 'Introducing the Akko POM Keyboard, featuring 45 meticulously crafted switch pieces. These switches are meticulously engineered from premium POM material, renowned for its durability and smooth tactile feel. Designed to elevate your typing experience, each switch promises reliability and precision with every keystroke. Whether you are a seasoned gamer or a dedicated typist, the Akko POM Keyboard offers an unparalleled combination of performance and comfort, ensuring an exceptional typing experience every time.', 29.99, 0.10, 'POM', 'photo/product/MK20222238CNBrown.png'),
('MK2022737CN1', 'DAREU Sky POM Switches', 'KEYCAPS', 'Introducing the DAREU Sky POM Keyboard, featuring 45 meticulously crafted switch pieces. These switches are meticulously engineered from premium POM material, renowned for its durability and smooth tactile feel. Designed to elevate your typing experience, each switch promises reliability and precision with every keystroke. Whether you are a seasoned gamer or a dedicated typist, the Akko POM Keyboard offers an unparalleled combination of performance and comfort, ensuring an exceptional typing experience every time.', 39.99, 0.10, 'POM', 'photo/product/MK2022737CN1.png'),
('MK2022611CN', 'Kailh CP Series POM Switches', 'KEYCAPS', 'These switches are meticulously engineered from premium POM material, renowned for its durability and smooth tactile feel. Designed to elevate your typing experience, each switch promises reliability and precision with every keystroke. Whether you are a seasoned gamer or a dedicated typist, the Akko POM Keyboard offers an unparalleled combination of performance and comfort, ensuring an exceptional typing experience every time.', 49.99, 0.10, 'POM', 'photo/product/MK2022611CN.png'),
('MK20223774CN', 'MOONDROP NEKO&CAKE Desk Mat', 'ASSESSORIES', 'Desktop mousepad with NEKO&CAKE pattern.', 29.99, 0.10, 'MOUSE PADS', 'photo/product/MK20223774CN.png'),
('MK2022616CN1', 'Esptiger She She Jia MousePad', 'ASSESSORIES', 'Treat your mouse with the She She Jia designer mouse pad from Esptiger. With a colorful designer theme, the mousepad is available in two color options, pink and purple. The Pink one is made up of high-quality Blended BWR-ED fabric while the Purple one has a plain weave fabric finish. It offers a silky smooth glide for your mouse and has a non-slippery base made up of soft Poron material. The mousepad is waterproof and wear-resistant!!', 59.99, 0.20, 'MOUSE PADS', 'photo/product/MK2022616CN1.png'),
('MK20221008CN1', 'Ultraglide Ultradash Meow UD Mousepad', 'ASSESSORIES', 'UltraGlide UltraDash is a neutral-slippery gaming series mousepad which is suitable for people who love speed mousepads. With its finely woven top fabric, the UltraDash Meow UD offers a silky smooth surface for your mouse to glide upon. It has a finely-done side hemming as well to complete the amazing build of the pad. The mousepad also has an anti-slippery base with 4mm thick Urethane Foam and natural rubber, it keeps the pad firm in its place.', 39.99, 0.20, 'MOUSE PADS', 'photo/product/MK20221008CN1.png'),
('MK2022939CN-2', 'Esptiger Qingsui XUAN Mousepad', 'ASSESSORIES', 'ESPTIGER Qingsui XUAN gaming-series mousepad is designed with a specially developed high-density fine top-surface fabric. The mousepad offers a finely controlled mouse operation with a smooth base. It has a non-slippery natural rubber sole base that keeps the mousepad in its position. The QINGSUI XUAN is available in two fantastic design patterns, each of which looks spectacular in its own way!!', 49.99, 0.10, 'MOUSE PADS', 'photo/product/MK2022939CN-2.png'),
('MK2022928CN-1', 'IFYOO HornsX1 RGB Wrist Rest', 'ASSESSORIES', 'Introducing the IFYOO HornsX1 RGB Wrist Rest, designed to enhance your gaming experience with both comfort and style. Crafted with premium materials and featuring customizable RGB lighting, this wrist rest not only provides ergonomic support but also adds a touch of flair to your gaming setup. Say goodbye to discomfort during long gaming sessions and hello to the ultimate in wrist support and aesthetics with the IFYOO HornsX1 RGB Wrist Rest.', 9.99, 0.00, 'WRIST REST', 'photo/product/MK2022928CN-1.png'),
('MK20222830CN60', 'KBDfans Quartz White In Black Keyboard Wrist Rest', 'ASSESSORIES', 'Introducing theKBDfans Quartz White In Black Keyboard Wrist Rest, designed to enhance your gaming experience with both comfort and style. Crafted with premium materials and featuring customizable RGB lighting, this wrist rest not only provides ergonomic support but also adds a touch of flair to your gaming setup. Say goodbye to discomfort during long gaming sessions and hello to the ultimate in wrist support and aesthetics with the IFYOO HornsX1 RGB Wrist Rest.', 29.99, 0.10, 'WRIST REST', 'photo/product/MK20222830CN60.png'),
('MK2022927CN-1', 'CoolKiller Tatami Wrist Rest', 'ASSESSORIES', 'The Coolkiller Tatami Wrist Rest boasts a unique knitted pattern surface that not only adds a touch of elegance to your workspace but also provides a comfortable and ergonomic resting place for your hands.', 39.99, 0.10, 'WRIST REST', 'photo/product/MK2022927CN-1.png'),
('MK2022806CN-1', 'YUNZII Marshmallow Keyboard Wrist Rest', 'ASSESSORIES', 'Waterproof and easy to clean, with non-slip bottom and skin friendly material.', 39.99, 0.20, 'WRIST REST', 'photo/product/MK2022927CN-1.png'),
('MK2022902CN-1', 'YUNZII Bone Keyboard Wrist Rest', 'ASSESSORIES', 'This keyboard rest is a special and ideal gift, perfectly matching a keyboard.', 49.99, 0.20, 'WRIST REST', 'photo/product/MK2022902CN-1.png'),
('MK20222596CN1', 'YUNZII Cleaning Keyboard Brush', 'ASSESSORIES', 'The brush can be used to clean your keyboard, PC vent, laptop, printer, etc. Also good for cleaning dust and dirt on sliding doors, sliding windows, blinds and other tracks. ', 15.00, 0.20, 'KEYBOARD CLEANERS', 'photo/product/MK20222596CN1.png'),
('MK20224073CN', 'KBDfans Woody Keyboard Brush', 'ASSESSORIES', ' Wood and fiber material, no risk of scratching your keyboard. ', 5.00, 0.00, 'KEYBOARD CLEANERS', 'photo/product/MK20224073CN.png'),
('MK20223284CN', 'FBB GMK Serika Cable', 'ASSESSORIES', 'Customized cable will need about 1-2 weeks to get shipped.  ', 65.00, 0.10, 'CABLE ORGANIZERS', 'photo/product/MK20223284CN.png'),
('MK20223291CNMIZU', 'FBB GMK Custom Coiled Type-C Cable', 'ASSESSORIES', 'Customized cable will need about 1-2 weeks to get shipped.  ', 65.00, 0.00, 'CABLE ORGANIZERS', 'photo/product/MK20223291CNMIZU.png'),
('MK20223290CN', 'FBB GMK Jamón Custom Coiled Aviator Cable', 'ASSESSORIES', 'Customized cable will need about 1-2 weeks to get shipped.  ', 65.00, 0.20, 'CABLE ORGANIZERS', 'photo/product/MK20223290CN.png'),
('MK2022553CN', 'KBDfans Banana Desk Mat', 'ASSESSORIES', '900 mm x 400 mm x 4 mm (imagine cutting a banana shape out of a regular-sized desk mat). Each mat comes with 2 banana stickers.', 65.00, 0.20, 'DESK MATS', 'photo/product/MK2022553CN.png'),
('MK20223634CNP', 'MOMOKA Elder God Priest Desk Mat', 'ASSESSORIES', '900 mm x 400 mm x 4 mm (cutting of a regular-sized desk mat).', 27.00, 0.00, 'DESK MATS', 'photo/product/MK20223634CNP.png'),
('MK20221256CN', 'VARMILO Sakura Desk Mat', 'ASSESSORIES', 'XL(900*400*3MM) (cutting of a regular-sized desk mat). ', 28.00, 0.10, 'DESK MATS', 'photo/product/MK20221256CN.png'),
('MK20223821CN', 'FiiO F2051H Desk Mat', 'ASSESSORIES', '800*300 (cutting of a regular-sized desk mat). ', 12.90, 0.00, 'DESK MATS', 'photo/product/MK20223821CN.png');

-- --------------------------------------------------------

--
-- Table structure for table `productquantity`
--

DROP TABLE IF EXISTS `productquantity`;
CREATE TABLE IF NOT EXISTS `productquantity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sku` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `colour` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sku` (`sku`)
) ENGINE=MyISAM AUTO_INCREMENT=232 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productquantity`
--

INSERT INTO `productquantity` (`id`, `sku`, `colour`, `quantity`) VALUES
(1, 'MK2022802CN-3', 'blue', 7),
(2, 'MK2022802CN-3', 'silver', 10),
(3, 'MK2022561CN', 'white', 10),
(4, 'MK2022783CN', 'rose', 11),
(5, 'MK20223526CN1', 'white', 13),
(6, 'MK20223377CNKit1', 'black', 8),
(7, 'MK20223836CNB', 'brown', 12),
(8, 'MK20223836CNB', 'white', 10),
(9, 'MK20223836CNB', 'black', 7),
(10, 'MK20223836CNB', 'silver', 8),
(11, 'MK20223225CNBlack', 'white', 23),
(12, 'MK20223225CNBlack', 'black', 3),
(13, 'MK20221070CN1', 'blue', 19),
(14, 'MK20221070CN1', 'black', 19),
(15, 'MK20221070CN1', 'white', 22),
(16, 'MK20223227CNSouth', 'none', 14),
(17, 'MK2022702CN1', 'pink', 23),
(18, 'MK2022702CN1', 'rose', 13),
(19, 'MK2022702CN1', 'black', 21),
(20, 'MK2022702CN1', 'white', 23),
(21, 'MK2022832CN-2', 'white', 5),
(22, 'MK2022832CN-2', 'black', 15),
(23, 'MK2022832CN-2', 'green', 4),
(24, 'MK20223227CNSouth', 'none', 14),
(25, 'MK2022702CN1', 'pink', 23),
(26, 'MK2022702CN1', 'rose', 13),
(27, 'MK2022702CN1', 'black', 21),
(28, 'MK2022702CN1', 'white', 23),
(29, 'MK2022832CN-2', 'white', 5),
(30, 'MK2022832CN-2', 'black', 15),
(31, 'MK2022832CN-2', 'green', 4),
(32, 'MK20221023CN1', 'white', 10),
(33, 'MK20221023CN1', 'blue', 19),
(34, 'MK20221023CN1', 'green', 10),
(35, 'MK2022886CN1', 'blue', 18),
(36, 'MK2022886CN1', 'pink', 23),
(37, 'MK2022886CN1', 'green', 3),
(38, 'MK2022888CN-1', 'green', 13),
(39, 'MK2022888CN-1', 'blue', 30),
(40, 'MK2022888CN-1', 'black', 1),
(41, 'MK2022888CN-1', 'pink', 22),
(42, 'MK2022792CNBlue', 'blue', 14),
(43, 'MK2022792CNBlue', 'white', 17),
(44, 'MK2022792CNBlue', 'black', 14),
(45, 'MK2022988CN1', 'black', 22),
(46, 'MK2022988CN1', 'pink', 12),
(47, 'MK2022988CN1', 'white', 2),
(48, 'MK2022823CN1', 'pink', 5),
(49, 'MK2022823CN1', 'white', 15),
(50, 'MK2022823CN1', 'blue', 23),
(51, 'MK2022795CN', 'white', 21),
(52, 'MK2022795CN', 'black', 11),
(53, 'MK2022560CN', 'white', 23),
(54, 'MK2022560CN', 'brown', 23),
(55, 'MK2022667CN1', 'white', 23),
(56, 'MK2022667CN1', 'black', 23),
(57, 'MK20222008CN', 'none', 23),
(58, 'MK20221538CN68', 'pink', 24),
(59, 'MK20223254CN', 'brown', 32),
(60, 'MK20222054CN', 'green', 34),
(61, 'MK20223855CNW', 'pink', 25),
(62, 'MK2022777CN', 'black', 45),
(63, 'MK20222585CNWE', 'white', 20),
(64, 'MK20223981CNBlack', 'black', 13),
(65, 'MK2022596CN1', 'none', 23),
(66, 'MK2022457CN3', 'pink', 8),
(67, 'MK20222999CNAD', 'green', 34),
(68, 'MK2022610CN2', 'brown', 28),
(69, 'MK2022610CN2', 'white', 28),
(70, 'MK20221048CN1', 'none', 19),
(71, 'MK20220890CN', 'none', 23),
(72, 'MK20223796CN1', 'white', 34),
(73, 'MK20222992CN', 'green', 3),
(74, 'MK20222996CN', 'blue', 14),
(75, 'MK20221858CN', 'white', 11),
(76, 'MK20223929CN1', 'white', 23),
(77, 'MK20223929CN1', 'brown', 3),
(78, 'MK20223643CN', 'black', 18),
(79, 'MK20223643CN', 'pink', 18),
(80, 'MK2022657CN', 'blue', 33),
(81, 'MK2022657CN', 'black', 23),
(82, 'MK20222238CNBrown', 'silver', 40),
(83, 'MK20222238CNBrown', 'pink', 40),
(84, 'MK20222238CNBrown', 'brown', 40),
(85, 'MK20222238CNBrown', 'black', 40),
(86, 'MK2022611CN', 'blue', 24),
(87, 'MK2022611CN', 'green', 18),
(88, 'MK2022611CN', 'pink', 23),
(89, 'MK20223774CN', 'none', 22),
(90, 'MK2022616CN1', 'pink', 12),
(91, 'MK2022616CN1', 'white', 15),
(92, 'MK20221008CN1', 'blue', 16),
(93, 'MK20221008CN1', 'red', 18),
(94, 'MK2022939CN-1', 'purple', 13),
(95, 'MK2022939CN-1', 'red', 15),
(96, 'MK2022928CN-1', 'black', 14),
(97, 'MK2022928CN-1', 'white', 24),
(98, 'MK20222830CN60', 'black', 17),
(99, 'MK20222830CN60', 'white', 7),
(100, 'MK2022927CN-1', 'white', 21),
(101, 'MK2022927CN-1', 'pink', 15),
(102, 'MK2022927CN-1', 'purple', 11),
(103, 'MK2022927CN-1', 'green', 12),
(104, 'MK2022927CN-1', 'brown', 18),
(105, 'MK2022806CN-1', 'white', 22),
(106, 'MK2022806CN-1', 'pink', 23),
(107, 'MK2022806CN-1', 'blue', 26),
(108, 'MK2022806CN-1', 'black', 22),
(109, 'MK2022806CN-1', 'green', 20),
(110, 'MK2022902CN-1', 'black', 24),
(111, 'MK2022902CN-1', 'white', 13),
(112, 'MK20222596CN1', 'red', 15),
(113, 'MK20222596CN1', 'brown', 25),
(114, 'MK20224073CN', 'brown', 16),
(115, 'MK20223284CN', 'white', 26),
(116, 'MK20223284CN', 'brown', 22),
(117, 'MK20223291CNMIZU', 'blue', 20),
(118, 'MK20223291CNMIZU', 'green', 20),
(119, 'MK20223291CNMIZU', 'purple', 20),
(120, 'MK20223290CN', 'red', 22),
(121, 'MK20223290CN', 'white', 22),
(122, 'MK2022553CN', 'yellow', 33),
(123, 'MK2022553CN', 'purple', 37),
(124, 'MK20221256CN', 'pink', 23),
(125, 'MK20223821CN', 'black', 20),
(126, 'MK20223821CN', 'white', 13);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sku` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`name`),
  KEY `sku` (`sku`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `sku`, `review`, `rating`, `name`) VALUES
(2, 'MK2022802CN-3', 'I love this keyboard so much! The price is reasonable as well! ', 4, 'john');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
