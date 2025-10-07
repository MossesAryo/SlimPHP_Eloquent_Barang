<?php

namespace App\Controller;

use App\Model\Pelanggan;
use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


final class PelangganController
{
    
        

   public function index(Request $request, Response $response): Response
    {
        $pelanggan = Pelanggan::get();

        $result['status']   = true;
        $result['message']  = 'List of pelanggan';
        $result['data']     = $pelanggan;
        
        return JsonResponse::withJson($response, $result, 200);
    }
    public function store(Request $request, Response $response): Response
    {
        $data = (array)$request->getParsedBody();

        $pelanggan = Pelanggan::create($data);

        $result['status']   = true;
        $result['message']  = 'pelanggan created successfully';
        $result['data']     = $pelanggan;
        
        return JsonResponse::withJson($response, $result, 201);
    }
    public function update(Request $request, Response $response, array $args): Response
    {
        $id = (int)$args['id'];
        $data = (array)$request->getParsedBody();

        $pelanggan = pelanggan::where('id',$id)->first();
        if (!$pelanggan) {
            $result['status']   = false;
            $result['message']  = 'pelanggan not found';
            return JsonResponse::withJson($response, $result, 404);
        }

        $pelanggan->update($data);

        $result['status']   = true;
        $result['message']  = 'pelanggan updated successfully';
        $result['data']     = $pelanggan;
        
        return JsonResponse::withJson($response, $result, 200);
    }
    public function destroy(Request $request, Response $response, array $args): Response
    {
        $id = (int)$args['id'];

        $pelanggan = pelanggan::where('id',$id)->first();
        if (!$pelanggan) {
            $result['status']   = false;
            $result['message']  = 'pelanggan not found';
            return JsonResponse::withJson($response, $result, 404);
        }

        $pelanggan->delete();

        $result['status']   = true;
        $result['message']     = 'pelanggan deleted successfully';
        
        return JsonResponse::withJson($response, $result, 200);
    }
}