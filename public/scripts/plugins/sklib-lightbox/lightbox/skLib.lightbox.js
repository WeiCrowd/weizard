/*
 * skLib.lightbox
 * version 1.0.3; February 2015
 * © AV studio; http://sklib.av-studio.si/lightbox/
 */


if (typeof skLib == "undefined") skLib = new Object();
$.extend($.easing, { easeInSine: function (x, t, b, c, d) { return -c * Math.cos(t / d * (Math.PI / 2)) + c + b; } });

skLib.lightbox =
	{
		data:
			{
				rootSelector: null,
				linkSelector: ".skLib-lightboxLink",
				iconsDir: "/Scripts/sklib-lightbox/lightbox/images/",
				galleries: new Object(),
				galleryFiles: new Object(),
				preloadedImages: new Object(),
				commands: new Array(),
				unnamedLinkCount: 0, // index for <a/> tags without ID
				unnamedSlideCount: 0, // index for adding unique ID's to slides
				currentGallery: null,
				currentSlideId: null,
				currentFile: null,
				animationSpeed: 300,
				loadedImages: new Array(),
				loadedFrames: new Array(),
				dragDelta: 0,
				dragMax: 0,
				dragExtreme: 0,
				dragIsSideways: true,
				dragCommand: null,
				preventClickPastToClose: false,
				wasHtmlPrepared: false,
				isRtl: null,
				youtubeParams: "autohide=1&autoplay=1&modestbranding=1&showinfo=0&theme=dark&rel=0&color=white",
				vimeoParams: "title=0&byline=0&portrait=0&fullscreen=1&autoplay=1",
				dailymotionParams: "autoPlay=1&related=0&logo=0",
				slideChangeInterval: 250,
				lastSlideChange: 0,
				currentContainerId: null,
				onHideEvent: null,
				getVideoData: function (url)
				{
					var services = [
						{ t: "youtube", r: /(youtu(?:\.be|be\.com)\/(?:.*v(?:\/|=)|(?:.*\/)?)([\w'-]+))/i, c: [2], p: "youtube" },
						{ t: "vimeo", r: /http:\/\/(www\.|player\.)?vimeo.com(\/video)?\/(\d+)($|\/)/, c: [3], p: "vimeo" },
						{ t: "dailymotion", r: /^.+dailymotion.com(\/embed)?\/(video|hub)\/([^_\?]+)[^#]*(#video=([^_&\?]+))?/, c: [5, 3], p: "dailymotion" }
					];
					for (var x = 0; x < services.length; x++)
					{
						if (url.indexOf(services[x].t) >= 0)
						{
							var a = null;
							try { a = url.match(services[x].r); } catch (e) { }
							if (a != null)
							{
								for (var y = 0; y < services[x].c.length; y++)
									if (services[x].c[y] < a.length)
										if ((typeof a[services[x].c[y]] == "string") && (a[services[x].c[y]] != "")) return { code: a[services[x].c[y]], player: services[x].p };
							}
						}
					}
					return null;
				}
			},
		customFunctions: new Object(),
		parse:
			{
				linkData: function (link)
				{
					var data = new Object();
					data.link = link;
					data.gallery = skLib.lightbox.parse.getGallery(link);
					if ((data.gallery == null) || (data.gallery == undefined) || (data.gallery == "")) data.gallery = $(link).attr("id");

					var type = "";
					var file = $(link).attr("href");
					var fileLower = file.toLowerCase();
					var video_player = "";
					var video_code = "";

					data.descTitle = $(link).attr("light-title");
					data.desc = $(link).attr("light-desc");

					var typeManual = $(link).attr("light-type");
					switch (typeManual)
					{
						case "image": { type = "image"; break; }
						case "video": { type = "video"; break; }
						case "iframe": { type = "iframe"; break; }
					}

					// Test if video
					if ((type == "") || (type == "video"))
					{
						video_player = $(link).attr("light-player");
						video_code = $(link).attr("light-video_code");
						if ((video_player == null) || (video_player == undefined)) video_player = "";
						if ((video_code == null) || (video_code == undefined)) video_code = "";

						if (video_code == "")
						{
							// Test URL patterns
							var d = skLib.lightbox.data.getVideoData(file);
							if (d != null) { video_code = d.code; video_player = d.player; type = "video"; }
						}
						else if ((video_code != "") && (video_player == ""))
						{
							// Test video player
							var a = "";
							if (fileLower.indexOf("youtube.com") >= 0)
								video_player = "youtube";
							else if (fileLower.indexOf("vimeo.com") >= 0)
								video_player = "vimeo";
						}

						if (type == "")
						{
							if ((video_player != "") && (video_code != ""))
							{
								type = "video";
							}
						}
					}

					// Test just the target URL
					if ((type == "") || (type == "image"))
					{
						// Test image
						if (type == "")
						{
							var ext = file;
							var pos = file.indexOf("?");
							if (pos >= 0) var ext = ext.substring(0, pos);
							pos = file.lastIndexOf(".");
							if (pos >= 0) var ext = ext.substring(pos + 1);
							if ((ext == "jpg") || (ext == "jpeg") || (ext == "png") || (ext == "gif")) { type = "image"; }
						}
					}

					// Default to iframe
					if (type == "") type = "iframe";

					// Finalize data
					switch (type)
					{
						case "image":
							{
								var imageData = new Object();
								data.downloadUrl = $(link).attr("light-download");
								imageData.width = parseInt($(link).attr("light-width")); if (isNaN(imageData.width)) imageData.width = null;
								imageData.height = parseInt($(link).attr("light-height")); if (isNaN(imageData.height)) imageData.height = null;

								var imageVariationsStr = $(link).attr("light-variations");
								if ((typeof imageVariationsStr == "string") && (imageVariationsStr != ""))
								{
									var v = imageVariationsStr.split(";");
									if ((v != null) && (v.length > 0))
									{
										var imageVariations = new Array();
										for (var x = 0; x < v.length; x++)
										{
											var a = v[x].split("@");
											if ((a != null) && (a.length >= 2))
											{
												var a1 = a[0];
												var a2 = parseInt(a[1]);
												if ((a1.length > 0) && (!isNaN(a2))) imageVariations.push({ url: a1, width: a2 });
											}
										}
									}
									if (imageVariations.length > 1)
									{
										imageVariations.sort(function (a, b) { return (a.width < b.width) ? -1 : 1; });
										imageData.variations = imageVariations;
									}
								}

								data.image = imageData;
								break;
							}
						case "video":
							{
								var videoData = new Object();
								videoData.player = video_player;
								videoData.code = video_code;
								videoData.ratio = $(link).attr("light-ratio");
								videoData.embedUrl = $(link).attr("light-url");
								if ((videoData.ratio == null) || (videoData.ratio == undefined) || (videoData.ratio == "")) videoData.ratio = "16:9";
								videoData.width = parseInt($(link).attr("light-width")); if (isNaN(videoData.width)) videoData.width = null;
								videoData.height = parseInt($(link).attr("light-height")); if (isNaN(videoData.height)) videoData.height = null;
								data.video = videoData;
								break;
							}
						default:
							{
								type = "iframe";
								var iframeData = new Object();
								iframeData.width = parseInt($(link).attr("light-width")); if (isNaN(iframeData.width)) iframeData.width = null;
								iframeData.height = parseInt($(link).attr("light-height")); if (isNaN(iframeData.height)) iframeData.height = null;
								iframeData.ratio = $(link).attr("light-ratio");
								iframeData.embedUrl = $(link).attr("light-url");
								data.iframe = iframeData;
								break;
							}
					}

					data.type = type;
					data.file = file;
					return data;
				},
				getFile: function (link)
				{
					var s = $(link).attr("light-image");
					if ((s != null) && (s != undefined) && (s != "")) return s;
					s = $(link).attr("href");
					if ((s != null) && (s != undefined) && (s != "")) return s;
					return null;
				},
				getGallery: function (link)
				{
					return $(link).attr("light-gallery");
				}
			},
		init: function (config)
		{
			if (typeof config != "undefined")
			{
				skLib.lightbox.data.rootSelector = config.rootSelector;
				skLib.lightbox.customFunctions.variation = config.variation;
				{
					var s = config.linkSelector;
					if (typeof s == "string")
					{
						if (s != "") skLib.lightbox.data.linkSelector = s;
					}
				}
				{
					var iconsDir = config.iconsDir;
					if (typeof iconsDir == "string")
					{
						if (iconsDir.length >= 1) if (iconsDir.slice(-1) != "/") iconsDir += "/";
					}
					else
						iconsDir = "";
					skLib.lightbox.data.iconsDir = iconsDir;
				}
				if (typeof config.isRtl == "boolean") skLib.lightbox.data.isRtl = config.isRtl;
				if (typeof config.youtubeParams == "string") skLib.lightbox.data.youtubeParams = config.youtubeParams;
				if (typeof config.vimeoParams == "string") skLib.lightbox.data.vimeoParams = config.vimeoParams;
				if (typeof config.dailymotionParams == "string") skLib.lightbox.data.dailymotionParams = config.dailymotionParams;
				skLib.lightbox.data.commands = config.commands;
			}
			skLib.lightbox.data.galleries = new Object();
			skLib.lightbox.data.galleryFiles = new Object();
			if ((skLib.lightbox.data.isRtl != false) && (skLib.lightbox.data.isRtl != true)) skLib.lightbox.data.isRtl = ($("body").css("direction") == "rtl");
			$(skLib.lightbox.data.linkSelector).each(function (index)
			{
				var linkId = $(this).attr("id");
				if ((linkId == null) || (linkId == ""))
				{
					linkId = "skLib_lightbox_" + (++skLib.lightbox.data.unnamedLinkCount);
					$(this).attr("id", linkId);
				}
				var data = skLib.lightbox.parse.linkData(this);
				var galleryCode = data.gallery;
				if ((galleryCode != null) && (galleryCode != ""))
				{
					if (!skLib.lightbox.data.galleries[galleryCode]) skLib.lightbox.data.galleries[galleryCode] = new Array();
					if ((skLib.lightbox.data.galleryFiles[galleryCode] == null) || (skLib.lightbox.data.galleryFiles[galleryCode] == undefined)) skLib.lightbox.data.galleryFiles[galleryCode] = new Object();
				
					var file = data.file;
					if ((skLib.lightbox.data.galleryFiles[galleryCode][file] == null) || (skLib.lightbox.data.galleryFiles[galleryCode][file] == undefined) || (isNaN(skLib.lightbox.data.galleryFiles[galleryCode][file])))
					{
						skLib.lightbox.data.galleries[galleryCode].push(linkId);
						skLib.lightbox.data.galleryFiles[galleryCode][file] = skLib.lightbox.data.galleries[galleryCode].length - 1;
					}
				}
				$(this).attr("onclick", "return skLib.lightbox.open(this);");
			});
		},
		open: function (link)
		{
			if (typeof link == "string") link = document.getElementById(link);
			if (typeof link != "object") return;
			skLib.lightbox.render.prepHtml();
			var linkData = skLib.lightbox.parse.linkData(link);
			skLib.lightbox.data.loadedImages = new Array();
			skLib.lightbox.data.loadedFrames = new Array();
			if (linkData.gallery != null)
			{
				if (skLib.lightbox.data.galleries[linkData.gallery].length > 1)
				{
					$("#skLib_lightbox_navigationBar").show();
					skLib.lightbox.render.updateGalleryPager(linkData.gallery, linkData.file);
				}
				else
					$("#skLib_lightbox_navigationBar").hide();
			}
			else
				$("#skLib_lightbox_navigationBar").hide();
			$("#skLib_lightbox_overlay").css("opacity", "0").show();
			skLib.lightbox.render.prepSlideHtml("#skLib_lightbox_content", linkData);
			$("#skLib_lightbox_overlay").animate({ opacity: 1 }, skLib.lightbox.data.animationSpeed, "swing");
			$("#skLib_lightbox_content").innerHTML = "";
			$(window).resize(skLib.lightbox.render.resizeImages);
			skLib.lightbox.scrollLock.lock();
			$(window).bind("keydown", skLib.lightbox.render.keyDownEvent);
			if (skLib.lightbox.data.galleries[skLib.lightbox.data.currentGallery].length > 1)
			{
				try
				{
					$("#skLib_lightbox_overlay").mousewheel(skLib.lightbox.render.mouseWheelEvent);
				}
				catch (e) { }
			}
			return false;
		},
		prevSlide: function (easingMethod)
		{
			skLib.lightbox.changeSlide(skLib.lightbox.render.getCurrentSlideN(-1), -1, easingMethod);
		},
		nextSlide: function (easingMethod)
		{
			skLib.lightbox.changeSlide(skLib.lightbox.render.getCurrentSlideN(1), 1, easingMethod);
		},
		changeSlide: function (n, direction, easingMethod)
		{
			skLib.lightbox.render.clean.onHideEvents();
			skLib.lightbox.render.clear();
			var currentN = skLib.lightbox.render.getCurrentSlideN();
			if (n == currentN) return;
			if (isNaN(direction)) direction = 1;

			if ((easingMethod == null) || (easingMethod == undefined) || (easingMethod == "")) easingMethod = "easeInSine";

			var animationOffset = (direction > 0) ? -100 : 100;
			if (skLib.lightbox.data.isRtl) animationOffset = -animationOffset;

			var a = skLib.lightbox.data.currentSlideId;
			$("#" + a).css({ "z-index": 10005, opacity: 1 }).animate({ left: (parseInt($("#" + a).css("left")) + animationOffset) + "px", opacity: 0 }, skLib.lightbox.data.animationSpeed, easingMethod, function () { $("#" + a + " iframe").attr("src", ""); setTimeout("$(\"#" + a + "\").remove();", 1); });

			var linkData = skLib.lightbox.parse.linkData($("#" + skLib.lightbox.data.galleries[skLib.lightbox.data.currentGallery][n]));
			skLib.lightbox.render.prepSlideHtml("#skLib_lightbox_content", linkData);

			skLib.lightbox.render.updateGalleryPager(linkData.gallery, linkData.file);
			skLib.lightbox.data.lastSlideChange = new Date().getTime();
		},
		close: function ()
		{
			skLib.lightbox.render.clean.onHideEvents();
			skLib.lightbox.render.clear();
			$("#skLib_lightbox_overlay").animate({ opacity: 0 }, skLib.lightbox.data.animationSpeed, "swing", function () { $("#" + skLib.lightbox.data.currentSlideId + " iframe").attr("src", ""); $("#skLib_lightbox_overlay").hide(); setTimeout("$(\"#skLib_lightbox_content\").empty();", 1); });
			skLib.lightbox.scrollLock.release();
			$(window).unbind("keydown", skLib.lightbox.render.keyDownEvent);
		},
		render:
			{
				clean:
					{
						onHideEvents: function ()
						{
							var s = skLib.lightbox.data.onHideEvent;
							skLib.lightbox.data.onHideEvent = null;
							if (typeof s == "string") { try { eval(s); } catch (e) { } }
						},
						youTube: function ()
						{
							if (typeof skLib.lightbox.data.currentContainerId != "string") return;
							try
							{ document.getElementById(skLib.lightbox.data.currentContainerId + "_frame").contentWindow.postMessage(JSON.stringify({ 'event': 'command', 'func': 'stopVideo', 'args': '' || [] }), "*"); }
							catch (e) { }
						}
					},
				prepHtml: function ()
				{
					if (skLib.lightbox.data.wasHtmlPrepared) return;
					if (!$("#skLib_lightbox_overlay")[0])
					{
						var commandsHtml = "";
						try
						{
							var commands = skLib.lightbox.data.commands;
							if ((typeof commands == "object") && (commands.length > 0))
							{
								for (var x = 0; x < commands.length; x++)
								{
									commandsHtml += "		<div id=\"skLib_lightbox_command" + x + "\" class=\"skLib-lightbox-icon\"><a" + (((typeof commands[x].target == "string") && (commands[x].target != "")) ? " target=\"" + commands[x].target + "\"" : "") + "><img src=\"" + commands[x].icon + "\" /></a></div>\n";
								}
							}
						}
						catch (e) { }
						var html =
							"<div id=\"skLib_lightbox_dragGuard\"></div>" +
							"<div id=\"skLib_lightbox_contentArea\" onclick=\"skLib.lightbox.render.clickPastToClose();\">\n" +
							"	<div id=\"skLib_lightbox_loading\"></div>\n" +
							"	<div id=\"skLib_lightbox_content\"></div>\n" +
							"</div>\n" +
							"<div id=\"skLib_lightbox_dragIndicators\">\n" +
							"	<div id=\"skLib_lightbox_dragIndicator_prev\"><span><img src=\"" + skLib.lightbox.data.iconsDir + "prev-drag.png\" /></span></div>" +
							"	<div id=\"skLib_lightbox_dragIndicator_next\"><span><img src=\"" + skLib.lightbox.data.iconsDir + "next-drag.png\" /></span></div>" +
							"	<div id=\"skLib_lightbox_dragIndicator_close\"><span><img src=\"" + skLib.lightbox.data.iconsDir + "close-drag.png\" /></span></div>" +
							"</div>\n" +
							"<div id=\"skLib_lightbox_toolbars\">\n" +
							"	<div id=\"skLib_lightbox_close\" onclick=\"skLib.lightbox.close();\" class=\"skLib-lightbox-icon\"><img src=\"" + skLib.lightbox.data.iconsDir + "close.png\" /></div>" +
							"	<div id=\"skLib_lightbox_navigationBar\">\n" +
							"		<div id=\"skLib_lightbox_prev\" onclick=\"skLib.lightbox.prevSlide();\" class=\"skLib-lightbox-icon\"><img src=\"" + skLib.lightbox.data.iconsDir + (!skLib.lightbox.data.isRtl ? "prev" : "next") + ".png\" /></div>" +
							"		<div id=\"skLib_lightbox_page\"><span id=\"skLib_lightbox_page_inner\"><span id=\"skLib_lightbox_page_current\">1</span> /<span id=\"skLib_lightbox_page_total\">1</span></span></div>" +
							"		<div id=\"skLib_lightbox_next\" onclick=\"skLib.lightbox.nextSlide();\" class=\"skLib-lightbox-icon\"><img src=\"" + skLib.lightbox.data.iconsDir + (!skLib.lightbox.data.isRtl ? "next" : "prev") + ".png\" /></div>" +
							"	</div>\n" +
							"	<div id=\"skLib_lightbox_commandBar\">\n" +
							commandsHtml +
							"	</div>\n" +
							"</div>\n";
						var container = document.createElement("div");
						container.id = "skLib_lightbox_overlay";
						container.innerHTML = html;
						container.style.display = "block";
						container.style.opacity = 0;
						if (skLib.lightbox.data.isRtl) container.className = "skLib-lightbox-rtl";
						var bodyElement = document.getElementsByTagName('body')[0];
						bodyElement.insertBefore(container, bodyElement.firstChild);
						skLib.lightbox.data.wasHtmlPrepared = true;
					}
				},
				updateGalleryPager: function (gallery, file)
				{
					var g = skLib.lightbox.data.galleryFiles[gallery][file];
					if ((!isNaN(g)) && (g >= 0) && (g < skLib.lightbox.data.galleries[gallery].length))
					{
						$("#skLib_lightbox_page_current").html(g + 1);
						$("#skLib_lightbox_page_total").html(skLib.lightbox.data.galleries[gallery].length);
					}
				},
				prepSlideHtml: function (parentContainer, linkData)
				{
					skLib.lightbox.data.currentFile = linkData.file;
					skLib.lightbox.data.currentGallery = linkData.gallery;

					var container = document.createElement("div");
					var containerId = "skLib_lightbox_slide_" + (++skLib.lightbox.data.unnamedSlideCount);
					container.id = containerId;
					container.className = "skLib-lightbox-slideContainer-outer";
					$(parentContainer).append(container);
					skLib.lightbox.data.currentSlideId = containerId;

					try
					{
						$(container).bind("movestart", skLib.lightbox.render.dragStart).bind("move", skLib.lightbox.render.drag).bind("moveend", skLib.lightbox.render.dragEnd);
					}
					catch (e) { }

					switch (linkData.type)
					{
						case "image": { skLib.lightbox.render.prepImageHtml(container, linkData); break; }
						case "video": { skLib.lightbox.render.prepIframeHtml(container, linkData); break; }
						case "iframe": { skLib.lightbox.render.prepIframeHtml(container, linkData); break; }
					}

					// Set commands
					try
					{
						var commands = skLib.lightbox.data.commands;
						if ((typeof commands == "object") && (commands.length > 0))
						{
							for (var x = 0; x < commands.length; x++)
							{
								var url = $(linkData.link).attr(commands[x].attr);
								$("#skLib_lightbox_command" + x + " a").attr("href", "");
								$("#skLib_lightbox_command" + x + " a").attr("title", commands[x].text);
								if ((url != null) && (url != undefined) && (url != ""))
								{
									$("#skLib_lightbox_command" + x + " a").attr("href", url);
									$("#skLib_lightbox_command" + x + "").show();
								}
								else
								{
									$("#skLib_lightbox_command" + x + "").hide();
								}
							}
						}
					}
					catch (e) { }

					// Preload next slide's image
					try
					{
						var length = skLib.lightbox.data.galleries[skLib.lightbox.data.currentGallery].length;
						if (length > 1)
						{
							var n = skLib.lightbox.render.getCurrentSlideN(1);
							if (n >= 0)
							{
								var nextLinkData = skLib.lightbox.parse.linkData($("#" + skLib.lightbox.data.galleries[skLib.lightbox.data.currentGallery][n]));
								if (nextLinkData.type == "image")
								{
									var imagePath = skLib.lightbox.render.getImageVariation(nextLinkData);
									if (skLib.lightbox.data.preloadedImages[imagePath] != true)
									{
										var imageTag = document.createElement("img");
										imageTag.style = "width: 0; height: 0; left: -9999px; top: -9999px; visibility: hidden;"
										imageTag.src = imagePath;
										skLib.lightbox.data.preloadedImages[imagePath] = true;
									}
								}
							}
						}
					}
					catch (e) { }
				},
				prepImageHtml: function (parentContainer, linkData)
				{
					var imageTag = document.createElement("img");
					imageTag.width = imageTag.height = "0";
					imageTag.id = "skLib_lightbox_image_" + (++skLib.lightbox.data.unnamedSlideCount);
					imageTag.onclick = function (e)
					{
						if (!e) e = window.event;
						if (e.stopPropagation)
							e.stopPropagation();
						else
							e.cancelBubble = true;
					}; // Negates click to close on lightbox's background
					var container = document.createElement("div");
					var containerId = "skLib_lightbox_slide_" + (++skLib.lightbox.data.unnamedSlideCount);
					container.id = containerId;
					container.style.opacity = 0;
					container.className = "skLib-lightbox-slideContainer";
					$(parentContainer).append(container);

					{
						var html = "";
						html += "<div class=\"skLib-lightbox-slideContainer-table\">";
						if ((linkData.descTitle != null) && (linkData.descTitle != undefined) && (linkData.descTitle != "")) html += "<div class=\"skLib-lightbox-slideContainer-titleRow\"><div class=\"skLib-lightbox-slideContainer-title\">" + linkData.descTitle + "</div></div>";
						html += "<div class=\"skLib-lightbox-slideContainer-imageRow\"><div class=\"skLib-lightbox-slideContainer-imageCell\"></div></div>";
						if ((linkData.desc != null) && (linkData.desc != undefined) && (linkData.desc != "")) html += "<div class=\"skLib-lightbox-slideContainer-descRow\"><div class=\"skLib-lightbox-slideContainer-desc\">" + linkData.desc + "</div></div>";
						html += "</div>";
						$(container).html(html);
					}

					$("#skLib_lightbox_loading").show();

					$("#" + containerId + " .skLib-lightbox-slideContainer-imageCell").append(imageTag);
					imagesLoaded(document.querySelector("#" + containerId), function (instance) { setTimeout("skLib.lightbox.render.finishImageLoad(\'" + containerId + "\', 1);", 10); });
					var imagePath = skLib.lightbox.render.getImageVariation(linkData);
					imageTag.src = imagePath;
					skLib.lightbox.data.preloadedImages[imagePath] = true;
				},
				prepIframeHtml: function (parentContainer, linkData)
				{
					var container = document.createElement("div");
					var containerId = "skLib_lightbox_slide_" + (++skLib.lightbox.data.unnamedSlideCount);
					container.id = containerId;
					container.style.opacity = 0;
					container.className = "skLib-lightbox-slideContainer";
					$(parentContainer).append(container);
					skLib.lightbox.data.currentContainerId = containerId;

					var width = 0;
					var height = 0;
					var ratio = 0;
					var ratioStr = "";
					var url = "";
					if (linkData.type == "video")
					{
						if ((!isNaN(linkData.video.width)) && (linkData.video.width > 0)) width = linkData.video.width;
						if ((!isNaN(linkData.video.height)) && (linkData.video.height > 0)) height = linkData.video.height;
						if (width == 0) width = 10000;
						ratioStr = linkData.video.ratio;
						if ((typeof linkData.video.embedUrl == "string") && (linkData.video.embedUrl != "")) url = linkData.video.embedUrl;
						if (url == "")
						{
							switch (linkData.video.player)
							{
								case "youtube": { url = "https://www.youtube.com/embed/" + linkData.video.code + "?" + skLib.lightbox.data.youtubeParams + "&enablejsapi=1"; break; }
								case "vimeo": { url = "https://player.vimeo.com/video/" + linkData.video.code + "?" + skLib.lightbox.data.vimeoParams; break; }
								case "dailymotion": { url = "//www.dailymotion.com/embed/video/" + linkData.video.code + "?" + skLib.lightbox.data.dailymotionParams; break; }
							}
						}
					}
					else
					{
						if ((!isNaN(linkData.iframe.width)) && (linkData.iframe.width > 0)) width = linkData.iframe.width;
						if ((!isNaN(linkData.iframe.height)) && (linkData.iframe.height > 0)) height = linkData.iframe.height;
						ratioStr = linkData.iframe.ratio;
						if ((typeof linkData.iframe.embedUrl == "string") && (linkData.iframe.embedUrl != "")) url = linkData.iframe.embedUrl;
					}
					if (url == "") url = linkData.file;

					if ((ratioStr != null) && (ratioStr != undefined) && (ratioStr != "") && (typeof ratioStr == "string"))
					{
						ratioStr = ratioStr.toLowerCase();
						if ((width > 0) && (height > 0) && ((ratioStr == "yes") || (ratioStr == "true") || (ratioStr == "1")))
						{
							ratio = (width * 1.0) / (height * 1.0);
						}
						if (ratio == 0)
						{
							var a = ratioStr.split(":");
							if ((a != null) && (a.length >= 2))
							{
								var a1 = parseFloat(a[0]);
								var a2 = parseFloat(a[1]);
								if ((!isNaN(a1)) && (a1 > 0) && (!isNaN(a2)) && (a2 > 0))
								{
									ratio = a1 / a2;
								}
							}
						}
						if (ratio == 0)
						{
							var f = parseFloat(ratioStr);
							if (!isNaN(f)) ratio = f;
						}
					}
					if ((width > 0) && (height > 0) && (ratio > 0))
						ratio = width / height;
					else if ((width > 0)  && (ratio > 0))
						height = width / ratio;
					else if ((height > 0) && (ratio > 0))
						width = height * ratio;
					else if (ratio > 0)
					{
						width = 10000;
						height = width / ratio;
					}

					var containerStyles = (ratio > 0) ? "" : "position: relative; width: 100%; height: 100%; margin: auto;";
					if (width > 0) containerStyles += " max-width: " + width + "px;";
					if ((ratio <= 0) && (height > 0)) containerStyles += " max-height: " + height + "px;";


					{
						var html = "";
						html += "<div class=\"skLib-lightbox-slideContainer-table\">";
						if ((linkData.descTitle != null) && (linkData.descTitle != undefined) && (linkData.descTitle != "")) html += "<div class=\"skLib-lightbox-slideContainer-titleRow\"><div class=\"skLib-lightbox-slideContainer-title\">" + linkData.descTitle + "</div></div>";
						html += "<div class=\"skLib-lightbox-slideContainer-frameRow\"><div class=\"skLib-lightbox-slideContainer-frameCell\"><div class=\"skLib-lightbox-slideContainer-frame-container\" style=\"" + containerStyles + "\">";
						if (linkData.type == "video") html += "<i>";
						if (ratio > 0)
							html += "<iframe src=\"" + url + "\" width=\"" + width + "\" height=\"" + height + "\" id=\"" + containerId + "_frame\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
						else
							html += "<iframe src=\"" + url + "\" width=\"100%\" height=\"100%\" id=\"" + containerId + "_frame\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
						if (linkData.type == "video") html += "</i>";
						html += "</div></div></div>";
						if ((linkData.desc != null) && (linkData.desc != undefined) && (linkData.desc != "")) html += "<div class=\"skLib-lightbox-slideContainer-descRow\"><div class=\"skLib-lightbox-slideContainer-desc\">" + linkData.desc + "</div></div>";
						html += "</div>";
						$(container).html(html);
					}
					$("#" + containerId).animate({ opacity: 1 }, skLib.lightbox.data.animationSpeed, "swing");
					if ((ratio > 0) && (width > 0) && (height > 0))
					{
						skLib.lightbox.data.loadedFrames.push({ containerId: containerId, width: width, height: height });
						setTimeout(skLib.lightbox.render.resizeImages, 10);
					}
					if (linkData.type == "video")
					{
						switch (linkData.video.player)
						{
							case "youtube": { skLib.lightbox.data.onHideEvent = "skLib.lightbox.render.clean.youTube();"; break; }
						}
					}
					$("#skLib_lightbox_loading").hide();
				},
				finishImageLoad: function (containerId, iteration)
				{
					var image = $("#" + containerId + " img");
					image.attr({ width: "", height: "" }).css({ width: "", height: "" });
					var imageWidth = image.width();
					var imageHeight = image.height();
					if ((iteration < 5) && ((imageWidth <= 40) || (imageHeight <= 40)))
					{
						iteration++;
						setTimeout("skLib.lightbox.render.finishImageLoad(\'" + containerId + "\', " + iteration + ")", iteration * 100);
						return;
					}
					$("#" + containerId).animate({ opacity: 1 }, skLib.lightbox.data.animationSpeed, "swing");
					image.css("width", "1px").css("height", "1px");
					skLib.lightbox.data.loadedImages.push({ id: image.attr("id"), containerId: containerId, width: imageWidth, height: imageHeight });
					skLib.lightbox.render.resizeImages();
					$("#skLib_lightbox_loading").hide();
				},
				getCurrentSlideN: function(offset)
				{
					var g = -1;
					var count = 0;
					try
					{
						g = skLib.lightbox.data.galleryFiles[skLib.lightbox.data.currentGallery][skLib.lightbox.data.currentFile];
						count = skLib.lightbox.data.galleries[skLib.lightbox.data.currentGallery].length;
					}
					catch (e) { return 0; }
					if ((!isNaN(g)) && (g >= 0) && (g < count))
					{
						if (!isNaN(offset))
						{
							g += offset;
							while (g < 0) g += count;
							while (g >= count) g -= count;
						}
						return g;
					}
					return 0;
				},
				getImageVariation: function (linkData)
				{
					var imageWidth = linkData.image.width;
					var imageHeight = linkData.image.height;
					var imagelib = linkData.image.imagelib;
					if ((isNaN(imageWidth)) || (imageWidth <= 0)) imageWidth = 10000;
					if ((isNaN(imageHeight)) || (imageHeight <= 0)) imageHeight = 10000;
					var containerWidth = $("#skLib_lightbox_content").width();
					var containerHeight = $("#skLib_lightbox_content").height();
					if (window.devicePixelRatio)
					{
						containerWidth *= window.devicePixelRatio;
						containerHeight *= window.devicePixelRatio;
					}

					var imageSize = skLib.lightbox.render.getFitSize(imageWidth, imageHeight, containerWidth, containerHeight);

					// Preset variations (list in attribute)
					try
					{
						if ((typeof linkData.image.variations == "object") && (linkData.image.variations.length > 0))
						{
							for (var x = 0; x < linkData.image.variations.length; x++)
							{
								if (imageSize.width < linkData.image.variations[x].width) return linkData.image.variations[x].url;
							}
						}
					}
					catch (e) { }

					// Generic variations (function)
					try
					{
						if (typeof skLib.lightbox.customFunctions.variation != "undefined")
							return skLib.lightbox.customFunctions.variation(linkData, imageWidth, imageHeight, containerWidth, containerHeight, imageSize.width, imageSize.height);
					}
					catch (e) { }

					return linkData.file; // original image
				},
				getFitSize: function (imageWidth, imageHeight, containerWidth, containerHeight)
				{
					if ((imageWidth < containerWidth) && (imageHeight < containerHeight)) return { width: imageWidth, height: imageHeight };
					var width = containerWidth;
					var height = imageHeight * containerWidth / imageWidth;
					if (height > containerHeight)
					{
						height = containerHeight;
						width = imageWidth * containerHeight / imageHeight;
					}
					return { width: width, height: height };
				},
				resizeImages: function ()
				{
					for (var x = 0; x < skLib.lightbox.data.loadedImages.length; x++)
					{
						var container = $("#" + skLib.lightbox.data.loadedImages[x].containerId + " .skLib-lightbox-slideContainer-imageCell");
						if ((container) && (container.length))
						{
							var image = $("#" + skLib.lightbox.data.loadedImages[x].id);
							skLib.lightbox.render.resizeImage(image, container, skLib.lightbox.data.loadedImages[x].width, skLib.lightbox.data.loadedImages[x].height, container.width(), container.height());
						}
					}
					for (var x = 0; x < skLib.lightbox.data.loadedFrames.length; x++)
					{
						var container = $("#" + skLib.lightbox.data.loadedFrames[x].containerId + " .skLib-lightbox-slideContainer-frameCell");
						if ((container) && (container.length))
						{
							var video = $("#" + skLib.lightbox.data.loadedFrames[x].containerId + " .skLib-lightbox-slideContainer-frame-container");
							skLib.lightbox.render.resizeImage(video, container, skLib.lightbox.data.loadedFrames[x].width, skLib.lightbox.data.loadedFrames[x].height, container.width(), container.height());
						}
					}
				},
				resizeImage: function (image, container, imageWidth, imageHeight, containerWidth, containerHeight)
				{
					var size = skLib.lightbox.render.getFitSize(imageWidth, imageHeight, containerWidth, containerHeight);
					image.css({ width: size.width + "px", height: size.height + "px", left: (containerWidth - size.width) / 2 + "px", top: (containerHeight - size.height) / 2 + "px" });
				},
				keyDownEvent: function (e)
				{
					var onlySingleSlide = (skLib.lightbox.data.galleries[skLib.lightbox.data.currentGallery].length == 1);
					var command = "";
					switch (e.which)
					{
						case 27: { skLib.lightbox.close(); return false; } // Escape
						case 39: // Right
							{ command = (!skLib.lightbox.data.isRtl) ? "next" : "prev"; break; }
						case 40: // Down
						case 34: // Page down
						case 32: // Space
							{ command = "next"; break; }
						case 37: // Left
							{ command = (!skLib.lightbox.data.isRtl) ? "prev" : "next"; break; }
						case 38: // Up
						case 33: // Page up
							{ command = "prev"; break; }
						case 36: // Home
							{ if (onlySingleSlide) return false; skLib.lightbox.changeSlide(0, -1); return false; }
						case 35: // End
							{
								if (onlySingleSlide) return false;
								var count = 1;
								try
								{ count = skLib.lightbox.data.galleries[skLib.lightbox.data.currentGallery].length; }
								catch (e) { }
								skLib.lightbox.changeSlide(count - 1, 1);
								return false;
							}
					}
					switch (command)
					{
						case "prev":
							{
								if (onlySingleSlide) return false;
								var now = new Date().getTime()
								if (skLib.lightbox.data.lastSlideChange + skLib.lightbox.data.slideChangeInterval > now) return false;
								skLib.lightbox.prevSlide();
								return false;
							}
						case "next":
							{
								if (onlySingleSlide) return false;
								var now = new Date().getTime()
								if (skLib.lightbox.data.lastSlideChange + skLib.lightbox.data.slideChangeInterval > now) return false;
								skLib.lightbox.nextSlide();
								return false;
							}
					}
				},
				mouseWheelEvent: function (e)
				{
					var now = new Date().getTime();
					if (skLib.lightbox.data.lastSlideChange + skLib.lightbox.data.slideChangeInterval > now) return false;
					var a = e.deltaY - e.deltaX;
					if (a > 0)
					{
						skLib.lightbox.prevSlide();
						return false;
					}
					if (a < 0)
					{
						skLib.lightbox.nextSlide();
						return false;
					}
				},
				dragStart: function (e)
				{
					skLib.lightbox.data.dragIsSideways = (Math.abs(e.deltaX) >= Math.abs(e.deltaY));
					skLib.lightbox.data.dragExtreme = 0;
					if (skLib.lightbox.data.dragIsSideways)
					{
						// Prev/Next
						if (skLib.lightbox.data.galleries[skLib.lightbox.data.currentGallery].length <= 1)
						{
							e.preventDefault();
							return;
						}
						skLib.lightbox.data.dragDelta = e.deltaX;
						skLib.lightbox.data.dragMax = $("#" + skLib.lightbox.data.currentSlideId).outerWidth() * .5;
					}
					else
					{
						// Close
						skLib.lightbox.data.dragDelta = e.deltaY;
						skLib.lightbox.data.dragMax = $("#" + skLib.lightbox.data.currentSlideId).outerHeight() * .5;
					}
					skLib.lightbox.data.preventClickPastToClose = true;
					$("#skLib_lightbox_dragGuard").show();
				},
				drag: function (e)
				{
					if (skLib.lightbox.data.dragIsSideways)
					{
						// Prev/Next
						skLib.lightbox.data.dragDelta += e.deltaX;
						var deltaX = skLib.lightbox.data.dragDelta;
						var dragExtreme = skLib.lightbox.data.dragExtreme;
						if (deltaX < 0)
						{
							if (dragExtreme > deltaX) dragExtreme = deltaX;
						}
						else if (deltaX > 0)
						{
							if (dragExtreme < deltaX) dragExtreme = deltaX;
						}

						var cancelEvent = true;

						$("#" + skLib.lightbox.data.currentSlideId).css({ left: skLib.lightbox.render.easeDragX(deltaX, skLib.lightbox.data.dragMax) + "px" });
						if (deltaX < -20)
						{
							if (deltaX <= dragExtreme + 20)
							{
								$("#skLib_lightbox_dragIndicator_prev").removeClass("skLib-lightbox-visible");
								$("#skLib_lightbox_dragIndicator_next").addClass("skLib-lightbox-visible");
								skLib.lightbox.data.dragCommand = "next";
								cancelEvent = false;
							}
							else if (e.deltaX > 0) dragExtreme = deltaX - 40;
						}
						else if (deltaX > 20)
						{
							if (deltaX >= dragExtreme - 20)
							{
								$("#skLib_lightbox_dragIndicator_prev").addClass("skLib-lightbox-visible");
								$("#skLib_lightbox_dragIndicator_next").removeClass("skLib-lightbox-visible");
								skLib.lightbox.data.dragCommand = "prev";
								cancelEvent = false;
							}
							else if (e.deltaX < 0) dragExtreme = deltaX + 40;
						}
						skLib.lightbox.data.dragExtreme = dragExtreme;
						if (cancelEvent)
						{
							$("#skLib_lightbox_dragIndicator_prev").removeClass("skLib-lightbox-visible");
							$("#skLib_lightbox_dragIndicator_next").removeClass("skLib-lightbox-visible");
							skLib.lightbox.data.dragCommand = null;
						}
					}
					else
					{
						// Close
						skLib.lightbox.data.dragDelta += e.deltaY;
						var deltaY = skLib.lightbox.data.dragDelta;
						var dragExtreme = skLib.lightbox.data.dragExtreme;
						if (deltaY > 0)
						{
							if (dragExtreme < deltaY) dragExtreme = deltaY;
						}

						var cancelEvent = true;

						$("#" + skLib.lightbox.data.currentSlideId).css({ top: skLib.lightbox.render.easeDragX(deltaY, skLib.lightbox.data.dragMax) + "px" });
						if (deltaY > 20)
						{
							if (deltaY >= dragExtreme - 20)
							{
								$("#skLib_lightbox_dragIndicator_close").addClass("skLib-lightbox-visible");
								skLib.lightbox.data.dragCommand = "close";
								cancelEvent = false;
							}
							else if (e.deltaY < 0) dragExtreme = deltaY + 40;
						}
						skLib.lightbox.data.dragExtreme = dragExtreme;
						if (cancelEvent)
						{
							$("#skLib_lightbox_dragIndicator_close").removeClass("skLib-lightbox-visible");
							skLib.lightbox.data.dragCommand = null;
						}
					}
				},
				dragEnd: function (e)
				{
					setTimeout("skLib.lightbox.data.preventClickPastToClose = false;", 60);
					skLib.lightbox.render.clear();
					switch (skLib.lightbox.data.dragCommand)
					{
						case "prev":
							{
								if (!skLib.lightbox.data.isRtl)
									skLib.lightbox.prevSlide("linear");
								else
									skLib.lightbox.nextSlide("linear");
								break;
								}
						case "next":
							{
								if (!skLib.lightbox.data.isRtl)
									skLib.lightbox.nextSlide("linear");
								else
									skLib.lightbox.prevSlide("linear");
								break;
							}
						case "close": { skLib.lightbox.close(); break; }
						default:
							{
								$("#" + skLib.lightbox.data.currentSlideId).animate({ left: "0px", top: "0px" }, skLib.lightbox.data.animationSpeed, "swing");
								break;
							}
					}
				},
				easeDragX: function (x, limit)
				{
					return limit * Math.abs(x) / (Math.abs(x) + limit) * ((x > 0) ? 1 : -1);
				},
				clickPastToClose: function()
				{
					if (skLib.lightbox.data.preventClickPastToClose) return;
					skLib.lightbox.close();
				},
				clear: function()
				{
					$("#skLib_lightbox_dragIndicator_prev").removeClass("skLib-lightbox-visible");
					$("#skLib_lightbox_dragIndicator_next").removeClass("skLib-lightbox-visible");
					$("#skLib_lightbox_dragIndicator_close").removeClass("skLib-lightbox-visible");
					$("#skLib_lightbox_dragGuard").hide();
					skLib.lightbox.data.currentContainerId = null;
				}
			},
		scrollLock:
			{
				lock: function ()
				{
					if (skLib.lightbox.scrollLock.isLocked) return;
					var html = "html";
					var root = skLib.lightbox.data.rootSelector;
					skLib.lightbox.scrollLock.lastSettings["scrollX"] = $(window).scrollTop();
					skLib.lightbox.scrollLock.lastSettings["scrollY"] = $(window).scrollLeft();
					skLib.lightbox.scrollLock.lastSettings["overflow"] = $(html).css("overflow");
					skLib.lightbox.scrollLock.lastSettings["overflowX"] = $(html).css("overflow-x");
					skLib.lightbox.scrollLock.lastSettings["overflowY"] = $(html).css("overflow-y");
					skLib.lightbox.scrollLock.lastSettings["rootPosition"] = $(root).css("position");
					skLib.lightbox.scrollLock.lastSettings["rootOverflow"] = $(root).css("overflow");
					skLib.lightbox.scrollLock.lastSettings["rootTop"] = $(root).css("top");
					skLib.lightbox.scrollLock.lastSettings["rootBottom"] = $(root).css("bottom");
					skLib.lightbox.scrollLock.lastSettings["rootLeft"] = $(root).css("left");
					skLib.lightbox.scrollLock.lastSettings["rootRight"] = $(root).css("right");
					$(root).css({ position: "absolute", top: 0, bottom: 0, left: 0, right: 0, overflow: "hidden" }).scrollTop(skLib.lightbox.scrollLock.lastSettings["scrollX"]).scrollLeft(skLib.lightbox.scrollLock.lastSettings["scrollY"]);
					skLib.lightbox.scrollLock.isLocked = true;
				},
				release: function ()
				{
					if (!skLib.lightbox.scrollLock.isLocked) return;
					var html = "html";
					var root = skLib.lightbox.data.rootSelector;
					$(root).css({
						position: skLib.lightbox.scrollLock.lastSettings["rootPosition"],
						top: skLib.lightbox.scrollLock.lastSettings["rootPosition"],
						bottom: skLib.lightbox.scrollLock.lastSettings["rootBottom"],
						left: skLib.lightbox.scrollLock.lastSettings["rootLeft"],
						right: skLib.lightbox.scrollLock.lastSettings["rootRight"],
						overflow: skLib.lightbox.scrollLock.lastSettings["rootOverflow"]
					});
					$(html).css({ overflow: skLib.lightbox.scrollLock.lastSettings["overflow"], "overflow-x": skLib.lightbox.scrollLock.lastSettings["overflowX"], "overflow-y": skLib.lightbox.scrollLock.lastSettings["overflowY"] });
					$(window).scrollTop(skLib.lightbox.scrollLock.lastSettings["scrollX"]);
					$(window).scrollLeft(skLib.lightbox.scrollLock.lastSettings["scrollY"]);
					skLib.lightbox.scrollLock.isLocked = false;
				},
				lastSettings: new Object(),
				isLocked: false
			}
	};
