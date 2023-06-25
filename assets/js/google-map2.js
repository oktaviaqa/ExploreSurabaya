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

const formInput = document.getElementById("form-input");
const buttonSubmit = document.getElementById("button-submit");
const ruteSubmit = document.getElementById("rute-submit");
const destinationSelect = document.getElementById("destination");
const moreDestinationSelect = document.getElementById("destination2");

formInput.addEventListener("submit", (e) => {
  e.preventDefault();

  const form = e.target;
  const formData = new FormData(form);
  const formProps = Object.fromEntries(formData);

  const destinationString = formProps["destination"];
  const originString = `${origin.lat},${origin.lng}`;
  console.log(destinationString)

  // window.location.href = `rute.php?origin=${originString}&destination=${destinationString}`;
});

buttonSubmit.addEventListener("click", () => {
  if (!origin)
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition((position) => {
        origin = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };

        const originString = `${origin.lat},${origin.lng}`;
        const destination = destinationSelect.value;
        const destination2 = moreDestinationSelect.value;

        if (destination === "") return alert("Tujuan anda wajib diisi");

        if (destination2 === "") {
          window.location.href = `rute.php?origin=${originString}&destination=${destination}`;
          return;
        }

        window.location.href = `rute.php?origin=${originString}&destination=${destination}&destination2=${destination2}`;
      });

      return;
    }

  const originString = `${origin.lat},${origin.lng}`;
  const destination = destinationSelect.value;
  const destination2 = moreDestinationSelect.value;

  if (destination === "") return alert("Tujuan anda wajib diisi");

  if (destination2 === "") {
    window.location.href = `rute.php?origin=${originString}&destination=${destination}`;
    return;
  }

  window.location.href = `rute.php?origin=${originString}&destination=${destination}&destination2=${destination2}`;
});

init();
