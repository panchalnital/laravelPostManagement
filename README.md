# Create a simple Laravel application for managing posts. using Laravel v8.83.27 (PHP v8.2.12) system
Create a simple Laravel application for managing posts.- 

1. Authentication: Users should be able to register, login, and logout.
2. CRUD operations for managing posts:
     Create a new post
     Read posts
     Update a post
     Delete a post
3. Form validation for creating and updating posts.
4. Unit tests for the CRUD operations.
5. Implement role-based access control (e.g., admin and regular user roles).
6. Implement pagination for the list of posts.


## Install
```
- git clone https://github.com/panchalnital/laravelPostManagement.git
``` 
- laravel : clone the contents of the folder to the public folder of Apache2 (or another web server xampp copy in htdocs folder).
- Database: Run the SQL code in the databasefile/laravelpostmanagement file & create your database with it.
View 
 * Please execute the "npm install" && "npm run dev" commands to build your assets.
```
    node modules install 
	npm install
	npm run dev


    php artisan migrate:fresh --seed
    
    php artisan serve
```

Open your browser in http://127.0.0.1:8000/

## Functions
This is a small, symbolic project for a possible data security practice.
- Login
- Register
- Logout
- add Post
- list


# admin Login 

Open your browser in http://127.0.0.1:8000/admin/login

# admin Login 
![Alt text](public/projectsimage/adminlogin.PNG?raw=true "admin Login")

# admin count 
![Alt text](public/projectsimage/admincount.PNG?raw=true "admin count")

# admin post managmenst page
![Alt text](public/projectsimage/adminpostmanagement.PNG?raw=true "admin post managmenst page")

# admin post Approve and Rejects
![Alt text](public/projectsimage/adminappoverejects.PNG?raw=true "admin post Approve and Rejects")

# admin post view
![Alt text](public/projectsimage/adminpostview.PNG?raw=true "admin post view")

# User 

Open your browser in http://127.0.0.1:8000/

# User Landing Page admin approved post only view 
![Alt text](public/projectsimage/userpostview.PNG?raw=true "User Landing Page admin approved post only view")


# User Register
![Alt text](public/projectsimage/userRegisation.PNG?raw=true "User Register")

# User Dasboard
![Alt text](public/projectsimage/userDasboard.PNG?raw=true "User Dasboard")

# User Add new Post
![Alt text](public/projectsimage/useraddpost.PNG?raw=true "User Add new Post")

# User Update post 
![Alt text](public/projectsimage/uaseEditpost.PNG?raw=true "User Update post ")


# User view Post
![Alt text](public/projectsimage/userviewpost.PNG?raw=true "User view Post")


