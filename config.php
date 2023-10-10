<?php

use Illuminate\Support\Str;

return [
    'baseUrl' => 'http://one-problem-a-day.test',
    'production' => false,
    'siteName' => 'One problem a day',
    'siteDescription' => 'Solve one problem per day',

    // collections
    'collections' => [
        'posts' => [
            'sort' => '-date',
            'type' => 'article',
            'path' => 'problems/{filename}',
        ],
        'template' => [
            'type' => 'template',
            'path' => 'template/{filename}',
        ],
        'categories' => [
            'path' => '/categories/{filename}',
            'sort' => '-date',
            'posts' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
                });
            },
        ],
    ],

    // Number of collection items to show per page
    'perPage' => 10,

    // Number of links in the pagination section, should be a odd number greater than or equals to 3
    'paginatationLinkNumber' => 5,

    // Google Analytics Tracking Id. For example, UA-123456789-1
    'gaTrackingId' => 'G-DPNYL8WECN',

    // helpers
    'getDate' => function ($page) {
        return Datetime::createFromFormat('U', $page->date);
    },
    'getExcerpt' => function ($page, $length = 255) {
        if ($page->excerpt) {
            return $page->excerpt;
        }

        $content = preg_split('/<!-- more -->/m', $page->getContent(), 2);
        $cleaned = trim(
            strip_tags(
                preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content[0]),
                '<code>'
            )
        );

        if (count($content) > 1) {
            return $cleaned;
        }

        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    },
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
];
