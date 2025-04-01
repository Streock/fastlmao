DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(500) NOT NULL,
  `providerID` varchar(500) NOT NULL,
  `appDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time DEFAULT NULL,
  `member` varchar(500) NOT NULL,
  `rememberNoti` int(11) NOT NULL DEFAULT 0,
  `lastRememberNoti` int(11) NOT NULL DEFAULT 0,
  `providerNoti` int(11) NOT NULL DEFAULT 0,
  `paymentKey` varchar(500) DEFAULT NULL,
  `paymentID` varchar(500) DEFAULT NULL,
  `payment` varchar(200) NOT NULL DEFAULT 'Nakit',
  `paymentStatus` int(11) NOT NULL DEFAULT 0,
  `memnuniyetNoti` int(11) NOT NULL DEFAULT 0,
  `coming` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `appointments` (`id`, `service`, `providerID`, `appDate`, `startTime`, `endTime`, `member`, `rememberNoti`, `lastRememberNoti`, `providerNoti`, `paymentKey`, `paymentID`, `payment`, `paymentStatus`, `memnuniyetNoti`, `coming`) VALUES 
	(85, 2, 2, '2022-09-08', '16:00:00', '17:00:00', 28, 0, 1, 0, '', '', 'Nakit', 0, 0, 0)
	,(86, 1, 1, '2022-09-21', '10:00:00', '11:00:00', 27, 1, 1, 0, '', '', 'Nakit', 0, 0, 0)
	,(87, 1, 1, '2022-10-05', '11:00:00', '12:00:00', 30, 1, 1, 0, '', '', 'Nakit', 0, 0, 0)
	,(88, 1, 1, '2022-11-03', '10:00:00', '11:00:00', 28, 1, 1, 0, '', '', 'Nakit', 0, 0, 0)
	,(89, 1, 1, '2022-11-03', '11:00:00', '12:00:00', 28, 1, 1, 0, '', '', 'Nakit', 0, 0, 0)
	,(90, 1, 1, '2022-11-03', '12:00:00', '13:00:00', 28, 1, 1, 0, '', '', 'Nakit', 0, 0, 0)
	,(94, 1, 1, '2022-11-03', '13:00:00', '14:00:00', 28, 1, 1, 0, '', '', 'Nakit', 0, 0, 0)
	,(95, 1, 1, '2022-11-03', '14:00:00', '15:00:00', 28, 1, 1, 0, '', '', 'Nakit', 0, 0, 0)
	,(96, 1, 1, '2023-01-18', '19:00:00', '20:00:00', 28, 0, 1, 0, '', '', 'Nakit', 0, 0, 0)
	,(97, 1, 1, '2023-01-19', '12:00:00', '13:00:00', 28, 0, 1, 0, '', '', 'Nakit', 0, 0, 0)
	,(110, 1, 1, '2023-01-23', '10:00:00', '11:00:00', 28, 0, 0, 0, 'aJoR9209', 'aJoR92099RY9L9V', 'Kredi', 1, 0, 0)
	,(111, 1, 1, '2023-01-23', '11:00:00', '12:00:00', 28, 0, 0, 0, '', '', 'Nakit', 0, 0, 0)
	,(112, 1, 1, '2023-01-23', '12:00:00', '13:00:00', 28, 0, 0, 0, 'ELtQa402', 'ELtQa4029skk5Za', 'Kredi', 1, 0, 0)
	,(113, 1, 1, '2023-01-23', '13:00:00', '14:00:00', 28, 0, 0, 0, 'CJpn2768', 'CJpn2768dA99ovN', 'Kredi', 1, 0, 0)
	,(114, 1, 1, '2023-01-24', '23:00:00', '16:00:00', 28, 0, 1, 0, 'ixndA261', 'ixndA261B469b', 'Kredi', 0, 1, 0)
	,(115, 1, 1, '2023-01-27', '13:00:00', '14:00:00', 33, 0, 1, 0, '', '', 'Nakit', 0, 1, 0)
	,(116, 3, 2, '2023-01-26', '13:00:00', '15:00:00', 34, 0, 1, 0, 'ZCw3t027', 'ZCw3t027O5N0', 'Kredi', 1, 1, 0)
	,(117, 2, 2, '2023-01-28', '14:00:00', '15:00:00', 35, 0, 1, 0, '', '', 'Nakit', 0, 1, 0)
	,(118, 2, 1, '2023-01-30', '20:00:00', '21:00:00', 28, 0, 0, 0, '', '', 'Kredi', 1, 0, 1)
	,(119, 1, 1, '2023-02-02', '16:00:00', '17:00:00', 28, 0, 0, 0, '', '', 'Havale', 0, 0, 0)
	,(120, 1, 1, '2023-02-01', '16:00:00', '17:00:00', 28, 0, 0, 0, '', '', 'Havale', 0, 0, 0)
	,(121, 1, 1, '2023-01-29', '14:00:00', '15:00:00', 1, 0, 0, 0, '', '', '', 0, 0, 0)
	,(122, 2, 1, '2023-02-10', '11:00:00', '12:00:00', 28, 0, 0, 0, '', '', 'Havale', 0, 0, 0)
	,(123, 3, 2, '2023-02-08', '15:00:00', '17:00:00', 40, 0, 0, 0, '', '', 'SalonKrediKarti', 0, 0, 0)
	,(124, 1, 1, '2023-02-09', '11:00:00', '12:00:00', 41, 0, 0, 0, '', '', 'Nakit', 1, 0, 1)
	,(125, 1, 1, '2023-02-09', '18:00:00', '19:00:00', 41, 0, 0, 0, '', '', 'Nakit', 0, 0, 0)
	,(126, 1, 1, '2023-02-09', '10:00:00', '11:00:00', 42, 0, 0, 0, '', '', 'Kredi', 1, 0, 1)
	,(127, 2, 1, '2023-02-23', '13:00:00', '14:00:00', 28, 0, 0, 0, '', '', 'Havale', 0, 0, 0)
	,(128, 3, 2, '2023-02-17', '10:00:00', '12:00:00', 43, 0, 0, 0, '', '', 'Nakit', 0, 0, 0)
	,(129, 2, 1, '2023-02-15', '11:00:00', '12:00:00', 41, 0, 0, 0, '', '', 'Nakit', 0, 0, 0)
	,(130, 3, 2, '2023-02-15', '21:00:00', '23:00:00', 41, 0, 0, 0, '', '', 'Havale', 1, 0, 0)
	,(131, 2, 2, '2023-02-16', '17:00:00', '18:00:00', 40, 0, 0, 0, '', '', '', 0, 0, 0);

DROP TABLE IF EXISTS `banks`;
CREATE TABLE `banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bankName` varchar(500) NOT NULL,
  `bankAccountName` varchar(500) NOT NULL,
  `bankCode` varchar(500) NOT NULL,
  `bankAccountCode` varchar(500) NOT NULL,
  `bankIban` varchar(500) NOT NULL,
  `bankStatus` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `banks` (`id`, `bankName`, `bankAccountName`, `bankCode`, `bankAccountCode`, `bankIban`, `bankStatus`) VALUES 
	(1, 'Garanti Bankası', 'Alperen Belet', 8545, 3455645524, 'TR516456454152115454', 1);

DROP TABLE IF EXISTS `business_case`;
CREATE TABLE `business_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caseDate` date NOT NULL,
  `casePaymentMethod` varchar(500) DEFAULT NULL,
  `caseAmount` int(11) NOT NULL,
  `caseNote` longtext CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `caseType` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
INSERT INTO `business_case` (`id`, `caseDate`, `casePaymentMethod`, `caseAmount`, `caseNote`, `caseType`) VALUES 
	(10, '2023-01-30', 'Havale', 13, 'test', 1)
	,(12, '2023-01-30', 'Kredi', 100, 'Hizmet Ödemesi', 1)
	,(16, '2023-01-30', 'Havale', 666, 'Alperen Belet- Sipariş Ödemesi | - test2', 1)
	,(17, '2023-01-30', 'Havale', 4536, 'Alperen Belet - Sipariş Ödemesi | - test2', 2)
	,(18, '2023-01-30', 'Havale', 444, 'Alperen Belet- Sipariş Ödemesi | - test2', 1)
	,(19, '2023-02-01', 'Havale', 324, '', 2)
	,(20, '2023-02-01', 'Havale', 500, 'yok', 1)
	,(21, '2023-02-09', 'Nakit', 150, 'Hizmet Ödemesi', 1)
	,(22, '2023-02-09', 'Kredi', 150, 'Hizmet Ödemesi', 1)
	,(23, '2023-02-09', 'Nakit', 50, 'Alperen Belet - Sipariş Ödemesi | - test2', 1)
	,(24, '2023-02-09', 'Nakit', 100, 'Doğalgaz', 2)
	,(25, '2023-02-15', 'Nakit', 1000, 'Derya Yılmaz - Sipariş Ödemesi | - test2', 1)
	,(26, '2023-02-15', 'Havale', 200, 'Hizmet Ödemesi', 1);

DROP TABLE IF EXISTS `canceled`;
CREATE TABLE `canceled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(500) NOT NULL,
  `providerID` varchar(500) NOT NULL,
  `appDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time DEFAULT NULL,
  `member` varchar(500) NOT NULL,
  `rememberNoti` int(11) NOT NULL DEFAULT 0,
  `lastRememberNoti` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `canceled` (`id`, `service`, `providerID`, `appDate`, `startTime`, `endTime`, `member`, `rememberNoti`, `lastRememberNoti`) VALUES 
	(1, 1, 1, '2023-01-19', '11:00:00', '12:00:00', 28, 0, 0)
	,(2, 1, 1, '2023-01-27', '10:00:00', '11:00:00', 28, 0, 0)
	,(3, 1, 1, '2023-01-16', '14:00:00', '15:00:00', 28, 0, 0)
	,(4, 1, 1, '2023-01-16', '14:00:00', '15:00:00', 28, 0, 0)
	,(5, 2, 1, '2023-01-27', '13:00:00', '14:00:00', 1, 0, 0);

DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `languages` (`id`, `name`, `code`) VALUES 
	(1, 'Türkçe', 'tr')
	,(6, 'English', 'en');

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) DEFAULT NULL,
  `phone` varchar(500) NOT NULL,
  `birthday` varchar(500) DEFAULT NULL,
  `birthdayTime` time NOT NULL DEFAULT '12:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `members` (`id`, `name`, `email`, `phone`, `birthday`, `birthdayTime`) VALUES 
	(1, 'Test Müşteri', 'testmusteri@hotmail.com', 05340737273, '', '12:00:00')
	,(4, 'mustaaf karargülle', '', 05324654598, '', '12:00:00')
	,(25, 'alperen', '', 5348737273, '', '12:00:00')
	,(26, 'Alperen Belet', '', 5324654598, '', '12:00:00')
	,(27, 'yusuf demirkiran', '', 05342966113, '', '12:00:00')
	,(28, 'Alperen Belet', '', 5340737273, '2001-01-24', '12:00:00')
	,(33, 'Yasin Onur AYDIN', '', 5530142116, '', '12:00:00')
	,(34, 'ozan', '', 5343130256, '', '12:00:00')
	,(35, 'Karaman esat', '', 5316936219, '', '12:00:00')
	,(36, 'Alperen Belet', '', '', '', '12:00:00')
	,(40, 'Cengiz Arslan', '', 506105093, '', '12:00:00')
	,(41, 'qewqead fdsffsd', '', 5370642171, '', '12:00:00')
	,(42, 'Sefa UYANIK', '', 5370642178, '', '12:00:00');

DROP TABLE IF EXISTS `notification_settings`;
CREATE TABLE `notification_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `template` varchar(1000) NOT NULL,
  `sendDays` varchar(10) NOT NULL,
  `rememberTime` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `notification_settings` (`id`, `name`, `template`, `sendDays`, `rememberTime`, `status`) VALUES 
	(1, 'Randevu Alındı', '{siteAdi} Sayın {uyeAdi}, {tarih} günü {saat} saati için {hizmet} randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000', 0, 0, 1)
	,(2, 'Randevu Hatırlatma', '{siteAdi} Sayın {uyeAdi}, {tarih} günü {saat} saati için {hizmet} randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000', 1, 2, 1)
	,(3, 'Randevu Tekrarlama', '{siteAdi} Sayın {uyeAdi}, daha önce almış olduğunuz {hizmet} hizmetinin kalıcılığının sağlanması adına tekrarlanması gerekmektedir. Randevu almak için; https://randevu.eraldemo.com', 10, 0, 0)
	,(4, 'Randevu Düzenlendi', '{siteAdi} Sayın {uyeAdi}, Randevunuz güncellenmiştir.{hizmet} randevunuz {yenitarih} günü {yenisaat} saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000', 0, 0, 1)
	,(5, 'Doğum Günü Mesajı', '{siteAdi} Merhaba, {uyeAdi} doğum günün kutlu olsun!\r\nDoğum gününe özel tam %20 indirim! Hemen randevu al! {siteAdres}', 0, 0, 1)
	,(6, 'Memnuniyet Mesajı', '{siteAdi} Sayın {uyeAdi} bizi tercih ettiğiniz için teşekkür ederiz!', 0, 2, 1);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products` varchar(1000) DEFAULT NULL,
  `memberID` int(11) DEFAULT NULL,
  `orderDate` varchar(500) DEFAULT NULL,
  `paymentStatus` int(11) DEFAULT 0,
  `paymentMethod` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `orderFiyat` varchar(200) DEFAULT NULL,
  `orderProvider` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
INSERT INTO `orders` (`id`, `products`, `memberID`, `orderDate`, `paymentStatus`, `paymentMethod`, `orderFiyat`, `orderProvider`) VALUES 
	(27, 11, 39, '30-01-2023 03:17:00', 0, 'Havale', 34, 8)
	,(28, 11, 36, '30-01-2023 04:02:00', 0, 'Havale', 100, 8)
	,(29, 11, 36, '30-01-2023 04:06:00', 1, 'Havale', 200, 8)
	,(30, 11, 36, '30-01-2023 16:06:00', 1, 'Nakit', 999, 8)
	,(31, 11, 36, '30-01-2023 16:17:49', 1, 'Havale', 666, 8)
	,(32, 11, 36, '30-01-2023 16:19:00', 1, 'Havale', 4536, 8)
	,(33, 11, 36, '02-02-2023 13:50:36', 1, 'Havale', 444, 8)
	,(34, 11, 42, '09-02-2023 06:24:52', 1, 'Nakit', 100, 8)
	,(35, 11, 42, '15-02-2023 20:40:00', 1, 'Nakit', 1000, 2);

DROP TABLE IF EXISTS `payed_vested`;
CREATE TABLE `payed_vested` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `providerID` int(11) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `payed_vested` (`id`, `providerID`, `amount`, `date`) VALUES 
	(1, 8, 30, '30-01-2023 15:42:21');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` longtext NOT NULL,
  `aciklama` longtext NOT NULL,
  `barcode` varchar(500) DEFAULT NULL,
  `fiyat` varchar(20) NOT NULL,
  `durum` int(11) NOT NULL DEFAULT 1,
  `stok` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
INSERT INTO `products` (`id`, `ad`, `aciklama`, `barcode`, `fiyat`, `durum`, `stok`) VALUES 
	(9, 'test', 'test', 3245634634, 34, 1, 0)
	,(11, 'test2', 'asd', 3456345, 100, 1, 43);

DROP TABLE IF EXISTS `provider`;
CREATE TABLE `provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `services` varchar(500) NOT NULL,
  `workingTime` varchar(500) NOT NULL,
  `breakTime` varchar(500) DEFAULT NULL,
  `renk` varchar(20) DEFAULT '#000',
  `yazirenk` varchar(100) NOT NULL DEFAULT '#fff',
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `working` int(11) NOT NULL DEFAULT 0,
  `break_start_time` date DEFAULT NULL,
  `break_end_time` date DEFAULT NULL,
  `breakstatus` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(500) DEFAULT NULL,
  `smsNoti` int(11) DEFAULT 0,
  `smsNumber` varchar(100) DEFAULT NULL,
  `vestedAmount` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `provider` (`id`, `name`, `email`, `password`, `services`, `workingTime`, `breakTime`, `renk`, `yazirenk`, `isAdmin`, `working`, `break_start_time`, `break_end_time`, `breakstatus`, `photo`, `smsNoti`, `smsNumber`, `vestedAmount`) VALUES 
	(1, 'Demo Hesap', 'demo@demo.com', '$2y$10$P4.5WlgOEH951FHm.EfHt.SVmdlRl7iO3TUaztVPtdX2a4aeWQfvm', '2,1', '10:00-22:00', 2, '#000000', '#fff', 1, 1, '2023-01-18', '2023-01-19', 0, '25kShbFZVgoZp3Te55famE1dk6o5.webp', 0, '', '');

DROP TABLE IF EXISTS `redirect`;
CREATE TABLE `redirect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` longtext NOT NULL,
  `appointment` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `redirect` (`id`, `url`, `appointment`) VALUES 
	(1, 'jjCiy606', 96)
	,(2, 'UuaaJ664', 97)
	,(15, 'JAbTR209', 110)
	,(16, 'v5aiS388', 111)
	,(17, 'tco7o402', 112)
	,(18, 'WnKB6768', 113)
	,(19, 'gN7Wy261', 114)
	,(20, 'Ehng8180', 115)
	,(21, 'EcbVs027', 116)
	,(22, 'BVmSE449', 117)
	,(23, 'xV97F911', 118)
	,(24, 'fcLkh051', 119)
	,(25, '8Luxy730', 120)
	,(26, 'InaqS591', 121)
	,(27, 'RoKKw085', 122)
	,(28, '5YQcD479', 123)
	,(29, 'wGAyc555', 124)
	,(30, 'kxhhZ726', 125)
	,(31, 'gSKd1775', 126)
	,(32, 'Pj4J4482', 127)
	,(33, 'Gdp8V370', 128)
	,(34, 'Tgjsi680', 129)
	,(35, 'jIJGJ286', 130)
	,(36, 'KZ4OB381', 131);

DROP TABLE IF EXISTS `remember_me`;
CREATE TABLE `remember_me` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `expired_time` varchar(255) NOT NULL,
  `user_browser` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=381 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
INSERT INTO `remember_me` (`id`, `user_id`, `remember_token`, `expired_time`, `user_browser`) VALUES 
	(313, 86, '015154644473056efb1d1a80ac6493167a50c0cb466c663a8700df1311dc2055', 1680139661, '8e5a577e33f5bc3f7099260165cd35c7')
	,(338, 8, 'cf3d437c50b91430cd5a271b35e84e53ce5b5ab9a18f08544d1b3cc60b9a344d', 1707876471, 'b9cbd8dc13f19f9e7eb854f472bfa274')
	,(380, 1, '1e1fb4e19980ab1e6e12fdc3454ba0f579f9bcffaf91fbe2ebac17d00431f7ee', 1723571088, '15c2f6f9416d00cec8b4f729460293c0');

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(500) NOT NULL,
  `serviceDesc` varchar(500) NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `photo` varchar(500) NOT NULL,
  `hour` varchar(10) NOT NULL,
  `againDay` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `services` (`id`, `serviceName`, `serviceDesc`, `price`, `photo`, `hour`, `againDay`, `status`) VALUES 
	(1, 'Saç Kesimi', 'Saç Kesimi', 150, '', 1, 7, 1)
	,(2, 'Saç Yıkama', 'Saç Yıkama', 100, '', 1, 0, 1)
	,(3, 'Cilt Bakımı', 'Cilt Bakımı', 200, '', 2, 3, 1);

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siteName` varchar(500) NOT NULL,
  `siteDesc` varchar(500) NOT NULL,
  `siteKeyword` varchar(500) NOT NULL,
  `siteLogo` varchar(500) DEFAULT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL,
  `periot` varchar(500) NOT NULL,
  `emailSystem` int(11) NOT NULL DEFAULT 0,
  `smsSystem` int(11) NOT NULL DEFAULT 0,
  `cancelSystem` int(11) NOT NULL DEFAULT 0,
  `cancelLimit` int(11) NOT NULL DEFAULT 1,
  `cancelMessage` longtext NOT NULL,
  `caseSystem` int(11) NOT NULL DEFAULT 0,
  `orderSystem` int(11) NOT NULL DEFAULT 0,
  `providerSmsSystem` int(11) NOT NULL DEFAULT 0,
  `providerSmsTime` int(11) NOT NULL DEFAULT 1,
  `paytrSystem` int(11) NOT NULL DEFAULT 0,
  `paytrId` varchar(500) DEFAULT NULL,
  `paytrKey` varchar(500) DEFAULT NULL,
  `paytrSalt` varchar(500) DEFAULT NULL,
  `birthdaySystem` int(11) NOT NULL DEFAULT 0,
  `eftSystem` int(11) NOT NULL DEFAULT 0,
  `salonCreditCardSystem` int(11) NOT NULL DEFAULT 0,
  `stockSystem` int(11) NOT NULL DEFAULT 0,
  `orderProviderSystem` int(11) NOT NULL DEFAULT 0,
  `vestedSystem` int(11) NOT NULL DEFAULT 0,
  `vestedCommission` int(11) NOT NULL DEFAULT 0,
  `providerMonthSystem` int(11) NOT NULL DEFAULT 0,
  `langSystem` int(11) NOT NULL DEFAULT 0,
  `defaultLang` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `settings` (`id`, `siteName`, `siteDesc`, `siteKeyword`, `siteLogo`, `timeStart`, `timeEnd`, `periot`, `emailSystem`, `smsSystem`, `cancelSystem`, `cancelLimit`, `cancelMessage`, `caseSystem`, `orderSystem`, `providerSmsSystem`, `providerSmsTime`, `paytrSystem`, `paytrId`, `paytrKey`, `paytrSalt`, `birthdaySystem`, `eftSystem`, `salonCreditCardSystem`, `stockSystem`, `orderProviderSystem`, `vestedSystem`, `vestedCommission`, `providerMonthSystem`, `langSystem`, `defaultLang`) VALUES 
	(1, 'FastyGo Demo', 'FastyGo randevu yazılımı ile randevu yönetimi çok kolay!', 'FastyGo Demo, Randevu Yazılımı, FastyGo', 'eF0H14M24E66h23RuB2lTpn2SU2.webp', '09:00:00', '22:00:00', 60, 1, 0, 1, 2, 'Randevunuzda Iptal ve değişiklik için:', 1, 1, 1, 1, 0, 116643, '9j75ZfHGLhtB1Kpq', 'gZt5YmPZZgTkC4yW', 1, 1, 1, 1, 1, 1, 10, 1, 1, 'tr');

DROP TABLE IF EXISTS `sms_history`;
CREATE TABLE `sms_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member` varchar(500) DEFAULT NULL,
  `number` varchar(500) NOT NULL,
  `message` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `sms_history` (`id`, `member`, `number`, `message`, `time`) VALUES 
	(1, 1, 05340737273, '{siteAdi} Sayın {uyeAdi}, {tarih} günü {saat} saati için {hizmet} randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05.09.2022')
	,(2, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri, Randevunuz güncellenmiştir.Cilt Bakımı randevunuz  07 Eylül 2022 Çarşamba  günü 19:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:02:52')
	,(3, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri, Randevunuz güncellenmiştir.Cilt Bakımı randevunuz  07 Eylül 2022 Çarşamba  günü 11:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 08:03:38')
	,(4, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri, Randevunuz güncellenmiştir.Cilt Bakımı randevunuz  07 Eylül 2022 Çarşamba  günü 15:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 08:10:22')
	,(5, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri, Randevunuz güncellenmiştir.Cilt Bakımı randevunuz  07 Eylül 2022 Çarşamba  günü 18:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 08:11:54')
	,(6, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri,  07 Eylül 2022 Çarşamba  günü 12:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 08:13:06')
	,(7, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri,  06 Eylül 2022 Salı  günü 12:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:25:44')
	,(8, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri,  06 Eylül 2022 Salı  günü 12:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:27:40')
	,(9, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri, daha önce almış olduğunuz Saç Kesimi hizmetinin kalıcılığının sağlanması adına tekrarlanması gerekmektedir. Randevu almak için; https://ademyilmaz.net', '05/09/2022 05:44:44')
	,(10, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri, daha önce almış olduğunuz Saç Kesimi hizmetinin kalıcılığının sağlanması adına tekrarlanması gerekmektedir. Randevu almak için; https://ademyilmaz.net', '05/09/2022 05:46:19')
	,(11, 23, 05321212121, 'Adem Yılmaz Hair Studio Sayın test,  06 Eylül 2022 Salı  günü 21:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:47:00')
	,(12, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri,  06 Eylül 2022 Salı  günü 11:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:47:26')
	,(13, 23, 05321212121, 'Adem Yılmaz Hair Studio Sayın test,  06 Eylül 2022 Salı  günü 21:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:47:26')
	,(14, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri,  06 Eylül 2022 Salı  günü 11:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:49:24')
	,(15, 23, 05321212121, 'Adem Yılmaz Hair Studio Sayın test,  06 Eylül 2022 Salı  günü 21:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:49:25')
	,(16, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri,  06 Eylül 2022 Salı  günü 11:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:52:18')
	,(17, 23, 05321212121, 'Adem Yılmaz Hair Studio Sayın test,  06 Eylül 2022 Salı  günü 21:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:52:18')
	,(18, 23, 05321212121, 'Adem Yılmaz Hair Studio Sayın test,  06 Eylül 2022 Salı  günü 21:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:52:45')
	,(19, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri, daha önce almış olduğunuz Saç Kesimi hizmetinin kalıcılığının sağlanması adına tekrarlanması gerekmektedir. Randevu almak için; https://ademyilmaz.net', '05/09/2022 05:52:45')
	,(20, 23, 05321212121, 'Adem Yılmaz Hair Studio Sayın test,  06 Eylül 2022 Salı  günü 21:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:53:13')
	,(21, 23, 05321212121, 'Adem Yılmaz Hair Studio Sayın test,  06 Eylül 2022 Salı  günü 21:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:53:28')
	,(22, 23, 05321212121, 'Adem Yılmaz Hair Studio Sayın test,  06 Eylül 2022 Salı  günü 21:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 05:53:58')
	,(23, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri,  21 Eylül 2022 Çarşamba  günü 10:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 09:42:38')
	,(24, 24, 'sd', 'Adem Yılmaz Hair Studio Sayın sd,  01 Eylül 2022 Perşembe  günü 16:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 22:08:37')
	,(25, 24, 'sd', 'Adem Yılmaz Hair Studio Sayın sd,  15 Eylül 2022 Perşembe  günü 16:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 22:08:50')
	,(26, 25, 5348737273, 'Adem Yılmaz Hair Studio Sayın alperen,  07 Eylül 2022 Çarşamba  günü 16:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 22:09:20')
	,(27, 26, 5324654598, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 13:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 22:30:56')
	,(28, 24, 'sd', 'Adem Yılmaz Hair Studio Sayın sd,  07 Eylül 2022 Çarşamba  günü 13:00 saati için Cilt Bakımı randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 22:31:52')
	,(29, 24, 'sd', 'Adem Yılmaz Hair Studio Sayın sd,  07 Eylül 2022 Çarşamba  günü 13:00 saati için Cilt Bakımı randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 22:32:03')
	,(30, 27, 05342966113, 'Adem Yılmaz Hair Studio Sayın yusuf demirkiran,  06 Eylül 2022 Salı  günü 11:00 saati için Cilt Bakımı randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 22:36:09')
	,(31, 26, 5324654598, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  06 Eylül 2022 Salı  günü 19:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/09/2022 22:42:15')
	,(32, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 12:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 01:05:06')
	,(33, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 14:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 01:06:53')
	,(34, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  07 Eylül 2022 Çarşamba  günü 15:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 01:07:57')
	,(35, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 17:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 01:29:06')
	,(36, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 14:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 01:30:00')
	,(37, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 18:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 01:30:23')
	,(38, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 11:00 saati için Cilt Bakımı randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 01:44:29')
	,(44, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 11:00 saati için Cilt Bakımı randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:07:13')
	,(45, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Cilt Bakımı randevunuz  07 Eylül 2022 Çarşamba  günü 19:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:11:57')
	,(46, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Cilt Bakımı randevunuz  07 Eylül 2022 Çarşamba  günü 17:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:12:48')
	,(47, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Cilt Bakımı randevunuz  07 Eylül 2022 Çarşamba  günü 12:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:15:38')
	,(48, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  10 Eylül 2022 Cumartesi  günü 18:00 saati için Cilt Bakımı randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:17:10')
	,(49, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Cilt Bakımı randevunuz  07 Eylül 2022 Çarşamba  günü 20:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:17:30')
	,(50, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Cilt Bakımı randevunuz  10 Eylül 2022 Cumartesi  günü 12:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:17:56')
	,(51, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  06 Eylül 2022 Salı  günü 11:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:21:59')
	,(52, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  06 Eylül 2022 Salı  günü 12:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:22:12')
	,(53, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  06 Eylül 2022 Salı  günü 14:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:24:13')
	,(54, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  06 Eylül 2022 Salı  günü 19:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:24:51')
	,(55, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  06 Eylül 2022 Salı  günü 12:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:25:28')
	,(56, 28, 5340737273, 'test', '06/09/2022 02:26:17')
	,(57, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  06 Eylül 2022 Salı  günü 19:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:28:30')
	,(58, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  06 Eylül 2022 Salı  günü 12:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:28:46')
	,(59, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  06 Eylül 2022 Salı  günü 11:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:31:41')
	,(60, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  06 Eylül 2022 Salı  günü 12:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:31:53')
	,(61, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  06 Eylül 2022 Salı  günü 11:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:39:11')
	,(62, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 20:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 02:49:21')
	,(63, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 15:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 04:18:16')
	,(64, 30, 5411800228, 'Adem Yılmaz Hair Studio Sayın sadsa,  28 Eylül 2022 Çarşamba  günü 18:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 04:18:51')
	,(65, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 17:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 04:35:21')
	,(66, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  08 Eylül 2022 Perşembe  günü 17:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 04:39:30')
	,(67, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 13:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 05:02:02')
	,(68, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  14 Eylül 2022 Çarşamba  günü 17:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 05:05:16')
	,(69, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  08 Eylül 2022 Perşembe  günü 13:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 05:22:10')
	,(70, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 18:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 05:23:45')
	,(71, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 14:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 06:14:58')
	,(72, 26, 5324654598, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 22:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 06:51:24')
	,(73, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  08 Eylül 2022 Perşembe  günü 12:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 07:24:15')
	,(74, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  08 Eylül 2022 Perşembe  günü 10:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 07:28:35')
	,(75, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  06 Eylül 2022 Salı  günü 12:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '06/09/2022 19:27:58')
	,(76, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  21 Eylül 2022 Çarşamba  günü 11:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 00:17:06')
	,(77, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  08 Eylül 2022 Perşembe  günü 13:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 03:45:24')
	,(78, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  08 Eylül 2022 Perşembe  günü 17:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 03:45:24')
	,(79, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  08 Eylül 2022 Perşembe  günü 13:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 03:47:20')
	,(80, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 07:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 06:56:44')
	,(81, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 08:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 07:00:03')
	,(82, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 11:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 10:00:03')
	,(83, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 12:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 11:00:02')
	,(84, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 13:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 12:00:02')
	,(85, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 14:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 13:00:02')
	,(86, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 15:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 14:00:02')
	,(87, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 17:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 16:00:02')
	,(88, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 18:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 17:00:02')
	,(89, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 20:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 19:00:03')
	,(90, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  07 Eylül 2022 Çarşamba  günü 20:00 saati için Cilt Bakımı randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '07/09/2022 19:00:03')
	,(91, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  08 Eylül 2022 Perşembe  günü 17:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '08/09/2022 00:47:37')
	,(92, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  08 Eylül 2022 Perşembe  günü 16:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '08/09/2022 06:56:47')
	,(93, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  08 Eylül 2022 Perşembe  günü 16:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '08/09/2022 15:00:02')
	,(94, 27, 05342966113, 'Adem Yılmaz Hair Studio Sayın yusuf demirkiran,  21 Eylül 2022 Çarşamba  günü 10:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '09/09/2022 09:18:29')
	,(95, 27, 05342966113, 'Adem Yılmaz Hair Studio Sayın yusuf demirkiran,  21 Eylül 2022 Çarşamba  günü 10:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '21/09/2022 09:00:03')
	,(96, 27, 05342966113, 'Adem Yılmaz Hair Studio Sayın yusuf demirkiran, daha önce almış olduğunuz Saç Kesimi hizmetinin kalıcılığının sağlanması adına tekrarlanması gerekmektedir. Randevu almak için; https://ademyilmaz.net', '28/09/2022 00:00:02')
	,(97, 30, 5411800228, 'Adem Yılmaz Hair Studio Sayın sadsa,  05 Ekim 2022 Çarşamba  günü 11:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '04/10/2022 03:25:23')
	,(98, 30, 5411800228, 'Adem Yılmaz Hair Studio Sayın sadsa,  05 Ekim 2022 Çarşamba  günü 11:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '05/10/2022 10:00:03')
	,(99, 30, 5411800228, 'Adem Yılmaz Hair Studio Sayın sadsa, daha önce almış olduğunuz Saç Kesimi hizmetinin kalıcılığının sağlanması adına tekrarlanması gerekmektedir. Randevu almak için; https://ademyilmaz.net', '12/10/2022 00:00:03')
	,(100, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  03 Kasım 2022 Perşembe  günü 10:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '03/11/2022 01:27:16')
	,(101, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  03 Kasım 2022 Perşembe  günü 11:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '03/11/2022 01:40:46')
	,(102, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  03 Kasım 2022 Perşembe  günü 12:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '03/11/2022 01:41:01')
	,(103, 23, 05321212121, 'Adem Yılmaz Hair Studio Sayın test,  03 Kasım 2022 Perşembe  günü 13:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '03/11/2022 01:45:54')
	,(104, 31, 05313313131, 'Adem Yılmaz Hair Studio Sayın test asdfsa,  03 Kasım 2022 Perşembe  günü 13:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '03/11/2022 01:46:29')
	,(105, 32, 05621212121, 'Adem Yılmaz Hair Studio Sayın fvgv,  03 Kasım 2022 Perşembe  günü 13:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '03/11/2022 01:46:57')
	,(106, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  03 Kasım 2022 Perşembe  günü 13:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '03/11/2022 01:57:33')
	,(107, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  03 Kasım 2022 Perşembe  günü 14:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '03/11/2022 01:57:50')
	,(108, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  03 Kasım 2022 Perşembe  günü 10:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '03/11/2022 09:00:03')
	,(109, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  03 Kasım 2022 Perşembe  günü 11:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '03/11/2022 10:00:03')
	,(110, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  03 Kasım 2022 Perşembe  günü 12:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '03/11/2022 11:00:02')
	,(111, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  03 Kasım 2022 Perşembe  günü 13:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '03/11/2022 12:00:03')
	,(112, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  03 Kasım 2022 Perşembe  günü 14:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '03/11/2022 13:00:02')
	,(113, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, daha önce almış olduğunuz Saç Kesimi hizmetinin kalıcılığının sağlanması adına tekrarlanması gerekmektedir. Randevu almak için; https://ademyilmaz.net', '10/11/2022 00:00:03')
	,(114, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, daha önce almış olduğunuz Saç Kesimi hizmetinin kalıcılığının sağlanması adına tekrarlanması gerekmektedir. Randevu almak için; https://ademyilmaz.net', '10/11/2022 00:00:03')
	,(115, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, daha önce almış olduğunuz Saç Kesimi hizmetinin kalıcılığının sağlanması adına tekrarlanması gerekmektedir. Randevu almak için; https://ademyilmaz.net', '10/11/2022 00:00:03')
	,(116, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, daha önce almış olduğunuz Saç Kesimi hizmetinin kalıcılığının sağlanması adına tekrarlanması gerekmektedir. Randevu almak için; https://ademyilmaz.net', '10/11/2022 00:00:03')
	,(117, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, daha önce almış olduğunuz Saç Kesimi hizmetinin kalıcılığının sağlanması adına tekrarlanması gerekmektedir. Randevu almak için; https://ademyilmaz.net', '10/11/2022 00:00:03')
	,(118, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  18 Ocak 2023 Çarşamba  günü 19:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Iptal ve değişiklik için:https://randevu.eralsoft.com/jjCiy606', '16/01/2023 06:43:27')
	,(119, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  18 Ocak 2023 Çarşamba  günü 16:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Iptal ve değişiklik için:https://randevu.eralsoft.com/r/UuaaJ664', '16/01/2023 06:44:24')
	,(120, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  20 Ocak 2023 Cuma  günü 22:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/WtuT5670', '16/01/2023 07:34:30')
	,(121, '', 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Kesimi randevunuz  20 Ocak 2023 Cuma  günü 17:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '16/01/2023 07:51:02')
	,(122, '', 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Kesimi randevunuz  20 Ocak 2023 Cuma  günü 19:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/', '16/01/2023 07:52:19')
	,(123, '', 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Kesimi randevunuz  20 Ocak 2023 Cuma  günü 21:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/WtuT5670', '16/01/2023 07:53:58')
	,(124, '', 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Kesimi randevunuz  18 Ocak 2023 Çarşamba  günü 10:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/WtuT5670', '16/01/2023 07:57:46')
	,(125, '', 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Kesimi randevunuz  26 Ocak 2023 Perşembe  günü 11:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/WtuT5670', '16/01/2023 08:09:36')
	,(126, '', 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Kesimi randevunuz  16 Ocak 2023 Pazartesi  günü 10:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/WtuT5670', '16/01/2023 08:10:20')
	,(127, '', 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Kesimi randevunuz  19 Ocak 2023 Perşembe  günü 11:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/WtuT5670', '16/01/2023 08:36:26')
	,(128, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  18 Ocak 2023 Çarşamba  günü 16:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/90GFO908', '16/01/2023 09:01:48')
	,(129, '', 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Kesimi randevunuz  18 Ocak 2023 Çarşamba  günü 11:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/90GFO908', '16/01/2023 09:02:17')
	,(130, '', 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Kesimi randevunuz  27 Ocak 2023 Cuma  günü 10:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/90GFO908', '16/01/2023 09:19:58')
	,(131, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  16 Ocak 2023 Pazartesi  günü 13:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/HBE2n069', '16/01/2023 09:21:09')
	,(132, '', 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet, Randevunuz güncellenmiştir.Saç Kesimi randevunuz  16 Ocak 2023 Pazartesi  günü 14:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/HBE2n069', '16/01/2023 09:21:27')
	,(133, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  16 Ocak 2023 Pazartesi  günü 14:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/84crg241', '16/01/2023 09:24:01')
	,(134, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  18 Ocak 2023 Çarşamba  günü 19:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '18/01/2023 18:00:03')
	,(135, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  19 Ocak 2023 Perşembe  günü 12:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894', '19/01/2023 11:00:02')
	,(136, 28, 5340737273, 'Adem Yılmaz Hair Studio Sayın Alperen Belet,  21 Ocak 2023 Cumartesi  günü 14:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/Bt21y128', '21/01/2023 11:52:09')
	,(137, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri,  21 Ocak 2023 Cumartesi  günü 16:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/HOSSo981', '21/01/2023 12:06:21')
	,(138, 1, 05340737273, 'Adem Yılmaz Hair Studio Sayın Test Müşteri,  21 Ocak 2023 Cumartesi  günü 15:00 saati için Cilt Bakımı randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/qLM1V993', '21/01/2023 12:06:34')
	,(139, 1, 05340737273, 'FastyGo Randevu Sistemi Sayın Test Müşteri,  22 Ocak 2023 Pazar  günü 20:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/elqE0521', '21/01/2023 15:35:21')
	,(140, 1, 05340737273, 'FastyGo Randevu Sistemi Sayın Test Müşteri, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  27 Ocak 2023 Cuma  günü 13:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05358256894 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/elqE0521', '21/01/2023 15:35:50')
	,(141, 1, 05340737273, 'FastyGo Randevu Sistemi Sayın Test Müşteri,  22 Ocak 2023 Pazar  günü 17:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/QPwNZ975', '22/01/2023 11:42:56')
	,(142, 1, 05340737273, 'FastyGo Randevu Sistemi Sayın Test Müşteri,  22 Ocak 2023 Pazar  günü 17:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000', '22/01/2023 11:43:45')
	,(143, 28, 5340737273, 'Merhaba, Alperen Belet doğum günün kutlu olsun!\r\nDoğum gününe özel tam %20 indirim! Hemen randevu al! https://randevu.eralsoft.com', '24/01/2023 00:49:28')
	,(144, 28, 5340737273, 'Merhaba, Alperen Belet doğum günün kutlu olsun!\r\nDoğum gününe özel tam %20 indirim! Hemen randevu al! https://randevu.eralsoft.com', '24/01/2023 00:50:21')
	,(145, 28, 5340737273, 'FastyGo Randevu Sistemi Sayın Alperen Belet bizi tercih ettiğiniz için teşekkür ederiz!', '24/01/2023 01:16:37')
	,(146, 28, 5340737273, 'FastyGo Randevu Sistemi Sayın Alperen Belet bizi tercih ettiğiniz için teşekkür ederiz!', '24/01/2023 01:17:12')
	,(147, 28, 5340737273, 'FastyGo Randevu Sistemi Sayın Alperen Belet bizi tercih ettiğiniz için teşekkür ederiz!', '24/01/2023 01:18:09')
	,(148, 28, 5340737273, 'FastyGo Randevu Sistemi Merhaba, Alperen Belet doğum günün kutlu olsun!\r\nDoğum gününe özel tam %20 indirim! Hemen randevu al! https://randevu.eralsoft.com', '24/01/2023 12:00:04')
	,(149, 33, 5530142116, 'FastyGo Randevu Sistemi Sayın Yasin Onur AYDIN,  27 Ocak 2023 Cuma  günü 13:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/Ehng8180', '25/01/2023 23:23:01')
	,(150, 34, 5343130256, 'FastyGo Randevu Sistemi Sayın ozan,  26 Ocak 2023 Perşembe  günü 13:00 saati için Cilt Bakımı randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/EcbVs027', '26/01/2023 10:43:47')
	,(151, 34, 5343130256, 'FastyGo Randevu Sistemi Sayın ozan,  26 Ocak 2023 Perşembe  günü 13:00 saati için Cilt Bakımı randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000', '26/01/2023 11:00:03')
	,(152, 34, 5343130256, 'FastyGo Randevu Sistemi Sayın ozan bizi tercih ettiğiniz için teşekkür ederiz!', '26/01/2023 15:00:03')
	,(153, 33, 5530142116, 'FastyGo Randevu Sistemi Sayın Yasin Onur AYDIN,  27 Ocak 2023 Cuma  günü 13:00 saati için Saç Kesimi randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000', '27/01/2023 11:00:24')
	,(154, 33, 5530142116, 'FastyGo Randevu Sistemi Sayın Yasin Onur AYDIN bizi tercih ettiğiniz için teşekkür ederiz!', '27/01/2023 15:00:03')
	,(155, 35, 5316936219, 'FastyGo Randevu Sistemi Sayın Karaman esat,  28 Ocak 2023 Cumartesi  günü 14:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/BVmSE449', '27/01/2023 20:10:49')
	,(156, 35, 5316936219, 'FastyGo Randevu Sistemi Sayın Karaman esat,  28 Ocak 2023 Cumartesi  günü 14:00 saati için Saç Yıkama randevunuzu hatırlatırız. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000', '28/01/2023 12:00:03')
	,(157, 35, 5316936219, 'FastyGo Randevu Sistemi Sayın Karaman esat bizi tercih ettiğiniz için teşekkür ederiz!', '28/01/2023 16:00:02')
	,(158, 28, 5340737273, 'FastyGo Randevu Sistemi Sayın Alperen Belet,  30 Ocak 2023 Pazartesi  günü 20:00 saati için Saç Yıkama randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/xV97F911', '28/01/2023 21:18:32')
	,(159, 28, 5340737273, 'FastyGo Randevu Sistemi Sayın Alperen Belet,  02 Şubat 2023 Perşembe  günü 16:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/fcLkh051', '28/01/2023 21:20:51')
	,(160, 28, 5340737273, 'FastyGo Randevu Sistemi Sayın Alperen Belet,  01 Şubat 2023 Çarşamba  günü 16:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/8Luxy730', '28/01/2023 21:32:10')
	,(161, 35, 5316936219, 'FastyGo Randevu Sistemi Sayın Karaman esat, Randevunuz güncellenmiştir.Saç Yıkama randevunuz  28 Ocak 2023 Cumartesi  günü 14:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000', '28/01/2023 21:53:46')
	,(162, 1, 05340737273, 'FastyGo Randevu Sistemi Sayın Test Müşteri,  29 Ocak 2023 Pazar  günü 13:00 saati için Saç Kesimi randevunuz oluşturulmuştur. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000 Randevunuzda Iptal ve değişiklik için:https://randevu.eralsoft.com/r/InaqS591', '29/01/2023 00:49:51')
	,(163, 1, 05340737273, 'FastyGo Randevu Sistemi Sayın Test Müşteri, Randevunuz güncellenmiştir.Saç Kesimi randevunuz  29 Ocak 2023 Pazar  günü 13:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000', '29/01/2023 01:10:59')
	,(164, 1, 05340737273, 'FastyGo Randevu Sistemi Sayın Test Müşteri, Randevunuz güncellenmiştir.Saç Kesimi randevunuz  29 Ocak 2023 Pazar  günü 13:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000', '29/01/2023 01:11:03')
	,(165, 1, 05340737273, 'FastyGo Randevu Sistemi Sayın Test Müşteri, Randevunuz güncellenmiştir.Saç Kesimi randevunuz  29 Ocak 2023 Pazar  günü 14:00 saatine alınmıştır. Randevunuza gelemeyecekseniz İletişim numaramızdan bizlere bilgi vermenizi rica ederiz. İletişim: 05300000000', '29/01/2023 01:11:07');

DROP TABLE IF EXISTS `sms_settings`;
CREATE TABLE `sms_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `sms_settings` (`id`, `username`, `password`, `title`) VALUES 
	(1, 'xx', 'xx_3519', 'xx');

DROP TABLE IF EXISTS `translations`;
CREATE TABLE `translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(10) DEFAULT NULL,
  `key_name` varchar(255) DEFAULT NULL,
  `value` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=515 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `translations` (`id`, `language`, `key_name`, `value`) VALUES 
	(1, 'tr', 'sitetitle', 'FastyGo Randevu Sistemi')
	,(2, 'tr', 'info', 'Bilgilerinizi Öğrenebilir Miyiz ?')
	,(3, 'tr', 'namesurname', 'Ad Soyad')
	,(4, 'tr', 'continue', 'Devam Et')
	,(5, 'tr', 'step', 'ADIM')
	,(6, 'tr', 'chooseservice', 'Hizmet Ve Çalışan Seçin')
	,(7, 'tr', 'select', 'Seçin')
	,(8, 'tr', 'back', 'Geri Dön')
	,(9, 'tr', 'chooseemployee', 'Lütfen Çalışan Seçin')
	,(10, 'tr', 'error', 'Hata!')
	,(11, 'tr', 'selectdate', 'Tarih Ve Saat Seçin')
	,(12, 'tr', 'appointmentdate', 'Randevu Tarihi')
	,(13, 'tr', 'selectdateinfo', 'Lütfen tarih seçiniz!')
	,(14, 'tr', 'okey', 'Tamam')
	,(15, 'tr', 'summary', 'Özet')
	,(16, 'tr', 'perfonelinfo', 'Kişi Bilgileri')
	,(17, 'tr', 'serviceinfo', 'Hizmet Bilgileri')
	,(18, 'tr', 'appointmentinfo', 'Randevu Bilgileri')
	,(19, 'tr', 'paymentmethod', 'Ödeme Yöntemi')
	,(20, 'tr', 'paymentselect', 'Ödeme Yöntemi Seçin')
	,(21, 'tr', 'cash', 'Nakit Öde')
	,(22, 'tr', 'saloncreditcard', 'Salonda Kredi Kartıyla Ödeme')
	,(23, 'tr', 'nowcreditcard', 'Şimdi Kredi Kartıyla Öde')
	,(24, 'tr', 'transfer', 'Havale / Eft')
	,(25, 'tr', 'create', 'Randevu Oluştur')
	,(26, 'tr', 'success', 'Randevu Başarıyla Oluşturuldu.')
	,(27, 'tr', 'infosms', 'Bilgilendirme Için Tarafınıza SMS Gönderilmiştir.')
	,(28, 'tr', 'transferinfo', 'Havale Ile Ödeme Seçtiniz.Aşağıdaki Hesap Numalarına Ücreti Gönderebilirsiniz.')
	,(29, 'tr', 'newappointment', 'Yeni Randevu')
	,(30, 'tr', 'congratulations', 'Tebrikler!')
	,(31, 'tr', 'pleasename', 'Lütfen adınızı yazınız.')
	,(32, 'tr', 'pleasephone', 'Lütfen telefon numaranızı yazınız.')
	,(33, 'tr', 'pleaseservice', 'Lütfen hizmet seçiniz.')
	,(34, 'tr', 'pleaseemp', 'Lütfen çalışan seçiniz.')
	,(35, 'tr', 'pleaseappdate', 'Lütfen randevu tarihi seçiniz.')
	,(36, 'tr', 'pleaseapptime', 'Lütfen randevu saati seçiniz.')
	,(37, 'tr', 'sorry', 'Üzgünüz :(')
	,(38, 'tr', 'otherselect', 'Seçtiğiniz randevu başkası tarafından alındı. Lütfen tekrar tarih ve saat seçiniz.')
	,(39, 'tr', 'appsuccess', 'Randevu Oluşturuldu')
	,(40, 'tr', 'paymentwaiting', 'Ödeme Bekleniyor!')
	,(41, 'tr', 'paymentnotcomp', 'Ödeme Henüz Tamamlanmadı.')
	,(42, 'tr', 'paymentnotcomplete', 'Randevunuz oluşturuldu fakat ödemeniz henüz tamamlanmadı,')
	,(43, 'tr', 'paymentcomplete', 'Ödeme yapmak için Ödeme Yap butonuna tıklayınız.')
	,(44, 'tr', 'payment', 'Ödeme Yap')
	,(45, 'tr', 'paymentsuccess', 'Ödemeniz başarıyla alındı.')
	,(46, 'tr', 'paymentsuccessinfo', 'Randevunuz oluşturulup, ödemeniz başarıyla alınmıştır.')
	,(47, 'tr', 'paymentunsuccess', 'Maalesef Ödemeniz Alınamadı!')
	,(48, 'tr', 'paymentunsuccessinfo', 'Aşağıdan tekrardan ödeme yapmayı deneyebilirsiniz..')
	,(49, 'tr', 'tryagain', 'Tekrar Dene')
	,(50, 'tr', 'update', 'Güncelleme')
	,(51, 'tr', 'appupdate', 'Randevu Güncelleme')
	,(52, 'tr', 'appupdatenotfound', 'Düzenlencek randevu bulunamadı.')
	,(53, 'tr', 'appupdatedate', 'Randevu tarihiniz geçmiştir.')
	,(54, 'tr', 'appupdatethanks', 'Bizi tercih ettiğiniz için teşekkür ederiz.')
	,(55, 'tr', 'newappdate', 'Yeni Randevu Tarihi')
	,(56, 'tr', 'updatebutton', 'Güncelle')
	,(57, 'tr', 'appcancel', 'İptal Et')
	,(58, 'tr', 'appdatelast', 'Randevunuza')
	,(59, 'tr', 'appdatelast2', 'saat\'den az kaldığı için düzenleme yapamazsınız.')
	,(60, 'tr', 'appdatelast3', 'Maksimum')
	,(61, 'tr', 'appdatelast4', 'saat kalan randevularınızı düzenleyebilirsiniz.')
	,(62, 'tr', 'pleasenewappdate', 'Lütfen yeni randevu tarihi seçiniz.')
	,(63, 'tr', 'pleasenewapptime', 'Lütfen yeni randevu saati seçiniz.')
	,(64, 'tr', 'cancelquest', 'Randevu iptal edilsin mi?')
	,(65, 'tr', 'cancelquesttext', 'Onay vermeniz durumunda randevunuz iptal edilecektir. Emin misiniz?')
	,(66, 'tr', 'yes', 'Evet')
	,(67, 'tr', 'no', 'Hayır')
	,(68, 'tr', 'cancelnot', 'Randevu iptal edilmedi.')
	,(69, 'tr', 'appcanceled', 'Randevu İptal Edildi')
	,(70, 'tr', 'appcanceledtext', 'Randevu başarıyla İptal Edildi.')
	,(71, 'tr', 'appupdated', 'Randevu Güncellendi')
	,(72, 'tr', 'appupdatedtext', 'Randevu başarıyla Güncellendi.')
	,(432, 'en', 'appupdatedtext', 'Appointment Successfully Updated.')
	,(431, 'en', 'appupdated', 'Appointment Updated')
	,(430, 'en', 'appcanceledtext', 'Appointment Canceled Successfully.')
	,(429, 'en', 'appcanceled', 'Appointment Canceled')
	,(428, 'en', 'cancelnot', 'The appointment was not cancelled.')
	,(426, 'en', 'yes', 'Yes')
	,(427, 'en', 'no', 'No')
	,(425, 'en', 'cancelquesttext', 'If you approve, your appointment will be cancelled. Are you sure?')
	,(423, 'en', 'pleasenewapptime', 'Please select a new appointment time.')
	,(421, 'en', 'appdatelast4', 'You can edit your remaining appointments.')
	,(424, 'en', 'cancelquest', 'Cancel the appointment?')
	,(422, 'en', 'pleasenewappdate', 'Please select a new appointment date.')
	,(420, 'en', 'appdatelast3', 'Maximum')
	,(419, 'en', 'appdatelast2', 'You cannot edit because there is less than an hour left.')
	,(417, 'en', 'appcancel', 'Cancel')
	,(418, 'en', 'appdatelast', 'to your appointment')
	,(416, 'en', 'updatebutton', 'Update')
	,(415, 'en', 'newappdate', 'New Appointment Date')
	,(413, 'en', 'appupdatedate', 'Your appointment date has passed.')
	,(414, 'en', 'appupdatethanks', 'Thank you for choosing us.')
	,(412, 'en', 'appupdatenotfound', 'No appointment found to be edited.')
	,(408, 'en', 'paymentunsuccessinfo', 'You can try to pay again below.')
	,(409, 'en', 'tryagain', 'Try again')
	,(410, 'en', 'update', 'Update')
	,(411, 'en', 'appupdate', 'Appointment Update')
	,(407, 'en', 'paymentunsuccess', 'Sorry, Your Payment Could Not Be Received!')
	,(404, 'en', 'payment', 'Pay')
	,(405, 'en', 'paymentsuccess', 'Your payment has been received successfully.')
	,(406, 'en', 'paymentsuccessinfo', 'Your appointment has been created and your payment has been successfully received.')
	,(402, 'en', 'paymentnotcomplete', 'Your appointment has been created but your payment has not been completed yet,')
	,(403, 'en', 'paymentcomplete', 'Click the Make Payment button to make a payment.')
	,(399, 'en', 'appsuccess', 'Appointment Created')
	,(400, 'en', 'paymentwaiting', 'Payment Awaiting!')
	,(401, 'en', 'paymentnotcomp', 'Payment Not Completed Yet.')
	,(398, 'en', 'otherselect', 'The appointment you have selected has been taken by someone else. Please select the date and time again.')
	,(397, 'en', 'sorry', 'We are sad :(')
	,(396, 'en', 'pleaseapptime', 'Please select an appointment time.')
	,(395, 'en', 'pleaseappdate', 'Please select an appointment date.')
	,(394, 'en', 'pleaseemp', 'Please select employee.')
	,(393, 'en', 'pleaseservice', 'Please select service.')
	,(392, 'en', 'pleasephone', 'Please write your phone number.')
	,(389, 'en', 'newappointment', 'New Appointment')
	,(390, 'en', 'congratulations', 'Congratulations!')
	,(391, 'en', 'pleasename', 'Please write your name.')
	,(386, 'en', 'success', 'Appointment Created Successfully.')
	,(387, 'en', 'infosms', 'An SMS has been sent to you for information.')
	,(388, 'en', 'transferinfo', 'You have chosen to pay by wire transfer. You can send the fee to the following account number.')
	,(385, 'en', 'create', 'Create an Appointment')
	,(384, 'en', 'transfer', 'Transfer')
	,(383, 'en', 'nowcreditcard', 'Pay Now With Credit Card')
	,(380, 'en', 'paymentselect', 'Choose Payment Method')
	,(381, 'en', 'cash', 'Pay Cash')
	,(382, 'en', 'saloncreditcard', 'Payment by Credit Card at the Salon')
	,(379, 'en', 'paymentmethod', 'Payment method')
	,(378, 'en', 'appointmentinfo', 'Appointment Information')
	,(377, 'en', 'serviceinfo', 'Service Information')
	,(376, 'en', 'perfonelinfo', 'Personal information')
	,(373, 'en', 'selectdateinfo', 'Please select a date!')
	,(374, 'en', 'okey', 'Okey')
	,(375, 'en', 'summary', 'Summary')
	,(372, 'en', 'appointmentdate', 'Appointment date')
	,(371, 'en', 'selectdate', 'Select Date And Time')
	,(370, 'en', 'error', 'Error!')
	,(369, 'en', 'chooseemployee', 'Please Select Employee')
	,(367, 'en', 'select', 'Select')
	,(368, 'en', 'back', 'Back')
	,(366, 'en', 'chooseservice', 'Choose Service and Employee')
	,(365, 'en', 'step', 'STEP')
	,(364, 'en', 'continue', 'Continue')
	,(362, 'en', 'info', 'Can We Learn Your Information?')
	,(363, 'en', 'namesurname', 'Name Surname')
	,(361, 'en', 'sitetitle', 'FastyGo Appointment System')
	,(514, 'en', 'apppass', 'All appointments are full for the date you selected, please choose another day.\r\n')
	,(513, 'tr', 'apppass', 'Seçtiğiniz tarih için tüm randevular dolu lütfen başka gün seçin.')
	,(512, 'en', 'staffpass', 'Staff is off for the date you selected, please select another day.\r\n')
	,(511, 'tr', 'staffpass', 'Seçtiğiniz tarih için personel izinli lütfen başka gün seçin.')
	,(510, 'en', 'timepass', 'The working hours have passed for the date you selected, please select another day.\r\n')
	,(509, 'tr', 'timepass', 'Seçtiğiniz tarih için mesai saati geçmiştir, lütfen başka gün seçin.')
	,(508, 'en', 'dayoff', 'Staff day off!')
	,(507, 'tr', 'dayoff', 'Personel izin günü!')
	,(506, 'en', 'bosalan', 'Please make sure to fill in all fields!')
	,(505, 'tr', 'bosalan', 'Lütfen tüm alanları doldurduğunuzdan emin olun!');

DROP TABLE IF EXISTS `vested`;
CREATE TABLE `vested` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `providerID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `vested` (`id`, `providerID`, `orderID`, `amount`, `date`) VALUES 
	(2, 8, 29, 20, '30-01-2023 04:06:00')
	,(3, 8, 30, 99.9, '30-01-2023 16:06:00')
	,(4, 8, 31, 66.6, '30-01-2023 16:06:00')
	,(5, 8, 32, 453.6, '30-01-2023 16:19:00')
	,(6, 8, 33, 44.4, '30-01-2023 16:20:00')
	,(7, 8, 34, 5, '09-02-2023 06:22:00')
	,(8, 2, 35, 100, '15-02-2023 20:40:00');

