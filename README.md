Flickity Slider for Elementor
=============================
Author: James Dunn
Site: http://jamesdunnfreelance.co.uk

This slider has a heading (named title), an Image which is a background image, a WYSIWYG editor for the text blurb and a section for 1 button.

Implemented slider settings are:
- Draggable
- Free Scroll
- Wrap Around
- Group Cells - with number only (no percentage)
- Auto Play - with milliseconds option
- Pause Auto Play On Hover
- Adaptive Height
- Watch CSS
- Drag Threshold
- Selected Attraction
- Friction
- Cell Selector
- Initial Index - number only
- Accessibility
- Set Gallery Size
- Resize
- Cell Align
- Contain
- Percent Position
- Right To Left
- Prev Next Buttons
- Page Dots
- Arrow Shape

If you need to amend the slider (perhaps you have slightly different requirements for your slider), you can edit the rendered part by going to widgets/class-flickity-slider.php and 
updating the render function. To add other controls, update the function _register_controls. The content_template function is for the internal side of elementor (the editor) which is why it's similar to the render function. You may need to update that side to reflect the changes in the front end. Be aware that if you use the <# #> notation, it is based on Underscore JS (https://underscorejs.org/), alternatively you can just use php instead.

There is a css file and a javascript file in the assets folder if you need further modifications.

# Demos
See here for demos: https://jamesdunnfreelance.co.uk/elementor-flickity-slider-widget/

# Installation
Copy the elementor-flickity-slider folder into your WordPress plugins directory and click "Activate" within the WP-Admin.

# Warning
As this is for elementor, be aware that elementor containers may crop the image and you'll have to adjust those.

For now this needs to have allow_url_open set in the PHP INI settings so that wp_getimagesize() can be used.