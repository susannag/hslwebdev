Drupal.behaviors.machslibrary = {
    attach: function (context, settings) {

		(function ($) {

			if (location.hash !== '') {
				var element = $('a[href^="' + location.hash + '"]');

				if( location.hash === element[0].hash ) {
					$('a[href="' + location.hash + '"]')[0].click();
				}
				
			}

			$( 'button.navbar-toggler' ).click( function() {
				$( '#navbar-main' ).toggleClass('collapse');
			});

          $('#tab_selector').bind('change', function (e) {

				var id = '#' + $(this).val();
		        $( '#singlePageTabContent>.tab-pane.active' ).toggleClass( 'active' );
		        $( id ).addClass( 'active show' );
            $('.tab-pane').eq($(this).val()).show();
		    });


			$('#catalogue-search-bar').hide();
			$('#navbar-search').click(function(e) {
				// console.log('show/hide search div');
				$('#catalogue-search-bar').fadeToggle();
			});

			// guides and tutorials filter
			if ($('form#views-exposed-form-guides-tutorials-page-1').length) {
				// on any select option - submit the form
				$('form#views-exposed-form-guides-tutorials-page-1 select').change(function() {
					$('form#views-exposed-form-guides-tutorials-page-1 input#edit-submit-guides-tutorials').click();
				});

			}

			$( '#custom-submit' ).click( function() {
				$('form#views-exposed-form-guides-tutorials-page-1 input#edit-submit-guides-tutorials').click();
			} );

			$( '#edit-combine' ).keyup(function (e) {
			    if (e.keyCode === 13) {
			       $('form#views-exposed-form-guides-tutorials-page-1 input#edit-submit-guides-tutorials').click();
			    }
			  });

			$( '#form-reset' ).click( function( e ) {
				e.preventDefault();
				$('form#views-exposed-form-guides-tutorials-page-1 select').val( 'All' );
				$('form#views-exposed-form-guides-tutorials-page-1 #edit-combine' ).val( '' );
				$('form#views-exposed-form-guides-tutorials-page-1 input#edit-submit-guides-tutorials').click();
			} );	

			// news filter
			if ($('form#views-exposed-form-news-page-1').length) {
				// on any select option - submit the form
				$('form#views-exposed-form-news-page-1 select').change(function() {
					$('form#views-exposed-form-news-page-1 input#edit-submit-news').click();
				});

			}


			// catalogue search submit button
			$('#searchButton').click(function() {
				// $('#library_cat_search').submit();
				searchCatalogue();
			});

			$('#library_cat_search').submit( function(e) {
				e.preventDefault();
				$('#searchButton').click();
			});
		}(jQuery));





function searchCatalogue() {
		var encoreBaseURL, searchInput, scopeInput, searchString, scopeString, locationHref, charRegExString, base64Regex;
       /*base64_encoding_map includes special characters that need to be
        encoded using base64 - these chars are "=","/", "\", "?"
        character : base64 encoded */
        var base64_encoding_map = {"=":"PQ==", "/": "Lw==", "\\":"XA==", "?":"Pw=="};

        var escapeRegExp = function(string) {
            return string.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "\\$1");
        }

		/* select options
		var searchType = document.getElementById("search_target").value;
		if (searchType == 'catalogue') {
			encoreBaseURL = 'https://discovery.mcmaster.ca/iii/encore/search/';
		}
		else if (searchType == 'quick') {
			encoreBaseURL = 'https://discovery.mcmaster.ca/iii/encore/plus/';
		}
		*/

		// radio buttons
		// if (document.getElementById("target_catalogue").checked) {
		// 	encoreBaseURL = 'https://discovery.mcmaster.ca/iii/encore/search/';
		// }
		// else if (document.getElementById("target_quick").checked) {
		// 	encoreBaseURL = 'https://discovery.mcmaster.ca/iii/encore/plus/';
		// }

		encoreBaseURL = 'https://discovery.mcmaster.ca/iii/encore/search/';

		searchInput = document.getElementById("catalogSearch");

        if (searchInput && encoreBaseURL) {
            searchString = searchInput.value;
            for(var specialChar in base64_encoding_map) {
                charRegExString = escapeRegExp(specialChar);
                base64Regex = new RegExp(charRegExString, "g");
                searchString = searchString.replace(base64Regex, base64_encoding_map[specialChar])
            }
            searchString = encodeURIComponent(searchString);

            scopeInput = document.getElementById('encoreSearchLocation');

            if (scopeInput) {
                scopeString = scopeInput.value;
            }

            if (scopeString) {
                scopeString = encodeURIComponent(scopeString);
                locationHref = encoreBaseURL + "C__S" + searchString + scopeString +  "__Orightresult__U";
            } else {
                locationHref = encoreBaseURL + "C__S" + searchString + "__Orightresult__U";
            }

			languageSetting = document.getElementById("encoreLanguage");

			if (languageSetting) {
				locationHref = locationHref + "?lang=" + languageSetting.value;
			}

            window.location.href = locationHref;
        }
        return false;
}






    }
};
