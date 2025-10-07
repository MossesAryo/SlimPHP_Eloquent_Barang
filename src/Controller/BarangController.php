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
        $result['message']  = 'List of barang';
        $result['data']     = $barang;
        
        return JsonResponse::withJson($response, $result, 200);
    }
    public function store(Request $request, Response $response): Response
    {
        $data = (array)$request->getParsedBody();

        $barang = Barang::create($data);

        $result['status']   = true;
        $result['message']  = 'Barang created successfully';
        $result['data']     = $barang;
        
        return JsonResponse::withJson($response, $result, 201);
    }
    public function update(Request $request, Response $response, array $args): Response
    {
        $id = (int)$args['id'];
        $data = (array)$request->getParsedBody();

        $barang = Barang::where('id',$id)->first();
        if (!$barang) {
            $result['status']   = false;
            $result['message']  = 'Barang not found';
            return JsonResponse::withJson($response, $result, 404);
        }

        $barang->update($data);

        $result['status']   = true;
        $result['message']  = 'Barang updated successfully';
        $result['data']     = $barang;
        
        return JsonResponse::withJson($response, $result, 200);
    }
    public function destroy(Request $request, Response $response, array $args): Response
    {
        $id = (int)$args['id'];

        $barang = Barang::where('id',$id)->first();
        if (!$barang) {
            $result['status']   = false;
            $result['message']  = 'Barang not found';
           
            return JsonResponse::withJson($response, $result, 404);
        }

        $barang->delete();

        $result['status']   = true;
        $result['message']  = 'Barang deleted successfully';
        
        return JsonResponse::withJson($response, $result, 200);
    }
}