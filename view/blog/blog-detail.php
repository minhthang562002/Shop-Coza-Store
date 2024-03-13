<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a href="index.php?act=blog" class="stext-109 cl8 hov-cl1 trans-04">
			Blog
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			<?= $blog_title ?>
		</span>
	</div>
</div>


<!-- Content page -->
<section class="bg0 p-t-52 p-b-20">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9 p-b-80">
				<div class="p-r-45 p-r-0-lg">
					<!--  -->
					<div class="wrap-pic-w how-pos5-parent">
						<img src="../upload/<?= $blog_img ?>" alt="IMG-BLOG">
					</div>

					<div class="p-t-32">
						<span class="flex-w flex-m stext-111 cl2 p-b-19">
							<span>
								<span class="cl4">By </span><?= $user_id ?>
								<span class="cl12 m-l-4 m-r-6">|</span>
							</span>
							<span>
								<?php
								$sumcom = comment_exist($blog_id);
								if ($sumcom == 0) {
									$sumcom = "0";
								}
								echo "$sumcom";
								?> comment
							</span>
						</span>

						<h4 class="ltext-109 cl2 p-b-28">
							<?= $blog_title ?>
						</h4>

						<p class="stext-117 cl6 p-b-26">
							<?= $blog_content ?>
						</p>
					</div>
					<!--  -->
					<div class="p-t-40">
						<h5 class="mtext-113 cl2 p-b-12">
							Leave a Comment
						</h5>

						<p class="stext-107 cl6 p-b-40">
							Your email address will not be published. Required fields are marked *
						</p>

						<form action="index.php?act=comment" method="post">
							<div class="bor19 m-b-20">
								<textarea class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" name="comment_content" placeholder="Comment..."></textarea>
							</div>
							<span style="color:red">
								<?= $err['comment_content'] ?? '' ?>
							</span>
							<input type="hidden" name="blog_id" value="<?= $blog_id ?>">
							<button class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04" type="submit">
								Post Comment
							</button>
						</form>
						<?php foreach ($comments as $comment) : ?>
							<div class="p-b-10">
								<div class="flex-w align-items-center">
									<?php $user_kh = user_select_by_id($comment['user_id']); ?>
									<span><?= $user_kh['user_id'] ?></span>
									<div class="wrap-pic-s size-109 bor0 of-hidden m-l-18 m-r-18 m-t-6">
										<img src="../upload/<?= $user_kh['user_img'] ?? '' ?>" alt="AVATAR">
									</div>
								</div>

								<div class="size-207">
									<p class="stext-102 cl6">
										<?= $comment['comment_content'] ?>
									</p>
								</div>
							</div>
							<hr>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<!-- Footer -->



<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="zmdi zmdi-chevron-up"></i>
	</span>
</div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<script>
	$(".js-select2").each(function() {
		$(this).select2({
			minimumResultsForSearch: 20,
			dropdownParent: $(this).next('.dropDownSelect2')
		});
	})
</script>
<!--===============================================================================================-->
<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
	$('.js-pscroll').each(function() {
		$(this).css('position', 'relative');
		$(this).css('overflow', 'hidden');
		var ps = new PerfectScrollbar(this, {
			wheelSpeed: 1,
			scrollingThreshold: 1000,
			wheelPropagation: false,
		});

		$(window).on('resize', function() {
			ps.update();
		})
	});
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>

</html>