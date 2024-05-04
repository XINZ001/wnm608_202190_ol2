
const showResults = d => {
	$(".productlist").html(
		d.error?d.error:
		d.result.length?listItemTemplate(d.result):
		'No Results');
}

query({type:'products_all'}).then(showResults);


$(()=>{

	$("#product-search").on("submit",function(e){
		e.preventDefault();
		let search = $(this).find("input").val();
		query({type:'product-search',search:search}).then(showResults);
	})

	$(".js-sort").on("change",function(e){
		(
			this.value==1 ? query({type:'product-sort',column:'price',dir:'DESC'}):
			this.value==2 ? query({type:'product-sort',column:'price',dir:'ASC'}):
			query({type:'products_all'})
		).then(showResults);
	})
})

