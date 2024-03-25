-- a. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur :

-- SELECT nom_film AS titre, date_sortie, DATE_FORMAT(SEC_TO_TIME(duree * 60), "%H:%i") AS duree, p.nom AS nom_realisateur FROM film
-- INNER JOIN realisateur r ON r.id_realisateur = film.id_realisateur
-- INNER JOIN personne p ON p.id_personne = r.id_personne





-- b. Liste des films dont la durée excède 2h15 classés par durée (du + long au + court) :

-- SELECT nom_film, DATE_FORMAT(SEC_TO_TIME(duree * 60), "%H:%i") AS duree FROM film
-- WHERE TIMEDIFF(DATE_FORMAT(SEC_TO_TIME(duree * 60), "%H:%i"), "02:15") > "00:00"
-- ORDER BY duree DESC





-- c. Liste des films d’un réalisateur (en précisant l’année de sortie) 

-- SELECT nom_film, p.nom AS nom_realisateur, date_sortie FROM film, realisateur r, personne p
-- WHERE film.id_realisateur = r.id_realisateur
-- AND r.id_personne = p.id_personne
-- AND p.nom = "Cameron"





-- d. Nombre de films par genre (classés dans l’ordre décroissant)

-- SELECT nom_genre, COUNT(*) AS nbFilms FROM genre, filmotheque, film
-- WHERE genre.id_genre = filmotheque.id_genre
-- AND filmotheque.id_film = film.id_film
-- GROUP BY nom_genre
-- ORDER BY nbFilms DESC





-- e. Nombre de films par réalisateur (classés dans l’ordre décroissant) :

-- SELECT p.nom AS nom_realisateur, COUNT(*) AS nbFilms FROM film, realisateur r, personne p
-- WHERE film.id_realisateur = r.id_realisateur
-- AND r.id_personne = p.id_personne
-- GROUP BY p.nom
-- ORDER BY nbFilms DESC 





-- f. Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe :

-- SELECT nom_film, nom, prenom, sexe FROM film, casting, acteur, personne p
-- WHERE film.id_film = casting.id_film
-- AND casting.id_acteur = acteur.id_acteur
-- AND acteur.id_personne = p.id_personne
-- AND film.id_film = 4





-- g. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de sortie (du film le plus récent au plus ancien)

-- SELECT p.nom AS nom_acteur, nom_role, date_sortie FROM acteur, film, role, personne p, casting c
-- WHERE acteur.id_personne = p.id_personne
-- AND acteur.id_acteur = c.id_acteur
-- AND c.id_film = film.id_film
-- AND c.id_role = role.id_role
-- AND p.nom = "MacLachlan"
-- ORDER BY date_sortie DESC





-- h. Liste des personnes qui sont à la fois acteurs et réalisateurs :

-- SELECT nom FROM personne p, acteur a, realisateur r
-- WHERE p.id_personne = a.id_personne
-- AND r.id_personne = p.id_personne
-- AND r.id_personne = a.id_personne





-- i. Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien)

-- SELECT nom_film, date_sortie FROM  film
-- WHERE DATEDIFF(NOW(), date_sortie) < 5 * 365.2425
-- ORDER BY date_sortie DESC 





-- j. Nombre d’hommes et de femmes parmi les acteurs

-- SELECT sexe, COUNT(*) FROM acteur a, personne p
-- WHERE p.id_personne = a.id_personne
-- GROUP BY sexe





-- k. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)

-- SELECT nom, prenom, date_naissance FROM acteur a, personne p
-- WHERE a.id_personne = p.id_personne
-- AND DATEDIFF(NOW(), date_naissance) > 50*365.2425





-- l. Acteurs ayant joué dans 3 films ou plus :

-- SELECT nom, prenom, COUNT(*) AS nbFilms FROM acteur a, personne p, casting c
-- WHERE a.id_personne = p.id_personne
-- AND c.id_acteur = a.id_acteur
-- GROUP BY a.id_acteur
-- HAVING nbFilms > 3