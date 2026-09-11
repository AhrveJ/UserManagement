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

## Setup

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
