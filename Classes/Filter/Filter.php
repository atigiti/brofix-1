<?php
declare(strict_types = 1);

namespace Sypets\Brofix\Filter;

class Filter {
    protected  $url_filtre = '';
    protected  $uid_filtre = '';
    protected  $title_filter = '';

    // Getters and Setters

    public function getUrlFilter() : string {
        return $this->url_filtre;
    }
    public function getUidFilter() : string {
        return $this->uid_filtre;
    }

    public function getTitleFilter() : string {
        return $this->title_filter;
    }

    public function setUrlFilter(string $url_filter) : void {
        $this->url_filtre = $url_filter;
    }

    public function setUidFilter(string $uid_filter) : void {
        $this->uid_filtre = $uid_filter;
    }

    public function setTitleFilter( string $title_filter) : void {
         $this->title_filter = $title_filter;
    }

}