<?php

namespace App\Service;

use Symfony\Component\Cache\Adapter\AdapterInterface;
use Michelf\MarkdownInterface;

class MarkdownHelper
{
    private $cache;
    private $markdown;

    public function __construct(AdapterInterface $cache, MarkdownInterface $markdown)
    {
        $this->cache = $cache;
        $this->markdown = $markdown;
    }

    public  function parse(string $source): string
    {
        $item = $this->cache->getItem('mark_'.md5($source));
        if (!$item->isHit()) {
            $item->set($this->markdown->transform($source));
            $this->cache->save($item);
        }
        return $item->get();
    }
}