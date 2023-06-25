let origin;

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition((position) => {
    let currentLocation = {
      lat: position.coords.latitude,
      lng: position.coords.longitude,
    };
  });
}

async function init() {
  const options = {
    componentRestrictions: { country: "id" },
    fields: ["address_components", "geometry", "icon", "name"],
    types: ["establishment"],
    strictBounds: false,
  };

  const input = document.getElementById("input-place");

  const autocomplete = new google.maps.places.Autocomplete(input, options);

  autocomplete.addListener("place_changed", async () => {
    const place = autocomplete.getPlace();

    if (!place.geometry || !place.geometry.location) {
      // User entered the name of a Place that was not suggested and
      // pressed the Enter key, or the Place Details request failed.
      window.alert("No details available for input: '" + place.name + "'");
      return;
    }

    origin = {
      lat: place.geometry.location.lat(),
      lng: place.geometry.location.lng(),
    };
  });
}

const ruteForm = document.getElementById("rute-form");
const ruteSubmit = document.getElementById("rute-submit");
const rutedestinationSelect = document.getElementById("rute-destination");

ruteForm.addEventListener("submit", (e) => {
  e.preventDefault();

  const form = e.target;
  const formData = new FormData(form);
  const formProps = Object.fromEntries(formData);

  const destinationString = formProps["rute-destination"];
  const originString = `${origin.lat},${origin.lng}`;

  window.location.href = `rute.php?origin=${originString}&destination=${destinationString}`;
});


init();
