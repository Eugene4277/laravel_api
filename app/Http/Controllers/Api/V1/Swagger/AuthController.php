<?php

namespace App\Http\Controllers\Api\V1\Swagger;

use App\Http\Controllers\Controller;

 /**
 * @OA\Post(
 *     path="/api/v1/auth",
 *     summary="Sign up and get access token",
 *     tags={"Auth"},
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                  @OA\Schema(
 *                      required={"name","password"},
 *                      @OA\Property(
 *                          property="name",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="password",
 *                          type="string",
 *                      ),
 *                      example={"name": "John Doe","password": "password"}
 *                  )
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Token list",
 *         @OA\JsonContent(
 *             @OA\Examples(example="result", value={"admin":"bearer_admin","update":"bearer_update","basic":"bearer_basic"}, summary="An result object."),
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Error: Unprocessable Content",
 *         @OA\JsonContent(
 *             @OA\Property(type="string", property="message", example="The name field is required."),
 *             @OA\Property(type="object", property="errors", 
 *                  @OA\Property(type="array", property="name", @OA\Items(type="string",example="The name field is required."))
 *             )
 *         )
 *     )
 * )
 */
class AuthController extends Controller
{
    //
}
