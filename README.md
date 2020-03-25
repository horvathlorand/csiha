Csiha tesztfeladat
Be kell lepni eloszor abba a mappaba, ahova lecloneoztuk a projektet

composer install
npm install

jogosultságok:

sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache

Ha ezzel kesz vagyunk, akkor

nano .env ---> szerkeszteni kell az adatbazis elerest, hogy hozza tudjon ferni
php artisan config:cache
php artisan migrate
