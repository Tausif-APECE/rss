<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $finalResult = [];
        $limitCounter = 10;
        $string = "";
        $excludeArr = ['the', 'be', 'to', 'of', 'and', 'a', 'in', 'that', 'have', 'i',
            'it', 'for', 'not', 'on', 'with', 'he', 'as', 'you', 'do', 'at', 'this',
            'but', 'his', 'by', 'from', 'they', 'we', 'say', 'her', 'she', 'or', 'an',
            'will', 'my', 'one', 'would', 'there', 'their', 'so', 'up', 'what', 'out',
            'if', 'about', 'who', 'get', 'which', 'go', 'me'];

        $url = 'https://www.theregister.co.uk/software/headlines.atom';

        $xml = simplexml_load_file($url);

        foreach ($xml->entry as $entry) {
            $string .= strip_tags($entry->author->name) . " ";
            $string .= strip_tags($entry->title) . " ";
            $string .= strip_tags($entry->summary) . " ";
        }

        $words = explode(" ", strtolower($string));

        $filterdWords = array_filter($words, function ($item) use ($excludeArr) {
            return !in_array($item, $excludeArr) && !empty($item);
        });

        $wordCountArray = array_count_values($filterdWords);

        while ($limitCounter >= 1) {
            $value = max($wordCountArray);
            $key = array_search($value, $wordCountArray);
            $finalResult[$key] = $value;
            unset($wordCountArray[$key]);
            $limitCounter--;
        }
        return view('feed_list',compact('finalResult'));
    }

}
