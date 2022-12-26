const navSlide=()=>{
	const burger = document.querySelector('.burger');
	const nav = document.querySelector('.nav-links');
	const navLinks = document.querySelectorAll('.nav-links li');
	const wrapper = document.querySelector('.wrapper');
	
	burger.addEventListener('click',()=>{
		//toggle Nav
		nav.classList.toggle('nav-active');

		//Animate links
		navLinks.forEach((link,index)=>{
			if(link.style.animation){
				link.style.animation = '';
			}else{
				link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
			}
		});
		//burger animation
		burger.classList.toggle('toggle');
	});
	wrapper.addEventListener('click',()=>{
		if(nav.classList.contains('nav-active')){
			nav.classList.toggle('nav-active');
			burger.classList.toggle('toggle');
			navLinks.forEach((link,index)=>{
			if(link.style.animation){
				link.style.animation = '';
			}else{
				link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
			}
		});
		}
	});
}

navSlide();