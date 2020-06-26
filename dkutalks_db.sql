-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 13 2019 г., 10:13
-- Версия сервера: 10.4.6-MariaDB
-- Версия PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dkutalks_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` tinyint(4) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$QwhS/kxkYu/OEgJUMERMheZYnWA1lEU0YMYzGd2nKf83VPDT0hqC6'),
(2, 'admindkutalks', '$2y$10$cDtuwqAY74.FkWSu2vHez.rkkIpEqtuF2Y7H5vsaMPoR7DgJN1A3y');

-- --------------------------------------------------------

--
-- Структура таблицы `article_group_id`
--

CREATE TABLE `article_group_id` (
  `group_id` mediumint(9) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article_group_id`
--

INSERT INTO `article_group_id` (`group_id`, `group_name`, `image`) VALUES
(2, '10 Years After Lehman Brothers: The (Vulnerable) State of Global Financial Markets', 'articles.5d32a28305cc08.52111827.jpg'),
(3, 'Die EU vor der Wahl im Kontext von Brexit und Eurokrise', 'articles.5d329e593a6ee4.55193719.jpg'),
(4, 'Welcome to the future', 'articles.5d329ec2ddda00.75591401.jpg'),
(5, 'Der Zusammenhang zwischen Controlling und Risikoüberwachung bei besonderer Konzentration auf KMU mit einer Vorstellung des Risikowürfels ', 'articles.5d329fbd987f58.47447458.jpg'),
(6, 'Does transitional justice contribute to peace and reconciliation after the end of violent conflicts', 'articles.5d32a075e8aa75.73951622.jpg'),
(7, 'The German Healthcare System:Analytics and Challenges', 'articles.5d32a28305cc08.52111827.jpg'),
(8, 'Брексит причины и последствия', 'articles.5d32a29d30aba7.40910961.jpg'),
(9, 'Mobility Challenges and Developments in Urban Areas-Optimization Potentials in Public Transport Organizations by ITS', 'articles.5d32a3217e2d07.85766088.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `article_t`
--

CREATE TABLE `article_t` (
  `article_id` mediumint(9) NOT NULL,
  `article_group_id` mediumint(9) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_text` text NOT NULL,
  `language_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article_t`
--

INSERT INTO `article_t` (`article_id`, `article_group_id`, `article_title`, `article_text`, `language_name`) VALUES
(4, 2, '10 Years After Lehman Brothers: The (Vulnerable) State of Global Financial Markets', '						More than ten years after US-investment bank Lehman Brothers collapsed, global financial markets remain in a fragile state. Refinancing rates stand on historically low levels, inflation expectations fail to gain momentum and, partially attributed to the uncertainty surrounding public finances and Italy and the Brexit, Euro-area economic growth starts displaying renewed signs of sluggishness. With traditional monetary policy having reached its boundaries, however, central banks’ leeway is limited and might eventually even be insufficient to properly react to an economic downturn. Against this background, Prof. Dierks will provide an update on the current state of global financial markets and discuss potential developments.                        ', 'eng'),
(5, 2, '10 лет спустя Lehman Brothers: (Уязвимое) состояние мировых финансовых рынков', 'Спустя более десяти лет после краха американского инвестиционного банка Lehman Brothers мировые финансовые рынки остаются в хрупком состоянии. Ставки рефинансирования находятся на исторически низком уровне, инфляционные ожидания не набирают обороты и, частично благодаря неопределенности, связанной с государственными финансами, Италией и Brexit, экономический рост в еврозоне начинает проявлять новые признаки вялости. Однако, поскольку традиционная денежно-кредитная политика достигла своих границ, свобода действий центральных банков ограничена и может в конечном итоге даже оказаться недостаточной для надлежащего реагирования на экономический спад. На этом фоне профессор Диркс представит обновленную информацию о текущем состоянии мировых финансовых рынков и обсудит возможные изменения.', 'rus'),
(6, 2, '10 Jahre nach Lehman Brothers: Der (verletzliche) Zustand der globalen Finanzmärkte.', 'Mehr als zehn Jahre nach dem Zusammenbruch der US-Investmentbank Lehman Brothers befinden sich die globalen Finanzmärkte weiterhin in einem fragilen Zustand. Die Refinanzierungssätze befinden sich auf einem historisch niedrigen Niveau, die Inflationserwartungen gewinnen nicht an Fahrt und das Wirtschaftswachstum des Euroraums zeigt, teilweise bedingt durch die Unsicherheit in Bezug auf die öffentlichen Finanzen und Italien und den Brexit, wieder Anzeichen einer Flaute. Da die traditionelle Geldpolitik jedoch an ihre Grenzen stößt, ist der Spielraum der Zentralbanken begrenzt und könnte schließlich sogar unzureichend sein, um auf einen wirtschaftlichen Abschwung angemessen zu reagieren. Vor diesem Hintergrund wird Prof. Dierks über den aktuellen Stand der globalen Finanzmärkte informieren und mögliche Entwicklungen diskutieren.', 'ger'),
(7, 3, 'Die EU vor der Wahl im Kontext von Brexit und Eurokrise', 'Die Deutsch-Kasachische Universität lädt alle Interessierten zum DKU Talks mit Frau Dr. Gabriele Stauner zum Thema \"Die EU vor der Wahl im Kontext von Brexit und Eurokrise\" ein.\r\nFrau Dr. Gabriele Stauner war in den Jahren 1999 – 2004 und 2005 – 2009 Mitglied des Europäischen Parlaments und hat sich dabei in der Haushaltskontrolle und in der Binnenmarkt- und Sozialpolitik engagiert. Fünf Jahre lang war sie ständige Berichterstatterin der EVP (Europäische Volkspartei) für die Betrugsbekämpfung. In ihrer Beamtenlaufbahn war sie nach Studium der Rechtswissenschaften und Promotion an der Ludwig-Maximilians-Universität in München in Ministerien in Bayern und im Bund eingesetzt. \r\n1987 – 1990 folgte eine Beschäftigung im Auswärtigen Dienst an der Ständigen Vertretung bei der UNO in Genf. Die Bereiche Europa und Internationales waren ab 1991 ihr Arbeitsschwerpunkt, zunächst im neu gegründeten Bayerischen Ministerium für Bundes- und Europaangelegenheiten und dann als Amtschefin für Bundes- und Europaangelegenheiten in der Bayerischen Staatskanzlei.\r\n', 'ger'),
(8, 3, 'ЕС в преддверии выборов в контексте BREXIT и кризиса Евро', 'Казахстанско-Немецкий Университет приглашает всех желающих на очередной DKU Talks с доктором права г-жой Габриэлей Штаунер на тему «ЕС в преддверии выборов в контексте BREXIT и кризиса Евро».\r\nДоктор Габриэле Стаунер являлась членом Европейского парламента в период с 1999 по 2004 г. г. и в период с 2005 по 2009 г. г. и занималась вопросами, связанными с бюджетным контролем, внутренним рынком и социальными вопросами. В течении пяти лет она была постоянным докладчиком ЕНП (Европейская народная партия) по борьбе с мошенничеством. После окончания учебы юриспруденции и докторантуры при Университете имени Людвига Максимилиана в г. Мюнхен г-жа Штаунер работала на государственной службе при различных министерствах федеральной земли Бавария в Германии, а также при федеральном правительстве.\r\nВ период с 1987 по 1990 гг. г-жа Штаунер работала на дипломатической службе при Постоянном представительстве в ООН в Женеве. С 1991 года ее основным направлением деятельности стали Европа и международные отношения, сначала в недавно созданном Министерстве федеральных и европейских дел Баварии, а затем в качестве начальника Управления по федеральным и европейским делам в Государственном совете Баварии.\r\nDKU Talks проводится при финансовой поддержке DAAD из средств, предоставленных Министерством иностранных дел Германии.', 'rus'),
(9, 3, 'EU on the eve of elections in the context of the BREXIT and the Euro crisis', 'Kazakh-German University invites everyone to the next DKU Talks with the doctor of law Ms. Gabriele Stauner on the topic “The EU on the eve of elections in the context of BREXIT and the Euro crisis”.\r\n\r\nDr. Gabriele Stauner was a member of the European Parliament from 1999 to 2004, and from 2005 to 2009, and dealt with issues related to budget control, domestic market and social issues. For five years, she has been a regular rapporteur of the EPP (European People’s Party) against fraud. After completing her studies in law and doctoral studies at the Ludwig Maximilian University in Munich, Ms. Stauner worked in the public service at various ministries of the federal state of Bavaria in Germany, as well as at the federal government.\r\n\r\nIn the period from 1987 to 1990. Ms. Stauner worked in the diplomatic service under the Permanent Mission to the United Nations in Geneva. Since 1991, its main activities have been Europe and international relations, first in the newly created Ministry of Federal and European Affairs of Bavaria, and then as Head of the Office of Federal and European Affairs in the Council of State of Bavaria.\r\n\r\nDKU Talks is sponsored by DAAD from funds provided by the German Ministry of Foreign Affairs.', 'eng'),
(10, 4, '“On the“ School of the Future \"and\" Educational Innovations \"- the reasoning of teachers in two different countries\"', 'Many countries see international cooperation and the exchange of innovative ideas as a way to improve the quality of school education. Nevertheless, the key to successful cooperation between countries in the field of education lies in the compatibility of the “social imaginary” - that is, the broad, taken for granted aspects of the outlook of educators in these countries.\r\n\r\nThis lecture will present aspects of the social imaginary that were found in Kazakhstan and Scotland during a comparative qualitative study in 2015–2016. Sources for the study were interviews, subject indexes of books, conference programs, folk tales and speeches of political figures.', 'eng'),
(11, 4, '«О „школе будущего“ и „образовательных инновациях“ — рассуждения педагогов в двух разных странах»', 'Многие страны рассматривают международное сотрудничество и обмен инновационными идеями как способ улучшить качество школьного образования. Тем не менее, залог успешного сотрудничества между странами в сфере образования лежит в совместимости «социального воображаемого» — то есть широких, воспринимаемых как должное аспектов мировоззрения у работников образования в этих странах.\r\n\r\nВ данной лекции будут представлены аспекты социального воображаемого, обнаруженные в Казахстане и Шотландии в ходе сравнительного качественного исследования в 2015—2016 годах. Источниками для исследования послужили интервью, тематические указатели книг, программы конференций, народные сказки и речи политических деятелей.', 'rus'),
(12, 4, '\"Über die\" Schule der Zukunft \"und\" Bildungsinnovationen \"- die Argumentation von Lehrern in zwei verschiedenen Ländern\"', 'Viele Länder sehen in der internationalen Zusammenarbeit und dem Austausch innovativer Ideen eine Möglichkeit, die Qualität der Schulbildung zu verbessern. Der Schlüssel für eine erfolgreiche Zusammenarbeit zwischen den Ländern im Bildungsbereich liegt jedoch in der Vereinbarkeit der „sozialen Imaginären“ - also der allgemein anerkannten Aspekte der Perspektiven der Pädagogen in diesen Ländern.\r\nIn dieser Vorlesung werden Aspekte des sozialen Imaginären vorgestellt, die in Kasachstan und Schottland während einer vergleichenden qualitativen Studie in den Jahren 2015–2016 gefunden wurden. Quellen für die Studie waren Interviews, Themenverzeichnisse von Büchern, Konferenzprogramme, Volksmärchen und Reden politischer Persönlichkeiten.', 'ger'),
(13, 5, '“The relationship between the control and the risk monitoring system with particular attention to small and medium-sized enterprises (SMEs) in terms of the risk-cube theory”', 'Since 1992 Professor Brauweiler has been the author, co-author and co-editor of a large number of scientific publications on various economic issues. He was repeatedly invited to give lectures in universities in Germany, as well as abroad (in Poland, the Czech Republic, Kazakhstan), he is a member of the expert commission for awarding research grants to the Agency of the Czech Republic, DLR and DAAD, as well as a member of the selection committee in Fulbright. In addition, he is an expert at accreditation agencies like ACQUIN, ASIIN, FIBAA and ZEvA in Germany and abroad.', 'eng'),
(14, 5, '«Взаимосвязь между контролем и системой мониторинга рисков с особенным вниманием на малые и средние предприятия (МСП) с точки зрения теории „кубика риска“»', 'Профессор Браувайлер с 1992 года является автором, соавтором и соредактором большого количества научных публикаций по разным вопросам экономики. Он неоднократно приглашался для чтения лекций в ВУЗах Германии, а также за рубежом (в Польше, Чехии, Казахстане), является членом экспертной комиссии по присуждению научно-исследовательских грантов при Agency of the Czech Republic, DLR и DAAD, а также членом отборочной комиссии в Fulbright. Кроме того, он является экспертом в аккредитационных агентствах как ACQUIN, ASIIN, FIBAA и ZEvA в Германии и за рубежом.', 'rus'),
(15, 5, 'Der Zusammenhang zwischen Controlling und Risikoüberwachung bei besonderer Konzentration auf KMU mit einer Vorstellung des Risikowürfels ', 'Seit 1992 ist Professor Brauweiler Autor, Mitautor und Mitherausgeber zahlreicher wissenschaftlicher Publikationen zu verschiedenen wirtschaftlichen Themen. Er wurde wiederholt zu Vorträgen an Universitäten im In - und Ausland (in Polen, Tschechien, Kasachstan) eingeladen, ist Mitglied der Fachkommission für die Vergabe von Forschungsstipendien an die Agentur der Tschechischen Republik, das DLR und den DAAD sowie Mitglied der Auswahlkommission in Fulbright. Darüber hinaus ist er Experte bei Akkreditierungsagenturen wie ACQUIN, ASIIN, FIBAA und ZEvA im In- und Ausland.', 'ger'),
(16, 6, 'Does transitional justice contribute to peace and reconciliation after the end of violent conflicts', 'Kazakh-German University invites everyone to the next DKU Talks with professor and doctor Torsten Bonaker on the topic “Does transitional justice promote peace and reconciliation after violent conflicts end?”.\r\n\r\nDr. Torsten Bonaker is a professor of war and peace at the Philip University of Marburg. In addition, he is co-director of the Conflict Studies Center. In the past, Dr. Bonaker has more than once been a visiting professor at the universities of Innsbruck, Frankfurt and Almaty. Dr. Bonaker received his doctorate from the University of Oldenburg.\r\n\r\nCurrently, he is the coordinator of the joint research cluster \"Security Dynamics\" at the universities of Marburg and Giessen, as well as the research project “Re-Configuration. History, memory and transformation processes in the Middle East and North Africa. ” In his research, Dr. Bonaker unites the perspectives of sociology and political science in the field of international relations. In his current study, he explores security issues in the context of state-building, the role of victims in transitional justice, and the contested localization of sexual and reproductive rights.', 'eng'),
(17, 6, '«Способствует ли правосудие переходного периода миру и примирению после окончания насильственных конфликтов?»', 'Казахстанско-Немецкий Университет приглашает всех желающих на очередной DKU Talks с профессором и доктором Торстеном Бонакером на тему «Способствует ли правосудие переходного периода миру и примирению после окончания насильственных конфликтов?».\r\n\r\nДоктор Торстен Бонакер является профессором по вопросам войны и мира при Марбургском университете имени Филиппа. Кроме того он является со-директором Центра изучения конфликтов. В прошлом д-р Бонакер не раз являлся приглашенным профессором в университетах Инсбрука, Франкфурта и Алматы. Д-р Бонакер получил докторскую степень в университете Ольденбурга.\r\n\r\nВ настоящий момент он является координатором совместного исследовательского кластера «Динамика безопасности» в университетах Марбурга и Гиссена, а также научно-исследовательского проекта «Re-Configuration. История, память и трансформационные процессы на Ближнем Востоке и в Северной Африке». В своих исследованиях д-р Бонакер объединяет перспективы социологии и политологии в области международных отношений. В своем текущем исследовании он изучает вопросы безопасности в контексте государственного строительства, роли жертв в правосудии переходного периода и оспариваемой локализации сексуальных и репродуктивных прав. \r\n', 'rus'),
(18, 6, '\"Fördert Übergangsgerechtigkeit Frieden und Versöhnung nach dem Ende gewaltsamer Konflikte?\"', 'Kasachisch-Deutsche Universität lädt alle zum nächsten DKU-Gespräch mit Professor und Arzt Torsten Bonaker zum Thema „Fördert Übergangsgerechtigkeit Frieden und Versöhnung nach dem Ende gewaltsamer Konflikte?“ Ein.\r\n\r\nDr. Torsten Bonaker ist Professor für Krieg und Frieden an der Philipps-Universität Marburg. Darüber hinaus ist er Co-Direktor des Conflict Studies Center. Dr. Bonaker war in der Vergangenheit mehrmals Gastprofessor an den Universitäten Innsbruck, Frankfurt und Almaty. Dr. Bonaker promovierte an der Universität Oldenburg.\r\n\r\nDerzeit ist er Koordinator des gemeinsamen Forschungsclusters \"Sicherheitsdynamik\" an den Universitäten Marburg und Gießen sowie des Forschungsprojekts \"Rekonfiguration\". Geschichte, Erinnerung und Transformationsprozesse im Nahen Osten und in Nordafrika. “ Dr. Bonaker vereint in seiner Forschung die Perspektiven der Soziologie und der Politikwissenschaft auf dem Gebiet der internationalen Beziehungen. In seiner aktuellen Studie untersucht er Sicherheitsfragen im Kontext des Staatsaufbaus, der Rolle der Opfer in der Übergangsjustiz und der umstrittenen Lokalisierung sexueller und reproduktiver Rechte.', 'ger'),
(19, 7, 'The German Healthcare System:Analytics and Challenges', 'The German Healthcare System:Analytics and Challenges', 'eng'),
(20, 7, 'Система здравоохранения Германии: аналитика и проблемы', 'Система здравоохранения Германии: аналитика и проблемы', 'rus'),
(21, 7, 'Das deutsche Gesundheitssystem: Analytik und Herausforderungen', 'Das deutsche Gesundheitssystem: Analytik und Herausforderungen', 'ger'),
(22, 8, '\"Brexit: causes and consequences\"', 'During the lecture the following questions will be raised:\r\nThe special role of Great Britain in the history of the EU and its influence on political development within the EU at the present time.\r\nWas the Brexit referendum necessary?\r\nWhy is withdrawal from the European Union so difficult?\r\nThe central problems of the EU and the UK.\r\nWinners and losers from Brexit.\r\nIs Brexit implemented in principle or how will its development go in the future?', 'eng'),
(23, 8, 'DKU Talks «Брексит: причины и последствия»', 'Краткое изложение доклада\r\n\r\nВо время лекции будут подняты следующие вопросы:\r\n\r\nОсобенная роль Великобритании в истории ЕС и его влияние на политическое развитие внутри ЕС в настоящее время.\r\nДействительно ли было необходимым проведение референдума по Брекситу?\r\nПочему выход из Европейского союза настолько сложен?\r\nЦентральные проблемы ЕС и Великобритании.\r\nПобедители и проигравшие от Брексита.\r\nОсуществиться ли Брексит в принципе или как будет идти его развитие в дальнейшем?', 'rus'),
(24, 8, '\"Brexit: Ursachen und Folgen\"', 'In der Vorlesung werden folgende Fragen aufgeworfen:\r\n\r\nDie besondere Rolle Großbritanniens in der Geschichte der EU und sein Einfluss auf die derzeitige politische Entwicklung in der EU.\r\nWar das Brexit-Referendum notwendig?\r\nWarum ist ein Austritt aus der Europäischen Union so schwierig?\r\nDie zentralen Probleme der EU und des Vereinigten Königreichs.\r\nGewinner und Verlierer des Brexit.\r\nWird der Brexit prinzipiell umgesetzt oder wie wird er sich in Zukunft entwickeln?', 'ger'),
(25, 9, '\"Problems and development of mobility in the urban environment: the possibilities of optimization in the organization of public transport using an intelligent transport system\"', 'Public transport in passenger transport is increasingly becoming in the focus of traffic systems in large cities and conurbations around the world. This is due to the need for efficient mass transport design in large cities while avoiding a traffic collapse due to motorized private transport. In addition, the environmental problems of traffic safety, air pollution, and noise pollution are increasingly coming to the fore for the development of environmentally friendly urban public transport. A social cost-benefit analysis therefore requires the effective use of an attractive public transport system.\r\n\r\nThe planning, operation and control processes of public transport involve a number of optimization problems with regard to user-attractive and cost-effective transport system design. Quantitative approaches and algorithms of the Operations Research are part of the solution of these decision problems.\r\nAn attractive public transport system is a necessity for a city and conurbation in terms of quality of life and economic success. In order to achieve a sustainable effect, as many population groups as possible of the city must be inspired to use the system.', 'eng'),
(26, 9, '«Проблемы и развитие мобильности в городской среде: возможности оптимизации в организации общественного транспорта с помощью интеллектуальной транспортной системы»', 'Общественный транспорт в пассажирском транспорте все больше становится центром транспортных систем в крупных городах и городских агломерациях по всему миру. Это связано с необходимостью эффективного проектирования общественного транспорта в крупных городах, избегая при этом пробок на дорогах из-за моторизованного частного транспорта. Кроме того, экологические проблемы безопасности дорожного движения, загрязнения воздуха и шумового загрязнения все чаще выходят на передний план развития экологически чистого городского общественного транспорта. Поэтому анализ социальных затрат и выгод требует эффективного использования привлекательной системы общественного транспорта.\r\n\r\nПроцессы планирования, эксплуатации и управления общественным транспортом связаны с рядом проблем оптимизации в отношении привлекательной для пользователя и экономически эффективной конструкции транспортной системы. Количественные подходы и алгоритмы исследования операций являются частью решения этих проблем решения.\r\n\r\nПривлекательная система общественного транспорта является необходимостью для города и пригородов с точки зрения качества жизни и экономического успеха. Чтобы достичь устойчивого эффекта, необходимо использовать как можно больше групп населения города.', 'rus'),
(27, 9, '\"Probleme und Entwicklung der Mobilität im städtischen Umfeld: Optimierungsmöglichkeiten bei der Organisation des öffentlichen Verkehrs mit einem intelligenten Verkehrssystem\"', 'Der öffentliche Personenverkehr rückt in großen Städten und Ballungsräumen weltweit zunehmend in den Fokus der Verkehrssysteme. Dies ist auf die Notwendigkeit einer effizienten Gestaltung des Massenverkehrs in Großstädten zurückzuführen, während gleichzeitig ein Zusammenbruch des Verkehrs durch den motorisierten Individualverkehr vermieden wird. Darüber hinaus rücken die Umweltprobleme Verkehrssicherheit, Luftverschmutzung und Lärmbelastung für die Entwicklung eines umweltfreundlichen öffentlichen Personennahverkehrs zunehmend in den Vordergrund. Eine soziale Kosten-Nutzen-Analyse erfordert daher die effektive Nutzung eines attraktiven öffentlichen Verkehrssystems.\r\n\r\nDie Planungs-, Betriebs- und Steuerungsprozesse des öffentlichen Verkehrs beinhalten eine Reihe von Optimierungsproblemen im Hinblick auf eine nutzerattraktive und kostengünstige Gestaltung von Verkehrssystemen. Quantitative Ansätze und Algorithmen des Operations Research sind Teil der Lösung dieser Entscheidungsprobleme.\r\n\r\nEin attraktives öffentliches Verkehrssystem ist eine Notwendigkeit für eine Stadt und einen Ballungsraum in Bezug auf Lebensqualität und wirtschaftlichen Erfolg. Um eine nachhaltige Wirkung zu erzielen, müssen möglichst viele Bevölkerungsgruppen der Stadt zur Nutzung des Systems angeregt werden.', 'ger');

-- --------------------------------------------------------

--
-- Структура таблицы `event_article_t`
--

CREATE TABLE `event_article_t` (
  `connections_id` mediumint(9) NOT NULL,
  `event_group_id` mediumint(9) NOT NULL,
  `article_group_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `event_article_t`
--

INSERT INTO `event_article_t` (`connections_id`, `event_group_id`, `article_group_id`) VALUES
(2, 5, 2),
(3, 6, 3),
(4, 7, 4),
(5, 8, 5),
(6, 9, 6),
(7, 10, 7),
(8, 11, 8),
(9, 12, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `event_group_id`
--

CREATE TABLE `event_group_id` (
  `group_id` mediumint(9) NOT NULL,
  `event_time` time NOT NULL,
  `event_date` date NOT NULL,
  `event_end_time` time NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `event_group_id`
--

INSERT INTO `event_group_id` (`group_id`, `event_time`, `event_date`, `event_end_time`, `email`) VALUES
(5, '16:00:00', '2019-03-14', '17:30:00', 'beken.aisulu@dku.kz'),
(6, '16:00:00', '2019-04-05', '17:30:00', 'beken.aisulu@dku.kz'),
(7, '16:30:00', '2019-05-08', '18:00:00', 'beken.aisulu@dku.kz'),
(8, '16:30:00', '2019-04-01', '18:00:00', 'beken.aisulu@dku.kz'),
(9, '16:00:00', '2019-04-09', '17:30:00', 'beken.aisulu@dku.kz'),
(10, '16:00:00', '2019-04-02', '17:30:00', 'beken.aisulu@dku.kz'),
(11, '16:00:00', '2019-05-15', '17:30:00', 'beken.aisulu@dku.kz'),
(12, '16:30:00', '2019-04-18', '18:00:00', 'beken.aisulu@dku.kz');

-- --------------------------------------------------------

--
-- Структура таблицы `event_t`
--

CREATE TABLE `event_t` (
  `event_id` mediumint(9) NOT NULL,
  `event_group_id` mediumint(9) NOT NULL,
  `event_place` varchar(255) NOT NULL,
  `language_name` varchar(255) NOT NULL,
  `event_moderator` varchar(255) NOT NULL,
  `event_org_dep` varchar(255) NOT NULL,
  `event_cost` varchar(255) NOT NULL,
  `event_language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `event_t`
--

INSERT INTO `event_t` (`event_id`, `event_group_id`, `event_place`, `language_name`, `event_moderator`, `event_org_dep`, `event_cost`, `event_language`) VALUES
(8, 5, 'Raum 27, DKU, Pushkin Str. 111, 050010, Almaty', 'ger', 'Dr. Serik Beimenbetov', 'Deutsch-Kasachische Universität', 'frei', 'Englisch'),
(9, 5, 'Room 27, DKU, Pushkin Str. 111, 050010, Almaty', 'eng', 'Room 27, DKU, Pushkin Str. 111, 050010, Almaty', 'Kazakh-German University', 'free', 'English'),
(13, 5, 'Аудитория 27, КНУ, Улица Пушкина. 111, 050010, Алматы', 'rus', 'Доктор Серик Беимбетов', 'Казахстанско-Немецкий Университет', 'бесплатно', 'Английский'),
(14, 12, 'DKU Building II,Nazarbayev Str.173 Hall,floor№1', 'eng', 'Dr. Serik Beimenbetov', 'Kazakh-German University', 'free', 'English'),
(15, 12, 'КНУ Корпус, Назарбаева ул.173 Зал, этаж №1', 'rus', 'Доктор Серик Беимбетов', 'Казахстанско-Немецкий Университет', 'бесплатно', 'Английский'),
(16, 12, ' DKU-Gebäude II, Nazarbayev Str.173, Stockwerk №1', 'ger', 'Dr. Serik Beimenbetov', 'Deutsch-Kasachische Universität', 'frei', 'Englisch'),
(17, 11, 'Raum 27, DKU, Pushkin Str. 111, 050010, Almaty', 'ger', 'Dr. Serik Beimenbetov', 'Deutsch-Kasachische Universität', 'frei', 'Russisch'),
(18, 11, 'Room 27, DKU, Pushkin Str. 111, 050010, Almaty', 'eng', 'Dr. Serik Beimenbetov', 'Kazakh-German University', 'free', 'Russian'),
(19, 11, 'Аудитория 27, КНУ, Улица Пушкина. 111, 050010, Алматы', 'rus', 'Доктор Серик Беимбетов', 'Казахстанско-Немецкий Университет', 'бесплатно', 'Русский'),
(20, 10, 'Аудитория 27, КНУ, Улица Пушкина. 111, 050010, Алматы', 'rus', 'Доктор Серик Беимбетов', 'Казахстанско-Немецкий Университет', 'бесплатно', 'Немецкий'),
(21, 10, 'Room 27, DKU, Pushkin Str. 111, 050010, Almaty', 'eng', 'Dr. Serik Beimenbetov', 'Kazakh-German University', 'free', 'German'),
(22, 10, 'Raum 27, DKU, Pushkin Str. 111, 050010, Almaty', 'ger', 'Dr. Serik Beimenbetov', 'Deutsch-Kasachische Universität', 'frei', 'Deutsch'),
(23, 9, 'Raum 309 DKU Building I,Nazarbayev Str.173', 'ger', 'Dr. Serik Beimenbetov', 'Deutsch-Kasachische Universität', 'frei', 'Englisch'),
(24, 9, 'Аудитория 309 КНУ Корпус,Nazarbayev Str.173', 'rus', 'Dr. Serik Beimenbetov', 'Казахстанско-Немецкий Университет', 'free', 'Английский'),
(25, 9, 'Room 309 DKU Building I,Nazarbayev Str.173', 'eng', 'Dr. Serik Beimenbetov', 'Kazakh-German University', 'free', 'English'),
(26, 8, 'Room 27, DKU, Pushkin Str. 111, 050010, Almaty', 'eng', 'Dr. Serik Beimenbetov', 'Kazakh-German University', 'free', 'German'),
(27, 8, 'Аудитория 27, КНУ, Улица Пушкина. 111, 050010, Алматы', 'rus', 'Доктор Серик Беимбетов', 'Казахстанско-Немецкий Университет', 'бесплатно', 'Английский'),
(28, 8, 'Raum 27, DKU, Pushkin Str. 111, 050010, Almaty', 'ger', 'Dr. Serik Beimenbetov', 'Deutsch-Kasachische Universität', 'frei', 'Englisch'),
(29, 7, 'DKU Gebaude II,Nazarbayev Str.173 Hall,floor№1', 'ger', 'Dr. Serik Beimenbetov', 'Deutsch-Kasachische Universität', 'frei', 'Englisch'),
(30, 7, 'КНУ Корпус, Назарбаева ул.173 Зал, этаж №1', 'rus', 'Доктор Серик Беимбетов', 'Казахстанско-Немецкий Университет', 'бесплатно', 'Английский'),
(31, 7, 'DKU Building II,Nazarbayev Str.173 Hall,floor№1', 'eng', 'Dr. Serik Beimenbetov', 'Kazakh-German University', 'free', 'English'),
(32, 6, 'DKU Building II,Nazarbayev Str.173 Hall,floor№1', 'eng', 'Dr. Serik Beimenbetov', 'Kazakh-German University', 'free', 'German'),
(33, 6, 'КНУ Корпус, Назарбаева ул.173 Зал, этаж №1', 'rus', 'Доктор Серик Беимбетов', 'Казахстанско-Немецкий Университет', 'бесплатно', 'Немецкий'),
(34, 6, 'DKU Gebaude II,Nazarbayev Str.173 Hall,floor№1', 'ger', 'Dr. Serik Beimenbetov', 'Deutsch-Kasachische Universität', 'frei', 'Deutsch');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `gallery_title` varchar(255) NOT NULL,
  `language_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `group_id`, `gallery_title`, `language_name`) VALUES
(19, 5, 'Photo_eng1', 'eng'),
(20, 6, 'Photo_eng2', 'eng'),
(21, 7, 'Photo_eng3', 'eng'),
(22, 8, 'Photo_eng4', 'eng'),
(23, 9, 'Photo_eng5', 'eng'),
(24, 5, 'Photo_rus1', 'rus'),
(25, 6, 'Photo_rus2', 'rus'),
(26, 7, 'Photo_rus3', 'rus'),
(27, 8, 'Photo_rus4', 'rus'),
(28, 9, 'Photo_rus5', 'rus'),
(29, 5, 'Photo_ger1', 'ger'),
(30, 6, 'Photo_ger2', 'ger'),
(31, 7, 'Photo_ger3', 'ger'),
(32, 8, 'Photo_ger4', 'ger'),
(33, 9, 'Photo_ger5', 'ger');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_group`
--

CREATE TABLE `gallery_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery_group`
--

INSERT INTO `gallery_group` (`group_id`, `group_name`, `image`) VALUES
(5, 'Photo1', 'gallery.5d57c9dd11d5a2.25262087.jpg'),
(6, 'Photo2', 'gallery.5d57c9e6aa66a6.56390282.jpg'),
(7, 'Photo3', 'gallery.5d57c9f31ac8f3.15353995.jpg'),
(8, 'Photo4', 'gallery.5d57cae2bdd4c4.07414577.jpg'),
(9, 'Photo5', 'gallery.5d57caf169c849.15623015.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `language_t`
--

CREATE TABLE `language_t` (
  `language_id` tinyint(4) NOT NULL,
  `language_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `language_t`
--

INSERT INTO `language_t` (`language_id`, `language_name`) VALUES
(1, 'eng'),
(3, 'ger'),
(2, 'rus');

-- --------------------------------------------------------

--
-- Структура таблицы `speaker_article_t`
--

CREATE TABLE `speaker_article_t` (
  `connections_id` mediumint(9) NOT NULL,
  `speaker_group_id` mediumint(9) NOT NULL,
  `article_group_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `speaker_article_t`
--

INSERT INTO `speaker_article_t` (`connections_id`, `speaker_group_id`, `article_group_id`) VALUES
(3, 4, 2),
(6, 5, 5),
(8, 6, 7),
(4, 7, 3),
(5, 8, 4),
(7, 9, 6),
(9, 10, 8),
(10, 11, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `speaker_group_id`
--

CREATE TABLE `speaker_group_id` (
  `group_id` mediumint(9) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `speaker_group_id`
--

INSERT INTO `speaker_group_id` (`group_id`, `group_name`, `photo`) VALUES
(4, 'Professor Leef Deerks', 'speakers.5d2afa263c0110.59066629.jpg'),
(5, 'Brauweiler, H.-Christian', 'speakers.5d329706d1d375.77152204.jpg'),
(6, 'Jochen Breinlinger-O\'Reilly ', 'speakers.5d3299bbc37389.98074383.'),
(7, 'Dr. Gabriele Stauner', 'speakers.5d329a586f7835.27823917.jpg'),
(8, 'Dr. Berniyazova', 'speakers.5d329ad32d5d02.66297375.'),
(9, 'Prof. Bonacker', 'speakers.5d329b2c54c322.42658535.jpg'),
(10, 'Prof. Lochmann', 'speakers.5d329b66c77903.98159840.jpg'),
(11, 'Prof. Sonntag', 'speakers.5d329bcd7b7a13.87607973.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `speaker_t`
--

CREATE TABLE `speaker_t` (
  `speaker_id` int(11) NOT NULL,
  `speaker_group_id` mediumint(9) NOT NULL,
  `language_name` varchar(255) NOT NULL,
  `speaker_fullname` varchar(255) NOT NULL,
  `speaker_workplace` varchar(255) NOT NULL,
  `speaker_country` varchar(255) NOT NULL,
  `speaker_bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `speaker_t`
--

INSERT INTO `speaker_t` (`speaker_id`, `speaker_group_id`, `language_name`, `speaker_fullname`, `speaker_workplace`, `speaker_country`, `speaker_bio`) VALUES
(2, 4, 'rus', 'Профессор Лиф Диркс', 'Технический высшая школа Любэк', 'Германия', 'это профессор финансов и международных рынков капитала в Любекском университете прикладных наук с зимнего семестра 2013/14. Приглашенные профессора доставили его в Немецко-Иорданский университет в Аммане, Иордания, Университет Чианг Май, Таиланд и Чжэцзян'),
(3, 4, 'ger', 'Prof. Leef H. Dierks ', 'Technische Hochschule Lübeck', 'Deutschland', 'ist seit dem Wintersemester 2013/14 Professor für Finanzen und Internationale Kapitalmärkte an der Fachhochschule Lübeck. Gastprofessuren führten ihn an die Deutsch-Jordanische Universität in Amman, Jordanien, die Chiang Mai Universität in Thailand und di'),
(4, 5, 'ger', 'Prof.  H.-Christian Brauweiler', 'Hochschule Zwickau', 'Deutschland', 'Geb. 1965, nach Abitur (1983) und Wehrdienst Ausbildung zum Bankkaufmann (1984-1987), Studium der Wirtschaftswissenschaften (Dipl.-Kfm.) an der Universität Paderborn und der Illinois State University, Normal, Ill. (USA), 1993-1995 wissenschaftlicher Mitarbeiter am Lehrstuhl für Volkswirtschaftslehre der Technischen Hochschule Zittau (jetzt: Hochschule Zittau-Görlitz) sowie 1996-2001 wissenschaftlicher Assistent am Lehrstuhl für Betriebswirtschaftslehre am Internationalen Hochschulinstitut Zittau (jetzt: TU Dresden). 2000 Promotion zum Thema Innovationsökonomik an der TU Bergakademie Freiberg, parallel Geschäftsführender Gesellschafter in einer Unternehmensberater-Partnerschaft. Weitere berufliche Stationen waren die Kaufmännische Leitung einer Bildungseinrichtung in Ostsachsen sowie die Kaufmännische Leitung mehrerer Unternehmen einer Unternehmensgruppe der Automobilbranche. 2012 Ernennung zum Prof. Dr. h.c. des Khujand Polytechnic Institute der Akademiker M. S. Osimi-Tajikische Technische Universität. 2004-2005 Vertretungsprofessor für Investition und Finanzierung an der Hochschule für Technik und Wirtschaft Dresden (FH), seit 2004 berufener Professor für Controlling und Accounting an der AKAD Hochschule Leipzig, sowie 2006-2010 Prorektor und Abteilungsleiter sowie 2010-2013 Rektor und Bereichsleiter an der AKAD. Seit 2013 an der Westsächsischen Hochschule Zwickau tätig.'),
(5, 5, 'eng', 'Prof.  H.-Christian Brauweiler', 'University of Applied Sciences Zwickau', 'Germany', 'Born in 1965, graduated from high school (1983) and trained as a Banker (1984-1987), studied Economics (Dipl.-Kfm.) At the University of Paderborn and Illinois State University, Normal, Ill. (USA), 1993- 1995 research associate at the Chair of Economics at the Technical University of Zittau (now: Zittau-Görlitz University of Applied Sciences) and 1996-2001 Research Assistant at the Chair of Business Administration at the International University Institute Zittau (now TU Dresden). 2000 PhD on innovation economics at the TU Bergakademie Freiberg, parallel managing partner in a management consultancy partnership. Other professional positions included the commercial management of an educational institution in Eastern Saxony and the commercial management of several companies in a group of companies in the automotive industry. 2012 appointment to Prof. Dr. med. h.c. of the Khujand Polytechnic Institute of Academics M. S. Osimi-Tajik Technical University. 2004-2005 Assistant Professor for Investment and Finance at the Dresden University of Applied Sciences (FH), since 2004 appointed Professor for Controlling and Accounting at the AKAD Leipzig University of Applied Sciences, as well as Vice President and Head of Department from 2006-2010 and Rector and Head of Department 2010-2013 AKAD. Since 2013 working at the Westsächsische Hochschule Zwickau.'),
(6, 5, 'rus', 'Ханс Кристиан Браувеилер', 'Университет прикладных наук Цвиккау', 'Германия', 'Родился в 1965 году, окончил среднюю школу (1983 год) и получил специальность банкира (1984-1987 годы), изучал экономику (диплом бакалавра наук) в Университете Падерборна и Университета штата Иллинойс, Нормал, Иллинойс (США), 1993- 1995 научный сотрудник на кафедре экономики в Техническом университете Циттау (ныне: Университет прикладных наук Циттау-Гёрлица) и 1996-2001 гг. Научный сотрудник на кафедре делового администрирования в Международном институте университета Циттау (ныне ТУ Дрезден). 2000 Кандидат экономических наук в области инноваций в ТУ Bergakademie Freiberg, параллельный управляющий партнер в партнерстве по управленческому консультированию. Другие профессиональные должности включали коммерческое управление образовательным учреждением в Восточной Саксонии и коммерческое управление несколькими компаниями в группе компаний в автомобильной промышленности. 2012 назначение на профессора, доктора мед. палата общин Худжандского политехнического института им. М. С. Осими-Таджикского технического университета. 2004–2005 годы Доцент кафедры инвестиций и финансов в Дрезденском университете прикладных наук (FH), с 2004 года - профессор контроллинга и бухгалтерского учета в Лейпцигском университете прикладных наук АКАД, вице-президент и руководитель департамента в 2006–2010 годах, а также ректор и руководитель департамента в Акад. С 2013 года работает в Westsächsische Hochschule Zwickau.'),
(7, 6, 'rus', 'Профессор доктор Йохен Брейнлингер-О\'Рейли', 'Берлинский университет экономики и права', 'Германия', 'Изучал экономику и философию в университете Карлсруэ\r\nНаучный сотрудник в университете Карлсруэ. Работа над проектами в рамках финансируемой из федерации программы Humanization of Work\r\nНаучный сотрудник на кафедре экономики, FU Berlin, Research and Teaching\r\nДокторская степень в Свободном университете Берлина с темой \"Структура и структура экономических теорий\"\r\nПрограмма высшего руководства для городских больниц в штате Берлин\r\nНачальник отдела кадров в больнице с примерно 1450 сотрудников\r\nНачальник управления больницы\r\nУправляющий директор GmbH с несколькими больничными отделениями и учреждениями по уход'),
(8, 6, 'ger', ' Prof. Dr. Jochen Breinlinger-O\'Reilly', 'Hochschule für Wirtschaft und Recht Berlin ', 'Deutschland', 'Studium der Volkswirtschaftslehre und Philosophie an der Universität Karlsruhe\r\n\r\nWissenschaftlicher Mitarbeiter an der Universität Karlsruhe. Bearbeitung von Projekten im Rahmen des mit Bundesmitteln finanzierten Programms „Humanisierung der Arbeit“\r\n\r\nWissenschaftlicher Mitarbeiter am Fachbereich Wirtschaftswissenschaften der FU Berlin, Forschung und Lehre\r\n\r\nPromotion an der Freien Universität Berlin mit dem Thema „Aufbau und Struktur wirtschaftswissenschaftlicher Theorien“\r\n\r\nFührungskräftenachwuchsprogramm städtischer Krankenhausbetriebe des Landes Berlin\r\n\r\nLeiter der Personalabteilung eines Krankenhauses mit ca. 1.450 Mitarbeitern\r\n\r\nVerwaltungsleiter eines Krankenhauses\r\n\r\nGeschäftsführer einer GmbH mit mehreren Krankenhausabteilungen und Pflegeeinrichtungen'),
(9, 6, 'eng', 'Prof. Dr. Jochen Breinlinger-O\'Reilly', 'University of Economics and Law Berlin ', 'Germany', 'Studied economics and philosophy at the University of Karlsruhe\r\n\r\nResearch assistant at the University of Karlsruhe. Working on projects under the federally funded Humanization of Work program\r\n\r\nResearch assistant at the Department of Economics, FU Berlin, Research and Teaching\r\n\r\nDoctorate at the Free University of Berlin with the topic \"Structure and Structure of Economic Theories\"\r\n\r\nSenior management program for urban hospitals in the state of Berlin\r\n\r\nHead of Human Resources at a hospital with approximately 1,450 employees\r\n\r\nHead of Administration of a hospital\r\n\r\nManaging director of a GmbH with several hospital departments and care facilities'),
(10, 7, 'eng', 'Dr.Gabriele Stauner', 'Ludwig-Maximilians-University', 'Germany', 'is a German politician and a former Member of the European Parliament (MEP) from Germany. She is a member of the Christian Social Union in Bavaria, part of the European People\'s Party.'),
(11, 7, 'rus', 'Др.Габриэль Стаунер', 'Людвиг-Максимилиан-Университет', 'Германия', 'является немецким политиком и бывшим членом Европейского парламента (MEP) из Германии. Она является членом Христианского общественного союза в Баварии, частью Европейской народной партии.'),
(12, 7, 'ger', 'Dr.Gabriele Stauner', 'Ludwig-Maximilians-Universität', 'Deutschland', 'ist ein deutscher Politiker und ehemaliges Mitglied des Europäischen Parlaments (MdEP) aus Deutschland. Sie ist Mitglied der Christlich-Sozialen Union in Bayern, Teil der Europäischen Volkspartei.'),
(13, 8, 'ger', 'Dr.Asem Berniyazova', 'Deutsch-Kasachische Universität', 'Kazakhstan', 'ist Absolventin des PhD-Programms an der Universität von Edinburgh, wo sie im Rahmen des staatlichen Bolashak-Stipendienprogramms der Republik Kasachstan studierte. Das Thema ihrer Dissertation lautete „Die weltweite Verbreitung von Bildungsinnovationen des 21. Jahrhunderts: Chancen und Herausforderungen für Bildungseinrichtungen in Kasachstan“. In der Arbeit von Dr. Berniyazova wurde eine vergleichende Analyse zwischen Kasachstan und Schottland (Großbritannien) im Lichte sozialer Vorstellungen zur Schulbildung in beiden Ländern und deren Einfluss auf die Aussichten für eine internationale Zusammenarbeit beider Länder durchgeführt.'),
(14, 8, 'rus', 'Доктор Асем Берниязова', 'Казахстанско-Немецкий Университет', 'Казахстан', 'является выпускницей программы PhD при Университете г. Эдинбург, где она обучалась по государственной стипендиальной программе Республики Казахстан «Болашак». Темой её диссертации являлась «Всемирное распространение образовательных инноваций XXI века: возможности и вызовы для учебных заведений Казахстана». В работе д-ра Берниязовой проведен сравнительный анализ между Казахстаном и Шотландией (Великобритания) в свете социальных представлений о школьном образовании в обеих странах и их влияния на перспективы международного сотрудничества между двумя странами.'),
(15, 8, 'eng', 'Dr.Asem Berniyazova', 'Kazakh-German University', 'Kazakhstan', ' is a graduate of the PhD program at the University of Edinburgh, where she studied under the Bolashak state scholarship program of the Republic of Kazakhstan. The theme of her dissertation was “The Worldwide Spread of Educational Innovations of the 21st Century: Opportunities and Challenges for Educational Institutions of Kazakhstan”. In the work of Dr. Berniyazova, a comparative analysis was conducted between Kazakhstan and Scotland (Great Britain) in the light of social ideas about school education in both countries and their influence on the prospects for international cooperation between the two countries.'),
(16, 9, 'eng', 'Doctor Thorsten Bonacker', 'Philipps University Marburg', 'Germany', ' is a professor of war and peace at the Philip University of Marburg. In addition, he is co-director of the Conflict Studies Center. In the past, Dr. Bonaker has more than once been a visiting professor at the universities of Innsbruck, Frankfurt and Almaty. Dr. Bonaker received his doctorate from the University of Oldenburg.'),
(17, 9, 'rus', 'Профессор Торстен Бонакер', 'Университет Филиппа Марбург', 'Германия', 'является профессором по вопросам войны и мира при Марбургском университете имени Филиппа. Кроме того он является со-директором Центра изучения конфликтов. В прошлом д-р Бонакер не раз являлся приглашенным профессором в университетах Инсбрука, Франкфурта и Алматы. Д-р Бонакер получил докторскую степень в университете Ольденбурга.'),
(18, 9, 'ger', 'Professor Thorsten Bonacker', 'Philipps-Universität Marburg', 'Deutschland', 'ist Professor für Krieg und Frieden an der Philipps-Universität Marburg. Darüber hinaus ist er Co-Direktor des Conflict Studies Center. Dr. Bonaker war in der Vergangenheit mehrmals Gastprofessor an den Universitäten Innsbruck, Frankfurt und Almaty. Dr. Bonaker promovierte an der Universität Oldenburg.'),
(19, 10, 'ger', 'Prof. Bodo Lochmann', 'Hochschule Zittau', 'Deutschland', 'seit 2015 ist er berater und außerordentlicher professor an verschiedenen universitäten der ehemaligen sowjetunion.\r\nDr. Lohmann absolvierte 1973 das Moskauer Institut für Volkswirtschaft. G.V. Plekhanov über eine Spezialität \"Planung einer Volkswirtschaft\". Dort schrieb er von 1975 bis 1978 seine Dissertation über die Vervielfältigung von Anlagevermögen im Energiesektor. 1990 verteidigte er seine Doktorarbeit an der Technischen Universität Freiberg über die strategische Entwicklung der Kernenergie und promovierte in Wirtschaftswissenschaften'),
(20, 10, 'rus', 'Проф Бодо Лохманн', 'Университет Циттау', 'Германия', 'с 2015 г. является консультантом, а также доцентом в ряде ВУЗов на территории бывшего Советского Союза.\r\nД-р Лохманн окончил в 1973 г. Московский Институт народного хозяйства им. Г. В. Плеханова по специальности «Планирование народного хозяйства». Там же в 1975 — 1978 г. г. он написал свою кандидатскую диссертации по вопросам воспроизводства основных средств в энергетике. В 1990 г. он защитил докторскую диссертацию в Техническом Университете Фрайберг (Германия) по вопросам стратегического развития атомной энергетики и получил степень доктора в области экономических наук.'),
(21, 10, 'eng', 'Professor Bodo Lochmann', 'University Zittau', 'Germany', 'since 2015, he has been a consultant and also an associate professor in a number of universities in the former Soviet Union.\r\nDr. Lohmann graduated in 1973 from the Moscow Institute of National Economy. G.V. Plekhanov on a specialty \"Planning of a national economy\". There, in 1975 - 1978, he wrote his dissertation on the reproduction of fixed assets in the energy sector. In 1990, he defended his doctoral thesis at the Freiberg Technical University (Germany) on the strategic development of nuclear energy and received a doctorate in economics.'),
(22, 11, 'eng', 'Prof.Herbert Sonntag', 'University Wildau', 'Germany', 'is a professor of transport logistics and a member of the research group on transport logistics at the Technical University of Applied Sciences in the city of Wildau. He received a doctorate in engineering (research in the field of automated systems) at the Technical University of Berlin. From 1976 to 2001, Dr. Sonntag was a shareholder and subsequently a member of the Executive Council of IVU Traffic Technologies AG. In the past, he has often taught as a visiting professor at the universities of Tiflis and Almaty. Since 2009, Dr. Sonntag has been a member of the supervisory board of IVU Traffic Technologies AG and, since 2014, he is the chairman and honorary member of LNBB Logistiknetz Berlin-Brandenburg e.V.'),
(23, 11, 'rus', 'Проф Герберт Соннтаг', 'Университет Вильдау', 'Германия', 'является профессором транспортной логистики и членом исследовательской группы по транспортной логистике при Техническом Университете прикладных наук в городе Вильдау. Он получил докторскую степень в области инженерных наук (исследование в области автоматизированных систем) при Техническом Университете Берлина. С 1976 по 2001 годы д-р Зоннтаг являлся акционером и в дальнейшем членом Исполнительного Совета IVU Traffic Technologies AG. В прошлом он не раз преподавал в качестве приглашенного профессора в университетах Тифлиса и Алматы. С 2009 года д-р Зоннтаг является членом наблюдательного совета IVU Traffic Technologies AG и с 2014 года председателем и почетным членом LNBB Logistiknetz Berlin-Brandenburg e.V.'),
(24, 11, 'ger', 'Prof.Herbert Sonntag', 'Hochschule Wildau', 'Deutschland', ' ist Professor für Transportlogistik und Mitglied der Forschungsgruppe Transportlogistik an der Technischen Fachhochschule in Wildau. Er promovierte an der Technischen Universität Berlin in Ingenieurwissenschaften (Forschung im Bereich automatisierter Systeme). Von 1976 bis 2001 war Dr. Sonntag Gesellschafter und anschließend Mitglied des Vorstands der IVU Traffic Technologies AG. In der Vergangenheit lehrte er oft als Gastprofessor an den Universitäten von Tiflis und Almaty. Dr. Sonntag ist seit 2009 Mitglied des Aufsichtsrats der IVU Traffic Technologies AG und seit 2014 Vorsitzender und Ehrenmitglied des LNBB Logistiknetz Berlin-Brandenburg e.V.'),
(28, 4, 'eng', 'Prof. Leef H. Dierks ', 'Technische Hochschule Lübeck', 'Germany', 'is Professor for Finance and International Capital Markets at Lübeck University of Applied Sciences since winter semester 2013/14. Guest professorships took him to the German-Jordanian University in Amman, Jordan, Chiang Mai University, Thailand and Zheji');

-- --------------------------------------------------------

--
-- Структура таблицы `video`
--

CREATE TABLE `video` (
  `video_id` smallint(6) NOT NULL,
  `group_id` int(11) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `language_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `video`
--

INSERT INTO `video` (`video_id`, `group_id`, `video_title`, `description`, `language_name`) VALUES
(18, 3, 'Video_ger1', 'Video_ger1 Video_ger1 Video_ger1 Video_ger1 Video_ger1 Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1Video_ger1', 'ger'),
(19, 4, 'Video_ger2', 'Video_ger2 Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2Video_ger2', 'ger'),
(20, 5, 'Video_ger3', 'Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3', 'ger'),
(21, 6, 'Video_ger4', 'Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3', 'ger'),
(22, 7, 'Video_ger5', 'Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3Video_ger3vv', 'ger'),
(23, 3, 'Video_eng1', 'Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1', 'eng'),
(24, 4, 'Video_eng2', 'Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng123', 'eng'),
(25, 5, 'Video_eng3', 'Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1jhjg', 'eng'),
(26, 6, 'Video_eng4', 'Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1fasfsasfafa', 'eng'),
(27, 7, 'Video_eng5', 'Video_eng5 Video_eng5Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1Video_eng1', 'eng'),
(28, 3, 'Video_rus1', 'Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1', 'rus'),
(29, 4, 'Video_rus2', 'Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1vsdsdada', 'rus'),
(30, 5, 'Video_rus3', 'Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1vsdsdad', 'rus'),
(31, 6, 'Video_rus4', 'Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1', 'rus'),
(32, 7, 'Video_rus5', 'Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1Video_rus1vvv', 'rus');

-- --------------------------------------------------------

--
-- Структура таблицы `video_group`
--

CREATE TABLE `video_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `video` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `video_group`
--

INSERT INTO `video_group` (`id`, `group_name`, `video`, `image`) VALUES
(3, 'Video1', 'video.5d57b49bda7026.29859851.mp4', 'poster.5d57b49bda70d6.60247511.jpg'),
(4, 'Video2', 'video.5d57b601321635.11386622.mp4', 'poster.5d57b6013216a1.57079015.jpg'),
(5, 'Video3', 'video.5d57b61c215751.43164830.mp4', 'poster.5d57b61c2157b1.73642320.jpg'),
(6, 'Video4', 'video.5d57b64c266836.20893997.mp4', 'poster.5d57b64c2668a1.40589281.jpg'),
(7, 'Video5', 'video.5d57b6f6a3a4c8.07309127.mp4', 'poster.5d57b6f6a3a539.60219300.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `article_group_id`
--
ALTER TABLE `article_group_id`
  ADD PRIMARY KEY (`group_id`),
  ADD UNIQUE KEY `group_name` (`group_name`);

--
-- Индексы таблицы `article_t`
--
ALTER TABLE `article_t`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `article_group_id_2` (`article_group_id`,`language_name`),
  ADD KEY `article_group_id` (`article_group_id`),
  ADD KEY `language_name` (`language_name`);

--
-- Индексы таблицы `event_article_t`
--
ALTER TABLE `event_article_t`
  ADD PRIMARY KEY (`connections_id`),
  ADD UNIQUE KEY `event_group_id_2` (`event_group_id`,`article_group_id`),
  ADD KEY `event_group_id` (`event_group_id`),
  ADD KEY `article_group_id` (`article_group_id`);

--
-- Индексы таблицы `event_group_id`
--
ALTER TABLE `event_group_id`
  ADD PRIMARY KEY (`group_id`);

--
-- Индексы таблицы `event_t`
--
ALTER TABLE `event_t`
  ADD PRIMARY KEY (`event_id`),
  ADD UNIQUE KEY `event_group_id_2` (`event_group_id`,`language_name`),
  ADD UNIQUE KEY `event_group_id_3` (`event_group_id`,`event_place`),
  ADD KEY `event_group_id` (`event_group_id`),
  ADD KEY `language_name` (`language_name`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_id_2` (`group_id`,`language_name`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `language_name` (`language_name`);

--
-- Индексы таблицы `gallery_group`
--
ALTER TABLE `gallery_group`
  ADD PRIMARY KEY (`group_id`),
  ADD UNIQUE KEY `group_name` (`group_name`);

--
-- Индексы таблицы `language_t`
--
ALTER TABLE `language_t`
  ADD PRIMARY KEY (`language_id`),
  ADD UNIQUE KEY `language_name_2` (`language_name`),
  ADD KEY `language_name` (`language_name`);

--
-- Индексы таблицы `speaker_article_t`
--
ALTER TABLE `speaker_article_t`
  ADD PRIMARY KEY (`connections_id`),
  ADD UNIQUE KEY `speaker_group_id_2` (`speaker_group_id`,`article_group_id`),
  ADD KEY `speaker_group_id` (`speaker_group_id`),
  ADD KEY `article_group_id` (`article_group_id`);

--
-- Индексы таблицы `speaker_group_id`
--
ALTER TABLE `speaker_group_id`
  ADD PRIMARY KEY (`group_id`),
  ADD UNIQUE KEY `group_name` (`group_name`);

--
-- Индексы таблицы `speaker_t`
--
ALTER TABLE `speaker_t`
  ADD PRIMARY KEY (`speaker_id`),
  ADD UNIQUE KEY `speaker_group_id` (`speaker_group_id`,`language_name`),
  ADD KEY `language_name` (`language_name`);

--
-- Индексы таблицы `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`),
  ADD UNIQUE KEY `group_id_2` (`group_id`,`language_name`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `language_name` (`language_name`);

--
-- Индексы таблицы `video_group`
--
ALTER TABLE `video_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_name` (`group_name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `article_group_id`
--
ALTER TABLE `article_group_id`
  MODIFY `group_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `article_t`
--
ALTER TABLE `article_t`
  MODIFY `article_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `event_article_t`
--
ALTER TABLE `event_article_t`
  MODIFY `connections_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `event_group_id`
--
ALTER TABLE `event_group_id`
  MODIFY `group_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `event_t`
--
ALTER TABLE `event_t`
  MODIFY `event_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `gallery_group`
--
ALTER TABLE `gallery_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `language_t`
--
ALTER TABLE `language_t`
  MODIFY `language_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `speaker_article_t`
--
ALTER TABLE `speaker_article_t`
  MODIFY `connections_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `speaker_group_id`
--
ALTER TABLE `speaker_group_id`
  MODIFY `group_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `speaker_t`
--
ALTER TABLE `speaker_t`
  MODIFY `speaker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `video`
--
ALTER TABLE `video`
  MODIFY `video_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `video_group`
--
ALTER TABLE `video_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `article_t`
--
ALTER TABLE `article_t`
  ADD CONSTRAINT `article_t_ibfk_1` FOREIGN KEY (`article_group_id`) REFERENCES `article_group_id` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_t_ibfk_2` FOREIGN KEY (`language_name`) REFERENCES `language_t` (`language_name`);

--
-- Ограничения внешнего ключа таблицы `event_article_t`
--
ALTER TABLE `event_article_t`
  ADD CONSTRAINT `event_article_t_ibfk_1` FOREIGN KEY (`article_group_id`) REFERENCES `article_group_id` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_article_t_ibfk_2` FOREIGN KEY (`event_group_id`) REFERENCES `event_group_id` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `event_t`
--
ALTER TABLE `event_t`
  ADD CONSTRAINT `event_t_ibfk_2` FOREIGN KEY (`event_group_id`) REFERENCES `event_group_id` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_t_ibfk_3` FOREIGN KEY (`language_name`) REFERENCES `language_t` (`language_name`);

--
-- Ограничения внешнего ключа таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `gallery_group` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gallery_ibfk_2` FOREIGN KEY (`language_name`) REFERENCES `language_t` (`language_name`);

--
-- Ограничения внешнего ключа таблицы `speaker_article_t`
--
ALTER TABLE `speaker_article_t`
  ADD CONSTRAINT `speaker_article_t_ibfk_1` FOREIGN KEY (`article_group_id`) REFERENCES `article_group_id` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `speaker_article_t_ibfk_2` FOREIGN KEY (`speaker_group_id`) REFERENCES `speaker_group_id` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `speaker_t`
--
ALTER TABLE `speaker_t`
  ADD CONSTRAINT `speaker_t_ibfk_1` FOREIGN KEY (`language_name`) REFERENCES `language_t` (`language_name`),
  ADD CONSTRAINT `speaker_t_ibfk_2` FOREIGN KEY (`speaker_group_id`) REFERENCES `speaker_group_id` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `video_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_ibfk_2` FOREIGN KEY (`language_name`) REFERENCES `language_t` (`language_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
