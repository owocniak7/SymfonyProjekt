# Expense Tracker API

## Wymagania
- PHP 8.1+
- Composer
- PostgreSQL

## Instalacja
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
| Method | URL            | Opis       |
|--------|----------------|-------------------|
| POST   | /api/login     | Logowanie (JWT)   |
| GET    | /api/expenses  | Listowanie        |
| POST   | /api/expenses  | Dodawanie wydatku |

## Postman
Importuj plik `postman_collection.json` i użyj danych testowtych
