## - Create migration in specific folder
 - **php artisan make:migration create_posts_table --path=/database/migrations/folder_name**

## Run migrations in the all folders
 - **php artisan migrate --path=/database/migrations/***

## Run migrations in specific folder
  - **php artisan migrate --path=/database/migrations/folder_name**

## Rollback specific folder migrations
  - **php artisan migrate:rollback --path=/database/migrations/folder_name**
 
## Rollback last one migration in specific folder
  - **php artisan migrate:rollback --step=1 --path=/database/migrations/folder_name**

## Rollback migrations in the all fodlers
  - **php artisan migrate:rollback --path=/database/migrations/***

## ------------------------------------------------------------------------------------------------
