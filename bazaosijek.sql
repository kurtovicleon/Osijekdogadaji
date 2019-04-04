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



create table slika(
sifra int not null primary key auto_increment,
dogadaj int not null,
opis varchar(255)
);

alter table dogadaj add foreign key (korisnik) references korisnik(sifra);

alter table slika add foreign key (dogadaj) references dogadaj(sifra);

insert into korisnik(ime,kontaktbroj,email) VALUES
('Caffe bar Osijek',38595645987,'caffeos@osijek.hr'),
('Restoran Konoba',38596487613,'konoba@osijek.hr'),
('Muzej mursa',38598493829,'mursaos@osijek.hr');


insert into dogadaj(korisnik,naziv,mjesto,vrijeme,cijena,tekst,kategorija,datum) values 
(1,'Party godine','Osijek','19:30:10','50',' Dođite na najbolji party godine','Zabava','2019-05-02'),
(2,'Privatni koncert','Tvrđa','17:20:00','20','Dobar koncert za vas i vaše najdraže','Glazba','2019-05-03'),
(3,'Nema đabe ni u stare babe','Tvrđa','17:20:00','bespla','dfasf','Glazba','2019-05-04');


