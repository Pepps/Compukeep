-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Värd: 83.168.227.176
-- Skapad: 28 april 2014 kl 19:37
-- Serverversion: 5.0.83
-- PHP-version: 4.4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `db1214354_compukeep`
--

-- --------------------------------------------------------

--
-- Struktur för tabell `chassi`
--

CREATE TABLE IF NOT EXISTS `chassi` (
  `ID` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL COMMENT 'product name',
  `price` int(11) NOT NULL,
  `ATX` varchar(255) NOT NULL COMMENT 'big tower/midtower',
  `info` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Data i tabell `chassi`
--

INSERT INTO `chassi` (`ID`, `name`, `price`, `ATX`, `info`) VALUES
(1, 'Fractal Design Define R4 Black Pearl', 79, 'B ', 'Latest in the Define Series of computer cases offering minimalistic and stunning Scandinavian design fused with maximum sound reduction, configurability and functionality.'),
(2, 'Thermal Take Level 10 GT Snow Edition', 35, 'A', '- FrontSpeed 2: USB 3.0 SuperSpeed\r\n- PitStop 5: EasySwap HDD bays\r\n- TripleMax: Ready for extra-long graphics card up to 14.2&rdquo/36 cm\r\n- QuadFan: Maximum ventilation and cooling\r\n- Triple Colorshift: Adjustable fan ambience colors\r\n- CableClear: Advanced cable management\r\n- S.S.S.: Smart Lock Security System\r\n- CoolFlux: Liquid cooling ready'),
(3, 'Fractal Design Define', 76, 'B', 'Latest in the Define Series of computer cases offering minimalistic and stunning Scandinavian design fused with maximum sound reduction, configurability and functionality.'),
(5, 'Lian Li pc a76x', 88, 'B', 'Sleek design and full of functionality, Lian Li pc a76x big tower, for the best experience ever.'),
(6, 'Corsair obsidian 650d', 54, 'B', 'The Obsidian Series: Designed by builders, for builders. Award-winning Obsidian Series of cases from Corsair.'),
(7, 'Cooler Master CM 690 III Svart', 79, 'C', 'Seeking to retain the iconic sleek curved mesh styling on the front fasade, CM 690 III designers gave the exterior a feel that harkens back to itsfoundations.'),
(8, 'CM Storm Scout II Advanced Gaming', 39, 'B', 'CM Storm Scout 2 Advanced is the upgraded edition of Scout 2. \r\nIt supports up to 9 fans, including two pre-installed 120mm red LED fans in the front for optimized cooling. It features improved steel reinforced carrying handles, bolted to the core structure. The top console has been upgraded to USB 3.0 for high power charging and lightning fast file transfers, and can be hidden and protected from dusty battlefields, friendly fire and melee attacks behind a slide cover. The 1st HDD cage can be removed, to support monster VGAs like the NVIDIA GTX 690 and AMD HD 7990, turning it into a powerful Battlestation. '),
(9, 'Fractal Design XL', 69, 'A', 'Latest in the Define Series of computer cases offering minimalistic and stunning Scandinavian design fused with maximum sound reduction, configurability and functionality.');

-- --------------------------------------------------------

--
-- Struktur för tabell `harddrive`
--

CREATE TABLE IF NOT EXISTS `harddrive` (
  `ID` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL COMMENT 'product name',
  `price` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Data i tabell `harddrive`
--

INSERT INTO `harddrive` (`ID`, `name`, `price`, `size`, `info`) VALUES
(1, 'Seagate Barracuda 1TB', 29, 'B', 'The Power of One\r\n\r\nThe Barracuda® hard drive gives you one hard drive platform for every desktop storage application. One drive with trusted performance, reliability, simplicity and capacity.'),
(2, 'Samsung SSD 840 EVO 250GB BK OEM', 33, 'A', 'The must-have solution for your PC upgrade\r\n\r\n\r\nThe evolution of the SSD has arrived as the Samsung SSD 840 EVO with more speed, more reliability and much easier upgrade tools. Combining the best SSD technology from Samsung, 840 EVO delivers a superior computing experience.'),
(3, 'Crucial M500 SSD 2.5" 120GB', 49, 'B', 'With data transfer speeds that are radically faster than a hard drive, the Crucial M500 SSD isn’t just a storage upgrade - it’s a complete system transformation. From its nearly instantaneous boot times, powerful data transfer speeds, increased multitasking capability, and rocksolid reliability, the Crucial M500 delivers dramatic performance gains – all at an affordable price.');

-- --------------------------------------------------------

--
-- Struktur för tabell `memory`
--

CREATE TABLE IF NOT EXISTS `memory` (
  `ID` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL COMMENT 'product name',
  `price` int(11) NOT NULL,
  `memory` varchar(255) NOT NULL,
  `memoryclock` varchar(10) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Data i tabell `memory`
--

INSERT INTO `memory` (`ID`, `name`, `price`, `memory`, `memoryclock`, `info`) VALUES
(4, 'Crucial DDR4 BallistiX Sport', 19, 'C', 'C', 'Gaming for all.\r\nThe Ballistix Sport Series was created for mainstream users and enthusiasts. These gaming modules feature heat spreaders for thermal performance -- along with standard timings and voltages, making this a reliable, quality RAM option that''s ideal for maximum stability and compatibility.'),
(5, 'Kingston DDR2 HyperX', 20, 'A', 'B', 'Kingston''s Hyper X is a kit of two 512M x 64-bit\r\n(4GB) DDR2-1600 CL9 SDRAM (Synchronous DRAM) 2Rx8\r\nmemory modules, based on sixteen 256M x 8-bit DDR3 FBGA\r\ncomponents per module.'),
(6, 'Corsair Vengance', 29, 'A', 'B', 'Corsair Vengeance DDR2 memory modules are designed with overclockers in mind. Vengeance DIMMs are built using RAM specially selected for their high-performance potential. Aluminum heat spreaders help dissipate heat, and provide the aggressive look that you want in your gaming rig. As a bonus, the attractive low price of Vengeance memory will also leave lots of room in your system build budget. ');

-- --------------------------------------------------------

--
-- Struktur för tabell `motherboard`
--

CREATE TABLE IF NOT EXISTS `motherboard` (
  `ID` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL COMMENT 'product name',
  `price` int(11) NOT NULL,
  `socket` varchar(255) NOT NULL,
  `ATX` varchar(100) NOT NULL,
  `pci` varchar(11) NOT NULL,
  `memory` varchar(255) NOT NULL,
  `memoryclock` varchar(10) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Data i tabell `motherboard`
--

INSERT INTO `motherboard` (`ID`, `name`, `price`, `socket`, `ATX`, `pci`, `memory`, `memoryclock`, `info`) VALUES
(1, 'MSI Z87-G45 Gaming', 79, 'C', 'B', 'B', 'C', 'C', 'MSI GAMING motherboards are designed to provide gamers with best-in-class features and technology. Backed by the imposing looks of MSI''s Dragon, each motherboard is an engineering masterpiece tailored to gaming perfection.'),
(2, 'ASUS A88XM-A, Socket', 69, 'D', 'A', 'C', 'B', 'B', 'ASUS continues to put innovation at its forefront, launching the world’s first Dual Intelligent Processors technology. This exclusive design consists of the EPU (Energy Processing Unit), which automatically monitors power consumption system-wide to ensure efficiency, and the TPU (TurboV Processing Unit) - guaranteeing superior performance for every task, bringing users an unbeatable experience.'),
(10, 'MSI Z87-G45 Gaming, Socket-1150', 69, 'A', 'C', 'D', 'B', 'C', 'MSI GAMING motherboards are designed to provide gamers with best-in-class features and technology. Backed by the imposing looks of MSI''s Dragon, each motherboard is an engineering masterpiece tailored to gaming perfection.'),
(11, 'ASUS P8Z77-V LX, Socket-1155', 59, 'B', 'B', 'B', 'C', 'A', 'DIGI+ VRM Digital Power Design\r\nUSB3.0 Boost - Lightning Fast Transfer Speeds!\r\nNetwork iControl\r\nLucidLogix® Virtu Universal MVP™\r\nGPU Boost\r\nWindows 8 Ready – Assured Compatibility\r\nLearn more about ASUS P8Z77 Series motherboard');

-- --------------------------------------------------------

--
-- Struktur för tabell `powersupply`
--

CREATE TABLE IF NOT EXISTS `powersupply` (
  `ID` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL COMMENT 'product name',
  `price` int(11) NOT NULL,
  `power` int(11) NOT NULL COMMENT 'watt',
  `info` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Data i tabell `powersupply`
--

INSERT INTO `powersupply` (`ID`, `name`, `price`, `power`, `info`) VALUES
(1, 'Corsair RM8', 0, 800, 'Corsair RM8 PSU\r\n\r\nFully modular and optimized for silence and high efficiency.\r\n\r\nIt''s built with low-noise capacitors and transformer.\r\n\r\nGuaranteed to deliver clean, stable, continuous power!'),
(2, 'Chieftec AC Power Adapter', 0, 100, 'Mauris iaculis bibendum ipsum ultricies porttitor. Phasellus ut vehicula leo, non dictum diam. Morbi eleifend mauris id consequat eleifend. '),
(3, 'Cooler Master', 0, 900, 'Cooler Master V PSU.\r\n\r\nCooler Master developed the V-series to re-ascertain its position as the worlds top power supply brand.');

-- --------------------------------------------------------

--
-- Struktur för tabell `processor`
--

CREATE TABLE IF NOT EXISTS `processor` (
  `ID` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL COMMENT 'product name',
  `price` int(11) NOT NULL,
  `socket` varchar(255) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Data i tabell `processor`
--

INSERT INTO `processor` (`ID`, `name`, `price`, `socket`, `info`) VALUES
(2, 'Intel Core i7-4820K', 0, 'C', 'Amazing performance and stunning visuals at their best. Get top-of-the-line performance for your most demanding tasks with a 4th generation Intel® Core™ i7 processor. For a difference you can see and feel in HD and 3D, multitasking and multimedia, the 4th generation Intel Core i7 processor is perfect for all your most demanding tasks.'),
(3, 'AMD FX-8350 Black Edition', 0, 'D', 'Experience unmatched multitasking and pure core performance with the industry’s first 32nm 8-core desktop processor. Get the speed you crave with AMD Turbo CORE Technology to push your core frequencies to the limit when you need it most. Go beyond the limits of maximum speed with easy-to-use AMD OverDrive™ and AMD Catalyst Control Center™ software suites. But the best part of all? You’ll get all this impressive performance at an unbelievable price. You’ll be asking yourself “what competition?” in no time.'),
(4, 'Intel Core i7-3820 Processor', 0, 'C', 'Amazing performance and stunning visuals at their best. Get top-of-the-line performance for your most demanding tasks with a 4th generation Intel® Core™ i7 processor. For a difference you can see and feel in HD and 3D, multitasking and multimedia, the 4th generation Intel Core i7 processor is perfect for all your most demanding tasks.'),
(5, 'Intel Core i7-4930K', 0, 'C', 'Effortlessly move through applications with smart multitasking from Intel® Hyper-Threading Technology. Enjoy the thrill of an automatic burst of speed when you need it with Intel® Turbo Boost Technology 2.0. Experience your movies, photos, and games smoothly and seamlessly with a suite of built-in visual enhancements—no extra hardware required.'),
(6, 'Intel Xeon E5-2687W v2', 0, 'C', 'Enhanced SpeedStep technology, Flertrådsteknik, Demand Based Switching, Execute Disable Bit-funktion, Intel Virtualization Technology, Intel 64 Technology, Intel Trusted Execution Technology, Intel Turbo Boost Technology 2.0, Intel Advanced Vector Extensions (AVX), Intel AES New Instructions (AES-NI), Thermal Monitoring Technologies, Intel Virtualization Technology for Directed I/O (VT-d), Intel vPro Technology, Idle States, Intel VT-x with Extended Page Tables (EPT), Intel Secure Key');

-- --------------------------------------------------------

--
-- Struktur för tabell `savedbuild`
--

CREATE TABLE IF NOT EXISTS `savedbuild` (
  `pcid` int(11) NOT NULL auto_increment,
  `userid_fk` int(11) NOT NULL,
  `chassi_fk` int(11) default NULL,
  `motherboard_fk` int(11) default NULL,
  `processor_fk` int(11) default NULL,
  `videocard_fk` int(11) default NULL,
  `soundcard_fk` int(11) default NULL,
  `networkcard_fk` int(11) default NULL,
  `memory_fk` int(11) default NULL,
  `ssd_fk` int(11) default NULL,
  `harddrive_fk` int(11) default NULL,
  `powersuply_fk` int(11) default NULL,
  `cables_fk` int(11) default NULL,
  `os_fk` int(11) default NULL,
  `buildtitle` varchar(255) default 'title',
  PRIMARY KEY  (`pcid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Data i tabell `savedbuild`
--

INSERT INTO `savedbuild` (`pcid`, `userid_fk`, `chassi_fk`, `motherboard_fk`, `processor_fk`, `videocard_fk`, `soundcard_fk`, `networkcard_fk`, `memory_fk`, `ssd_fk`, `harddrive_fk`, `powersuply_fk`, `cables_fk`, `os_fk`, `buildtitle`) VALUES
(1, 1, 1, 1, 2, 1, 0, 0, 4, 0, 1, 1, 0, 0, 'My PC'),
(2, 1, 1, 1, 3, 1, 0, 0, 5, 0, 2, 1, 0, 0, 'Best PC'),
(3, 7, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Agnes PC'),
(4, 6, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Alex pc'),
(5, 8, 3, 3, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dream PC'),
(6, 2, NULL, NULL, 2, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, 'Badest PC'),
(7, 2, 1, 1, 2, 2, NULL, NULL, 4, NULL, 1, 1, NULL, NULL, 'Awesome Build'),
(8, 2, 1, 1, 2, 2, NULL, NULL, 4, NULL, 1, 1, NULL, NULL, 'Cheap Build'),
(9, 2, 0, 0, 2, 2, NULL, NULL, 4, NULL, 1, 1, NULL, NULL, 'Fast Build'),
(10, 2, 1, 1, 2, 2, NULL, NULL, 4, NULL, 1, 1, NULL, NULL, 'Random Build'),
(11, 2, 1, 1, 2, 2, NULL, NULL, 4, NULL, 1, 1, NULL, NULL, 'Building for the first time'),
(12, 5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Building for the last time'),
(13, 2, 1, 1, 2, 2, NULL, NULL, 4, NULL, 1, 1, NULL, NULL, 'Love building'),
(14, 2, 1, 1, 2, 2, NULL, NULL, 4, NULL, 1, 1, NULL, NULL, 'Final Build'),
(17, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Love it'),
(19, 6, 1, 11, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Name Builddwa');

-- --------------------------------------------------------

--
-- Struktur för tabell `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL auto_increment,
  `useremail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL COMMENT 'encryption',
  `access` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Data i tabell `user`
--

INSERT INTO `user` (`userid`, `useremail`, `password`, `salt`, `access`) VALUES
(2, '9danne@hotmail.se', 'e5d6f08323bec8e936fd05b14d11f3b13d2f92f58d3d26e91fc1701fc16dabc84dc92eb71be09fee9ccb0c42942bbdcd35906ad75dd70c664ab0dd52df51ae4d', '-Ssg&', 1),
(5, 'q', '86a813cb20364eb05e261922b88702067bc596c1e33e95f1470cdcda2f5206da795773bc3855bbdbd86ae459217c12d34cff1e34b49216cd15282270afff3f1a', '0t-or', 0),
(6, 'snowyd.alexander@gmail.com', '7b396afa972a3e1fa50387964ad5bfe41691bf5ebe661881bfebd669667117b2757a23310b25ca2c78940a7a591d31c2eef8f387b8dd52431c4de7c5c8054963', 'B07=)', 1),
(7, 'agne', 'a5fdb7170075b2e01ed1a11e6220338268575a9bb17bec15eff2f3a0b00564796cb4054090b7bea2a9f99877eb316aea9beda4c19e1cbc5d74cccd703e47f77a', 'aoCPw', 0),
(8, 'andreasalm645@gmail.com', '8f019e6755b6fff3c1b79846889180a15dce4d97ab1b562bf1bbf8e12f4690ffb424349ff5972baea77b7cd3482ed446b1409481c3552602b0658317ce7cad64', 'lr0fH', 0);

-- --------------------------------------------------------

--
-- Struktur för tabell `videocard`
--

CREATE TABLE IF NOT EXISTS `videocard` (
  `ID` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL COMMENT 'product name',
  `price` int(11) NOT NULL,
  `pci` varchar(255) NOT NULL,
  `power` int(11) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Data i tabell `videocard`
--

INSERT INTO `videocard` (`ID`, `name`, `price`, `pci`, `power`, `info`) VALUES
(1, 'Gainward GeForce 210 512MB PhysX CUDA', 0, 'C', 100, 'Microsoft DirectX 10.1\r\nNVIDIA PhysX Technology\r\nNVIDIA CUDA technology\r\nNVIDIA PureVideo HD Technology\r\nPCI Express 2.0 support\r\nOpenGL Support'),
(2, 'MSI Radeon R9 290 Gaming 4GB GDDR5', 0, 'B', 500, 'GPU : AMD Radeon™ R9 290 Graphics, 2560 Stream Processors\r\nGPU Clockspeed : 947MHz (OC Mode ; 1007MHz)\r\nMemory : 4096MB GDDR5 (512 bit)\r\nMemory Clockspeed : 5 Gbps\r\nBus : PCI-Express 3.0\r\nVideo-Features : HDMI 1.4a\r\nCooling : 2-Slot Cooling\r\nConnectivity : DL-DVI-D, DL-DVI-D, HDMI, DisplayPort 1.2\r\nProduct Size : 276mm(L) x 127mm(W) x 39mm(H)\r\nPower Connector : 6-pin + 8-pin'),
(3, 'ASUS GeForce GT 640 2GB PhysX CUDA', 0, 'B', 150, 'ASUS GeForce GT 640 2GB PhysX CUDA\r\n\r\nPremium alloys inside power delivery components defeat the heat for cards that run better, cooler, and longer than reference.	'),
(4, 'Gainward GeForce GTX TITAN BLACK 6GB', 0, 'B', 1500, 'GPU : GeForce GTX Titan Black, 2880 cores, 28nm, GK110-430\r\nGPU Clockspeed : 980 MHz (boost) / 941 MHz (base)\r\nMemory : 6144MB GDDR5 (384 bit)\r\nMemory Clockspeed : 7.0 Gbps\r\nBandwidth : 336 GB/s\r\nBus : PCI-Express 3.0\r\nVideo-Features : HDMI 1.4a\r\nCooling : 2-Slot Cooling\r\nConnectivity : DL-DVI-I, DL-DVI-D, HDMI, DisplayPort 1.2\r\nProduct Size : 267mm(L) x 112mm(W)\r\nPower Connector : 6-pin and 8-pin');
