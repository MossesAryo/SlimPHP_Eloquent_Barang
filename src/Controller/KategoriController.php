<?php

namespace App\Controller;

use App\Model\Kategori;
use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


final class KategoriController
{
    
        

   public function index(Request $request, Response $response): Response
    {
        $kategori = Kategori::get();

        $result['status']   = true;
        $result['message']  = 'List of kategori';
        $result['data']     = $kategori;
        
        return JsonResponse::withJson($response, $result, 200);
    }
    public function store(Request $request, Response $response): Response
    {
        $data = (array)$request->getParsedBody();

        $kategori = Kategori::create($data);

        $result['status']   = true;
        $result['message']  = 'Kategori created successfully';
        $result['data']     = $kategori;
        
        return JsonResponse::withJson($response, $result, 201);
    }
    public function update(Request $request, Response $response, array $args): Response
    {
        $id = (int)$args['id'];
        $data = (array)$request->getParsedBody();

        $kategori = kategori::where('id',$id)->first();
        if (!$kategori) {
            $result['status']   = false;
            $result['message']  = 'kategori not found';
            return JsonResponse::withJson($response, $result, 404);
        }

        $kategori->update($data);

        $result['status']   = true;
        $result['message']  = 'kategori updated successfully';
        $result['data']     = $kategori;
        
        return JsonResponse::withJson($response, $result, 200);
    }
    public function destroy(Request $request, Response $response, array $args): Response
    {
        $id = (int)$args['id'];

        $kategori = kategori::where('id',$id)->first();
        if (!$kategori) {
            $result['status']   = false;
            $result['message']  = 'kategori not found';
            return JsonResponse::withJson($response, $result, 404);
        }

        $kategori->delete();

        $result['status']   = true;
        $result['message']  = 'kategori deleted successfully';
        
        return JsonResponse::withJson($response, $result, 200);
    }
}