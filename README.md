# Principles of Web Application Architecture

# Author
**Matthias Bartolo 0436103L**

## Preview:
<p align='center'>
  <img src="https://github.com/mbar0075/Principles-of-Web-Application-Architecture/assets/103250564/0f770c60-c867-4f6f-af7b-f0e29d34ea7d" style="display: block; margin: 0 auto; width: 75%; height: auto;"></br>
  <img src="https://github.com/mbar0075/Principles-of-Web-Application-Architecture/assets/103250564/fa31e0a5-54e9-4c2e-9149-f89326613c06"  style="display: block; margin: 0 auto; width: 34%; height: auto;">
  <img src="https://github.com/mbar0075/Principles-of-Web-Application-Architecture/assets/103250564/f79c4cbe-c7d5-4923-8eb9-0afa29ae5577"  style="display: block; margin: 0 auto; width: 40%; height: auto;">
  <img src="https://github.com/mbar0075/Principles-of-Web-Application-Architecture/assets/103250564/51a13e68-ccd2-4cd0-825c-82ed6ed45208" style="display: block; margin: 0 auto; width: 40%; height: auto;">
</p>

## Description of Task:
During the project setup and preliminary tasks, a collaborative environment was established to facilitate effective teamwork. The focus was on setting up an HTTP server with PHP support, specifically using the Apache web server. This choice was made to ensure compatibility and to adhere to good web development principles. By utilizing Apache as the chosen web server and adhering to good web development principles, the project aimed to create a solid foundation for subsequent tasks and ensure a robust and efficient web application.

### Part 1 - SETUP AND PRELIMINARY TASKS 
To set up an HTTP server with PHP support, the following process and technologies were involved. Firstly, Apache web server software was installed and configured as the chosen server for hosting the project. This included configuring Apache to enable PHP support, ensuring that PHP scripts could be executed on the server. The setup also involved configuring server settings and permissions to ensure proper functionality and security.

As part of the project, a simple script called "serverdt.php" was developed. This script was responsible for retrieving the current date and time on the server and returning it to the client. It provided a basic demonstration of server-side processing and data retrieval.

```php
<?php
// Starting a session
session_start();
// Getting and storing current date and time
$_SESSION['time'] = date('d/m/Y h:i:s a', time());
// printing the contents of the data variable on screen
echo $_SESSION['time'];
?>
```

Another script called "lastvisit.php" was created to handle user sessions. This script stored the date and time of the first page load for each user session. On subsequent interactions, the script calculated the time elapsed since the first visit and returned a message to the client indicating how long ago the user first accessed the page. This functionality was achieved by utilizing session variables to store and track the initial visit timestamp for each user.

To handle client requests that contained parameters, a script named "processrequest.php" was implemented. This script was designed to capture request parameters from both GET and POST requests. It extracted parameters such as username and age and stored them in session variables. This allowed the data to be persisted and accessible throughout the user's session.

Additionally, a script called "readsession.php" was developed to read and display the session variables stored by "processrequest.php". This script echoed the session variables back to the client in a neat format. It also provided an explanation of how sessions work in PHP and how PHP scripts can differentiate between different user sessions.<br>

### Part 2 - SETUP AND PRELIMINARY TASKS 

In accordance with the principles and best practices discussed throughout the course, the second part of the project involved building a dynamic website for the restaurant **Los Pollos Hermanos** (from TV-Series **Breaking Bad**). The website aimed to provide a range of features and functionalities to enhance the user experience.

The website included a section dedicated to providing generic information about the restaurant, such as its address and opening hours. This information allowed users to quickly access essential details about the establishment.

Another section of the website focused on introducing the individuals responsible for running the restaurant. This feature aimed to create a personal connection with the visitors by showcasing the people behind the scenes.

To facilitate communication between users and the restaurant, a comprehensive contact page was developed. This page offered various options, including the ability to book a table, send queries, or file complaints. It provided a convenient way for users to interact with the restaurant and express their needs or concerns.

An essential component of the website was the inclusion of an up-to-date menu, featuring a list of dishes currently served at Los Pollos Hermanos. The menu section allowed visitors to explore the culinary offerings and get a sense of the restaurant's cuisine.

For each item listed in the menu, a separate page provided a detailed description. Users could access this page to learn more about specific dishes, including ingredients, preparation methods, and accompanying details.

To enhance user engagement and customization, a feature was implemented that allowed users to add individual dishes to a personalized "favorites" list. This functionality was accessible directly from the dish details page, enabling users to curate their preferred selections.

The website also included a dedicated page specifically designed to display the marked dishes from the favorites list. Users could access this page to view the list of selected dishes, along with their respective details. Furthermore, users had the option to remove dishes from the list or send the entire list to an email address of their choice.

To enable seamless updates and modifications to the menu content, a MySQL database was utilized. The menu page and the detailed item pages were dynamically generated based on the structured data stored in the database. This approach provided flexibility for non-technical users to independently manage and modify the website's content.

Overall, the project aimed to create an engaging and user-friendly website for Los Pollos Hermanos, incorporating essential restaurant information, interactive features, and dynamic menu functionality supported by a MySQL database.

## Deliverables:
The repository includes Two directories for each Task of the Web Assignment as well as assignment documentation:<br />
