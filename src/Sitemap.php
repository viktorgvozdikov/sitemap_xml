<?php

namespace ModuleBZ;

class Sitemap {
    var $sitemap = [];

    /**
     * @param string $link
     * @param int | string $date
     * @param double $prior
     * @see \ModuleBZ\Sitemap\EChangeFreq
     * @param string $change
     * @return $this
     */
    public function addLink(string $link,$date=null,$prior=null,$change=null){
        $this->sitemap[] = [
            'link'   => $link,
            'date'   => $date,
            'change' => $change,
            'prior'  => $prior,
        ];
        return $this;
    }

    public function echoXml(){
        header("Content-Type: text/xml");
        //header("Expires: Thu, 19 Feb 1998 13:24:18 GMT");
        header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Cache-Control: post-check=0,pre-check=0");
        header("Cache-Control: max-age=0");
        header("Pragma: no-cache");
        echo $this;
    }
    public function __toString() {
        $res = '';
        foreach ($this->sitemap as $v){
            $res .= '<url>'
                .(($c = $v['link'])?   '<loc>'.$c.'</loc>'               :'')
                .(($c = $v['date'])?   '<lastmod>'.(is_numeric($c)?date('Y-m-d',$c):$c).'</lastmod>':'')
                .(($c = $v['change'])? '<changefreq>'.$c.'</changefreq>' :'')
                .(($c = $v['prior'])?  '<priority>'.$c.'</priority>'     :'')
                .'</url>';
        }
        return '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.$res.'</urlset>';
    }

}
