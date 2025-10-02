<?php

namespace App\Controller;

use App\Model\Barang;
use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


final class BarangController
{
    
    

   public function index(Request $request, Response $response): Response
    {
        $barang = Barang::with('kategori')->get();

        $result['status']   = true;
        $result['data']     = [
            'message' => 'This is Barang Controller',
            'barang' => $barang
        ];
        
        return JsonResponse::withJson($response, $result, 200);
    }
}