$(function(){
	$("body").on("click", "a[data-target='#view-modal']", function () {
		$("#view-modal .modal-body").load($(this).attr("href"));
	});
})