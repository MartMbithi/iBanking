-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2021 at 09:43 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martdevelopers_iBanking`
--

-- --------------------------------------------------------

--
-- Table structure for table `iB_Acc_types`
--

CREATE TABLE `iB_Acc_types` (
  `acctype_id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `rate` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iB_Acc_types`
--

INSERT INTO `iB_Acc_types` (`acctype_id`, `name`, `description`, `rate`, `code`) VALUES
(1, 'Savings', '<p>Savings accounts&nbsp;are typically the first official bank account anybody opens. Children may open an account with a parent to begin a pattern of saving. Teenagers open accounts to stash cash earned&nbsp;from a first job&nbsp;or household chores.</p><p>Savings accounts are an excellent place to park&nbsp;emergency cash. Opening a savings account also marks the beginning of your relationship with a financial institution. For example, when joining a credit union, your &ldquo;share&rdquo; or savings account establishes your membership.</p>', '20', 'ACC-CAT-4EZFO'),
(2, ' Retirement', '<p>Retirement accounts&nbsp;offer&nbsp;tax advantages. In very general terms, you get to&nbsp;avoid paying income tax on interest&nbsp;you earn from a savings account or CD each year. But you may have to pay taxes on those earnings at a later date. Still, keeping your money sheltered from taxes may help you over the long term. Most banks offer IRAs (both&nbsp;Traditional IRAs&nbsp;and&nbsp;Roth IRAs), and they may also provide&nbsp;retirement accounts for small businesses</p>', '10', 'ACC-CAT-1QYDV'),
(4, 'Recurring deposit', '<p><strong>Recurring deposit account or RD account</strong> is opened by those who want to save certain amount of money regularly for a certain period of time and earn a higher interest rate.&nbsp;In RD&nbsp;account a&nbsp;fixed amount is deposited&nbsp;every month for a specified period and the total amount is repaid with interest at the end of the particular fixed period.&nbsp;</p><p>The period of deposit is minimum six months and maximum ten years.&nbsp;The interest rates vary&nbsp;for different plans based on the amount one saves and the period of time and also on banks. No withdrawals are allowed from the RD account. However, the bank may allow to close the account before the maturity period.</p><p>These accounts can be opened in single or joint names. Banks are also providing the Nomination facility to the RD account holders.&nbsp;</p>', '15', 'ACC-CAT-VBQLE'),
(5, 'Fixed Deposit Account', '<p>In <strong>Fixed Deposit Account</strong> (also known as <strong>FD Account</strong>), a particular sum of money is deposited in a bank for specific&nbsp;period of time. It&rsquo;s one time deposit and one time take away (withdraw) account.&nbsp;The money deposited in this account can not be withdrawn before the expiry of period.&nbsp;</p><p>However, in case of need,&nbsp; the depositor can ask for closing the fixed deposit prematurely by paying a penalty. The penalty amount varies with banks.</p><p>A high interest rate is paid on fixed deposits. The rate of interest paid for fixed deposit vary according to amount, period and also from bank to bank.</p>', '40', 'ACC-CAT-A86GO'),
(7, 'Current account', '<p><strong>Current account</strong> is mainly for business persons, firms, companies, public enterprises etc and are never used for the purpose of investment or savings.These deposits are the most liquid deposits and there are no limits for number of transactions or the amount of transactions in a day. While, there is no interest paid on amount held in the account, banks charges certain &nbsp;service charges, on such accounts. The current accounts do not have any fixed maturity as these are on continuous basis accounts.</p>', '20', 'ACC-CAT-4O8QW');

-- --------------------------------------------------------

--
-- Table structure for table `iB_admin`
--

CREATE TABLE `iB_admin` (
  `admin_id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile_pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iB_admin`
--

INSERT INTO `iB_admin` (`admin_id`, `name`, `email`, `number`, `password`, `profile_pic`) VALUES
(2, 'System Administrator', 'sysadmin@ibanking.com', 'iBank-ADM-0516', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', '');

-- --------------------------------------------------------

--
-- Table structure for table `iB_bankAccounts`
--

CREATE TABLE `iB_bankAccounts` (
  `account_id` int(20) NOT NULL,
  `acc_name` varchar(200) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  `acc_type` varchar(200) NOT NULL,
  `acc_rates` varchar(200) NOT NULL,
  `acc_status` varchar(200) NOT NULL,
  `acc_amount` varchar(200) NOT NULL,
  `client_id` varchar(200) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `client_national_id` varchar(200) NOT NULL,
  `client_phone` varchar(200) NOT NULL,
  `client_number` varchar(200) NOT NULL,
  `client_email` varchar(200) NOT NULL,
  `client_adr` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iB_bankAccounts`
--

INSERT INTO `iB_bankAccounts` (`account_id`, `acc_name`, `account_number`, `acc_type`, `acc_rates`, `acc_status`, `acc_amount`, `client_id`, `client_name`, `client_national_id`, `client_phone`, `client_number`, `client_email`, `client_adr`, `created_at`) VALUES
(3, 'Children\'s Savings Account', '419630852', 'Savings ', '20', 'Active', '0', '2', 'Mart Developers ', '36651403', '+25437229776', 'iBank-CLIENT-0274', 'mail@martdevelopers.com', '127 001 Localhost', '2020-03-13 12:26:17.252954'),
(4, 'Future Deposits', '619578342', 'Fixed Deposit Account ', '40', 'Active', '0', '2', 'Mart Developers ', '36651403', '+25437229776', 'iBank-CLIENT-0274', 'mail@martdevelopers.com', '127 001 Localhost', '2020-03-13 12:26:14.615645'),
(5, 'Malipo ya Uzeeni', '487362190', 'Recurring deposit ', '15', 'Active', '0', '2', 'Mart Developers ', '36651403', '+25437229776', 'iBank-CLIENT-0274', 'mail@martdevelopers.com', '127 001 Localhost', '2020-03-13 02:52:30.302663'),
(6, 'Children\'s Savings Account', '512743806', 'Savings ', '20', 'Active', '0', '2', 'Mart Developers ', '36651403', '+25437229776', 'iBank-CLIENT-0274', 'mail@martdevelopers.com', '127 001 Localhost', '2020-03-13 02:38:45.911273'),
(7, 'iBusiness', '493528016', 'Recurring deposit ', '15', 'Active', '0', '2', 'Mart Developers ', '36651403', '+25437229776', 'iBank-CLIENT-0274', 'mail@martdevelopers.com', '127 001 Localhost', '2020-03-13 02:40:56.190739'),
(8, 'iRD Account', '698240175', 'Recurring deposit ', '15', 'Active', '0', '2', 'Mart Developers ', '36651403', '+25437229776', 'iBank-CLIENT-0274', 'mail@martdevelopers.com', '127 001 Localhost', '2020-03-13 07:52:35.566523'),
(9, 'iBusiness', '509674382', 'Savings ', '20', 'Active', '0', '3', 'John Doe', '36756481', '9897890089', 'iBank-CLIENT-8127', 'johndoe@gmail.com', '127007 Localhost', '2020-03-14 13:13:23.186139'),
(10, 'Malipo ya Uzeeni', '870954326', ' Retirement ', '10', 'Active', '0', '4', 'Mary Kaluki', '123456789', '+25437229776', 'iBank-CLIENT-2986', 'marykaluki@gmail.com', '127 001 Localhost', '2020-03-16 14:46:02.117062'),
(11, 'iSalary', '389602451', 'Current account ', '20', 'Active', '0', '4', 'Mary Kaluki', '123456789', '+25437229776', 'iBank-CLIENT-2986', 'marykaluki@gmail.com', '127 001 Localhost', '2020-03-17 08:53:06.818299'),
(12, 'Malipo ya Uzeeni', '159082473', ' Retirement ', '10', 'Active', '0', '5', 'Mart Developers Inc.', '35574881', '+25437229776', 'iBank-CLIENT-7059', 'mail@martdevelopers.com', '127 001 Localhost', '2020-03-29 08:50:14.821155');

-- --------------------------------------------------------

--
-- Table structure for table `iB_clients`
--

CREATE TABLE `iB_clients` (
  `client_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `national_id` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `client_number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iB_clients`
--

INSERT INTO `iB_clients` (`client_id`, `name`, `national_id`, `phone`, `address`, `email`, `password`, `profile_pic`, `client_number`) VALUES
(3, 'John Doe', '36756481', '9897890089', '127007 Localhost', 'johndoe@gmail.com', '3328a32175abefec3b7634529f1bdd7b82636d38', '', 'iBank-CLIENT-8127');

-- --------------------------------------------------------

--
-- Table structure for table `iB_notifications`
--

CREATE TABLE `iB_notifications` (
  `notification_id` int(20) NOT NULL,
  `notification_details` text NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iB_notifications`
--

INSERT INTO `iB_notifications` (`notification_id`, `notification_details`, `created_at`) VALUES
(3, 'Mary Kaluki Has Transfered Ksh 25000 From Bank Account 870954326 To Bank Account 419630852', '2020-03-16 15:03:22.098172'),
(4, 'Mary Kaluki Has Deposited Ksh 10000 To Bank Account 870954326', '2020-03-16 15:23:21.264590'),
(5, 'Mary Kaluki Has Deposited Ksh 5000 To Bank Account 870954326', '2020-03-17 08:17:48.275788'),
(6, 'Mary Kaluki Has Deposited Ksh 20000 To Bank Account 870954326', '2020-03-17 09:03:04.311769'),
(7, 'Mary Kaluki Has Withdrawn Ksh 0 From Bank Account 870954326', '2020-03-17 09:07:35.798921'),
(8, 'Mary Kaluki Has Transfered Ksh 50000 From Bank Account 870954326 To Bank Account 389602451', '2020-03-17 09:17:05.570529'),
(9, 'Mary Kaluki Has Deposited Ksh 67000 To Bank Account 389602451', '2020-03-19 10:43:03.196705'),
(10, 'Mary Kaluki Has Withdrawn Ksh 67000 From Bank Account 870954326', '2020-03-19 10:43:15.572102'),
(11, 'Mary Kaluki Has Transfered Ksh 5600 From Bank Account 389602451 To Bank Account 870954326', '2020-03-19 10:43:53.353892'),
(12, 'Mart Developers Inc. Has Deposited Ksh 50000 To Bank Account 159082473', '2020-03-29 08:50:43.429631'),
(13, 'Mart Developers Inc. Has Withdrawn Ksh 25000 From Bank Account 159082473', '2020-03-29 08:51:12.429129'),
(14, 'Mart Developers  Has Deposited Ksh 9000 To Bank Account 419630852', '2020-04-22 19:52:12.802610');

-- --------------------------------------------------------

--
-- Table structure for table `iB_password_resets`
--

CREATE TABLE `iB_password_resets` (
  `id` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `dummy_pwd` varchar(200) NOT NULL,
  `reset_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iB_staff`
--

CREATE TABLE `iB_staff` (
  `staff_id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `staff_number` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `profile_pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iB_staff`
--

INSERT INTO `iB_staff` (`staff_id`, `name`, `staff_number`, `phone`, `email`, `password`, `sex`, `profile_pic`) VALUES
(3, 'Staff ', 'iBank-STAFF-6785', '0704975742', 'staff@ibanking.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'Male', 'Orion.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `iB_Transactions`
--

CREATE TABLE `iB_Transactions` (
  `tr_id` int(20) NOT NULL,
  `tr_code` varchar(200) NOT NULL,
  `account_id` varchar(200) NOT NULL,
  `acc_name` varchar(200) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  `acc_type` varchar(200) NOT NULL,
  `acc_amount` varchar(200) NOT NULL,
  `tr_type` varchar(200) NOT NULL,
  `tr_status` varchar(200) NOT NULL,
  `client_id` varchar(200) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `client_national_id` varchar(200) NOT NULL,
  `transaction_amt` varchar(200) NOT NULL,
  `client_phone` varchar(200) NOT NULL,
  `receiving_acc_no` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `receiving_acc_name` varchar(200) NOT NULL,
  `receiving_acc_holder` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iB_Transactions`
--

INSERT INTO `iB_Transactions` (`tr_id`, `tr_code`, `account_id`, `acc_name`, `account_number`, `acc_type`, `acc_amount`, `tr_type`, `tr_status`, `client_id`, `client_name`, `client_national_id`, `transaction_amt`, `client_phone`, `receiving_acc_no`, `created_at`, `receiving_acc_name`, `receiving_acc_holder`) VALUES
(1, 'GMIF7DfPuzZ4s6nbwWHi', '3', 'Children\'s Savings Account', '419630852', 'Savings ', '', 'Deposit', 'Success ', '2', 'Mart Developers ', '36651403', '8900', '+25437229776', '', '2020-03-13 12:29:01.084759', '', ''),
(2, 'sE1WrFdMyVGILzeHlKOk', '5', 'Malipo ya Uzeeni', '487362190', 'Recurring deposit ', '0', 'Deposit', 'Success ', '2', 'Mart Developers ', '36651403', '50000', '+25437229776', '', '2020-03-13 12:44:57.082994', '', ''),
(3, 'PurOg1lqm7RyY4zinoF2', '3', 'Children\'s Savings Account', '419630852', 'Savings ', '', 'Deposit', 'Success ', '2', 'Mart Developers ', '36651403', '50000', '+25437229776', '', '2020-03-13 13:02:25.304324', '', ''),
(6, 'ztbO70sdpRNKT1v6lVS5', '5', 'Malipo ya Uzeeni', '487362190', 'Recurring deposit ', '', 'Deposit', 'Success ', '2', 'Mart Developers ', '36651403', '89000', '+25437229776', '', '2020-03-14 01:52:14.053662', '', ''),
(7, 'YIgxWtRScFyKOb9GEdsJ', '3', 'Children\'s Savings Account', '419630852', 'Savings ', '', 'Withdrawal', 'Success ', '2', 'Mart Developers ', '36651403', '5000', '+25437229776', '', '2020-03-14 02:29:31.250343', '', ''),
(8, 'FWGPZbpTJrc4x17Qo9nV', '9', 'iBusiness', '509674382', 'Savings ', '', 'Deposit', 'Success ', '3', 'John Doe', '36756481', '1000000000', '9897890089', '', '2020-03-14 13:14:16.725833', '', ''),
(9, '2MQm9F3BIEZSXHPjhz01', '9', 'iBusiness', '509674382', 'Savings ', '', 'Withdrawal', 'Success ', '3', 'John Doe', '36756481', '50000', '9897890089', '', '2020-03-14 13:27:26.122736', '', ''),
(10, 'gbOJUj396nRaxYwyMAdz', '3', 'Children\'s Savings Account', '419630852', 'Savings ', '', 'Withdrawal', 'Success ', '2', 'Mart Developers ', '36651403', '100', '+25437229776', '', '2020-03-15 14:27:49.554452', '', ''),
(11, 'Gh6xC0Oe7MPgFdBJVXEp', '3', 'Children\'s Savings Account', '419630852', 'Savings ', '', 'Withdrawal', 'Success ', '2', 'Mart Developers ', '36651403', '10000', '+25437229776', '', '2020-03-15 15:12:11.505770', '', ''),
(12, 'E8nGXb7opQT9yrqIwHm0', '5', 'Malipo ya Uzeeni', '487362190', 'Recurring deposit ', '', 'Withdrawal', 'Success ', '2', 'Mart Developers ', '36651403', '10000', '+25437229776', '', '2020-03-15 15:15:50.761485', '', ''),
(13, 'Y5K4Ia3nNSwbXQ6FoWTx', '3', 'Children\'s Savings Account', '419630852', 'Savings ', '', 'Withdrawal', 'Success ', '2', 'Mart Developers ', '36651403', '60000', '+25437229776', '', '2020-03-15 15:17:54.929247', '', ''),
(14, 'Ehi49sf2MlnCW8JRygVQ', '3', 'Children\'s Savings Account', '419630852', 'Savings ', '', 'Deposit', 'Success ', '2', 'Mart Developers ', '36651403', '89000', '+25437229776', '', '2020-03-15 15:20:12.247625', '', ''),
(19, 'WZxlg04fIHqCvdaEhUNF', '5', 'Malipo ya Uzeeni', '487362190', 'Recurring deposit ', '', 'Transfer', 'Success ', '2', 'Mart Developers ', '36651403', '10000', '+25437229776', '698240175', '2020-03-15 16:17:55.195651', 'iRD Account', 'Mart Developers '),
(20, 'lnzQAc19y5NXmwFUR3sC', '3', 'Children\'s Savings Account', '419630852', 'Savings ', '', 'Transfer', 'Success ', '2', 'Mart Developers ', '36651403', '1000', '+25437229776', '509674382', '2020-03-15 16:30:31.588801', 'iBusiness', 'John Doe'),
(22, 'NcisfpwhZACkRzJPWIKE', '9', 'iBusiness', '509674382', 'Savings ', '', 'Deposit', 'Success ', '3', 'John Doe', '36756481', '80000', '9897890089', '', '2020-03-15 16:42:12.974726', '', ''),
(23, 'ADM4k8V9yBKe7QgqxWd6', '3', 'Children\'s Savings Account', '419630852', 'Savings ', '', 'Transfer', 'Success ', '2', 'Mart Developers ', '36651403', '50000', '+25437229776', '487362190', '2020-03-15 17:01:54.516982', 'Malipo ya Uzeeni', 'Mart Developers '),
(24, 'CNcwTpYbv87GMegnO3AI', '10', 'Malipo ya Uzeeni', '870954326', ' Retirement ', '', 'Deposit', 'Success ', '4', 'Mary Kaluki', '123456789', '500000', '+25437229776', '', '2020-03-16 14:55:04.430050', '', ''),
(25, 'ZObVeyjIch84q3ms5orJ', '10', 'Malipo ya Uzeeni', '870954326', ' Retirement ', '', 'Withdrawal', 'Success ', '4', 'Mary Kaluki', '123456789', '50000', '+25437229776', '', '2020-03-16 14:59:10.288794', '', ''),
(26, 'bli1OtxaJMeQ9pmhXwSW', '10', 'Malipo ya Uzeeni', '870954326', ' Retirement ', '', 'Transfer', 'Success ', '4', 'Mary Kaluki', '123456789', '25000', '+25437229776', '419630852', '2020-03-16 15:03:22.058263', 'Children\'s Savings Account', 'Mart Developers '),
(27, 'Nf6lceCpo8DEPbWyhxB1', '10', 'Malipo ya Uzeeni', '870954326', ' Retirement ', '', 'Deposit', 'Success ', '4', 'Mary Kaluki', '123456789', '10000', '+25437229776', '', '2020-03-16 15:23:21.211870', '', ''),
(29, 'g8eSpd1Z9TOJmLF5zUxA', '10', 'Malipo ya Uzeeni', '870954326', ' Retirement ', '', 'Deposit', 'Success ', '4', 'Mary Kaluki', '123456789', '20000', '+25437229776', '', '2020-03-17 09:03:04.256523', '', ''),
(31, 'h0D1l8Z6tGcUaQ3qAuRT', '10', 'Malipo ya Uzeeni', '870954326', ' Retirement ', '', 'Transfer', 'Success ', '4', 'Mary Kaluki', '123456789', '50000', '+25437229776', '389602451', '2020-03-17 09:17:05.498099', 'iSalary', 'Mary Kaluki'),
(32, 'MFS8eBGdDVrlPfyq0zNg', '11', 'iSalary', '389602451', 'Current account ', '', 'Deposit', 'Success ', '4', 'Mary Kaluki', '123456789', '67000', '+25437229776', '', '2020-03-19 10:43:03.090064', '', ''),
(33, '3Tw9N5VM2PDpCXSneEJ7', '10', 'Malipo ya Uzeeni', '870954326', ' Retirement ', '', 'Withdrawal', 'Success ', '4', 'Mary Kaluki', '123456789', '67000', '+25437229776', '', '2020-03-19 10:43:15.478457', '', ''),
(34, 'vWy0N5CZh46sn9OmfaXo', '11', 'iSalary', '389602451', 'Current account ', '', 'Transfer', 'Success ', '4', 'Mary Kaluki', '123456789', '5600', '+25437229776', '870954326', '2020-03-19 10:43:53.289487', 'Malipo ya Uzeeni', 'Mary Kaluki'),
(35, 'eKovJq67AUyzuBZ8XhlC', '12', 'Malipo ya Uzeeni', '159082473', ' Retirement ', '', 'Deposit', 'Success ', '5', 'Mart Developers Inc.', '35574881', '50000', '+25437229776', '', '2020-03-29 08:50:43.378593', '', ''),
(37, 'cGIErMqjsiR2wedtfpVl', '3', 'Children\'s Savings Account', '419630852', 'Savings ', '', 'Deposit', 'Success ', '2', 'Mart Developers ', '36651403', '9000', '+25437229776', '', '2020-04-22 19:52:12.734430', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iB_Acc_types`
--
ALTER TABLE `iB_Acc_types`
  ADD PRIMARY KEY (`acctype_id`);

--
-- Indexes for table `iB_admin`
--
ALTER TABLE `iB_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `iB_bankAccounts`
--
ALTER TABLE `iB_bankAccounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `iB_clients`
--
ALTER TABLE `iB_clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `iB_notifications`
--
ALTER TABLE `iB_notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `iB_password_resets`
--
ALTER TABLE `iB_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iB_staff`
--
ALTER TABLE `iB_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `iB_Transactions`
--
ALTER TABLE `iB_Transactions`
  ADD PRIMARY KEY (`tr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iB_Acc_types`
--
ALTER TABLE `iB_Acc_types`
  MODIFY `acctype_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `iB_admin`
--
ALTER TABLE `iB_admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `iB_bankAccounts`
--
ALTER TABLE `iB_bankAccounts`
  MODIFY `account_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `iB_clients`
--
ALTER TABLE `iB_clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `iB_notifications`
--
ALTER TABLE `iB_notifications`
  MODIFY `notification_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `iB_password_resets`
--
ALTER TABLE `iB_password_resets`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iB_staff`
--
ALTER TABLE `iB_staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `iB_Transactions`
--
ALTER TABLE `iB_Transactions`
  MODIFY `tr_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
