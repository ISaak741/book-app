INSERT INTO categories(name,picture) VALUES
('Anime','categories/anime.jpg'),
('Enfant','categories/enfant.jpg'),
('Histoire','categories/histoire.jpg'),
('Horeur','categories/horeur.jpg'),
('Roman','categories/roman.jpg');

TRUNCATE languages ;
INSERT INTO languages(name) VALUES
('Arabe'),
('Anglais'),
('Francais'),
('Espagnol');

INSERT INTO admins(name,password) VALUES
('admin','admin');