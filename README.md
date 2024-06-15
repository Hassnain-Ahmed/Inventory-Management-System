# Inventory Management System

This project is an Inventory Management System developed using PHP, HTML, CSS, JavaScript, jQuery, AJAX, Bootstrap, Font Awesome, and Google Fonts. The system allows administrators to manage products, categories, suppliers, and inventory levels efficiently.

## Features

- **Product Management**: Add, update, delete, and view product details.
- **Category Management**: Manage product categories and subcategories.
- **Supplier Management**: Maintain supplier information and manage supplier relationships.
- **Inventory Tracking**: Monitor stock levels, receive and fulfill orders, and manage returns.
- **User Authentication**: Secure login and registration system for administrators.
- **Responsive Design**: Optimized for desktop and mobile devices using Bootstrap.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript, jQuery, AJAX
  - **Libraries**: Bootstrap, Font Awesome, Google Fonts
- **Backend**: PHP
- **Database**: MySQL


### File Structure

```
Inventory-Management-System/
├── DB/
│   ├── Database data.sql
│
├── NewProject/
│   ├── index.php
│   ├── manage_categories.php
│   ├── manage_suppliers.php
│   ├── dashboard.php
│   ├── add_product.php
│   ├── edit_product.php
│   ├── delete_product.php
│   ├── ...
|
├── resources/
│   ├── Jquery/
│   ├── aos-master/
│   ├── fontawesome-free-6.2.1-web/fontawesome-free-6.2.1-web/
│   ├── src/
├── README.md
│
└── ...
```

## Setup Instructions

Follow these steps to set up the Inventory Management System on your local machine.

### Prerequisites

- **Web Server**: Apache or any web server of your choice.
- **PHP**: Version 7.0 or above.
- **MySQL**: Version 5.7 or above.
- **Browser**: A modern web browser like Chrome, Firefox, or Edge.

### Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/Hassnain-Ahmed/Inventory-Management-System.git
   cd inventory-management-system
   ```

2. **Move the project to your web server directory**:
   Move the project files to your web server's root directory (e.g., `htdocs` for XAMPP, `www` for WAMP, or `public_html` for a live server).


3. **Import the database**:
   Import the provided SQL file (`Database data.sql`) located in the `DB` folder into your newly created database:
   ```bash
   mysql -u yourusername -p inventory_db < /path/to/DB/inventory_db.sql
   ```

4. **Start the web server**:
   Ensure your web server and MySQL server are running.

5. **Access the application**:
   - Open your web browser and go to `http://localhost/inventory-management-system/newproject/index.php`
   - *Credentials:* `username:username` and `password:password`

## Usage

- **Admin Dashboard**: Log in as an admin to manage products, categories, suppliers, and inventory.

## License

This project is licensed under the MIT License. See the `LICENSE` file for more details.

## Acknowledgements

- Thanks to Bootstrap, Font Awesome, Google Fonts, and other open-source libraries used in this project.

### Screenshots

- ![ss 1](https://i.imgur.com/PKJvTex.png)
- ![ss 2](https://i.imgur.com/NJKwLSn.png)
- ![ss 3](https://i.imgur.com/Mv3o8Eh.png)
- ![ss 4](https://i.imgur.com/KiYJDWX.png)
- ![ss 5](https://i.imgur.com/jtwZkS4.png)
