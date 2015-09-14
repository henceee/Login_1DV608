##Requirement specification 0.3.e 2015
Editor: Daniel Toll


##Secure Authentication component for the web.

###Supplementary specification
System Quality Requirements
 * The system should respond to input in an acceptable timeframe.
 * The system should be user-friendly
 * System provides helpful error messages
 * System avoids unnecessary input
 * The system should be secure
 * The system should follow web standards.

Security Considerations
 * SQL injections
 * Javascript injections
 * Password handling
 * Session hijacking


#UC1 Authenticate user
##Main scenario
 1. Starts when a user wants to authenticate.
 2. System asks for username, password, and if system should save the user credentials
 3. User provides username and password
 4. System authenticates the user and presents that authentication succeeded

## Alternate Scenarios
 * 3a. User wants the system to keep user credentials for easier login.
   * 1. The system authenticates the user and presents that the authentication succeeded and that the user credentials was saved.
 * 4a. User could not be authenticated
   1. System presents an error message
   2. Step 2 in main scenario


#UC2 Logging out an authenticated user
##Preconditions
A user is authenticated. Ex. UC1, UC3
##Main scenario
 1. Starts when a user no longer wants to be logged in
 2. The system present a logout choice
 3. User tells the system he wants to log out.
 4. The system logs the user out and presents a feedback message

#UC3 Authentication with saved credentials
##Precondition
UC1. 3a   User wants the system to keep user credentials for easier login.
## Main scenario
 1. Starts when a user wants to authenticate with saved credentials
 2. System authenticated the user and presents that the authentication succeeded and that it happened with saved credentials.

##Alternate Scenarios
 * 2a. The user could not be authenticated (to old credentials > 30 days) (Wrong credentials), Manipulated credentials
  1. System presents error message
  2. Step 2 in UC1.


