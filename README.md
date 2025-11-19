Pàgina web -> exam1.brandoncendrassos.cat
Com engegar els contenidors locals amb docker?

- Primer hem de estar al root del nostre projecte.
  pwd = project root

- Aquesta comanda engega el servidor PHP.
  docker run -d --name exam1_server --network exam1 -p 8080:80 -v $(pwd):/var/www/html baalvi/gimcana:latest

- Aquesta comanda engega el servidor mysql, ens permet tenir una base de dades.
  docker run -d --name exam1_mysql --network exam1 -p 3306:3306 -e MYSQL_DATABASE=exam1 -e MYSQL_USER=admin -e MYSQL_PASSWORD=password -e MYSQL_ROOT_PASSWORD=password mysql:latest

- Aquesta comanda engega el phpmyadmin, amb aixó podem gestionar la nostre base de dades en un entorn més bónic.
  docker run -d --name exam1_phpmyadmin --network exam1 -e PMA_HOST=exam1_mysql -e PMA_USER=admin -e PMA_PASSWORD=password -p 8081:80 phpmyadmin:latest

- ()OPCIONAL Serveix per poder fer servir la base de dades dins del terminal.
  docker exec -it exam1_mysql mysql -uadmin -ppassword
