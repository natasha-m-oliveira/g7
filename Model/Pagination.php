<?php
namespace PhpLogin;

class Pagination
{
    /**
     * Maximum number of records per page
     * @var integer
     */
    private $limit;

    /**
     * Total amount of bank results
     * @var integer
     */
    private $results;

    /**
     * Number of pages
     * @var integer
     */
    private $pages;

    /**
     * Current page
     * @var integer
     */
    private $currentPage;

    /**
     * Class constructor
     * @param integer $results
     * @param integer $currentPage
     * @param integer $limit
     */
    
    public function __construct($results, $currentPage = 1, $limit = 10)
    {
        $this->results      = $results;
        $this->limit        = $limit;
        $this->currentPage = (is_numeric($currentPage) && $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }
    
    /**
     * Method responsible for calculating pagination
     */
    private function calculate()
    {
        /*Calculate total pages*/
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

        /* Checks that the current page does not exceed the number of pages*/
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
    }

    /**
     * Method responsible for returning the limit clause in sql
     * @return string
     */
    public function getLimit()
    {
        $offset = ($this->limit * ($this->currentPage - 1));
        return $offset.','.$this->limit;
    }

    /**
     * Method responsible for returning available page options
     * @return array
     */
    public function getPages()
    {
        //Does not return pages
        if($this->pages == 1) return [];

        //Pages
        $pages = [];

        for($i = 1; $i <= $this->pages; $i++){
            $pages[] = [
                'page' => $i,
                'current' => $i == $this->currentPage
            ];
        }

        return $pages;
    }
}