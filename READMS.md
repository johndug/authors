Author Project

Setup:
git clone the branch to your local machine:
git clone git@github.com:johndug/authors.git

configure the .env
create a mysql database called authors

navigate in your terminal to the directory for the new project and enter the following to load the database and seed the demo data

php artisan migrate --seed

Create a local server by entering the following

php artisan serve

In the browser navigate to the new project server

It will take you to the /books page where it lists the Book titles, year of release, dedscription and author/s

Create a new
