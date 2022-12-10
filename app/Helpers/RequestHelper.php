<?php

namespace App\Http\Helpers;

use Illuminate\Http\Request;

/**
 * Called when data is not found
 * @return \Illuminate\Http\JsonResponse
 */
function error404()
{
    return response()->json([
        'status' => 'error',
        'content' => 'Elemento no encontrado',
    ])->setStatusCode(404);
}

/**
 * Called when an error occurs
 * @param \Throwable $e
 * @return \Illuminate\Http\JsonResponse
 */
function catchError( \Throwable $e)
{
    $content = array(
        'status' => 'Error',
        'title' => 'Ha ocurrido un error.',
        'message' => $e->getMessage(),
        'line' => $e->getLine(),
        'file' => $e->getFile(),
    );


    return response()->json($content)->setStatusCode(500);
}

/**
 * Called when data is found
 * @param mixed $data
 * @param string $name
 * @return \Illuminate\Http\JsonResponse
 */
function success($content, $name = 'content', $message = null)
{
    return response()->json([
        'status' => 'success',
       'content' => $content,
        'message' => $message,
    ])->setStatusCode(200);
}
