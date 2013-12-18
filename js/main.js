var sortByTitle = function(a,b) {
	var x = a.title.toLowerCase();
	var y = b.title.toLowerCase();

	return x < y ? - 1: x > y ? 1: 0;
}

var sortByAuthor = function(a,b) {
	var x = a.author.toLowerCase();
	var y = b.author.toLowerCase();

	return x < y ? - 1: x > y ? 1: 0;
}

var sortByPoints = function(a,b) {
	return b.points-a.points;
}

var sortByDate = function(a,b) {
	x = a.uploaded;
	y = b.uploaded;

	return (x < y) ? -1: (x > y) ? 1: 0;
}
//Our function for index.php which gets and displays all the images on the index page
var display_images = function(obj1, imageScroll) {
	imageScroll.empty();
	for (var i = 0; i < obj1.length; i++){
		var new_imagediv = $('<div class ="pic' + obj1[i].id +'"></div>');
		var lblink = $('<a href="' + obj1[i].path +'" data-lightbox="image-1" title="By: '+  obj1[i].author +'"></a>');
		lblink.append('<img src="'+ obj1[i].path +'" alt="image">');
		new_imagediv.append('<span class="pic_desc"> by '+ obj1[i].author + ' on ' + obj1[i].uploaded +'</span>');
		new_imagediv.append(lblink);
		new_imagediv.append('<br><img class ="thumbup" src="img/thumbup.png" alt="thumbup"><span class="votes">'+obj1[i].points +'</span><img class ="thumbdn" src="img/thumbdown.png" alt="thumbdown">');
		imageScroll.append(new_imagediv);
	}

	return obj1;
}

$(document).ready(function() {
	var imageScroll = $('#imageScroll');

	$.ajax({url:"scripts/main.php",success:function(result){
		pictures = result;
		picture_array = display_images(pictures, imageScroll);
	}});

//Our sort trigger
$('select').change(function() {
	var sortVal = $(this).val();
	var sort_function;

	if (sortVal === 'points') {
		sort_function = sortByPoints;
	} else if (sortVal === 'author') {
		sort_function = sortByAuthor;
	} else if (sortVal === 'date') {
		sort_function = sortByDate;
	} else {
		sort_function = sortByPoints;
	}

	picture_array.sort(sort_function);

	display_images(picture_array, imageScroll);
});
//our voting triggers
$('body').on('click', 'img.thumbup', function(event){
	var picture_id= $(this).parent().attr("class");
	var sibling = $(this).siblings("span.votes");
	var data= {picture: picture_id, vote: "up"};
	$.post('scripts/voting.php', data, function(returnedData) { 
		if (returnedData.success) {
			var thumbup = sibling.html();
			thumbup++;
			sibling.html(thumbup).fadeIn("slow");
		}
	});
	
	
	
});

$('body').on('click', 'img.thumbdn', function(event){
	/*have to store 'this' because we lose reference to it inside the post ajax call */
	var picture_id= $(this).parent().attr("class");
	var sibling = $(this).siblings("span.votes");
	var data= {picture: picture_id, vote: "down"};
	
	$.post('scripts/voting.php', data, function(returnedData) {
		if (returnedData.success) {
			var thumbdown = sibling.html();
			thumbdown--;
			sibling.html(thumbdown).fadeIn("slow");
		}
	});
	
});	
});
