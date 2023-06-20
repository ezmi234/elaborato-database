-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Tue Jun 20 18:32:36 2023 
-- * LUN file: C:\Users\ezmiron.deniku\OneDrive - Alma Mater Studiorum Università di Bologna\4° Semestre\Basi di Dati\elab\elaborato_Fede_Ezmi.lun 
-- * Schema: AZIENDA_AUTOMOBILISTICA/logico-final 
-- ********************************************* 


-- Database Section
-- ________________ 

create database AZIENDA_AUTOMOBILISTICA;
use AZIENDA_AUTOMOBILISTICA;


-- Tables Section
-- _____________ 

create table ACCESSORIO (
     codiceAccessorio int not null,
     nome char(20) not null,
     costo float(20) not null,
     constraint IDACCESSORIO primary key (codiceAccessorio));

create table ACQUISTO_IN_STORE (
     codiceAcquisto int not null,
     costo float(20) not null,
     descrizione varchar(1000) not null,
     data date not null,
     codiceOfficina int not null,
     CF_Cliente char(16) not null,
     constraint IDACQUISTO_IN_STORE_ID primary key (codiceAcquisto));

create table CLIENTE (
     CF char(16) not null,
     nome char(50) not null,
     cognome char(50) not null,
     nascita date not null,
     telefono int not null,
     buonoAcquisto float(20) not null,
     constraint IDCLIENTE primary key (CF));

create table COMPRAVENDITA_AUTO (
     codiceCV int not null,
     costo float(20) not null,
     descrizione varchar(1000) not null,
     data date not null,
     tipo char not null,
     codiceOfficina int not null,
     CF_Cliente char(16) not null,
     CF_Consulente char(16) not null,
     numeroDiSerie int not null,
     constraint IDCOMPRAVENDITA_AUTO primary key (codiceCV));

create table COSULENTE (
     CF char(16) not null,
     nome char(50) not null,
     cognome char(50) not null,
     nascita date not null,
     telefono int not null,
     bonusRecensione float(20) not null,
     mediaVoto int not null,
     percentualeProvvigione float(3) not null,
     provvigioneTotale float(20) not null,
     constraint IDCOSULENTE primary key (CF));

create table INTERVENTO (
     codiceIntervento int not null,
     costo float(20) not null,
     descrizione varchar(1000) not null,
     data date not null,
     dataFine date,
     costoRicambi float(20) not null,
     costoManodopera float(20) not null,
     codiceOfficina int not null,
     CF_Cliente char(16) not null,
     numeroDiSerie int not null,
     constraint IDINTERVENTO_ID primary key (codiceIntervento));

create table MECCANICO (
     CF char(16) not null,
     nome char(50) not null,
     cognome char(50) not null,
     nascita date not null,
     telefono int not null,
     bonusRecensione float(20) not null,
     mediaVoto int not null,
     pagaOraria float(20) not null,
     totaleOreSvolte float(20) not null,
     constraint IDMECCANICO primary key (CF));

create table OFFICINA (
     codiceOfficina int not null,
     nome char(50) not null,
     sede_città char(50) not null,
     sede_via char(50) not null,
     sede_civico int not null,
     bilancioOfficina float(20) not null,
     tipo char not null,
     PRINCIPALE_ int not null,
     constraint IDOFFICINA primary key (codiceOfficina));

create table PEZZO_DI_RICAMBIO (
     codicePezzo int not null,
     nome char(50) not null,
     prezzo float(20) not null,
     modello char(50) not null,
     constraint IDPEZZO DI RICAMBIO primary key (codicePezzo));

create table COMPRENDE (
     codiceAcquisto int not null,
     codiceAccessorio int not null,
     quantità int not null,
     constraint IDCOMPRENDE primary key (codiceAcquisto, codiceAccessorio));

create table NECESSITA (
     codicePezzo int not null,
     codiceIntervento int not null,
     quantità bigint not null,
     constraint IDNECESSITA primary key (codicePezzo, codiceIntervento));

create table RECENSIONE (
     codiceRecensione int not null,
     codiceIntervento int not null,
     codiceCV int not null,
     codiceAcquisto int not null,
     data date not null,
     voto int not null,
     messaggio varchar(1000) not null,
     constraint IDRECENSIONE primary key (codiceRecensione),
     constraint FKal _ID unique (codiceIntervento),
     constraint FKal_ID unique (codiceCV),
     constraint FK al _ID unique (codiceAcquisto));

create table STIPENDIO (
     CF_Meccanico char(16) not null,
     mese int not null,
     anno int not null,
     CF_Consulente char(16) not null,
     retribuzione float(20) not null,
     codiceOfficina int not null,
     constraint IDSTIPENDIO primary key (CF_Meccanico, mese, anno),
     constraint IDSTIPENDIO_1 unique (CF_Consulente, mese, anno));

create table SVOLTO (
     CF_Meccanico char(16) not null,
     codiceIntervento int not null,
     oreDiLavoro float(10) not null,
     constraint IDSVOLTO primary key (CF_Meccanico, codiceIntervento));

create table VEICOLO (
     numeroDiSerie int not null,
     targa char(7) not null,
     modello char(50) not null,
     anno int not null,
     colore char(50) not null,
     constraint IDVEICOLO primary key (numeroDiSerie));


-- Constraints Section
-- ___________________ 

-- Not implemented
-- alter table ACQUISTO_IN_STORE add constraint IDACQUISTO_IN_STORE_CHK
--     check(exists(select * from COMPRENDE
--                  where COMPRENDE.codiceAcquisto = codiceAcquisto)); 

alter table ACQUISTO_IN_STORE add constraint FK offre 
     foreign key (codiceOfficina)
     references OFFICINA (codiceOfficina);

alter table ACQUISTO_IN_STORE add constraint FKrichiede
     foreign key (CF_Cliente)
     references CLIENTE (CF);

alter table COMPRAVENDITA_AUTO add constraint FKoffre 
     foreign key (codiceOfficina)
     references OFFICINA (codiceOfficina);

alter table COMPRAVENDITA_AUTO add constraint FK richiede
     foreign key (CF_Cliente)
     references CLIENTE (CF);

alter table COMPRAVENDITA_AUTO add constraint FKfinalizzata
     foreign key (CF_Consulente)
     references COSULENTE (CF);

alter table COMPRAVENDITA_AUTO add constraint FKdel
     foreign key (numeroDiSerie)
     references VEICOLO (numeroDiSerie);

-- Not implemented
-- alter table INTERVENTO add constraint IDINTERVENTO_CHK
--     check(exists(select * from SVOLTO
--                  where SVOLTO.codiceIntervento = codiceIntervento)); 

alter table INTERVENTO add constraint FKoffre
     foreign key (codiceOfficina)
     references OFFICINA (codiceOfficina);

alter table INTERVENTO add constraint FKrichiede 
     foreign key (CF_Cliente)
     references CLIENTE (CF);

alter table INTERVENTO add constraint FKsu
     foreign key (numeroDiSerie)
     references VEICOLO (numeroDiSerie);

alter table OFFICINA add constraint FKgestisce
     foreign key (PRINCIPALE_)
     references OFFICINA (codiceOfficina);

alter table COMPRENDE add constraint FKcom_ACC
     foreign key (codiceAccessorio)
     references ACCESSORIO (codiceAccessorio);

alter table COMPRENDE add constraint FKcom_ACQ
     foreign key (codiceAcquisto)
     references ACQUISTO_IN_STORE (codiceAcquisto);

alter table NECESSITA add constraint FKnec_INT
     foreign key (codiceIntervento)
     references INTERVENTO (codiceIntervento);

alter table NECESSITA add constraint FKnec_PEZ
     foreign key (codicePezzo)
     references PEZZO_DI_RICAMBIO (codicePezzo);

alter table RECENSIONE add constraint FKal _FK
     foreign key (codiceIntervento)
     references INTERVENTO (codiceIntervento);

alter table RECENSIONE add constraint FKal_FK
     foreign key (codiceCV)
     references COMPRAVENDITA_AUTO (codiceCV);

alter table RECENSIONE add constraint FK al _FK
     foreign key (codiceAcquisto)
     references ACQUISTO_IN_STORE (codiceAcquisto);

alter table STIPENDIO add constraint FKpaga
     foreign key (codiceOfficina)
     references OFFICINA (codiceOfficina);

alter table STIPENDIO add constraint FKpercepisce
     foreign key (CF_Meccanico)
     references MECCANICO (CF);

alter table STIPENDIO add constraint FKpercepisce 
     foreign key (CF_Consulente)
     references COSULENTE (CF);

alter table SVOLTO add constraint FKsvo_INT
     foreign key (codiceIntervento)
     references INTERVENTO (codiceIntervento);

alter table SVOLTO add constraint FKsvo_MEC
     foreign key (CF_Meccanico)
     references MECCANICO (CF);


-- Index Section
-- _____________ 

