-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:1025
-- Généré le :  Ven 26 Février 2016 à 09:21
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `marmiton`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Dessert'),
(2, ' Facile'),
(3, ' Patisserie'),
(4, 'Boisson'),
(5, 'Entrée'),
(6, 'Bon marché'),
(7, 'Patisserie'),
(8, 'Facile'),
(9, 'Plat');

-- --------------------------------------------------------

--
-- Structure de la table `creator`
--

CREATE TABLE `creator` (
  `id_creator` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `creator`
--

INSERT INTO `creator` (`id_creator`, `pseudo`, `mail`) VALUES
(1, 'Antoine', 'antoine.delaplace@gmail.com'),
(2, 'Tonio', 'antoine.delaplace@gmail.com'),
(3, 'B.X', 'benoitxavierhouvet@gmail.com'),
(4, 'B.X', 'benoitxavierhouvet@gmail.com'),
(5, 'B.X', 'benoitxavierhouvet@gmail.com'),
(6, 'Tonio', 'antoine.delaplace@gmail.com'),
(7, 'Tonio', 'antoine.delaplace@gmail.com'),
(8, 'tonio', 'antoine.delaplace@gmail.com'),
(9, 'B.X', 'benoitxavierhouvet@gmail.com'),
(10, 'Tonio', 'antoine.delaplace@gmail.com'),
(11, 'Tonio', 'antoine.delaplace@gmail.com'),
(12, 'Tonio', 'antoine.delaplace@gmail.com'),
(13, 'B.X', 'benoitxavierhouvet@gmail.com'),
(14, 'Tonio', 'antoine.delaplace@gmail.com'),
(15, 'B.X', 'benoitxavierhouvet@gmail.com'),
(16, 'Tonio', 'antoine.delaplace@gmail.com'),
(17, 'Tonio', 'antoine.delaplace@gmail.com'),
(18, 'Tonio', 'antoine.delaplace@gmail.com'),
(19, 'Tonio', 'antoine.delaplace@gmail.com'),
(20, 'B.X', 'benoitxavierhouvet@gmail.com'),
(21, 'Tonio', 'antoine.delaplace@gmail.com'),
(22, 'B.X', 'benoitxavierhouvet@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `id_ingredient` int(11) NOT NULL,
  `name_ingredient` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ingredient`
--

INSERT INTO `ingredient` (`id_ingredient`, `name_ingredient`) VALUES
(1, 'beurre'),
(2, 'oeuf'),
(3, 'sucre'),
(4, 'sucre vanillé'),
(5, 'farine'),
(6, 'chocolat noir'),
(7, 'sel'),
(8, 'levure chimique'),
(9, 'eau'),
(10, 'lait'),
(11, 'vanille'),
(12, 'sucre semoule'),
(13, 'levure traditionelle'),
(14, 'poudre amande'),
(15, 'sucre glace'),
(16, 'beurre salé'),
(17, 'crème fraiche liquide'),
(18, 'banane'),
(19, 'kiwis'),
(20, 'mangue'),
(21, 'pistache'),
(22, 'miel'),
(23, 'citron'),
(24, 'pâte brisée'),
(25, 'fromage'),
(26, 'figues'),
(27, 'thé'),
(28, 'romarins'),
(29, 'beurre doux'),
(30, 'oignon'),
(31, 'huile'),
(32, 'vin blanc'),
(33, 'moutarde'),
(34, 'pâte feuilleté'),
(35, 'jambon blanc'),
(36, 'gruyères rapés'),
(37, 'pates'),
(38, 'oeufs'),
(39, 'poivre'),
(40, 'lardons'),
(41, 'Dattes'),
(42, 'amandes'),
(43, 'eau de rose'),
(44, 'sirop de sucre'),
(45, 'colorant alimentaire'),
(46, 'canard'),
(47, 'rhubarbe'),
(48, 'sucre roux'),
(49, 'échalotte'),
(50, 'corriandre'),
(51, 'piment'),
(52, 'sel de guérande'),
(53, 'Porc'),
(54, 'ananas'),
(55, 'citron vert'),
(56, 'gingembre'),
(57, 'vinaigre de cidre'),
(58, 'sauce soja'),
(59, 'ail'),
(60, ''),
(61, 'menthe'),
(62, 'basilic'),
(63, 'chocolat'),
(64, 'corn flakes'),
(65, 'moules'),
(66, 'Herbe de provence'),
(67, 'bouteille de vin blanc'),
(68, 'Huile d''olive'),
(69, 'courge'),
(70, 'potiron'),
(71, 'pommes de terre'),
(72, 'gousse d''ail'),
(73, 'morceau de gingembre'),
(74, 'paprika'),
(75, 'curry');

-- --------------------------------------------------------

--
-- Structure de la table `lebel_quantity`
--

CREATE TABLE `lebel_quantity` (
  `id_quantity` int(11) NOT NULL,
  `name_quantity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lebel_quantity`
--

INSERT INTO `lebel_quantity` (`id_quantity`, `name_quantity`) VALUES
(1, 'grammes'),
(2, ''),
(3, 'sachet'),
(4, 'cuillère à café'),
(5, 'cl'),
(6, 'pincée'),
(7, 'filet'),
(8, 'glace'),
(9, 'zeste'),
(10, 'grosses'),
(11, 'cuillère à soupe'),
(12, 'brins'),
(13, 'tranches'),
(14, 'demi litre'),
(15, 'bouquet'),
(16, 'Kg'),
(17, 'gousse'),
(18, 'feuilles'),
(19, 'Array');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `id_recipe` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `pseudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`id`, `id_recipe`, `note`, `commentaire`, `pseudo`) VALUES
(1, 1, 5, 'J''adore ça !', 'Tonio'),
(2, 2, 4, 'Délicieux', 'Tonio'),
(3, 3, 5, 'Hum !', 'B.X'),
(4, 3, 4, 'De la bombe, c''est trop bon', 'Tonio'),
(5, 4, 3, 'Un peu trop moux', 'B.X'),
(6, 5, 1, 'Recette incompléte', 'Tonio'),
(7, 6, 5, 'j''adore la pistache', 'Yoan'),
(8, 7, 1, 'Je n''aime pas le fromage', 'Tonio'),
(9, 8, 5, 'mon gateau d''anniversaire ! terrible', 'mickael');

-- --------------------------------------------------------

--
-- Structure de la table `quantity_category`
--

CREATE TABLE `quantity_category` (
  `id_recipe` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `quantity_category`
--

INSERT INTO `quantity_category` (`id_recipe`, `id_category`, `id`) VALUES
(1, 1, 1),
(1, 2, 2),
(2, 1, 3),
(2, 3, 4),
(2, 2, 5),
(3, 1, 6),
(3, 2, 7),
(4, 1, 8),
(4, 3, 9),
(5, 4, 10),
(6, 1, 11),
(6, 2, 12),
(7, 5, 13),
(7, 2, 14),
(8, 1, 15),
(8, 6, 16),
(8, 7, 17),
(8, 2, 18),
(9, 6, 19),
(9, 8, 20),
(9, 5, 21),
(10, 9, 22),
(10, 8, 23),
(10, 6, 24),
(11, 1, 25),
(11, 8, 26),
(11, 6, 27),
(12, 9, 28),
(12, 2, 29),
(13, 9, 30),
(13, 8, 31),
(13, 6, 32),
(14, 1, 33),
(14, 8, 34),
(14, 6, 35),
(15, 5, 36),
(15, 2, 37),
(16, 5, 38),
(16, 6, 39);

-- --------------------------------------------------------

--
-- Structure de la table `quantity_ingredient`
--

CREATE TABLE `quantity_ingredient` (
  `id` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL,
  `id_quantity` int(11) NOT NULL,
  `id_recipe` int(11) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `quantity_ingredient`
--

INSERT INTO `quantity_ingredient` (`id`, `id_ingredient`, `id_quantity`, `id_recipe`, `value`) VALUES
(0, 1, 1, 1, '85'),
(1, 2, 2, 1, '1'),
(2, 3, 1, 1, '85'),
(3, 4, 3, 1, '1'),
(4, 5, 1, 1, '150'),
(5, 6, 1, 1, '100'),
(6, 7, 4, 1, '1'),
(7, 8, 4, 1, '1'),
(8, 9, 5, 2, '25'),
(9, 5, 1, 2, '125'),
(10, 1, 1, 2, '60'),
(11, 7, 6, 2, '1'),
(12, 3, 1, 2, '50'),
(13, 2, 2, 2, '4'),
(14, 6, 1, 2, '50'),
(15, 10, 7, 2, '1'),
(16, 11, 8, 2, '1'),
(17, 5, 1, 3, '250'),
(18, 12, 1, 3, '30'),
(19, 2, 2, 3, '2'),
(20, 13, 3, 3, '1'),
(21, 1, 1, 3, '65'),
(22, 7, 6, 3, '1'),
(23, 10, 5, 3, '30'),
(24, 2, 2, 4, '3'),
(25, 14, 1, 4, '125'),
(26, 15, 1, 4, '200'),
(27, 3, 1, 4, '150'),
(28, 16, 1, 4, '100'),
(29, 17, 5, 4, '10'),
(30, 18, 2, 5, '2'),
(31, 21, 1, 6, '250'),
(32, 3, 1, 6, '200'),
(33, 2, 2, 6, '2'),
(34, 22, 4, 6, '2'),
(35, 23, 9, 6, '1'),
(36, 24, 2, 7, '1'),
(37, 25, 1, 7, '350'),
(38, 26, 10, 7, '6'),
(39, 27, 3, 7, '1'),
(40, 22, 11, 7, '1'),
(41, 28, 12, 7, ''),
(42, 6, 1, 8, '200'),
(43, 2, 2, 8, '4'),
(44, 29, 1, 8, '125'),
(45, 3, 1, 8, '200'),
(46, 5, 1, 8, '100'),
(47, 8, 3, 8, '1'),
(48, 30, 2, 9, '1'),
(49, 31, 11, 9, '2'),
(50, 5, 4, 9, '1'),
(51, 32, 11, 9, '3'),
(52, 33, 11, 9, '1'),
(53, 17, 11, 9, '3'),
(54, 34, 1, 9, '230'),
(55, 35, 13, 9, '4'),
(56, 36, 1, 9, '60'),
(57, 1, 1, 9, '15'),
(58, 2, 2, 9, '1'),
(59, 37, 1, 10, '500'),
(60, 17, 5, 10, '50'),
(61, 38, 2, 10, '3'),
(62, 7, 6, 10, '1'),
(63, 39, 2, 10, ''),
(64, 40, 1, 10, '250'),
(65, 30, 2, 10, '1'),
(66, 41, 1, 11, '300'),
(67, 42, 1, 11, '250'),
(68, 15, 1, 11, '150'),
(69, 43, 11, 11, '2'),
(70, 44, 14, 11, '1'),
(71, 45, 6, 11, '1'),
(72, 12, 1, 11, '200'),
(73, 46, 2, 12, '1'),
(74, 47, 1, 12, '700'),
(75, 48, 1, 12, '150'),
(76, 49, 2, 12, '2'),
(77, 50, 15, 12, '1'),
(78, 51, 2, 12, '1'),
(79, 52, 2, 12, ''),
(80, 53, 16, 13, '1'),
(81, 54, 2, 13, '1'),
(82, 55, 2, 13, '1'),
(83, 56, 2, 13, '1'),
(84, 22, 11, 13, '2'),
(85, 57, 2, 13, ''),
(86, 58, 2, 13, ''),
(87, 59, 17, 13, '8'),
(88, 60, 2, 13, ''),
(89, 30, 2, 13, '8'),
(90, 50, 11, 13, '1'),
(91, 61, 18, 13, ''),
(92, 62, 18, 13, ''),
(93, 63, 1, 14, '150'),
(94, 1, 1, 14, '100'),
(95, 64, 1, 14, '100'),
(96, 65, 16, 15, '2'),
(97, 30, 2, 15, '1'),
(98, 66, 2, 15, ''),
(99, 67, 19, 15, '1'),
(100, 5, 2, 15, ''),
(101, 68, 2, 15, ''),
(102, 60, 2, 15, ''),
(103, 69, 2, 16, '1'),
(104, 70, 2, 16, '1'),
(105, 71, 2, 16, '1'),
(106, 30, 2, 16, '2'),
(107, 72, 2, 16, '5'),
(108, 73, 2, 16, '1'),
(109, 10, 5, 16, '20'),
(110, 74, 4, 16, '1'),
(111, 75, 4, 16, '1'),
(112, 31, 11, 16, '1'),
(113, 7, 2, 16, '');

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

CREATE TABLE `recipe` (
  `id_recette` int(11) NOT NULL,
  `name_recette` text NOT NULL,
  `date_create` date NOT NULL,
  `picture` text NOT NULL,
  `id_creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recipe`
--

INSERT INTO `recipe` (`id_recette`, `name_recette`, `date_create`, `picture`, `id_creator`) VALUES
(1, 'Cookies Maison', '2016-02-25', 'Upload/img/cookie.jpg', 1),
(2, 'Profiteroles', '2016-02-25', 'Upload/img/profiteroles.jpg', 2),
(3, 'Pancakes', '2016-02-25', 'Upload/img/pancakes.jpg', 3),
(4, 'Macarons caramel', '2016-02-25', 'Upload/img/macaron.jpg', 5),
(5, 'Smoothie', '2016-02-25', 'Upload/img/smoothies.jpg', 7),
(6, 'Biscuits pistache', '2016-02-25', 'Upload/img/sables.jpg', 8),
(7, 'Chaussons', '2016-02-25', 'Upload/img/chaussons.jpg', 9),
(8, 'gateau aux chocolat', '2016-02-25', 'Upload/img/gateau_choco.jpg', 11),
(9, 'Croissants aux jambons', '2016-02-26', 'Upload/img/croissants.jpg', 12),
(10, 'Pâtes à la carbo', '2016-02-26', 'Upload/img/pates_carbo.jpg', 13),
(11, 'Dattes farcies', '2016-02-26', 'Upload/img/dattes.png', 14),
(12, 'Canard farci à la rhubarbe', '2016-02-26', 'Upload/img/canard_rhubarbe.jpg', 15),
(13, 'Porc ananas', '2016-02-26', 'Upload/img/porc_ananas.jpg', 19),
(14, 'Rose des sables au chocolat', '2016-02-26', 'Upload/img/rose_des_sables.jpg', 20),
(15, 'Gratin de moules', '2016-02-26', 'Upload/img/gratin_moules.jpg', 21),
(16, 'Velouté de courge', '2016-02-26', 'Upload/img/veloute_courge.jpg', 22);

-- --------------------------------------------------------

--
-- Structure de la table `step`
--

CREATE TABLE `step` (
  `id` int(11) NOT NULL,
  `id_recipe` int(11) NOT NULL,
  `number_step` int(11) NOT NULL,
  `step` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `step`
--

INSERT INTO `step` (`id`, `id_recipe`, `number_step`, `step`) VALUES
(0, 1, 0, 'Préchauffer le four à 180°C (thermostat 6).'),
(1, 1, 1, 'Faire ramollir le beurre à température ambiante. Dans un saladier, mettre 75 g de beurre, incorporer le sucre, l''oeuf entier, la vanille et mélanger le tout.\r\n'),
(2, 1, 2, 'Ajouter petit à petit la farine mélangée à la levure, le sel et le chocolat coupé en petits morceaux.\r\n'),
(3, 1, 3, 'Beurrer une plaque allant au four et former les cookies sur la plaque.\r\n'),
(4, 1, 4, 'Pour former les cookies, utiliser 2 cuillères à soupe et faire des petits tas espacés les uns des autres; ils grandiront à la cuisson.\r\n'),
(5, 2, 0, 'Mettre l''eau, le beurre, le sucre et le sel dans une casserole sur le feu.'),
(6, 2, 1, 'Porter l''eau à ébullition. Retirer du feu et verser la farine en une seule fois. \r\n'),
(7, 2, 2, 'Mélanger avec une cuillère en bois et ne pas laisser de grumeaux. \r\n'),
(8, 2, 3, 'Remuer la pâte au dessus du feu, jusqu''à ce qu''elle se détache des parois de la casserole et forme une boule.\r\n'),
(9, 2, 4, 'Laisser refroidir une minute. Incorporer les œufs un à un.\r\n'),
(10, 2, 5, 'Former les choux sur une plaque recouverte de papier sulfurisé.\r\n'),
(11, 2, 6, 'Cuire au four chaud à 180°C (th.6) pendant une vingtaine de minutes. \r\n'),
(12, 2, 7, 'Une fois les choux refroidis, préparer votre sauce au chocolat. Faire fondre le chocolat au bain-marie avec un peu de lait (varier la quantité en fonction des goûts). \r\n'),
(13, 2, 8, 'Pour finir, couper les choux en deux, les garnir d''une boule de glace. Disposer les choux dans les assiettes et verser le chocolat tiède dessus. Déguster aussitôt. \r\n'),
(14, 3, 0, 'Faire fondre le beurre, dans une casserole à feu doux ou dans un bol au micro-ondes. \r\n'),
(15, 3, 1, 'Mettre la farine, la levure et le sucre dans un saladier. Mélanger et creuser un puits. \r\n'),
(16, 3, 2, 'Ajouter ensuite les œufs entiers et fouetter l''ensemble.\r\n'),
(17, 3, 3, 'Incorporer le beurre fondu, fouetter puis délayer progressivement le mélange avec le lait afin d''éviter les grumeaux.\r\n'),
(18, 3, 4, 'Laisser reposer la pâte au minimum 1 heure au réfrigérateur.\r\n'),
(19, 3, 5, 'Dans une poêle chaude et légèrement huilée, faire cuire comme des crêpes, mais en les faisant plus petites. Réserver au chaud et déguster.\r\n'),
(20, 4, 0, 'Dans un saladier, mettre les 200 g de sucre glace et les 125 g de poudre d''amande et bien mélanger.'),
(21, 4, 1, 'Battre les 3 blancs d''oeufs en neige très fermes et les incorporer délicatement au mélange poudre d''amande/sucre glace.\r\n'),
(22, 4, 2, 'Mettre du papier sulfurisé sur la plaque du four, et former des petits ronds avec le mélange précédent, de 3 cm de diamètre environ, les disposer en quinconce.\r\n'),
(23, 4, 3, 'Les laisser reposer 30 min (cela permet d''obtenir des coques bien lisses )!\r\n'),
(24, 4, 4, 'Mettre à cuire environ 10 min à 180°C (thermostat 6), bien surveiller car ça dépend des fours, cela doit donner des capuchons dorés. \r\nAttendre que les capuchons refroidissent un peu pour les décoller.'),
(25, 4, 5, 'Faire fondre 150 g de sucre en poudre à la casserole, éviter de trop mélanger sinon cela fait des grumeaux (pour faire un caramel). \r\n'),
(26, 4, 6, 'Quand le sucre est bien doré et liquide, ôter la casserole du feu et ajouter petit à petit les 100 g de beurre salé, il faut parfois remettre à feu doux pour que ça se mélange bien.\r\n'),
(27, 4, 7, 'Ajouter 10 cl de crème fraiche liquide, indispensable pour que le caramel ne durcisse pas. \r\n'),
(28, 4, 8, 'Attendre que le caramel refroidisse un peu.\r\nEnfin passer au dressage :\r\nÉtaler le caramel entre 2 capuchons.'),
(29, 5, 0, 'Éplucher les fruits. Les couper en morceaux et les mettre dans le mixeur.\r\n'),
(30, 6, 0, 'Concassez les pistaches finement, et mélangez-les avec le sucre, le zeste de citron râpé et le miel.\r\n'),
(31, 6, 1, 'Séparez les jaunes des blancs des oeufs. \r\n'),
(32, 6, 2, 'Incorporez les blancs non travaillés dans le mélange, ils doivent faire comme une colle qui amalgamme le mélange pistache-sucre. \r\n'),
(33, 6, 3, 'Gardez le jaune pour une utilisation astucieuse dans une recette trouvée sur ce site!\r\n'),
(34, 6, 4, 'Avec la pâte, confectionnez des boulettes que vous placerez sur une plaque recouverte de papier sulfurisé. Faites-les suffisamment grosses et espacées, car elles s''étalent pour former des sortes de cookies.\r\n'),
(35, 6, 5, 'Enfournez à 180-200°C pendant 10-15 min, en surveillant attentivement.\r\n'),
(36, 6, 6, 'Sortez du four, laissez refroidir et durcir 5 min, et disposez-les dans une boîte hermétique.\r\n'),
(37, 7, 0, 'Faire gonfler les figues dans un thé bouillant jusqu''à ce qu''elles soient ramollies et doublent de volume. \r\n'),
(38, 7, 1, 'Etalez la pâte brisée, et formez des carrés d''environ 10 cm x 10 cm. \r\nSortez vos figues du thé, et mixez-les (ou écrasez-les à la fourchette) en ajoutant le miel et le romarin. '),
(39, 7, 2, 'Au milieu des carrés de pâte, déposez quelques morceaux de fromage de chèvre ainsi qu''une cuillère à café de votre préparation à la figue. \r\nRefermez les chaussons selon votre goût. '),
(40, 8, 0, 'Faites fondre le chocolat au bain-marie ou au micro-ondes. Si vous le faites fondre au micro-ondes, ajoutez 3 cuillères à soupe d''eau pour 200 g de chocolat.\r\n'),
(41, 8, 1, 'Ajoutez le beurre au chocolat fondu et fouetter énergiquement jusqu''à ce que le mélange soit lisse et bien fondu.\r\n'),
(42, 8, 2, 'Dans un saladier, fouettez les oeufs et le sucre jusqu''à ce que le mélange blanchisse et incorporez la levure puis la farine. \r\n'),
(43, 8, 3, 'Versez le chocolat et le beurre fondus dans la préparation puis mélangez jusqu''à l''obtention d''une pâte homogène. \r\n'),
(44, 8, 4, 'Versez la préparation dans un moule à manqué beurré et fariné.\r\n'),
(45, 8, 5, 'Faites cuire environ 25 minutes (adaptez le temps de cuisson pour obtenir un cœur plus ou moins fondant).\r\n'),
(46, 9, 0, 'Pelez et émincez l''oignon. Faites le dorer dans l''huile. Ajouter la farine et le vin. Faites cuire 5 mn. Dans un bol, fouettez la moutarde et 2 cuillères à soupe de crème. Incorporez l''oignon cuit. '),
(47, 9, 1, 'Déroulez la pâte feuilletée. Coupez 8 triangles réguliers. Nappez chaque triangle de pâte avec la crème, recouvrez de jambon puis de mélange à l''oignon. '),
(48, 9, 2, 'Saupoudrez de gruyère râpé une moitié de chaque triangle de pâte, en partant de la base. Roulez-les en croissants. Préchauffez le four à 180°C (Th 6 ). '),
(49, 9, 3, 'Beurrez la plaque du four. Badigeonnez les croissants à l''oeuf battu. Faites les cuire pendant 20 mn. Servez aussitôt.'),
(50, 10, 0, 'Mettre à cuire les pâtes.\r\n'),
(51, 10, 1, 'Emincer les oignons et les faire revenir à la poêle. Dès qu''ils ont bien doré, y ajouter les lardons.\r\n'),
(52, 10, 2, 'Préparer dans un saladier la crème fraîche, les oeufs, le sel le poivre et mélanger.\r\n'),
(53, 10, 3, 'Retirer les lardons du feu dés qu''ils sont dorés et les ajouter à la crème.\r\n'),
(54, 10, 4, 'Une fois les pâtes cuite al dente, les égoutter et y incorporer la crème.\r\n'),
(55, 10, 5, 'Remettre sur le feu si le plat a refroidi.'),
(56, 11, 0, 'Préparer le sirop de sucre à l''avance et le laisser de coté.\r\nMonder les amandes, les éponger, les râper, les passer au tamis et les mettre dans un bol.'),
(57, 11, 1, 'Ajouter le sucre fin, le colorant alimentaire et l''eau de rose, bien malaxer pour avoir une pate homogène.\r\n'),
(58, 11, 2, 'Fendre les dattes sur un coté, éliminer le noyeau et le remplacer par deux fois son volume de la farce de pâte d''amandes.\r\n'),
(59, 11, 3, 'Plonger ensuite les dattes farcies dans le sirop, les égoutter sur un linge absorbant, après les avoir enrobées de sucre glace.\r\nLaisser sécher 1 heure et les placer dans un plat tunisien typique (si possible).'),
(60, 12, 0, 'Préparation de la farce : peler (si besoin en fonction de l''épaisseur de la peau) et émincer la rhubarbe en julienne grossière. La faire suer dans un casserole couverte avec le sucre, reserver dès que le jus commence a se former.'),
(61, 12, 1, 'Hacher grossièrement les 3/4 de la coriandre. Mélanger les échalotes émincées, la coriandre hachée et la rhubarbe égoutée (dont le jus a été réservé).\r\n'),
(62, 12, 2, 'Saler légèrement au sel de Guérande, épicer au Piment de Cayenne.'),
(63, 12, 3, 'Préparation du canard : couper le cou du canard et le réserver.\r\nSi vous utilisez une volaille maigre, il faut la beurrer entièrement.\r\nVerser le jus de la rhubarbe dans le canard (parfois il y en a très peu). Remplir le canard de la farce et le disposer dans un lèche-frite avec le cou qui donnera du fumet aux sucs.'),
(64, 12, 4, 'Cuire à 200°C (thermomstat 6-7) pendant 1h30 à 3 heures, suivant la taille de la bête.\r\nImportant : dégraisser 1 à 2 fois avec une cuillère à soupe, suivant la volaille.'),
(65, 13, 0, 'Hacher 2 cm de gingembre, mettre dans un bol avec une cuillère à café de vinaigre de cidre, 2 cuillères à soupe de miel, 2 cuillères à soupe de sauce soja et le jus de l''ananas.'),
(66, 13, 1, 'Couper la viande et l''ananas en morceaux, émincer l''ail et les oignons.\r\n'),
(67, 13, 2, 'Faire revenir dans un peu d''huile l''ail et les oignons, puis ajouter le porc, l''ananas et le jus du citron vert.'),
(68, 13, 3, 'Mélanger jusqu''à ce que la viande soit dorée puis ajouter le contenu du bol.'),
(69, 13, 4, 'Laisser cuire à feu doux pendant environ 35 min. A la fin de la cuisson, parsemer des grains de coriandre écrasés, de la menthe et du basilic. Servir aussitôt accompagné de riz basmati.'),
(70, 14, 0, 'Casser le chocolat et faire fondre doucement avec la margarine. \r\nAjouter du sucre (selon les goûts !), mettre les corn flakes dans un saladier puis verser le chocolat dessus.'),
(71, 14, 1, 'Bien remuer, puis faire des petits tas sur du papier cuisson ou alu et mettre au frigidaire quelques heures ou une nuit.\r\nOn peut ajouter un peu de sucre glace avant de les manger.'),
(72, 15, 0, 'Faire revenir l''''oignon émincé dans une cuillère à soupe d''''huile d''''olive.\r\nQuand il est translucide, ajouter une cuillère à soupe d''''herbes de Provence, mélanger pendant une minute. '),
(73, 15, 1, 'Ajouter les moules préparées et verser le vin blanc. Couvrir. Quelques minutes plus tard mélanger.\r\nUne fois ouvertes, décortiquer les moules. Les réserver. \r\nGarder le jus des moules, le remettre sur le feu et le porter à ébullition.'),
(74, 15, 2, 'Délayer 4 cuillères à soupe de farine dans 10 cl de lait.\r\nUne fois le jus des moules à ébullition, porter hors du feu et mélanger au fouet la farine. Le tout doit s''''épaissir assez rapidement.'),
(75, 15, 3, 'Quand le mélange s''''est épaissi, le remettre sur le feu jusqu''''à obtention de la consistance souhaitée. \r\nVerser la préparation aussi obtenue sur les moules préalablement disposées dans un plat à gratin.\r\nParsemer de gruyère et mettre au four 30 à 40 minutes. '),
(76, 16, 0, 'Faire dorer dans une grande casserole les oignons pelés et émincés dans 1 cuillère à soupe d''''huile d''''olive. '),
(77, 16, 1, 'Peler et épépiner la courge et le potimarron. Peler la pomme de terre. Couper le tout en gros cubes et les ajouter aux oignons.\r\nCouvrir d''''eau. Saler.'),
(78, 16, 2, 'Ajouter le gingembre pelé et coupé en lamelles, les gousses d''''ail dégermées et coupées en 2.'),
(79, 16, 3, 'Laisser cuire 45 minutes.\r\nAjouter le lait, le curry et le paprika.\r\nMixer au blender.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`id_creator`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id_ingredient`);

--
-- Index pour la table `lebel_quantity`
--
ALTER TABLE `lebel_quantity`
  ADD PRIMARY KEY (`id_quantity`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `quantity_category`
--
ALTER TABLE `quantity_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `quantity_ingredient`
--
ALTER TABLE `quantity_ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id_recette`);

--
-- Index pour la table `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
