<?php

//error_reporting(0);
if (!defined('ENVOIRNMENT')) define('ENVOIRNMENT', 'live'); // environmment local,live
if (!defined('AUTH_TOKEN_LBL')) define('AUTH_TOKEN_LBL', 'oauth_token');
if (!defined('DB_SERVER')) define('DB_SERVER', 'localhost');
if (!defined('DB_SERVER_USERNAME')) define('DB_SERVER_USERNAME', 'root');
if (!defined('DB_SERVER_PASSWORD')) define('DB_SERVER_PASSWORD', '');
if (!defined('DB_DATABASE')) define('DB_DATABASE', 'varshani_products');
if (!defined('USE_PCONNECT')) define('USE_PCONNECT', 'false');
if (!defined('STORE_SESSIONS')) define('STORE_SESSIONS', 'mysql');
if (!defined('ROOT_DIR')) define("ROOT_DIR", $_SERVER["DOCUMENT_ROOT"] . '/propertyapp/');

if (!defined('LOCAL_DB_SERVER')) define('LOCAL_DB_SERVER', 'localhost');
if (!defined('LOCAL_DB_SERVER_USERNAME')) define('LOCAL_DB_SERVER_USERNAME', 'root');
if (!defined('LOCAL_DB_SERVER_PASSWORD')) define('LOCAL_DB_SERVER_PASSWORD', '');
if (!defined('LOCAL_DB_DATABASE')) define('LOCAL_DB_DATABASE', 'varshani_products');
if (!defined('LOCAL_USE_PCONNECT')) define('LOCAL_USE_PCONNECT', 'false');
if (!defined('LOCAL_STORE_SESSIONS')) define('LOCAL_STORE_SESSIONS', 'mysql');
if (!defined('LOCAL_ROOT_DIR')) define("LOCAL_ROOT_DIR", $_SERVER["DOCUMENT_ROOT"] . '/propertyapp/');

if (!defined('ADMIN_FORGOT_PASSWORD_LINK')) define("ADMIN_FORGOT_PASSWORD_LINK","http://" . $_SERVER['HTTP_HOST'] . "/propertyapp/update_password.php?k_1=");
if (!defined('FORGOT_PASSWORD_LINK')) define("FORGOT_PASSWORD_LINK","http://" . $_SERVER['HTTP_HOST'] . "/propertyapp/api/update_password.php?k_1=");

//MAIL 
// EMAIL service we use AMazon email Service please read and get credential from there.
if (!defined('SMTP_HOST')) define('SMTP_HOST', 'email-smtp.us-east-1.amazonaws.com');
if (!defined('SMTP_PORT')) define('SMTP_PORT', '587');
if (!defined('SMTP_USERNAME')) define('SMTP_USERNAME', 'YOURSMTPURSERNAME'); // 
if (!defined('SMTP_PASSWORD')) define('SMTP_PASSWORD', 'YOUR SMSTP PASSWORD');
if (!defined('FROM_EMAIL')) define('FROM_EMAIL', 'YOUR EMAIL FOR SENT EMAIL');
if (!defined('FROM_NAME')) define('FROM_NAME', 'Propertyapp');

if (!defined('APP_SITE_NAME')) define('APP_SITE_NAME', 'Propertyapp');
if (!defined('APP_NAME')) define('APP_NAME', 'Varshani Products');

if (!defined('MAIL_LOGO')) define("MAIL_LOGO", "https://yourdomainname.in/img/Adhyayanam_Logo.png");
if (!defined('FB_LOGO')) define("FB_LOGO", "https://yourdomainname.in/img/social/fb.png");
if (!defined('TWITTER_LOGO')) define("TWITTER_LOGO", "https://yourdomainname.in/img/social/twitter.png");
if (!defined('GOOGLE_LOGO')) define("GOOGLE_LOGO", "https://yourdomainname.in/img/social/gplus.png");
if (!defined('LINKEDIN_LOGO')) define("LINKEDIN_LOGO", "https://yourdomainname.in/img/social/linkedin.png");

//TABLE
if (!defined('TBL_USER')) define('TBL_USER', 'app_user');
if (!defined('TBL_EMAIL_TEMPLATE')) define('TBL_EMAIL_TEMPLATE', 'app_email_template_lang');
if (!defined('TBL_PROPERTY')) define('TBL_PROPERTY', 'property');
if (!defined('TBL_PROPERTY_AMENITIES')) define('TBL_PROPERTY_AMENITIES', 'property_amenities');
if (!defined('TBL_PROPERTY_SETTINGS')) define('TBL_PROPERTY_SETTINGS', 'property_app_setting');
if (!defined('TBL_PROPERTY_LATESTLIMIT')) define('TBL_PROPERTY_LATESTLIMIT', 'property_lastestlimit');
if (!defined('TBL_PROPERTY_FAVOURITE')) define('TBL_PROPERTY_FAVOURITE', 'property_my_favourate');
if (!defined('TBL_PROPERTY_PRIVACY_POLICY')) define('TBL_PROPERTY_PRIVACY_POLICY', 'property_privacy_policy');
if (!defined('TBL_PROPERTY_PURPOSE')) define('TBL_PROPERTY_PURPOSE', 'property_purpose');
if (!defined('TBL_PROPERTY_PUSH_NOTIFICATION')) define('TBL_PROPERTY_PUSH_NOTIFICATION', 'property_push_notifiaction');
if (!defined('TBL_PROPERTY_TYPE')) define('TBL_PROPERTY_TYPE', 'property_type');
if (!defined('TBL_USERDETAILS')) define('TBL_USERDETAILS', 'userdetails');
if (!defined('TBL_IMAGE')) define('TBL_IMAGE', 'image');
if (!defined('TBL_RATING')) define('TBL_RATING', 'rating');
if (!defined('TBL_LIKE')) define('TBL_LIKE', 'property_like');
if (!defined('TBL_CONTACTUS')) define('TBL_CONTACTUS', 'contactus');
if (!defined('TBL_SETTINGS')) define('TBL_SETTINGS', 'setting');