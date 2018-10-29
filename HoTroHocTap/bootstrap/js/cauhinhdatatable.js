$(document).ready(function(){
	$('.sorting').attr("class","text-center");
	$('.sorting_asc').attr("class","text-center");
	$('.sorting_desc').attr("class","text-center");
	
	$(document).on('click','.sorting_asc',function(){
		$('.sorting').attr("class","text-center");
		$('.sorting_asc').attr("class","text-center");
		$('.sorting_desc').attr("class","text-center");
	})
	
	$(document).on('click','.sorting',function(){
		$('.sorting').attr("class","text-center");
		$('.sorting_asc').attr("class","text-center");
		$('.sorting_desc').attr("class","text-center");
	})
	
	$(document).on('click','.sorting_desc',function(){
		$('.sorting').attr("class","text-center");
		$('.sorting_asc').attr("class","text-center");
		$('.sorting_desc').attr("class","text-center");
	})
	
	$(document).on('click','.paginate_button',function(){
		$('.sorting').attr("class","text-center");
		$('.sorting_asc').attr("class","text-center");
		$('.sorting_desc').attr("class","text-center");
	})
	

})
