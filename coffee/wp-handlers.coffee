wpReplacements = ->
  # Replace certain WP elements that are autogenerated with proper
  # ones here
  paperHTML = "<paper-tabs id='menu-main' noink>"
  i = 0
  here = 0
  $("#menu-main li a").each ->
    href = $(this).attr("href")
    name = $(this).text()
    className = $(this).parent().attr("class")
    id = $(this).parent().attr('id')
    paperHTML += "<paper-tab class='#{className}' id='#{id}' onclick=\"openLink('#{href}')\">#{name}</paper-tab>"
    if href is window.location.href then here = i
    i++
    if i is $("#menu-main li").length
      paperHTML += "</paper-tabs>"
      $("#primary-navigation").html(paperHTML)
      document.querySelector("#menu-main").setAttribute("selected",here)
      console.log("Selected element #{here}")

$ ->
  wpReplacements()
