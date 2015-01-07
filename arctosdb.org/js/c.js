var activityIndicatorOff, activityIndicatorOn, animateLoad, byteCount, delay, formatScientificNames, goTo, isBlank, isBool, isEmpty, isJson, isNull, isNumber, lightboxImages, linkSubmenu, linkoutLabels, mapNewWindows, openLink, openTab, overlayOff, overlayOn, root, roundNumber, stopLoad, stopLoadError, toFloat, toInt, toastStatusMessage, wpReplacements,
  __slice = [].slice;

root = typeof exports !== "undefined" && exports !== null ? exports : this;

isBool = function(str) {
  return str === true || str === false;
};

isEmpty = function(str) {
  return !str || str.length === 0;
};

isBlank = function(str) {
  return !str || /^\s*$/.test(str);
};

isNull = function(str) {
  try {
    if (isEmpty(str) || isBlank(str) || (str == null)) {
      if (!(str === false || str === 0)) {
        return true;
      }
    }
  } catch (_error) {

  }
  return false;
};

isJson = function(str) {
  if (typeof str === 'object') {
    return true;
  }
  try {
    JSON.parse(str);
    return true;
  } catch (_error) {

  }
  return false;
};

isNumber = function(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
};

toFloat = function(str) {
  if (!isNumber(str) || isNull(str)) {
    return 0;
  }
  return parseFloat(str);
};

toInt = function(str) {
  if (!isNumber(str) || isNull(str)) {
    return 0;
  }
  return parseInt(str);
};

function toObject(arr) {
    var rv = {};
    for (var i = 0; i < arr.length; ++i)
        if (arr[i] !== undefined) rv[i] = arr[i];
    return rv;
};

String.prototype.toBool = function() {
  return this.toString() === 'true';
};

Boolean.prototype.toBool = function() {
  return this.toString() === 'true';
};

Object.size = function(obj) {
  var key, size;
  size = 0;
  for (key in obj) {
    if (obj.hasOwnProperty(key)) {
      size++;
    }
  }
  return size;
};

delay = function(ms, f) {
  return setTimeout(f, ms);
};

roundNumber = function(number, digits) {
  var multiple;
  if (digits == null) {
    digits = 0;
  }
  multiple = Math.pow(10, digits);
  return Math.round(number * multiple) / multiple;
};

jQuery.fn.exists = function() {
  return jQuery(this).length > 0;
};

byteCount = (function(_this) {
  return function(s) {
    return encodeURI(s).split(/%..|./).length - 1;
  };
})(this);

function shuffle(o) { //v1.0
    for (var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
};

window.debounce_timer = null;

({
  debounce: function(func, threshold, execAsap) {
    if (threshold == null) {
      threshold = 300;
    }
    if (execAsap == null) {
      execAsap = false;
    }
    return function() {
      var args, delayed, obj;
      args = 1 <= arguments.length ? __slice.call(arguments, 0) : [];
      obj = this;
      delayed = function() {
        if (!execAsap) {
          return func.apply(obj, args);
        }
      };
      if (window.debounce_timer != null) {
        clearTimeout(window.debounce_timer);
      } else if (execAsap) {
        func.apply(obj, args);
      }
      return window.debounce_timer = setTimeout(delayed, threshold);
    };
  }
});

Function.prototype.debounce = function() {
  var args, delayed, e, execAsap, func, threshold, timeout;
  threshold = arguments[0], execAsap = arguments[1], timeout = arguments[2], args = 4 <= arguments.length ? __slice.call(arguments, 3) : [];
  if (threshold == null) {
    threshold = 300;
  }
  if (execAsap == null) {
    execAsap = false;
  }
  if (timeout == null) {
    timeout = window.debounce_timer;
  }
  func = this;
  delayed = function() {
    if (!execAsap) {
      func.apply(func, args);
    }
    return console.log("Debounce applied");
  };
  if (timeout != null) {
    try {
      clearTimeout(timeout);
    } catch (_error) {
      e = _error;
    }
  } else if (execAsap) {
    func.apply(obj, args);
    console.log("Executed immediately");
  }
  return window.debounce_timer = setTimeout(delayed, threshold);
};

mapNewWindows = function() {
  return $(".newwindow").each(function() {
    var curHref, openInNewWindow;
    curHref = $(this).attr("href");
    openInNewWindow = function(url) {
      if (url == null) {
        return false;
      }
      window.open(url);
      return false;
    };
    $(this).click(function() {
      return openInNewWindow(curHref);
    });
    return $(this).keypress(function() {
      return openInNewWindow(curHref);
    });
  });
};

toastStatusMessage = function(message, className, duration, selector) {
  var html;
  if (className == null) {
    className = "error";
  }
  if (duration == null) {
    duration = 3000;
  }
  if (selector == null) {
    selector = "#status-message";
  }
  if (!isNumber(duration)) {
    duration = 3000;
  }
  if (selector.slice(0, 1) === !"#") {
    selector = "#" + selector;
  }
  if (!$(selector).exists()) {
    html = "<paper-toast id=\"" + (selector.slice(1)) + "\" duration=\"" + duration + "\"></paper-toast>";
    $(html).appendTo("body");
  }
  $(selector).attr("text", message);
  $(selector).addClass(className);
  $(selector)[0].show();
  return delay(duration + 500, function() {
    $(selector).empty();
    $(selector).removeClass(className);
    return $(selector).attr("text", "");
  });
};

animateLoad = function(d, elId) {
  var big, e, html, inlineId, offset, offset2, sm_d, small;
  if (d == null) {
    d = 50;
  }
  if (elId == null) {
    elId = "#status-container";
  }
  if (elId.slice(0, 1) !== "#") {
    elId = "#" + elId;
  }
  try {
    if (!$(elId).exists()) {
      inlineId = elId.slice(1);
      html = "<div id='status-container'> <div class='ball stop hide'></div><div class='ball1 stop hide'></div> <br/><p id='status-message'></p> </div>";
      $(html).appendTo("body");
    }
    if ($(elId).exists()) {
      sm_d = roundNumber(d * .5);
      big = $(elId).find('.ball');
      small = $(elId).find('.ball1');
      big.removeClass('stop hide');
      big.css({
        width: "" + d + "px",
        height: "" + d + "px"
      });
      offset = roundNumber(d / 2 + sm_d / 2 + 9);
      offset2 = roundNumber((d + 10) / 2 - (sm_d + 6) / 2);
      small.removeClass('stop hide');
      small.css({
        width: "" + sm_d + "px",
        height: "" + sm_d + "px",
        top: "-" + offset + "px",
        'margin-left': "" + offset2 + "px"
      });
      return true;
    }
    return false;
  } catch (_error) {
    e = _error;
    return console.error('Could not animate loader', e.message);
  }
};

stopLoad = function(elId, fadeOut) {
  var big, e, small;
  if (elId == null) {
    elId = "#status-container";
  }
  if (fadeOut == null) {
    fadeOut = 500;
  }
  if (elId.slice(0, 1) !== "#") {
    elId = "#" + elId;
  }
  try {
    if ($(elId).exists()) {
      big = $(elId).find('.ball');
      small = $(elId).find('.ball1');
      big.addClass('bballgood ballgood');
      small.addClass('bballgood ball1good');
      return delay(fadeOut, function() {
        big.addClass('stop hide');
        big.removeClass('bballgood ballgood');
        small.addClass('stop hide');
        return small.removeClass('bballgood ball1good');
      });
    }
  } catch (_error) {
    e = _error;
    return console.error('Could not stop load animation', e.message);
  }
};

stopLoadError = function(message, elId, fadeOut) {
  var big, e, small;
  if (elId == null) {
    elId = "#status-container";
  }
  if (fadeOut == null) {
    fadeOut = 1500;
  }
  if (elId.slice(0, 1) !== "#") {
    elId = "#" + elId;
  }
  try {
    if ($(elId).exists()) {
      big = $(elId).find('.ball');
      small = $(elId).find('.ball1');
      big.addClass('bballerror ballerror');
      small.addClass('bballerror ball1error');
      delay(fadeOut, function() {
        big.addClass('stop hide');
        big.removeClass('bballerror ballerror');
        small.addClass('stop hide');
        return small.removeClass('bballerror ball1error');
      });
      if (message != null) {
        return toastStatusMessage(message);
      }
    }
  } catch (_error) {
    e = _error;
    return console.error('Could not stop load error animation', e.message);
  }
};

openLink = function(url) {
  if (url == null) {
    return false;
  }
  window.open(url);
  return false;
};

openTab = function(url) {
  return openLink(url);
};

goTo = function(url) {
  if (url == null) {
    return false;
  }
  window.location.href = url;
  return false;
};

$(function() {
  var e;
  try {
    window.picturefill();
  } catch (_error) {
    e = _error;
    console.log("Could not execute picturefill.");
  }
  return mapNewWindows();
});

wpReplacements = function() {
  var i;
  i = 0;
  $("#menu-main paper-tab").each(function() {
    var href;
    href = $(this).attr("data-url");
    if (href === window.location.href || $(this).hasClass("current-menu-ancestor")) {
      document.querySelector("#menu-main").setAttribute("selected", i);
      return console.log("Selected element " + i);
    } else {
      return i++;
    }
  });
  formatScientificNames();
  linkSubmenu();
  return false;
};

linkSubmenu = function() {
  return false;
};

lightboxImages = function(selector) {
  var options;
  if (selector == null) {
    selector = "#content a";
  }
  options = {
    onStart: function() {
      return overlayOn();
    },
    onEnd: function() {
      overlayOff();
      return activityIndicatorOff();
    },
    onLoadStart: function() {
      return activityIndicatorOn();
    },
    onLoadEnd: function() {
      return activityIndicatorOff();
    },
    allowedTypes: 'png|jpg|jpeg|gif'
  };

  /*
  $(selector).has("img").each ->
    if not $(this).attr("nolightbox")?
      $(this).imageLightbox(options)
   */
  return $(selector).imageLightbox(options);
};

activityIndicatorOn = function() {
  return $('<div id="imagelightbox-loading"><div></div></div>').appendTo('body');
};

activityIndicatorOff = function() {
  return $('#imagelightbox-loading').remove();
};

overlayOn = function() {
  return $('<div id="imagelightbox-overlay"></div>').appendTo('body');
};

overlayOff = function() {
  return $('#imagelightbox-overlay').remove();
};

formatScientificNames = function(selector) {
  if (selector == null) {
    selector = ".sciname";
  }
  return $(".sciname").each(function() {
    var nameStyle;
    nameStyle = $(this).css("font-style") === "italic" ? "normal" : "italic";
    return $(this).css("font-style", nameStyle);
  });
};

linkoutLabels = function() {
  $("a").each(function() {
    var href;
    return href = $(this).attr("href");
  });
  return false;
};

$(function() {
  var adminBarHeight;
  wpReplacements();
  adminBarHeight = toInt($("#wpadminbar").height());
  $("paper-tabs").sticky({
    topSpacing: adminBarHeight,
    getWidthFrom: "header"
  });
  $("#searchsubmit").click(function() {
    return $("#sidebar-search-form").submit();
  });
  $("#s").keyup(function(e) {
    var code;
    code = e.keyCode || e.which;
    if (code === 13) {
      return $("#sidebar-search-form").submit();
    }
  });
  $("#sidebar-search-form").submit(function(e) {
    var searchQuery, url;
    e.preventDefault();
    url = $("#sidebar-search-form").attr("action");
    searchQuery = encodeURIComponent($("#s").val());
    url = "" + url + "?s=" + searchQuery;
    return goTo(url);
  });
  $("#searchsubmit-arctos").click(function() {
    return $("#arctos-search-form").submit();
  });
  $("#arctos-search").keyup(function(e) {
    var code;
    code = e.keyCode || e.which;
    if (code === 13) {
      return $("#arctos-search-form").submit();
    }
  });
  $("#arctos-search-form").submit(function(e) {
    var searchQuery, url;
    e.preventDefault();
    url = $("#arctos-search-form").attr("action");
    searchQuery = encodeURIComponent($("#arctos-search").val());
    url = "" + url + "?scientific_name=" + searchQuery;
    return openLink(url);
  });
  return lightboxImages();
});

//# sourceMappingURL=../../coffee/maps/c.js.map
