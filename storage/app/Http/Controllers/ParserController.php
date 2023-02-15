<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\BlogpostStored;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Jobs\ParsePosts;

use Exception;
use DOMDocument;
use DOMXPath;

class ParserController extends Controller
{

    protected $targetSite = '172.1.0.10';

    public function __construct(protected BlogpostStored $model)
    {
    }

    public function parse()
    {
        try {
            $this->parseList();

            return response([
                'type' => 'success',
                'message' => 'Parsed',
            ]);
        } catch (Exception $e) {
            report($e);
        }
    }

    protected function parseList()
    {
        $page = Http::get($this->targetSite);
        $doc = new DOMDocument;
        $doc->loadHTML($page);
        $xpath = new DOMXPath($doc);
        $postHrefs = $xpath->query("//*[@class='blogpost-list']/div[@class='blogpost-item']/div[@class='blogpost-item__title']/a/@href");
        foreach ($postHrefs as $hrefNode) {
            $link = $hrefNode->nodeValue;
            $id = (int)filter_var($link, FILTER_SANITIZE_NUMBER_INT);
            ParsePosts::dispatch($this->targetSite, $id);
        }
    }
}
