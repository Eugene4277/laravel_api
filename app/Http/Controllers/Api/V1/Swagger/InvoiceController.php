<?php

namespace App\Http\Controllers\Api\V1\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/v1/invoices",
 *     summary="Create new invoice",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Invoices"},
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                  @OA\Schema(
 *                      required={"customerId","amount","billed_date","status"},
 *                      @OA\Property(
 *                          property="customerId",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="amount",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="status",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="billed_date",
 *                          type="dateTime",
 *                      ),
 *                      @OA\Property(
 *                          property="paid_date",
 *                          type="dateTime",
 *                      ),
 *                      example={"customerId":1,"amount":13527,"paidDate":null,"billedDate":"2017-09-14 22:55:56","status":"B"}
 *                  )
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Created Invoice",
 *         @OA\JsonContent(
 *             @OA\Examples(example="result", value={"data": {"id":1,"customerId":1,"amount":13527,"paidDate":null,"billedDate":"2017-09-14 22:55:56","status":"B"}}, summary="An result object."),
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
 * @OA\Post(
 *     path="/api/v1/invoices/bulk",
 *     summary="Create new invoices in bulk mode",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Invoices"},
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                  anyOf={
 *                      @OA\Schema(
 *                          required={"customerId","amount","billed_date","status"},
 *                          @OA\Property(
 *                              property="customerId",
 *                              type="integer",
 *                              example=1
 *                          ),
 *                          @OA\Property(
 *                              property="amount",
 *                              type="integer",
 *                              example=1235
 *                          ),
 *                          @OA\Property(
 *                              property="status",
 *                              type="string",
 *                              example="B"
 *                          ),
 *                          @OA\Property(
 *                              property="billedDate",
 *                              type="dateTime",
 *                              example="2017-09-14 22:55:56"
 *                          ),
 *                          @OA\Property(
 *                              property="paidDate",
 *                              type="dateTime",
 *                              example=null
 *                          ),
 *                      ),
 *                      @OA\Schema(
 *                          required={"customerId","amount","billed_date","status"},
 *                          @OA\Property(
 *                              property="customerId",
 *                              type="integer",
 *                              example=1
 *                          ),
 *                          @OA\Property(
 *                              property="amount",
 *                              type="integer",
 *                              example=4567
 *                          ),
 *                          @OA\Property(
 *                              property="status",
 *                              type="string",
 *                              example="P"
 *                          ),
 *                          @OA\Property(
 *                              property="billedDate",
 *                              type="dateTime",
 *                              example="2017-09-14 22:55:56"
 *                          ),
 *                          @OA\Property(
 *                              property="paidDate",
 *                              type="dateTime",
 *                              example="2017-09-14 22:55:56"
 *                          ),
 *                      ),
 *                  }
 *              ),
 *         )
 *     ),
 *     @OA\Response(
 *         @OA\MediaType(
 *              mediaType="application/json"  
 *         ),
 *         response=200,
 *         description="Ok",
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
 *     path="/api/v1/invoices",
 *     summary="Get paginated invoices with pagination links",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Invoices"},
 *     @OA\Response(
 *         response=200,
 *         description="Paginated Invoices",
 *         @OA\JsonContent(
 *             @OA\Property(type="array", property="data", @OA\Items(
 *                      @OA\Property(
 *                          property="customerId",
 *                          type="integer",
 *                          example=1
 *                      ),
 *                      @OA\Property(
 *                          property="amount",
 *                          type="integer",
 *                          example=1235
 *                      ),
 *                      @OA\Property(
 *                          property="status",
 *                          type="string",
 *                          example="B"
 *                      ),
 *                      @OA\Property(
 *                          property="billed_date",
 *                          type="dateTime",
 *                          example="2017-09-14 22:55:56"
 *                      ),
 *                      @OA\Property(
 *                          property="paid_date",
 *                          type="dateTime",
 *                          example=null
 *                      ),
 *             )),
 *             @OA\Property(type="object", property="links", 
 *                  @OA\Property(type="string", property="first",example="http://localhost:8000/api/v1/invoices?page=1"),
 *                  @OA\Property(type="string", property="last",example="http://localhost:8000/api/v1/invoices?page=10"),
 *                  @OA\Property(type="null", property="prev",example=null),
 *                  @OA\Property(type="string", property="next",example="http://localhost:8000/api/v1/invoices?page=2"),
 *             ),
 *             @OA\Property(type="object", property="meta", 
 *                  @OA\Property(type="integer", property="current_page",example=1),
 *                  @OA\Property(type="integer", property="from",example=1),
 *                  @OA\Property(type="integer", property="last_page",example=10),
 *                  @OA\Property(type="integer", property="per_page",example=15),
 *                  @OA\Property(type="integer", property="to",example=15),
 *                  @OA\Property(type="integer", property="total",example=150),
 *                  @OA\Property(type="string", property="path",example="http://localhost:8000/api/v1/invoices"),
 *                  @OA\Property(type="array", property="links", @OA\Items(
 *                          @OA\Property(type="string", property="url",example="http://localhost:8000/api/v1/invoices?page=1"),
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
 *     path="/api/v1/invoices/{invoiceId}",
 *     summary="Get invoice by id",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Invoices"},
 * 
 *     @OA\Parameter(description="Invoice Id", in="path", name="invoiceId", required=true, example=1),
 *     @OA\Response(
 *         response=200,
 *         description="Invoice",
 *         @OA\JsonContent(
 *             @OA\Property(type="object", property="data", 
 *                  @OA\Property(
 *                          property="customerId",
 *                          type="integer",
 *                          example=1
 *                      ),
 *                      @OA\Property(
 *                          property="amount",
 *                          type="integer",
 *                          example=1235
 *                      ),
 *                      @OA\Property(
 *                          property="status",
 *                          type="string",
 *                          example="B"
 *                      ),
 *                      @OA\Property(
 *                          property="billed_date",
 *                          type="dateTime",
 *                          example="2017-09-14 22:55:56"
 *                      ),
 *                      @OA\Property(
 *                          property="paid_date",
 *                          type="dateTime",
 *                          example=null
 *                      ),
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
 *     path="/api/v1/invoices?status[eq]=P&paidDate[ne]=null",
 *     summary="Get invoices with filters(eq,gt,lt,gte,lte,ne)",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Invoices"},
 * 
 *     @OA\Parameter(description="customerId", in="query", name="customerId[eq]", example="1"),
 *     @OA\Parameter(description="amount", in="query", name="amount[gt]", example=1000),
 *     @OA\Parameter(description="Status (B - billed, P - Paid, V - void)", in="query", name="status[eq]", example="P"),
 *     @OA\Parameter(description="Billed Date", in="query", name="billedDate[eq]", example="2017-09-14"),
 *     @OA\Parameter(description="Paid Date", in="query", name="paidDate[eq]", example="2017-09-14"),
 *     @OA\Response(
 *         response=200,
 *         description="Filtred Paginated Invoices",
 *         @OA\JsonContent(
 *             @OA\Property(type="array", property="data", @OA\Items(
 *                  @OA\Property(
 *                          property="customerId",
 *                          type="integer",
 *                          example=1
 *                      ),
 *                      @OA\Property(
 *                          property="amount",
 *                          type="integer",
 *                          example=1235
 *                      ),
 *                      @OA\Property(
 *                          property="status",
 *                          type="string",
 *                          example="B"
 *                      ),
 *                      @OA\Property(
 *                          property="billed_date",
 *                          type="dateTime",
 *                          example="2017-09-14 22:55:56"
 *                      ),
 *                      @OA\Property(
 *                          property="paid_date",
 *                          type="dateTime",
 *                          example=null
 *                      ),
 *             )),
 *             @OA\Property(type="object", property="links", 
 *                  @OA\Property(type="string", property="first",example="http://localhost:8000/api/v1/invoices?status[eq]=P&paidDate[ne]=null&page=1"),
 *                  @OA\Property(type="string", property="last",example="http://localhost:8000/api/v1/invoices?status[eq]=P&paidDate[ne]=null&page=10"),
 *                  @OA\Property(type="null", property="prev",example=null),
 *                  @OA\Property(type="string", property="next",example="http://localhost:8000/api/v1/invoices?status[eq]=P&paidDate[ne]=null&page=2"),
 *             ),
 *             @OA\Property(type="object", property="meta", 
 *                  @OA\Property(type="integer", property="current_page",example=1),
 *                  @OA\Property(type="integer", property="from",example=1),
 *                  @OA\Property(type="integer", property="last_page",example=10),
 *                  @OA\Property(type="integer", property="per_page",example=15),
 *                  @OA\Property(type="integer", property="to",example=15),
 *                  @OA\Property(type="integer", property="total",example=150),
 *                  @OA\Property(type="string", property="path",example="http://localhost:8000/api/v1/invoices?status[eq]=P&paidDate[ne]=null"),
 *                  @OA\Property(type="array", property="links", @OA\Items(
 *                          @OA\Property(type="string", property="url",example="http://localhost:8000/api/v1/invoices?status[eq]=P&paidDate[ne]=null&page=1"),
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
 *     path="/api/v1/invoices/{invoiceId}",
 *     summary="Update invoice by id (all fields are required to perform an update)",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Invoices"},
 * 
 *     @OA\Parameter(description="Invoice Id", in="path", name="invoiceId", required=true, example=1),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                  @OA\Schema(
 *                      required={"customerId","amount","billed_date","status"},
 *                      @OA\Property(
 *                          property="customerId",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="amount",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="status",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="billed_date",
 *                          type="dateTime",
 *                      ),
 *                      @OA\Property(
 *                          property="paid_date",
 *                          type="dateTime",
 *                      ),
 *                      example={"customerId":1,"amount":13527,"paidDate":null,"billedDate":"2017-09-14 22:55:56","status":"B"}
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
 *     path="/api/v1/invoices/{invoiceId}",
 *     summary="Update invoice by id",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Invoices"},
 * 
 *     @OA\Parameter(description="Invoice Id", in="path", name="invoiceId", required=true, example=1),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             anyOf={
 *                  @OA\Schema(
 *                      @OA\Property(
 *                          property="customerId",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="amount",
 *                          type="integer",
 *                      ),
 *                      @OA\Property(
 *                          property="status",
 *                          type="string"
 *                      ),
 *                      @OA\Property(
 *                          property="billed_date",
 *                          type="dateTime",
 *                      ),
 *                      @OA\Property(
 *                          property="paid_date",
 *                          type="dateTime",
 *                      ),
 *                      example={"customerId":1,"amount":13527,"paidDate":null,"billedDate":"2017-09-14 22:55:56","status":"B"}
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
 *     path="/api/v1/invoices/{invoiceId}",
 *     summary="Delete customer by id",
 *     security={ {"bearerAuth": {}} },
 *     tags={"Invoices"},
 * 
 *     @OA\Parameter(description="Invoice Id", in="path", name="invoiceId", required=true, example=1),
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
class InvoiceController extends Controller
{
    //
}
