-- Creation de la base
CREATE DATABASE IF NOT EXISTS retro_invader;

-- creation de l'utilisateur root_retro_invader et attribution de tous les droits sur database retro_invader
GRANT ALL PRIVILEGES ON retro_invader.* TO 'root_retro_invader'@'localhost' IDENTIFIED BY '****************';

-- creation de la table messages dans retro_invader
CREATE TABLE retro_invader.contact_messages (
id int not null auto_increment,
name varchar(80) not null,
message text not null,
email varchar(320) null,
dateOfCeation datetime default CURRENT_TIMESTAMP,
state varchar(255) not null,
primary key (id));

-- insertion d'une ou plusieurs données dans la table retro_invader
insert into retro_invader.contact_messages(name,message,email,state)  values ('polux','i want add a game but i dont find the good form arg','polux@babygames.gol','Terminer');
insert into retro_invader.contact_messages(name,message,email,state)  values ('babar','add my game please','babar@babygames.gol','Traitement en cour');
