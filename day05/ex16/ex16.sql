SELECT COUNT(id_film)
FROM member_history
WHERE MONTH(`date`) = 12
AND DAY(`date`) = 24
OR (`date` >= '2006-10-30' AND `date` <= '2007-07-27');
