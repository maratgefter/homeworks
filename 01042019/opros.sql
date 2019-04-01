CREATE DATABASE IF NOT EXISTS `opros` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `opros`;


CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `fio` varchar(150) NOT NULL,
  `age` int(11) NOT NULL,
  `e-mail` varchar(150) NOT NULL,
  `opinion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `answers` (`id`, `fio`, `age`, `e-mail`, `opinion`) VALUES
(1, 'Анатолий Александрович Егоров', 54, 'aelex_egor54@gmail.com', 'Мероприятие чудесное! Я в восторге! '),
(2, 'Александра Васильевна Алексеева', 32, 'alexandra_pretty@gmail.com', 'Спасибо организаторам за проделанный труд! Это что-то нереальное!'),
(3, 'Василий Анатольевич Пантелеев', 25, 'alexdevil@mail.ru', 'Я недоволен! Из рук вон плохо! Я буду жаловаться...'),
(4, 'Василий Петрович Белоусов', 60, 'Что это такое?', 'Ох уж эта молодежь... Молодцы! Так держать'),
(5, 'Анна Александровна Буй', 33, 'anja0827@gmail.com', 'Хорошая идея, но реализация хромает. Нужно еще поработать над организационными моментами... Удачи!');

ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

SELECT * FROM `answers`;

DELETE FROM `answers`;