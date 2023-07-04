<?php

require_once 'vendor/autoload.php';

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;

echo "Script started\n";

class KProfilesScraper {
    /**
     * @return array<int, array<string, string|null>>
     */
    public function getArticleData(int $pageCount): array {
        $httpClient = HttpClient::create();
        $articles = [];

        for ($page = 1; $page <= $pageCount; $page++) {
            $url = "https://kprofiles.com/page/{$page}/";

            $response = $httpClient->request('GET', $url);
            $content = $response->getContent();

            $crawler = new Crawler($content);
            $articleNodes = $crawler->filter('.herald-lay-f.post');

            $articleNodes->each(function (Crawler $node) use (&$articles) {
                $titleNode = $node->filter('.entry-title a');
                $title = $titleNode->text();
                $url = $titleNode->attr('href');

                $categoryNode = $node->filter('.meta-category a');
                $category = $categoryNode->text();

                $articles[] = [
                    'title' => $title,
                    'url' => $url,
                    'category' => $category
                ];
            });
        }

        return $articles;
    }
}


function main(): void {
    $scraper = new KProfilesScraper();
    $pageCount = 5; // Nombre de pages
    $articles = $scraper->getArticleData($pageCount);

    echo "Liste des articles du site https://kprofiles.com/\n\n";

    foreach ($articles as $index => $article) {
        $title = strval($article['title']);
        $url = strval($article['url']);
        $category = strval($article['category']);

        echo "Article " . ($index + 1) . ": $title\n";
        echo "Category: $category\n";
        echo "URL: $url\n\n";
    }
}

main();