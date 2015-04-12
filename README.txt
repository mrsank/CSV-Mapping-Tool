CSV Mapping tool Documentation
==============================

1. Installation
----------------
Please download XAMPP / WAMPP / LAMP suites as per the user convinience and locate the folder excersise into the web root folder (www for wamp/lamp, htdocs for XAMPP).


2. Database installation
-------------------------
In the document root of excersise folder you will be able to see a folder called database. Inside the database folder you will see 2 database dumps located. Following are the details:

a. order.sql - Database dump for the order database.
b. order_data.sql - Database dump for the order database with the sample data.

Please make a new database naming 'order` (as per the application) or any other name and import the necessery dump file from the database folder to build the database.


3. Setting database configuration
---------------------------------
The database configuration can be set and altered from the /excersise/application/config/database.php. Inside following are the parameters which you needed to edit to establish the connection with the application and database:

$db['default']['hostname'] = 'localhost';	// Provide hostname (Commenly localhost if on same machine)
$db['default']['username'] = '';		// Provide username of the database
$db['default']['password'] = '';		// Provide password of the database
$db['default']['database'] = '';		// Provide database name which is using


4. Controller file
------------------
The controller file or validation file can be located in the /excersise/application/controllers folder. In this application there's only a single file used which is main.php. The file can be found in the location specefied and can reviewed the code from there.


5. Model file
--------------
The model file or the database file can be located in the /excersise/application/models folder. In this application there's only a single file used which is main_model.php. The file can be found in the location specefied and can reviewed the code from there.


6. View file
-------------
The view files or the user interface files can be located in the /excersise/application/views folder. In this application the view files which are used can be found in folder named main in the location which has been specefied above. The files can be found in the location specefied and can reviewed the code from there.


7. Documentation files
----------------------

The documentation files can be found in the folder named Documentation which is in the main folder. Inside the folder, the ER Diagram and the Database Diagram can be found inside the folder named Diagrams and the SQL codes for the application can be found insde the SQL Codes folder.