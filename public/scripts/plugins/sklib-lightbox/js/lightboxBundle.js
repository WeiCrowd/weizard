///#source 1 1 /Scripts/sklib-lightbox/js/imagesLoaded.js
/*!
 * imagesLoaded PACKAGED v3.1.1
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */


/*!
 * EventEmitter v4.2.6 - git.io/ee
 * Oliver Caldwell
 * MIT license
 * @preserve
 */

(function ()
{


	/**
	 * Class for managing events.
	 * Can be extended to provide event functionality in other classes.
	 *
	 * @class EventEmitter Manages event registering and emitting.
	 */
	function EventEmitter() { }

	// Shortcuts to improve speed and size
	var proto = EventEmitter.prototype;
	var exports = this;
	var originalGlobalValue = exports.EventEmitter;

	/**
	 * Finds the index of the listener for the event in it's storage array.
	 *
	 * @param {Function[]} listeners Array of listeners to search through.
	 * @param {Function} listener Method to look for.
	 * @return {Number} Index of the specified listener, -1 if not found
	 * @api private
	 */
	function indexOfListener(listeners, listener)
	{
		var i = listeners.length;
		while (i--)
		{
			if (listeners[i].listener === listener)
			{
				return i;
			}
		}

		return -1;
	}

	/**
	 * Alias a method while keeping the context correct, to allow for overwriting of target method.
	 *
	 * @param {String} name The name of the target method.
	 * @return {Function} The aliased method
	 * @api private
	 */
	function alias(name)
	{
		return function aliasClosure()
		{
			return this[name].apply(this, arguments);
		};
	}

	/**
	 * Returns the listener array for the specified event.
	 * Will initialise the event object and listener arrays if required.
	 * Will return an object if you use a regex search. The object contains keys for each matched event. So /ba[rz]/ might return an object containing bar and baz. But only if you have either defined them with defineEvent or added some listeners to them.
	 * Each property in the object response is an array of listener functions.
	 *
	 * @param {String|RegExp} evt Name of the event to return the listeners from.
	 * @return {Function[]|Object} All listener functions for the event.
	 */
	proto.getListeners = function getListeners(evt)
	{
		var events = this._getEvents();
		var response;
		var key;

		// Return a concatenated array of all matching events if
		// the selector is a regular expression.
		if (typeof evt === 'object')
		{
			response = {};
			for (key in events)
			{
				if (events.hasOwnProperty(key) && evt.test(key))
				{
					response[key] = events[key];
				}
			}
		}
		else
		{
			response = events[evt] || (events[evt] = []);
		}

		return response;
	};

	/**
	 * Takes a list of listener objects and flattens it into a list of listener functions.
	 *
	 * @param {Object[]} listeners Raw listener objects.
	 * @return {Function[]} Just the listener functions.
	 */
	proto.flattenListeners = function flattenListeners(listeners)
	{
		var flatListeners = [];
		var i;

		for (i = 0; i < listeners.length; i += 1)
		{
			flatListeners.push(listeners[i].listener);
		}

		return flatListeners;
	};

	/**
	 * Fetches the requested listeners via getListeners but will always return the results inside an object. This is mainly for internal use but others may find it useful.
	 *
	 * @param {String|RegExp} evt Name of the event to return the listeners from.
	 * @return {Object} All listener functions for an event in an object.
	 */
	proto.getListenersAsObject = function getListenersAsObject(evt)
	{
		var listeners = this.getListeners(evt);
		var response;

		if (listeners instanceof Array)
		{
			response = {};
			response[evt] = listeners;
		}

		return response || listeners;
	};

	/**
	 * Adds a listener function to the specified event.
	 * The listener will not be added if it is a duplicate.
	 * If the listener returns true then it will be removed after it is called.
	 * If you pass a regular expression as the event name then the listener will be added to all events that match it.
	 *
	 * @param {String|RegExp} evt Name of the event to attach the listener to.
	 * @param {Function} listener Method to be called when the event is emitted. If the function returns true then it will be removed after calling.
	 * @return {Object} Current instance of EventEmitter for chaining.
	 */
	proto.addListener = function addListener(evt, listener)
	{
		var listeners = this.getListenersAsObject(evt);
		var listenerIsWrapped = typeof listener === 'object';
		var key;

		for (key in listeners)
		{
			if (listeners.hasOwnProperty(key) && indexOfListener(listeners[key], listener) === -1)
			{
				listeners[key].push(listenerIsWrapped ? listener : {
					listener: listener,
					once: false
				});
			}
		}

		return this;
	};

	/**
	 * Alias of addListener
	 */
	proto.on = alias('addListener');

	/**
	 * Semi-alias of addListener. It will add a listener that will be
	 * automatically removed after it's first execution.
	 *
	 * @param {String|RegExp} evt Name of the event to attach the listener to.
	 * @param {Function} listener Method to be called when the event is emitted. If the function returns true then it will be removed after calling.
	 * @return {Object} Current instance of EventEmitter for chaining.
	 */
	proto.addOnceListener = function addOnceListener(evt, listener)
	{
		return this.addListener(evt, {
			listener: listener,
			once: true
		});
	};

	/**
	 * Alias of addOnceListener.
	 */
	proto.once = alias('addOnceListener');

	/**
	 * Defines an event name. This is required if you want to use a regex to add a listener to multiple events at once. If you don't do this then how do you expect it to know what event to add to? Should it just add to every possible match for a regex? No. That is scary and bad.
	 * You need to tell it what event names should be matched by a regex.
	 *
	 * @param {String} evt Name of the event to create.
	 * @return {Object} Current instance of EventEmitter for chaining.
	 */
	proto.defineEvent = function defineEvent(evt)
	{
		this.getListeners(evt);
		return this;
	};

	/**
	 * Uses defineEvent to define multiple events.
	 *
	 * @param {String[]} evts An array of event names to define.
	 * @return {Object} Current instance of EventEmitter for chaining.
	 */
	proto.defineEvents = function defineEvents(evts)
	{
		for (var i = 0; i < evts.length; i += 1)
		{
			this.defineEvent(evts[i]);
		}
		return this;
	};

	/**
	 * Removes a listener function from the specified event.
	 * When passed a regular expression as the event name, it will remove the listener from all events that match it.
	 *
	 * @param {String|RegExp} evt Name of the event to remove the listener from.
	 * @param {Function} listener Method to remove from the event.
	 * @return {Object} Current instance of EventEmitter for chaining.
	 */
	proto.removeListener = function removeListener(evt, listener)
	{
		var listeners = this.getListenersAsObject(evt);
		var index;
		var key;

		for (key in listeners)
		{
			if (listeners.hasOwnProperty(key))
			{
				index = indexOfListener(listeners[key], listener);

				if (index !== -1)
				{
					listeners[key].splice(index, 1);
				}
			}
		}

		return this;
	};

	/**
	 * Alias of removeListener
	 */
	proto.off = alias('removeListener');

	/**
	 * Adds listeners in bulk using the manipulateListeners method.
	 * If you pass an object as the second argument you can add to multiple events at once. The object should contain key value pairs of events and listeners or listener arrays. You can also pass it an event name and an array of listeners to be added.
	 * You can also pass it a regular expression to add the array of listeners to all events that match it.
	 * Yeah, this function does quite a bit. That's probably a bad thing.
	 *
	 * @param {String|Object|RegExp} evt An event name if you will pass an array of listeners next. An object if you wish to add to multiple events at once.
	 * @param {Function[]} [listeners] An optional array of listener functions to add.
	 * @return {Object} Current instance of EventEmitter for chaining.
	 */
	proto.addListeners = function addListeners(evt, listeners)
	{
		// Pass through to manipulateListeners
		return this.manipulateListeners(false, evt, listeners);
	};

	/**
	 * Removes listeners in bulk using the manipulateListeners method.
	 * If you pass an object as the second argument you can remove from multiple events at once. The object should contain key value pairs of events and listeners or listener arrays.
	 * You can also pass it an event name and an array of listeners to be removed.
	 * You can also pass it a regular expression to remove the listeners from all events that match it.
	 *
	 * @param {String|Object|RegExp} evt An event name if you will pass an array of listeners next. An object if you wish to remove from multiple events at once.
	 * @param {Function[]} [listeners] An optional array of listener functions to remove.
	 * @return {Object} Current instance of EventEmitter for chaining.
	 */
	proto.removeListeners = function removeListeners(evt, listeners)
	{
		// Pass through to manipulateListeners
		return this.manipulateListeners(true, evt, listeners);
	};

	/**
	 * Edits listeners in bulk. The addListeners and removeListeners methods both use this to do their job. You should really use those instead, this is a little lower level.
	 * The first argument will determine if the listeners are removed (true) or added (false).
	 * If you pass an object as the second argument you can add/remove from multiple events at once. The object should contain key value pairs of events and listeners or listener arrays.
	 * You can also pass it an event name and an array of listeners to be added/removed.
	 * You can also pass it a regular expression to manipulate the listeners of all events that match it.
	 *
	 * @param {Boolean} remove True if you want to remove listeners, false if you want to add.
	 * @param {String|Object|RegExp} evt An event name if you will pass an array of listeners next. An object if you wish to add/remove from multiple events at once.
	 * @param {Function[]} [listeners] An optional array of listener functions to add/remove.
	 * @return {Object} Current instance of EventEmitter for chaining.
	 */
	proto.manipulateListeners = function manipulateListeners(remove, evt, listeners)
	{
		var i;
		var value;
		var single = remove ? this.removeListener : this.addListener;
		var multiple = remove ? this.removeListeners : this.addListeners;

		// If evt is an object then pass each of it's properties to this method
		if (typeof evt === 'object' && !(evt instanceof RegExp))
		{
			for (i in evt)
			{
				if (evt.hasOwnProperty(i) && (value = evt[i]))
				{
					// Pass the single listener straight through to the singular method
					if (typeof value === 'function')
					{
						single.call(this, i, value);
					}
					else
					{
						// Otherwise pass back to the multiple function
						multiple.call(this, i, value);
					}
				}
			}
		}
		else
		{
			// So evt must be a string
			// And listeners must be an array of listeners
			// Loop over it and pass each one to the multiple method
			i = listeners.length;
			while (i--)
			{
				single.call(this, evt, listeners[i]);
			}
		}

		return this;
	};

	/**
	 * Removes all listeners from a specified event.
	 * If you do not specify an event then all listeners will be removed.
	 * That means every event will be emptied.
	 * You can also pass a regex to remove all events that match it.
	 *
	 * @param {String|RegExp} [evt] Optional name of the event to remove all listeners for. Will remove from every event if not passed.
	 * @return {Object} Current instance of EventEmitter for chaining.
	 */
	proto.removeEvent = function removeEvent(evt)
	{
		var type = typeof evt;
		var events = this._getEvents();
		var key;

		// Remove different things depending on the state of evt
		if (type === 'string')
		{
			// Remove all listeners for the specified event
			delete events[evt];
		}
		else if (type === 'object')
		{
			// Remove all events matching the regex.
			for (key in events)
			{
				if (events.hasOwnProperty(key) && evt.test(key))
				{
					delete events[key];
				}
			}
		}
		else
		{
			// Remove all listeners in all events
			delete this._events;
		}

		return this;
	};

	/**
	 * Alias of removeEvent.
	 *
	 * Added to mirror the node API.
	 */
	proto.removeAllListeners = alias('removeEvent');

	/**
	 * Emits an event of your choice.
	 * When emitted, every listener attached to that event will be executed.
	 * If you pass the optional argument array then those arguments will be passed to every listener upon execution.
	 * Because it uses `apply`, your array of arguments will be passed as if you wrote them out separately.
	 * So they will not arrive within the array on the other side, they will be separate.
	 * You can also pass a regular expression to emit to all events that match it.
	 *
	 * @param {String|RegExp} evt Name of the event to emit and execute listeners for.
	 * @param {Array} [args] Optional array of arguments to be passed to each listener.
	 * @return {Object} Current instance of EventEmitter for chaining.
	 */
	proto.emitEvent = function emitEvent(evt, args)
	{
		var listeners = this.getListenersAsObject(evt);
		var listener;
		var i;
		var key;
		var response;

		for (key in listeners)
		{
			if (listeners.hasOwnProperty(key))
			{
				i = listeners[key].length;

				while (i--)
				{
					// If the listener returns true then it shall be removed from the event
					// The function is executed either with a basic call or an apply if there is an args array
					listener = listeners[key][i];

					if (listener.once === true)
					{
						this.removeListener(evt, listener.listener);
					}

					response = listener.listener.apply(this, args || []);

					if (response === this._getOnceReturnValue())
					{
						this.removeListener(evt, listener.listener);
					}
				}
			}
		}

		return this;
	};

	/**
	 * Alias of emitEvent
	 */
	proto.trigger = alias('emitEvent');

	/**
	 * Subtly different from emitEvent in that it will pass its arguments on to the listeners, as opposed to taking a single array of arguments to pass on.
	 * As with emitEvent, you can pass a regex in place of the event name to emit to all events that match it.
	 *
	 * @param {String|RegExp} evt Name of the event to emit and execute listeners for.
	 * @param {...*} Optional additional arguments to be passed to each listener.
	 * @return {Object} Current instance of EventEmitter for chaining.
	 */
	proto.emit = function emit(evt)
	{
		var args = Array.prototype.slice.call(arguments, 1);
		return this.emitEvent(evt, args);
	};

	/**
	 * Sets the current value to check against when executing listeners. If a
	 * listeners return value matches the one set here then it will be removed
	 * after execution. This value defaults to true.
	 *
	 * @param {*} value The new value to check for when executing listeners.
	 * @return {Object} Current instance of EventEmitter for chaining.
	 */
	proto.setOnceReturnValue = function setOnceReturnValue(value)
	{
		this._onceReturnValue = value;
		return this;
	};

	/**
	 * Fetches the current value to check against when executing listeners. If
	 * the listeners return value matches this one then it should be removed
	 * automatically. It will return true by default.
	 *
	 * @return {*|Boolean} The current value to check for or the default, true.
	 * @api private
	 */
	proto._getOnceReturnValue = function _getOnceReturnValue()
	{
		if (this.hasOwnProperty('_onceReturnValue'))
		{
			return this._onceReturnValue;
		}
		else
		{
			return true;
		}
	};

	/**
	 * Fetches the events object and creates one if required.
	 *
	 * @return {Object} The events storage object.
	 * @api private
	 */
	proto._getEvents = function _getEvents()
	{
		return this._events || (this._events = {});
	};

	/**
	 * Reverts the global {@link EventEmitter} to its previous value and returns a reference to this version.
	 *
	 * @return {Function} Non conflicting EventEmitter class.
	 */
	EventEmitter.noConflict = function noConflict()
	{
		exports.EventEmitter = originalGlobalValue;
		return EventEmitter;
	};

	// Expose the class either via AMD, CommonJS or the global object
	if (typeof define === 'function' && define.amd)
	{
		define('eventEmitter/EventEmitter', [], function ()
		{
			return EventEmitter;
		});
	}
	else if (typeof module === 'object' && module.exports)
	{
		module.exports = EventEmitter;
	}
	else
	{
		this.EventEmitter = EventEmitter;
	}
}.call(this));

/*!
 * eventie v1.0.4
 * event binding helper
 *   eventie.bind( elem, 'click', myFn )
 *   eventie.unbind( elem, 'click', myFn )
 */

/*jshint browser: true, undef: true, unused: true */
/*global define: false */

(function (window)
{



	var docElem = document.documentElement;

	var bind = function () { };

	function getIEEvent(obj)
	{
		var event = window.event;
		// add event.target
		event.target = event.target || event.srcElement || obj;
		return event;
	}

	if (docElem.addEventListener)
	{
		bind = function (obj, type, fn)
		{
			obj.addEventListener(type, fn, false);
		};
	} else if (docElem.attachEvent)
	{
		bind = function (obj, type, fn)
		{
			obj[type + fn] = fn.handleEvent ?
			  function ()
			  {
			  	var event = getIEEvent(obj);
			  	fn.handleEvent.call(fn, event);
			  } :
			  function ()
			  {
			  	var event = getIEEvent(obj);
			  	fn.call(obj, event);
			  };
			obj.attachEvent("on" + type, obj[type + fn]);
		};
	}

	var unbind = function () { };

	if (docElem.removeEventListener)
	{
		unbind = function (obj, type, fn)
		{
			obj.removeEventListener(type, fn, false);
		};
	} else if (docElem.detachEvent)
	{
		unbind = function (obj, type, fn)
		{
			obj.detachEvent("on" + type, obj[type + fn]);
			try
			{
				delete obj[type + fn];
			} catch (err)
			{
				// can't delete window object properties
				obj[type + fn] = undefined;
			}
		};
	}

	var eventie = {
		bind: bind,
		unbind: unbind
	};

	// transport
	if (typeof define === 'function' && define.amd)
	{
		// AMD
		define('eventie/eventie', eventie);
	} else
	{
		// browser global
		window.eventie = eventie;
	}

})(this);

/*!
 * imagesLoaded v3.1.1
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

(function (window)
{



	var $ = window.jQuery;
	var console = window.console;
	var hasConsole = typeof console !== 'undefined';

	// -------------------------- helpers -------------------------- //

	// extend objects
	function extend(a, b)
	{
		for (var prop in b)
		{
			a[prop] = b[prop];
		}
		return a;
	}

	var objToString = Object.prototype.toString;
	function isArray(obj)
	{
		return objToString.call(obj) === '[object Array]';
	}

	// turn element or nodeList into an array
	function makeArray(obj)
	{
		var ary = [];
		if (isArray(obj))
		{
			// use object if already an array
			ary = obj;
		} else if (typeof obj.length === 'number')
		{
			// convert nodeList to array
			for (var i = 0, len = obj.length; i < len; i++)
			{
				ary.push(obj[i]);
			}
		} else
		{
			// array of single index
			ary.push(obj);
		}
		return ary;
	}

	// --------------------------  -------------------------- //

	function defineImagesLoaded(EventEmitter, eventie)
	{

		/**
		 * @param {Array, Element, NodeList, String} elem
		 * @param {Object or Function} options - if function, use as callback
		 * @param {Function} onAlways - callback function
		 */
		function ImagesLoaded(elem, options, onAlways)
		{
			// coerce ImagesLoaded() without new, to be new ImagesLoaded()
			if (!(this instanceof ImagesLoaded))
			{
				return new ImagesLoaded(elem, options);
			}
			// use elem as selector string
			if (typeof elem === 'string')
			{
				elem = document.querySelectorAll(elem);
			}

			this.elements = makeArray(elem);
			this.options = extend({}, this.options);

			if (typeof options === 'function')
			{
				onAlways = options;
			} else
			{
				extend(this.options, options);
			}

			if (onAlways)
			{
				this.on('always', onAlways);
			}

			this.getImages();

			if ($)
			{
				// add jQuery Deferred object
				this.jqDeferred = new $.Deferred();
			}

			// HACK check async to allow time to bind listeners
			var _this = this;
			setTimeout(function ()
			{
				_this.check();
			});
		}

		ImagesLoaded.prototype = new EventEmitter();

		ImagesLoaded.prototype.options = {};

		ImagesLoaded.prototype.getImages = function ()
		{
			this.images = [];

			// filter & find items if we have an item selector
			for (var i = 0, len = this.elements.length; i < len; i++)
			{
				var elem = this.elements[i];
				// filter siblings
				if (elem.nodeName === 'IMG')
				{
					this.addImage(elem);
				}
				// find children
				var childElems = elem.querySelectorAll('img');
				// concat childElems to filterFound array
				for (var j = 0, jLen = childElems.length; j < jLen; j++)
				{
					var img = childElems[j];
					this.addImage(img);
				}
			}
		};

		/**
		 * @param {Image} img
		 */
		ImagesLoaded.prototype.addImage = function (img)
		{
			var loadingImage = new LoadingImage(img);
			this.images.push(loadingImage);
		};

		ImagesLoaded.prototype.check = function ()
		{
			var _this = this;
			var checkedCount = 0;
			var length = this.images.length;
			this.hasAnyBroken = false;
			// complete if no images
			if (!length)
			{
				this.complete();
				return;
			}

			function onConfirm(image, message)
			{
				if (_this.options.debug && hasConsole)
				{
					console.log('confirm', image, message);
				}

				_this.progress(image);
				checkedCount++;
				if (checkedCount === length)
				{
					_this.complete();
				}
				return true; // bind once
			}

			for (var i = 0; i < length; i++)
			{
				var loadingImage = this.images[i];
				loadingImage.on('confirm', onConfirm);
				loadingImage.check();
			}
		};

		ImagesLoaded.prototype.progress = function (image)
		{
			this.hasAnyBroken = this.hasAnyBroken || !image.isLoaded;
			// HACK - Chrome triggers event before object properties have changed. #83
			var _this = this;
			setTimeout(function ()
			{
				_this.emit('progress', _this, image);
				if (_this.jqDeferred)
				{
					_this.jqDeferred.notify(_this, image);
				}
			});
		};

		ImagesLoaded.prototype.complete = function ()
		{
			var eventName = this.hasAnyBroken ? 'fail' : 'done';
			this.isComplete = true;
			var _this = this;
			// HACK - another setTimeout so that confirm happens after progress
			setTimeout(function ()
			{
				_this.emit(eventName, _this);
				_this.emit('always', _this);
				if (_this.jqDeferred)
				{
					var jqMethod = _this.hasAnyBroken ? 'reject' : 'resolve';
					_this.jqDeferred[jqMethod](_this);
				}
			});
		};

		// -------------------------- jquery -------------------------- //

		if ($)
		{
			$.fn.imagesLoaded = function (options, callback)
			{
				var instance = new ImagesLoaded(this, options, callback);
				return instance.jqDeferred.promise($(this));
			};
		}


		// --------------------------  -------------------------- //

		function LoadingImage(img)
		{
			this.img = img;
		}

		LoadingImage.prototype = new EventEmitter();

		LoadingImage.prototype.check = function ()
		{
			// first check cached any previous images that have same src
			var resource = cache[this.img.src] || new Resource(this.img.src);
			if (resource.isConfirmed)
			{
				this.confirm(resource.isLoaded, 'cached was confirmed');
				return;
			}

			// If complete is true and browser supports natural sizes,
			// try to check for image status manually.
			if (this.img.complete && this.img.naturalWidth !== undefined)
			{
				// report based on naturalWidth
				this.confirm(this.img.naturalWidth !== 0, 'naturalWidth');
				return;
			}

			// If none of the checks above matched, simulate loading on detached element.
			var _this = this;
			resource.on('confirm', function (resrc, message)
			{
				_this.confirm(resrc.isLoaded, message);
				return true;
			});

			resource.check();
		};

		LoadingImage.prototype.confirm = function (isLoaded, message)
		{
			this.isLoaded = isLoaded;
			this.emit('confirm', this, message);
		};

		// -------------------------- Resource -------------------------- //

		// Resource checks each src, only once
		// separate class from LoadingImage to prevent memory leaks. See #115

		var cache = {};

		function Resource(src)
		{
			this.src = src;
			// add to cache
			cache[src] = this;
		}

		Resource.prototype = new EventEmitter();

		Resource.prototype.check = function ()
		{
			// only trigger checking once
			if (this.isChecked)
			{
				return;
			}
			// simulate loading on detached element
			var proxyImage = new Image();
			eventie.bind(proxyImage, 'load', this);
			eventie.bind(proxyImage, 'error', this);
			proxyImage.src = this.src;
			// set flag
			this.isChecked = true;
		};

		// ----- events ----- //

		// trigger specified handler for event type
		Resource.prototype.handleEvent = function (event)
		{
			var method = 'on' + event.type;
			if (this[method])
			{
				this[method](event);
			}
		};

		Resource.prototype.onload = function (event)
		{
			this.confirm(true, 'onload');
			this.unbindProxyEvents(event);
		};

		Resource.prototype.onerror = function (event)
		{
			this.confirm(false, 'onerror');
			this.unbindProxyEvents(event);
		};

		// ----- confirm ----- //

		Resource.prototype.confirm = function (isLoaded, message)
		{
			this.isConfirmed = true;
			this.isLoaded = isLoaded;
			this.emit('confirm', this, message);
		};

		Resource.prototype.unbindProxyEvents = function (event)
		{
			eventie.unbind(event.target, 'load', this);
			eventie.unbind(event.target, 'error', this);
		};

		// -----  ----- //

		return ImagesLoaded;
	}

	// -------------------------- transport -------------------------- //

	if (typeof define === 'function' && define.amd)
	{
		// AMD
		define([
			'eventEmitter/EventEmitter',
			'eventie/eventie'
		],
		  defineImagesLoaded);
	} else
	{
		// browser global
		window.imagesLoaded = defineImagesLoaded(
		  window.EventEmitter,
		  window.eventie
		);
	}

})(window);

///#source 1 1 /Scripts/sklib-lightbox/js/jquery.event.move.js
// jquery.event.move
//
// 1.3.6
//
// Stephen Band
//
// Triggers 'movestart', 'move' and 'moveend' events after
// mousemoves following a mousedown cross a distance threshold,
// similar to the native 'dragstart', 'drag' and 'dragend' events.
// Move events are throttled to animation frames. Move event objects
// have the properties:
//
// pageX:
// pageY:   Page coordinates of pointer.
// startX:
// startY:  Page coordinates of pointer at movestart.
// distX:
// distY:  Distance the pointer has moved since movestart.
// deltaX:
// deltaY:  Distance the finger has moved since last event.
// velocityX:
// velocityY:  Average velocity over last few events.


(function (module)
{
	if (typeof define === 'function' && define.amd)
	{
		// AMD. Register as an anonymous module.
		define(['jquery'], module);
	} else
	{
		// Browser globals
		module(jQuery);
	}
})(function (jQuery, undefined)
{

	var // Number of pixels a pressed pointer travels before movestart
	    // event is fired.
	    threshold = 6,

	    add = jQuery.event.add,

	    remove = jQuery.event.remove,

	    // Just sugar, so we can have arguments in the same order as
	    // add and remove.
	    trigger = function (node, type, data)
	    {
	    	jQuery.event.trigger(type, data, node);
	    },

	    // Shim for requestAnimationFrame, falling back to timer. See:
	    // see http://paulirish.com/2011/requestanimationframe-for-smart-animating/
	    requestFrame = (function ()
	    {
	    	return (
	    		window.requestAnimationFrame ||
	    		window.webkitRequestAnimationFrame ||
	    		window.mozRequestAnimationFrame ||
	    		window.oRequestAnimationFrame ||
	    		window.msRequestAnimationFrame ||
	    		function (fn, element)
	    		{
	    			return window.setTimeout(function ()
	    			{
	    				fn();
	    			}, 25);
	    		}
	    	);
	    })(),

	    ignoreTags = {
	    	textarea: true,
	    	input: true,
	    	select: true,
	    	button: true
	    },

	    mouseevents = {
	    	move: 'mousemove',
	    	cancel: 'mouseup dragstart',
	    	end: 'mouseup'
	    },

	    touchevents = {
	    	move: 'touchmove',
	    	cancel: 'touchend',
	    	end: 'touchend'
	    };


	// Constructors

	function Timer(fn)
	{
		var callback = fn,
		    active = false,
		    running = false;

		function trigger(time)
		{
			if (active)
			{
				callback();
				requestFrame(trigger);
				running = true;
				active = false;
			}
			else
			{
				running = false;
			}
		}

		this.kick = function (fn)
		{
			active = true;
			if (!running) { trigger(); }
		};

		this.end = function (fn)
		{
			var cb = callback;

			if (!fn) { return; }

			// If the timer is not running, simply call the end callback.
			if (!running)
			{
				fn();
			}
				// If the timer is running, and has been kicked lately, then
				// queue up the current callback and the end callback, otherwise
				// just the end callback.
			else
			{
				callback = active ?
					function () { cb(); fn(); } :
					fn;

				active = true;
			}
		};
	}


	// Functions

	function returnTrue()
	{
		return true;
	}

	function returnFalse()
	{
		return false;
	}

	function preventDefault(e)
	{
		e.preventDefault();
	}

	function preventIgnoreTags(e)
	{
		// Don't prevent interaction with form elements.
		if (ignoreTags[e.target.tagName.toLowerCase()]) { return; }

		e.preventDefault();
	}

	function isLeftButton(e)
	{
		// Ignore mousedowns on any button other than the left (or primary)
		// mouse button, or when a modifier key is pressed.
		return (e.which === 1 && !e.ctrlKey && !e.altKey);
	}

	function identifiedTouch(touchList, id)
	{
		var i, l;

		if (touchList.identifiedTouch)
		{
			return touchList.identifiedTouch(id);
		}

		// touchList.identifiedTouch() does not exist in
		// webkit yet… we must do the search ourselves...

		i = -1;
		l = touchList.length;

		while (++i < l)
		{
			if (touchList[i].identifier === id)
			{
				return touchList[i];
			}
		}
	}

	function changedTouch(e, event)
	{
		var touch = identifiedTouch(e.changedTouches, event.identifier);

		// This isn't the touch you're looking for.
		if (!touch) { return; }

		// Chrome Android (at least) includes touches that have not
		// changed in e.changedTouches. That's a bit annoying. Check
		// that this touch has changed.
		if (touch.pageX === event.pageX && touch.pageY === event.pageY) { return; }

		return touch;
	}


	// Handlers that decide when the first movestart is triggered

	function mousedown(e)
	{
		var data;

		if (!isLeftButton(e)) { return; }

		data = {
			target: e.target,
			startX: e.pageX,
			startY: e.pageY,
			timeStamp: e.timeStamp
		};

		add(document, mouseevents.move, mousemove, data);
		add(document, mouseevents.cancel, mouseend, data);
	}

	function mousemove(e)
	{
		var data = e.data;

		checkThreshold(e, data, e, removeMouse);
	}

	function mouseend(e)
	{
		removeMouse();
	}

	function removeMouse()
	{
		remove(document, mouseevents.move, mousemove);
		remove(document, mouseevents.cancel, mouseend);
	}

	function touchstart(e)
	{
		var touch, template;

		// Don't get in the way of interaction with form elements.
		if (ignoreTags[e.target.tagName.toLowerCase()]) { return; }

		touch = e.changedTouches[0];

		// iOS live updates the touch objects whereas Android gives us copies.
		// That means we can't trust the touchstart object to stay the same,
		// so we must copy the data. This object acts as a template for
		// movestart, move and moveend event objects.
		template = {
			target: touch.target,
			startX: touch.pageX,
			startY: touch.pageY,
			timeStamp: e.timeStamp,
			identifier: touch.identifier
		};

		// Use the touch identifier as a namespace, so that we can later
		// remove handlers pertaining only to this touch.
		add(document, touchevents.move + '.' + touch.identifier, touchmove, template);
		add(document, touchevents.cancel + '.' + touch.identifier, touchend, template);
	}

	function touchmove(e)
	{
		var data = e.data,
		    touch = changedTouch(e, data);

		if (!touch) { return; }

		checkThreshold(e, data, touch, removeTouch);
	}

	function touchend(e)
	{
		var template = e.data,
		    touch = identifiedTouch(e.changedTouches, template.identifier);

		if (!touch) { return; }

		removeTouch(template.identifier);
	}

	function removeTouch(identifier)
	{
		remove(document, '.' + identifier, touchmove);
		remove(document, '.' + identifier, touchend);
	}


	// Logic for deciding when to trigger a movestart.

	function checkThreshold(e, template, touch, fn)
	{
		var distX = touch.pageX - template.startX,
		    distY = touch.pageY - template.startY;

		// Do nothing if the threshold has not been crossed.
		if ((distX * distX) + (distY * distY) < (threshold * threshold)) { return; }

		triggerStart(e, template, touch, distX, distY, fn);
	}

	function handled()
	{
		// this._handled should return false once, and after return true.
		this._handled = returnTrue;
		return false;
	}

	function flagAsHandled(e)
	{
		e._handled();
	}

	function triggerStart(e, template, touch, distX, distY, fn)
	{
		var node = template.target,
		    touches, time;

		touches = e.targetTouches;
		time = e.timeStamp - template.timeStamp;

		// Create a movestart object with some special properties that
		// are passed only to the movestart handlers.
		template.type = 'movestart';
		template.distX = distX;
		template.distY = distY;
		template.deltaX = distX;
		template.deltaY = distY;
		template.pageX = touch.pageX;
		template.pageY = touch.pageY;
		template.velocityX = distX / time;
		template.velocityY = distY / time;
		template.targetTouches = touches;
		template.finger = touches ?
			touches.length :
			1;

		// The _handled method is fired to tell the default movestart
		// handler that one of the move events is bound.
		template._handled = handled;

		// Pass the touchmove event so it can be prevented if or when
		// movestart is handled.
		template._preventTouchmoveDefault = function ()
		{
			e.preventDefault();
		};

		// Trigger the movestart event.
		trigger(template.target, template);

		// Unbind handlers that tracked the touch or mouse up till now.
		fn(template.identifier);
	}


	// Handlers that control what happens following a movestart

	function activeMousemove(e)
	{
		var timer = e.data.timer;

		e.data.touch = e;
		e.data.timeStamp = e.timeStamp;
		timer.kick();
	}

	function activeMouseend(e)
	{
		var event = e.data.event,
		    timer = e.data.timer;

		removeActiveMouse();

		endEvent(event, timer, function ()
		{
			// Unbind the click suppressor, waiting until after mouseup
			// has been handled.
			setTimeout(function ()
			{
				remove(event.target, 'click', returnFalse);
			}, 0);
		});
	}

	function removeActiveMouse(event)
	{
		remove(document, mouseevents.move, activeMousemove);
		remove(document, mouseevents.end, activeMouseend);
	}

	function activeTouchmove(e)
	{
		var event = e.data.event,
		    timer = e.data.timer,
		    touch = changedTouch(e, event);

		if (!touch) { return; }

		// Stop the interface from gesturing
		e.preventDefault();

		event.targetTouches = e.targetTouches;
		e.data.touch = touch;
		e.data.timeStamp = e.timeStamp;
		timer.kick();
	}

	function activeTouchend(e)
	{
		var event = e.data.event,
		    timer = e.data.timer,
		    touch = identifiedTouch(e.changedTouches, event.identifier);

		// This isn't the touch you're looking for.
		if (!touch) { return; }

		removeActiveTouch(event);
		endEvent(event, timer);
	}

	function removeActiveTouch(event)
	{
		remove(document, '.' + event.identifier, activeTouchmove);
		remove(document, '.' + event.identifier, activeTouchend);
	}


	// Logic for triggering move and moveend events

	function updateEvent(event, touch, timeStamp, timer)
	{
		var time = timeStamp - event.timeStamp;

		event.type = 'move';
		event.distX = touch.pageX - event.startX;
		event.distY = touch.pageY - event.startY;
		event.deltaX = touch.pageX - event.pageX;
		event.deltaY = touch.pageY - event.pageY;

		// Average the velocity of the last few events using a decay
		// curve to even out spurious jumps in values.
		event.velocityX = 0.3 * event.velocityX + 0.7 * event.deltaX / time;
		event.velocityY = 0.3 * event.velocityY + 0.7 * event.deltaY / time;
		event.pageX = touch.pageX;
		event.pageY = touch.pageY;
	}

	function endEvent(event, timer, fn)
	{
		timer.end(function ()
		{
			event.type = 'moveend';

			trigger(event.target, event);

			return fn && fn();
		});
	}


	// jQuery special event definition

	function setup(data, namespaces, eventHandle)
	{
		// Stop the node from being dragged
		//add(this, 'dragstart.move drag.move', preventDefault);

		// Prevent text selection and touch interface scrolling
		//add(this, 'mousedown.move', preventIgnoreTags);

		// Tell movestart default handler that we've handled this
		add(this, 'movestart.move', flagAsHandled);

		// Don't bind to the DOM. For speed.
		return true;
	}

	function teardown(namespaces)
	{
		remove(this, 'dragstart drag', preventDefault);
		remove(this, 'mousedown touchstart', preventIgnoreTags);
		remove(this, 'movestart', flagAsHandled);

		// Don't bind to the DOM. For speed.
		return true;
	}

	function addMethod(handleObj)
	{
		// We're not interested in preventing defaults for handlers that
		// come from internal move or moveend bindings
		if (handleObj.namespace === "move" || handleObj.namespace === "moveend")
		{
			return;
		}

		// Stop the node from being dragged
		add(this, 'dragstart.' + handleObj.guid + ' drag.' + handleObj.guid, preventDefault, undefined, handleObj.selector);

		// Prevent text selection and touch interface scrolling
		add(this, 'mousedown.' + handleObj.guid, preventIgnoreTags, undefined, handleObj.selector);
	}

	function removeMethod(handleObj)
	{
		if (handleObj.namespace === "move" || handleObj.namespace === "moveend")
		{
			return;
		}

		remove(this, 'dragstart.' + handleObj.guid + ' drag.' + handleObj.guid);
		remove(this, 'mousedown.' + handleObj.guid);
	}

	jQuery.event.special.movestart = {
		setup: setup,
		teardown: teardown,
		add: addMethod,
		remove: removeMethod,

		_default: function (e)
		{
			var event, data;

			// If no move events were bound to any ancestors of this
			// target, high tail it out of here.
			if (!e._handled()) { return; }

			function update(time)
			{
				updateEvent(event, data.touch, data.timeStamp);
				trigger(e.target, event);
			}

			event = {
				target: e.target,
				startX: e.startX,
				startY: e.startY,
				pageX: e.pageX,
				pageY: e.pageY,
				distX: e.distX,
				distY: e.distY,
				deltaX: e.deltaX,
				deltaY: e.deltaY,
				velocityX: e.velocityX,
				velocityY: e.velocityY,
				timeStamp: e.timeStamp,
				identifier: e.identifier,
				targetTouches: e.targetTouches,
				finger: e.finger
			};

			data = {
				event: event,
				timer: new Timer(update),
				touch: undefined,
				timeStamp: undefined
			};

			if (e.identifier === undefined)
			{
				// We're dealing with a mouse
				// Stop clicks from propagating during a move
				add(e.target, 'click', returnFalse);
				add(document, mouseevents.move, activeMousemove, data);
				add(document, mouseevents.end, activeMouseend, data);
			}
			else
			{
				// We're dealing with a touch. Stop touchmove doing
				// anything defaulty.
				e._preventTouchmoveDefault();
				add(document, touchevents.move + '.' + e.identifier, activeTouchmove, data);
				add(document, touchevents.end + '.' + e.identifier, activeTouchend, data);
			}
		}
	};

	jQuery.event.special.move = {
		setup: function ()
		{
			// Bind a noop to movestart. Why? It's the movestart
			// setup that decides whether other move events are fired.
			add(this, 'movestart.move', jQuery.noop);
		},

		teardown: function ()
		{
			remove(this, 'movestart.move', jQuery.noop);
		}
	};

	jQuery.event.special.moveend = {
		setup: function ()
		{
			// Bind a noop to movestart. Why? It's the movestart
			// setup that decides whether other move events are fired.
			add(this, 'movestart.moveend', jQuery.noop);
		},

		teardown: function ()
		{
			remove(this, 'movestart.moveend', jQuery.noop);
		}
	};

	add(document, 'mousedown.move', mousedown);
	add(document, 'touchstart.move', touchstart);

	// Make jQuery copy touch event properties over to the jQuery event
	// object, if they are not already listed. But only do the ones we
	// really need. IE7/8 do not have Array#indexOf(), but nor do they
	// have touch events, so let's assume we can ignore them.
	if (typeof Array.prototype.indexOf === 'function')
	{
		(function (jQuery, undefined)
		{
			var props = ["changedTouches", "targetTouches"],
			    l = props.length;

			while (l--)
			{
				if (jQuery.event.props.indexOf(props[l]) === -1)
				{
					jQuery.event.props.push(props[l]);
				}
			}
		})(jQuery);
	};
});

///#source 1 1 /Scripts/sklib-lightbox/js/jquery.mousewheel.js
/*!
 * jQuery Mousewheel 3.1.12
 *
 * Copyright 2014 jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 */

(function (factory) {
    if ( typeof define === 'function' && define.amd ) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // Node/CommonJS style for Browserify
        module.exports = factory;
    } else {
        // Browser globals
        factory(jQuery);
    }
}(function ($) {

    var toFix  = ['wheel', 'mousewheel', 'DOMMouseScroll', 'MozMousePixelScroll'],
        toBind = ( 'onwheel' in document || document.documentMode >= 9 ) ?
                    ['wheel'] : ['mousewheel', 'DomMouseScroll', 'MozMousePixelScroll'],
        slice  = Array.prototype.slice,
        nullLowestDeltaTimeout, lowestDelta;

    if ( $.event.fixHooks ) {
        for ( var i = toFix.length; i; ) {
            $.event.fixHooks[ toFix[--i] ] = $.event.mouseHooks;
        }
    }

    var special = $.event.special.mousewheel = {
        version: '3.1.12',

        setup: function() {
            if ( this.addEventListener ) {
                for ( var i = toBind.length; i; ) {
                    this.addEventListener( toBind[--i], handler, false );
                }
            } else {
                this.onmousewheel = handler;
            }
            // Store the line height and page height for this particular element
            $.data(this, 'mousewheel-line-height', special.getLineHeight(this));
            $.data(this, 'mousewheel-page-height', special.getPageHeight(this));
        },

        teardown: function() {
            if ( this.removeEventListener ) {
                for ( var i = toBind.length; i; ) {
                    this.removeEventListener( toBind[--i], handler, false );
                }
            } else {
                this.onmousewheel = null;
            }
            // Clean up the data we added to the element
            $.removeData(this, 'mousewheel-line-height');
            $.removeData(this, 'mousewheel-page-height');
        },

        getLineHeight: function(elem) {
            var $elem = $(elem),
                $parent = $elem['offsetParent' in $.fn ? 'offsetParent' : 'parent']();
            if (!$parent.length) {
                $parent = $('body');
            }
            return parseInt($parent.css('fontSize'), 10) || parseInt($elem.css('fontSize'), 10) || 16;
        },

        getPageHeight: function(elem) {
            return $(elem).height();
        },

        settings: {
            adjustOldDeltas: true, // see shouldAdjustOldDeltas() below
            normalizeOffset: true  // calls getBoundingClientRect for each event
        }
    };

    $.fn.extend({
        mousewheel: function(fn) {
            return fn ? this.bind('mousewheel', fn) : this.trigger('mousewheel');
        },

        unmousewheel: function(fn) {
            return this.unbind('mousewheel', fn);
        }
    });


    function handler(event) {
        var orgEvent   = event || window.event,
            args       = slice.call(arguments, 1),
            delta      = 0,
            deltaX     = 0,
            deltaY     = 0,
            absDelta   = 0,
            offsetX    = 0,
            offsetY    = 0;
        event = $.event.fix(orgEvent);
        event.type = 'mousewheel';

        // Old school scrollwheel delta
        if ( 'detail'      in orgEvent ) { deltaY = orgEvent.detail * -1;      }
        if ( 'wheelDelta'  in orgEvent ) { deltaY = orgEvent.wheelDelta;       }
        if ( 'wheelDeltaY' in orgEvent ) { deltaY = orgEvent.wheelDeltaY;      }
        if ( 'wheelDeltaX' in orgEvent ) { deltaX = orgEvent.wheelDeltaX * -1; }

        // Firefox < 17 horizontal scrolling related to DOMMouseScroll event
        if ( 'axis' in orgEvent && orgEvent.axis === orgEvent.HORIZONTAL_AXIS ) {
            deltaX = deltaY * -1;
            deltaY = 0;
        }

        // Set delta to be deltaY or deltaX if deltaY is 0 for backwards compatabilitiy
        delta = deltaY === 0 ? deltaX : deltaY;

        // New school wheel delta (wheel event)
        if ( 'deltaY' in orgEvent ) {
            deltaY = orgEvent.deltaY * -1;
            delta  = deltaY;
        }
        if ( 'deltaX' in orgEvent ) {
            deltaX = orgEvent.deltaX;
            if ( deltaY === 0 ) { delta  = deltaX * -1; }
        }

        // No change actually happened, no reason to go any further
        if ( deltaY === 0 && deltaX === 0 ) { return; }

        // Need to convert lines and pages to pixels if we aren't already in pixels
        // There are three delta modes:
        //   * deltaMode 0 is by pixels, nothing to do
        //   * deltaMode 1 is by lines
        //   * deltaMode 2 is by pages
        if ( orgEvent.deltaMode === 1 ) {
            var lineHeight = $.data(this, 'mousewheel-line-height');
            delta  *= lineHeight;
            deltaY *= lineHeight;
            deltaX *= lineHeight;
        } else if ( orgEvent.deltaMode === 2 ) {
            var pageHeight = $.data(this, 'mousewheel-page-height');
            delta  *= pageHeight;
            deltaY *= pageHeight;
            deltaX *= pageHeight;
        }

        // Store lowest absolute delta to normalize the delta values
        absDelta = Math.max( Math.abs(deltaY), Math.abs(deltaX) );

        if ( !lowestDelta || absDelta < lowestDelta ) {
            lowestDelta = absDelta;

            // Adjust older deltas if necessary
            if ( shouldAdjustOldDeltas(orgEvent, absDelta) ) {
                lowestDelta /= 40;
            }
        }

        // Adjust older deltas if necessary
        if ( shouldAdjustOldDeltas(orgEvent, absDelta) ) {
            // Divide all the things by 40!
            delta  /= 40;
            deltaX /= 40;
            deltaY /= 40;
        }

        // Get a whole, normalized value for the deltas
        delta  = Math[ delta  >= 1 ? 'floor' : 'ceil' ](delta  / lowestDelta);
        deltaX = Math[ deltaX >= 1 ? 'floor' : 'ceil' ](deltaX / lowestDelta);
        deltaY = Math[ deltaY >= 1 ? 'floor' : 'ceil' ](deltaY / lowestDelta);

        // Normalise offsetX and offsetY properties
        if ( special.settings.normalizeOffset && this.getBoundingClientRect ) {
            var boundingRect = this.getBoundingClientRect();
            offsetX = event.clientX - boundingRect.left;
            offsetY = event.clientY - boundingRect.top;
        }

        // Add information to the event object
        event.deltaX = deltaX;
        event.deltaY = deltaY;
        event.deltaFactor = lowestDelta;
        event.offsetX = offsetX;
        event.offsetY = offsetY;
        // Go ahead and set deltaMode to 0 since we converted to pixels
        // Although this is a little odd since we overwrite the deltaX/Y
        // properties with normalized deltas.
        event.deltaMode = 0;

        // Add event and delta to the front of the arguments
        args.unshift(event, delta, deltaX, deltaY);

        // Clearout lowestDelta after sometime to better
        // handle multiple device types that give different
        // a different lowestDelta
        // Ex: trackpad = 3 and mouse wheel = 120
        if (nullLowestDeltaTimeout) { clearTimeout(nullLowestDeltaTimeout); }
        nullLowestDeltaTimeout = setTimeout(nullLowestDelta, 200);

        return ($.event.dispatch || $.event.handle).apply(this, args);
    }

    function nullLowestDelta() {
        lowestDelta = null;
    }

    function shouldAdjustOldDeltas(orgEvent, absDelta) {
        // If this is an older event and the delta is divisable by 120,
        // then we are assuming that the browser is treating this as an
        // older mouse wheel event and that we should divide the deltas
        // by 40 to try and get a more usable deltaFactor.
        // Side note, this actually impacts the reported scroll distance
        // in older browsers and can cause scrolling to be slower than native.
        // Turn this off by setting $.event.special.mousewheel.settings.adjustOldDeltas to false.
        return special.settings.adjustOldDeltas && orgEvent.type === 'mousewheel' && absDelta % 120 === 0;
    }

}));


