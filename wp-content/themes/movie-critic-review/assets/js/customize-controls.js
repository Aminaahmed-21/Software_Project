( function( api ) {

	// Extends our custom "movie-critic-review" section.
	api.sectionConstructor['movie-critic-review'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );