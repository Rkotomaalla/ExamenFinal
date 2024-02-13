
-- mysql -u root -p

create database examfinal_s3;

create table examfinal_s3_admin (
    id_admin int primary key AUTO_INCREMENT,
    nom varchar (100) not null,
    email varchar (100) not null,
    date_naiss date not null,
    genre char(1) not null,
    mdp varchar (10) not null -- 10 caracteres maximum
);

create table examfinal_s3_user (
    id_user int primary key AUTO_INCREMENT,
    nom varchar (100) not null,
    email varchar (100) not null,
    date_naiss date not null,
    genre char(1) not null,
    mdp varchar (10) not null -- 10 caracteres maximum
);

create table examfinal_s3_the (
    id int primary key AUTO_INCREMENT,
    nom varchar (100) not null,
    occupation double, -- espace occupé par un pied
    rendement double -- rendement de feuilles par mois (kg)
);


create table examfinal_s3_parcelle (
    num_parcelle int primary key AUTO_INCREMENT, -- numero du parcelle
    surface double, -- surface en hectare
    id_the int references examfinal_s3_the (id) -- id du variété the planté
);

create table examfinal_s3_cueilleur (
    id int primary key AUTO_INCREMENT,
    nom varchar (100) not null,
    genre char (1) not null, -- m || f
    date_naiss date
);

create table examfinal_s3_categ_dep (
    id int primary key AUTO_INCREMENT,
    nom varchar (100) not null
);


create table examfinal_s3_salaire (
    id int primary key AUTO_INCREMENT,
    dt date not null,
    prix double not null
);