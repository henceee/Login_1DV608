##Goals

Assignment 2 aims to let you work with real tools, requirements, tests and release a web application on a public server.

After completing the assignment the student should have...
 * ...worked with tools and servers
 * ...read and successfully implemented requirements with PHP
 * ...tested those requirements carefully.
 * ...created an application with functionality similar to the example application.
 
## Rules

Examiner sets the degree using the following:
 * Minimum requirements must all be fulfilled
 * Requirement fulfillment
 * Code quality
 * MVC implementation


###The set of minimum requirements for approved is:
* Solution has been submitted before the deadline
* Code should be available on a public git repository. 
* The application must be deployed on a public web server, the server must be available to the examiner for the rest of the course.
* The Assignment is done individually! You are not allowed to copy or take solutions from others.
* No code is copied from others, student has worked alone
* No external code except the code given in task, no libraries are used
* No javascript is used
* HTML follows [web standards](https://validator.w3.org/)
* Application can be tested with the automated test application.
* Code has one single page (index.php) 
* Your solution will/may be shared with other students after the deadline.

###Requirement fulfillment
 * All mandatory test-cases MUST be successful 
 * The more testcases that are fullfilled, the better
 * Test-cases should be manually and automatically testable (using the test application).
 * The application is well tested even outside of the explicit tests
 * Application works as the example implementation

###Code Quality
 * Code MUST be object oriented.
 * Code looks good
  * Good Understandable identifier naming   
  * [Code is well commented and selfexplanatory](https://www.youtube.com/watch?v=d2nqNtzLEIg)
  * Avoid arrays when dealing with something that is a class.
  * Code follows proper indentation
 * Errors are handled well (assert and exceptions)
 * Code Repository is presented well on git (eg. README.md )
 * Dependencies are explicit or encapsulated
  * No string dependencies, uses strategies to avoid them
 * Avoid complexity

###MVC implementation
 * Code is separated into Model View Controller components
  * No dependencies from Model to Controller or View
  * No dependencies from View to Controller 
  * Only use $_GET, $_POST, $_COOKIES etc in View-classes
  * No output generation in Model or Controller
  * No View responsibilities in Model or Controller
  * No Model responsibilities in View or Controller
  * No Controller responsibilities in View or Model
