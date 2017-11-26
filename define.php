<?php
// ====================== PATHS ===========================
define('DS', '/');
define('ROOT_PATH', dirname(__FILE__)); // Định nghĩa đường dẫn đến thư mục gốc
define('LIBRARY_PATH', ROOT_PATH . DS . 'libs'); // Định nghĩa đường dẫn đến thư mục thư viện
define('PUBLIC_PATH', ROOT_PATH . DS . 'public'); // Định nghĩa đường dẫn đến thư mục public
define('APPLICATION_PATH', ROOT_PATH . DS . 'application'); // Định nghĩa đường dẫn đến thư mục application
define('MODULE_PATH', APPLICATION_PATH . DS . 'module'); // Định nghĩa đường dẫn đến thư mục module
define('TEMPLATE_PATH', PUBLIC_PATH . DS . 'template'); // Định nghĩa đường dẫn đến thư mục template

define('ROOT_URL', '/do-an/deadline');
define('APPLICATION_URL', ROOT_URL .DS. 'application');
define('PUBLIC_URL', ROOT_URL .DS. 'public');
define('TEMPLATE_URL', PUBLIC_URL .DS. 'template');

define('DEFAULT_MODULE', 'admin');
define('DEFAULT_CONTROLLER', 'user');
define('DEFAULT_ACTION', 'profile');

// ====================== DATABASE ===========================
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'deadline');
define('DB_TABLE', '');

define('DB_TBUSER', 'user');
define('DB_TBCATEGORY', 'category');
define('DB_TBCOURSE', 'course');
define('DB_TBVIDEO', 'video');
// ====================== TIME LOGIN ===========================
define('TIME_LOGIN', 3600);

// ====================== GET VIDEO ===========================
define('API_KEY', 'AIzaSyDQFQIkqeOJhVxrieG1Xaj3P_Q_5OUkbRg');
define('API_URL', 'https://www.googleapis.com/youtube/v3/');

define('FILE_VIDEO_TXT', 'data/videos.txt');
define('FILE_VIDEO_JSON', 'data/videos.json');

define('FILE_PLAYLIST_TXT', 'data/playlists.txt');
define('FILE_PLAYLIST_JSON', 'data/playlists.json');





