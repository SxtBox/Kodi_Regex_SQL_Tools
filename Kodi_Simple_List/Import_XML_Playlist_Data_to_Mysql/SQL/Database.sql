DROP TABLE IF EXISTS `kodi_simple_list`;
CREATE TABLE IF NOT EXISTS `kodi_simple_list` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `link` text CHARACTER SET utf8 NOT NULL,
  `thumbnail` text CHARACTER SET utf8 NOT NULL,
  `fanart` text CHARACTER SET utf8 NOT NULL,
  `category` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `kodi_simple_list`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `kodi_simple_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;