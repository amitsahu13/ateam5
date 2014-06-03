<?php 
//echo SITE_URL.'/img/'.BLOG_IMAGE_SMALL.'small_1366372622';
header("Content-Type: application/rss+xml; charset=utf-8");
$rssfeed = '<?xml version="1.0" encoding="utf-8" ?>';
$rssfeed .= '<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/" version="2.0"> ';
$rssfeed .= '<channel>';
$rssfeed .= '<title>My RSS feed</title>';
$rssfeed .= '<link>http://www.mywebsite.com</link>';
$rssfeed .= '<description></description>';
$rssfeed .= '<language>en-us</language>';
if(!empty($blog_feed_data)){
	foreach($blog_feed_data as $key=>$value){
		$des=$this->Text->truncate(trim(strip_tags($value['Blog']['article'])),200);		
		$rssfeed .= '<item>';			
        $rssfeed .= '<title>'.trim(htmlentities($value['Blog']['title'])).'</title>';
        $rssfeed .= '<description><![CDATA[' .$des. ']]></description>';
		$rssfeed .= '<link>'.SITE_URL.'/blogs/detail/'.$value['Blog']['id'].'</link>';
        $rssfeed .= '<pubDate>' . date("d M Y", strtotime($value['Blog']['created'])).'</pubDate>';	
		$rssfeed .= '<media:thumbnail url="'.SITE_URL.'/img/'.BLOG_IMAGE_SMALL.'small_'.$value['Blog']['post_img'].'"/>';		
		$rssfeed .= '</item>';	
		
		/* $rssfeed .= '<image>';
		$rssfeed .= '<url>"'.SITE_URL.'/img/'.BLOG_IMAGE_SMALL.'small_'.$value['Blog']['post_img'].'"</url>';
		$rssfeed .= '<link>'.SITE_URL.'/blogs/detail/'.$value['Blog']['id'].'</link>';
		$rssfeed .= '</image>'; */
		
	}
}
	$rssfeed .= '</channel>';
    $rssfeed .= '</rss>';
 
    echo $rssfeed; 