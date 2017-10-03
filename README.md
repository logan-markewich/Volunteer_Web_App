

clone recursively to get PHPMailer

git clone --recursive URL

How to run this application

1.	Create your usual c9 workspace, using the type php-apache.

2.	Drag all source code file into your workspace
3.	click on RUN button
4. 	A web-link will be created, click on it

DATABASE: our application does not need this part, as we will be using database server of UofS

Just for your reference if you need to import a .sql file into c9 workspace:

1.	When your page starts up, at the bottom you will see a bash shell tab. Go there.
2.	Enter: phpmyadmin-ctl install.
3.	The above installs phpmyadmin, the slick easy way to set up a database.
4.	When the installation is complete, it will give you a link to use phpmyadmin, and a login id. There is 	no password. 
5.	Click on the link and log in.
6.	Now you are in phpmyadmin. Along the top, select the tab "DATABASES". 
7.	You will go to a Databases page. Under the box "Create Database", enter "Products". In the Collation drop-down, select latin1_swedish_ci. (mysql was developed in sweden).
8.	Then press the CREATE button.
9.	Once it is created, select the new Products database from the list along the left.
10.	Along the top, you will see various tabs. Select IMPORT. You will find the usual file upload button. Select the Products.sql file, ensure the format is SQL and press the GO button at the bottom.
11.	Use the DOOR icon, next tot he HOUSE icon on the left hand column to exit phpmyadmin.
12.	Go back to your cloud9 workspace.
13.	In the BASH shell, enter the command: mysql-ctl cli
14.	Enter SHOW DATABASES;
15.	You should see Products there.
16.	Enter USE Products;
17.	Enter SELECT * FROM Products;
18.	You should see a listing of the database.
