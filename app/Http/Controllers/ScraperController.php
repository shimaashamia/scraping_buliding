<?php

namespace App\Http\Controllers;
use Goutte\Client;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    private $results = array();
   public function scraper(){
       $client = new Client();
       $url='https://summerhomes.com/property-alanya?city=190';
    // $url="https://summerhomes.com/apartments-sale-alanya-botanic-garden";
       $page =$client->request('GET',$url);
    //    echo "<pre>";
    //    print_r($page);
    // echo $page->filter('.box-item')->text();
    // echo $page->filter('#propertyList')->text();
    // echo $page->filter('.property-list-area')->text();

    // .property-img-slide
    // $page->filter('.propert-item .card .box-item .card-body')->each(function($item){
    //     dump($item->text());
    //     // return $item->text();
    //     // $this->results[$item->filter('h5')]=$item->filter('.d-flex')->text();

    // });
    $page->filter('.property-list-area .row .propert-item')->each(function($item){
        // $blogUrl        =  $node->find('.url', 0)->attr('href');

        // $screenshotSrc  =  $node->find('.blog-screenshot > img', 0)->attr('src');
    
        // echo $title          =  $item->find('.card-title', 0)->text();
    
        // $previewUrl     =  $node->find('.blog-preview', 0)->attr('href');
        echo  $uri = $item->html(); // $uri value is written below
    // dump($uri);
        // dump($item->text());
        // echo $item->text();
        // $this->results[$item->filter('figure')]=$item->filter('.swiper-lazy')->text();

    });
    // return $this->results;
    // $data = $this->results;
    //    return view('scraper',compact('data'));
   }

   public function scraperdetails(){
    $client = new Client();
 $url="https://summerhomes.com/apartments-sale-alanya-botanic-garden";
    $page =$client->request('GET',$url);
    // echo $page->filter('.sticky')->text();
 
    // property-detail-area sticky
 $page->filter('.container')->each(function($item){
    //  dump($item->text());
     echo  $uri = $item->html();
     // return $item->text();
    //  $this->results[$item->filter('figure')]=$item->filter('.swiper-lazy')->text();
 });

 // return $this->results;
 // $data = $this->results;
 //    return view('scraper',compact('data'));
}
}
