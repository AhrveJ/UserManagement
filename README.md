# User Management — Edit Users (Laravel)

## Structure

```
app/
  Http/Controllers/UserManagementController.php 
  Support/MockUsers.php 
resources/views/
  layouts/app.blade.php
  components/
    navbar.blade.php          <x-navbar/>
    sidebar.blade.php         <x-sidebar/>
    search-bar.blade.php      <x-search-bar/>
    filters.blade.php         <x-filters/>
    user-table.blade.php      <x-user-table/>
    pagination.blade.php      <x-pagination/>
    user-modal.blade.php      <x-user-modal/>        (Add/Edit form)
    delete-modal.blade.php    <x-delete-modal/>
    toast.blade.php           <x-toast/>
  pages/user-management.blade.php                   # assembles the components above
public/
  css/app.css                                        # all page styling
  js/app.js                                           # search/filter/sort/pagination/CRUD logic
routes/web.php                                        # GET / and /user-management
```

## Requirements
```
Before running the project, make sure you have:

PHP
Composer
Laravel
A web browser

A database is not required for the current version.
```

## Setup
Clone the project and navigate to the project directory:

To run it: 

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Then open http://127.0.0.1:8000

## Not connected in the Database

```
It doesnt need to connect to the database as of now since i only use static data it will be found in app/Support/MockUsers.php
```

## Approach

```
The application was built using Laravel Blade components to keep the UI modular and easier to maintain.

The page is divided into reusable components:

Navbar
Sidebar
Search bar
Filters
User table
Pagination
Add/Edit user modal
Delete confirmation modal
Toast notifications

Client-side interactions are handled in:

public/js/app.js

This includes:

User search
Filtering
Sorting
Pagination
Adding users
Editing users
Deleting users
UI updates and notifications

The styling is maintained in:

public/css/app.css

Bootstrap 5 utility classes are also used where appropriate for responsive layouts and UI components.

```

## Assumptions

The application does not require a database for the current implementation.
User data can be represented using static/mock data.
CRUD operations are handled on the client side for demonstration purposes.

## UI/UX changes

```
Responsive layout for different screen sizes.
Responsive navigation and sidebar.
Horizontal scrolling for the user table on smaller screens.
Search functionality for quickly finding users.
Filters for narrowing down user records.
Sortable table columns.
Pagination to avoid displaying too many records at once.
Modal-based Add/Edit user forms.
Delete confirmation modal to prevent accidental deletion.
```