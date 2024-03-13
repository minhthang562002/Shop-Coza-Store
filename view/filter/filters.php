<div class="dis-none panel-filter w-full p-t-10">
    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
        <div class="filter-col1 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Sort By
            </div>

            <ul>
                <li class="p-b-6">
                    <a href="index.php?act=products" class="filter-link stext-106 trans-04">
                        Default
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="#" class="filter-link stext-106 trans-04 filter-link">
                        Newness
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="index.php?act=price_low_to_high" class="filter-link stext-106 trans-04">
                        Price: Low to High
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="index.php?act=price_high_to_low" class="filter-link stext-106 trans-04">
                        Price: High to Low
                    </a>
                </li>
            </ul>
        </div>

        <div class="filter-col2 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Price
            </div>
            <!-- Price -->
            <ul>
                <li class="p-b-6">
                    <a href="index.php?act=products" class="filter-link stext-106 trans-04 filter-link-active">
                        All
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="index.php?act=filter_price&first=0&second=50" class="filter-link stext-106 trans-04">
                        $0.00 - $50.00
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="index.php?act=filter_price&first=50&second=100" class="filter-link stext-106 trans-04">
                        $50.00 - $100.00
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="index.php?act=filter_price&first=100&second=150" class="filter-link stext-106 trans-04">
                        $100.00 - $150.00
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="index.php?act=filter_price&first=150&second=200" class="filter-link stext-106 trans-04">
                        $150.00 - $200.00
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="index.php?act=filter_price&price=200" class="filter-link stext-106 trans-04">
                        $200.00+
                    </a>
                </li>
            </ul>
        </div>

        <div class="filter-col3 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Categories
            </div>

            <ul>
                <?php $categories_all = category_select_all(); ?>
                <?php foreach ($categories_all as $cate) : ?>
                    <li class="p-b-6">
                        <a href="index.php?act=products_cate&cate_id=<?=$cate['cate_id']?>" class="filter-link stext-106 trans-04">
                            <?=$cate['cate_name']?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <!-- Tags -->
        <?php
        $show_all_tag = tag_select_all();
        ?>
        <div class="filter-col4 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Tags
            </div>

            <div class="flex-w p-t-4 m-r--5">
                <?php foreach ($show_all_tag as $tag) : ?>

                    <a href="index.php?act=filter_tag&tag_id=<?= $tag['tag_id'] ?>" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                        <?= $tag['tag_name'] ?>
                    </a>

                <?php endforeach ?>

            </div>
        </div>
    </div>
</div>