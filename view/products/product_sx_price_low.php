<!-- Product -->

<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<a href="index.php?act=products">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter="*">
						All Products
					</button>
				</a>
				<?php foreach ($categories as $category) : ?>
					<?php
					if (isset($_GET['cate_id'])) {
						$class = $_GET['cate_id'] == $category['cate_id'] ? 'how-active1' : '';
					}
					?>
					<a href="index.php?act=products_cate&cate_id=<?= $category['cate_id'] ?>">
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?= $class ?? '' ?>">
							<?= $category['cate_name'] ?>
						</button>
					</a>
				<?php endforeach ?>
			</div>


			<div class="flex-w flex-c-m m-tb-10">
				<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
					<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
					<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Filter
				</div>

				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Search
				</div>
			</div>

			<!-- Search product -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15">
				<form action="index.php?act=search_keyword" method="post">
					<div class="bor8 dis-flex p-l-15">
						<button type="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" placeholder="Search">
					</div>
				</form>
			</div>

			<!-- Filter -->
			<?php include 'filter/filters.php'; ?>
		</div>

		<?php
		if (isset($total_kq)) {
			echo "<h3 class='m-b-35'>" . $total_kq . "</h3>";
		}
		?>
		<div class="row isotope-grid">

			<?php foreach ($products as $pro) : ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
					<!-- Block2 -->
					<a href="index.php?act=product_detail&pro_id=<?= $pro['product_id'] ?? '' ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
						<div class="block2">
							
							<div class="block2-pic hov-img0" data-label="New">
								<img src="../upload/<?= $pro['product_img'] ?? 'errors.jpg' ?>" style="height: 334px" alt="IMG-PRODUCT">

							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="index.php?act=product_detail&pro_id=<?= $pro['product_id'] ?? '' ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?= $pro['product_name'] ?>
									</a>

									<span class="stext-105 cl3">
										<?= $pro['product_sale'] == 0 ? $pro['product_price'] : '<del>' . $pro['product_price'] . '</del>' . ' ' . ($pro['product_price'] - ($pro['product_price'] * $pro['product_sale'] / 100)) . '$' ?>
									</span>
								</div>
								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<?= $pro['product_sale'] ?  $pro['product_sale'] . '%' : '' ?>
										<!-- <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON"> -->
									</a>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach ?>

		</div>
		<div class="flex-c-m flex-w w-full p-t-38">
			<?php if (isset($total_page)) : ?>
				<?php for ($i = 1; $i <= $total_page; $i++) : ?>
					<a href="index.php?act=price_low_to_high&pages=<?= $i ?? '' ?>" class="flex-c-m how-pagination1 trans-04 m-all-7 <?= $i == $num_page ? 'active-pagination1' : '' ?>">
						<?= $i ?>
					</a>
				<?php endfor ?>
			<?php endif ?>
		</div>
	</div>
</div>