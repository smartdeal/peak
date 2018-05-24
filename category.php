<?php
$res = get_the_category();

if ($res[0]->category_parent == 31 || $res[0]->slug == 'blog') {
    include (TEMPLATEPATH.'/category-blg.php');
} else {
    include (TEMPLATEPATH.'/archive.php');
}

?>
