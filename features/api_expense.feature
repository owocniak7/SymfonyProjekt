Funkcjonalność: API do zarządzania wydatkami

  Scenariusz: Logowanie poprawnymi danymi
    Zakładając że jestem zarejestrowanym użytkownikiem
    Kiedy wysyłam POST na "/api/login_check" z body:
      """
      {
        "email": "test@123.com",
        "password": "test123"
      }
      """
    Wtedy status powinien być 200
    I odpowiedź powinna zawierać "token"

  Scenariusz: Pobieranie listy wydatków
    Zakładając że jestem zalogowany jako "test@123.com" z hasłem "test@123"
    Kiedy wysyłam GET na "/api/expenses"
    Wtedy status powinien być 200

  Scenariusz: Dodanie nowego wydatku
    Zakładając że jestem zalogowany jako "test@123.com" z hasłem "test@123"
    Kiedy wysyłam POST na "/api/expenses" z body:
      """
      {
        "amount": 75.50,
        "category": "Transport",
        "date": "2024-12-10"
      }
      """
    Wtedy status powinien być 201
    I odpowiedź powinna zawierać "id"

  Scenariusz: Nieprawidłowe dane przy dodawaniu wydatku
    Zakładając że jestem zalogowany jako "test@123.com" z hasłem "test@123"
    Kiedy wysyłam POST na "/api/expenses" z body:
      """
      {
        "amount": "",
        "category": "",
        "date": "invalid-date"
      }
      """
    Wtedy status powinien być 400

  Scenariusz: Brak autoryzacji (bez tokena)
    Kiedy wysyłam GET na "/api/expenses"
    Wtedy status powinien być 401

  Scenariusz: Dodanie wydatku z minimalną kwotą
    Zakładając że jestem zalogowany jako "test@123.com" z hasłem "test@123"
    Kiedy wysyłam POST na "/api/expenses" z body:
      """
      {
        "amount": 0.01,
        "category": "Różne",
        "date": "2024-12-11"
      }
      """
    Wtedy status powinien być 201

  Scenariusz: Dodanie wydatku z dużą kwotą
    Zakładając że jestem zalogowany jako "test@123.com" z hasłem "test@123"
    Kiedy wysyłam POST na "/api/expenses" z body:
      """
      {
        "amount": 1000000,
        "category": "Inwestycje",
        "date": "2024-12-12"
      }
      """
    Wtedy status powinien być 201

  Scenariusz: Filtrowanie wydatków po kategorii
    Zakładając że jestem zalogowany jako "test@123.com" z hasłem "test@123"
    Kiedy wysyłam GET na "/api/expenses?category=Jedzenie"
    Wtedy status powinien być 200

  Scenariusz: Dodanie wydatku z przyszłą datą
    Zakładając że jestem zalogowany jako "test@123.com" z hasłem "test@123"
    Kiedy wysyłam POST na "/api/expenses" z body:
      """
      {
        "amount": 15,
        "category": "Planowane",
        "date": "2030-01-01"
      }
      """
    Wtedy status powinien być 201

  Scenariusz: Użycie nieprawidłowej metody HTTP
    Zakładając że jestem zalogowany jako "test@123.com" z hasłem "test@123"
    Kiedy wysyłam PUT na "/api/expenses"
    Wtedy status powinien być 405
