**Instructions:**

1. Clone repository.
2. Install composer:
`composer install`
3. Create a new database.
4. Open `Database.php` file and edit 'username' and 'password' values:
`'username' => 'your_username',
'password' => 'your_password'`
3. Run project:
`php -S localhost:8000`

**Description:**

There are four routes - '/' uses one with GET method and one with POST. It uses main controller - ApplicationController
methods show() and store(). Other route '/deals' uses one with GET method and one with POST. This route also uses 
ApplicationController, but methods deals() and offer(). 
Show() method returns index.php view, in which is the main form with fillable fields - email and amount. 
Store() method inserts filled form fields in database. But before inserting data, the amount is checked - if it's bigger 
than 5000, in table column "partner" value will be saved as "A", if it's equal or smaller than 5000, column "partner" 
value will be saved as "B". After data insertion, form is sent to either Partner A or Partner B, depending on amount.
Method deals() returns deals.php view with list of clients, who have value "ask" in table column "status". Next to each 
client's information is button "Offer". When button is clicked, method "offer" is called, which updates table column 
"status" to "offer" for clicked client. When status is changed to "offer", an email is sent to client.

**Used Libraries:**

1. FastRoute,
2. Medoo,
3. PHPMailer.



