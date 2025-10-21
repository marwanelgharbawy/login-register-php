# Simple Login and Registration Form

Before doing anything, open XAMPP and start Apache and MySQL servers.

### Step 1: Create the database

Write the following SQL query:

```php
Create database registration;
```

Since we're going to work on that one, we need to "use" it.

```php
Use registration;
```

Or simply just select it from the left sidebar in phpMyAdmin.

### Step 2: Setup the table(s)

A table named "User" has to be defined like that:

```php
User (user_id, email, name, password, registration_date);
```

Write the following statement to create the table:

```php
create table users(
user_id int not null auto_increment,
email varchar(225) not null,
name varchar(225) not null,
password varchar(225) not null,
registration_date timestamp default current_timestamp,
PRIMARY KEY (user_id)
);
```

Notice we can't have `user` as table name since it's a reserved word in SQL. So we use backticks to avoid errors, or simply just follow the convention and name it `users`.

**Check:** Try inserting something.

```php
INSERT INTO users(email, name , password) VALUES ('test@test.com', 'test', 'testpassword');
```

