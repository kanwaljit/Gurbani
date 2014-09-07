var keep_keymap = false;

function disable_blur(){
	keep_keymap = true;
}

function enable_blur(){
	keep_keymap = false;
}

function tap(obj) {
	outputchar(obj.innerHTML);
}

function close_map() {
	if(!keep_keymap) {
		document.getElementById('key_map').style.display = 'none';
	}
}

function findthis(obj) {
	searchArea = obj;
	if(document.getElementById('search_lang_gu').checked) {
		document.getElementById('key_map').style.display = 'block';
	}
}

function layouttable0(inputkey) {
	var unicodekey = inputkey;
	switch (inputkey) {
	case 38:
		unicodekey = 2654;
		break;
	// numbers
	case 48:
		unicodekey = 2662;
		break;
	case 49:
		unicodekey = 2663;
		break;
	case 50:
		unicodekey = 2664;
		break;
	case 51:
		unicodekey = 2665;
		break;
	case 52:
		unicodekey = 2666;
		break;
	case 53:
		unicodekey = 2667;
		break;
	case 54:
		unicodekey = 2668;
		break;
	case 55:
		unicodekey = 2669;
		break;
	case 56:
		unicodekey = 2670;
		break;
	case 57:
		unicodekey = 2671;
		break;
	// characters
	case 60:
		unicodekey = 2676;
		break;
	case 65:
		unicodekey = 2565;
		break;
	case 66:
		unicodekey = 2605;
		break;
	case 67:
		unicodekey = 2587;
		break;
	case 68:
		unicodekey = 2599;
		break;
	case 69:
		unicodekey = 2579;
		break;
	case 70:
		unicodekey = 2594;
		break;
	case 71:
		unicodekey = 2584;
		break;
	case 72:
		return String.fromCharCode(2637, 2617);
		break;
	case 73:
		unicodekey = 2624;
		break;
	case 74:
		unicodekey = 2589;
		break;
	case 75:
		unicodekey = 2582;
		break;
	case 76:
		unicodekey = 2611;
		// unicodekey = 2620;// case 76: unicodekey= 2611;
		break;
	case 77:
		unicodekey = 2672;
		break;
	case 78:
		unicodekey = 2562;
		break;
	case 79:
		unicodekey = 2636;
		break;
	case 80:
		unicodekey = 2603;
		break;
	case 81:
		unicodekey = 2597;
		break;
	case 82:
		return String.fromCharCode(2637, 2608);
		break;
	case 83:
		unicodekey = 2614;
		break;
	case 84:
		unicodekey = 2592;
		break;
	case 85:
		unicodekey = 2626;
		break;
	case 86:
		unicodekey = 2652;
		break;
	case 87:
		return String.fromCharCode(2622, 2562);
		break;
	case 88:
		unicodekey = 2607;
		break;
	case 89:
		unicodekey = 2632;
		break;
	case 90:
		unicodekey = 2650;
		break;
	case 91:
		unicodekey = 2404;
		break;
	case 92:
		unicodekey = 2590;
		break;
	case 93:
		return String.fromCharCode(2404, 2404);
		break;
	case 94:
		unicodekey = 2649;
		break;
	case 95:
		//return String.fromCharCode(2637, 2613);
		break;
	case 96:
		unicodekey = 2673;
		break;
	case 97:
		unicodekey = 2675;
		break;
	case 98:
		unicodekey = 2604;
		break;
	case 99:
		unicodekey = 2586;
		break;
	case 100:
		unicodekey = 2598;
		break;
	case 101:
		unicodekey = 2674;
		break;
	case 102:
		unicodekey = 2593;
		break;
	case 103:
		unicodekey = 2583;
		break;
	case 104:
		unicodekey = 2617;
		break;
	case 105:
		return String.fromCharCode(2623);// return
		// String.fromCharCode(8205,2623);
		break;
	case 106:
		unicodekey = 2588;
		break;
	case 107:
		unicodekey = 2581;
		break;
	case 108:
		unicodekey = 2610;
		break;
	case 109:
		unicodekey = 2606;
		break;
	case 110:
		unicodekey = 2600;
		break;
	case 111:
		unicodekey = 2635;
		break;
	case 112:
		unicodekey = 2602;
		break;
	case 113:
		unicodekey = 2596;
		break;
	case 114:
		unicodekey = 2608;
		break;
	case 115:
		unicodekey = 2616;
		break;
	case 116:
		unicodekey = 2591;
		break;
	case 117:
		unicodekey = 2625;
		break;
	case 118:
		unicodekey = 2613;
		break;
	case 119:
		unicodekey = 2622;
		break;
	case 120:
		unicodekey = 2595;
		break;
	case 121:
		unicodekey = 2631;
		break;
	case 122:
		unicodekey = 2651;
		break;
	case 124:
		unicodekey = 2585;
		break;
	case 126:
		unicodekey = 2673;
		break;

	}
	return String.fromCharCode(unicodekey);
}

// other
function outputchar(inputkey) {
	var searchInput = document.getElementById('q');
	var previous, next, keychar;

	if (document.selection) {
		var range;

		// if range selected
		if (document.getElementById('q').createTextRange) {
			range = document.selection.createRange().duplicate();
			range.text = inputkey;
		}
	} else {
		if (searchInput.selectionStart || searchInput.selectionStart == "0") {
			var selstart = searchInput.selectionStart;
			var selend = searchInput.selectionEnd;
			//var sscroll = searchInput.scrollTop;
			var outputkey1 = (searchInput.value).substring(selstart, selend);

			// previous=iStr.charCodeAt(t-1)

			if (!outputkey1) {
				outputkey1 = inputkey;
			}
			// searchInput.value=searchInput.value.substring(0,selstart)+inputkey+searchInput.value.substring(selend,searchInput.value.length);
			temp1 = searchInput.value.substring(0, selstart) + inputkey
					+ searchInput.value.substring(selend, searchInput.value.length);
			var origStr = new String(temp1);
			keychar = origStr.charCodeAt(selstart);
			next = origStr.charCodeAt(selstart + 1);
			previous = origStr.charCodeAt(selstart - 1);
			temp2 = inputkey;
			var templen;
			if (previous == 2582 && keychar == 2620) {
				deleteprevchr();
				temp2 = String.fromCharCode(2649);
				searchInput.value = searchInput.value.substring(0, selstart - 1)
						+ temp2
						+ searchInput.value.substring(selend - 1,
								searchInput.value.length);
				templen = 0;
			}

			else if (previous == 2588 && keychar == 2620) {
				deleteprevchr();
				temp2 = String.fromCharCode(2651);
				searchInput.value = searchInput.value.substring(0, selstart - 1)
						+ temp2
						+ searchInput.value.substring(selend - 1,
								searchInput.value.length);
				templen = 0;
			}
			// ਗ਼
			else if (previous == 2583 && keychar == 2620) {
				deleteprevchr();
				temp2 = String.fromCharCode(2650);
				searchInput.value = searchInput.value.substring(0, selstart - 1)
						+ temp2
						+ searchInput.value.substring(selend - 1,
								searchInput.value.length);
				templen = 0;
			}

			else if (previous == 2603 && keychar == 2620) {
				deleteprevchr();
				temp2 = String.fromCharCode(2654);
				searchInput.value = searchInput.value.substring(0, selstart - 1)
						+ temp2
						+ searchInput.value.substring(selend - 1,
								searchInput.value.length);
				templen = 0;
			}

			else if (previous == 2610 && keychar == 2620) {
				deleteprevchr();
				temp2 = String.fromCharCode(2611);
				searchInput.value = searchInput.value.substring(0, selstart - 1)
						+ temp2
						+ searchInput.value.substring(selend - 1,
								searchInput.value.length);
				templen = 0;
			}

			else if (previous == 2616 && keychar == 2620) {
				deleteprevchr();
				temp2 = String.fromCharCode(2614);
				searchInput.value = searchInput.value.substring(0, selstart - 1)
						+ temp2
						+ searchInput.value.substring(selend - 1,
								searchInput.value.length);
				templen = 0;
			}
			// vowels ਇ
			else if (previous == 2674 && keychar == 2623) {
				deleteprevchr();
				temp2 = String.fromCharCode(2567);
				templen = 0;
				searchInput.value = searchInput.value.substring(0, selstart)
						+ temp2
						+ searchInput.value.substring(selend,
								searchInput.value.length);
			}
			// vowels ਈ
			else if (previous == 2674 && keychar == 2624) {
				deleteprevchr();
				temp2 = String.fromCharCode(2568);
				templen = 0;
				searchInput.value = searchInput.value.substring(0, selstart)
						+ temp2
						+ searchInput.value.substring(selend,
								searchInput.value.length);
			}
			// ਆਂ
			else if (previous == 2565 && keychar == 2622 && next == 2562) {
				deleteprevchr();
				temp2 = String.fromCharCode(2566, 2562);
				searchInput.value = searchInput.value.substring(0, selstart - 1)
						+ temp2
						+ searchInput.value.substring(selend - 1,
								searchInput.value.length);
				templen = 1;
			}
			// aida+kanna ਆ
			else if (previous == 2565 && keychar == 2622) {
				deleteprevchr();
				temp2 = String.fromCharCode(2566);
				searchInput.value = searchInput.value.substring(0, selstart - 1)
						+ temp2
						+ searchInput.value.substring(selend - 1,
								searchInput.value.length);
				templen = 0;
			}
			// ਐ
			else if (previous == 2565 && keychar == 2632) {
				deleteprevchr();
				temp2 = String.fromCharCode(2576);
				searchInput.value = searchInput.value.substring(0, selstart - 1)
						+ temp2
						+ searchInput.value.substring(selend - 1,
								searchInput.value.length);
				templen = 0;
			}
			// ਉ
			else if (previous == 2675 && keychar == 2625) {
				deleteprevchr();
				temp2 = String.fromCharCode(2569);
				searchInput.value = searchInput.value.substring(0, selstart - 1)
						+ temp2
						+ searchInput.value.substring(selend - 1,
								searchInput.value.length);
				templen = 0;
			}
			// ਊ
			else if (previous == 2675 && keychar == 2626) {
				deleteprevchr();
				temp2 = String.fromCharCode(2570);
				searchInput.value = searchInput.value.substring(0, selstart - 1)
						+ temp2
						+ searchInput.value.substring(selend - 1,
								searchInput.value.length);
				templen = 0;
			}
			// ਏ
			else if (previous == 2674 && keychar == 2631) {
				deleteprevchr();
				temp2 = String.fromCharCode(2575);
				searchInput.value = searchInput.value.substring(0, selstart - 1)
						+ temp2
						+ searchInput.value.substring(selend - 1,
								searchInput.value.length);
				templen = 0;
			}
			// ਔ
			else if (previous == 2565 && keychar == 2636) {
				deleteprevchr();
				temp2 = String.fromCharCode(2580);
				searchInput.value = searchInput.value.substring(0, selstart - 1)
						+ temp2
						+ searchInput.value.substring(selend - 1,
								searchInput.value.length);
				templen = 0;
			} else if (previous == 2637 && keychar == 8205) {
				deleteprevchr();
				temp2 = String.fromCharCode(2637);
				searchInput.value = searchInput.value.substring(0, selstart)
						+ temp2
						+ searchInput.value.substring(selend,
								searchInput.value.length);
			} else {
				searchInput.value = searchInput.value.substring(0, selstart)
						+ temp2
						+ searchInput.value.substring(selend,
								searchInput.value.length);
				templen = temp2.length;
			}
			searchInput.focus();
			_15 = selstart + templen;
			searchInput.selectionStart = _15;
			searchInput.selectionEnd = _15;
		}
	}
};

// other
function deleteprevchr() {
	if (document.getElementById('q').createTextRange) {
		var selection1 = document.selection.createRange().duplicate();
		selection1.moveStart("character", -1);
		selection1.text = "";
	} else {
		var searchString1 = document.getElementById('q');
		var cut1 = searchString1.selectionStart - 1;
		var cut2 = searchString1.selectionEnd;
		searchString1.value = searchString1.value.substring(0, cut1)
				+ searchString1.value.substring(cut2, searchString1.value.length);
		var now1 = cut1;
		searchString1.selectionStart = now1;
		searchString1.selectionEnd = now1;
	}
};

function keyEvent(evt) {
	
	if(document.getElementById('search_lang_en').checked) {
		return true;
	}
	
	var keyCode = evt.keyCode ? evt.keyCode : evt.charCode;

	if (evt.type == 'keypress') {
		if (evt.ctrlKey || keyCode == 13 || keyCode == 8 || keyCode == 46
				|| keyCode == 40 || keyCode == 39 || keyCode == 37
				|| keyCode == 0 || keyCode == 36 || keyCode == 34
				|| keyCode == 33 || keyCode == 35 || keyCode == 45) {
			return true;
		}
		var chrFromLayout = layouttable0(keyCode);
		outputchar(chrFromLayout);

		return false;
	}
}