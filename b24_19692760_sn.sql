-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql212.byetcluster.com
-- Erstellungszeit: 09. Dez 2017 um 17:55
-- Server Version: 5.6.35-81.0
-- PHP-Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `b24_19692760_sn`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aktuelno`
--

CREATE TABLE IF NOT EXISTS `aktuelno` (
  `id_aktuelno` int(11) NOT NULL AUTO_INCREMENT,
  `naslov_aktuelno` text NOT NULL,
  `slika_aktuelno` text NOT NULL,
  `cijena_aktuelno` text NOT NULL,
  PRIMARY KEY (`id_aktuelno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Daten für Tabelle `aktuelno`
--

INSERT INTO `aktuelno` (`id_aktuelno`, `naslov_aktuelno`, `slika_aktuelno`, `cijena_aktuelno`) VALUES
(5, 'Kuhinja', 'slike/kuhinje.jpg', '1.300 KM'),
(6, 'Kuhinja', 'slike/kuhinja.jpg', '799 KM'),
(13, 'Djeciji krevet', 'slike/djecije.jpg', '470 KM'),
(15, 'Trosjed', 'slike/trosjed.jpg', '2.500 KM'),
(16, 'Krevet "Pariz"', 'slike/krevet_paris.jpg', '799 KM'),
(17, 'Bracni krevet', 'slike/fra_lezaj2.jpg', '820 KM'),
(18, 'Krevet sa krovom', 'slike/djecije1.jpg', '499,-KM'),
(21, 'Dvorisni sto', 'slike/polirano.jpg', '279,-KM');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id_faq` int(11) NOT NULL AUTO_INCREMENT,
  `pitanje_faq` text NOT NULL,
  `opis_faq` text NOT NULL,
  PRIMARY KEY (`id_faq`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `faq`
--

INSERT INTO `faq` (`id_faq`, `pitanje_faq`, `opis_faq`) VALUES
(1, 'Kako je moguce naruciti namjestaj?', '<p>Namjestaj mozete poruciti tako da se prvo registrujete i ostavite Vase osnovne podatke, kako bi mogli izvrsiti isporuku na kucnu adresu. aaa</p>'),
(2, 'Da li je moguce karticno placanje?', 'Placanje putem kartice je moguce. Prvo trebate dodati Vasu karticu, a nakon sto odaberete zeljenu robu, mi cemo izvrsiti naplatu. '),
(3, 'Da li vrsite dostavu u inostranstvo?', 'Namjestaj mozete poruciti tako da se prvo registrujete i ostavite Vase osnovne podatke, kako bi mogli izvrsiti isporuku na kucnu adresu..'),
(4, 'Dvorisni sto', '<p>Sva pitanja vezana za namjestaj pisite ovdje</p>');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kontakt`
--

CREATE TABLE IF NOT EXISTS `kontakt` (
  `id_kontakt` int(11) NOT NULL AUTO_INCREMENT,
  `kancelarija_kontakt` text NOT NULL,
  `email_kontakt` text NOT NULL,
  `broj_kontakt` text NOT NULL,
  PRIMARY KEY (`id_kontakt`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `kontakt`
--

INSERT INTO `kontakt` (`id_kontakt`, `kancelarija_kontakt`, `email_kontakt`, `broj_kontakt`) VALUES
(1, 'DIREKTOR', 'direktor@salon.ba', '051 591 000'),
(2, 'SEKRETAR', 'sekretar@salon.ba', '051 591 100'),
(3, 'UPRAVA', 'uprava@salon.ba', '051 591 200'),
(4, 'RACUNOVODSTVO', 'racunovodstvo@salon.ba', '051 591 300');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kontakt_klijenti`
--

CREATE TABLE IF NOT EXISTS `kontakt_klijenti` (
  `id_kontakt_klijenti` int(11) NOT NULL AUTO_INCREMENT,
  `klijent_name` text NOT NULL,
  `klijent_email` text NOT NULL,
  `klijent_subject` text NOT NULL,
  `klijent_comment` text NOT NULL,
  PRIMARY KEY (`id_kontakt_klijenti`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `kontakt_klijenti`
--

INSERT INTO `kontakt_klijenti` (`id_kontakt_klijenti`, `klijent_name`, `klijent_email`, `klijent_subject`, `klijent_comment`) VALUES
(1, 'Rade', 'gojkovic007@gmail.com', 'Pitanje', 'Na koji email vas mogu kontaktirati?'),
(2, 'Rade', 'gojkovic007@gmail.com', 'Pitanje', 'Na koji email vas mogu kontaktirati?');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mal_katalog_namjestaja`
--

CREATE TABLE IF NOT EXISTS `mal_katalog_namjestaja` (
  `id_m_katalog_namjestaja` int(11) NOT NULL AUTO_INCREMENT,
  `slika_m_katalog_namjestaja` text NOT NULL,
  `naslov_m_katalog_namjestaja` text NOT NULL,
  PRIMARY KEY (`id_m_katalog_namjestaja`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Daten für Tabelle `mal_katalog_namjestaja`
--

INSERT INTO `mal_katalog_namjestaja` (`id_m_katalog_namjestaja`, `slika_m_katalog_namjestaja`, `naslov_m_katalog_namjestaja`) VALUES
(2, 'slike/katalog1.jpg', 'Katalog namještaja'),
(3, 'slike/katalog2.jpg', 'Katalog namještaja'),
(15, 'slike/katalog.jpg', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mal_katalog_tekstila`
--

CREATE TABLE IF NOT EXISTS `mal_katalog_tekstila` (
  `id_m_katalog_tekstila` int(11) NOT NULL AUTO_INCREMENT,
  `slika_m_katalog_tekstila` text NOT NULL,
  `naslov_m_katalog_tekstila` text NOT NULL,
  PRIMARY KEY (`id_m_katalog_tekstila`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `mal_katalog_tekstila`
--

INSERT INTO `mal_katalog_tekstila` (`id_m_katalog_tekstila`, `slika_m_katalog_tekstila`, `naslov_m_katalog_tekstila`) VALUES
(1, 'slike/tekstil.jpg', 'Katalog tekstila'),
(2, 'slike/tekstil1.jpg', 'Katalog tekstila'),
(5, 'slike/tekstil4.jpg', 'Katalog tekstila'),
(6, 'slike/tekstil5.jpg', 'Katalog tekstila'),
(7, 'slike/tekstil3.jpg', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mal_novo_u_ponudi`
--

CREATE TABLE IF NOT EXISTS `mal_novo_u_ponudi` (
  `id_m_novo_u_ponudi` int(11) NOT NULL AUTO_INCREMENT,
  `naslov_m_novo_u_ponudi` text NOT NULL,
  `slika_m_novo_u_ponudi` text NOT NULL,
  `cijena_m_novo_u_ponudi` text NOT NULL,
  PRIMARY KEY (`id_m_novo_u_ponudi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `mal_novo_u_ponudi`
--

INSERT INTO `mal_novo_u_ponudi` (`id_m_novo_u_ponudi`, `naslov_m_novo_u_ponudi`, `slika_m_novo_u_ponudi`, `cijena_m_novo_u_ponudi`) VALUES
(1, 'Bijele fotelje', 'slike/garnitura.jpg', '450,-KM'),
(2, 'Stolice', 'slike/stolice.jpg', '450 KM'),
(3, 'Trosjed', 'slike/trosjed.jpg', '1.500 KM'),
(4, 'Crveni dvosjed', 'slike/dvosjed.jpg', '370,-KM'),
(5, 'Ugaona', 'slike/ugaona.jpg', '745 KM'),
(11, 'Krevet', 'slike/bracni.jpg', '490 KM');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mal_trenutno_u_ponudi`
--

CREATE TABLE IF NOT EXISTS `mal_trenutno_u_ponudi` (
  `id_m_tren_u_ponudi` int(11) NOT NULL AUTO_INCREMENT,
  `naslov_m_tren_u_ponudi` text NOT NULL,
  `slika_m_tren_u_ponudi` text NOT NULL,
  `cijena_m_tren_u_ponudi` text NOT NULL,
  PRIMARY KEY (`id_m_tren_u_ponudi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Daten für Tabelle `mal_trenutno_u_ponudi`
--

INSERT INTO `mal_trenutno_u_ponudi` (`id_m_tren_u_ponudi`, `naslov_m_tren_u_ponudi`, `slika_m_tren_u_ponudi`, `cijena_m_tren_u_ponudi`) VALUES
(2, 'Bracni krevet', 'slike/fra_lezaj.jpg', '470,-KM'),
(3, 'Bracni krevet', 'slike/fra_lezaj_domino.jpg', '620,-KM'),
(4, 'Krevet', 'slike/krevet.png', '550 KM'),
(13, 'Kucica za djecu', 'slike/djecije.jpg', '350,-KM'),
(14, 'Zenski krevet', 'slike/krevet_san_torini.jpg', '420,-KM'),
(15, 'Francuski lezaj', 'slike/lezaj.jpg', '1450,-KM'),
(16, 'Krevet "Bela"', 'slike/emil.png', '654,-KM');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `odgovori`
--

CREATE TABLE IF NOT EXISTS `odgovori` (
  `id_odgovori` int(11) NOT NULL AUTO_INCREMENT,
  `pitali` text NOT NULL,
  `odgovaranje` text NOT NULL,
  PRIMARY KEY (`id_odgovori`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `o_nama`
--

CREATE TABLE IF NOT EXISTS `o_nama` (
  `o_nama_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_nama_naslov` text NOT NULL,
  `o_nama_tekst` text NOT NULL,
  PRIMARY KEY (`o_nama_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Daten für Tabelle `o_nama`
--

INSERT INTO `o_nama` (`o_nama_id`, `o_nama_naslov`, `o_nama_tekst`) VALUES
(10, 'SALON NAMJESTAJA BANJA LUKA', '<p>PreduzeÄ‡e Salon Namje&scaron;taja Banja Luka osnovano je 1996. godine, sa sjedi&scaron;tem u Banjaluci. Osnovna djelatnost preduzeÄ‡a je prodaja i distribucija namje&scaron;taja.</p>\r\n<p>Od osnivanja do danas, razvili smo mreÅ¾u pouzdanih poslovnih saradnika i zadovoljnih klijenata kojima smo pomogli da svoj Å¾ivotni prostor oplemene, uljep&scaron;aju i upotpune namje&scaron;tajem iz na&scaron;eg prodajnog asortimana.</p>\r\n<p>PreduzeÄ‡e se istiÄe u maloprodaji i veleprodaji namje&scaron;taja u banjaluÄkoj regiji, gdje smo veÄ‡ godinama etablirani kao vodeÄ‡i distributer. OdgovarajuÄ‡i potrebama klijenata i Å¾eleÄ‡i da unaprijedimo kvalitet na&scaron;eg rada i ponudu namje&scaron;taja, 2007. godine otvorili smo prvi distributivno-prodajni centar u Banja luci, povr&scaron;ine 6000m2, u mirnom dijelu naselja ObiliÄ‡evo.</p>\r\n<p>SmatrajuÄ‡i da spavanje i kvalitetan san Äine krucijalni dio Äovjekovog Å¾ivota i osnovni preduslov zdravog, kvalitetnog i ispunjenog Å¾ivota pojedinca, u okviru na&scaron;e ponude, izdvojili smo samo najbolje za va&scaron; miran san.</p>');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `penzioneri`
--

CREATE TABLE IF NOT EXISTS `penzioneri` (
  `id_penzioneri` int(11) NOT NULL AUTO_INCREMENT,
  `naslov3_penzioneri` text NOT NULL,
  `tekst3_penzioneri` text NOT NULL,
  `slika3_penzioneri` text NOT NULL,
  PRIMARY KEY (`id_penzioneri`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `penzioneri`
--

INSERT INTO `penzioneri` (`id_penzioneri`, `naslov3_penzioneri`, `tekst3_penzioneri`, `slika3_penzioneri`) VALUES
(1, 'Prva i najbolja ponuda za penzionere', '<p>Ovo je prva i najbolja ponuda za penzionere ikad vidjena. Ovo je prva i najbolja ponuda za penzionere ikad vidjena. Ovo je prva i najbolja ponuda za penzionere ikad vidjena. Ovo je prva i najbolja ponuda za penzionere ikad vidjena. Ovo je prva i najbolja ponuda za penzionere ikad vidjena.&nbsp;</p>', 'slike/penzioneri5.jpg'),
(2, 'NAPOMENE U VEZI SA PONUDOM', 'Jedna osoba moze kupiti najvise pet kupona za ovu ponudu, jedan za sebe i cetiri na poklon. Cijene proizvoda variraju od potreba i zelja kupaca. Kuponi se ne mogu spajati, odnosno ne moze se koristiti vise kupona za jedan proizvod, ali je moguce kupiti vise proizvoda za jedan kupon. U ponudu je ukljuceno besplatno strucno arhitektonsko savjetovanje, besplatno mjerenje, dostava i montaza, kao i 10 godina garancije na klizni mehanizam. Kupon se moze iskoristiti od 01.01.2017, a vrijedi dva mjeseca, odnosno do 01.03.2017. Bez obzira da li zivite u prostranom stanu, kuci ili garsonjeri, bitna je samo jedna stvar - da svoj prostor ucinite sto ugodnijim za zivljenje. Sada mozete urediti Vas enterijer kako Vi zelite i po mjeri Vase kuce. Platite samo 240 KM umjesto 500 KM za vaucer za kupovinu namjestaja u salonu plocastog namjestaja Mamas. Osvjezite svoj zivotni prostor novim plakarom, kuhinjom, dnevnom sobom, spavacom sobom ili djecijom sobom ili uredite svoj kancelarijski prostor. Kvalitet koji nadmasuje cijenu dovoljan je razlog za odabir Mamas proizvoda.', 'slike/kredit.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pitanja`
--

CREATE TABLE IF NOT EXISTS `pitanja` (
  `id_pitanja` int(11) NOT NULL AUTO_INCREMENT,
  `ime_korisnika` text NOT NULL,
  `email_korisnika` text NOT NULL,
  `pitanje` text NOT NULL,
  PRIMARY KEY (`id_pitanja`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `pitanja`
--

INSERT INTO `pitanja` (`id_pitanja`, `ime_korisnika`, `email_korisnika`, `pitanje`) VALUES
(2, 'Slavisa', 'slavisa123@yahoo.com', 'Da li je moguce pralacanje u ratama?'),
(3, 'Rade', 'gojkovic007@gmail.com', 'Ovo je moje prvo pitanje...');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `postovi`
--

CREATE TABLE IF NOT EXISTS `postovi` (
  `id_pos` int(11) NOT NULL AUTO_INCREMENT,
  `ime_pos` text NOT NULL,
  `slika_pos` text NOT NULL,
  `detalji_pos` text NOT NULL,
  `kategorija` text NOT NULL,
  `autor` text NOT NULL,
  PRIMARY KEY (`id_pos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `postovi`
--

INSERT INTO `postovi` (`id_pos`, `ime_pos`, `slika_pos`, `detalji_pos`, `kategorija`, `autor`) VALUES
(1, 'Kuhinja', 'slike/kuhinje.jpg', 'Nudimo najbolje iz naše ponude.', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sajmovi`
--

CREATE TABLE IF NOT EXISTS `sajmovi` (
  `id_sajmovi` int(11) NOT NULL AUTO_INCREMENT,
  `naslov_sajmovi` text NOT NULL,
  `opis_sajmovi` text NOT NULL,
  `slika_sajmovi` text NOT NULL,
  PRIMARY KEY (`id_sajmovi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `sajmovi`
--

INSERT INTO `sajmovi` (`id_sajmovi`, `naslov_sajmovi`, `opis_sajmovi`, `slika_sajmovi`) VALUES
(1, 'Sto za dvoriste od punog drveta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed venenatis ligula. Sed eget libero eget turpis placerat euismod et in mi. Ut non ex vitae nisi dignissim suscipit nec eget purus. In sit amet maximus ligula, id sodales risus. Aliquam id neque cursus, finibus nisi eu, placerat eros. Praesent accumsan viverra velit, id posuere neque consequat non. Suspendisse eget est elementum, efficitur ligula id, posuere ipsum. Praesent convallis lectus vitae mattis commodo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed venenatis ligula. Sed eget libero eget turpis placerat euismod et in mi. Ut non ex vitae nisi dignissim suscipit nec eget purus. In sit amet maximus ligula, id sodales risus. Aliquam id neque cursus, finibus nisi eu, placerat eros. Praesent accumsan viverra velit, id posuere neque consequat non. Suspendisse eget est elementum, efficitur ligula id, posuere ipsum. Praesent convallis lectus vitae mattis commodo.', 'slike/polirano.jpg'),
(2, 'Limeni sto', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed venenatis ligula. Sed eget libero eget turpis placerat euismod et in mi. Ut non ex vitae nisi dignissim suscipit nec eget purus. In sit amet maximus ligula, id sodales risus. Aliquam id neque cursus, finibus nisi eu, placerat eros. Praesent accumsan viverra velit, id posuere neque consequat non. Suspendisse eget est elementum, efficitur ligula id, posuere ipsum. Praesent convallis lectus vitae mattis commodo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed venenatis ligula. Sed eget libero eget turpis placerat euismod et in mi. Ut non ex vitae nisi dignissim suscipit nec eget purus. In sit amet maximus ligula, id sodales risus. Aliquam id neque cursus, finibus nisi eu, placerat eros. Praesent accumsan viverra velit, id posuere neque consequat non. Suspendisse eget est elementum, efficitur ligula id, posuere ipsum. Praesent convallis lectus vitae mattis commodo.</p>', 'slike/staro.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sindikalna_prodaja`
--

CREATE TABLE IF NOT EXISTS `sindikalna_prodaja` (
  `id_sindikal` int(11) NOT NULL AUTO_INCREMENT,
  `lista_naslov4` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id_sindikal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Daten für Tabelle `sindikalna_prodaja`
--

INSERT INTO `sindikalna_prodaja` (`id_sindikal`, `lista_naslov4`) VALUES
(11, 'Gradska opstina Novi Beograd\n'),
(16, 'Osnovni sud u Beogradu\r\n'),
(17, 'JKP "Beogradske elektrane"'),
(18, 'Sindikalna organizacija zaposlenih u savezu samostalnih sindikata'),
(19, 'Vodovod Beograd');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `svi_postovi`
--

CREATE TABLE IF NOT EXISTS `svi_postovi` (
  `id_svi_postovi` int(11) NOT NULL AUTO_INCREMENT,
  `id_m_tren_u_ponudi` int(11) NOT NULL,
  `id_m_novo_u_ponudi` int(11) NOT NULL,
  `id_m_katalog_namjestaja` int(11) NOT NULL,
  `id_m_katalog_tekstila` int(11) NOT NULL,
  `id_vel_trenutno_u_prodaji` int(11) NOT NULL,
  `id_vel_katalog_tekstila` int(11) NOT NULL,
  `id_vel_ugostiteljstvo` int(11) NOT NULL,
  `id_aktuelno` int(11) NOT NULL,
  PRIMARY KEY (`id_svi_postovi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` text NOT NULL,
  `a_prezime` text NOT NULL,
  `a_zanimanje` text NOT NULL,
  `a_adresa` text NOT NULL,
  `a_grad` text NOT NULL,
  `a_telefon` text NOT NULL,
  `a_email` text NOT NULL,
  `a_pass` text NOT NULL,
  `role` text NOT NULL,
  `a_pol` text NOT NULL,
  `a_web_sajt` text NOT NULL,
  `a_o_adminu` text NOT NULL,
  PRIMARY KEY (`id_a`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id_a`, `a_name`, `a_prezime`, `a_zanimanje`, `a_adresa`, `a_grad`, `a_telefon`, `a_email`, `a_pass`, `role`, `a_pol`, `a_web_sajt`, `a_o_adminu`) VALUES
(2, 'Rade', 'Gojkovic', 'Front-End Developer', 'Brace Jugovica', 'Banja Luka', '065123456', 'gojkovic007@gmail.com', '456', 'admin', 'musko', 'www.radegojkovic.com', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.'),
(3, 'Boban', 'Malic', 'Back-End Developer', 'Jovana Misica', 'Bijeljina', '0647874213', 'bobo@yahoo.com', '123', 'admin', 'musko', '/', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.'),
(4, 'Ivan', 'Ivanovic', 'Web Designer', 'Desanke Maksimovic', 'Banja Luka', '065789456', 'ivan@hotmail.com', '717', '', 'musko', 'www.ivan.com', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vauceri`
--

CREATE TABLE IF NOT EXISTS `vauceri` (
  `id_vauceri` int(11) NOT NULL AUTO_INCREMENT,
  `slika_vauceri` text NOT NULL,
  `naslov_vauceri` text NOT NULL,
  `tekst_vauceri` text NOT NULL,
  PRIMARY KEY (`id_vauceri`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `vauceri`
--

INSERT INTO `vauceri` (`id_vauceri`, `slika_vauceri`, `naslov_vauceri`, `tekst_vauceri`) VALUES
(1, 'slike/kuhinja1.png', 'NAPOMENE U VEZI SA PONUDOM', 'Jedna osoba moze kupiti najvise pet kupona za ovu ponudu, jedan za sebe i cetiri na poklon. Cijene proizvoda variraju od potreba i zelja kupaca. Kuponi se ne mogu spajati, odnosno ne moze se koristiti više kupona za jedan proizvod, ali je mogu?e kupiti vise proizvoda za jedan kupon. U ponudu je ukljuceno besplatno strucno arhitektonsko savjetovanje, besplatno mjerenje, dostava i montaza, kao i 10 godina garancije na klizni mehanizam. Kupon se moze iskoristiti od 10.12.2016, a vrijedi dva mjeseca, odnosno do 31.06.2017.'),
(2, 'slike/kuhinja2.png', 'NAPOMENE U VEZI SA PONUDOM', 'Jedna osoba moze kupiti najvise pet kupona za ovu ponudu, jedan za sebe i cetiri na poklon. Cijene proizvoda variraju od potreba i zelja kupaca. Kuponi se ne mogu spajati, odnosno ne moze se koristiti više kupona za jedan proizvod, ali je mogu?e kupiti vise proizvoda za jedan kupon. U ponudu je ukljuceno besplatno strucno arhitektonsko savjetovanje, besplatno mjerenje, dostava i montaza, kao i 10 godina garancije na klizni mehanizam. Kupon se moze iskoristiti od 10.12.2016, a vrijedi dva mjeseca, odnosno do 31.06.2017.'),
(3, 'slike/kuhinja3.png', 'NAPOMENE U VEZI SA PONUDOM', 'Jedna osoba moze kupiti najvise pet kupona za ovu ponudu, jedan za sebe i cetiri na poklon. Cijene proizvoda variraju od potreba i zelja kupaca. Kuponi se ne mogu spajati, odnosno ne moze se koristiti više kupona za jedan proizvod, ali je mogu?e kupiti vise proizvoda za jedan kupon. U ponudu je ukljuceno besplatno strucno arhitektonsko savjetovanje, besplatno mjerenje, dostava i montaza, kao i 10 godina garancije na klizni mehanizam. Kupon se moze iskoristiti od 10.12.2016, a vrijedi dva mjeseca, odnosno do 31.06.2017.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vel_katalog_tekstila`
--

CREATE TABLE IF NOT EXISTS `vel_katalog_tekstila` (
  `id_vel_katalog_tekstila` int(11) NOT NULL AUTO_INCREMENT,
  `slika_vel_katalog_tekstila` text NOT NULL,
  PRIMARY KEY (`id_vel_katalog_tekstila`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `vel_katalog_tekstila`
--

INSERT INTO `vel_katalog_tekstila` (`id_vel_katalog_tekstila`, `slika_vel_katalog_tekstila`) VALUES
(2, 'slike/tekstil_veleprodaja1.jpg'),
(3, 'slike/tekstil_veleprodaja2.jpg'),
(4, 'slike/tekstil_veleprodaja3.jpg'),
(5, 'slike/tekstil_veleprodaja4.jpg'),
(6, 'slike/tekstil_veleprodaja.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vel_kontakti`
--

CREATE TABLE IF NOT EXISTS `vel_kontakti` (
  `id_vel_kontakti` int(11) NOT NULL AUTO_INCREMENT,
  `kancelarija_vel_kontakti` text NOT NULL,
  `telefon_vel_kontakti` text NOT NULL,
  `fax_vel_kontakti` text NOT NULL,
  `email_vel_kontakti` text NOT NULL,
  PRIMARY KEY (`id_vel_kontakti`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Daten für Tabelle `vel_kontakti`
--

INSERT INTO `vel_kontakti` (`id_vel_kontakti`, `kancelarija_vel_kontakti`, `telefon_vel_kontakti`, `fax_vel_kontakti`, `email_vel_kontakti`) VALUES
(1, 'Predsjednik', '00387 65 123 456', '757 493', 'predsjednik@salon.ba'),
(2, 'Pravna sluzba', '00387 65 757 983', '447 981', 'pravnasluzba@salon.ba'),
(3, 'Odjel ljudskih resursa', '00387 65 454 781', '757 494', 'resursi@salon.ba'),
(4, 'Marketing', '00387 65 454 782', '757 495', 'marketing@salon.ba'),
(5, 'Finansije i racunovodstvo', '00387 65 454 783', '757 450', 'finansije@salon.ba'),
(6, 'Informatika', '00387 65 454 784', '757 451', 'informatika@salon.ba'),
(7, 'Investicije', '00387 65 454 785', '757 452', 'investicije@salon.ba'),
(8, 'Nabavka', '00387 65 454 786', '757 452', 'nabavka@salon.ba'),
(10, 'Dobavljac', '00387 64 454 782', '757 466', 'dobavljac@gmail.com');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vel_trenutno_u_prodaji`
--

CREATE TABLE IF NOT EXISTS `vel_trenutno_u_prodaji` (
  `id_vel_trenutno_u_prodaji` int(11) NOT NULL AUTO_INCREMENT,
  `naslov_vel_trenutno_u_prodaji` text NOT NULL,
  `slika_vel_trenutno_u_prodaji` text NOT NULL,
  `cijena_vel_trenutno_u_prodaji` text NOT NULL,
  PRIMARY KEY (`id_vel_trenutno_u_prodaji`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Daten für Tabelle `vel_trenutno_u_prodaji`
--

INSERT INTO `vel_trenutno_u_prodaji` (`id_vel_trenutno_u_prodaji`, `naslov_vel_trenutno_u_prodaji`, `slika_vel_trenutno_u_prodaji`, `cijena_vel_trenutno_u_prodaji`) VALUES
(2, 'Krevet "Paris"', 'slike/krevet_paris.jpg', '680 KM'),
(3, 'Francuski lezaj "Domino"', 'slike/fra_lezaj_domino.jpg', '533 KM'),
(5, 'Krevet sa uzglavljem', 'slike/krevet_uzglavlje.jpg', '648 KM'),
(7, 'Krevet San Torini', 'slike/krevet_san_torini.jpg', '450 KM'),
(9, 'Krevet "Klub"', 'slike/krevet_klub.jpg', '430 KM'),
(10, 'Bracni krevet', 'slike/krevet_sa_spremistem.jpg', '660'),
(11, 'Bracni krevet "Tisa"', 'slike/fra_lezaj2.jpg', '450'),
(12, 'Krevet spremiste', 'slike/bracni.jpg', '590,-KM');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vel_ugostiteljstvo`
--

CREATE TABLE IF NOT EXISTS `vel_ugostiteljstvo` (
  `id_vel_ugostiteljstvo` int(11) NOT NULL AUTO_INCREMENT,
  `naslov_vel_ugostiteljstvo` text NOT NULL,
  `slika_vel_ugostiteljstvo` text NOT NULL,
  `cijena_vel_ugostiteljstvo` text NOT NULL,
  PRIMARY KEY (`id_vel_ugostiteljstvo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `vel_ugostiteljstvo`
--

INSERT INTO `vel_ugostiteljstvo` (`id_vel_ugostiteljstvo`, `naslov_vel_ugostiteljstvo`, `slika_vel_ugostiteljstvo`, `cijena_vel_ugostiteljstvo`) VALUES
(1, 'Enterijeri', 'slike/ugostiteljstvo6.jpg', '560 KM'),
(3, 'Sto i stolice', 'slike/ugostiteljstvo2.jpg', '560 KM'),
(4, 'Bijele stolice', 'slike/ugostiteljstvo3.jpg', '637 KM'),
(6, 'Bijela Ugaona', 'slike/ugostiteljstvo5.jpg', '721 KM');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `weding`
--

CREATE TABLE IF NOT EXISTS `weding` (
  `id_weding` int(11) NOT NULL AUTO_INCREMENT,
  `naslov3weding` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `tekst3weding` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `slika3weding` text NOT NULL,
  PRIMARY KEY (`id_weding`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `weding`
--

INSERT INTO `weding` (`id_weding`, `naslov3weding`, `tekst3weding`, `slika3weding`) VALUES
(3, 'Period 3-5 Mjeseci', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. ', 'slike/3-5m.jpg'),
(4, 'Period 1-2 Mjeseca', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>', 'slike/1-2.jpg'),
(7, 'Period 6-9 Mjeseci', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 'slike/6-9m.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `weding_period`
--

CREATE TABLE IF NOT EXISTS `weding_period` (
  `id_weding_per` int(11) NOT NULL AUTO_INCREMENT,
  `naslov_weding_per` text NOT NULL,
  `tekst_weding_per` text NOT NULL,
  `slika_weding_per` text NOT NULL,
  PRIMARY KEY (`id_weding_per`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `weding_period`
--

INSERT INTO `weding_period` (`id_weding_per`, `naslov_weding_per`, `tekst_weding_per`, `slika_weding_per`) VALUES
(1, 'Period 10-12 Mjeseci', '<ul>\r\n<li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>\r\n\r\n<li>But I must explain to you how all this mistaken idea of denouncing pleasure.</li>\r\n\r\n<li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</li>\r\n\r\n<li>And expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>\r\n\r\n<li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</li>\r\n\r\n<li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</li>\r\n\r\n<li>And expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>\r\n\r\n<li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</li>\r\n\r\n<li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</li>\r\n\r\n<li>And expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>\r\n\r\n<li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</li>\r\n</ul>', 'slike/10-12m.jpg'),
(2, 'Period 6-9 Mjeseci', '<ul> <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</li>  <li>And expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</li>  <li>And expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</li>  <li>And expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</li> </ul>', 'slike/6-9m.jpg'),
(3, 'Period 3-5 Mjeseci', '<ul> <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</li>  <li>And expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</li>  <li>And expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</li>  <li>And expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</li> </ul>', 'slike/3-5m.jpg'),
(4, 'Period 1-2 Mjeseca', '<ul> <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</li>  <li>And expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</li>  <li>And expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</li>  <li>And expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</li>  <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</li> </ul>', 'slike/1-2.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
