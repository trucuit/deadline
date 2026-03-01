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
define('APPLICATION_URL', ROOT_URL . DS . 'application');
define('PUBLIC_URL', ROOT_URL . DS . 'public');
define('TEMPLATE_URL', PUBLIC_URL . DS . 'template');

define('DEFAULT_MODULE', 'default');
define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_ACTION', 'index');
// ====================== DATABASE ===========================
// IMPORTANT: Set these values via environment variables or a local config file
// DO NOT commit real credentials to version control
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('DB_NAME', getenv('DB_NAME') ?: 'deadline');
define('DB_TABLE', '');


// ====================== TABLE ===========================
define('DB_TBUSER', 'user');
define('DB_TBCATEGORY', 'category');
define('DB_TBCOURSE', 'course');
define('DB_TBVIDEO', 'video');
define('DB_TBAUTHOR', 'author');
define('DB_TBTAG', 'tag');
define('DB_TBDESCRIPTION', 'description');

// ====================== TIME LOGIN ===========================
define('TIME_LOGIN', 3600);

// ====================== GET VIDEO ===========================
// IMPORTANT: Set API_KEY via environment variable
define('API_KEY', getenv('YOUTUBE_API_KEY') ?: 'YOUR_API_KEY_HERE');
define('API_URL', 'https://www.googleapis.com/youtube/v3/');

define('FILE_VIDEO_TXT', 'data/videos.txt');
define('FILE_VIDEO_JSON', 'data/videos.json');

define('FILE_PLAYLIST_TXT', 'data/playlists.txt');
define('FILE_PLAYLIST_JSON', 'data/playlists.json');

// ====================== DOMAIN ===========================

define('DOMAIN', getenv('DOMAIN') ?: 'http://localhost');
