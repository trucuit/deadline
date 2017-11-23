<?php
// ====================== PATHS ===========================
define('DS', '/');
define('ROOT_PATH', dirname(__FILE__)); // Định nghĩa đường dẫn đến thư mục gốc
define('LIBRARY_PATH', ROOT_PATH . DS . 'libs' ); // Định nghĩa đường dẫn đến thư mục thư viện
define('PUBLIC_PATH', ROOT_PATH . DS . 'public' ); // Định nghĩa đường dẫn đến thư mục public
define('APPLICATION_PATH', ROOT_PATH . DS . 'application' ); // Định nghĩa đường dẫn đến thư mục application
define('MODULE_PATH', APPLICATION_PATH .DS. 'module'); // Định nghĩa đường dẫn đến thư mục module
define('TEMPLATE_PATH', PUBLIC_PATH .DS. 'template' ); // Định nghĩa đường dẫn đến thư mục template

define('ROOT_URL', '/do-an/deadline');
define('APPLICATION_URL', ROOT_URL .DS. 'application');
define('PUBLIC_URL', ROOT_URL .DS. 'public');
define('TEMPLATE_URL', PUBLIC_URL .DS. 'template');

define('DEFAULT_MODULE', 'admin');
define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_ACTION', 'index');

// ====================== DATABASE ===========================
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'deadline');
define('DB_TABLE', '');

define('DB_TBUSER', 'user');
define('DB_TBCATEGORY', 'category');
define('DB_TBCOURSE', 'course');
// ====================== TIME LOGIN ===========================
define('TIME_LOGIN',3600);


