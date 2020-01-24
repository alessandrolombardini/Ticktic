create database ticktic;
use ticktic;

create table AMMINISTRATORE (
     IDAmministratore int not null AUTO_INCREMENT,
     Email varchar(1024) not null,
     Password varchar(1024) not null,
     Nome varchar(1024) not null,
     Cognome varchar(1024) not null,
     constraint IDAMMINISTRATORE primary key (IDAmministratore));

create table ARTISTA (
     ImmagineArtista varchar(1024),
     Descrizione varchar(5012),
     IDArtista int not null AUTO_INCREMENT,
     PseudonimoArtista varchar(1024) not null,
     constraint IDARTISTA primary key (IDArtista));

create table CATEGORIA (
     NomeCategoria varchar(1024) not null,
     IDCategoria int not null AUTO_INCREMENT,
     constraint IDCATEGORIA primary key (IDCategoria));

create table COMPRENDE (
     IDOrdine int not null,
     IDEvento int not null);

create table DESIDERA_ACQUISTARE (
     IDUtente int not null,
     IDEvento int not null);

create table ESEGUE (
     IDArtista int not null,
     IDEvento int not null);

create table EVENTO (
     Anteprima varchar(1024),
     Luogo varchar(1) not null,
     NumeroPosti bigint not null,
     PrezzoBiglietto float(10) not null,
     ImmagineEvento varchar(1024),
     DataEvento date not null,
     NoteEvento varchar(5012),
     DescrizioneEvento varchar(5012),
     IDEvento int not null AUTO_INCREMENT,
     NomeEvento varchar(1024) not null,
     IDCategoria int not null,
     IDOrganizzatore int not null,
     constraint IDEVENTO primary key (IDEvento));

create table ORGANIZZATORE (
     Indirizzo varchar(1024) not null,
     CAP varchar(10) not null,
     Citta varchar(1024) not null,
     IDOrganizzatore int not null AUTO_INCREMENT,
     Email varchar(1024) not null,
     Sesso char(1) not null,
     Password varchar(1024) not null,
     Nome varchar(1024) not null,
     Cognome varchar(1024) not null,
     DataNascita date not null,
     ValutatoSN char(1) not null,
     AutorizzatoSN char(1) not null,
     IBAN varchar(1024) not null,
     constraint IDGESTORE primary key (IDOrganizzatore));

create table INTERESSA (
     IDEvento int not null,
     IDUtente int not null);

create table NOTIFICA (
     TestoNotifica varchar(5012) not null,
     IDNotifica int not null AUTO_INCREMENT,
     DataNotifica date not null,
     IDOrganizzatore int,
     IDEvento int,
     IDAmministratore int,
     constraint IDNOTIFICA primary key (IDNotifica));

create table NOTIFICA_PERSONALE (
     IDNotifica int not null,
     VisualizzataSN char(1) not null,
     IDOrganizzatore int,
     IDUtente int,
     IDAmministratore int,
    IDNotificaPersonale int not null  AUTO_INCREMENT,
     constraint IDNOTIFICA primary key (IDNotificaPersonale));

create table ORDINE (
     DataOrdine date not null,
     IDOrdine int not null AUTO_INCREMENT,
     IDUtente int not null,
     constraint IDORDINE primary key (IDOrdine));

create table UTENTE (
     IDUtente int not null AUTO_INCREMENT,
     Email varchar(1024) not null,
     Sesso char(1) not null,
     Password varchar(1024) not null,
     Nome varchar(1024) not null,
     Cognome varchar(1024) not null,
     DataNascita date not null,
     Indirizzo varchar(1024) not null,
     CAP varchar(10) not null,
     Citta varchar(1024) not null,
     constraint IDUTENTE primary key (IDUtente));

alter table COMPRENDE add constraint FKCOM_ORD
     foreign key (IDOrdine)
     references ORDINE (IDOrdine);

alter table COMPRENDE add constraint FKCOM_EVE
     foreign key (IDEvento)
     references EVENTO (IDEvento);

alter table DESIDERA_ACQUISTARE add constraint FKDES_UTE
     foreign key (IDUtente)
     references UTENTE (IDUtente);

alter table DESIDERA_ACQUISTARE add constraint FKDES_EVE
     foreign key (IDEvento)
     references EVENTO (IDEvento);

alter table ESEGUE add constraint FKESE_ART
     foreign key (IDArtista)
     references ARTISTA (IDArtista);

alter table ESEGUE add constraint FKESE_EVE
     foreign key (IDEvento)
     references EVENTO (IDEvento);

alter table EVENTO add constraint FKTIPOLOGIA
     foreign key (IDCategoria)
     references CATEGORIA (IDCategoria);

alter table EVENTO add constraint FKPUBBLICA_E
     foreign key (IDOrganizzatore)
     references ORGANIZZATORE (IDOrganizzatore);

alter table INTERESSA add constraint FKINT_EVE
     foreign key (IDEvento)
     references EVENTO (IDEvento);

alter table INTERESSA add constraint FKINT_UTE
     foreign key (IDUtente)
     references UTENTE (IDUtente);

alter table NOTIFICA add constraint FKPRODUCE_G
     foreign key (IDOrganizzatore)
     references ORGANIZZATORE (IDOrganizzatore);

alter table NOTIFICA add constraint FKAPPARTIENE
     foreign key (IDEvento)
     references EVENTO (IDEvento);

alter table NOTIFICA add constraint FKPRODUCE_A
     foreign key (IDAmministratore)
     references AMMINISTRATORE (IDAmministratore);

alter table NOTIFICA_PERSONALE add constraint FKTIPO
     foreign key (IDNotifica)
     references NOTIFICA (IDNotifica);

alter table NOTIFICA_PERSONALE add constraint FKR
     foreign key (IDOrganizzatore)
     references ORGANIZZATORE (IDOrganizzatore);

alter table NOTIFICA_PERSONALE add constraint FKRICEVE
     foreign key (IDUtente)
     references UTENTE (IDUtente);

alter table NOTIFICA_PERSONALE add constraint FKR_1
     foreign key (IDAmministratore)
     references AMMINISTRATORE (IDAmministratore);

alter table ORDINE add constraint FKEFFETTUA
     foreign key (IDUtente)
     references UTENTE (IDUtente);


INSERT INTO AMMINISTRATORE (Email, Password, Nome, Cognome) VALUES ('alesssandrolombardini@gmail.com','alessandro','Alessandro','Lombardini');
INSERT INTO AMMINISTRATORE (Email, Password, Nome, Cognome) VALUES ('asialucchi@yahoo.it','pw','Asia','Lucchi');
INSERT INTO CATEGORIA (NomeCategoria) VALUES ('Danza');
INSERT INTO CATEGORIA (NomeCategoria) VALUES ('Teatro');
INSERT INTO CATEGORIA (NomeCategoria) VALUES ('Concerto');
INSERT INTO CATEGORIA (NomeCategoria) VALUES ('Altro');
