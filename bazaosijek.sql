
drop database if exists dogadajiosijek;
create database dogadajiosijek character set utf8 collate utf8_croatian_ci;

use dogadajiosijek;
create table korisnik(
sifra int not null primary key auto_increment,
ime varchar(50) not null,
kontaktbroj int not null,
email varchar(50) not null
);


create table dogadaj(
sifra int not null primary key auto_increment,
korisnik int not null,
naziv varchar (50),
mjesto varchar(50),
vrijeme time,
cijena varchar(50),
tekst varchar(250),
kategorija varchar(50),
datum date
);


alter table dogadaj add foreign key (korisnik) references korisnik(sifra);


insert into korisnik(ime,kontaktbroj,email) VALUES
('Caffe bar Osijek',38595645987,'caffeos@osijek.hr'),
('Restoran Konoba',38596487613,'konoba@osijek.hr'),
('Muzej mursa',38598493829,'mursaos@osijek.hr'),
('Studentski centar',1234578951326,'studentski@centar.hr'),
('Azil Osijek',1548796534123,'azil@osijek.hr'),
('Glazba Osijek',1235468791235,'Glazba@osijek.hr');


insert into dogadaj(korisnik,naziv,mjesto,vrijeme,cijena,tekst,kategorija,datum) values 
(1,'Party godine','Osijek','19:30:10','50',' Dođite na najbolji party godine','Zabava','2019-05-02'),
(2,'Privatni koncert','Tvrđa','17:20:00','20','Dobar koncert za vas i vaše najdraže','Glazba','2019-05-03'),
(3,'Pijanka do zore','Tvrđa','17:20:00','bespla','Doši i popi coca colu','Glazba','2019-05-04'),
(4,'Dc party','Kampus','20:00:00','besplatno','Donesi svoju cugu i zabavi se u rasplesanu društvo i DJ-a','Zabava','2019-04-10'),
(5,'Šetnja pasa','Azil Osijek','09:00:00','free ručak','Dođite i prošetajte naše ljubimce obalom drave ili kroz oblišnje šume. Za kraj druženja tu je grah.','Humanitarna','2019-11-04'),
(6,'Koncert amatera','Kino Europa','21:00:00','50kn','Osječki amaterski bendovi napstupaju po prvi puta samo za vas','Glazba','2019-12-04');


