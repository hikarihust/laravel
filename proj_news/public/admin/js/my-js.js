$(document).ready(function() {
	let $btnSearch        = $("button#btn-search");
	let $btnClearSearch	  = $("button#btn-clear-search");

	let $inputSearchField = $("input[name  = search_field]");
	let $inputSearchValue = $("input[name  = search_value]");

	// Khi bắt đầu vào trang hay bất kỳ 1 hành động nào load lại trang thì gán giá trị trên field vào input ẩn inputSearchField
	// $inputSearchField.val(gup('search_field', window.location));

	$("a.select-field").click(function(e) {
		e.preventDefault();

		let field 		= $(this).data('field');
		let fieldName 	= $(this).html();
		$("button.btn-active-field").html(fieldName + ' <span class="caret"></span>');
    	$inputSearchField.val(field);
	});

	$btnSearch.click(function() {

		var pathname	= window.location.pathname;

		let search_field = $inputSearchField.val();
		let search_value = $inputSearchValue.val();

		window.location.href = pathname + '?' + 'search_field='+ search_field + '&search_value=' + search_value;
	});

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