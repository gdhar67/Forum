# Forum
## **A basic website for _Sharing your Views_:stuck_out_tongue_winking_eye:**


### SERVER USED

- Laravel Framework
- Version 5.1.28

-----------------------------------------------------------------------------------

### OVERVIEW

- First, SignIn page is displayed in which there is a **LogIn form** and a link to **Registeration form** . 
- A user can either Register, by providing his/her details in the Register Form or directly LogIn if he/she is a Registered User.
- After the submission of either of the Forms , The Inputs are Validated and if the required details are provided correctly then the User is Redirected to the HomePage. 
- If the Inputs are not satisfied then a **Error Message** is shown regarding the error.
- After the User is Redirected to HomePage , The user can view his own posts and the various posts submitted by other Users on his wall.
- In the HomePage a search box is provided to search other users by his/her username.
- A text box is provided so that the user can post on his own wall or in other user's wall.
- The User can also view his profile details By clicking On **Profile** button provided in the HomePage.
- It Redirects the User to a Page where the user is able to submit a short description about himself and update his/her name or profile photo.
- A **Home** button is provided so that the User can go back to HomePage from anywhere.
- A **Logout** button is provided, So that the User can Logout at any instant.

-----------------------------------------------------------------------------------

### SERVER ROUTES

##### /user/login
- It takes us to the login page.
- A User can Signup if he/she doesn't have a User Account.
- If the User is a Registered User then he/she can Signin from this Page.

##### /guest/register
- registration form is displayed by using this route.

##### /guest/postregister
- SignIn is done using this route.
- The User is Authenticated and redirected to the Homepage where he can view his own posts and the post by other Users.

##### /user/postlogin
- SignIn is done using this route.
- The User is Authenticated and redirected to the Homepage where he can view his own posts and the post by other Users.

##### /user/logout
- User is Logged Out using this route.
- After Logout User is redirected to the Login Page.

##### /user/homepage
- This route is used to access the HomePage.

##### /user/profilepage
- This route is used to access the ProfilePage.

##### /user/searchresults
- This route is used to access the searchresult Page.

##### /user/postsearch
- This route is used to process the text typed in the search box.

##### /user/postSubmitPost
- The posts are submitted by this route when the user posts on his own wall.

##### /userwall/postSubmitPost
- The posts are submitted by this route when the user posts on some other user's wall.

##### /user/postuserwall
- Any other user's wall is displayed using this route.

##### /upateaccount
- The saved changes in the ProfilePage are processed by this route.

##### /userimage/{filename}
- The Profile picture is obtained by this route.

-----------------------------------------------------------------------------------


### DATABASES/TABLES 


#### Database : forum
=================================================================================
##### Table : users
##### Fields
* id
* created_at
* updated_at
* name
* username
* password
* discription
* visibility
* remember_token

=================================================================================

##### Table : posts
##### Fields
* id
* user_id
* created_at
* updated_at
* post
* post_on
* post_by
* remember_token


-----------------------------------------------------------------------------------


### BUILD INSTRUCTIONS

* Clone the repository into a local folder in your computer.
* Use `git pull` to pull the code from Github.
* Go to the forum Directory from console and use the command `php artisan serve` to start your localhost server.
* Create a database named `dbuser`.
* Run the migrations using the command `php artisan migrate`.

			
-----------------------------------------------------------------------------------

#### Enjoy the website. Cheers:smile: