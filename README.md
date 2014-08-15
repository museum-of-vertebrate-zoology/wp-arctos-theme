wp-arctos-theme
===============

Theme for arctosdb.org and WordPress 3.9.0 +

Refer to http://codex.wordpress.org/Theme_Development for theme parameters.

The test status can be seen on http://velociraptorsystems.com/samples/mvz_tests/arctosdb/ , running the dev branch of WordPress.

**Important Note**: Before final release, the `b` in the `build` and `wjm` tasks in `Cakefile` should be removed.

## ImageLightbox

Images will be lightboxed using the [Github / Bower fork](https://github.com/victorhaggqvist/touch-imagelightbox) of [ImageLightbox](http://osvaldas.info/image-lightbox-responsive-touch-friendly). Until a [jQuery selector issue is resolved](https://github.com/victorhaggqvist/touch-imagelightbox/issues/1), it applies to all linked images (eg, `<a href='large_image.jpg'><img src='small_img.jpg'/></a>`).

Once the issue is resolved, the attribute `nolightbox` will prevent the lightbox from appearing.

## Picturefill

Check the documentation on https://scottjehl.github.io/picturefill/ for how to responsively fill images.

## YUICompressor

The file `yuicompressor.jar` is from the [YUICompressor project](https://github.com/yui/yuicompressor), with the same BSD license.
