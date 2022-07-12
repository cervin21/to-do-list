CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `task` (`task_id`, `task`, `status`) VALUES
(1, 'Throw out trash', 'Completed'),
(2, 'Take quiz', 'Pending'),
(3, 'Add an event', 'Pending');


ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);


ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;