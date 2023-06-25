function searchToObject() {
  var pairs = window.location.search.substring(1).split("&"),
    obj = {},
    pair,
    i;

  for (i in pairs) {
    if (pairs[i] === "") continue;

    pair = pairs[i].split("=");
    obj[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
  }

  return obj;
}

var google;

async function init() {
  const response = await fetch('https://aco-final-project.herokuapp.com/check-aco', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      "current_location_id": 1,
      "current_location_name": "Politeknik Elektronika Negeri Surabaya",
      "current_location_lat": -7.27584,
      "current_location_lng": 112.79118,
      "next_destination_id": 14,
      "next_destination_name": "Pasar Turi",
      "next_destination_lat": -7.246,
      "next_destination_lng": 112.732,
      "add_destination_id": 2,
      "add_destination_name": "Ekowisata Mangrove",
      "add_destination_lat": -7.3086311362422505,
      "add_destination_lng": 112.82170935994978
    })
  });

  // if (!response.ok) {
  //   // Handle error if API request fails
  //   console.error('Error:', response.status);
  //   return;
  // }

  let currentLocation = {
    lat: 0,
    lng: 0,
  };

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition((position) => {
      currentLocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,
      };
    });
  }

  // Basic options for a simple Google Map
  // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
  // var myLatlng = new google.maps.LatLng(40.71751, -73.990922);
  let myLatlng = new google.maps.LatLng(-7.275614, 112.6424721);
  // 39.399872
  // -8.224454

  let mapOptions = {
    // How zoomed in you want the map to start at (always required)
    zoom: 12,

    // The latitude and longitude to center the map (always required)
    center: myLatlng,

    // How you would like to style the map.
    scrollwheel: false,
    styles: [
      {
        featureType: "administrative.country",
        elementType: "geometry",
        stylers: [
          {
            visibility: "simplified",
          },
          {
            hue: "#ff0000",
          },
        ],
      },
    ],
  };

  const options = {
    componentRestrictions: { country: "id" },
    fields: ["address_components", "geometry", "icon", "name"],
    types: ["establishment"],
    strictBounds: false,
  };

  const input = document.getElementById("input-place");

  const autocomplete = new google.maps.places.Autocomplete(input, options);

  // Get the HTML DOM element that will contain your map
  // We are using a div with id="map" seen below in the <body>
  let mapElement = document.getElementById("map");

  // Create the Google Map using out element and options defined above
  const map = new google.maps.Map(mapElement, mapOptions);
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer();
  const distanceMatrix = new google.maps.DistanceMatrixService();
  const trafficLayer = new google.maps.TrafficLayer();
  // const googleMap = new google.maps.googleMap();

  trafficLayer.setMap(map);
  directionsRenderer.setMap(map);
  // googleMap.setMap(map);

  // const marker = new google.maps.Marker({ map });
  // const response = await fetch("/ProyekAkhir-ACO/get_wisata.php");

  const data = await response.json();
  // // console.log(result);

  // for (let w of result) {
  //   const infowindow = new google.maps.InfoWindow({
  //     content: `<span>${w.nama_wisata}</span>`,
  //   });

    const marker = new google.maps.Marker({
      position: { lat: Number(data.lat), lng: Number(data.lng) },
      map,
      title: w.nama_wisata ?? "Hello World!",
    });

    marker.addListener("mouseover", function () {
      infowindow.open(map, this);
    });

    marker.addListener("mouseout", function () {
      infowindow.close();
    });

    google.maps.event.addListener(marker, "click", function () {
      navigator.geolocation.getCurrentPosition((position) => {
        createDirection(
          { lat: Number(data.lat), lng: Number(data.lng) },
          {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          }
        );
      });
    });
  }
  
  async function createDirection(destination, origin, destination2 = null) {
    const request =
      destination2 !== null
        ? {
            origin: origin,
            destination: destination2,
            waypoints: [
              {
                location: destination,
              },
            ],
            travelMode: "DRIVING",
            provideRouteAlternatives: true,
            avoidTolls: true, // avoid toll roads
            avoidHighways: true,
          }
        : {
            origin: origin,
            destination: destination,
            travelMode: "DRIVING",
            provideRouteAlternatives: true, // request alternative routes
            avoidTolls: true, // avoid toll roads
            avoidHighways: true,
          };

    const response = await directionsService.route(request);

    // Display the first route

    directionsRenderer.setDirections(response);
    directionsRenderer.setMap(map);
    directionsRenderer.setOptions({
      polylineOptions: {
        strokeColor: "red",
      },
    });

    console.log(response.routes);

    // Display the alternative routes
    for (let i = 1; i < response.routes.length; i++) {
      const route = response.routes[i];
      new google.maps.Polyline({
        path: route.overview_path,
        strokeColor: "black", // Different color for each route
        strokeOpacity: 0.8,
        strokeWeight: 6,
        map: map,
      });
    }

    for (let leg of response.routes[0].legs) {
      let infowindow = new google.maps.InfoWindow();

      infowindow.setContent(leg.distance.text);

      infowindow.setPosition(
        leg.steps[Math.ceil(leg.steps.length / 2) - 1].start_location
      );

      infowindow.open(map);
    }

    for (let i = 1; i < response.routes.length; i++) {
      for (let leg of response.routes[i].legs) {
        let infowindow = new google.maps.InfoWindow();

        infowindow.setContent(leg.distance.text);

        infowindow.setPosition(
          leg.steps[Math.ceil(leg.steps.length / 2) - 1].start_location
        );

        infowindow.open(map);
      }
    }
  }

  autocomplete.addListener("place_changed", async () => {
    const place = autocomplete.getPlace();

    if (!place.geometry || !place.geometry.location) {
      // User entered the name of a Place that was not suggested and
      // pressed the Enter key, or the Place Details request failed.
      window.alert("No details available for input: '" + place.name + "'");
      return;
    }

    let destination = {
      lat: place.geometry.location.lat(),
      lng: place.geometry.location.lng(),
    };

    console.log(destination);

    createDirection(destination, currentLocation);
  });

  const search = searchToObject();

  // create direction with current location;
  if (search.lat && search.lng) {
    navigator.geolocation.getCurrentPosition((position) => {
      createDirection(
        {
          lat: parseFloat(search.lat),
          lng: parseFloat(search.lng),
        },
        { lat: position.coords.latitude, lng: position.coords.longitude }
      );
    });
    return
  }

  console.log(search)
  // create direction with origin & destinations
  if (search.origin && search.destination && search.destination2) {
    const origin = {
      lat: Number(search.origin.split(",")[0]),
      lng: Number(search.origin.split(",")[1]),
    };

    const destination = {
      lat: Number(search.destination.split(",")[0]),
      lng: Number(search.destination.split(",")[1]),
    };

    const destination2 = {
      lat: Number(search.destination2.split(",")[0]),
      lng: Number(search.destination2.split(",")[1]),
    };

    createDirection(destination, origin, destination2);
    return
  }


  // create direction with origin & destination
  if (search.origin && search.destination) {
    const origin = {
      lat: Number(search.origin.split(",")[0]),
      lng: Number(search.origin.split(",")[1]),
    };

    const destination = {
      lat: Number(search.destination.split(",")[0]),
      lng: Number(search.destination.split(",")[1]),
    };

    createDirection(destination, origin);
    return
  }
// }

const ruteDestination = document.getElementById("rute-destination");
const ruteForm = document.getElementById("rute-form");

ruteForm.addEventListener("submit", (e) => {
  e.preventDefault();

  const destination = ruteDestination.value;

  if (destination === "") {
    return;
  }

  const lat = destination.split(",")[0];
  const lng = destination.split(",")[1];

  window.location.href = `rute.php?lat=${lat}&lng=${lng}`;
});

google.maps.event.addDomListener(window, "load", init);
