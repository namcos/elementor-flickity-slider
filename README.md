Flickity Slider for Elementor
=============================

This slider has a heading (named title), an Image which is a background image, a WYSIWYG editor for the text blub and a section for buttons.

Implemented slider settings are:
- Draggable
- Free Scroll
- Wrap Around
- Group Cells - with number only (no percentage)
- Auto Play - with milliseconds option
- Pause Auto Play On Hover
- Full Screen
- Fade
- Adaptive Height
- Watch CSS
- Drag Threshold
- Selected Attraction
- Friction
- Cell Align

If you need to amend the slider (perhaps you have slightly different requirements for your slider, you can edit the rendered part by going to widgets/class-flickity-slider.php and 
updating the render function. To add other controls, update the function _register_controls. The content_template function is for the internal side of elementor (the editor) which is why it's similar to the render function. You may need to update that side to, to reflect the changes in the front end. Be aware that if you use the <# #> notation, it is based on Underscore JS (https://underscorejs.org/). You can just use php instead.

# Warning
As this is for elementor, be aware that elementor containers may crop the image and you'll have to adjust those.
