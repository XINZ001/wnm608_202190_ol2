
$(()=>{
	$(".images-thumbs img").on("mouseenter",function(e){
		Let src = $(this).attr("src");
		$(".images-main img").attr("src", src);
	})

});