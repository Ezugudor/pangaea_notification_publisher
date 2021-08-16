<?php

namespace App\Api\V1\Traits;

use Illuminate\Support\Facades\Log;

/**
 * #author Ezugudor
 * This trait houses request responses with the correct standard HTTP status c
 * codes with nice descriptions and infos.
 */
trait HttpStatusResponse
{

    /**
     * Map of standard HTTP status code/reason phrases
     *
     * @var array
     */
    private $statusArray = [
        // INFORMATIONAL CODES
        ['code' => 100, 'desc' => 'Continue'],
        ['code' => 101, 'desc' => 'Switching Protocols'],
        ['code' => 102, 'desc' => 'Processing'],
        ['code' => 103, 'desc' => 'Early Hints'],
        // SUCCESS CODES
        ['code' => 200, 'desc' => 'OK'],
        ['code' => 201, 'desc' => 'Created'],
        ['code' => 202, 'desc' => 'Accepted'],
        ['code' => 203, 'desc' => 'Non-Authoritative Information'],
        ['code' => 204, 'desc' => 'No Content'],
        ['code' => 205, 'desc' => 'Reset Content'],
        ['code' => 206, 'desc' => 'Partial Content'],
        ['code' => 207, 'desc' => 'Multi-Status'],
        ['code' => 208, 'desc' => 'Already Reported'],
        ['code' => 226, 'desc' => 'IM Used'],
        // REDIRECTION CODES
        ['code' => 300, 'desc' => 'Multiple Choices'],
        ['code' => 301, 'desc' => 'Moved Permanently'],
        ['code' => 302, 'desc' => 'Found'],
        ['code' => 303, 'desc' => 'See Other'],
        ['code' => 304, 'desc' => 'Not Modified'],
        ['code' => 305, 'desc' => 'Use Proxy'],
        ['code' => 306, 'desc' => 'Switch Proxy'], // Deprecated to 306 => '(Unused)'
        ['code' => 307, 'desc' => 'Temporary Redirect'],
        ['code' => 308, 'desc' => 'Permanent Redirect'],
        // CLIENT ERROR
        ['code' => 400, 'desc' => 'Bad Request'],
        ['code' => 401, 'desc' => 'Unauthorized'],
        ['code' => 402, 'desc' => 'Payment Required'],
        ['code' => 403, 'desc' => 'Forbidden'],
        ['code' => 404, 'desc' => 'Not Found'],
        ['code' => 405, 'desc' => 'Method Not Allowed'],
        ['code' => 406, 'desc' => 'Not Acceptable'],
        ['code' => 407, 'desc' => 'Proxy Authentication Required'],
        ['code' => 408, 'desc' => 'Request Timeout'],
        ['code' => 409, 'desc' => 'Conflict'],
        ['code' => 410, 'desc' => 'Gone'],
        ['code' => 411, 'desc' => 'Length Required'],
        ['code' => 412, 'desc' => 'Precondition Failed'],
        ['code' => 413, 'desc' => 'Payload Too Large'],
        ['code' => 414, 'desc' => 'URI Too Long'],
        ['code' => 415, 'desc' => 'Unsupported Media Type'],
        ['code' => 416, 'desc' => 'Range Not Satisfiable'],
        ['code' => 417, 'desc' => 'Expectation Failed'],
        ['code' => 418, 'desc' => 'I\'m a teapot'],
        ['code' => 421, 'desc' => 'Misdirected Request'],
        ['code' => 422, 'desc' => 'Unprocessable Entity'],
        ['code' => 423, 'desc' => 'Locked'],
        ['code' => 424, 'desc' => 'Failed Dependency'],
        ['code' => 425, 'desc' => 'Too Early'],
        ['code' => 426, 'desc' => 'Upgrade Required'],
        ['code' => 428, 'desc' => 'Precondition Required'],
        ['code' => 429, 'desc' => 'Too Many Requests'],
        ['code' => 431, 'desc' => 'Request Header Fields Too Large'],
        ['code' => 444, 'desc' => 'Connection Closed Without Response'],
        ['code' => 451, 'desc' => 'Unavailable For Legal Reasons'],
        // SERVER ERROR
        ['code' => 499, 'desc' => 'Client Closed Request'],
        ['code' => 500, 'desc' => 'Internal Server Error'],
        ['code' => 501, 'desc' => 'Not Implemented'],
        ['code' => 502, 'desc' => 'Bad Gateway'],
        ['code' => 503, 'desc' => 'Service Unavailable'],
        ['code' => 504, 'desc' => 'Gateway Timeout'],
        ['code' => 505, 'desc' => 'HTTP Version Not Supported'],
        ['code' => 506, 'desc' => 'Variant Also Negotiates'],
        ['code' => 507, 'desc' => 'Insufficient Storage'],
        ['code' => 508, 'desc' => 'Loop Detected'],
        ['code' => 510, 'desc' => 'Not Extended'],
        ['code' => 511, 'desc' => 'Network Authentication Required'],
        ['code' => 599, 'desc' => 'Network Connect Timeout Error'],
    ];


    public function getStatus($statusCode)
    {
        $response = [];
        foreach ($this->statusArray as $status) {
            if ($status['code'] == $statusCode) {
                $response = array(

                    'code' => $status['code'],
                    'desc' => $status['desc'],

                );
            }
        }
        return (object) $response;
    }



    public function customHttpResponse($statusCode, $message = null, $data = null)
    {
        $response = [
            'data' => $data,
            'status_mesage' => $message,

        ];

        if ($statusCode === 404) {
            //404 - Not found
            $status = $this->getStatus(404);
            $response['status_desc'] = $status->desc;
            $response['status_code'] = $statusCode;
        } else if ($statusCode === 401) {
            //401 - Unauthorized
            $status = $this->getStatus(401);
            $response['status_desc'] = $status->desc;
            $response['status_code'] = $statusCode;
        } else if ($statusCode >= 200 && $statusCode < 300) {
            //200 - Handle as Success
            $status = $this->getStatus(200);
            $response['status_desc'] = $status->desc;
            $response['status_code'] = $statusCode;
        } else if ($statusCode >= 400 && $statusCode < 500) {
            //400 - handle as Bad request
            $status = $this->getStatus(400);
            $response['status_desc'] = $status->desc;
            $response['status_code'] = $statusCode;
        } else {
            //500 - handle as Internal Server Error
            $status = $this->getStatus(500);
            $response['status_desc'] = $status->desc;
            $response['status_code'] = $statusCode;
        }
        $response = array_reverse($response);
        return response()->json($response, $status->code);
    }
}
