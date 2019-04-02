SELECT g.id_genre, g.name AS 'name_genre', d.id_distrib, d.name AS 'name_distrib', f.title AS 'title_film'
FROM film AS f
LEFT JOIN genre AS g ON f.id_genre = g.id_genre
LEFT JOIN distrib AS d ON d.id_distrib = f.id_distrib
WHERE g.id_genre IN (4,5,6,7,8);
