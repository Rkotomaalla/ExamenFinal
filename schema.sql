create table examfinal_s3_admin (
    id_admin int primary key AUTO_INCREMENT,
    nom varchar (100) not null,
    email varchar (100) not null,
    date_naiss date not null,
    genre char(1) not null,
    mdp varchar (10) not null 
);


create table examfinal_s3_user (
    id_user int primary key AUTO_INCREMENT,
    nom varchar (100) not null,
    email varchar (100) not null,
    date_naiss date not null,
    genre char(1) not null,
    mdp varchar (10) not null 
);

create table examfinal_s3_the (
    id int primary key AUTO_INCREMENT,
    nom varchar (100) not null,
    occupation double, 
    rendement double, 
    prix_vente double
);


    create view examfinal_s3_v_recolt_mois as select p.num_parcelle num_parcelle, (p.surface * 10000) surf_m2, ((p.surface * 10000 * t.rendement)/t.occupation) rendement from examfinal_s3_parcelle as p join examfinal_s3_the as t on p.id_the = t.id;
  
create table examfinal_s3_parcelle (
    num_parcelle int primary key AUTO_INCREMENT,
    surface double, 
    id_the int references examfinal_s3_the (id) 
);

create table examfinal_s3_cueilleur (
    id int primary key AUTO_INCREMENT, 
    nom varchar (100) not null,
    genre char (1) not null, 
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
    
    create view examfinal_s3_v_salaire_parmois as select max(dt) dt, sum(prix) ttlsalaire from examfinal_s3_salaire group by month(dt), year(dt);


create table examfinal_s3_cueillette (
    id int primary key AUTO_INCREMENT,
    dt date not null,
    id_cueilleur int references examfinal_s3_cueilleur (id),
    id_parcelle int references examfinal_s3_parcelle (num_parcelle),
    poids double not null
);


        create view examfinal_s3_v_cueillette_moisparcelle as select id_parcelle, max(dt) dt, sum(poids) poids from examfinal_s3_cueillette group by id_parcelle, month(dt), year(dt);

        create view examfinal_s3_v_info_parcelle as select ct.id_parcelle id_parcelle, ct.dt date, rt.rendement recolte, ct.poids cueillette, (rt.rendement - ct.poids) reste from examfinal_s3_v_cueillette_moisparcelle as ct join examfinal_s3_v_recolt_mois as rt on ct.id_parcelle = rt.num_parcelle;

        create view examfinal_s3_v_info_parmois as select max(date) date, sum(recolte) recolte, sum(cueillette) cueillette, sum(reste) reste from examfinal_s3_v_info_parcelle group by month(date), year(date);


create table examfinal_s3_depanse (
    id int primary key AUTO_INCREMENT,
    dt date not null,
    id_dep_categ int references examfinal_s3_categ_dep (id),
    montant double not null
); 

CREATE TABLE examfinal_s3_regeneration (
    id INT PRIMARY KEY AUTO_INCREMENT,
    mois INT NOT NULL
);

create table examfinal_s3_min_journalier (
    id int primary key AUTO_INCREMENT,
    dt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    min double not null,
    id_cueilleur int references examfinal_s3_cueilleur (id)
);


    create view examfinal_s3_v_dep_parmois as select max(dt) dt, sum(montant) ttl_montant from examfinal_s3_depanse group by month(dt), year(dt);
    create view examfinal_s3_v_allinfo as 
    SELECT 
        im.date,
        im.recolte,
        im.cueillette,
        im.reste,
        COALESCE(dpm.ttl_montant, 0) AS ttl_montant,
        COALESCE(sm.ttlsalaire, 0) AS ttlsalaire
    FROM 
        examfinal_s3_v_info_parmois AS im
    LEFT JOIN 
        examfinal_s3_v_dep_parmois AS dpm ON MONTH(im.date) = MONTH(dpm.dt)
    LEFT JOIN 
        examfinal_s3_v_salaire_parmois AS sm ON MONTH(sm.dt) = MONTH(im.date)
    GROUP BY 
        MONTH(im.date), YEAR(im.date);

    
    create view examfinal_s3_v_cout_revient as select date, (ttl_montant + ttlsalaire) dep, cueillette, ((ttl_montant + ttlsalaire) / cueillette) cout_rev
    from examfinal_s3_v_allinfo as info;

create table examfinal_s3_bonus_mallus (
    bonus double,
    mallus double
);

insert into examfinal_s3_admin values(null,'vallinah','vallinah@gmail.com','2000-12-21','F','val');
insert into examfinal_s3_user values(null,'kiady','kiady@gmail.com','2000-12-21','M','ki');