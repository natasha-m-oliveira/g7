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
-- Estrutura `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_access_profile` int(11) NOT NULL,
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