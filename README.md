# Contacts

### Techstack
1. **HTML/CSS/Tailwind (v.3.0.24):** create and style the website. 
2. **Javascript:** open/close modals and display file names onto the page. 
3. **PHP (v.8.1.3):** handle errors/validation/conditionals, connect to MySQL database, upload files, and retrieve/send information. 
4. **MySQL (v.15.1):** store each contact’s information: id, name, date, and image.

### Run Project Locally
1. Start XAMPP servers 
2. Go to http://localhost/phpmyadmin/index.php
3. Create new database named “contacts”
4. Create new table named “contacts” with the following 4 columns
    1. id: INT(11), auto-increment
    2. name: varchar(255)
    3. date: date
    4. image: varchar(255)
5. Run on http://localhost/contacts/index.php

To edit the Tailwind styling, install Tailwind CLI (https://tailwindcss.com/docs/installation) 