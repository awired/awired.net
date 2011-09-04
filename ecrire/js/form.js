var currentForms = new Array();
var formsInPage = new Array();
var formSubmit = false;
var closePagePrompt = 'You have unsaved changes';

function getCurrentForms() {
	if (document.getElementById && document.getElementsByTagName) {
		formsInPage = document.getElementsByTagName('form');
		
		for (var i=0; i<formsInPage.length; i++) {
			f = formsInPage[i];
			var tmpForm = new Array();
			for (var j=0; j<f.elements.length; j++) {
				tmpForm.push(getFormElementValue(f[j]));
			}
			currentForms.push(tmpForm);
		}
	}
}

function addFormsEvent() {
	if (formsInPage.length == 0) {
		return null;
	}
	
	for (var i=0; i<formsInPage.length; i++) {
		formsInPage[i].onsubmit = function() { formSubmit = true; };
	}
}

function compareForms() {
	if (currentForms.length == 0) {
		return null;
	}
	
	for (var i=0; i<formsInPage.length; i++) {
		form = formsInPage[i];
		
		for (var j=0; j<form.elements.length; j++) {
			if (currentForms[i][j] != getFormElementValue(form[j])) {
				return false;
			}
		}
	}
	
	return true;
}

function getFormElementValue(e) {
	if (e.type == 'radio') {
		return getFormRadioValue(e);
	} else if (e.type == 'checkbox') {
		return getFormCheckValue(e);
	} else {
		return e.value;
	}
}

function getFormCheckValue(e) {
	if (e.checked) {
		return e.value;
	}
	return null;
}

function getFormRadioValue(e) {
	for (var i=0; i <e.length; i++) {
		if (e[i].checked) {
			return e[i].value;
		} else {
			return null;
		}
	}
}

function confirmCloseForms(event_) {
	if (!event_ && window.event) {
		event_ = window.event;
	}

	if (!formSubmit) {
		if (!compareForms()) {
			event_.returnValue = closePagePrompt;

			return closePagePrompt;
		}
	}
}
