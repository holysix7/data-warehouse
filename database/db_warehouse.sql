-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 06:20 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `adjustment`
--

CREATE TABLE `adjustment` (
  `id` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `id_inventaris` int(11) DEFAULT NULL,
  `id_data_cc` int(11) DEFAULT NULL,
  `adjustment_code` varchar(50) NOT NULL,
  `po_number` varchar(50) DEFAULT NULL,
  `driver_name` varchar(30) DEFAULT NULL,
  `receiver_name` varchar(50) DEFAULT NULL,
  `status_goods` enum('In','Out') NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `supplier_date` date DEFAULT NULL,
  `out_date` date DEFAULT NULL,
  `status` enum('Approved','Canceled','Created') NOT NULL,
  `remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adjustment`
--

INSERT INTO `adjustment` (`id`, `id_supplier`, `id_inventaris`, `id_data_cc`, `adjustment_code`, `po_number`, `driver_name`, `receiver_name`, `status_goods`, `created_by`, `created_at`, `supplier_date`, `out_date`, `status`, `remark`) VALUES
(31, 1, 2, NULL, 'IN/SP/20210427/0001', 'asd', 'asd', NULL, 'In', '32008107', '2021-04-27 00:00:00', '2021-04-06', NULL, 'Created', 'qwe'),
(33, NULL, 4, NULL, 'OUT/SP/20210427/0001', NULL, NULL, 'zxcz', 'Out', '32008107', '2021-04-27 07:32:25', NULL, '2021-04-12', 'Approved', 'asd'),
(34, NULL, 5, NULL, 'OUT/SP/20210427/0002', NULL, NULL, 'asdasd', 'Out', '32008107', '2021-04-27 12:04:18', NULL, '2021-04-12', 'Approved', 'asdasd'),
(38, NULL, NULL, 7, 'OUT/SP/20210427/0003', NULL, NULL, 'zxczxc', 'Out', '32008107', '2021-04-27 12:16:08', NULL, '2021-04-20', 'Created', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `adjustment_item`
--

CREATE TABLE `adjustment_item` (
  `id` int(11) NOT NULL,
  `id_adjustment` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_rack` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `remark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adjustment_item`
--

INSERT INTO `adjustment_item` (`id`, `id_adjustment`, `id_product`, `id_rack`, `quantity`, `remark`) VALUES
(65, 31, 9, 1, 2, '2'),
(66, 33, 9, NULL, 3333, 'fdg'),
(67, 34, 9, NULL, 250, 'asdasd'),
(69, 38, 9, NULL, 10000, 'aowkoawk');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_code` varchar(30) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_code`, `customer_name`, `customer_address`) VALUES
(1, 'CS-0001', 'PT. Bahagia', 'Jl. Okelah No. 71'),
(3, 'CS-0002', 'PT. Sue', 'Jl. Siplah No. 33113');

-- --------------------------------------------------------

--
-- Table structure for table `data_cc`
--

CREATE TABLE `data_cc` (
  `id` int(11) NOT NULL,
  `cc_code` varchar(50) NOT NULL,
  `cc_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_cc`
--

INSERT INTO `data_cc` (`id`, `cc_code`, `cc_name`) VALUES
(1, 'CC-0001', 'O & Alat Berat'),
(2, 'CC-0002', 'O & P Kendaraan Pabrik'),
(3, 'CC-0003', 'Inventaris Pabrik'),
(4, 'CC-0004', 'Sarana & Prasarana'),
(5, 'CC-0005', 'Bangunan Pabrik'),
(6, 'CC-0006', 'Workshop Kendaraan'),
(7, 'CC-0007', 'Workshop Produksi');

-- --------------------------------------------------------

--
-- Table structure for table `data_request`
--

CREATE TABLE `data_request` (
  `id` int(11) NOT NULL,
  `type` enum('form-purchasing','form-repair') NOT NULL,
  `request_code` varchar(50) NOT NULL,
  `jenis_request` enum('Data PP Pusat','Data PP Investasi','Data PP Local') DEFAULT NULL,
  `category_barang` enum('Stok','Non Stok') NOT NULL,
  `remark` varchar(50) DEFAULT '',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_request`
--

INSERT INTO `data_request` (`id`, `type`, `request_code`, `jenis_request`, `category_barang`, `remark`, `created_at`, `created_by`) VALUES
(1, 'form-purchasing', 'PO/PST/20210429/0001', 'Data PP Pusat', 'Stok', 'Parent 1', '0000-00-00 00:00:00', 0),
(2, 'form-repair', 'RP/PST/20210429/0001', 'Data PP Pusat', 'Stok', 'Parent 2', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_request_items`
--

CREATE TABLE `data_request_items` (
  `id` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_cc` int(11) NOT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `receive_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` int(11) NOT NULL,
  `cc_id` int(11) NOT NULL,
  `inventaris_code` varchar(50) NOT NULL,
  `inventaris_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `cc_id`, `inventaris_code`, `inventaris_name`) VALUES
(2, 2, 'INV-0001', 'BE 9740 AC'),
(3, 2, 'INV-0002', 'BE 9464 GO'),
(4, 2, 'INV-0003', 'BE 9465 GO'),
(5, 1, 'INV-0004', 'Loader SDLG ND.12'),
(6, 2, 'INV-0005', 'BE 9463 GO');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `uom_id` int(11) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` enum('Non Stok','Stok') NOT NULL,
  `min_stock` int(11) NOT NULL DEFAULT 0,
  `category` enum('Sparepart','Bahan Bakar','Bahan Pembantu','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `uom_id`, `product_code`, `product_name`, `stock`, `price`, `type`, `min_stock`, `category`) VALUES
(9, 8, 'SP-0001', 'Material Warna', 4750, 5200, 'Stok', 12, 'Sparepart'),
(10, 1, 'SP-0002', 'Biji Plastik', 2250, 6000, 'Stok', 50, 'Sparepart'),
(11, 8, 'SP-0003', 'Cooling Water', 2250, 1200, 'Non Stok', 0, 'Sparepart'),
(12, 1, 'SP-0004', 'Biji Coklat', 2250, 7600, 'Non Stok', 0, 'Sparepart'),
(14, 8, 'BB-0001', 'Solar', 2125, 12000, 'Stok', 500, 'Bahan Bakar'),
(15, 8, 'BB-0002', 'Bensin', 2250, 9000, 'Stok', 1000, 'Bahan Bakar'),
(16, 1, 'BB-0003', 'Batu Bara', 2300, 100500, 'Stok', 1250, 'Bahan Bakar'),
(17, 11, 'BP-0001', 'Benang Besar Merah Putih', 3250, 1200, 'Stok', 10000, 'Bahan Pembantu'),
(18, 9, 'BP-0002', 'Karung 25Kg Polos Plus Inner', 4375, 1350, 'Non Stok', 0, 'Bahan Pembantu'),
(19, 9, 'BP-0003', 'Karung Polos FLTZ23 50Kg', 5633, 1950, 'Stok', 1500, 'Bahan Pembantu');

-- --------------------------------------------------------

--
-- Table structure for table `racks`
--

CREATE TABLE `racks` (
  `id` int(11) NOT NULL,
  `rack_code` varchar(30) NOT NULL,
  `rack_name` varchar(50) NOT NULL,
  `rack_status` enum('Loaded','Unload') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `racks`
--

INSERT INTO `racks` (`id`, `rack_code`, `rack_name`, `rack_status`) VALUES
(1, 'RK-0001', 'Bahan Tidak Mudah Terbakar', 'Loaded'),
(3, 'RK-0002', 'Bahan Mudah Terbakar', 'Loaded');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier_code` varchar(20) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `notes` text DEFAULT NULL,
  `supplier_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_code`, `supplier_name`, `phone`, `notes`, `supplier_address`) VALUES
(1, 'SP-0001', 'PT. ABC', '081324152235', NULL, 'Jl. Abc No 1'),
(2, 'SP-0002', 'PT. DEF', '082135642153', NULL, 'Jl. Def No 2'),
(3, 'SP-0003', 'PT. GHI', '081125253615', NULL, 'Jl. Ghi No 3'),
(4, 'SP-0004', 'PT. Okebanget', '081325253687', NULL, 'Jl. Okejuga No. 89'),
(5, 'SP-0005', 'PT. Manufaktur', '081282829121', 'Asdasdadasda', 'Jl. Manufaktur No. 2901');

-- --------------------------------------------------------

--
-- Table structure for table `unit_of_material`
--

CREATE TABLE `unit_of_material` (
  `id` int(11) NOT NULL,
  `uom_code` varchar(20) NOT NULL,
  `uom_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_of_material`
--

INSERT INTO `unit_of_material` (`id`, `uom_code`, `uom_name`) VALUES
(1, 'UOM-0001', 'KG'),
(2, 'UOM-0002', 'BOX'),
(3, 'UOM-0003', 'PCS'),
(8, 'UOM-0004', 'Liter'),
(9, 'UOM-0005', 'Lembar'),
(10, 'UOM-0006', 'Lebar'),
(11, 'UOM-0007', 'Roll');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(35) NOT NULL,
  `role` enum('Super Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`) VALUES
(1, '32008107', 'cfa1c82965c9a15788928707755cc06d', 'Fikri Reformasi Gunawan', 'Super Admin'),
(4, '32008108', '397a9a8657c3c9f1c6889b9d235c17e4', 'Erge', 'Super Admin'),
(11, '32008109', 'cfddc58c03b996cdccded8bfd8a4901d', 'Refor', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `list_access_id` int(11) NOT NULL,
  `status` enum('On','Off') NOT NULL DEFAULT 'Off',
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `user_id`, `list_access_id`, `status`, `updated_by`, `updated_at`) VALUES
(37, 1, 1, 'On', 'Fikri Reformasi Gunawan', '2021-04-23 02:01:40'),
(38, 1, 2, 'On', 'Fikri Reformasi Gunawan', '2021-04-23 02:01:40'),
(39, 1, 3, 'On', 'Fikri Reformasi Gunawan', '2021-04-23 02:01:40'),
(40, 1, 4, 'On', 'Fikri Reformasi Gunawan', '2021-04-23 02:01:40'),
(41, 1, 5, 'On', 'Fikri Reformasi Gunawan', '2021-04-23 02:01:40'),
(42, 1, 6, 'On', 'Fikri Reformasi Gunawan', '2021-04-23 02:01:40'),
(43, 1, 7, 'On', 'Fikri Reformasi Gunawan', '2021-04-23 02:01:40'),
(44, 1, 8, 'On', 'Fikri Reformasi Gunawan', '2021-04-23 02:01:40'),
(45, 1, 9, 'On', 'Fikri Reformasi Gunawan', '2021-04-23 02:01:40'),
(46, 11, 1, 'Off', 'Fikri Reformasi Gunawan', '2021-04-27 01:53:08'),
(47, 11, 2, 'Off', 'Fikri Reformasi Gunawan', '2021-04-27 01:53:08'),
(48, 11, 3, 'Off', 'Fikri Reformasi Gunawan', '2021-04-27 01:53:08'),
(49, 11, 4, 'Off', 'Fikri Reformasi Gunawan', '2021-04-27 01:53:08'),
(50, 11, 5, 'Off', 'Fikri Reformasi Gunawan', '2021-04-27 01:53:08'),
(51, 11, 6, 'Off', 'Fikri Reformasi Gunawan', '2021-04-27 01:52:15'),
(52, 11, 7, 'Off', 'Fikri Reformasi Gunawan', '2021-04-27 01:52:45'),
(53, 11, 8, 'Off', 'Fikri Reformasi Gunawan', '2021-04-27 01:49:06'),
(54, 11, 9, 'Off', 'Fikri Reformasi Gunawan', '2021-04-27 01:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_list_access`
--

CREATE TABLE `user_list_access` (
  `id` int(11) NOT NULL,
  `access_name` varchar(50) NOT NULL,
  `notes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_list_access`
--

INSERT INTO `user_list_access` (`id`, `access_name`, `notes`) VALUES
(1, 'Customer List', 'Master Data'),
(2, 'Racks List', 'Master Data'),
(3, 'Supplier List', 'Master Data'),
(4, 'CC List Data', 'Master Data'),
(5, 'Inventaris', 'Master Data'),
(6, 'Unit of Materials', 'Products'),
(7, 'Stocks and Non-stocks', 'Products'),
(8, 'Data Bahan Bakar', 'Products'),
(9, 'Data Bahan Pembantu', 'Products');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adjustment`
--
ALTER TABLE `adjustment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_inventaris` (`id_inventaris`);

--
-- Indexes for table `adjustment_item`
--
ALTER TABLE `adjustment_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_adjustment` (`id_adjustment`,`id_product`,`id_rack`),
  ADD KEY `id_rack` (`id_rack`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_cc`
--
ALTER TABLE `data_cc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_request`
--
ALTER TABLE `data_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `data_request_items`
--
ALTER TABLE `data_request_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_request` (`id_request`),
  ADD KEY `id_cc` (`id_cc`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cc_id` (`cc_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uom_id` (`uom_id`);

--
-- Indexes for table `racks`
--
ALTER TABLE `racks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_of_material`
--
ALTER TABLE `unit_of_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `access_id` (`list_access_id`);

--
-- Indexes for table `user_list_access`
--
ALTER TABLE `user_list_access`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adjustment`
--
ALTER TABLE `adjustment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `adjustment_item`
--
ALTER TABLE `adjustment_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_cc`
--
ALTER TABLE `data_cc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_request`
--
ALTER TABLE `data_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_request_items`
--
ALTER TABLE `data_request_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `racks`
--
ALTER TABLE `racks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit_of_material`
--
ALTER TABLE `unit_of_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_list_access`
--
ALTER TABLE `user_list_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adjustment`
--
ALTER TABLE `adjustment`
  ADD CONSTRAINT `adjustment_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adjustment_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adjustment_ibfk_3` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `adjustment_item`
--
ALTER TABLE `adjustment_item`
  ADD CONSTRAINT `adjustment_item_ibfk_1` FOREIGN KEY (`id_adjustment`) REFERENCES `adjustment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adjustment_item_ibfk_2` FOREIGN KEY (`id_rack`) REFERENCES `racks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adjustment_item_ibfk_4` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`cc_id`) REFERENCES `data_cc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`uom_id`) REFERENCES `unit_of_material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_access`
--
ALTER TABLE `user_access`
  ADD CONSTRAINT `user_access_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_ibfk_2` FOREIGN KEY (`list_access_id`) REFERENCES `user_list_access` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
