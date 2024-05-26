# Laravel Api
Simple example of an Api built with Laravel and Sanctum auth

### How to start?
1. To start using the Api go to `https://<link>/api/documentation`
2. Go to **`Auth`** section and create a user, provide `name` and `password`
3. You'll get 3 types of access token:
    - **Admin** (allows to `get`, `create`, `update` and `delete` data)
    - **Update** (allows to `get`, `create` and `update` data)
    - **Basic** (allows to `get` data)
4. Pass `Swagger` authorization by providing token (e.g. Bearer <token>)
5. Use any of available endpoints

### Data description and data manipulation
1. There are 2 available instances:
    - **Customer** with next filelds:
        * 'id'
        * 'name'
        * 'type' ('I' - individual, 'B' - business)
        * 'email'
        * 'address'
        * 'city'
        * 'state'
        * 'postal_code' 
    - **Invoice** with next filelds:
        * 'id'
        * 'customer_id'
        * 'amount'
        * 'paid_date'
        * 'billed_date'
        * 'status' ('B' - billed, 'B' - Paid, 'V' - void)
2. `Customer` has many `Invoices`
3. DB is seeded with random data
4. Available to modify current data and add new data
