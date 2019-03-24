drop database if exists dogadajiosijek;
create database dogadajiosijek character set utf8 collate utf8_croatian_ci;

use dogadajiosijek;


create table korisnik(
idkorisnika int not null primary key auto_increment,
ime varchar(50) not null,
adresa varchar(50) not null,
mjesto varchar(50) not null,
kontaktbroj int not null,
email varchar(50) not null
);
create table datum(
sifra int not null primary key auto_increment,
dan date
);

create table dogadaj(
sifra int not null primary key auto_increment,
korisnik int not null,
datum int not null,
mjesto varchar(50),
vrijeme time,
cijena decimal(18,2),
tekst text not null,
kategorija varchar(50)
);



create table slika(
sifra int not null primary key auto_increment,
dogadaj int not null,
opis varchar(255)
);

alter table dogadaj add foreign key (korisnik) references korisnik(idkorisnika);
alter table dogadaj add foreign key (datum) references datum(sifra);
alter table slika add foreign key (dogadaj) references dogadaj(sifra);

insert into korisnik(ime,adresa,mjesto,kontaktbroj,email) VALUES
('Caffe bar Osijek','Radićeva 10','Osijek',38595645987,'caffeos@osijek.hr'),
('Restoran Konoba','Županijska 15','Osijek',38596487613,'konoba@osijek.hr'),
('Muzej mursa','Europska avenija 16','Osijek',38598493829,'mursaos@osijek.hr');
insert into datum(dan) VALUES
('2019-05-02'),
('2019-05-03'),
('2019-05-04'),
('2019-05-04'),
('2019-05-05');

insert into dogadaj(korisnik,datum,mjesto,vrijeme,cijena,tekst,kategorija) values 
(1,1,'Osijek','19:30:10',1,'Dođite na najbolji party godine','Zabava'),
(2,2,'Tvrđa','17:20:00',2,'Dobar koncert za vas i vaše najdraže','Glazba'),
(2,2,'Tvrđa','17:20:00',2,'dfasf','Glazba');


