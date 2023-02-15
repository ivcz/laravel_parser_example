<?php

namespace App\Jobs;

use App\Models\BlogpostStored;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

use Exception;
use DOMDocument;
use DOMXPath;

class ParsePosts implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected int $postId;
    protected string $site;

    public function __construct(string $site, int $postId)
    {
        $this->postId = $postId;
        $this->site = $site;

        $this->onQueue('parse');
    }

    public function handle()
    {
        $page = Http::get("{$this->site}/{$this->postId}");
        $doc = new DOMDocument;
        $doc->loadHTML($page);
        $xpath = new DOMXPath($doc);
        $detail = $xpath->query("//*[@class='blogpost']")->item(0);
        $vals = [
            'title' => trim($xpath->query("div[@class='blogpost__title']", $detail)->item(0)->nodeValue),
            'text' => trim($xpath->query("div[@class='blogpost__text']", $detail)->item(0)->nodeValue),
            'post_date' => Carbon::parse(trim($xpath->query("div[@class='blogpost__date']", $detail)->item(0)->nodeValue)),
            'last_parse' => now(),
            'post_id' => $this->postId,
        ];

        $exists = BlogpostStored::where('post_id', $this->postId)->first();
        if ($exists) {
            $exists->update($vals);
        } else {
            BlogpostStored::create($vals);
        }
    }
}
