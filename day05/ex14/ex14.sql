SELECT floor_number AS 'floor', nb_seats AS 'seats'
FROM cinema
GROUP BY floor
ORDER BY seats DESC;
