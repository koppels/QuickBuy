$( document ).ready(function() {
	var static_token = prestashop.static_token;
	var static_url = prestashop.breadcrumb.links[0].url+"cart";
	var page_loc = prestashop.page.page_name;
	if(page_loc == "product"){
		$('article.product-miniature.js-product-miniature').each(function(i, data) {
			var product_id = $(data).attr("data-id-product");
			var custom_id = $(data).attr("data-id-product-attribute");
			var html = "<form action='"+static_url+"' method='post'>";
			html += "<input type='hidden' name='token' value='"+static_token+"' />";
			html += "<input type='hidden' name='id_product' value='"+product_id+"' id='product_page_product_id' />";
	//		html += "<input type='hidden' name='id_customization' value='"+custom_id+"' id='product_customization_id'/>"; Makes it broken!
			html += "<div class='product-quantity clearfix'><div class='qty'><input type='number' id='quantity_wanted' class='input-group form-control' name='qty' min='1' value='1' /></div>";
			html += "<div class='add'><button class='btn btn-primary add-to-cart' data-button-action='add-to-cart' type='submit'>Add to cart</button></div></div></form>";
			$(this).append(html);
		});
	}
});
