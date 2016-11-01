# restaurant-software
A fully restaurant oriented secure software that can handle your restaurant with ease.. Get it for free...

# Restaurant Software

Contributors: amitpomu
Version: 1.1


# Description ==

Restaurant Software is highly useful for small and mid level restaurants. There are various features that allows you to operate your company with ease and save the records. This software includes 4 level of users ( Admin, Manager, Staff/Cashier, Cook ). All these roles has different authority. This software also includes multiple tills functionality that will help to take orders from multiple tills. You can save employee details and generate salary from this software and save the records. This software is very easy to use.

# How To Install ==

1. Download the software
2. Create a database named "restaurant" OR as you wish
 * Incase of your custom database name. There is a connection.php in root folder. Change the database name from "restaurant" to your custom database name.
3. Import the restaurant.sql file located in database folder to your database in phpmyadmin
4. Initially the foldername will be restaurant-software. You can change it to your wish.
5. Once you change the folder name. Go to .htaccess file if it is hidden press ctrl+h and you can find .htaccess file. Change the url path name "restaurant-software" to your custom name in line no. 10 ( Make sure do not use "space" instead use "-" or "_" instead of space for your path )
6. Move the folder to localhost directory folder if haven't. Then you can run your system.

# Initial Setup ==

* Username => Password

admin 	=> admin, 
manager => manager, 
staff 	=> staff, 
cook 	=> cook

* Till no.
choose from 1 to 5. 

# Must Do After Installation ==
* To sucure your encryption and decryption and change your secret_key, go to inc/function.php in line 125 and line 126. change the secret key from "Amit Subba Pomu" to your custom. It is very important to customize secret key. Make sure you create new admin user once you change the secret key and delete rest of the users because once you change the secret key the default users do not work.   

# Info ==
* only admin create and delete users/products/
* You can delete default users and create new.
* Only admin, manager and cook can modify stock
* Only admin and manager can void the order

# Customization ==

1. Restaurant title
2. Restaurant home page image
3. To customize number of tills of your choice. Go to login.php in root folder. In login form chave max="5" to max="your custom value" and in line 57. change $till <= 5 to $till <= your custom value
