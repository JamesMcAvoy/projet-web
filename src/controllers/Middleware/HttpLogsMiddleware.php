<?php

namespace Controllers\Middleware;

use React\Http\Io\ServerRequest as Request,
    React\Http\Response;

final class HttpLogsMiddleware {

    /**
     * Display a log from a request to the server
     * @param React\Http\Io\ServerRequest   $request
     * @param React\Http\Response           $response
     * @param String                        $msg
     * @return Response
     */
    public static function log(Request $request, Response $response, String $msg = '') : Response {

        $date = date('d/m H:i:s');
        $ip = $request->getServerParams()['REMOTE_ADDR'];
        $path = $request->getUri()->getPath();
        $status = $response->getStatusCode();
        echo "$date : $ip $path $status $msg\n";
        return $response;

    }

}