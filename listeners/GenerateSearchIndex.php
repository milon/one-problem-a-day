<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateSearchIndex
{
    public function handle(Jigsaw $jigsaw)
    {
        $data = collect($jigsaw->getCollection('posts')->map(function ($page) {
            $complexity = $page->getComplexity();

            return [
                'title' => $page->title,
                'categories' => $page->categories,
                'link' => $page->getPath(),
                'snippet' => $page->getExcerpt(),
                'date' => $page->getDate()->format('Y-m-d'),
                'time' => $complexity['time'],
                'space' => $complexity['space'],
                'complexity' => $complexity['bucket'],
            ];
        })->values());

        file_put_contents($jigsaw->getDestinationPath() . '/index.json', json_encode($data));
    }
}
