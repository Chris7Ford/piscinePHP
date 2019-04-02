SELECT COUNT(id_sub) AS 'nb_susc', AVG(price) AS 'av_susc', SUM(MOD(duration_sub, 42)) AS ft
FROM subscription;
