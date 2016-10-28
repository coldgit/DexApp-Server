# DexApp-Server
BackEnd

Step 1: Open your php.ini file.

Step 2: Upgrading Memory Limit:

memory_limit = 750M
Step 3: Upgrading Maximum size to post:

post_max_size = 750M

Step 4: Upgrading Maximum file-size to upload:

upload_max_filesize = 1000M

Step 5: Upgrading Maximum Execution Time:

max_execution_time = 5000

Step 6: Upgrading Maximum Input Time:

max_input_time = 3000

Step 7: Restart your xampp control panel.

//http://stackoverflow.com/questions/8719276/cors-with-php-headers
function cors() {

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

    echo "You have CORS!";
}



grant all privileges on mydb.* to myuser@localhost identified by 'mypasswd';