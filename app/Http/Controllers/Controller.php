<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *      title="Laravel API",
 *      version="1.0",
 * ),
 * @OA\PathItem(
 *      path="/api"
 * ),
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     description="Enter token starting from Bearer e.g. `Bearer 12345678`",
 *     type="apiKey",
 *     name="Authorization",
 *     in="header"
 * )
 */
abstract class Controller
{
    //
}
