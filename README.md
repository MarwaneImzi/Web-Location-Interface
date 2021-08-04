# Web-Location-Interface
 Web application with server side scripting on a full scale webserver for recording and finding Students locations.<br>
 This is a University Assessment Coursework which received a 70% mark.

## Requirments
1) A database storing locations and details of students. a. For each student, a first name and surname must be uniquely stored in the SQL database. 
18/11/20194b. For each location, the database must store the new location and the date and time at which it was recorded. Old locations and timestamps should not be removed from the database. 

2) In the root folder of your RDE website, there must be a page called ‘location.php’ OR ‘location.aspx’ which must accept GET and POST requests. GET requests to this web page must return the most recent location of the student in question. It must not return HTML as a result of a GET or POST request. POST requests to this page URL must allow a student’s location to be updated. On receiving a valid POST, your website must update the database record for that student. If the student does not exist in the database, they must be added. Note that PUT requests need not be supported. 

4) In the root folder of your RDE website, there must be a single index page called ‘index.php’ or ‘default.aspx’ from which the following human-readable pages (which you must also create) can be accessed:<br><br>A page which<br>
   1) shows the current locations of all student 
   2) allows a user to change the location of a student 
   3) allows a user to edit the l details of a student 
   4) allows a user to choose a student and list their locations for the last 24 hours 
   5) allows the user to select from a list of all locations used by people and show a list of the people currently in the selected location 


5) All data entry in your web pages must be validated to prevent the user entering invalid values. 

## Development tools
 You may use either PHP or ASP.NET to implement your website. You may use javascript in your web pages. You may use the jQuery library if you wish, but you may not use any other  third-party libraries (including Bootstrap) or controls other than those provided in the standard University installation of Visual Studio and RDE. You may develop your web site in any environment you choose, **but it must be deployed in your RDE web space and must use your RDE database**. All assessment will be based only on this installation and its execution on a laboratory machine. You must make sure that your web pages can be correctly displayed on different browsers (e.g Internet Explorer or Google Chrome).

Note that the presentation of your web pages does not carry very many marks. While you are free to style your pages how you wish, you are advised to use your limited time on  ensuring your web site’s functionality and robustness. 
 
 ## Database files
 Your web application must store data in a database about the staff whose locations it is tracking. You must use your RDE SQL Server instance to store the database. At the  very least, this database must store the user name, first name, surname, locations and times of update for each student. You may find it worthwhile to store other information as well. 
