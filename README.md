# PHP Book Register Project

A simple **PHP Book Register** project with CRUD operations and search functionality.

## Features
- Add a new book
- Edit book details
- Delete a book
- View all books
- Search books by name

## Database Setup

Use the following SQL script to create the database and table:

```sql
USE kirjarekisteri;

CREATE TABLE kirjat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nimi VARCHAR(255) NOT NULL,
    kirjailija VARCHAR(255) NOT NULL,
    julkaisuvuosi INT NOT NULL,
    kuvaus TEXT
);

```

## How to Use
1. Create the database using the script above.
2. Update `config.php` with your database credentials.
3. Place the files in your web server directory.
4. Open the project in your browser: `http://localhost/book-register/index.php`.

---
Simple and easy to use!
