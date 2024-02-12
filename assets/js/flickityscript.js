var bubblesInViewportArray = [];
var bubbles;
var cancelAnim = true;
var stopAnim;

function getBubblesInViewport()
{
	bubbles = document.querySelectorAll('.bubble2');
	for (var i = 0; i < bubbles.length; i++) {
		var vp = bubbles[i].firstElementChild.getBoundingClientRect();
		if (
			vp.top >= 0 &&
			vp.left >= 0 &&
			vp.right <= (window.innerWidth || document.documentElement.clientWidth) &&
			vp.bottom <= (window.innerHeight || document.documentElement.clientHeight))
	  	{
			bubblesInViewportArray.push(bubbles[i]);
			console.log("in array");
		}
		else
		{
			console.log("not in array");
		}
	}
}

function bubbleAnim()
{
	console.log("bubble array: " + bubblesInViewportArray.length);
	var bubbles2Rand = Math.floor(Math.random() * bubblesInViewportArray.length);
	if (bubblesInViewportArray[bubbles2Rand].childElementCount > 1)
	{
		console.log("has child nodes");
		console.log(bubbles2Rand);

		if(cancelAnim == false)
		{
			console.log("running");
			bubblesInViewportArray[bubbles2Rand].firstElementChild.style.animationPlayState = 'running';
			bubblesInViewportArray[bubbles2Rand].firstElementChild.addEventListener("animationend", nextFunc);
			bubblesInViewportArray[bubbles2Rand].firstElementChild.style.animation = "top 6s ease-in-out 1s, fade-out 3s ease-in-out 1s";
		}
		else
		{
			console.log("paused");
			bubblesInViewportArray[bubbles2Rand].firstElementChild.style.animationPlayState = 'paused';
		}
	}
}

function nextFunc()
{
	console.log("end");
	this.remove();
}

window.addEventListener("DOMContentLoaded", function()
{
	var randAnim;
	var id;
	var divAnim;
	var left;
	var bubbleNum = document.getElementById('wrapper');
	var offsetSlider = document.getElementById('offset');
	var monthly = document.getElementById('sliderOutput');
	var offset = document.getElementById('sliderResult');
	var sliderNum = document.getElementById('offsetNumber');
	var result = (2.54014 * offsetSlider.value) / 1000;
	var sliderNumPos;

	monthly.innerHTML = offsetSlider.value;
	offset.innerHTML = Math.ceil(result);
	//sliderNumPos = offsetSlider.value / offsetSlider.max;
	//sliderNum.style.left = offsetSlider.value + "%";
	sliderNumPos = Number(((offsetSlider.value - offsetSlider.min) * 100) / (offsetSlider.max - offsetSlider.min));
	sliderNum.style.left = `calc(${sliderNumPos}% + (${41 - sliderNumPos * 0.82}px))`;

	offsetSlider.oninput = function()
	{
		var computedResult = (2.54014 * offsetSlider.value) / 1000;
		
		if(offsetSlider.value <= 9)
		{
			monthly.innerHTML = offsetSlider.value;
			sliderNum.innerHTML = "0" + offsetSlider.value;
		}
		else
		{
			monthly.innerHTML = sliderNum.innerHTML = offsetSlider.value;
		}

		offset.innerHTML = Math.ceil(computedResult);
		offsetSlider.style.background = 'linear-gradient(to right, #A5CDAA 0%, #A5CDAA ' + offsetSlider.value + '%, #A8ADAD ' + offsetSlider.value + '%, #A8ADAD 100%)';
		//sliderNumPos = offsetSlider.value / offsetSlider.max;
		//sliderNum.style.left = offsetSlider.value + "%";
		sliderNumPos = Number(((offsetSlider.value - offsetSlider.min) * 100) / (offsetSlider.max - offsetSlider.min));
		sliderNum.style.left = `calc(${sliderNumPos}% + (${41 - sliderNumPos * 0.82}px))`;
	}

	const inViewport = (entries, observer) => {
	  entries.forEach(entry => {

	  	if(entry.isIntersecting)
	  	{
	  		cancelAnim = false;

	  		setTimeout(function()
	  		{
	  			getBubblesInViewport();
	  		}, 500);

	  		if(bubblesInViewportArray.length != 0)
			{
				bubbleAnim();

				stopAnim = window.setInterval(function()
				{
					bubbleAnim();
				}, 5000);
			}
	  	}
	  	
	  	if(!entry.isIntersecting)
	  	{
	  		cancelAnim = true;
	  		clearInterval(stopAnim);
	  	}
	  });
	};

	const Obs = new IntersectionObserver(inViewport);
	const obsOptions = {};

	const ELs_inViewport = document.querySelectorAll('[data-inviewport]');
	ELs_inViewport.forEach(EL => {
	  Obs.observe(EL, obsOptions);
	});


	/*if(bubblesInViewportArray.length != 0)
	{
		bubbleAnim();

		window.setInterval(function()
		{
			bubbleAnim();
		}, 5000);
	}*/
});