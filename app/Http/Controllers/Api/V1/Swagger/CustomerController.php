<?php

namespace App\Http\Controllers\Api\V1\Swagger;

use App\Http\Controllers\Controller;

 /**
 * @OA\Post(
 *     path="/api/v1/customers",
 *     summary="Create new customer",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Customers"},
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                  @OA\Schema(
 *                      required={"name","type","email","address","city","state","postalCode"},
 *                      @OA\Property(
 *                          property="name",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="type",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="email",
 *                          type="email",
 *                      ),
 *                      @OA\Property(
 *                          property="address",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="city",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="state",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="postalCode",
 *                          type="string",
 *                      ),
 *                      example={"name": "John Doe","type": "I","email": "John@goldner.biz","address": "6182 Vandervort Place","city": "Bechtelarton","state": "Arizona","postalCode": "54711"}
 *                  )
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Created Customer",
 *         @OA\JsonContent(
 *             @OA\Examples(example="result", value={"data": {"id": 1, "name": "John Doe","type": "I","email": "John@goldner.biz","address": "6182 Vandervort Place","city": "Bechtelarton","state": "Arizona","postalCode": "54711"}}, summary="An result object."),
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Error: Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Examples(example="result", value={"message": "Unauthenticated."}, summary="An result object."),
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
 * ),
 * @OA\Get(
 *     path="/api/v1/customers",
 *     summary="Get paginated customers with pagination links",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Customers"},
 *     @OA\Response(
 *         response=200,
 *         description="Paginated Customers",
 *         @OA\JsonContent(
 *             @OA\Property(type="array", property="data", @OA\Items(
 *                  @OA\Property(type="integer", property="id",example=1), 
 *                  @OA\Property(type="string", property="name",example="John Doe"),
 *                  @OA\Property(type="string", property="type",example="I"),
 *                  @OA\Property(type="string", property="email",example="John@goldner.biz"),
 *                  @OA\Property(type="string", property="address",example="6182 Vandervort Place"),
 *                  @OA\Property(type="string", property="city",example="Bechtelarton"),
 *                  @OA\Property(type="string", property="state",example="Arizona"),
 *                  @OA\Property(type="string", property="postalCode",example="54711"),
 *             )),
 *             @OA\Property(type="object", property="links", 
 *                  @OA\Property(type="string", property="first",example="http://localhost:8000/api/v1/customers?page=1"),
 *                  @OA\Property(type="string", property="last",example="http://localhost:8000/api/v1/customers?page=10"),
 *                  @OA\Property(type="null", property="prev",example=null),
 *                  @OA\Property(type="string", property="next",example="http://localhost:8000/api/v1/customers?page=2"),
 *             ),
 *             @OA\Property(type="object", property="meta", 
 *                  @OA\Property(type="integer", property="current_page",example=1),
 *                  @OA\Property(type="integer", property="from",example=1),
 *                  @OA\Property(type="integer", property="last_page",example=10),
 *                  @OA\Property(type="integer", property="per_page",example=15),
 *                  @OA\Property(type="integer", property="to",example=15),
 *                  @OA\Property(type="integer", property="total",example=150),
 *                  @OA\Property(type="string", property="path",example="http://localhost:8000/api/v1/customers"),
 *                  @OA\Property(type="array", property="links", @OA\Items(
 *                          @OA\Property(type="string", property="url",example="http://localhost:8000/api/v1/customers?page=1"),
 *                          @OA\Property(type="string", property="label",example="1"),
 *                          @OA\Property(type="boolean", property="active",example=true),
 *                      )
 *                  )
 *             ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Error: Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Examples(example="result", value={"message": "Unauthenticated."}, summary="An result object."),
 *         )
 *     )
 * ),
 * @OA\Get(
 *     path="/api/v1/customers/{customerId}",
 *     summary="Get customer by id",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Customers"},
 * 
 *     @OA\Parameter(description="Customer Id", in="path", name="customerId", required=true, example=1),
 *     @OA\Response(
 *         response=200,
 *         description="Customer",
 *         @OA\JsonContent(
 *             @OA\Property(type="object", property="data", 
 *                  @OA\Property(type="integer", property="id",example=1), 
 *                  @OA\Property(type="string", property="name",example="John Doe"),
 *                  @OA\Property(type="string", property="type",example="I"),
 *                  @OA\Property(type="string", property="email",example="John@goldner.biz"),
 *                  @OA\Property(type="string", property="address",example="6182 Vandervort Place"),
 *                  @OA\Property(type="string", property="city",example="Bechtelarton"),
 *                  @OA\Property(type="string", property="state",example="Arizona"),
 *                  @OA\Property(type="string", property="postalCode",example="54711"),
 *             ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Error: Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Examples(example="result", value={"message": "Unauthenticated."}, summary="An result object."),
 *         )
 *     )
 * ),
 *  @OA\Get(
 *     path="/api/v1/customers?includeInvoices=true",
 *     summary="Get customers with invoices",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Customers"},
 * 
 *     @OA\Parameter(description="Include Invoices Flag", in="query", name="includeInvoices", example=true),
 *     @OA\Response(
 *         response=200,
 *         description="Paginated Customers with invoives",
 *         @OA\JsonContent(
 *             @OA\Property(type="array", property="data", @OA\Items(
 *                  @OA\Property(type="integer", property="id",example=1), 
 *                  @OA\Property(type="string", property="name",example="John Doe"),
 *                  @OA\Property(type="string", property="type",example="I"),
 *                  @OA\Property(type="string", property="email",example="John@goldner.biz"),
 *                  @OA\Property(type="string", property="address",example="6182 Vandervort Place"),
 *                  @OA\Property(type="string", property="city",example="Bechtelarton"),
 *                  @OA\Property(type="string", property="state",example="Arizona"),
 *                  @OA\Property(type="string", property="postalCode",example="54711"),
 *                  @OA\Property(type="array", property="invoices", @OA\Items(
 *                      @OA\Property(type="integer", property="id",example=1), 
 *                      @OA\Property(type="integer", property="customerId",example=1),
 *                      @OA\Property(type="string", property="amount",example="13527.5"),
 *                      @OA\Property(type="string", property="billedDate",example="2017-09-14 22:55:56"),
 *                      @OA\Property(type="string", property="paidDate",example="2017-09-14 22:55:56"),
 *                      @OA\Property(type="string", property="status",example="P"),
 *                  ))
 *             )),
 *             @OA\Property(type="object", property="links", 
 *                  @OA\Property(type="string", property="first",example="http://localhost:8000/api/v1/customers?includeInvoices=true&page=1"),
 *                  @OA\Property(type="string", property="last",example="http://localhost:8000/api/v1/customers?includeInvoices=true&page=10"),
 *                  @OA\Property(type="null", property="prev",example=null),
 *                  @OA\Property(type="string", property="next",example="http://localhost:8000/api/v1/customers?includeInvoices=true&page=2"),
 *             ),
 *             @OA\Property(type="object", property="meta", 
 *                  @OA\Property(type="integer", property="current_page",example=1),
 *                  @OA\Property(type="integer", property="from",example=1),
 *                  @OA\Property(type="integer", property="last_page",example=10),
 *                  @OA\Property(type="integer", property="per_page",example=15),
 *                  @OA\Property(type="integer", property="to",example=15),
 *                  @OA\Property(type="integer", property="total",example=150),
 *                  @OA\Property(type="string", property="path",example="http://localhost:8000/api/v1/customers?includeInvoices=true"),
 *                  @OA\Property(type="array", property="links", @OA\Items(
 *                          @OA\Property(type="string", property="url",example="http://localhost:8000/api/v1/customers?includeInvoices=true&page=1"),
 *                          @OA\Property(type="string", property="label",example="1"),
 *                          @OA\Property(type="boolean", property="active",example=true),
 *                      )
 *                  )
 *             ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Error: Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Examples(example="result", value={"message": "Unauthenticated."}, summary="An result object."),
 *         )
 *     )
 * ),
 * @OA\Get(
 *     path="/api/v1/customers?postalCode[gt]=30000&state[eq]=Arizona&includeInvoices=true",
 *     summary="Get customers with invoices and filters(eq,gt,lt,gte,lte,ne)",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Customers"},
 * 
 *     @OA\Parameter(description="Name", in="query", name="name[eq]", example="John Doe"),
 *     @OA\Parameter(description="Email", in="query", name="email[eq]", example="John@goldner.biz"),
 *     @OA\Parameter(description="Type (I - individual, B - business)", in="query", name="type[eq]", example="I"),
 *     @OA\Parameter(description="State", in="query", name="state[eq]", example="Arizona"),
 *     @OA\Parameter(description="City", in="query", name="city[eq]", example="Phenix"),
 *     @OA\Parameter(description="Address", in="query", name="address[eq]", example="6182 Vandervort Place"),
 *     @OA\Parameter(description="Postal Code", in="query", name="postalCode[gt]", example=30000),
 *     @OA\Parameter(description="Include Invoices Flag", in="query", name="includeInvoices", example=true),
 *     @OA\Response(
 *         response=200,
 *         description="Filtred Paginated Customers with invoives",
 *         @OA\JsonContent(
 *             @OA\Property(type="array", property="data", @OA\Items(
 *                  @OA\Property(type="integer", property="id",example=1), 
 *                  @OA\Property(type="string", property="name",example="John Doe"),
 *                  @OA\Property(type="string", property="type",example="I"),
 *                  @OA\Property(type="string", property="email",example="John@goldner.biz"),
 *                  @OA\Property(type="string", property="address",example="6182 Vandervort Place"),
 *                  @OA\Property(type="string", property="city",example="Bechtelarton"),
 *                  @OA\Property(type="string", property="state",example="Arizona"),
 *                  @OA\Property(type="string", property="postalCode",example="54711"),
 *                  @OA\Property(type="array", property="invoices", @OA\Items(
 *                      @OA\Property(type="integer", property="id",example=1), 
 *                      @OA\Property(type="integer", property="customerId",example=1),
 *                      @OA\Property(type="string", property="amount",example="13527.5"),
 *                      @OA\Property(type="string", property="billedDate",example="2017-09-14 22:55:56"),
 *                      @OA\Property(type="string", property="paidDate",example="2017-09-14 22:55:56"),
 *                      @OA\Property(type="string", property="status",example="P"),
 *                  ))
 *             )),
 *             @OA\Property(type="object", property="links", 
 *                  @OA\Property(type="string", property="first",example="http://localhost:8000/api/v1/customers?postalCode[gt]=30000&state[eq]=Arizona&includeInvoices=true&page=1"),
 *                  @OA\Property(type="string", property="last",example="http://localhost:8000/api/v1/customers?postalCode[gt]=30000&state[eq]=Arizona&includeInvoices=true&page=10"),
 *                  @OA\Property(type="null", property="prev",example=null),
 *                  @OA\Property(type="string", property="next",example="http://localhost:8000/api/v1/customers?postalCode[gt]=30000&state[eq]=Arizona&includeInvoices=true&page=2"),
 *             ),
 *             @OA\Property(type="object", property="meta", 
 *                  @OA\Property(type="integer", property="current_page",example=1),
 *                  @OA\Property(type="integer", property="from",example=1),
 *                  @OA\Property(type="integer", property="last_page",example=10),
 *                  @OA\Property(type="integer", property="per_page",example=15),
 *                  @OA\Property(type="integer", property="to",example=15),
 *                  @OA\Property(type="integer", property="total",example=150),
 *                  @OA\Property(type="string", property="path",example="http://localhost:8000/api/v1/customers?postalCode[gt]=30000&state[eq]=Arizona&includeInvoices=true"),
 *                  @OA\Property(type="array", property="links", @OA\Items(
 *                          @OA\Property(type="string", property="url",example="http://localhost:8000/api/v1/customers?postalCode[gt]=30000&state[eq]=Arizona&includeInvoices=true&page=1"),
 *                          @OA\Property(type="string", property="label",example="1"),
 *                          @OA\Property(type="boolean", property="active",example=true),
 *                      )
 *                  )
 *             ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Error: Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Examples(example="result", value={"message": "Unauthenticated."}, summary="An result object."),
 *         )
 *     )
 * ),
 * @OA\Put(
 *     path="/api/v1/customers/{customerId}",
 *     summary="Update customer by id (all fields are required to perform an update)",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Customers"},
 * 
 *     @OA\Parameter(description="Customer Id", in="path", name="customerId", required=true, example=1),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                  @OA\Schema(
 *                      required={"name","type","email","address","city","state","postalCode"},
 *                      @OA\Property(
 *                          property="name",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="type",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="email",
 *                          type="email",
 *                      ),
 *                      @OA\Property(
 *                          property="address",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="city",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="state",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="postalCode",
 *                          type="string",
 *                      ),
 *                      example={"name": "John Doe","type": "I","email": "John@goldner.biz","address": "6182 Vandervort Place","city": "Bechtelarton","state": "Arizona","postalCode": "54711"}
 *                  )
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Error: Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Examples(example="result", value={"message": "Unauthenticated."}, summary="An result object."),
 *         )
 *     )
 * ),
 * @OA\Patch(
 *     path="/api/v1/customers/{customerId}",
 *     summary="Update customer by id",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Customers"},
 * 
 *     @OA\Parameter(description="Customer Id", in="path", name="customerId", required=true, example=1),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             anyOf={
 *                  @OA\Schema(
 *                      @OA\Property(
 *                          property="name",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="type",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="email",
 *                          type="email",
 *                      ),
 *                      @OA\Property(
 *                          property="address",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="city",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="state",
 *                          type="string",
 *                      ),
 *                      @OA\Property(
 *                          property="postalCode",
 *                          type="string",
 *                      ),
 *                      example={"name": "John Doe","type": "I","email": "John@goldner.biz","address": "6182 Vandervort Place","city": "Bechtelarton","state": "Arizona","postalCode": "54711"}
 *                  )
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Error: Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Examples(example="result", value={"message": "Unauthenticated."}, summary="An result object."),
 *         )
 *     )
 * ),
 * @OA\Delete(
 *     path="/api/v1/customers/{customerId}",
 *     summary="Delete customer by id",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Customers"},
 * 
 *     @OA\Parameter(description="Customer Id", in="path", name="customerId", required=true, example=1),
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Error: Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Examples(example="result", value={"message": "Unauthenticated."}, summary="An result object."),
 *         )
 *     )
 * )
 */
class CustomerController extends Controller
{
    //
}
