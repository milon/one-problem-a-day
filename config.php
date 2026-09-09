<?php

use Illuminate\Support\Str;

$postMarkdownBody = function ($page) {
    static $bodies = [];
    static $files;

    $filename = $page->getFilename();

    if (array_key_exists($filename, $bodies)) {
        return $bodies[$filename];
    }

    if ($files === null) {
        $files = [];
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(__DIR__.'/source/_posts', FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'md') {
                $files[$file->getBasename('.md')] = $file->getPathname();
            }
        }
    }

    $raw = isset($files[$filename]) ? file_get_contents($files[$filename]) : '';

    if (preg_match('/^---\R.*?\R---\R?/s', $raw, $matches)) {
        $raw = substr($raw, strlen($matches[0]));
    }

    return $bodies[$filename] = $raw;
};

$parseComplexity = function ($page) use ($postMarkdownBody) {
    $content = $postMarkdownBody($page);

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

$excerptFromMarkdown = function (string $markdown, int $length) {
    $text = preg_replace('/```[\s\S]*?```/', ' ', $markdown);
    $text = preg_replace('/^#{1,6}\s.*$/m', ' ', $text);
    $text = preg_replace('/\[(.*?)\]\([^)]*\)/', '$1', $text);
    $text = preg_replace('/<br\s*\/?>/i', ' ', $text);
    $text = html_entity_decode(strip_tags($text));
    $text = trim(preg_replace('/\s+/', ' ', $text));

    if (strlen($text) <= $length) {
        return $text;
    }

    return preg_replace('/\s+?(\S+)?$/', '', substr($text, 0, $length)).'...';
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
                static $byCategory;

                if ($byCategory === null) {
                    $byCategory = [];

                    foreach ($allPosts as $post) {
                        foreach ($post->categories ?? [] as $category) {
                            $byCategory[$category][] = $post;
                        }
                    }
                }

                return collect($byCategory[$page->getFilename()] ?? []);
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
        static $dates = [];
        $key = $page->getPath();

        return $dates[$key] ??= Datetime::createFromFormat('U', $page->date);
    },
    'getExcerpt' => function ($page, $length = 255) use ($postMarkdownBody, $excerptFromMarkdown) {
        if ($page->excerpt) {
            return $page->excerpt;
        }

        static $excerpts = [];
        $key = $page->getFilename().':'.$length;

        return $excerpts[$key] ??= $excerptFromMarkdown($postMarkdownBody($page), $length);
    },
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'getComplexity' => function ($page) use ($parseComplexity) {
        static $complexities = [];
        $key = $page->getFilename();

        return $complexities[$key] ??= $parseComplexity($page);
    },
    'viteAsset' => function ($page, $entry, $type = 'file') {
        static $manifest;

        if ($manifest === null) {
            $manifestPath = __DIR__.'/source/assets/build/.vite/manifest.json';

            if (!file_exists($manifestPath)) {
                throw new RuntimeException('Vite manifest not found. Run bun run build:assets first.');
            }

            $manifest = json_decode(file_get_contents($manifestPath), true);
        }

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
