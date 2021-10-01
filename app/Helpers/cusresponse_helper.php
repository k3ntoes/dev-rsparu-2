<?php

/**
 * Array $data
 * @return OK
 */
function res200($data = null)
{
    return [
        "response" => $data,
        "metaData" => [
            'code' => 200,
            'message' => 'OK'
        ]
    ];
}

/**
 * Array $data
 * @return Data Created!
 */
function res201($data = null)
{
    return [
        "response" => $data,
        "metaData" => [
            "code" => 201,
            "message" => "Data Created!"
        ]
    ];
}

/**
 * Array $data
 * @return Data Accepted!
 */
function res202($data = null)
{
    return [
        "response" => $data,
        "metaData" => [
            "code" => 202,
            "message" => "Data Accepted!"
        ]
    ];
}

/**
 * Array $data
 * @return No Content
 */
function res204($data = null)
{
    return [
        "response" => $data,
        "metaData" => [
            "code" => 204,
            "message" => "No Content"
        ]
    ];
}

/**
 * Array $data
 * @return Data Found
 */
function res302($data = null)
{
    return [
        "response" => $data,
        "metaData" => [
            "code" => 302,
            "message" => "Data Found"
        ]
    ];
}

/**
 * Array $data
 * @return Not Modified
 */
function res304($data = null)
{
    return [
        "response" => $data,
        "metaData" => [
            "code" => 304,
            "message" => "Not Modifed"
        ]
    ];
}

/**
 * @Array $data
 * @return Bad Request
 */
function res400($data = null)
{
    return [
        "response" => $data,
        "metaData" => [
            "code" => 400,
            "message" => "Bad Request"
        ]
    ];
}

/**
 * Array $data
 * @return Unauthorized
 */
function res401($data = null)
{
    return [
        "response" => $data,
        "metaData" => [
            "code" => 401,
            "message" => "Unauthorized"
        ]
    ];
}

/**
 * Array $data
 * @return Not Found!!!
 */
function res404()
{
    return [
        "response" => ["message" => "Page Not Found!"],
        "metaData" => [
            "code" => 404,
            "message" => "Not Found!!!"
        ]
    ];
}
