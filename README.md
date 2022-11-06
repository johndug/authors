# Author Project

### Setup:

git clone the branch to your local machine:
git clone git@github.com:johndug/authors.git

configure the .env
create a mysql database called authors

navigate in your terminal to the directory for the new project and enter the following to load the database and seed the demo data

php artisan migrate --seed

If you want more author and books increase the $number in the DatabaseSeeder

Create a local server by entering the following

php artisan serve

In the browser navigate to the new project server

### Book

It will take you to the /books page where it lists the Book titles, year of release, dedscription and author\s

Create a new book by clicking create and enter title, year, description and author\s. Ifd entered wrong an error will appear above the form

Click edit below any one of the books already added and edit the title, year, description and author\s. If entered wrong an error will appear above the form

Click delete it will warn you of this deletion and on confirmation it will remove the book

### Author

Navigate the the /authors where is lists the authors with books that they have written

Create a new author by clicking create and enter name and surname. If entered wrong an error will appear above the form

Click edit below any one of the authors already added and edit the name and surname. If entered wrong an error will appear above the form

Click delete it will warn you of this deletion and on confirmation it will remove the author

### API

GET /api/getBooks: gets all books saved in the database

GET /api/getBooks?author_id={id}: get all books written by the author ID

POST /api/createAuthor { name: {name}, surname: {surname}}: create a new author and returns the author entry

GET /api/getAuthor?id={id}: retrieves author details (I couldn't get the books written working)
