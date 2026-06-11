<?php
/**
 * Loads all football news articles from the static JSON database.
 * 
 * @return array List of articles
 */
function get_all_news() {
    $jsonPath = __DIR__ . '/content.json';
    if (!file_exists($jsonPath)) {
        return [];
    }
    $jsonData = file_get_contents($jsonPath);
    return json_decode($jsonData, true) ?: [];
}

/**
 * Filters news articles by a specific category.
 * 
 * @param string $category The category name to filter by
 * @return array Filtered list of articles
 */
function get_news_by_category($category) {
    $news = get_all_news();
    return array_values(array_filter($news, function($item) use ($category) {
        return strtolower($item['category']) === strtolower($category);
    }));
}

/**
 * Fetches all trending news articles.
 * 
 * @return array List of trending articles
 */
function get_trending_news() {
    $news = get_all_news();
    return array_values(array_filter($news, function($item) {
        return isset($item['trending']) && strtolower($item['trending']) === 'yes';
    }));
}

/**
 * Fetches an article by its unique ID.
 * 
 * @param int|string $id The ID of the article
 * @return array|null The article data or null if not found
 */
function get_news_by_id($id) {
    $news = get_all_news();
    foreach ($news as $item) {
        if (isset($item['id']) && (string)$item['id'] === (string)$id) {
            return $item;
        }
    }
    return null;
}
?>
