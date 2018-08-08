
/*
 * Mapas Culturais geocoder
 *
 * Example:
 *
 * MapasCulturais.geocoder.geocode({
 *      streetName: streetName,
 *      number: number,
 *      neighborhood: neighborhood,
 *      city: city,
 *  }, geocode_callback);
 *
 */
MapasCulturais.geocoder = {

    geocoder: null,

    initialize: function() {
        // activate google service
        if(typeof google !== 'undefined')
            this.geocoder = new google.maps.Geocoder();
    },
    geocode: function(addressElements, callback) {

        this.initialize();

        var address = false;

        if (!address) {
            address = addressElements.streetName + (addressElements.number ? ', ' + addressElements.number : '');

            if (addressElements.city)
                address += ', ' + addressElements.city;
        }

        this.geocoder.geocode({'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var location = results[0].geometry.location;
                var response = { lat: location.lat(), lon: location.lng() };
            } else {
                var response = false;
            }

            callback(response);
        });
    }
}

