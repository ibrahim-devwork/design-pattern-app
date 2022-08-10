<?php

namespace App\Helpers;

class Global_Exception {
    
    // HTTP methods request
    const HTTP_SUCCESS      	    = 200;
    const HTTP_CREATED      	    = 201;
    const HTTP_UNAUTHORIZED 	    = 401;
    const HTTP_FORBIDDEN    	    = 403;
    const HTTP_NOT_FOUND    	    = 404;
    const HTTP_METHOD_NOT_ALLOWED   = 405;
    const HTTP_SERVER_ERROR 	    = 500;

    // Global messages
    const SUCCESS_MSG               = "Your operation has been successfully completed.";

}