//var root = 'https://www.jazzup.com.hk/client/coca-cola/20231218/';
var root = 'https://cny24.cokeplus.hk/';
var loadedCount = 0;
var loadedMax = 2;
var isInit = false;
var pageIndex = 'index.html';

var windowW = 1000;
var windowH = 500;
var resizeTimeout;
var fs = 16;

var currentPage = -1+0;
var gender = '';
var optionTimeout;
var isOptioning = false;

var isSending = false;

var uploadCanvas, uploadContext;
var isDragging = false;
var lastX = 0;
var lastY = 0;
var lastScale = 1;
var lastW = 0;
var oriW = 0;
var oriH = 0;
var oriS = 1;
var maxW = 1000;
var tempImageStore;
var tempCostume = 0;

var tempCanvas, tempContext, tempCanvasB, tempContextB, tempCostumeImage, tempBodyImage, tempBFCImage;
var res;

var hammerRatio = 3.8;

var labelList = ['Battlefield'];
var textList = ['Fuck', 'asshole'];
var objectList = ['Tank'];
var unique = '';
var roomID = '';
var pname = '';
var ppic = '';
var shareTxt = '【可口可樂®「知咩料」最夾盆菜】夾出更多驚喜優惠！我邀請你一同完成盆菜！';//'【可口可樂®「知咩料」最夾盆菜】夾出更多驚喜優惠！我地已經完成盆菜！'

var isFirefox = navigator.userAgent.toLowerCase().includes('firefox');


$(document).ready(function(){
	unique = makeUnique(6);
	checkLoaderH();
});


function checkLoaderH(){
	loadedCount++; 
	if(loadedCount >= loadedMax && !isInit){ init(); }
}


function init(){
	resizeH();
	pageNavH(1);
	
	if(window.location.hash){
		//roomID = window.location.hash.substring(1);
	}
	
	if(history.length >= 3){
	   $('#a-back').attr('href', 'javascript:history.back()');
	}
	
	$('.menu-icon-container').click(function(){
		$(this).toggleClass('active');
		$('.page-container').toggleClass('inactive');
		$('.menu-container').toggleClass('active');
		
		if($('.menu-container').hasClass('active')){
			gtag("event", 'menu-open');
		}else{
			gtag("event", 'menu-close');							
		}
	}); 
	
	$('.overlay-container .general-button.confirm, .text-button.back').click(function(){
		if(!$(this).hasClass('disable')){
			overlayerH('na');
		}
		
		if($(this).hasClass('text-button')){
			gtag("event", 'click-back');
		}else{
			gtag("event", 'click-close-overlay');
		}
	});
	
	
	var randomTop = [];
	for(var i=0; i<6; i++){
		randomTop.push((-5+Math.random()*10) +  (15+(50/$('.page-container.result .char-container').length)*i));
	}
	shuffle(randomTop);
	$('.create-kv-container .char-container').each(function(index){
		//$(this).css('left', (10+(90/$('.page-container.result .char-container').length)*index)+'%');
		//$(this).css('top', randomTop[index]+'%');
		//$(this).css('top', (-5+Math.random()*10)+35+(Math.cos(2*Math.PI*index/$('.page-container.result .char-container').length)*25)+'%');
		//$(this).css('left', (-5+Math.random()*10)+50+(Math.sin(2*Math.PI*index/$('.page-container.result .char-container').length)*40)+'%');
		//console.log(Math.cos(Math.PI/$('.page-container.result .char-container').length*index)*50)
		//$(this).css('left', (10+Math.random()*80)+'%');
		//$(this).css('transform', 'translate(-50%,-50%) scale('+(0.8+Math.random()*0.2)+') rotate('+(-10+Math.random()*20)+'deg)')
		$(this).css('transform', 'translate(-50%,-50%) scale('+(0.85+Math.random()*0.15)+') rotate('+(-10+Math.random()*20)+'deg)')
		
		
		$(this).children('.char-container-inner').css('animation-duraion', 0.5+Math.random()*0.2+'s');
		if($('.create-kv-container').hasClass('open')){
			$(this).css('transition-delay', 700+(index*50)+'ms')
			$(this).children('.char-container-inner').css('animation-delay', 1.3+Math.random()*0.2+'s');
		}else{
			$(this).css('transition-delay', (index*50)+'ms')
			$(this).children('.char-container-inner').css('animation-delay', .6+Math.random()*0.2+'s');
		}
		
	})
	
	$('.general-button.copy').click(function(){
		var copyText = document.getElementById("shareURL");
	  	copyText.select(); 
		copyText.setSelectionRange(0, 99999); // For mobile devices
		$('#shareURL').blur();
	   	// Copy the text inside the text field
	  	navigator.clipboard.writeText(copyText.value);
		overlayerH('copied');
		gtag("event", 'click-copied');
	});
	
	
	if (!(navigator.canShare)) {
		$('.page-container.share').addClass('cantshare')
	} else {
		
	}
	
	
	
	
	
	$('.sticker-container').click(function(e){
		gtag("event", 'click-share-sticker');
		var countIndex = $('.sticker-container').index($(this))+1;
		if (isFirefox) {
		}else{
		e.preventDefault();
		var imgsrc = $(this).find('img').attr('src');
		(async () => { // got propic from header: https://www.jazzup.com.hk/client/coca-cola/20231127/uploads/60247761c2d71c632e1a198c66ac7914K12345b611207feba8b8b5.png
        const response = await fetch(imgsrc);
        const blob = await response.blob();
        const filesArray = [
            new File([blob], pname+'00'+countIndex+'.png', { name:pname, text:'', type: "image/png", lastModified:new Date().getTime() })
        ]; 
        const shareData = { files:filesArray, title:''};
        navigator.share(shareData);	
        })()
		}
	});
	
	
	$('.general-button.share').click(function(){
		if (navigator.canShare) {
			if($('.page-container').hasClass('rewards')){
				gtag("event", 'click-share-rewards');
				/*(async () => { // got og pic from header
				const response = await fetch('https://www.jazzup.com.hk/client/coca-cola/20231127/img/og-generic.jpg');
				const blob = await response.blob();
				const filesArray = [
					new File([blob], '盆菜名.png', { name:'盆菜名', text:'我地已經完成盆菜！', type: "image/png", lastModified:new Date().getTime() })
				]; 
				const shareData = { files:filesArray, title:'', url:$('#shareURL').val(), text:'我地已經完成盆菜！\n\r'};
				navigator.share(shareData);	
				})()*/
				(async () => {
					const shareData = { title:shareTxt, url:root+'room/?rid'+roomID, text:shareTxt+'\n\r'};
					navigator.share(shareData);	
				})()
			}else{
				if($(this).hasClass('visual')){
					gtag("event", 'click-share-visual');
					(async () => { // got propic from header: https://www.jazzup.com.hk/client/coca-cola/20231127/uploads/60247761c2d71c632e1a198c66ac7914K12345b611207feba8b8b5.png
					const response = await fetch(root+'uploads/'+ppic);
					const blob = await response.blob();
					const filesArray = [
						new File([blob], pname+'.png', { name:pname, text:shareTxt, type: "image/png" })
					]; 
					const shareData = { files:filesArray, title:''};
					navigator.share(shareData);	
					})()
				}else{
					gtag("event", 'click-share-url');
					(async () => {
					const shareData = { title:'', url:root+'room/?rid'+roomID, text:shareTxt+'\n\r'};
					navigator.share(shareData);	
					})()	
				}
			}
		} 
	})
	
	
	if($('.bubble-container').length > 0){
		randomBubbles();
		window.requestAnimationFrame(checkBubbles);
		$('.page-container.result').removeClass('active');
		setTimeout(function(){
			$('.page-container.finish').stop().fadeOut(400, function(){
				setTimeout(function(){
					$('.page-container.result').stop().fadeIn(400);
					$('.page-container.result').addClass('active');
				}, 2*1000)	
			});
			
		}, 6*1000)	
	}
	
	
	
	$('#input-room-name').on('keypress',function(e) {
		if(e.which == 13) {
			gtag("event", 'submit-room-name-enter');
			$('.general-button.next').click();
		}else{
			
		}
	});
	$('#input-room-name').on('keyup', function(){
		var tempTxt = $(this).val();
		if(tempTxt.length > 10){
			overlayerH('long-text');
			$(this).val(tempTxt.substr(0,10));
			gtag("event", 'alert-room-name-long');
		}
	})
	
	
	$('.general-button.next').click(function(){
		gtag("event", 'submit-room-name');
		$('.error-txt').html('');
		
		if(!$('#checkbox').prop('checked')){
			//$('.error-txt').html('*請同意有關條款及細則。')
			overlayerH('invalid-tnc');
			gtag("event", 'alert-room-name-tnc');
		}else{
			var invalidForm = false;
			var roomName = $('#input-room-name').val()

			if(roomName.length < 1){
				invalidForm = true;
				$('.error-txt').html('*請填寫盆菜名稱。')
				overlayerH('invalid-text');
				gtag("event", 'alert-room-name-empty');
			}
			if(!invalidForm){
				$('.error-txt:eq(0)').removeClass('active');
				if(!isSending){
					overlayerH('loader');
					isSending = true;
					var sdata =  { nickname:$('#input-room-name').val(), uid:unique}
					$.ajax({
						 method: "POST",
						 url: root+"php/create-check.php", /* TBD: filter list + create Room URL */
						 data: sdata,
					}).done(function(msg){
						isSending = false;
						console.log('msg:'+msg);
						if(msg !== 'bad' && msg !== 'sign'){ 
							window.location = root+'profile/?rid='+msg;
						}else{  
							overlayerH('na');
							gtag("event", 'alert-room-name-invalid');
							if(msg === 'sign'){
								$('.error-txt').html('*盆菜名稱不支援數字或符號。');
								overlayerH('invalid-text');
							}else{
								$('.error-txt').html('*你所輸入的字元含有敏感或不當用語。');
								overlayerH('invalid-text');
							}
						}
					});
				}

			}else{
				
			}
		}
	});
	
	$('#input-your-name').on('keypress',function(e) {
		if(e.which == 13) {
			$('.general-button.avatar').click();
		}
	});
	
	$('.options-container').each(function(){
		if($(this).attr('id')){
			var mc = new Hammer(document.getElementById($(this).attr('id')));
			let mcID = $(this).attr('id')

			mc.on("swipeleft", function(ev){ 
				$('#'+mcID+' .arrow.next').click();
			});
			mc.on("swiperight", function(ev) { 
				$('#'+mcID+' .arrow.prev').click();
			});
		}
    });
	
	$('.slideshow-container').each(function(){
		if($(this).attr('id')){
			var mc = new Hammer(document.getElementById($(this).attr('id')));
			let mcID = $(this).attr('id')

			mc.on("swipeleft", function(ev){ 
				$('#'+mcID+' .arrow.next').click();
			});
			mc.on("swiperight", function(ev) { 
				$('#'+mcID+' .arrow.prev').click();
			});
		}
    });
	
	$('.option-container-ele').click(function(){
		if(!$(this).hasClass('active')){
			var tempActive = $(this).parent('div').find('.option-container-ele').index($(this).parent('div').find('.option-container-ele.active'));
			var tempIndex = $(this).parent('div').find('.option-container-ele').index($(this));
			
			if(tempIndex === 20 && tempActive === 1){
				$(this).parent('div').parent('div').parent('div').find('.arrow.prev').click();
			}else if(tempIndex > 20 && tempActive === 1){
				$(this).parent('div').parent('div').parent('div').find('.arrow.next').click();
			}else if(tempIndex > tempActive){
				$(this).parent('div').parent('div').parent('div').find('.arrow.next').click();
			}else if(tempIndex < tempActive){
				$(this).parent('div').parent('div').parent('div').find('.arrow.prev').click();
			}
		}
	});
	
	$('.slideshow-container .arrow.prev').click(function(){
		$('.options-container .arrow.prev').click();
	});
	$('.slideshow-container .arrow.next').click(function(){
		$('.options-container .arrow.next').click();
	});
	
    $('.options-container .arrow').click(function(){
		if(!isOptioning){
			var tempIndex = $(this).parent('div').attr('current');
			var tempLength = $(this).siblings('.options-container-inner:eq(0)').find('.option-container-ele').length-4;
			var ele = $(this);
			clearTimeout(optionTimeout);
			ele.parent('div').removeClass('disabled');
			
			if($(this).hasClass('prev')){
				gtag("event", 'click-costume-prev');
				tempIndex--;
				
				$(this).siblings('.options-container-inner:eq(0)').find('.options-container-cycle').css('transform', 'translateX('+(-5.3 - (tempIndex)*hammerRatio)+'%)');
				$(this).siblings('.options-container-inner:eq(0)').find('.option-container-ele').each(function(index){
					if(index === tempIndex+2){
						$(this).addClass('active');
					}else{
						$(this).removeClass('active');
					}
				});
				
				
				if(tempIndex < 0){
					isOptioning = true;
					optionTimeout = setTimeout(function(){
						ele.parent('div').addClass('disabled');
						ele.siblings('.options-container-inner:eq(0)').find('.options-container-cycle').css('transform', 'translateX('+(-5.3 - tempLength*hammerRatio+hammerRatio)+'%)');
						ele.siblings('.options-container-inner:eq(0)').find('.options-container-cycle').find('.option-container-ele:eq('+(tempLength+1)+')').addClass('active');
						ele.parent('div').attr('current', tempLength-1);
						isOptioning = false;
					}, 310);
					
					slideshowH(0, tempLength-1, $('.slideshow-container'))
				}else{
					slideshowH(0, tempIndex, $('.slideshow-container'))
				}
				
			}else{
				gtag("event", 'click-costume-next');
				tempIndex++;
				if(tempIndex > tempLength){ tempIndex = 0; }
				//(((tempIndex+1)*-hammerRatio)+5)
				$(this).siblings('.options-container-inner:eq(0)').find('.options-container-cycle').css('transform', 'translateX('+(-5.3 - (tempIndex)*hammerRatio)+'%)');
				$(this).siblings('.options-container-inner:eq(0)').find('.option-container-ele').each(function(index){
					if(index === tempIndex+2){
						$(this).addClass('active');
					}else{
						$(this).removeClass('active');
					}
				});

				
				if(tempIndex === tempLength){
					isOptioning = true;
					optionTimeout = setTimeout(function(){
						ele.parent('div').addClass('disabled');
						ele.siblings('.options-container-inner:eq(0)').find('.options-container-cycle').css('transform', 'translateX(-5.3%)');

						ele.siblings('.options-container-inner:eq(0)').find('.options-container-cycle').find('.option-container-ele:eq(2)').addClass('active');
						ele.parent('div').attr('current', 0);
						isOptioning = false;
					}, 310);
					slideshowH(0, 0, $('.slideshow-container'))
				}else{
					slideshowH(0, tempIndex, $('.slideshow-container'))
				}
				
			}
			
			if(tempIndex == -1){
				tempIndex = tempLength-1;
			}else if(tempIndex == tempLength){
				tempIndex = 0;
			}
			
			
			//$('.options-label-container').html($('.slideshow-ele:eq('+tempIndex+')').attr('nickname'));
			$('.options-label-container > div').each(function(index){
				if(index === tempIndex){
					$(this).addClass('active')
				}else{
					$(this).removeClass('active')
				}
			})
			
			
			$(this).parent('div').attr('current', tempIndex);
			console.log(tempIndex);
			tempCostume = tempIndex;
		}
    });
	
	if($('#canvas-upload').length > 0){
		uploadCanvas = document.getElementById('canvas-upload');
		uploadContext = uploadCanvas.getContext('2d');

		tempCanvas = document.getElementById('canvas-temp-char');
		tempContext = tempCanvas.getContext('2d');
		
		tempCanvasB = document.getElementById('canvas-temp-char-fc');
		tempContextB = tempCanvasB.getContext('2d');
	}
	
	$('#input-image').change(function(e){
		gtag("event", 'upload-avatar');
		const file = this.files[0];
		if (file){
        	let reader = new FileReader();
        	reader.onload = function(event){
				uploadContext.clearRect(0, 0, $('.profile-picture-container-inner > div').width(), $('.profile-picture-container-inner > div').height());
				tempImageStore.src = event.target.result;
          	}
        	reader.readAsDataURL(file);
        }
	}) 
	 
	$('.general-button.avatar').click(function(){
		
		if(tempImageStore.src != ''){
			gtag("event", 'click-submit-avatar');
			overlayerH('loader');
			var randomBody = (Math.ceil(Math.random()*3));
			tempBodyImage = new Image();
			tempBFCImage = new Image();
			
			tempBodyImage.onload = function(ev){
				tempContext.save();
				/*if(Math.random()*2 > 1){
					tempContext.scale(-1, 1);
					tempContext.drawImage(ev.target, -1000, 780, 1000, 550);
					tempBFCImage.src = '../img/char-body-00'+randomBody+'-1-'+(Math.floor(Math.random()*2))+'.png';
				}else{
					tempContext.drawImage(ev.target, 0, 780, 1000, 550);
					tempBFCImage.src = '../img/char-body-00'+randomBody+'-0-'+(Math.floor(Math.random()*2))+'.png';
				}*/
				tempContext.drawImage(ev.target, 0, 780, 1000, 550);
				tempContext.restore();
				
				tempBFCImage.src = '../img/char-body-'+(tempCostume+1)+'-fc.png';
			}
			
			tempBodyImage.src = '../img/char-body-'+(tempCostume+1)+'.png';
			
			tempBFCImage.onload = function(ev){
				tempContextB.save();
				tempContextB.drawImage(ev.target, 0, 780, 1000, 550);
				tempContextB.restore();
				
				tempCostumeImage = new Image();
				tempCostumeImage.onload = function(ev){
					tempContext.drawImage(ev.target, 0, 0, 1000, 1000);
					tempContextB.drawImage(ev.target, 0, 0, 1000, 1000);

					var tempRatio = 1000/$('.ruler-container').height();
					var tempLeft = parseInt($('.profile-picture-container-inner > div').css('left'));
					var tempTop = parseInt($('.profile-picture-container-inner > div').css('top'));

					tempContext.beginPath(); 
					tempContext.ellipse(500, 710, 150, 190, 0, 0, 2*Math.PI);
					tempContext.clip();

					tempContext.drawImage(tempImageStore, tempLeft/lastWidth*oriW*-1, tempTop/lastWidth*oriW*-1, $('.profile-picture-container-inner').width()/lastWidth*oriW, $('.profile-picture-container-inner').outerHeight(true)/lastWidth*oriW, (1000-$('.profile-picture-container-inner').width()*tempRatio)*0.5, (1000*0.9-$('.profile-picture-container-inner').outerHeight(true)*tempRatio), $('.profile-picture-container-inner').width()*tempRatio, $('.profile-picture-container-inner').outerHeight(true)*tempRatio);
					
					
					tempContextB.beginPath(); 
					tempContextB.ellipse(500, 710, 150, 190, 0, 0, 2*Math.PI);
					tempContextB.clip();

					tempContextB.drawImage(tempImageStore, tempLeft/lastWidth*oriW*-1, tempTop/lastWidth*oriW*-1, $('.profile-picture-container-inner').width()/lastWidth*oriW, $('.profile-picture-container-inner').outerHeight(true)/lastWidth*oriW, (1000-$('.profile-picture-container-inner').width()*tempRatio)*0.5, (1000*0.9-$('.profile-picture-container-inner').outerHeight(true)*tempRatio), $('.profile-picture-container-inner').width()*tempRatio, $('.profile-picture-container-inner').outerHeight(true)*tempRatio);

					
					if(!isSending){
						isSending = true;
						var b=JSON.stringify({"requests":[{  "image":{ "content": tempCanvas.toDataURL().replace('data:', '').replace(/^.+,/, '') }, "features": [{"type":"LABEL_DETECTION","maxResults":50}, { "type": "SAFE_SEARCH_DETECTION", "maxResults":50 }, {"type":"OBJECT_LOCALIZATION","maxResults":50}, {"type":"DOCUMENT_TEXT_DETECTION","model": "builtin/latest","maxResults":50}] }] });
						var e=new XMLHttpRequest;

						e.open("POST","https://vision.googleapis.com/v1/images:annotate?key=AIzaSyBrLm3CrJij1Qkgiy5k-780HgqZjdds7i0",!0);
						e.send(b);
						$('.error-txt').html('')

						e.onload = function(){ 
							var isPassed = true;
							console.log(e.responseText);
							res = JSON.parse(e.responseText);

							if(res.responses[0].labelAnnotations){
								for(var i=0; i<res.responses[0].labelAnnotations.length; i++){
									if(res.responses[0].labelAnnotations[i].score > 0.7){
										if(labelList.findIndex(element => { return element.toLowerCase() === res.responses[0].labelAnnotations[i].description.toLowerCase(); }) > -1){
											isPassed = false;
											console.log(res.responses[0].labelAnnotations[i].description);
											$('.error-txt').html('*該照片含有不當內容。');
										}
									}
								}
							}
							if(res.responses[0].textAnnotations){
								for(var i=0; i<res.responses[0].textAnnotations.length; i++){
									if(textList.findIndex(element => { return element.toLowerCase() === res.responses[0].textAnnotations[i].description.toLowerCase(); }) > -1){
										isPassed = false;
										console.log(res.responses[0].textAnnotations[i].description);
										$('.error-txt').html('*該照片含有不當用語。');
									}
								}
							}
							if(res.responses[0].safeSearchAnnotation){
								for (const key in res.responses[0].safeSearchAnnotation){
									if(res.responses[0].safeSearchAnnotation[key] === 'VERY_LIKELY' || res.responses[0].safeSearchAnnotation[key] === 'LIKELY'){
										isPassed = false;
										console.log(key)
										$('.error-txt').html('*該照片含有不當內容。');
									}else if(res.responses[0].safeSearchAnnotation[key] === 'POSSIBLE'){
										if(key === 'adult' || key === 'violence'){
											isPassed = false;
											console.log(key);
											$('.error-txt').html('*該照片含有不當內容。');
										}
									}
								}
							}
							if(res.responses[0].localizedObjectAnnotations){
								for(var i=0; i<res.responses[0].localizedObjectAnnotations.length; i++){
									if(res.responses[0].localizedObjectAnnotations[i].score > 0.7){
										if(objectList.findIndex(element => { return element.toLowerCase() === res.responses[0].localizedObjectAnnotations[i].name.toLowerCase(); }) > -1){
											isPassed = false;
											console.log(res.responses[0].localizedObjectAnnotations[i].name);
											$('.error-txt').html('*該照片含有不當內容。');
										}
									}
								}
							}

							if(isPassed){
								var CryptoJS = cryptH();
								var strA = tempCanvas.toDataURL();
								var keyA = CryptoJS.MD5(unique);
								keyA = CryptoJS.enc.Utf8.parse(keyA)
								var encodeA = CryptoJS.AES.encrypt( strA, keyA, { mode:CryptoJS.mode.ECB } ).toString()
								
								var strB = tempCanvasB.toDataURL();
								var keyB = CryptoJS.MD5(unique);
								keyB = CryptoJS.enc.Utf8.parse(keyB)
								var encodeB = CryptoJS.AES.encrypt( strB, keyB, { mode:CryptoJS.mode.ECB } ).toString()
								
								
								var sdata = { img:encodeA, imgB:encodeB, uid:unique, costume:tempCostume}
								// TBD: send hash to create file name + DB
								$.ajax({
									 method: "POST",
									 url: root+"php/upload-data.php", 
									 data: sdata,
								}).done(function(msg) {
									isSending = false;
									console.log(msg)
									if(msg.search('.png') > 1){
										// TBD: redirect to ingredients 
										window.location = root+'room/?rid='+roomID;
										//window.location = root+'room/?room='+msg;
									}else{
										overlayerH('invalid-image');
									}
								});	
							}else{
								isSending = false;
								overlayerH('invalid-image');
								gtag("event", 'alert-avatar-bad');
							}
						};
					}
					
					// if ok, next upload
				}

				var bgSrc = $('.slideshow-ele.active').css('background-image');

				bgSrc = bgSrc.replace('url("', '');
				bgSrc = bgSrc.replace('")', ''); 
				console.log(bgSrc)
				tempCostumeImage.src = bgSrc;
			}
			
		}else{
			$('.error-txt').html('*請上載頭像。');
			overlayerH('invalid-image');
			gtag("event", 'click-submit-avatar-empty');
		}
	});
	
	
	
	tempImageStore = new Image();
    tempImageStore.onload = function(ev){
		lastScale = 1;
		oriW = ev.target.width;
		oriH = ev.target.height
		
        $('#canvas-upload').attr('height',oriH);
        $('#canvas-upload').attr('width',oriW);
		uploadContext.drawImage(ev.target, 0, 0);
		
		oriS = Math.max($('.profile-picture-container-inner').width()/oriW, $('.profile-picture-container-inner').outerHeight(true)/oriH)
		$('#canvas-upload').css('width', oriS*oriW);
		$('#canvas-upload').css('height', oriS*oriH);
		
		$('.profile-picture-container-inner > div').css('left', ($('.profile-picture-container-inner').width() - oriS*oriW)*0.5);
		$('.profile-picture-container-inner > div').css('top', ($('.profile-picture-container-inner').outerHeight(true) - oriS*oriH)*0.5)
		
		$('.profile-picture-container-inner > div').css('width', oriS*oriW);
		$('.profile-picture-container-inner > div').css('height', oriS*oriH);
		
		lastWidth = parseInt($('.profile-picture-container-inner > div').css('width'));
    }
    //tempImageStore.src = 'img/clea-mok.png';
	
	
	$('.profile-picture-container').touchstart(function(e){
		e.preventDefault();
		isDragging = true;
		var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
		lastX = touch.pageX;
		lastY = touch.pageY;
	})
	$(window).touchend(function(){
		isDragging = false;
	})
	$(window).touchmove(function(e){
		e.preventDefault();
		if(isDragging){
			var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
			var diffX = touch.pageX - lastX;
			var diffY = touch.pageY - lastY;
			
			var currentLeft = parseInt($('.profile-picture-container-inner > div').css('left')) + diffX;
			currentLeft = Math.min(currentLeft, 0);
			currentLeft = Math.max(currentLeft, $('.profile-picture-container-inner').width() - $('.profile-picture-container-inner > div').width());
			$('.profile-picture-container-inner > div').css('left', currentLeft);
			
			var currentTop = parseInt($('.profile-picture-container-inner > div').css('top'))+diffY;
			currentTop = Math.min(currentTop, 0);
			currentTop = Math.max(currentTop, $('.profile-picture-container-inner').outerHeight(true) - $('.profile-picture-container-inner > div').height());
			$('.profile-picture-container-inner > div').css('top', currentTop);
			
			lastX = touch.pageX;
			lastY = touch.pageY;
		}
	})
	
	var dom = document.getElementById('drag-container');
	document.addEventListener("gesturestart", function (e) {
		e.preventDefault();
		document.body.style.zoom = 0.99;
	});
	document.addEventListener("gesturechange", gestureChange, false);
	document.addEventListener("gestureend", gestureEnd, false);
	/*document.addEventListener("gesturestart", function (e) {
		e.preventDefault();
		document.body.style.zoom = 0.99;
	});

	document.addEventListener("gesturechange", function (e) {
		e.preventDefault();
		document.body.style.zoom = 0.99;
	});
	document.addEventListener("gestureend", function (e) {
		e.preventDefault();
		document.body.style.zoom = 1;
	}); */
	
	$('.dish-container').click(function(){
		$(this).toggleClass('active');
		var isOK = 0;
		var numTotal = 0;
		$('.dish-count-container').each(function(){
			if(parseInt($(this).text()) > 0){
				numTotal++;
			}
		})  
		
		if(numTotal >= 6 && $(this).hasClass('active') && !$(this).find('.dish-count-container').hasClass('default')){
			$(this).removeClass('active');
			overlayerH('max-six');
			gtag("event", 'alert-ingredient-six');
			isOK = 1;
		}
		if($('.dish-container.active').length > 3){
			$(this).removeClass('active');
			overlayerH('max-three');
			gtag("event", 'alert-ingredient-three');
			isOK = 1;
		}
		
		gtag("event", 'click-ingredient');
		
		if(isOK < 1){
			var num = parseInt($(this).find('.dish-count-container').text());
			if($(this).hasClass('active')){
				num = num+1;
				if(num === 1){
					numTotal++;
				}
			}else{
				num = num-1;	
				if(num === 0){
					numTotal--;
				}
			}
			num = Math.max(num, 0);
			$(this).find('.dish-count-container').text(num);
		}
		
		$('.counter').html(numTotal+'/6 已選取食材');
	})
	
	$('.general-button.submit').click(function(){
		var numTotal = 0;
		$('.dish-count-container').each(function(){
			if(parseInt($(this).text()) > 0){
				numTotal++;
			}
		});
		
		if($('.dish-container.active').length > 0 && numTotal <= 6){
			overlayerH('reconfirm');
			gtag("event", 'alert-ingredient-reconfirm');
		}else{
			overlayerH('invalid-select');
			gtag("event", 'alert-ingredient-empty');
		}
	});
	
	$('.overlay-container .general-button.reconfirm').click(function(){
		gtag("event", 'alert-ingredient-submit');
		//if($('.dish-container.active').length > 0 && numTotal <= 6){
			if(!isSending){
				var numSelect = '';
				$('.dish-container').each(function(index){
					if($(this).hasClass('active')){
						if(numSelect === ''){
							numSelect = index;
						}else{
							numSelect = numSelect+','+index;
						}
					}
				});
				
				overlayerH('loader');
				isSending = true;
				var sdata =  { ing:numSelect, uid:unique, rid:roomID}
				console.log(sdata);
				$.ajax({
					 method: "POST",
					 url: root+"php/add-ingredients.php", 
					 data: sdata,
				}).done(function(msg){
					isSending = false;
					console.log('msg:'+msg);
					if(msg === 'invite'){ 
						window.location = root+'result/?rid='+roomID;
					}else if(msg === 'wait'){ 
						window.location = root+'result/?rid='+roomID;
						//window.location = root+'result/?room='+roomID;
					}else if(msg === 'done'){  
						window.location = root+'result/?rid='+roomID;
						//window.location = root+'finish/?room='+roomID;
					}else if(msg === 'already'){ 
						window.location = root+'result/?rid='+roomID;
						//window.location = root+'finish/?room='+roomID;
					}else if(msg === 'nonmember'){ 	
						window.location = root+'';	
					}else if(msg === 'nonuser'){ 	
						window.location = root+'profile/?rid='+roomID;
					}else if(msg === 'nonroom'){ 	
						window.location = root+'';
					}else if(msg === 'toomuch'){ 	
						window.location = root+'';	
					}else{
						alert('try again later');
						overlayerH('na');
					}
				});
			}
		//}else{
			
		//}
	});
	
	var hoverEle = '.gender-button';
	if(device.mobile() || device.tablet()){ 
		
		$(hoverEle).touchstart(function(){
			$(this).addClass('hover');
		});
		$(hoverEle).touchend(function(){
			$(this).removeClass('hover');
		});
	}else{
		$(hoverEle).mouseenter(function(){
			$(this).addClass('hover');
		});
		$(hoverEle).mouseleave(function(){
			$(this).removeClass('hover');
		});
	};
	
	$(window).scroll(function(){
		if($(window).scrollTop() > fs*1){
			$('.cover-container').addClass('active');
		}else{
			$('.cover-container').removeClass('active');
		}
	});
	$('.all-container').scroll(function(){
		if($(this).scrollTop() > fs*1){
			$('.cover-container').addClass('active');
		}else{
			$('.cover-container').removeClass('active');
		}
	});
 
	isInit = true;
	console.log('init');
	resizeH();
	$(window).scroll();
	
	$('.news-container').addClass('active');
	
}

function resizeDelayH(){
	clearTimeout(resizeTimeout);
	resizeTimeout = setTimeout(resizeH, 500);
}
function resizeH(){
	fs = parseInt($('html').css('font-size'));
	windowW = $(window).width();
	if(windowW >= 640){
		$('.page-container').css('min-height', '100%')
		$('.all-container').css('min-height', 0)
	}else{
		$('.page-container, .all-container').css('min-height', $('html,body').height())
	}
	//
	//$('.backdrop-container, .frontdrop-container').css('height', $('.page-container.home').height())
}

function pageNavH(n){
	currentPage += n;
	
	//$('.page-container').removeClass('active');
	$('.page-container, .fix-button-container').addClass('active');
	
}

function slideshowH(d, t, ele){ //dir, target, slideshow
	ele.find('.slideshow-ele').removeClass('default');
	if(d === 0){ 
		ele.find('.slideshow-ele').each(function(index){
			if(t === index){
				$(this).removeClass('sw-right-to-center sw-left-to-center sw-center-to-left sw-center-to-right active');
				$(this).addClass('sw-right-to-center active');
				
				$(this).find('.block-element').addClass('active')
				
			}else if($(this).hasClass('active')){
				$(this).removeClass('sw-right-to-center sw-left-to-center sw-center-to-left sw-center-to-right active');	 
				$(this).addClass('sw-center-to-left');	 
				$(this).find('.block-element').removeClass('active')
			}else{
				$(this).removeClass('sw-right-to-center sw-left-to-center sw-center-to-left sw-center-to-right active');	
				$(this).find('.block-element').removeClass('active')
			}
		})
	}else if(d === 1){
		ele.find('.slideshow-ele').each(function(index){
			if(t === index){
				$(this).removeClass('sw-right-to-center sw-left-to-center sw-center-to-left sw-center-to-right active');
				$(this).addClass('sw-left-to-center active');
				
				$(this).find('.block-element').addClass('active')
				
			}else if($(this).hasClass('active')){
				$(this).removeClass('sw-right-to-center sw-left-to-center sw-center-to-left sw-center-to-right active');	 
				$(this).addClass('sw-center-to-right');	 
				$(this).find('.block-element').removeClass('active')
			}else{
				$(this).removeClass('sw-right-to-center sw-left-to-center sw-center-to-left sw-center-to-right active');
				$(this).find('.block-element').removeClass('active')
			}
		})
	}
 
	ele.find('.slideshow-nav > button').each(function(index){
		if(index === t){
			$(this).addClass('active');
		}else{
			$(this).removeClass('active');
		}
	});
	
	//ele.siblings('.slideshow-num').html((t+1)+' / '+(ele.find('.slideshow-ele').length));
	
	ele.attr('current', t)
}


function gestureChange(e) {
    e.preventDefault();

    lastScale = e.scale;
    var tempWidth = lastWidth * lastScale;

    if (tempWidth > maxW) tempWidth = maxW;
    if (tempWidth < oriW*oriS) tempWidth = oriW*oriS;

	$('.profile-picture-container-inner > div, #canvas-upload').css('width', tempWidth);
	$('.profile-picture-container-inner > div, #canvas-upload').css('height', tempWidth/oriW*oriH);
	
	
	var currentLeft = parseInt($('.profile-picture-container-inner > div').css('left'));
	currentLeft = Math.min(currentLeft, 0);
	currentLeft = Math.max(currentLeft, $('.profile-picture-container-inner').width() - $('.profile-picture-container-inner > div').width());
	$('.profile-picture-container-inner > div').css('left', currentLeft);
			
	var currentTop = parseInt($('.profile-picture-container-inner > div').css('top'));
	currentTop = Math.min(currentTop, 0);
	currentTop = Math.max(currentTop, $('.profile-picture-container-inner').outerHeight(true) - $('.profile-picture-container-inner > div').height());
	$('.profile-picture-container-inner > div').css('top', currentTop);
	document.body.style.zoom = 0.99;
}

function gestureEnd(e) {
    e.preventDefault();
    lastWidth = parseInt($('.profile-picture-container-inner > div').css('width'));
	document.body.style.zoom = 1;
}

function overlayerH(cls){
	$('.overlay-container').removeClass('active');
	$('.overlay-container.'+cls).addClass('active');
}

function shuffle(array) {
  let currentIndex = array.length,  randomIndex;

  // While there remain elements to shuffle.
  while (currentIndex > 0) {

    // Pick a remaining element.
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex--;

    // And swap it with the current element.
    [array[currentIndex], array[randomIndex]] = [
      array[randomIndex], array[currentIndex]];
  }

  return array;
}

function randomBubbles(){
	$('.bubble-container').each(function(){
		var randomSize = 3+Math.ceil(Math.random()*5);
		$(this).css('width',randomSize+'%');
		$(this).css('padding-bottom',randomSize+'%');

		$(this).css('top', 15+Math.ceil(Math.random()*70)+'%');
		$(this).css('left', 5+Math.ceil(Math.random()*(90-randomSize))+'%');
		 
		$(this).css('animation-duration', (5+Math.ceil(Math.random()*5))*100+'ms');
	});
	
	var randomTopIng = [5,70,18,31,44,57];
	shuffle(randomTopIng);
	
	$('.ingredient-container > div').each(function(){
		var randomScale = 0.8+Math.ceil(Math.random()*2)*0.1;
		var randomDeg = -10+Math.ceil(Math.random()*20);
		$(this).css('transform', 'rotate('+randomDeg+'deg) scale('+randomScale+')');
	});
	$('.ingredient-container').each(function(index){
		$(this).css('animation-delay', (index)*(100+10*index)+'ms');
		//$(this).css('top', 5+Math.ceil(Math.random()*65)+'%');
		$(this).css('top', randomTopIng[index]+'%');
		$(this).css('left',-4+(index*10)+'%');
	});
	
	var randomTopMem = [-5,52,41,30,19,8];
	shuffle(randomTopMem);
	$('.member-container > div').each(function(){
		var randomScale = 0.8+Math.ceil(Math.random()*2)*0.1;
		var randomDeg = -5+Math.ceil(Math.random()*10);
		$(this).css('transform', 'rotate('+randomDeg+'deg) scale('+randomScale+')');
	});
	$('.member-container').each(function(index){
		$(this).css('animation-delay', (index)*(100+15*index)+'ms');
		//$(this).css('top', -5+Math.ceil(Math.random()*57)+'%');
		$(this).css('top', randomTopMem[index]+'%');
		$(this).css('left',-10+(index*(75/$('.member-container').length))+'%');
	});
	
}
function checkBubbles(){
	$('.bubbles-container').each(function(){
		var tempParent = $(this);
		
		$(this).find('.bubble-container').each(function(){
			if($(this).css('opacity') <= 0){
				$(this).remove();
				if(tempParent.find('.bubble-container').length < 5){
					tempParent.append('<div class="bubble-container"></div>');

					var randomSize = 3+Math.ceil(Math.random()*5);
					tempParent.find('.bubble-container:eq('+(tempParent.find('.bubble-container').length-1)+')').css('width',randomSize+'%');
					tempParent.find('.bubble-container:eq('+(tempParent.find('.bubble-container').length-1)+')').css('padding-bottom',randomSize+'%');

					tempParent.find('.bubble-container:eq('+(tempParent.find('.bubble-container').length-1)+')').css('top', 15+Math.ceil(Math.random()*70)+'%');
					tempParent.find('.bubble-container:eq('+(tempParent.find('.bubble-container').length-1)+')').css('left',Math.ceil(Math.random()*(100-randomSize))+'%');
					tempParent.find('.bubble-container:eq('+(tempParent.find('.bubble-container').length-1)+')').css('animation-duration', (5+Math.ceil(Math.random()*6))*100+'ms');
				}
			}
		});
	});
	
	window.requestAnimationFrame(checkBubbles);
}

function makeUnique(length) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;
    let counter = 0;
    while (counter < length) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
      counter += 1;
    }
    return result;
}
