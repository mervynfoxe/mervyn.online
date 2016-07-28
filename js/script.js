/*
*	What are you doing here?
*	Get out.
*	You'll spoil the secret.
*/
var Code = function (callback) {
	var code = {
		addEvent: function (obj, type, fn, ref_obj) {
			if (obj.addEventListener)
				obj.addEventListener(type, fn, false);
			else if (obj.attachEvent) {
				// IE
				obj["e" + type + fn] = fn;
				obj[type + fn] = function () {
					obj["e" + type + fn](window.event, ref_obj);
				}
				obj.attachEvent("on" + type, obj[type + fn]);
			}
		},
		input: "",
		pattern: "38384040373937396665",
		load: function (link) {
			this.addEvent(document, "keydown", function (e, ref_obj) {
				if (ref_obj) code = ref_obj; // IE
				code.input += e ? e.keyCode : event.keyCode;
				if (code.input.length > code.pattern.length)
					code.input = code.input.substr((code.input.length - code.pattern.length));
				if (code.input == code.pattern) {
					code.code(link);
					code.input = "";
					e.preventDefault();
					return false;
				}
			}, this);
			this.iphone.load(link);
		},
		code: function (link) {
			window.location = link
		},
		iphone: {
			start_x: 0,
			start_y: 0,
			stop_x: 0,
			stop_y: 0,
			tap: false,
			capture: false,
			orig_keys: "",
			keys: ["UP", "UP", "DOWN", "DOWN", "LEFT", "RIGHT", "LEFT", "RIGHT", "TAP", "TAP"],
			code: function (link) {
				code.code(link);
			},
			load: function (link) {
				this.orig_keys = this.keys;
				code.addEvent(document, "touchmove", function (e) {
					if (e.touches.length == 1 && code.iphone.capture == true) {
						var touch = e.touches[0];
						code.iphone.stop_x = touch.pageX;
						code.iphone.stop_y = touch.pageY;
						code.iphone.tap = false;
						code.iphone.capture = false;
						code.iphone.check_direction();
					}
				});
				code.addEvent(document, "touchend", function (evt) {
					if (code.iphone.tap == true) code.iphone.check_direction(link);
				}, false);
				code.addEvent(document, "touchstart", function (evt) {
					code.iphone.start_x = evt.changedTouches[0].pageX;
					code.iphone.start_y = evt.changedTouches[0].pageY;
					code.iphone.tap = true;
					code.iphone.capture = true;
				});
			},
			check_direction: function (link) {
				x_magnitude = Math.abs(this.start_x - this.stop_x);
				y_magnitude = Math.abs(this.start_y - this.stop_y);
				x = ((this.start_x - this.stop_x) < 0) ? "RIGHT" : "LEFT";
				y = ((this.start_y - this.stop_y) < 0) ? "DOWN" : "UP";
				result = (x_magnitude > y_magnitude) ? x : y;
				result = (this.tap == true) ? "TAP" : result;

				if (result == this.keys[0]) this.keys = this.keys.slice(1, this.keys.length);
				if (this.keys.length == 0) {
					this.keys = this.orig_keys;
					this.code(link);
				}
			}
		}
	}

	typeof callback === "string" && code.load(callback);
	if (typeof callback === "function") {
		code.code = callback;
		code.load();
	}

	return code;
};

function decode(str) {
	return str.replace(/[a-zA-Z]/g, function(c){
		return String.fromCharCode((c<="Z"?90:122)>=(c=c.charCodeAt(0)+13)?c:c-26);
	});
}

$(function() {
	// Adds a collapsable panel to an existing element
	function addCollapse(appendTo, id, content, hidden) {
		hidden = typeof hidden !== 'undefined' ? hidden : false;
		$(appendTo).append('<div class="panel panel-default'+(hidden == true ? ' nobg' : '')+'">\
			<div id="'+(id)+'" class="panel-collapse collapse">\
				<div class="panel-body">\
					'+(content)+'\
				</div>\
			</div>\
		</div>');
	}

	// Set up event for correctly entering the code
	var msgText = decode("Bu nera'g lbh n fzneg bar, gelvat gur Xbanzv pbqr? Jryy fbeel ohg V'z gbb ynml gb npghnyyl qb fbzrguvat pbby urer.");
	addCollapse('#mainContent','codePanel',msgText,true);
	var kn = new Code(function() {
		$('#codePanel').collapse('show');
	});

	// Add a link and panel for contact via email - encoded and restricted to Javascript for security purposes
	$('#social').append('<span><a href="#panel-email-link" id="email-link" title="Email me" data-toggle="collapse" data-parent="#socialPanels"><img src="/img/social/icon-email.png" alt="email" /></a></span>');
	var email = decode(sEmail);
	addCollapse("#socialPanels",'panel-email-link','<a href="mailto:'+email+'" target="_blank">'+email+'</a>');
	
	// Enable tooltips
	$('#social a').tooltip();
});
