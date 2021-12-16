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
     * This variable set the range between current page and two ending page numbers.
     * @var integer
     */
    private $range;

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
    
    public function __construct($results, $currentPage = 1, $limit = 10, $range = 2)
    {
        $this->results      = $results;
        $this->limit        = $limit;
        $this->range        = $range;
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
    public function getPages($gets)
    {
        if ($this->pages == 1) {
            echo '<a href="?currentPage=1"><button type="button" class="button-light active">1</button></a>';
            return;
        }
        //previous link button
        if ($this->currentPage > 1) {
            echo '<a href="?currentPage='. $this->currentPage-1 . '&' . $gets .'">';
            echo '<button type="button" class="button-light">';
            echo '<i class="fas fa-angle-left"></i>';
            echo '</button>';
            echo '</a>';
        }
        //do ranged pagination only when total pages is greater than the range
        if ($this->pages > $this->range) {
            $start = ($this->currentPage <= $this->range)? 1 : ($this->currentPage - $this->range);
            $end = ($this->pages - $this->currentPage >= $this->range)? ($this->currentPage + $this->range) : $this->pages;
        } else {
            $start = 1;
            $end   = $this->pages;
        }
        //loop through page numbers
        for($i = $start; $i <= $end; $i++){
            echo '<a href="?currentPage='. $i . '&' . $gets .'">';
            echo ($i == $this->currentPage) ? '<button type="button" class="button-light active">' : '<button type="button" class="button-light">';
            echo $i;
            echo '</button>';
            echo '</a>';
        }
        //next link button
        if ($this->currentPage < $this->pages) {
            echo '<a href="?currentPage='. $this->currentPage+1 . '&' . $gets .'">';
            echo '<button type="button" class="button-light">';
            echo '<i class="fas fa-angle-right"></i>';
            echo '</button>';
            echo '</a>';
        }

        return;
    }
}