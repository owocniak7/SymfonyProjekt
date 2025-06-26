# Expense Tracker API

## Requirements
- PHP 8.1+
- Composer
- PostgreSQL

## Installation
```bash
composer install
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load
symfony server:start
```

## Test user
- **Email**: test@123.com
- **Password**: test123

## API endpoints
| Method | URL            | Description       |
|--------|----------------|-------------------|
| POST   | /api/login     | Log in (JWT)      |
| GET    | /api/expenses  | List expenses     |
| POST   | /api/expenses  | Add new expense   |

## Postman
Importuj plik `postman_collection.json` i użyj danych testowtych
