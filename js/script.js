/*
*	What are you doing here?
*	Get out.
*	You'll spoil the secret.
*/
var Konami = function (callback) {
	var konami = {
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
				if (ref_obj) konami = ref_obj; // IE
				konami.input += e ? e.keyCode : event.keyCode;
				if (konami.input.length > konami.pattern.length)
					konami.input = konami.input.substr((konami.input.length - konami.pattern.length));
				if (konami.input == konami.pattern) {
					konami.code(link);
					konami.input = "";
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
				konami.code(link);
			},
			load: function (link) {
				this.orig_keys = this.keys;
				konami.addEvent(document, "touchmove", function (e) {
					if (e.touches.length == 1 && konami.iphone.capture == true) {
						var touch = e.touches[0];
						konami.iphone.stop_x = touch.pageX;
						konami.iphone.stop_y = touch.pageY;
						konami.iphone.tap = false;
						konami.iphone.capture = false;
						konami.iphone.check_direction();
					}
				});
				konami.addEvent(document, "touchend", function (evt) {
					if (konami.iphone.tap == true) konami.iphone.check_direction(link);
				}, false);
				konami.addEvent(document, "touchstart", function (evt) {
					konami.iphone.start_x = evt.changedTouches[0].pageX;
					konami.iphone.start_y = evt.changedTouches[0].pageY;
					konami.iphone.tap = true;
					konami.iphone.capture = true;
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

	typeof callback === "string" && konami.load(callback);
	if (typeof callback === "function") {
		konami.code = callback;
		konami.load();
	}

	return konami;
};

function decode(str) {
	return str.replace(/[a-zA-Z]/g, function(c){
		return String.fromCharCode((c<="Z"?90:122)>=(c=c.charCodeAt(0)+13)?c:c-26);
	});
}

$(function() {
	// Adds a collapsable panel to an existing element
	function addCollapse(appendTo,id,content,hidden) {
		hidden = typeof hidden !== 'undefined' ? hidden : false;
		$(appendTo).append('<div class="panel panel-default'+(hidden == true ? ' nobg' : '')+'">\
			<div id="'+(id)+'" class="panel-collapse collapse">\
				<div class="panel-body">\
					'+(content)+'\
				</div>\
			</div>\
		</div>');
	}

	/*$('#social').find('a').each(function() {
		addCollapse('#socialPanels','panel-'+($(this).attr('id')),($(this).attr('href')));
		$(this).attr('data-toggle','collapse');
		$(this).attr('data-parent','#socialPanels');
		$(this).attr('href','#panel-'+($(this).attr('id')));
	});//*/

	// Set up event for correctly entering the code
	var msgText = "Oh aren't you a smart one, trying the Konami code? Well sorry but I'm too lazy to actually do something cool here.";
	addCollapse('#mainContent','codePanel',msgText,true);
	var kn = new Konami(function() {
		$('#codePanel').collapse('show');
	});

	// Add a link and panel for contact via email - restricted to Javascript for security purposes
	$('#social').append('<span><a href="#panel-email-link" id="email-link" title="Email me" data-toggle="collapse" data-parent="#socialPanels"><img src="img/icon-email.png" alt="email" /></a></span>');
	var email = decode('NZICu34e@tznvy.pbz')
	addCollapse("#socialPanels",'panel-email-link','<a href="mailto:'+email+'" target="_blank">'+email+'</a>');
	
	// Enable tooltips
	$('#social a').tooltip();
});
