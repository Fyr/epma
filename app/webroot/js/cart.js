function getCart() {
	return JSON.parse($.cookie('cart') || '{}');
}

function setCart(cart) {
	$.cookie('cart', JSON.stringify(cart), {expires: 7, path: '/', domain: domain});
}

function addCart(id) {
	var cart = getCart();
	var cartE = $('#cart_' + id);

	cart[id] = $('.cart-qty', cartE).val();
	setCart(cart);

	$('.add-cart', cartE).hide();
	$('.in-cart', cartE).show();
	$('.cart-qty', cartE).get(0).disabled = true;
}

function updateCart(id) {
	var cart = getCart();
	var cartE = $('#cart_' + id);
	cart[id] = $('.cart-qty', cartE).val();
	setCart(cart);
}

function delCart(id) {
	var cart = getCart();
	delete cart[id];
	setCart(cart);
	gotoCart();
}

function gotoCart() {
	window.location.href = '/cart/';
}
