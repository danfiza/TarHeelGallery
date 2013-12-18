$(document).ready(function() {
	//We get the  list of users in the following request and build a UL of links of the usernames
	var obj1;
	var UserContainerList = $('ul.usernames');
	var data = {type: "retrieve"};
	$.post('scripts/user.php', data, function(returnedData) {
		obj1 = $(returnedData);
		for (var i = 0; i < obj1.length; i++){
			console.log(obj1[i].login);
			var userlink = $('<a href="#"><li>'+obj1[i].login+'</li></a>');
			UserContainerList.append(userlink);
		}
	});
	//We then add triggers to the links, when clicked we recieve the username and send the request to get their 
	//images from usergallery.php and append the image thumbnails to the users view
	$('#galleryScroll').append("<h1>Please select a user to view their Gallery.");
	$('body').on('click', 'ul.usernames  li', function(event){
		$('#galleryScroll').empty();
		var name = $(this).html();
		var data = {type: "gallery", username: name};
		$.post('scripts/usergallery.php', data, function(returnedData) {
			obj1 = $(returnedData);
			for (var i = 0; i < obj1.length; i++){
				var points = obj1[i].upvotes - obj1[i].downvotes;
				var new_imagediv = $('<div class ="pic' + obj1[i].id +'"></div>');
				var lblink = $('<a href="' + obj1[i].path +'" data-lightbox="image-1" title="By: '+  obj1[i].author +'"></a>');
				lblink.append('<img src="'+ obj1[i].path +'" alt="image">');
				new_imagediv.append(lblink);
				new_imagediv.append('<a class="comment_link" href="#">Comment</a>');
				new_imagediv.append('<br><img class ="thumbup" src="img/thumbup.png" alt="thumbup"><span class="votes">'+ points +'</span><img class ="thumbdn" src="img/thumbdown.png" alt="thumbdown">');

				$('#galleryScroll').append(new_imagediv);
			}
			
			if(obj1.length == 0){

				$('#galleryScroll').append('<h1>Sorry, this user does not have any images uploaded.</h1>');

			}
		});
	});
});
