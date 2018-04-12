<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use xmlDb;

class ProductsController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = xmlDb::connect('database');
    }

    /**
     * Get all products ordered by submitted date
     * @todo: paginate
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $this->db
            ->from('products')
            ->select('*')
            ->orderBy('date', 'ASC');;

        $products = $this->db->getAll();

        return view('products.index')->with('products', collect($products));
    }


    /**
     * Store a newly created product in XML.
     *
     * @param \App\Http\Requests\StoreProductRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {

            $this->db->in('products')->insert([
                'name' => request('name'),
                'quantity' => request('quantity'),
                'price' => request('price'),
                'date' => Carbon::now(),
            ]);


        } catch (\Exception $e) {
            //@todo: Handle errors
            return response()->json([
                'errors' => [
                    'root' => $e->getMessage(),
                ],
            ], $e->getCode());
        }

        return response()->json([
            'data' => [
                'name' => request('name'),
                'quantity' => request('quantity'),
                'price' => request('price'),
            ],
        ], 200);
    }

}
