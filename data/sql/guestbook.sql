CREATE TABLE IF NOT EXISTS `guestbook` (
`id` int(10) unsigned NOT NULL,
  `email` varchar(32) NOT NULL DEFAULT 'noemail@test.com',
  `comment` text,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guestbook`
--
ALTER TABLE `guestbook` ADD PRIMARY KEY (`id`);
--

--
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

--
-- DATA
--
INSERT INTO guestbook (email, comment, created) VALUES
    ('ralph.schindler@zend.com',
    'Hello! Hope you enjoy this sample zf application!',
    NOW());
INSERT INTO guestbook (email, comment, created) VALUES
    ('foo@bar.com',
    'Baz baz baz, baz baz Baz baz baz - baz baz baz.',
    NOW());