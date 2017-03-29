# Web-based-information-system-of-shopping-mall
This is a project for "Web Technologies" lecture. It is a shopping mall website similar to Amazon.com to manage products, employees, and customers using PHP, HTML, CSS, JavaScript, JQuery, CodeIgniter and MySQL. This website includes a sign-in system, product search system with diverse condition, shopping cart system and order management system.  

# System Requriment
### Server side (Employee side)
1. A login page for employees that establishes a logon session variable in PHP to keep track of the user. This logon session variable MUST time out - for security reasons. There are 3 types of employees: (1) administrators that can only create, modify, and delete user IDs and passwords, (2) managers that only view reports, and (3) sales managers that can add, modify, and delete, products and product categories. 
2. You are to have a set of HTML pages to allow your employees to manage your web site data. I like to call this the administrative side of a web site. You need at least the following:

* An administrative login page (for all employees) - with session variables to track them appropriately. This is to time out.
* A set of pages that allow for the management of your products/services, product categories, special sales, users, and administrators. This means you must be able to add, change, or remove any of these five types of data- or anything else that you create. This is NOT to be done by typing SQL into the form. None of the 3 types of employees are programmers and they are not to be required to know SQL.
* A set of reports so the managers in your company can view any of the data in your database. Managers can't be trusted to actually change anything, but they are to be able to view any data in any of your tables. They are also to be allowed search options. The options that are to be provided are given below. The manager is to be able to specify any, or all, of the search criteria. For example, a manager might want to see all the products in a product category that have a price between $50 and $100.
* For products: product price range, product name, product category
* For employees: by type of employee, pay range
* For special sales: product price range, product name, product category, sale start date, sale end date

3. You are to have at least four different product categories. Each product category is to contain at least four products.
4. Special sales are products that have been discounted. Your special sales table is not to contain product information details other than a numeric product ID. This table is just to contain the new information that is needed to identify a product that has a special sales price. Special sales products are discounted by some percentage. In addition, special sales have a specified start date and a specified end date.
5. Employee data is to contain at least the following data: user ID, password, first name, last name, age, and employee type. You may want other information, as well.
6. Create a WRITEUP file that describes your web site, how it works, your database (including field names, field types and sizes). Include names and descriptions of each HTML page and each PHP script.
7. Lastly, you are to use AJAX where it makes sense. AJAX can considerably improve the user's experience with your web site.

### Customer side
1. A login page for customers that establishes a logon session variable in PHP to keep track of the user. This logon session variable MUST time out - for security reasons.
2. Whatever scheme you want to come up with to allow users to order/view your products and services, it must include a shopping cart. You need to ask for enough information that you can 'send' the ordered items to the customer - so all customer address information is needed - and that the customer can pay for what they ordered (use a credit card, for instance).
3. An ability to display the shopping cart during the ordering process.
4. The ability to edit (change quantity, or remove an item), or even delete, the entire shopping cart and start over.
5. A page so customers can create their own login and profile. They also must be able to edit their profile, including their password.
6. Pages for customers to view what they have ordered from you in the past. This is to include a summary page that displays one (or two) line(s) for each prior order and when a button, or something on that line is clicked, the detail for that order is displayed.
7. Managers get new reports to see all about orders. They are to be able to retrieve orders, and summaries of product sold by date, by product category, by special sales items, by product, sorted by total quantity sold, or sorted by total sales of products . Note: A single request could provide values for all three organizing ways. For example, a manager wants the total sales for a specific product category, for a specific time frame they specify.
8. The display of special sales on the initial login page for customers, and a smaller display of appropriate special sales items on each product category, or product page. By appropriate, I mean related products - like those of the same product category.
9. keep track of what items are purchased together - like what Amazon does. When a customer puts an item in their shopping cart, display item(s) that other customers also bought in a single order (these will be items you sold on other orders from any customer.
