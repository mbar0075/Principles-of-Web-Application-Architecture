<?php
/* 

When it comes to setting up an HTTP server with PHP support one can make use of XAMPP which is simple to install and make use of. To install XAMPP one can go to this 
link: https://www.apachefriends.org/download.html and select the appropriate download option. Upon concluding the download one can simply follow the on-screen wizard 
instructions to complete the XAMPP installation. 

XAMPP provides a multitude of facilities which one may opt to make use of such as an Apache server to be able to host your web pages and access them through a browser. 
PHP support can be installed separately although it comes packaged with XAMPP. 

Although XAMPP comes packaged with a working Apache server that supports PHP, a freshly downloaded Apache server would require setting up to facilitate the use of PHP. 
In this case the user would first need to have access to an Apache server and then install PHP functionality on it. This can simply be done by going to the terminal 
and typing "sudo apt install php". Then, the required modules would also need to be installed. This can also be done through a simple command, this being 
"sudo apt install libapache2-mod-php". Finally, the user would have to enable the module using the command "sudo a2enmod php" followed by a server restart. 

After the installation and setup has been completed, the user would now be able to pass .php documents to the server which would be identified by it as PHP code and 
thus, the server would pass it to the PHP interpreter which would execute all the relative PHP code and then the page would be loaded and shown to the user.  
The user would need to place the PHP files in the XAMPP/htdocs directory. 

XAMPP also comes equipped with MySQL, which is a relational database system. This feature in conjunction with the Apache web server and PHP scripting language, offers 
data storage for web services.

XAMPP also come packaged with Mercury, which is a local mail server, which allows sending of emails from the server. However, we opted not to use Mercury and instead 
we utilised PHPMailer.

*/

?>
