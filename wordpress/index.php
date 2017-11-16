<?php
get_header();

if(is_front_page()){
    // página fixa pra HOME
    get_template_part( 'include', 'home' );
} elseif(is_singular()) {
    // páginas normais, sem template
    include( get_page_template() );
} else {
    // cai nas páginas templates
}

get_footer();
?>