# Simple Login and Registration Form

Before doing anything, open XAMPP and start Apache and MySQL servers.

### Step 1: Create the database

Write the following SQL query:

```php
CREATE DATABASE registration;
```

Or manually create a database named "registration" using phpMyAdmin.

Since we're going to work on that one, we need to "use" it.

Select it from the left sidebar in phpMyAdmin.

Note: It's not case sensitive.

### Step 2: Setup the table(s)

A table named `users` has to be defined with those columns:

```php
users (user_id, email, name, password, registration_date);
```

Write the following statement to create the table:

```php
CREATE TABLE users(
    user_id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(225) NOT NULL,
    name VARCHAR(225) NOT NULL,
    password VARCHAR(225) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id)
);
```

Note: We can't have `user` as table name since it's a reserved word in SQL. So, we use backticks to avoid errors, or simply just follow the convention and name it `users`.

**Check:** Try inserting something.

```php
INSERT INTO users(email, name , password) VALUES ('test@test.com', 'test', 'testpassword');
```

### Step 3: Verify the insertion

Go to the `users` table and check if the data is there.

### Step 4: Create the project folder

Create a folder named `login_registration` inside `htdocs` directory of XAMPP installation. For example, `C:\xampp\htdocs\login_registration`.

### Step 5: Create the necessary files

The project should have the following files:

- **An HTML file** in the client side that will submit data to the server side.
- **A PHP script** in the server side that will handle the registration logic.

**Optional files:**

- **A CSS file** for styling the HTML form.
- **A JavaScript file** for client-side validation and for interactive features.

### Step 6: Run the project

Open your web browser and navigate to `http://localhost/login_registration/` to see the login and registration form in action. 

The code in this repository provides a basic implementation of the functionality described above. It has two HTML files with only one JS file and one PHP script for the both of them.

For both HTML files, the form data is validated first by the `validation.js` script. If the data is valid, it's submitted to `form.php` for processing.

The `form.php` connects to the database, gets the submitted data using the `$_POST` global array, and performs the necessary operations, such as insertion for registration, or verification for login.