<?php

namespace PierreMiniggio\HTMLTrimmer;

use PHPHtmlParser\Dom;
use PHPHtmlParser\Dom\TextNode;

class HTMLTrimmer
{
    public function trimTagsAndRemoveTagContent(string $html): string
    {
        $dom = new Dom();
        $dom->load($html);
        $htmlElements = $dom->find('*');
        foreach ($htmlElements as $htmlElement) {
            if (! $htmlElement instanceof TextNode) {
                $htmlElement->delete();
            }    
        }
        return $dom->outerHtml;
    }
}
