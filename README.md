# TFA7: Laravel Create, Edit and Avatar Upload Activity

A Laravel application that extends TFA6 by adding **create** and **edit** forms for **Customers** and **Users**, with server-side validation and a **profile picture (avatar) upload** feature for users. The pages keep the **Cloud Cafe** pastel pink and blue theme.

## Features

- Create Customer form with validation (`full_name` required, `email` required and valid)
- Create User form with validation (`username` required and unique, `full_name` required)
- Edit pages for customers and users that pre-fill the form with the existing record and update it on submit
- Migration that adds a nullable `avatar` column to the `users` table
- Avatar upload on the user edit form (image only, JPG/PNG, maximum 2MB)
- Display-ready 200x200 thumbnail generated with **Intervention Image**
- Thumbnail stored with `Storage::disk('public')`, and only the resulting path saved in the `avatar` column
- User Accounts listing shows each user's avatar, with a placeholder image if none was uploaded

## Database Schema

### `customers`

| Column                  | Type       | Notes       |
| ----------------------- | ---------- | ----------- |
| id                      | bigint     | Primary key |
| full_name               | string     |             |
| email                   | string     |             |
| phone                   | string     |             |
| created_at / updated_at | timestamps |             |

### `users`

| Column                  | Type       | Notes                                   |
| ----------------------- | ---------- | --------------------------------------- |
| id                      | bigint     | Primary key                             |
| username                | string     | **Unique**                              |
| full_name               | string     |                                         |
| avatar                  | string     | Nullable, stores the path only          |
| created_at / updated_at | timestamps |                                         |

The `avatar` column is added by the migration `add_avatar_to_users_table`.

## Routes

| Method | URL                      | Controller                  | Description                   |
| ------ | ------------------------ | --------------------------- | ----------------------------- |
| GET    | `/customers`             | `CustomerController@index`  | List all customers            |
| GET    | `/customers/create`      | `CustomerController@create` | Show the Create Customer form |
| POST   | `/customers`             | `CustomerController@store`  | Validate and save a customer  |
| GET    | `/customers/{id}/edit`   | `CustomerController@edit`   | Show the pre-filled edit form |
| PUT    | `/customers/{id}`        | `CustomerController@update` | Validate and update a customer|
| GET    | `/users`                 | `UserController@index`      | List all users with avatars   |
| GET    | `/users/create`          | `UserController@create`     | Show the Create User form     |
| POST   | `/users`                 | `UserController@store`      | Validate and save a user      |
| GET    | `/users/{id}/edit`       | `UserController@edit`       | Show the pre-filled edit form |
| PUT    | `/users/{id}`            | `UserController@update`     | Validate, upload avatar, update |

## Validation Rules

**Customer (create and edit)**

| Field     | Rules                     |
| --------- | ------------------------- |
| full_name | required, string, max 255 |
| email     | required, valid email     |
| phone     | required, string, max 20  |

**User (create)**

| Field     | Rules                                  |
| --------- | -------------------------------------- |
| username  | required, string, max 255, **unique**  |
| full_name | required, string, max 255              |

**User (edit)**

| Field     | Rules                                                              |
| --------- | ------------------------------------------------------------------ |
| username  | required, unique (ignores the user's own record)                   |
| full_name | required                                                           |
| avatar    | optional, must be an image (JPG/PNG), maximum 2MB (`max:2048`)     |

## Avatar Upload Flow

1. The user selects a JPG or PNG file on the edit form (`enctype="multipart/form-data"`).
2. Laravel validates that the file is an image no larger than 2MB.
3. **Intervention Image** (GD driver) creates a 200x200 cropped thumbnail.
4. The thumbnail is saved with `Storage::disk('public')` inside `storage/app/public/avatars/`.
5. Only the resulting path (for example `avatars/avatar_xxxxx.jpg`) is saved in the `avatar` column.
6. The old avatar file is deleted when a new one is uploaded.
7. The User Accounts page displays the thumbnail, or `public/images/placeholder.svg` if the user has no avatar.

## Requirements

- PHP 8.2 or higher with the **GD extension** enabled (`extension=gd` in `php.ini`)
- Composer
- MySQL (XAMPP)
- Git

## Installation

1. **Clone the repository**

   ```
   git clone https://github.com/jxninxtorre/TFA7.git
   cd TFA7
   ```

2. **Install dependencies**

   ```
   composer install
   ```

3. **Create the environment file**

   ```
   copy .env.example .env
   php artisan key:generate
   ```

4. **Create the database**
   Start **Apache** and **MySQL** in XAMPP, open `http://localhost/phpmyadmin`, and create a database named `tfa6_db`.

5. **Configure `.env`**

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tfa6_db
   DB_USERNAME=root
   DB_PASSWORD=
   SESSION_DRIVER=file
   ```

6. **Run migrations and seeders**

   ```
   php artisan migrate:fresh --seed
   ```

7. **Link the public storage folder** (required so uploaded avatars are visible)

   ```
   php artisan storage:link
   ```

8. **Start the server**

   ```
   php artisan serve
   ```

9. **Open in the browser**

   - Customers: [http://127.0.0.1:8000/customers](http://127.0.0.1:8000/customers)
   - Create Customer: [http://127.0.0.1:8000/customers/create](http://127.0.0.1:8000/customers/create)
   - Users: [http://127.0.0.1:8000/users](http://127.0.0.1:8000/users)
   - Create User: [http://127.0.0.1:8000/users/create](http://127.0.0.1:8000/users/create)

## Project Structure (key files)

```
app/
├── Http/Controllers/
│   ├── CustomerController.php
│   └── UserController.php
└── Models/
    ├── Customer.php
    └── User.php
database/
├── migrations/
│   ├── 0001_01_01_000000_create_users_table.php
│   ├── xxxx_xx_xx_create_customers_table.php
│   └── 2026_11_16_074305_add_avatar_to_users_table.php
└── seeders/
    ├── CustomerSeeder.php
    ├── UserSeeder.php
    └── DatabaseSeeder.php
public/
└── images/
    └── placeholder.svg
resources/views/
├── layouts/
│   └── cafe.blade.php
├── customers.blade.php
├── customers/
│   ├── create.blade.php
│   └──
