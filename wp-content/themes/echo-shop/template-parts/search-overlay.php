<?php

?>
<!-- search overlay start -->
<section class="search__area d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="search__wrapper">
                    <div class="search__close">
                        <button class="search-close-btn"><i class="bi bi-x-circle"></i></button>
                    </div>
                    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="search__input">
                            <input name="s" value="<?php echo esc_attr(get_search_query()); ?>" class="form-control" type="text" placeholder="<?php esc_attr_e('Search here...','echo-shop') ?>">
                            <button type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- search overlay end -->