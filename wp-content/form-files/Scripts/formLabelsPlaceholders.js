var labels = document.querySelectorAll("p.pd-text label, p.pd-textarea label");
var i = labels.length;
while (i--) {
	var label = labels.item(i);
	var text = "Enter " + label.textContent;
	label.parentNode.classList.contains("required") && (text += " *");
	var nextElement = label.nextElementSibling;
	if (nextElement) {
		if (nextElement.tagName == 'SELECT') {
			nextElement.options[0].text = text;
		} else {
			nextElement.setAttribute("placeholder", text);
		}
	}
}