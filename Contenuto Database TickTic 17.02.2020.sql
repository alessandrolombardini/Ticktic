-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 17, 2020 alle 22:48
-- Versione del server: 10.3.15-MariaDB
-- Versione PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticktic`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `amministratore`
--

CREATE TABLE `amministratore` (
  `IDAmministratore` int(11) NOT NULL,
  `Email` varchar(1024) NOT NULL,
  `Password` varchar(1024) NOT NULL,
  `Nome` varchar(1024) NOT NULL,
  `Cognome` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `amministratore`
--

INSERT INTO `amministratore` (`IDAmministratore`, `Email`, `Password`, `Nome`, `Cognome`) VALUES
(1, 'alesssandrolombardini@gmail.com', '$2y$10$Huy5dbjKU9YXigzZhiAbneXxUVNF5.8ALxNK5irivqAPP2Utvm.k2', 'Alessandro', 'Lombardini');

-- --------------------------------------------------------

--
-- Struttura della tabella `artista`
--

CREATE TABLE `artista` (
  `ImmagineArtista` varchar(1024) DEFAULT NULL,
  `Descrizione` varchar(5012) DEFAULT NULL,
  `IDArtista` int(11) NOT NULL,
  `PseudonimoArtista` varchar(1024) NOT NULL,
  `ValutatoSN` char(1) NOT NULL,
  `AutorizzatoSN` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `artista`
--

INSERT INTO `artista` (`ImmagineArtista`, `Descrizione`, `IDArtista`, `PseudonimoArtista`, `ValutatoSN`, `AutorizzatoSN`) VALUES
('foo_fighters.jpg', 'I Foo Fighters sono un gruppo musicale alternative rock statunitense fondato a Seattle nel 1994 dal musicista Dave Grohl, ex batterista dei Nirvana. Nato dopo lo scioglimento dei Nirvana successivo alla morte di Kurt Cobain, il gruppo deriva il proprio nome dal termine foo fighter, espressione usata per indicare, durante la seconda guerra mondiale, quegli strani avvistamenti aerei riferiti da alcuni piloti alleati, simili a quelli che generalmente vengono chiamati UFO.', 4, 'Foo Fighters', 's', 's'),
('fiorentina_calcio.png', 'L\'ACF Fiorentina, meglio nota come Fiorentina, è una società calcistica italiana con sede nella città di Firenze. Nel corso della sua storia è stata per due volte campione d\'Italia; in ambito nazionale ha inoltre vinto sei Coppe Italia e una Supercoppa italiana. È stata la prima squadra italiana a vincere una competizione UEFA, la Coppa delle Coppe nel 1960-1961, nonché una delle quattordici squadre europee che hanno disputato una finale di tutte le tre principali competizioni continentali: la Coppa dei Campioni, la Coppa delle Coppe e la Coppa UEFA.', 5, 'ACF Fiorentina', 's', 's'),
('green_day.jpg', 'I Green Day sono un gruppo musicale rock statunitense formatosi a Berkeley nel 1986 e composto da tre membri: Billie Joe Armstrong, Mike Dirnt e Tré Cool. Sono considerati esponenti del pop punk, del punk rock e dell\'alternative rock. Nel 1994, grazie al successo del loro terzo album Dookie, il quale, con 10 dischi di platino e uno di diamante, ha venduto più di 10 milioni di copie solo negli Stati Uniti e 15 in tutto il mondo, sono stati accreditati insieme agli Offspring e ai Rancid, la band che ha fatto tornare il punk rock nella musica mainstream.', 6, 'Green Day', 's', 's'),
('juventus.png', 'La Juventus Football Club, meglio nota come Juventus, è una società calcistica italiana con sede nella città di Torino. Fondata nel 1897 da un gruppo di studenti liceali locali, è il secondo club calcistico professionistico per anzianità tra quelli tuttora attivi nel Paese; è il più titolato e con maggiore tradizione sportiva FIGC, oltreché uno dei più blasonati al mondo con 67 trofei ufficiali vinti durante la militanza al vertice della piramide sportiva nazionale, tra cui il primato di 35 titoli di campione d\'Italia e 11 in competizioni UEFA. ', 7, 'Juventus Football Club', 's', 's'),
('linkin_park.jpg', 'I Linkin Park sono un gruppo musicale statunitense formatosi a Los Angeles nel 1996. Composto da Chester Bennington, Mike Shinoda, Brad Delson, Phoenix, Rob Bourdon e Joe Hahn, si tratta di uno dei gruppi di maggior successo commerciale degli anni 2000 e 2010, avendo venduto oltre 100 milioni di copie dei loro dischi nel mondo, di cui 70 per gli album.  I Linkin Park hanno vinto numerosi premi, tra cui due Grammy Award. I loro album sono stati certificati più volte disco d\'oro e di platino negli Stati Uniti d\'America, e il loro album d\'esordio Hybrid Theory è stato certificato disco di diamante nello stesso paese per aver venduto oltre 11 milioni di copie. ', 8, 'Linkin Park', 's', 's'),
('salmo.jpg', 'Salmo, pseudonimo di Maurizio Pisciottu, è un rapper e produttore discografico italiano. Salmo ha iniziato la sua carriera musicale all\'età di 13 anni, incidendo le sue prime rime tra il 1997 e il 1998. Nel 2011, ha pubblicato il suo primo album in studio, intitolato The Island Chainsaw Massacre. Nel 2013 ha annunciato le tracce dell\'album Midnite, il quale ha debuttato alla prima posizione nella classifica italiana degli album. Nel 2015 Salmo ha annunciato l\'album Hellvisback, il quale ha avuto un buon successo in Italia, debuttando al primo posto nella Classifica FIMI Album e venendo certificato disco d\'oro e platino dalla FIMI.', 9, 'Salmo', 's', 's'),
('the_lumineers.jpg', 'The Lumineers sono un gruppo musicale statunitense, formatosi nel 2005.', 10, 'The lumineers', 's', 's'),
('uci_cinemas.jpg', 'UCI Cinemas Italia ha una mission chiara: creare entusiasmanti esperienze di intrattenimento per i propri clienti.\r\n\r\nIl punto di forza di UCI Cinemas nel perseguire questa mission è l’elevata qualità che caratterizza tutti i multiplex del Gruppo.  Indipendentemente dalla loro dimensione, i cinema UCI combinano un\'architettura e un design moderno e funzionale ad un elevato livello di comfort e attenzione al cliente. Tutte le sale sono a gradinata, hanno schermi giganti da parete a parete, suono digitale e poltrone extra-large con una distanza tra le file di più di 1 metro.', 11, 'Uci cinema', 's', 's'),
('milan.jpg', 'L\'Associazione Calcio Milan, meglio nota come A.C. Milan o anche Milan, è una società calcistica italiana fondata nel 1899, con sede nella città di Milano.', 12, 'Milan', 's', 's'),
('alborosie.jpg', 'Alborosie (inizialmente scritto Al Borosie), pseudonimo di Alberto D\'Ascola, talvolta menzionato come Stena o Puppa Albo (Marsala, 4 luglio 1977), è un cantante, beatmaker e musicista italiano naturalizzato giamaicano, ex leader e fondatore della band Reggae National Tickets, da anni trasferitosi in Giamaica per confrontarsi con la cultura reggae e rastafari.', 13, 'Alborosie', 's', 's'),
('le_cirque_wtp.png', ' Le Cirque World’s Top Performers è una compagnia di nouveau cirque. È nata in Italia nel 2015 su iniziativa dell’imprenditore Gianpiero Garelli e valorizza le arti circensi in qualsiasi forma: equilibrismo, acrobazia, funambolismo, contorsionismo, giocoleria, umorismo, comicità, danza e musica. Fanno parte della compagnia oltre 70 artisti provenienti da ogni parte del mondo. Negli spettacoli non vengono mai usati animali.', 14, 'Le Cirque World\'s Top Performers', 's', 's'),
('cesare_cremonini.jpg', 'Cesare Cremonini è un cantautore, attore e scrittore italiano.\r\nÈ stato il frontman e l’autore delle più importanti canzoni del gruppo italiano Lùnapop, che ha riscosso un grandissimo successo con l\'album ...Squérez? vendendo oltre un milione e mezzo di copie. Nel 2002 il cantante ha annunciato ufficialmente lo scioglimento del gruppo, proseguendo con successo nella sua carriera solista e pubblicando, nel corso degli anni, sei album in studio, due dal vivo e tre raccolte.', 15, 'Cesare Cremonini', 's', 's'),
('motogp.png', 'La MotoGP è la massima categoria (in termini prestazionali) di moto da corsa su circuito definita dalla Federazione Internazionale di Motociclismo. Le uniche corse organizzate per MotoGP sono i gran premi del Campionato Mondiale della MotoGP.', 16, 'MotoGP', 's', 's');

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `NomeCategoria` varchar(1024) NOT NULL,
  `IDCategoria` int(11) NOT NULL,
  `ImmagineCategoria` varchar(1024) DEFAULT NULL,
  `ValutataSN` char(1) NOT NULL,
  `AutorizzataSN` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`NomeCategoria`, `IDCategoria`, `ImmagineCategoria`, `ValutataSN`, `AutorizzataSN`) VALUES
('Concerti', 3, 'categoria_concerti.png', 's', 's'),
('Cinema', 5, 'categoria_cinema.png', 's', 's'),
('Mostre e Musei', 6, 'categoria_mostre_e_musei.png', 's', 's'),
('Spettacoli', 7, 'categoria_spettacoli.png', 's', 's'),
('Sport', 8, 'categoria_sport.png', 's', 's'),
('Altro', 9, 'categoria_altro.png', 's', 's');

-- --------------------------------------------------------

--
-- Struttura della tabella `comprende`
--

CREATE TABLE `comprende` (
  `IDOrdine` int(11) NOT NULL,
  `IDEvento` int(11) NOT NULL,
  `NumeroBiglietti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `comprende`
--

INSERT INTO `comprende` (`IDOrdine`, `IDEvento`, `NumeroBiglietti`) VALUES
(15, 20, 3),
(16, 22, 2),
(17, 23, 4),
(18, 24, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `desidera_acquistare`
--

CREATE TABLE `desidera_acquistare` (
  `IDUtente` int(11) NOT NULL,
  `IDEvento` int(11) NOT NULL,
  `NumeroBiglietti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `esegue`
--

CREATE TABLE `esegue` (
  `IDArtista` int(11) NOT NULL,
  `IDEvento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `esegue`
--

INSERT INTO `esegue` (`IDArtista`, `IDEvento`) VALUES
(7, 22),
(5, 22),
(9, 21),
(4, 20),
(6, 23),
(11, 24),
(12, 25),
(7, 25),
(11, 26),
(14, 27),
(16, 28),
(15, 29);

-- --------------------------------------------------------

--
-- Struttura della tabella `evento`
--

CREATE TABLE `evento` (
  `Luogo` varchar(1024) NOT NULL,
  `NumeroPosti` bigint(20) NOT NULL,
  `BigliettiVenduti` int(11) NOT NULL DEFAULT 0,
  `PrezzoBiglietto` float NOT NULL,
  `ImmagineEvento` varchar(1024) DEFAULT NULL,
  `DataEvento` datetime NOT NULL,
  `NoteEvento` varchar(5012) DEFAULT NULL,
  `DescrizioneEvento` varchar(5012) DEFAULT NULL,
  `IDEvento` int(11) NOT NULL,
  `NomeEvento` varchar(1024) NOT NULL,
  `IDCategoria` int(11) NOT NULL,
  `IDOrganizzatore` int(11) NOT NULL,
  `EliminatoSN` varchar(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `evento`
--

INSERT INTO `evento` (`Luogo`, `NumeroPosti`, `BigliettiVenduti`, `PrezzoBiglietto`, `ImmagineEvento`, `DataEvento`, `NoteEvento`, `DescrizioneEvento`, `IDEvento`, `NomeEvento`, `IDCategoria`, `IDOrganizzatore`, `EliminatoSN`) VALUES
('MIND - Milano Innovation District (Area Expo)', 300, 3, 74.75, 'idays_foo_fighters.jpg', '2020-06-14 21:00:00', '', 'La band si aggiunge al cartellone degli IDays 2020!', 20, 'IDays - Foo Fighters', 3, 5, 'n'),
('Lugano - Padiglione Conza', 150, 0, 40.5, 'salmo_lugano.png', '2020-03-20 21:00:00', 'L\'evento inizierà alle ore 20:30, apertura porte ore 19:00.', 'Data a Lugano del tour europeo di Salmo!', 21, 'Lugano - Salmo @ Tour Europeo', 3, 5, 'n'),
('TORINO - Allianz Stadium', 500, 2, 40.5, 'juventus_fiorentina.jpeg', '2020-03-04 21:00:00', '', 'L\'evento inizierà alle ore 20:50', 22, 'Juventus vs Fiorentina Semifinale Coppa Italia', 8, 5, 'n'),
('FIRENZE Ippodromo del Visarno', 3000, 4, 34, 'green_day.jpg', '2020-01-07 21:00:00', '', ' I Green Day sono anche i primi headliner di Firenze Rocks 2020.', 23, 'Firenze Rocks Party - Green Day FIRENZE', 3, 6, 'n'),
('Uci Cinema, Savignano sul Rubicone', 400, 1, 37.4, 'matrix.jpg', '2020-05-16 22:33:00', '', ' Proiezione di un classico del cinema internazionale. Vieni a vedere in maxi schermo la proiezione dell\'anno.  ', 24, 'Proiezione Matrix', 5, 6, 'n'),
('Allianz Stadium', 30000, 0, 127, 'ac-milan-juventus-preview-featured.png', '2020-05-12 21:00:00', '', ' Partita attesissima, non puoi mancare. ', 25, 'Milan Juventus - Coppa Italia', 8, 6, 'n'),
('Uci Cinema, Savignano sul Rubicone', 22, 0, 30, '174833.jpg', '2020-04-06 21:00:00', '', 'Commovente spettacolo che vi porterà ad amare il teatro.', 26, 'Lo schiaccianoci ', 7, 6, 'n'),
('Palabassano - Bassano del Grappa', 150, 0, 18.4, 'new_alis.jpg', '2020-04-03 21:00:00', '', 'Il nono tour dello spettacolo ALIS, apertura porte dalle ore 20:30', 27, 'Le Cirque WTP - New Alis', 7, 5, 'n'),
('Autodromo Mugello - Scarperia', 1500, 0, 90, 'gp_mugello_2020.jpg', '2020-05-28 16:00:00', '', 'L\'accesso all\'autodromo viene fatto a partire dalle ore 13:00. Verranno svolti controlli di sicurezza prima dell\'accesso per garantire un corretto svolgimento dell\'evento.', 28, 'Moto GP Mugello 2020', 8, 5, 'n'),
('Stadio Euganeo - Padova', 200, 0, 40.25, 'cremonini-stadi-2020.jpg', '2020-06-27 21:00:00', '', 'Data di Padova del tour del 2020 per celebrare 20 anni di carriera.', 29, 'Cesare Cremonini 2020 Tour', 3, 5, 'n');

-- --------------------------------------------------------

--
-- Struttura della tabella `interessa`
--

CREATE TABLE `interessa` (
  `IDEvento` int(11) NOT NULL,
  `IDUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `interessa`
--

INSERT INTO `interessa` (`IDEvento`, `IDUtente`) VALUES
(23, 8),
(22, 9),
(20, 9),
(25, 6),
(26, 6),
(20, 6),
(21, 6),
(24, 8),
(22, 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `notifica`
--

CREATE TABLE `notifica` (
  `TestoNotifica` varchar(5012) NOT NULL,
  `TitoloNotifica` varchar(5012) NOT NULL,
  `IDNotifica` int(11) NOT NULL,
  `DataNotifica` timestamp NULL DEFAULT current_timestamp(),
  `IDOrganizzatore` int(11) DEFAULT NULL,
  `IDEvento` int(11) DEFAULT NULL,
  `IDAmministratore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `notifica`
--

INSERT INTO `notifica` (`TestoNotifica`, `TitoloNotifica`, `IDNotifica`, `DataNotifica`, `IDOrganizzatore`, `IDEvento`, `IDAmministratore`) VALUES
('Un utente ha richiesto il riconoscimento di qualità di organizzatore', 'Richiesta registrazione organizzatore', 53, '2020-02-14 12:26:32', NULL, NULL, NULL),
('L\'organizzatore dell\'evento lo ha modificato, controlla pagina dell\'evento per ulteriori informazioni.', 'MODIFICA', 54, '2020-02-14 13:12:52', 6, 24, NULL),
('Attenzione, durante la proiezione di Matrix potrebbe verificarsi un grosso temporale all\'esterno. Prestate dunque attenzione a dove parcheggiate la macchina', 'Allerta meteo', 55, '2020-02-14 13:17:34', 6, 24, NULL),
('L\'organizzatore dell\'evento lo ha modificato, controlla pagina dell\'evento per ulteriori informazioni.', 'MODIFICA', 56, '2020-02-14 13:23:59', 6, 24, NULL),
('L\'organizzatore dell\'evento lo ha modificato, controlla pagina dell\'evento per ulteriori informazioni.', 'MODIFICA', 57, '2020-02-14 13:24:27', 6, 24, NULL),
('Un organizzatore ha richiesto l\'inserimento dell\'artista Le Cirque World\'s Top Performers', 'Richiesta di inserimento artista.', 58, '2020-02-17 21:07:57', 5, NULL, NULL),
('Un organizzatore ha richiesto l\'inserimento dell\'artista Cesare Cremonini', 'Richiesta di inserimento artista.', 59, '2020-02-17 21:19:44', 5, NULL, NULL),
('Un organizzatore ha richiesto l\'inserimento dell\'artista Autodromo Internazionale del Mugello', 'Richiesta di inserimento artista.', 60, '2020-02-17 21:25:39', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `notifica_personale`
--

CREATE TABLE `notifica_personale` (
  `IDNotifica` int(11) NOT NULL,
  `VisualizzataSN` char(1) NOT NULL,
  `IDOrganizzatore` int(11) DEFAULT NULL,
  `IDUtente` int(11) DEFAULT NULL,
  `IDAmministratore` int(11) DEFAULT NULL,
  `IDNotificaPersonale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `notifica_personale`
--

INSERT INTO `notifica_personale` (`IDNotifica`, `VisualizzataSN`, `IDOrganizzatore`, `IDUtente`, `IDAmministratore`, `IDNotificaPersonale`) VALUES
(53, 's', NULL, NULL, 1, 20),
(58, 's', NULL, NULL, 1, 21),
(59, 'n', NULL, NULL, 1, 22),
(60, 'n', NULL, NULL, 1, 23);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `DataOrdine` date NOT NULL,
  `IDOrdine` int(11) NOT NULL,
  `IDUtente` int(11) NOT NULL,
  `TotaleSpesa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`DataOrdine`, `IDOrdine`, `IDUtente`, `TotaleSpesa`) VALUES
('2020-02-14', 15, 8, 234.24),
('2020-02-14', 16, 8, 84.99),
('2020-02-14', 17, 8, 139.99),
('2020-02-14', 18, 9, 41.39);

-- --------------------------------------------------------

--
-- Struttura della tabella `organizzatore`
--

CREATE TABLE `organizzatore` (
  `Indirizzo` varchar(1024) NOT NULL,
  `CAP` varchar(10) NOT NULL,
  `Citta` varchar(1024) NOT NULL,
  `IDOrganizzatore` int(11) NOT NULL,
  `Email` varchar(1024) NOT NULL,
  `Sesso` char(1) NOT NULL,
  `Password` varchar(1024) NOT NULL,
  `Nome` varchar(1024) NOT NULL,
  `Cognome` varchar(1024) NOT NULL,
  `DataNascita` date NOT NULL,
  `ValutatoSN` char(1) NOT NULL,
  `AutorizzatoSN` char(1) NOT NULL,
  `IBAN` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `organizzatore`
--

INSERT INTO `organizzatore` (`Indirizzo`, `CAP`, `Citta`, `IDOrganizzatore`, `Email`, `Sesso`, `Password`, `Nome`, `Cognome`, `DataNascita`, `ValutatoSN`, `AutorizzatoSN`, `IBAN`) VALUES
('Via camaleonte', '47822', 'Rimini', 1, 'filippo.lombardini@outlook.com', 'm', '$2y$10$qrPDZCfR05ysbPTCf8jpJeISYiY1KkFpXXynmmPz4/oYlgwbnM.EK', 'Filippo', 'Lombardini', '2001-09-29', 's', 's', 'IT60X0542811101000000123456'),
('Via Luci, 17', '47035', 'Gambettola', 5, 'martina.baiardi4@studio.unibo.it', 'f', '$2y$10$SGdcniwk.1Qo45Y.tDdstOkmvfdud1RnvRjeCtTHpHvraKTsJIQXu', 'Martina', 'Baiardi', '1998-01-26', 's', 's', 'IT60X0542811101000000123456'),
('Via pugliaccio, 138', '24762', 'Viserba', 6, 'donato.perlingeri@outlook.com', 'm', '$2y$10$WECBlFZJncwVbJtMphDW5OIdUpVK4tUfUGfRsEenncaNOzFkgCtYW', 'Donato', 'Perlingeri', '1976-08-11', 's', 's', 'IT60X0542811101000000123456');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `IDUtente` int(11) NOT NULL,
  `Email` varchar(1024) NOT NULL,
  `Sesso` char(1) NOT NULL,
  `Password` varchar(1024) NOT NULL,
  `Nome` varchar(1024) NOT NULL,
  `Cognome` varchar(1024) NOT NULL,
  `DataNascita` date NOT NULL,
  `Indirizzo` varchar(1024) NOT NULL,
  `CAP` varchar(10) NOT NULL,
  `Citta` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`IDUtente`, `Email`, `Sesso`, `Password`, `Nome`, `Cognome`, `DataNascita`, `Indirizzo`, `CAP`, `Citta`) VALUES
(6, 'al@gmail.com', 'f', '$2y$10$qBQ02fZt/bjnj/Ec/2fCreU9jD512jxQBJK1G96zzr2wN46RLSJDa', 'Asia', 'Lucchi', '1998-02-15', 'Via cipolla, 154', '4325', 'Cesena'),
(7, 'filippo.caminati@outlook.com', 'm', '$2y$10$NtBHbW4ipTQzeMtkTOYwBuJ8/nR.lHymdjpO2G4NWP8j3m0QHos8a', 'Filippo', 'Caminati', '1998-03-11', 'Via sardina, 154', '47822', 'San vito'),
(8, 'giada.diflavio@outlook.com', 'f', '$2y$10$S.j95VeOP91nseJl.o.uAOYXyVvXnALos0c92S.l/aeN3QI6.yFHu', 'Giada', 'Di', '1998-08-11', 'Via cipollina, 152', '37464', 'Verucchio'),
(9, 'mirko.puffetto@outlook.com', 'm', '$2y$10$8AkduEBWep124aeG3ZnMze1HPlSUW82Af2UpA7CoYDMnQPrYNgWjS', 'Mirko', 'Puffetto', '1998-03-11', 'Via struzzo, 345', '26371', 'San donato');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `amministratore`
--
ALTER TABLE `amministratore`
  ADD PRIMARY KEY (`IDAmministratore`);

--
-- Indici per le tabelle `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`IDArtista`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IDCategoria`);

--
-- Indici per le tabelle `comprende`
--
ALTER TABLE `comprende`
  ADD KEY `FKCOM_ORD` (`IDOrdine`),
  ADD KEY `FKCOM_EVE` (`IDEvento`);

--
-- Indici per le tabelle `desidera_acquistare`
--
ALTER TABLE `desidera_acquistare`
  ADD KEY `FKDES_UTE` (`IDUtente`),
  ADD KEY `FKDES_EVE` (`IDEvento`);

--
-- Indici per le tabelle `esegue`
--
ALTER TABLE `esegue`
  ADD KEY `FKESE_ART` (`IDArtista`),
  ADD KEY `FKESE_EVE` (`IDEvento`);

--
-- Indici per le tabelle `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`IDEvento`),
  ADD KEY `FKTIPOLOGIA` (`IDCategoria`),
  ADD KEY `FKPUBBLICA_E` (`IDOrganizzatore`);

--
-- Indici per le tabelle `interessa`
--
ALTER TABLE `interessa`
  ADD KEY `FKINT_EVE` (`IDEvento`),
  ADD KEY `FKINT_UTE` (`IDUtente`);

--
-- Indici per le tabelle `notifica`
--
ALTER TABLE `notifica`
  ADD PRIMARY KEY (`IDNotifica`),
  ADD KEY `FKPRODUCE_G` (`IDOrganizzatore`),
  ADD KEY `FKAPPARTIENE` (`IDEvento`),
  ADD KEY `FKPRODUCE_A` (`IDAmministratore`);

--
-- Indici per le tabelle `notifica_personale`
--
ALTER TABLE `notifica_personale`
  ADD PRIMARY KEY (`IDNotificaPersonale`),
  ADD KEY `FKTIPO` (`IDNotifica`),
  ADD KEY `FKR` (`IDOrganizzatore`),
  ADD KEY `FKRICEVE` (`IDUtente`),
  ADD KEY `FKR_1` (`IDAmministratore`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`IDOrdine`),
  ADD KEY `FKEFFETTUA` (`IDUtente`);

--
-- Indici per le tabelle `organizzatore`
--
ALTER TABLE `organizzatore`
  ADD PRIMARY KEY (`IDOrganizzatore`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`IDUtente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `amministratore`
--
ALTER TABLE `amministratore`
  MODIFY `IDAmministratore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `artista`
--
ALTER TABLE `artista`
  MODIFY `IDArtista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IDCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `evento`
--
ALTER TABLE `evento`
  MODIFY `IDEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT per la tabella `notifica`
--
ALTER TABLE `notifica`
  MODIFY `IDNotifica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT per la tabella `notifica_personale`
--
ALTER TABLE `notifica_personale`
  MODIFY `IDNotificaPersonale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `IDOrdine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `organizzatore`
--
ALTER TABLE `organizzatore`
  MODIFY `IDOrganizzatore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `IDUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `comprende`
--
ALTER TABLE `comprende`
  ADD CONSTRAINT `FKCOM_EVE` FOREIGN KEY (`IDEvento`) REFERENCES `evento` (`IDEvento`),
  ADD CONSTRAINT `FKCOM_ORD` FOREIGN KEY (`IDOrdine`) REFERENCES `ordine` (`IDOrdine`);

--
-- Limiti per la tabella `desidera_acquistare`
--
ALTER TABLE `desidera_acquistare`
  ADD CONSTRAINT `FKDES_EVE` FOREIGN KEY (`IDEvento`) REFERENCES `evento` (`IDEvento`),
  ADD CONSTRAINT `FKDES_UTE` FOREIGN KEY (`IDUtente`) REFERENCES `utente` (`IDUtente`);

--
-- Limiti per la tabella `esegue`
--
ALTER TABLE `esegue`
  ADD CONSTRAINT `FKESE_ART` FOREIGN KEY (`IDArtista`) REFERENCES `artista` (`IDArtista`),
  ADD CONSTRAINT `FKESE_EVE` FOREIGN KEY (`IDEvento`) REFERENCES `evento` (`IDEvento`);

--
-- Limiti per la tabella `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FKPUBBLICA_E` FOREIGN KEY (`IDOrganizzatore`) REFERENCES `organizzatore` (`IDOrganizzatore`),
  ADD CONSTRAINT `FKTIPOLOGIA` FOREIGN KEY (`IDCategoria`) REFERENCES `categoria` (`IDCategoria`);

--
-- Limiti per la tabella `interessa`
--
ALTER TABLE `interessa`
  ADD CONSTRAINT `FKINT_EVE` FOREIGN KEY (`IDEvento`) REFERENCES `evento` (`IDEvento`),
  ADD CONSTRAINT `FKINT_UTE` FOREIGN KEY (`IDUtente`) REFERENCES `utente` (`IDUtente`);

--
-- Limiti per la tabella `notifica`
--
ALTER TABLE `notifica`
  ADD CONSTRAINT `FKAPPARTIENE` FOREIGN KEY (`IDEvento`) REFERENCES `evento` (`IDEvento`),
  ADD CONSTRAINT `FKPRODUCE_A` FOREIGN KEY (`IDAmministratore`) REFERENCES `amministratore` (`IDAmministratore`),
  ADD CONSTRAINT `FKPRODUCE_G` FOREIGN KEY (`IDOrganizzatore`) REFERENCES `organizzatore` (`IDOrganizzatore`);

--
-- Limiti per la tabella `notifica_personale`
--
ALTER TABLE `notifica_personale`
  ADD CONSTRAINT `FKR` FOREIGN KEY (`IDOrganizzatore`) REFERENCES `organizzatore` (`IDOrganizzatore`),
  ADD CONSTRAINT `FKRICEVE` FOREIGN KEY (`IDUtente`) REFERENCES `utente` (`IDUtente`),
  ADD CONSTRAINT `FKR_1` FOREIGN KEY (`IDAmministratore`) REFERENCES `amministratore` (`IDAmministratore`),
  ADD CONSTRAINT `FKTIPO` FOREIGN KEY (`IDNotifica`) REFERENCES `notifica` (`IDNotifica`);

--
-- Limiti per la tabella `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `FKEFFETTUA` FOREIGN KEY (`IDUtente`) REFERENCES `utente` (`IDUtente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
