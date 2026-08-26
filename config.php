<?php

use Illuminate\Support\Str;

$parseComplexity = function ($page) {
    $content = preg_replace('/<br\s*\/?>/i', "\n", $page->getContent());
    $content = html_entity_decode(strip_tags($content));

    $extract = function (string $label) use ($content) {
        $bigO = 'O\((?:[^()\r\n]|\([^()\r\n]*\))*\)';

        if (!preg_match('/'.$label.'\s+complexity[^\r\n]{0,100}?('.$bigO.')/i', $content, $matches)) {
            return null;
        }

        return trim($matches[1]);
    };

    $time = $extract('time');
    $space = $extract('space');
    $normalizedTime = strtolower(preg_replace('/[\s*]/', '', $time ?? ''));

    $bucket = match (true) {
        !$time => 'unknown',
        $normalizedTime === 'o(1)' => 'constant',
        (bool) preg_match('/\d+\^[nmk]|!/', $normalizedTime) => 'exponential',
        str_contains($normalizedTime, 'n²') || str_contains($normalizedTime, 'n^2') || str_contains($normalizedTime, 'n*n') => 'quadratic',
        str_starts_with($normalizedTime, 'o(log') => 'logarithmic',
        str_contains($normalizedTime, 'log') && preg_match('/[nm]/', $normalizedTime) => 'linearithmic',
        preg_match('/^o\([nmk](?:[+\-][nmk])?\)$/', $normalizedTime) => 'linear',
        default => 'other',
    };

    return [
        'time' => $time,
        'space' => $space,
        'bucket' => $bucket,
    ];
};

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
    'getComplexity' => function ($page) use ($parseComplexity) {
        return $parseComplexity($page);
    },
    'viteAsset' => function ($page, $entry, $type = 'file') {
        $manifestPath = __DIR__.'/source/assets/build/.vite/manifest.json';

        if (!file_exists($manifestPath)) {
            throw new RuntimeException('Vite manifest not found. Run bun run build:assets first.');
        }

        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (!isset($manifest[$entry]['file'])) {
            throw new RuntimeException("Unable to find {$entry} in the Vite manifest.");
        }

        $file = $type === 'css'
            ? ($manifest[$entry]['css'][0] ?? null)
            : $manifest[$entry]['file'];

        if (!$file) {
            throw new RuntimeException("Unable to find the {$type} asset for {$entry}.");
        }

        return '/assets/build/'.$file;
    },

    'contactFormUrl' => 'https://formspree.io/f/xeqnbroz',
];
