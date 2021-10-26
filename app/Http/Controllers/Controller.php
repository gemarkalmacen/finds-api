<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $messages = [];
    /**
     * @param int $status
     * @param string $message
     * @param array $messages
     * @return \Illuminate\Http\JsonResponse
     */

    protected function formatValidation(int $status, string $message, array $messages = [])
    {
        return response()->json([
            'status' => __('messages.error'),
            'description' => $message,
            'errors' => count($messages) ? $messages : $this->messages
        ], $status);
    }

    /**
     * Check if validation passed
     *
     * @param array $data
     * @param array $rules
     * @return bool
     */
    protected function customValidation(array $data, array $rules): bool
    {
        return Validator::make($data, $rules)->passes();
    }
}
