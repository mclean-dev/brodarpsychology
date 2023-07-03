(function(api) {

    api.sectionConstructor['ascendoor-coach-upsell'] = api.Section.extend({

        // Remove events for this section.
        attachEvents: function() {},

        // Ensure this section is active. Normally, sections without contents aren't visible.
        isContextuallyActive: function() {
            return true;
        }
        
    });

    const ascendoor_coach_section_lists = ['banner','service','about','associate','testimonial','blog','gallery','cta'];
    ascendoor_coach_section_lists.forEach(ascendoor_coach_homepage_scroll);

    function ascendoor_coach_homepage_scroll(item, index) {
        // Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
        item = item.replace(/-/g, '_');
        wp.customize.section('ascendoor_coach_' + item + '_section', function(section) {
            section.expanded.bind(function(isExpanding) {
                // Value of isExpanding will = true if you're entering the section, false if you're leaving it.
                wp.customize.previewer.send(item, { expanded: isExpanding });
            });
        });
    }
})(wp.customize);