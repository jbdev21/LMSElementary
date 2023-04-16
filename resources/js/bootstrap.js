import _ from 'lodash';
window._ = _;

// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'

import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.addEventListener('load', () => {
	/* ===== Responsive Sidepanel ====== */
	const sidePanelToggler = document.getElementById('sidepanel-toggler');
	const sidePanel = document.getElementById('app-sidepanel');
	const sidePanelDrop = document.getElementById('sidepanel-drop');
	const sidePanelClose = document.getElementById('sidepanel-close');

	window.addEventListener('load', function () {
		responsiveSidePanel();
	});

	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	return new bootstrap.Tooltip(tooltipTriggerEl)
	})

	window.addEventListener('resize', function () {
		responsiveSidePanel();
	});


	function responsiveSidePanel() {
		let w = window.innerWidth;
		if (w >= 1200) {
			sidePanel.classList.remove('sidepanel-hidden');
			sidePanel.classList.add('sidepanel-visible');
		} else {
			sidePanel.classList.remove('sidepanel-visible');
			sidePanel.classList.add('sidepanel-hidden');
		}
	};


	sidePanelToggler.addEventListener('click', () => {
		if (sidePanel.classList.contains('sidepanel-visible')) {
			sidePanel.classList.remove('sidepanel-visible');
			sidePanel.classList.add('sidepanel-hidden');
		} else {
			sidePanel.classList.remove('sidepanel-hidden');
			sidePanel.classList.add('sidepanel-visible');
		}
	});


	sidePanelClose.addEventListener('click', (e) => {
		e.preventDefault();
		sidePanelToggler.click();
	});

	sidePanelDrop.addEventListener('click', (e) => {
		sidePanelToggler.click();
	});

});