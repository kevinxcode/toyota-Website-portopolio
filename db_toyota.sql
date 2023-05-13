-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 09:50 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_toyota`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `id_mobil` varchar(12) NOT NULL,
  `judul_berita` text NOT NULL,
  `isi_berita` text NOT NULL,
  `file_foto` varchar(200) NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `berita`
--


-- --------------------------------------------------------

--
-- Table structure for table `fitur`
--

CREATE TABLE IF NOT EXISTS `fitur` (
  `id_fitur` int(11) NOT NULL AUTO_INCREMENT,
  `id_mobil` varchar(11) NOT NULL,
  `mobil` varchar(30) NOT NULL,
  `fitur` text NOT NULL,
  `jenis_fitur` text NOT NULL,
  PRIMARY KEY (`id_fitur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fitur`
--


-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE IF NOT EXISTS `harga` (
  `id_harga` int(11) NOT NULL AUTO_INCREMENT,
  `id_mobil` varchar(11) NOT NULL,
  `mobil` varchar(30) NOT NULL,
  `type` text NOT NULL,
  `harga` text NOT NULL,
  PRIMARY KEY (`id_harga`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `harga`
--


-- --------------------------------------------------------

--
-- Table structure for table `harga_menu`
--

CREATE TABLE IF NOT EXISTS `harga_menu` (
  `id_harga_menu` int(11) NOT NULL,
  `bank` text NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `file_foto` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_menu`
--

INSERT INTO `harga_menu` (`id_harga_menu`, `bank`, `keterangan`, `file_foto`) VALUES
(0, 'MAYBANK', '', 'MAYBANK-9297.jpg'),
(0, 'MAF FINANCE', '', 'MAF FINANCE-4559.jpg'),
(0, 'OTO FINANCE', '', 'OTO FINANCE-1718.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE IF NOT EXISTS `mobil` (
  `id_mobil` int(10) NOT NULL AUTO_INCREMENT,
  `mobil` text NOT NULL,
  PRIMARY KEY (`id_mobil`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `mobil`) VALUES
(6, 'AGYA'),
(7, 'CALYA'),
(8, 'AVANZA'),
(9, 'RUSH '),
(10, 'INNOVA'),
(11, 'FORTUNER'),
(12, 'VOXY'),
(13, 'HIACE'),
(14, 'YARIS'),
(15, 'SIENTA'),
(16, 'C-HR'),
(17, 'COROLLA ALTIS'),
(18, 'CAMRY'),
(19, 'VIOS'),
(20, 'HILUX '),
(21, 'ALPHARD '),
(22, 'LAND CRUISER');

-- --------------------------------------------------------

--
-- Table structure for table `mobil_deskripsi`
--

CREATE TABLE IF NOT EXISTS `mobil_deskripsi` (
  `id_deskripsi` int(11) NOT NULL AUTO_INCREMENT,
  `id_mobil` varchar(20) NOT NULL,
  `mobil` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_deskripsi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mobil_deskripsi`
--

INSERT INTO `mobil_deskripsi` (`id_deskripsi`, `id_mobil`, `mobil`, `deskripsi`) VALUES
(1, '6', 'AGYA', '<p>Memulai ulasan kali ini, Mas Sena akan mengulas di bagian terluar, yaitu pada sektor eksterior dari spesifikasi Toyota Agya. Tak sama dengan versi dahulunya, kali ini PT TAM menghadirkan mobil LCGC besutannya dengan tampilan yang lebih fresh di mana mengedepankan gaya khas hatchback modern. Hal itu tampak sekali pada setiap sisi bodinya di mana pada sektor depan terlihat mendapatkan gubahan paling banyak. Pasalnya, pada bagian depan dari Toyota Agya facelift ini sudah dilengkapi dengan Smoked Projector Headlamp with LED Light Guide berdesain modern berbentuk trapezium 6 sisi yang membuatnya begitu tampak stylish dan elegan. Tak hanya itu saja, grille depan pun dibuat lebih lebar dan dibentuk dengan gaya yang begitu sporty sehingga mampu menampilkan tampilan yang sangat menawan. Fog lamp terbaru pun juga turut terpasang manis pada bodi bagian depan Toyota Agya ini di mana nantinya akan memancarkan cahaya yang akan membantu si pengemudi dalam berkendara ketika dalam kondisi cuaca hujan lebat atau pun berkabut tebal. Lalu, pada sisi samping sebenarnya tak terlalu berbeda jauh dengan versi sebelumnya. Hanya saja untuk tampilan samping dari Toyota Agya facelift ini dibuat cenderung lebih sporty di mana terdapat sebuah garis lurus yang membujur dari depan sampai belakang di atas side skirt yang didesain elegan sehingga tampak lebih menarik. Kemudian, menginjak pada sektor belakang, Toyota Agya facelift ini akan dibekali kombinasi lampu belakang yang dibuat cukup simpel namun tetap memperlihatkan kesan modern. Tak cukup sampai di situ saja, pada bagian belakang pun juga terdapat sebuah spoiler kecil dengan High Mount Stop Lamp. Dengan begitu, secara keseluruhan pun bisa dipastikan bahwa sektor eksterior dari spesifikasi Toyota Agya ini memang memperlihatkan tampilan yang lebih segar dengan gaya elegan berciri city car modern.</p>\r\n'),
(2, '7', 'CALYA', '<p>Di babak awal dalam pembahasan soal spesifikasi Toyota Calya facelift ini, Mas Sena akan memulai penjelasan detail dari sisi eksteriornya. Desain baru yang diterapkan pada mobil LCGC ini memang cukup menarik dan terkesan lebih modern. Betapa tidak, mengusung slogan &ldquo;Partner ini Times&rdquo;, model Calya terbaru ini mengusung konsep mobil kekinian yang sangat apik dan berkesan. Tampak pada wajahnya, Toyota Calya mendapat gubahan berupa lampu depan berteknologi LED yang dibuat lebih agresif khas mobil MPV. Sehingga, selain memberikan tampilan wajah yang anggun, tentunya akan mampu memberikan pencahayaan yang maksimal dan efektif. Bahkan, tak lupa juga grille Dark Chrome Element yang lebih besar dengan 3 garis disertai logo Toyota di tengahnya membuatnya tampil lebih bersahabat. Menemani grille depan, mobil ini juga sudah dilengkapi fog lamp dengan bentuk yang sedikit memanjang ke lampu utama yang disematkan pada bagian depan di sisi kanan kiri sebagai fitur lampu fungsional untuk menembus kabut tebal. Kemudian, di bagian sisi kanan dan kiri, Toyota Calya menerapkan pembaruan yang lebih simple dan tak terlalu signifikan dari versi sebelumnya. Dimana, tampak garis tipis yang melewati handle door hingga belakang. Tak sampai di situ saja, pada bagian bodi belakang, pembaruan pada mobil ini agaknya tak terlalu berubah banyak. Masih mengusung stoplamp yang membentuk siku disertai wiper tunggal sebagai pembersih kaca belakang. Meski demikian, tetap saja desain bodi belakangnya tetap lebih terkesan fresh. Tentunya, pembaruan desain eksterior pada spesifikasi Toyota Calya ini akan memberikan kesan tersendiri yang lebih fresh dan cenderung modern dengan konsep mobil keluarga masa kini.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `mobil_foto`
--

CREATE TABLE IF NOT EXISTS `mobil_foto` (
  `id_foto_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `id_mobil` varchar(12) NOT NULL,
  `mobil` text NOT NULL,
  `harga` varchar(50) NOT NULL,
  `file_foto` varchar(200) NOT NULL,
  PRIMARY KEY (`id_foto_mobil`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `mobil_foto`
--

INSERT INTO `mobil_foto` (`id_foto_mobil`, `id_mobil`, `mobil`, `harga`, `file_foto`) VALUES
(10, '9', 'RUSH ', '249.000.000', '9-4783.png'),
(9, '8', 'AVANZA', '234.700.000', '8-9470.png'),
(8, '7', 'CALYA', '162.600.000', '7-9824.png'),
(7, '6', 'AGYA', '157.200.000', '6-568.png'),
(11, '10', 'INNOVA', '286.100.000', '10-6541.jpg'),
(12, '11', 'FORTUNER', ' 479.700.00', '11-3395.jpg'),
(13, '12', 'VOXY', '451.200.000', '12-5034.jpg'),
(14, '13', 'HIACE', '458.800.000', '13-209.jpg'),
(15, '19', 'VIOS', '293.100.000', '19-4095.jpg'),
(17, '14', 'YARIS', '274.600.000', '14-6783.jpg'),
(18, '15', 'SIENTA', '285.400.000', '15-1829.jpg'),
(19, '20', 'HILUX SC', '228.200.000', '20-6795.jpg'),
(20, '16', 'C-HR', '458.500.000', '16-1156.jpg'),
(21, '17', 'COROLLA ALTIS', '404.500.000', '17-6697.jpg'),
(22, '18', 'CAMRY', '490.700.000', '18-1084.jpg'),
(23, '21', 'ALPHARD ', '1.085.800.000', '21-1789.jpg'),
(24, '22', 'LAND CRUISER', '1.949.100.000', '22-6070.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mobil_foto_lain`
--

CREATE TABLE IF NOT EXISTS `mobil_foto_lain` (
  `id_foto_mobil_lain` int(11) NOT NULL AUTO_INCREMENT,
  `id_mobil` varchar(12) NOT NULL,
  `mobil` text NOT NULL,
  `file_foto` varchar(200) NOT NULL,
  PRIMARY KEY (`id_foto_mobil_lain`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mobil_foto_lain`
--


-- --------------------------------------------------------

--
-- Table structure for table `mobil_spek`
--

CREATE TABLE IF NOT EXISTS `mobil_spek` (
  `id_spek` int(11) NOT NULL AUTO_INCREMENT,
  `id_mobil` varchar(20) NOT NULL,
  `mobil` varchar(30) NOT NULL,
  `spek` text NOT NULL,
  `kapasitas` varchar(300) NOT NULL,
  `power` text NOT NULL,
  `torsi` text NOT NULL,
  `transmisi` text NOT NULL,
  `body_size` text NOT NULL,
  `berat` text NOT NULL,
  `turning` text NOT NULL,
  `wheelbase` text NOT NULL,
  `ground` text NOT NULL,
  `tangki` text NOT NULL,
  `suspensi_depan` text NOT NULL,
  `suspensi_belakang` text NOT NULL,
  `ban` text NOT NULL,
  `rem_depan` text NOT NULL,
  `rem_belakang` text NOT NULL,
  PRIMARY KEY (`id_spek`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mobil_spek`
--

INSERT INTO `mobil_spek` (`id_spek`, `id_mobil`, `mobil`, `spek`, `kapasitas`, `power`, `torsi`, `transmisi`, `body_size`, `berat`, `turning`, `wheelbase`, `ground`, `tangki`, `suspensi_depan`, `suspensi_belakang`, `ban`, `rem_depan`, `rem_belakang`) VALUES
(1, '6', 'AGYA', '<h3>&nbsp;</h3>\r\n\r\n<p><strong>Berbekal Interior Mewah dengan Fitur Canggih Berikan Kenyamanan Ekstra</strong></p>\r\n\r\n<p>Setelah kita meraba pada bagian luarnya, kini waktunya kita untuk beranjak pada sektor berikutnya, yaitu bagian kabin interior dari spesifikasi Toyota Agya. Dihadirkan sebagai model facelift tentu saja pihak Toyota akan membuat mobil buatannya ini menjadi lebih modern dan lebih segar dari versi sebelumnya, termasuk juga pada sektor interiornya. Hal itu pun bisa dilihat bagaimana ruang kabin dari Toyota Agya ini yang dibuat cukup pas untuk sekelas city car yang mampu menampung antara 4 sampai 5 penumpang yang sudah termasuk dengan pengemudinya. Namun, hal yang cukup menarik perhatian Mas Sena yaitu pada sektor dashboard. Pasalnya, bagian dashboard pada Agya facelift ini sudah dilengkapi dengan beragam fitur canggih, seperti paket New Advance Entertainment lengkap dengan sistem audio berupa radio AM/FM, pemutar CD, dan pengontrol suara. Tak hanya itu, pada Toyota Agya ini sambungan Bluetooth dan soket USB pun juga disediakan pada bagian dashboard nya sehingga pengguna bisa memainkan musik sesuka selera tanpa perlu menggunakan kaset. Bahkan, Audio 2DIN pun juga turut disematkan pada Toyota Agya ini yang mampu menghasilkan suara musik yang begitu menggelegar dan membahana. Di sisi lain, pada bagian pengemudi pun sudah dilengkapi juga dengan fitur Audio Steering Switch yang begitu fungsional pada sektor kemudinya. Sehingga, pengemudi bisa mengontrol pemutar musik pada Toyota Agya tanpa harus menjangkau panel yang berada di bagian dashboard tengah. Tak sampai di situ saja, pada bagian jok dari Agya facelift ini juga sudah dilengkapi dengan Semi Bucket Seat yang dibuat dari bahan material berupa kain yang lembut sehingga akan membuat setiap pengguna nyaman ketika menduduki jok. Tentu, dengan bekalan spesifikasi Toyota Agya pada bagian interiornya ini menjadi hal yang mampu menghipnotis para konsumen.</p>\r\n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '7', 'CALYA', '<p><strong>Interior Lebih Elegan dengan Dominasi Warna Dark Brown Disertai Fitur Hiburan Modern</strong></p>\r\n\r\n<p>Di sisi lain, kini Mas Sena akan memasuki ruang kabin atau interior dari spesifikasi Toyota Calya terbaru ini. Tampaknya, Toyota memang ingin memberikan kenyamanan penuh kepada para penumpang mobil ini. Hal itu tersampaikan melalui konsep pembaruan pada ruang kabinnya yang Mas Sena nilai lebih modern dan fresh. Hal itu bisa dilihat dari dasboard multilayer yang mengkombinasikan warna Dark Brown and Black sehingga tampak lebih elegan. Bahkan, pada interior dari Toytoa Calya ini pun sudah disediakan Head Unit di bagian dashboard tengah yang dilengkapi layar sentuh modern guna menampilkan beberapa menu pilihan agar memudahkan penumpangnya dalam mengoperasikan sistem fitur hiburan. Selain itu, di atas layar sentuh ini juga sudah dilengkapi beberapa menu fitur lain yang kompatibel, seperti iPod/iPhone Connectivity, DVD Player, USB, Bluetooth, dan fitur AUX. Di samping itu, pada kursi penumpang baris pertama, juga sudah dilengkapi New Under Seta Compartment Tray sebagai ruang penyimpanan guna menyimpan barang secara lebih aman. Sementara itu, di sektor kursi pengemudi, kini sudah menggunakan setir kemudi baru yang dilengkapi Audio Steering Switch guna memudahkan pengemudi dalam mengatur audio tanpa harus kehilangan fokus saat mengendarai mobil ini. Di lain sisi, untuk secara keseluruhan pada ruang kabin ini juga sangat menarik. Pasalnya, kali ini Toyota sudah menggunakan pewarnaan kursi Dark Brown yang dibuat dari bahan cukup berkualitas untuk memaksimalkan penumpang ketika menduduki kursi. Tentu saja, dengan sisi interior atau kabin yang begitu fresh dan modern pada spesifikasi Toyota Calya tersebut maka akan membuat para penumpang semakin betah berlama-lama dalam kabin mobil.</p>\r\n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '8', 'AVANZA', '<h3>Desain Eksterior Toyota Avanza 2019</h3>\r\n\r\n<p>Perubahan apa saja dari mobil Toyota Avanza facelift jika dibandingkan dengan mobil Grand New Avanza? Perubahan dari mobil Avanza facelift ini sangat terlihat sekali pada tampilan dibagian depan.</p>\r\n\r\n<p>Eksterior Depan</p>\r\n\r\n<p>Pada desain grill radiator bagian depan bernuansa garis chrome dan ukuran lebih lebar. Bagian bumper bawah ada sebuah ornamen grill berwarna hitam dan menyatu dengan lampu kabut. Perubahan juga terdapat pada desain lampu kabut bagian depan yang berbentuk segitiga dan menggunakan dari lampu halogen.</p>\r\n\r\n<p>Selain dari itu, pada lampu utama depan juga mengalami perubahan desain. Perubahan yang paling Terlihat pada desain lampu dengan dua tingkat yang mirip seperti pada desain Toyota Vellfire. Pada bagian lampu bohlam depan atas juga sudah menggunakan LED, sedangkan pada lampu sein masih menggunakan lampu halogen. Untuk bagian kap mesin Toyota New Avanza ada terdapat lekukan dari sisi kiri dan sisi kanan, jadi desain kap mesin masih sama seperti Grand New Avanza.</p>\r\n\r\n<p>Eksterior Samping</p>\r\n\r\n<p>Perubahan pada desain bagian samping mobil New Avanza, memang tidak banyak perubahan dibandingkan dengan Grand New Avanza terdahulu. Pada desain body molding samping bisa dibilang masih sama dan ada terdapat emblem Dual VVT-i pada samping kanan dan kiri bawah kaca spion yang juga terpasangi electric mirror. Desain pada velg alloy juga berubah, walaupun tidak begitu kelihatan.</p>\r\n\r\n<p>Eksterior Belakang</p>\r\n\r\n<p>Pada bagian belakang mobil, perubahan desain mobil terlihat sekali pada lampu belakang terdapat tambahan yang menyatu dengan ke tuas pintu bagasi belakang. Serta dibagian pintu bagasi ada terdapat dua lampu reflektor warna merah. Sedangkan untuk bagian bamper juga ada mengalami perubahan pada desain lampu reflektor di bagian kanan dan bagian kiri bamper yang merupakan halogen.</p>\r\n\r\n<p>Lampu rem di spoiler atas belakang juga mengalami perubahan desain, dan pada semua desain lampu belakang yang sangat terlihat sekali perubahannya, yang memang ditujukan sebagai faktor keselamatan pada saat berkendara. Untuk warna terdapat 7 varian warna, yaitu Dark Blue, Bronze, Dark Red Mica Metallic, Grey Metallic, Black Metallic, Silver Metallic, dan White.</p>\r\n\r\n<h3>Desain Interior Toyota Avanza 2019</h3>\r\n\r\n<p>Dashboard Tengah Toyota Avanza Facelift 2019</p>\r\n\r\n<p>Pada Toyota New Avanza Facelift, dashboard mengalami perubahan dengan menggunakan head unit baru. Untuk tipe Toyota New Avanza 1.5 G, sudah dilengkapi dengan head unit touch screen &amp; iPod ready. Pada bagian head unit bawah layar terdapat sebuah tombol lampu hazard dan lampu peringatan untuk sabuk pengaman, yang akan menyala jika pengemudi atau penumpang dibagian depan tidak menggunakan sabuk pengaman pada saat mobil sedang berjalan. Dibagian bawah lampu hazard dan lampu peringatan sabuk pengaman ini, terdapat sebuah lubang pipih yang bisa digunakan untuk tempat kartu toll. Warna dari dashboard bagian bawah berwarna coklat terang, bagian atas berwarna gelap dan pada karpet bawah berwarna hitam.</p>\r\n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `user` varchar(12) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username`, `password`, `email_admin`, `user`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Fransmarbun206@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `id_testimoni` int(11) NOT NULL AUTO_INCREMENT,
  `testimoni` text NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `file_foto` varchar(200) NOT NULL,
  PRIMARY KEY (`id_testimoni`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `testimoni`
--


-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `id_mobil` varchar(20) NOT NULL,
  `mobil` varchar(30) NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `id_mobil`, `mobil`, `link`) VALUES
(1, '6', 'AGYA', 'https://www.youtube.com/embed/lYM7CeI8znI'),
(2, '7', 'CALYA', 'https://www.youtube.com/embed/2UjR6qeObRs'),
(3, '8', 'AVANZA', 'https://www.youtube.com/embed/qT3MbGJ4ejs');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
