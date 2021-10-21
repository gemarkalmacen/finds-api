<?php

namespace App\Annotations\V1\Staff\Controllers;

class AuthController extends Controller
{
    /**
     * Login user
     *
     * @OA\Post(
     *     path="/login",
     *     security={},
     *     tags={"Authentication"},
     *     description="Login user",
     *     @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="email",
     *                  title="Email",
     *                  type="string",
     *                  example="admin@admin.com"
     *              ),
     *              @OA\Property(
     *                  property="password",
     *                  title="Password",
     *                  type="password",
     *                  example="password"
     *              )
     *          )
     *      )
     *     ),        
     *     @OA\Response(
     *          response="200",
     *          description="OK",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="status",
     *                  example="success",
     *              ),
     *              @OA\Property(
     *                  property="description",
     *                  example="OK",
     *              ),
     *              @OA\Property(
     *                  property="token",
     *                  example="nidO7z8fzHC7OuaN5buplq2cdXzCjzmh",
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  example=
                          {
                                "id": 1,
                                "email": "admin@admin.com",
                                "mobile": "66842888686",
                                "user_details": {
                                    "first_name": "Alex", 
                                    "middle_name": "John",
                                    "last_name": "Scalia",
                                },
                                "roles": {
                                    "id": 1, 
                                    "name": "Administrator"
                                },
                                "user_settings": {
                                    "languages": {
                                        "id": 1,
                                        "code": "en"
                                    }
                                },
                                "created_at": "2020-12-03 15:55:22",
                                "updated_at": "2020-12-03 15:55:22",
                                "deleted_at": "2020-12-03 15:55:22",
                            }
     *              )
     *          )
     *      ),
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *                  example={
                            "status": "error",
                            "description": "Unauthorized",
                            "errors": {
                                {"code": 5003, "message": "Credentials invalid"},
                            }
                       }     
     *          )
     *      ),    
     *     @OA\Response(
     *          response="403",
     *          description="Forbidden",
     *          @OA\JsonContent(
                    example= {
                        "status": "error",
                        "description": "Forbidden",
                        "errors": {
                            "code": 5004,
                            "message": "User inactive"
                        }
                    },
               )
     *      ), 
     *     @OA\Response(
     *          response="422",
     *          description="Unprocessable Entry",
     *          @OA\JsonContent(
     *                  example={
                              "status": "error",
                              "description": "Unprocessable Entry",
                              "errors": {
                                   {"field": "email", "code": 5001, "message": "Email required"},                                   
                                   {"field": "password", "code": 5002, "message": "Password required"}
                               }
                       }
     *          )
     *      )
     * )
     */  
    
    /**
     * Logout user
     *
     * @OA\Get(
     *     path="/logout",
     *     security={ {"staff": {} }},
     *     tags={"Authentication"},
     *     description="Logout authenticated user",
     *     @OA\Response(
     *          response="200",
     *          description="OK",
     *          @OA\JsonContent(
     *                  example={
                            "status": "success",
                            "description": "OK",
                       }     
     *          )
     *     ),
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *                  example= {
                            "status": "error",
                            "description": "Unauthorized"
     *                  },
     *          )
     *      )
     * )
     */     
}
