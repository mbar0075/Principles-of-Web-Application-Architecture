# CIS1054- PART 2 – Dynamic Web Application

## Contents
1. css folder contains the .css files<br />
2. images folder contains the images which will be used in the website<br />
3. js folder contains the .js files<br /> 
4. web folder contains the .php, .html, .htaccess and .ini files<br />
5. restaurantinfo.sql.gz zipped file contains the database files<br /><br />

## Setup
1. Download XAMPP, this can be facilitated through the following link: https://www.apachefriends.org/download.html <br />
2. Follow the XAMPP Setup Wizard<br />
3. Once downloaded, locate the htdocs folder, and create a directory "ProjectPart2". Paste the contents of the repository inside, apart from the 'restaurantinfo.sql.gz'<br />
4. Open the XAMPP terminal and switch on the Apache and MySQL components <br />
5. Click on the MySQL Admin tab, and create a new database named 'restaurantinfo'<br />
6. Go to the 'restaurantinfo' and click on the import tab, choose the zipped file and import the 'restaurantinfo.sql.gz' file<br />
7. Go to Server: 127.0.01 and click the User Accounts tab, from there you need to add a new user account with the following information, and click Go:<br /> 
    * Username: RestaurantUser
    * Host name: local
    * Password: JerMatIsa
    * Retype Password: JerMatIsa<br />
8. Go to Server: 127.0.01, click on the User Accounts tab and select the 'RestaurantUser' privilege and click on edit privileges<br />
9. Click the database tab in the 'RestaurantUser' privilege and from the drop down select the 'restaurantinfo' database and if prompted click Go <br />
10. Click the global tab in the 'RestaurantUser' privilege and select the Data checkbox and click Go<br />
11. Open XAMPP terminal, and click on the Apache config and select httpd.conf, find 'LoadModule expires_module modules/mod_expires.so' and make sure that it is uncommented <br />
12. Download Composer from the following link: https://getcomposer.org/download/ and click on Composer-Setup.exe to download<br />
13. Follow the Composer Setup Wizard (if you are prompted for the php path from the drop down select xampp/php/php.exe)<br />
14. Go to CMD and go into the directory: '\xampp\htdocs\ProjectPart2\web' and type: 'composer require "twig/twig:^3.0' in the terminal



## Authors
Matthias Bartolo 0436103L<br />
Jerome Agius 0353803L<br />
Isaac Muscat 0265203L<br />
