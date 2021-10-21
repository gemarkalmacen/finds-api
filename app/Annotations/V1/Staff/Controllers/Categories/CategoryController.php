<?php

namespace App\Annotations\V1\Staff\Controllers\Categories;

use App\Annotations\V1\Staff\Controllers\Controller;

class CategoryController extends Controller
{          

    /**
     * Get city
     *
     * @OA\Get(
     *     path="/categories",
     *     security={ {"staff": {} }},
     *     tags={"Categories"}, 
     *     description="Get category",
     *     @OA\Parameter(
     *         name="filter[name]",
     *         description="Search name",
     *         in="query",
     *         @OA\Schema(
     *             type="string",     
     *             example=""
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="filter[id]",
     *         description="Search id",
     *         in="query",
     *         @OA\Schema(
     *             type="integer",     
     *             example=""
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="sort[direction]",
     *         description="Sort direction",
     *         in="query",
     *         @OA\Schema(
     *             type="string",
     *             enum={"asc", "desc"},
     *             example=""
     *         )
     *     ),  
     *     @OA\Response(
     *          response="200",
     *          description="OK",
     *          @OA\JsonContent(
                    example = {
                        "status": "success",
                        "description": "OK",
                        "data": {
                            {
                                "id": 1,
                                "name": "City name",
                                "created_at": "2021-12-03 15:55:22",
                                "updated_at": "2021-12-03 15:55:22",
                            }
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
                        "description": "Unauthorized",
                        "errors": {
                            {
                                "code": 5045,
                                "message": "Permissions insufficient"
                            },
                            {
                                "code": 5004,
                                "message": "User inactive"
                            }
                        }
                    },
               )
     *      ),
     * )
     */      
    
    /**
     * Show city
     *
     * @OA\Get(
     *     path="/categories/{category}",
     *     security={ {"staff": {} }},
     *     tags={"Categories"},
     *     description="Show category",      
     *     @OA\Parameter(
     *         required=true,
     *         name="category",
     *         description="",
     *         in="path",
     *         @OA\Schema(
     *             type="string",
     *             example=""
     *         )
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="OK",
     *          @OA\JsonContent(
                    example = {
                        "status": "success",
                        "description": "OK",
                        "data": {   
                            "id": 1,
                            "name": "category",
                            "created_at": "2021-12-03 15:55:22",
                            "updated_at": "2021-12-03 15:55:22",
                        }                        
                   }                    
     *          )
     *      ),
     *     @OA\Response(
     *          response="404",
     *          description="Not Found",
     *          @OA\JsonContent(
                    example= {
                            "status": "error",
                            "description": "Not Found"
                    }
     *          )
     *      ),
     *     @OA\Response(
     *          response="403",
     *          description="Forbidden",
     *          @OA\JsonContent(
                    example= {
                        "status": "error",
                        "description": "Unauthorized",
                        "errors": {
                            {
                                "code": 5045,
                                "message": "Permissions insufficient"
                            },
                            {
                                "code": 5004,
                                "message": "User inactive"
                            }
                        }
                    },
               )
     *      ),
     * )
     */
}
