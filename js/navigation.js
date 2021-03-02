/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
	const siteNavigation = document.getElementById('site-navigation');

	// Return early if the navigation don't exist.
	if (!siteNavigation) {
		return;
	}

	const button = siteNavigation.getElementsByTagName('button')[0];

	// Return early if the button don't exist.
	if ('undefined' === typeof button) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName('ul')[0];

	// Hide menu toggle button if menu is empty and return early.
	if ('undefined' === typeof menu) {
		button.style.display = 'none';
		return;
	}

	if (!menu.classList.contains('nav-menu')) {
		menu.classList.add('nav-menu');
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener('click', function () {
		siteNavigation.classList.toggle('toggled');

		if (button.getAttribute('aria-expanded') === 'true') {
			button.setAttribute('aria-expanded', 'false');
		} else {
			button.setAttribute('aria-expanded', 'true');
		}
	});

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener('click', function (Event) {
		const isClickInside = siteNavigation.contains(Event.target);

		if (!isClickInside) {
			siteNavigation.classList.remove('toggled');
			button.setAttribute('aria-expanded', 'false');
		}
	});

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName('a');

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

	// Toggle focus each time a menu link is focused or blurred.
	for (const link of links) {
		link.addEventListener('focus', toggleFocus, true);
		link.addEventListener('blur', toggleFocus, true);
	}

	// Toggle focus each time a menu link with children receive a touch Event.
	for (const link of linksWithChildren) {
		link.addEventListener('touchstart', toggleFocus, false);
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if (Event.type === 'focus' || Event.type === 'blur') {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while (!self.classList.contains('nav-menu')) {
				// On li elements toggle the class .focus.
				if ('li' === self.tagName.toLowerCase()) {
					self.classList.toggle('focus');
				}
				self = self.parentNode;
			}
		}

		if (Event.type === 'touchstart') {
			const menuItem = this.parentNode;
			Event.preventDefault();
			for (const link of menuItem.parentNode.children) {
				if (menuItem !== link) {
					link.classList.remove('focus');
				}
			}
			menuItem.classList.toggle('focus');
		}
	}

	jQuery(document).on("ready", function ($) {
		var offset = 100;
		var speed = 250;
		var duration = 500;
		jQuery(window).on("scroll", function () {
			if (jQuery(this).scrollTop() < offset) {
				jQuery('#ScrolltoTop').fadeOut(duration);
			} else {
				jQuery('#ScrolltoTop').fadeIn(duration);
			}
		});
		jQuery('#ScrolltoTop').on('click', function () {
			jQuery('html, body').animate({ scrollTop: 0 }, speed);
			return false;
		});
	});
	jQuery(document).on("ready", function (jQuery) {
		var coll = document.getElementsByClassName("collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
			coll[i].addEventListener("click", function () {
				this.classList.toggle("active");
				var content = this.nextElementSibling;
				if (content.style.maxHeight) {
					content.style.maxHeight = null;
				} else {
					content.style.maxHeight = content.scrollHeight + "px";
				}
			});
		}
	});
	jQuery('.menu-toggle').on("click", function () {
		if (jQuery('#primary-menu').hasClass("collapse") && jQuery('.menu-toggle[aria-expanded="false"]') == true) {
			jQuery('#primary-menu').removeClass("collapse");
			jQuery('#primary-menu').addClass("show");
		} else if (jQuery('#primary-menu').hasClass("show") && jQuery('.menu-toggle[aria-expanded="false"]') == false) {
			jQuery('#primary-menu').removeClass("show");
			jQuery('#primary-menu').addClass("collapse");
		}
	});
	jQuery(document).on("ready", function () {
		try {
			if (document.getElementById('wpadminbar')) {
				jQuery(document.getElementById('primary-menu')).css({ top: '113px' })
			}
		}
		catch {

		}
	})
	jQuery(document).on("ready", function () {
		//Condição para o menu virar hamburguer
		if (jQuery('#primary-menu li').length > 7) {
			jQuery('.menu-toggle').css({
				display: "block"
			});
			if (jQuery('.menu-toggle[aria-expanded="false"]')) {
				jQuery('#primary-menu').addClass("collapse")
			}
			jQuery('#primary-menu').addClass("hamburguer-desktop");
			jQuery(".sub-menu").css({
				display: "flex", position: "relative",
				flexDirection: "column", border: "none", position: "relative", left: "0", padding: "0px"
			});
			jQuery(".menu-item").css({
				display: "flex",
				flexDirection: "column",
				alignItems: "flex-end",
			});
			jQuery(".main-navigation ul ul.sub-menu li.menu-item:not(:last-child)").css({ border: "none" });
			jQuery(".sub-menu > .menu-item:first-child > a").css({ marginTop: "10px" });
			jQuery(".sub-menu > .menu-item:last-child > a").css({ borderBottom: "1px solid #d9d9d9", paddingBottom: "20px", marginBottom: "10px", width: "320px" });
		}
	});
}());