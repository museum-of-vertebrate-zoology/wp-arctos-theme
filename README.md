wp-arctos-theme
===============

Theme for arctosdb.org and WordPress 3.9.0 +

Refer to http://codex.wordpress.org/Theme_Development for theme parameters.

The test status can be seen on http://velociraptorsystems.com/samples/mvz_tests/arctosdb/ , running the dev branch of WordPress.

## Building

Run `grunt build` from the top level directory to prepare everything. The Gruntfile has a few more details.

**Important Note**: Before final release, the `b` in the `build` and `wjm` tasks in `Cakefile` should be removed, and `bare` removed from `Gruntfile.coffee`.

For easy upgrades, I reccommend installing [this Wordpress plugin](https://wordpress.org/plugins/easy-theme-and-plugin-upgrades/)

## Homepage Carousel

Edit the file `homepage-carousel-data.json` in the template directory to update the carousel. The code will take care of the rest!

## Shortcut Classes

These are generally going to be better to use than manually attempting these effects.

- Adding the class `newwindow` to a link will have it open in a new window.
- Adding the class `sciname` to any text (eg, `<span class='sciname'>Crotalus cerastes</span>`) will correctly format it; make it italic when in a block of normal text, and de-italicize when in a block of italic text.



## ImageLightbox

Images will be lightboxed using the [Github / Bower fork](https://github.com/victorhaggqvist/touch-imagelightbox) of [ImageLightbox](http://osvaldas.info/image-lightbox-responsive-touch-friendly). Until a [jQuery selector issue is resolved](https://github.com/victorhaggqvist/touch-imagelightbox/issues/1), it applies to all linked images (eg, `<a href='large_image.jpg'><img src='small_img.jpg'/></a>`).

Once the issue is resolved, the attribute `nolightbox` will prevent the lightbox from appearing.

## Picturefill

Check the documentation on https://scottjehl.github.io/picturefill/ for how to responsively fill images.
