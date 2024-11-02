<?php
class SynoDLMSearchArchiveOrg {

    private $qurl = 'https://archive.org/advancedsearch.php?q=';

    public function __construct() {}

    /**
     * Prepare the cURL request by setting the URL and options.
     *
     * @param $curl object - The cURL connection handle.
     * @param $query string - The search query input by the user.
     */
    public function prepare($curl, $query) {
        // Construct the search URL with the query and desired fields
        $url = $this->qurl . urlencode($query) . '&fl[]=identifier&fl[]=title&fl[]=downloads&output=json&rows=5000';
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
    }

    /**
     * Parse the response from Archive.org and add results to the plugin.
     *
     * @param $plugin object - The plugin class instance.
     * @param $response string - The response from the server.
     * @return int - The number of results successfully parsed and added.
     */
    public function parse($plugin, $response) {
        $results = json_decode($response, true);
        $count = 0;

        if (isset($results['response']['docs'])) {
            foreach ($results['response']['docs'] as $item) {
                $title = $item['title'] ?? 'Unknown Title';
                $identifier = $item['identifier'] ?? '';
                $download = "https://archive.org/download/$identifier";

                // Add each parsed result to the plugin
                $plugin->addResult($title, $download, 0, '', '', '', 0, 0, '');
                $count++;
            }
        }

        // Return the total count of results added
        return $count;
    }
}
?>