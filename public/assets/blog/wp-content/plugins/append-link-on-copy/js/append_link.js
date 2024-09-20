// original function by c. bavota at: http://bavotasan.com/2010/add-a-copyright-notice-to-copied-text/
function addLink() {
	var body_element = document.getElementsByTagName('body')[0];
	var selection;
	selection = window.getSelection();
	var linebreaks = '';
	var link_name;


	for (i = 0; i < append_link.prepend_break; i++) {
		linebreaks = linebreaks + '<br />';
	}

	if (append_link.use_title == 'true') {
		link_name = append_link.page_title;
	}
	else {
		link_name = document.URL
	}

	if (append_link.add_site_name == 'true') {
		link_name += ' | ' + append_link.site_name;
	}

	if (append_link.always_link_site == true) {
		link_url = append_link.site_url;
	}
	else {
		link_url = document.URL;
	}

	var pagelink =
		linebreaks
		+ ' ' + append_link.read_more + ' ';

	pagelink = pagelink.replace('%link%', ' ' + link_url + ' ');

	var copytext = selection + pagelink;
	var newdiv = document.createElement('div');

	newdiv.style.position='absolute';
	newdiv.style.left='-99999px';
	body_element.appendChild(newdiv);
	newdiv.innerHTML = copytext;
	selection.selectAllChildren(newdiv);
	window.setTimeout(function() {
		body_element.removeChild(newdiv);
	},0);
}

document.oncopy = addLink;
