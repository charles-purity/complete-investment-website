<!DOCTYPE html>
<html lang="zxx">
<head>
	
	<?php require __core_views . '/head-tags.php'; ?>
	
	<style>
		/*.divider:after,
		.divider:before {
			content: "";
			flex: 1;
			height: 1px;
			background: #eee;
		}
		.h-custom {
			height: calc(100% - 73px);
		}
		@media (max-width: 450px) {
			.h-custom {
				height: 100%;
			}
		}
		#inp{
			border-radius:5px; 
			background-color:#fff;
		}    */
	</style>

	<script src='https://www.google.com/recaptcha/api.js'></script>
	
</head>
<body>
	
	<div id="google_translate_element" style="margin-left:1%"></div>

	<script type="text/javascript">

		function googleTranslateElementInit() {
			new google.translate.TranslateElement({
				pageLanguage: 'en', 
				layout: google.translate.TranslateElement.InlineLayout.SIMPLE, 
				autoDisplay: false
			}, 'google_translate_element');
		}
		
		function refreshCaptcha(){
			var img = document.images['captchaimg'];
			img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
		}
		
	</script>

	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

