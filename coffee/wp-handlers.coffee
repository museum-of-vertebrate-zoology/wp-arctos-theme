# File for wordpress-specific coffeescript wrappers 

mobileMenu = ->
  ###
  # Hide certain items on the mobile menu list
  ###
  allowedIds = [
    "menu-item-1760"
    "menu-item-1764"
    "menu-item-1824"
    ]
  $("paper-tabs.menu paper-tab").each ->
    unless $(this).attr("id") in allowedIds
      $(this).addClass "hidden-xs hidden-sm"

wpReplacements = ->
  # Replace certain WP elements that are autogenerated with proper
  # ones here
  i = 0
  mobileMenu()
  $("#primary-navigation paper-tab").each ->
    href = $(this).attr("data-url")
    if href is window.location.href or $(this).hasClass("current-menu-ancestor")
      parent = $(this).parents("paper-tabs").get(0)
      parent.setAttribute("selected",i)
      console.log("Selected element #{i}")
      return false
    else
      i++
  formatScientificNames()
  linkSubmenu()
  false

linkSubmenu = ->
  # Placeholder, as yet unused, function.
  false

lightboxImages = (selector = "#content a") ->
  options =
      onStart: ->
        overlayOn()
      onEnd: ->
        overlayOff()
        activityIndicatorOff()
      onLoadStart: ->
        activityIndicatorOn()
      onLoadEnd: ->
        activityIndicatorOff()
      allowedTypes: 'png|jpg|jpeg|gif'
  ###
  $(selector).has("img").each ->
    if not $(this).attr("nolightbox")?
      $(this).imageLightbox(options)
  ###
  # Until these narrower selectors work, let's use this
  $(selector).imageLightbox(options)

activityIndicatorOn = ->
  $('<div id="imagelightbox-loading"><div></div></div>' ).appendTo('body')
activityIndicatorOff = ->
  $('#imagelightbox-loading').remove()
overlayOn = ->
  $('<div id="imagelightbox-overlay"></div>').appendTo('body')
overlayOff = ->
  $('#imagelightbox-overlay').remove()

formatScientificNames = (selector = ".sciname") ->
    $(".sciname").each ->
      # Is it italic?
      nameStyle = if $(this).css("font-style") is "italic" then "normal" else "italic"
      $(this).css("font-style",nameStyle)

linkoutLabels = ->
  # Add a linkout icon to all anchors that point to a different domain
  $("a").each ->
    href = $(this).attr("href")
    
  false


$ ->
  wpReplacements()
  adminBarHeight = toInt($("#wpadminbar").height())
  $("paper-tabs").sticky({topSpacing:adminBarHeight,getWidthFrom:"header"})
  # Local searching
  $("#searchsubmit").click ->
    $("#sidebar-search-form").submit()
  $("#s").keyup (e) ->
    code = e.keyCode || e.which
    if code is 13 then $("#sidebar-search-form").submit()
  $("#sidebar-search-form").submit (e) ->
    e.preventDefault()
    url = $("#sidebar-search-form").attr("action")
    searchQuery = encodeURIComponent($("#s").val())
    url = "#{url}?s=#{searchQuery}"
    goTo(url)
  # Arctos Searching
  $("#searchsubmit-arctos").click ->
    $("#arctos-search-form").submit()
  $("#arctos-search").keyup (e) ->
    code = e.keyCode || e.which
    if code is 13 then $("#arctos-search-form").submit()
  $("#arctos-search-form").submit (e) ->
    e.preventDefault()
    url = $("#arctos-search-form").attr("action")
    searchQuery = encodeURIComponent($("#arctos-search").val())
    url = "#{url}?scientific_name=#{searchQuery}"
    openLink(url)
  lightboxImages()
