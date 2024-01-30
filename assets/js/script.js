function addToCart(id, qty, total) {
	$.ajax({
		type: "POST",
		url: base_url + "user/beli",
		data: {
			id: id,
			qty: qty,
			total: total,
		},
		success: function (response) {
			// showToast();
			setTimeout(function () {
				window.location.reload();
			}, 500);
		},
	});
}

function remove(id, id_barang, qty) {
	console.log(id);
	console.log(id_barang, qty);
	$.ajax({
		type: "POST",
		url: base_url + "user/remove",
		data: {
			id: id,
			id_barang: id_barang,
			qty: qty,
		},
		success: function (msg) {
			setTimeout(function () {
				window.location.reload();
			}, 500);
		},
	});
}

function addToCart2(id, qty, total) {
	// const plusqty = document.getElementById("_qty").value;
	$.ajax({
		type: "POST",
		url: base_url + "user/beli",
		data: {
			id: id,
			qty: qty,
			total: total,
		},
		success: function (msg) {
			showToast();
			setTimeout(function () {
				window.location.reload();
			}, 500);
		},
	});
}

function returnAuth() {
	window.location.href = base_url + "auth";
}
