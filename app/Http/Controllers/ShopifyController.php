<?php

namespace App\Http\Controllers;

use App\shopify;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShopifyController extends Controller
{
    
    public function handlePost(Request $request)
    {
     
            return view ('login');
    }



    
    public function create(Request $request)
    {
      $data = $request->except('_token');
        $shop = $data['name'];
        $client_id = env('SHOPIFY_CLIENT_ID');
        $scope=env('SHOPIFY_SCOPE');
        $redirect = env('SHOPIFY_REDIRECT');

        $url = "https://{$shop}.myshopify.com/admin/oauth/authorize?client_id={$client_id}&scope={$scope}&redirect_uri={$redirect}&state={nonce}&grant_options[]={access_mode}";
           return redirect($url);
    }

 




    public function redirect(Request $request)
    {
        $data = $request->except('_token');
        $shop = $data['shop'];
        $body = [
                
                    'client_id'=>env('SHOPIFY_CLIENT_ID'),
                    'client_secret'=> env('SHOPIFY_SECRET'),
                    'code'=>$data['code']
                
        ];
    
       $client = new Client([
            'base_uri' => "https://{$shop}/",
            'headers' => [
                'Accept' => 'application/json',
                'Content-type' => 'application/json',
            ]
        ]);
        $product = $client->post('admin/oauth/access_token',[
            'body'=>json_encode($body)
        ]);
            $rr=json_decode($product->getBody(), true);
            $token = $rr['access_token'];

            $request->session()->put('access_token',$token);

            return redirect('/get-product');
          
    }

   




    public function product(Request $request)
    {
         $client = new Client([
            'base_uri' => 'https://teskha.myshopify.com/',
            'headers' => [
                'X-Shopify-Access-Token' => $request->session()->get('access_token'),
            ]
        ]);
         $product = $client->get('admin/api/2020-01/products.json');

         dd(json_decode($product->getBody(), true));
    }

}
