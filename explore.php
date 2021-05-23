<?php 
include('admin/includes/db.php');
include('includes/header.php');?>
	
	
		
		<!--container-->
		<div class="page-heading">
		</div>
		<div class="content">
			<div class="block">
				<div class="product-collateral container explore_menu">
					<h2> &nbsp&nbsp EXPLORE MENU Explore menu</h2>
					<div id="productTabContent" class="tab-content">
						<div class="tab-pane tablepane active" id="porkSisig">
							<div class="col-main col-sm-12 product-grid product-grid">
								<div class="pro-coloumn">
									<div class="block">
										<article class="col-main">
											<div class="category-products" id="cat_product379">
												<ul class="products-grid col-lg-3" id="product_ul_379">
												<?php
													$sql="SELECT id, title,price FROM product";
													$run=mysqli_query($conn,$sql);
													while ($row=mysqli_fetch_assoc($run)) {
													echo '
													<div class= "category_cover">
														<div class="category_img-cover">
															<img src="images/pork sisig.jpg">
														</div>
														<div class="price_content-cover">
															<div class="sp-simpleportfolio-info">
																<h3 class="sp-simpleportfolio-title">
																	<a href="product.php">
																	'.$row['title'].'
																	</a>
																</h3>
																<div class="sp-simpleportfolio-tags">
																'.$row['price'].'
																</div>
															</div>
														</div>
													</div>
													';
												}
												?>
												</ul>
												
										</article>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>		
			</div>

<?php include('includes/footer.php');?>
