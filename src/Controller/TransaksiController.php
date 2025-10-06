<?php

namespace App\Controller;

use App\Model\Transaksi;
use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


final class TransaksiController
{
    
        

   public function index(Request $request, Response $response): Response
    {
        $transaksi = Transaksi::with('pelanggan','barang')->get();

        $result['status']   = true;
        $result['data']     = [
            'message' => 'This is transaksi Controller',
            'transaksi' => $transaksi
        ];
        
        return JsonResponse::withJson($response, $result, 200);
    }
    public function store(Request $request, Response $response): Response
    {
        $data = (array)$request->getParsedBody();

        $transaksi = Transaksi::create($data);

        $result['status']   = true;
        $result['data']     = [
            'message' => 'transaksi created successfully',
            'transaksi' => $transaksi
        ];
        
        return JsonResponse::withJson($response, $result, 201);
    }
    public function update(Request $request, Response $response, array $args): Response
    {
        $id = (int)$args['id'];
        $data = (array)$request->getParsedBody();

        $transaksi = Transaksi::where('id',$id)->first();
        if (!$transaksi) {
            $result['status']   = false;
            $result['data']     = [
                'message' => 'transaksi not found'
            ];
            return JsonResponse::withJson($response, $result, 404);
        }

        $transaksi->update($data);

        $result['status']   = true;
        $result['data']     = [
            'message' => 'transaksi updated successfully',
            'transaksi' => $transaksi
        ];
        
        return JsonResponse::withJson($response, $result, 200);
    }
    public function destroy(Request $request, Response $response, array $args): Response
    {
        $id = (int)$args['id'];

        $transaksi = Transaksi::where('id',$id)->first();
        if (!$transaksi) {
            $result['status']   = false;
            $result['data']     = [
                'message' => 'transaksi not found'
            ];
            return JsonResponse::withJson($response, $result, 404);
        }

        $transaksi->delete();

        $result['status']   = true;
        $result['data']     = [
            'message' => 'transaksi deleted successfully'
        ];
        
        return JsonResponse::withJson($response, $result, 200);
    }
}