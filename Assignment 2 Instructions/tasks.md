
## Task 1. Explore requirements, example application, and test-cases.

The requirements of the application is written below and consists of three use-cases.

[Use Cases](https://github.com/dntoll/1DV608/blob/master/Assignments/Assignment_2/Assignment2_Use_Cases.md "Assignment 2 use-cases")

For each of the use-cases there are a number of test-cases. The test cases are given in the following format. 
 * Input, steps to do. In some cases another test-case, if so do the input steps of that test-case.
 * Output, things you should observe or not observe if the test-case is successful.
 * Image, an image of the result after Input steps are done.
 
Testing of the application requires two different browsers, and a tool to manipulate cookies, like "firebug".

[Mandatory Test Cases](https://github.com/dntoll/1DV608/blob/master/Assignments/Assignment_2/Assignment2_Test_Cases_Mandatory.md "Mandatory Test-Cases"), These are the requirements everyones solutions must fullfill all of.

[Extra Test Cases for higher grades](https://github.com/dntoll/1DV608/blob/master/Assignments/Assignment_2/Assignment2_Extra_Test_cases.md "Extra Test-Cases for higher grade") These are the extra test-cases for extra credit.

[Test Application](http://csquiz.lnu.se:81/ "Application To test requirements on"). This is an example solution for assignment 2. It fulfills all the test-cases above.

[Automated tests Application](http://csquiz.lnu.se:82/ "Application To test your on"). This is an automated acceptance test system to speed up the testing process. 

## Task 2. Copy the code and get your servers set up.

Now its time to implement the requirements using use-cases and test-cases.


### Get the startup code
The assignment will be tested using a Automated unit test application. To allow this we will first copy the interface application for that project on GitHub. 

 * Download https://github.com/dntoll/Login_1DV608/archive/master.zip (We do NOT fork since, forks will be public)
 * On your GitHub account, create a new repository
 * Clone that repository 
 * Add the content of the zip file to your repository, commit and push to origin master
  * Unzip the files into your repository 
  * git add -A .
  * git commit -m "first commit"
  * git push origin master
 * Browse your files on github You should now have a similar content as https://github.com/dntoll/Login_1DV608/

### Get the startup code running locally

You are going to develop locally and make "releases" to a public server. This means you need to setup both a local server and a public server.

 * Startup your local server and configure it to use your copy of Login_1DV608
 * browse to local server(For example http://localhost:8080/ ) and check that you see the correct output with a header of "Assignment 2".

### Make a release to a public web server

In order to hand in this project you must have a public web-server that is online 24-7. There are many possible solutions
 * you could host yourself if you have a public IP-adress and wants to keep a server up and running
 * you could buy hosting from a web-hotel
 * you could use a free hosting such as http://www.000webhost.com/ (PHP 5.2)

Test your release
 * Transfer your files to the server, for example by FTP, SFTP, or git.
 * Browse to the server and make sure you see the output of the PHP-scripts
 * Go to http://csquiz.lnu.se:82/ and enter your server adress with your user-id
  * press Check
  * you should get a "Estimated score on assignment: 5%." and a LOT of errors

###Task 3. Implement the requirements.

 * while (you have requirements to implement)
  * Implement a requirement
  * Test locally using the manual test-cases
  * Commit and push to repository
 * Release code to server
  * Go to http://csquiz.lnu.se:82/ and enter your server adress with your user-id
  * Fix problems locally, then release to server and retest

## Assignment submission

 * Commit and push to GitHub
 * Upload latest version on public server
 * Run http://csquiz.lnu.se:82/ against your public server
 * Fill in the submission form here: http://goo.gl/forms/5RUWgjr4kd
