$(function(){
	$("body").on("click", "img.expand", function(){
		$("body").append(
			$("<div>", {class: "expanded-image-wrapper"}).append(
				$("<img>").attr("src", $(this).attr("src"))
			).show()
		)
	});
	$("body").on("click", ".expanded-image-wrapper", function(){
		$(this).hide();
	});
})