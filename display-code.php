<?php
// Code lấy giá trị thuộc tính
add_shortcode('bnix_tt','all_tt');
function all_tt() {
	if(is_product()) {
		global $product;
		$tt = $product->get_attributes();
		if($tt) {
			 ob_start(); ?>
			<div class="thongtin">
				<h2>Thông tin sản phẩm: </h2>
				<div class="info-box">
					<?php
						 foreach ( $tt as $attribute ) { ?>
							<div class="tt-value-line">
								<div class="tt-label"><?php echo wc_attribute_label($attribute->get_name()); ?></div>
								<div class="tt-value"><?php echo $product->get_attribute( $attribute->get_name()); ?></div>
							</div>
					<?php } ?>
				</div>			
			</div>
		<?php 
			$ptt = ob_get_contents();
			ob_end_clean();
			return $ptt;
		}
	}
}
