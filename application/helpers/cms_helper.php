<?php

$this->data = '';

function meta_title($string = NULL) {
    $CI = & get_instance();
    $CI->config->item('site_name');
    //$meta_title= e($string) . '-' .$CI->config->item('site_name');
    $meta_title = count(e($string)) > 0 ? e($string) . ' | ' . $CI->config->item('site_name') : $CI->config->item('site_name');
    return $meta_title;
}

function meta_keywords() {
    $meta_keywords = 'developer computing data networking security kenya agent ';
    return $meta_keywords;
}

function meta_keywordspre() {
    $meta_keywordspre = 'dioscovite sickle cell anaemia cure kenya supplier Thiocyanate sulfocyanate cassava yam protein';
    return $meta_keywordspre;
}

function btnplay($uri, $btneditstring = NULL) {
    return anchor($uri, '<i class="glyphicon glyphicon-play-circle"></i>' . $btneditstring);
}

function btnedit($uri, $btneditstring = NULL) {
    return anchor($uri, '<i class="glyphicon glyphicon-edit"></i>' . $btneditstring);
}

function btndelete($uri, $btndeletestring = NULL) {
    return anchor($uri, '<i class="glyphicon glyphicon-trash"></i>' . $btndeletestring, array('onclick' => "return confirm('"
        . "You are about to delete permanently.This action is irreversible.Are you sure?');"));
}

function btnblock($uri, $blockinstring = NULL) {
    return anchor($uri, '<i class="glyphicon glyphicon-eye-close"></i>' . $blockinstring);
}

function btnunblock($uri, $blockinstring = NULL) {
    return anchor($uri, '<i class="glyphicon glyphicon-eye-open"></i>' . $blockinstring);
}

function articles_link($articles) {
    $string = '<ul class="nav nav-sidebar">';

    foreach ($articles as $article) {
        $url = article_link($article);
        $string .= '<li>';
        $string .= '<h4>' . anchor($url, e($article->title)) . '</h4>';
        $string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
        $string .= '</li>';
    }

    $string .= '</ul>';
    return $string;
}

function get_excerpt($article, $homepage = true, $numwords = 50, $DIVclass = NULL, $ULclass = NULL, $LItitleclass = NULL, $LIbodyclass = NULL) {
    /* this function returns an excerpt for the article */
    $string = '';
    $url = 'article/' . intval($article->id) . '/' . e($article->slug);    /* url to read more of the article(full article) */

    if ($homepage) {

        $imagefile = strlen(e($article->image_thumbnail)) < 1 ? site_url('assets/images/image_missing.png') : site_url(e($article->image_thumbnail));   /* file existence or not */
        $string .= '<div class="' . $DIVclass . '">';                                                /* holds this entire article's data */
        $string .= '<img src= "' . $imagefile . '" alt ="' . e($article->title) . '"><br/>';
        $string .= '<ul class = "' . $ULclass . '">';
        $string .= '<li class = "' . $LItitleclass . '">';
        $string .= anchor($url, limit_to_numwords(e(strip_tags($article->title)), 7));
        $string .= '</li>';
        $string .= '<li class = "' . $LIbodyclass . '">';
        $string .= limit_to_numwords(e(strip_tags($article->body)), $numwords) . ' ';
        $string .= anchor($url, 'Read more -->', array('title' => e(strip_tags($article->title))));
        $string .= '</li>';
        $string .= '</ul>';
        $string .= '</div>';
    } else {

        $string .= '<h2>' . anchor(e($url), e($article->title)) . '</h2>';   /* heading of the article */
        $string .= '<p>' . limit_to_numwords(e(strip_tags($article->body)), $numwords) . '</p>';
        $string .= anchor($url, 'Read more -->', array('title' => e(strip_tags($article->title))));
    }

    return $string;
}

function get_category($array, $child = FALSE) {
    /* this function returns a menu navigation bar:style it to suit your needs */
    $str = '';
    $CI = & get_instance();

    /* classes in this function  for example 'nav,dropdown-menu,dropdown,active,dropdwon-toggle'
     *  can be dropped or edited to suit every user needs and their personal css */

    if (count($array)) {
        //$str .= $child==false? '<ul class="nav navbar-nav">'.PHP_EOL:'<ul class="dropdown-menu">'.PHP_EOL;

        foreach ($array as $item) {

            //$active = $CI->uri->segment(1) == $item['page_url'] ? true : false ;
            $str .='<ul class="nav nav-sidebar"><h3 class="lileftnavhead">' . $item['category_name'] . '</h3>';

            if (isset($item['children']) && count($item['children'])) {
                foreach ($item['children'] as $child) {
                    $str .= '<li class="lileftnav">' . anchor('project/getwhere/' . $child['id'] . '/' . url_title($child['category_name']), $child['category_name']) . '</li>' . PHP_EOL;
                }
            }


            /* if(isset($item['children']) && count($item['children'])){
              $str .= $active ? '<li class= "dropdown active">' : '<li class= "dropdown">' ;
              $str .= '<a class= "dropdown-toggle " data-toggle="dropdown" href="'.site_url(e($item['page_url'])).'">'.e($item['title']);
              $str .= '<b class="caret"></b></a>'.PHP_EOL;
              $str .= get_menu($item['children'],TRUE);
              }else{
              $str .= $active ? '<li class="active">' : '<li>';
              $str .= '<a href="'.  site_url(e($item['page_url'])).'">'.e($item['title']).'</a>';
              }
             */
            $str .= '</ul>' . PHP_EOL;
            //$str .= '</li>'.PHP_EOL;
        }

        //$str .= '</ul>'.PHP_EOL;
    }
    return $str;
}

function get_menu($array, $child = FALSE) {
    /* this function returns a menu navigation bar:style it to suit your needs */
    $str = '';
    $CI = & get_instance();

    /* classes in this function  for example 'nav,dropdown-menu,dropdown,active,dropdwon-toggle'
     *  can be dropped or edited to suit every user needs and their personal css */

    if (count($array)) {
        $str .= $child == false ? '<ul class="nav navbar-nav">' . PHP_EOL : '<ul class="dropdown-menu">' . PHP_EOL;

        foreach ($array as $item) {

            $active = $CI->uri->segment(1) == $item['page_url'] ? true : false;

            if ($item['page_url'] == 'homepage') {
                $active = $CI->uri->segment(1) == '' || $CI->uri->segment(1) == 'homepage' ? true : false;
            }




            if (isset($item['children']) && count($item['children'])) {
                $str .= $active ? '<li class= "dropdown active">' : '<li class= "dropdown">';
                $str .= '<a class= "dropdown-toggle " data-toggle="dropdown" href="' . site_url(e($item['page_url'])) . '">' . e($item['title']);
                $str .= '<b class="caret"></b></a>' . PHP_EOL;
                $str .= get_menu($item['children'], TRUE);
            } else {
                $str .= $active ? '<li class="active">' : '<li>';
                $str .= '<a href="' . site_url(e($item['page_url'])) . '">' . e($item['title']) . '</a>';
            }

            $str .= '</li>' . PHP_EOL;
        }

        $str .= '</ul>' . PHP_EOL;
    }
    return $str;
}

function get_parent_menu($array) {
    $str = '';
    $CI = & get_instance();

    /* classes in this function  for example 'nav,dropdown-menu,dropdown,active,dropdwon-toggle'
     *  can be dropped or edited to suit every user needs and their personal css */

    if (count($array)) {

        foreach ($array as $item) {

            $active = isset($item['slug']) && $CI->uri->segment(1) === $item['slug'] ? true : false;    //mine

            if (isset($item['children']) && count($item['children']) && isset($item['slug']) && isset($item['title'])) {
                $str .= $active ? '<a class="active" href="' . site_url(e($item['slug'])) . '">' . strtoupper(e($item['title'])) . '</a>' :
                        '<a href="' . site_url(e($item['slug'])) . '">' . strtoupper(e($item['title'])) . '</a>';
            } elseif (isset($item['slug']) && isset($item['title'])) {
                $str .= $active ? '<a class="active" href="' . site_url(e($item['slug'])) . '">' . strtoupper(e($item['title'])) . '</a>' :
                        '<a href="' . site_url(e($item['slug'])) . '">' . strtoupper(e($item['title'])) . '</a>' . PHP_EOL;
            }
        }
    }

    return $str;
}

//$childexistence = false ;
function get_children_menu($array, $childexistence = false) {
    $str = '';
    $CI = & get_instance();

    /* classes in this function  for example 'nav,dropdown-menu,dropdown,active,dropdwon-toggle'
     *  can be dropped or edited to suit every user needs and their personal css */

    if (count($array)) {

        foreach ($array as $item) {
            $active = isset($item['slug']) && $CI->uri->segment(1) === $item['slug'] ? true : false;    //mine
            if (isset($item['children']) && count($item['children'])) {
                $str .= get_children_menu($item['children'], TRUE);
                //$childexistence = true;
            } elseif ($childexistence === true) {
                $str .= $active ? '<a class="active" href="' . site_url(e($item['slug'])) . '">' . strtolower(e($item['title'])) . '</a>' :
                        '<a href="' . site_url(e($item['slug'])) . '">' . strtolower(e($item['title'])) . '</a>' . PHP_EOL;
            }
        }
    }

    return $str;
}

function add_meta_title($string) {
    $CI = & get_instance();
    $CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title'];
}

function btn_edit($uri) {
    return anchor($uri, '<i class="glyphicon glyphicon-edit"></i>');
}

function btn_delete($uri) {
    return anchor($uri, '<i class="fa fa-trash"></i>' . ' Delete', array('class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('you are about to delete a record. this cannot be undone. Are you sure?');"
    ));
}

function btn_block($uri) {
    return anchor($uri, '<i class="icon-eye-close"></i>');
}

//link to articles articles in front pages
function article_link_front($article) {
    return 'articles/viewart/' . intval($article->id) . '/' . e($article->slug);
}

function article_links($articles) {
    $string = '<ul class="main-article">';
    foreach ($articles as $article) {
        $url = article_link($article);
        $string .= '<li>';
        $string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
        $string .= '<p>' . anchor($url, ucfirst(e($article->title)) . ' ' . '<i class="fa fa-angle-double-right">' . '</i>') . '</p>';
        $string .= '</li>';
    }
    $string .= '</ul>';
    return $string;
}

function work_link($work) {
    return 'sitemanagement/works/single/' . intval($work->id) . '/' . $work->slug;
}

///get limited in frontend
function get_article_excerpt_front($article, $numwords = 50) {
    $string = '';
    $url = article_link_front($article);
    $string .='<article class="article">';
    $string .= '<h2 class="text text-capitalize">' . anchor($url, ucfirst(e($article->title))) . '</h2>';
    $string.='<em class="timestamp">' . '<i class="fa fa-calendar"></i>' . '  ' . date('F d, Y', strtotime($article->pubdate)) . '</em>';
    $string .='<p>' . ucfirst(limit_to_numwords(strip_tags($article->body), $numwords)) . '</p>';
    $string .='<div class="clearfix"></div>';
    $string .= anchor($url, 'Read More', 'class="btn readmore pull-right"');
    $string .='<div class="clearfix"></div>';
    $string .='</article>';
    return $string;
}

//get full in frontend
function get_article_excerpt_front_full($article) {
    $string = '';
    $string .='<article class="article">';
     $string .= '<h2 class="text text-info">' . ucfirst(e($article->title)) . '</h2>';
    $string.='<em class="timestamp">' . '<i class="fa fa-calendar"></i>' . ' ' . $article->pubdate . '</em>';
    $string .='<p>' . ucfirst($article->body) . '</p>';
    $string .='<div class="clearfix"></div>';

    $string .='<div class="clearfix"></div>';
    $string .='<div class = "sharebtns">';

//    $string .='<div style="margin-top:-6px">';
////    $string .='<div class = "fb-share-button" data-href = "' . site_url('articles/viewart') . '/' . $article->id . '/' . $article->slug . '" data-layout = "button_count"></div>';
//    $string .='</div>';
//
////    $string .='<div>';
////    $string .='<a href"' . site_url('articles/viewart') . '/' . $article->id . '/' . $article->slug . '" class="twitter-share-button" data-via="routinehealth99">' . 'Tweet' . '</a>';
//    $string.='</div>';
//
////    $string .='<div class = "g-plus" data-action = "share" data-annotation="bubble" data-href = "' . site_url('articles/viewart') . '/' . $article->id . '/' . $article->slug . '">';
//    $string .='</div>';
//
//    $string .='</div>';

    $string .='<div class="clearfix"></div>';
    $string .='<hr>';
    $string .='<div class="clearfix"></div>';
//    $string .='<div class="fb-comments" data-href="' . site_url('articles/viewart') . '/' . $article->id . '/' . $article->slug . '" data-numposts="7" data-version="v2.3"></div>';

    $string .='</article>';

    return $string;
}

function get_article_excerpt_front_sidebar($article, $numwords = 30) {
    $string = '';
    $url = article_link_front($article);
    $string .='<article class="related-side">';
    $string.='<em class="timestamp">' . '<i class="glyphicon glyphicon-calendar"></i>' . '  ' . $article->pubdate . '</em>';
    $string .= '<p class="article-title-a">' . anchor($url, ucfirst(e(limit_to_numwords($article->title, 5)))) . '</p>';
    $string .='<p>' . ucfirst(limit_to_numwords($article->body, $numwords)) . anchor($url, '[Read More]') . '</p>';
    $string .='</article>';
    return $string;
}

//links to articles and events in admin pages
function article_link($article) {
    return 'articles/admin/viewart/' . intval($article->id) . '/' . e($article->slug);
}

///fetch new/article with limeted words in admin panel
function get_article_excerpt($article, $numwords = 50) {

    $string = '';
    $url = article_link($article);
    $string.='<p class="timestamp">' . '<i class="fa fa-calendar"></i>' . '  ' . $article->pubdate . '</p>';
    $string .= '<h4 class="">' . anchor($url, ucfirst(e($article->title))) . '</h4>';
    $string .='<p>' . ucfirst(limit_to_numwords($article->body, $numwords)) . anchor($url, ' [Read More]') . '</p>';
    return $string;
}

function get_article_excerpt_full($article) {
    $string = '';
    $string.='<p class="timestamp">' . '<i class="fa fa-calendar"></i>' . '  ' . $article->pubdate . '</p>';
    $string .= '<h3 class="text text-info">' . ucfirst(e($article->title)) . '</h3>';
    $string .='<p>' . ucfirst($article->body) . '</p>';
    $string .='<div class="clearfix">' . '</div>';
    return $string;
}

function get_popular_articles($article, $numwords = 30) {

    $string = '';
    $url = article_link_front($article);
    $string .='<article class="article">';
    //$string.='<p class="timestamp">' . '<i class="fa fa-calendar"></i>' . '  ' . $article->pubdate . '</p>';
    $string .= '<h5 class="text text-info">' . '<i class="fa fa-star"></i> ' . anchor($url, ucfirst(e($article->title))) . '</h5>';
    //$string .='<p>' . ucfirst(limit_to_numwords($article->body, $numwords)) . ' ' . anchor($url, '[Read More]') . '</p>';
    $string .= '<div class="clearfix">' . '</div>';
    $string .='</article>';
    return $string;
}

///fetch new/article with limeted words in admin panel
function get_work_excerpt($work, $numwords = 50) {

    $string = '';
    $url = work_link($work);
    $string .= '<h4 class="">' . anchor($url, ucfirst(e($work->title))) . '</h4>';
    $string .='<p>' . ucfirst(limit_to_numwords($work->description, $numwords)) . anchor($url, ' [Read More]') . '</p>';
    return $string;
}

function get_work_excerpt_full($work) {
    $string = '';
    $string .= '<h3 class="text text-info">' . ucfirst(e($work->title)) . '</h3>';
    $string .='<p>' . ucfirst($work->description) . '</p>';
    $string .='<div class="clearfix">' . '</div>';
    return $string;
}

//limit number of words displayed
function limit_to_numwords($string, $numwords) {
    $excerpt = explode(' ', $string, $numwords + 1);
    if (count($excerpt) >= $numwords) {
        array_pop($excerpt);
    }
    $excerpt = implode(' ', $excerpt);
    return $excerpt;
}

function e($string) {
    return htmlentities($string);
}

/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {

    function dump($var, $label = 'Dump', $echo = TRUE) {
// Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
// Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
// Output
        if ($echo == TRUE) {
            echo $output;
        } else {
            return $output;
        }
    }

}


if (!function_exists('dump_exit')) {

    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump($var, $label, $echo);
        exit;
    }

}

    