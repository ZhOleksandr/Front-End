$(document).ready(function(){
	$('.my-next').click(function(){
		var currentImage = $('.my-slide-img.act');
		var currentImageIndex = $('.my-slide-img.act').index();
		var nextImageIndex = currentImageIndex + 1;
		var nextImage = $('.my-slide-img').eq(nextImageIndex); //en - вибір едементу по n-му індексу
		currentImage.fadeOut(400);
		currentImage.removeClass('act');

		if (nextImageIndex == ($('.my-slide-img').last().index()+1)){
			$('.my-slide-img').eq(0).fadeIn(400);
			$('.my-slide-img').eq(0).addClass('act');
		} else {
			nextImage.fadeIn(400);
			nextImage.addClass('act');
		}
	});

	$('.my-prev').click(function(){
		var currentImage = $('.my-slide-img.act');
		var currentImageIndex = $('.my-slide-img.act').index();
		var prevImageIndex = currentImageIndex - 1;
		var prevImage = $('.my-slide-img').eq(prevImageIndex);

		currentImage.fadeOut(400);
		currentImage.removeClass('act');
		prevImage.fadeIn(400);
		prevImage.addClass('act');
	});
});