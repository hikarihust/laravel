$(document).ready(function() {
	let $btnSearch        = $("button#btn-search");
	let $btnClearSearch	  = $("button#btn-clear-search");

	let $inputSearchField = $("input[name  = search_field]");
	let $inputSearchValue = $("input[name  = search_value]");

	// Khi bắt đầu vào trang hay bất kỳ 1 hành động nào load lại trang thì gán giá trị trên field vào input ẩn inputSearchField
	// $inputSearchField.val(gup('search_field', window.location));
	// Khi nhấn nút Filter
	$("a.select-field").click(function(e) {
		e.preventDefault();

		let field 		= $(this).data('field');
		let fieldName 	= $(this).html();
		$("button.btn-active-field").html(fieldName + ' <span class="caret"></span>');
    	$inputSearchField.val(field);
	});
	// Khi nhấn nút tìm kiếm
	$btnSearch.click(function() {

		var pathname	= window.location.pathname;
		let params 		= ['filter_status'];
		let searchParams = new URLSearchParams(window.location.search);
		
		let link = "";
		$.each(params, function(key, param){
			if (searchParams.has(param)) {
				link += param + "=" + searchParams.get(param) + "&";
			}
		});

		let search_field = $inputSearchField.val();
		let search_value = $inputSearchValue.val();

		if (search_value.replace(/\s/g,"") === "") {
			alert("Nhập giá trị cần tìm kiếm!!");
		} else {
			window.location.href = pathname + '?' + link + 'search_field='+ search_field + '&search_value=' + search_value;
		}
	});
	// Khi nhấn nút Clear
	$btnClearSearch.click(function() {
		var pathname = window.location.pathname;
		var searchParams = new URLSearchParams(window.location.search);

		params = ['filter_status'];

		var link = "";
		$.each(params, function(key, param) {
			if (searchParams.has(param)) {
				link += param + "=" + searchParams.get(param) + "&";
			}
		})

		window.location.href = pathname + "?" + link.slice(0,-1);
	})
	// Khi nhấn vào nút Button delete phần tử
	$('.btn-delete').on('click', function() {
		return confirm('Bạn có chắc xóa phần tử này hay không');
	})
});

// Hàm lấy giá trị của 1 param bất kỳ trên URL
// function gup( name, url ) {
// 	if (!url) url = location.href;
// 	name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
// 	var regexS = "[\\?&]"+name+"=([^&#]*)";
// 	var regex = new RegExp( regexS );
// 	var results = regex.exec( url );
// 	return results == null ? null : results[1];
// }