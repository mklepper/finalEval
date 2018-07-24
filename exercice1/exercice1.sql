SELECT users.firstname, users.lastname, articles.*
FROM users
LEFT JOIN articles ON users.id = articles.id_user
where articles.id = 10