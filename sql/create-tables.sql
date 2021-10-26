--
-- Database: `g7`
--

-- --------------------------------------------------------

USE g7;

--
-- Estrutura `access_profile`
--

CREATE TABLE `access_profile` (
    `id` int(11) NOT NULL,
    `access_profile` varchar(200) NOT NULL,
    `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `update_at`timestamp ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes `access_profile`
--
ALTER TABLE `access_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT `access_profile`
--
ALTER TABLE `access_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Estrutura `institution`
--

CREATE TABLE `institution` (
    `id` int(11) NOT NULL,
    `institution` varchar(255) NOT NULL,
    `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `update_at`timestamp ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT `institution`
--
ALTER TABLE `institution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Estrutura `national_mobility`
--

CREATE TABLE `national_mobility` (
    `id` int(11) NOT NULL,
    `first_name` varchar(200) NOT NULL,
    `last_name` varchar(200) NOT NULL,
    `email` varchar(255) NOT NULL,
    `phone` varchar(15) NOT NULL,
    `course` varchar(255) NOT NULL,
    `semester` int(11) NOT NULL,
    `id_home_institution` int(11) NOT NULL,
    `id_destination_institution` int(11) NOT NULL,
    `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `update_at`timestamp ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes `national_mobility`
--
ALTER TABLE `national_mobility`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `national_mobility`
  ADD CONSTRAINT `fk_home_institution`
  FOREIGN KEY (`id_home_institution`)
  REFERENCES `institution` (`id`)
  ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE `national_mobility`
  ADD CONSTRAINT `fk_destination_institution`
  FOREIGN KEY (`id_destination_institution`)
  REFERENCES `institution` (`id`)
  ON UPDATE CASCADE ON DELETE RESTRICT;

--
-- AUTO_INCREMENT `national_mobility`
--
ALTER TABLE `national_mobility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Estrutura `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_access_profile` int(11) NOT NULL,
  `last_access` timestamp,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at`timestamp ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `member`
  ADD CONSTRAINT `fk_access_profile`
  FOREIGN KEY (`id_access_profile`)
  REFERENCES `access_profile` (`id`)
  ON UPDATE CASCADE ON DELETE RESTRICT;

--
-- AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Estrutura `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `theme` varchar(200) NOT NULL,
  `local` varchar(200) NOT NULL,
  `visible` int(1) NOT NULL,
  `category` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at`timestamp ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;