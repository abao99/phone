<!DOCTYPE html>
<html>
<head>
	<title>PhotoSwipe</title>
	<meta name="author" content="Ste Brennan - Code Computerlove - http://www.codecomputerlove.com/" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link href="styles.css" type="text/css" rel="stylesheet" />
	
	<link href="./photoswipe/photoswipe.css" type="text/css" rel="stylesheet" />
	
	<script type="text/javascript" src="./photoswipe/klass.min.js"></script>
	<script type="text/javascript" src="./photoswipe/code.photoswipe-3.0.5.min.js"></script>
	
	
	<script type="text/javascript">
		
		/* 
			Overview: 
			---------
			
			Demonstrates inline functionality with indicators. This demo sets the images using an array.
			There is nothing stopping you basing this on image dom elements like other examples.
			
			Also in this demo I "hardcode" the indicators into the markup. Again, there is nothing stopping
			you creating them as needed in the JavaScript.
		
		*/
		
		(function(window, Util, PhotoSwipe){
			
			Util.Events.domReady(function(e){
				
				var instance, indicators;
				
				instance = PhotoSwipe.attach(
					[
						{ url: 'images/full/001.jpg', caption: 'Image 001'},
						{ url: 'images/full/002.jpg', caption: 'Image 002'},
						{ url: 'images/full/003.jpg', caption: 'Image 003'},
						{ url: 'images/full/004.jpg', caption: 'Image 004'},
						{ url: 'images/full/005.jpg', caption: 'Image 005'}
					],
					{
						target: window.document.querySelectorAll('#PhotoSwipeTarget')[0],
						preventHide: true,
						getImageSource: function(obj){
							return obj.url;
						},
						getImageCaption: function(obj){
							return obj.caption;
						}
					}
				);
				
				
				indicators = window.document.querySelectorAll('#Indicators span');
				
				// onDisplayImage - set the current indicator
				instance.addEventHandler(PhotoSwipe.EventTypes.onDisplayImage, function(e){
					
					var i, len;
					for (i=0, len=indicators.length; i<len; i++){
						indicators[i].setAttribute('class', '');
					}
					indicators[e.index].setAttribute('class', 'current');
					
				});
				
				instance.show(0);
				
			});
			
			
		}(window, window.Code.Util, window.Code.PhotoSwipe));
		
	</script>
	
</head>
<body>

<div id="Header">
	<a href="http://www.codecomputerlove.com"><img src="images/codecomputerlovelogo.gif" width="230" height="48" alt="Code Computerlove" /></a>
</div>

<div id="MainContent">
	
	<div id="PhotoSwipeTarget"></div>
	<div id="Indicators">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</div>
	
	
</div>

</body>
</html>