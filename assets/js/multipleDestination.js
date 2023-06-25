const addDestinationButton = document.getElementById("more-destination-button");
const moreDestinationSelect2 = document.getElementById(
  "more-destination-select"
);

addDestinationButton.addEventListener("click", () => {
  moreDestinationSelect2.style.display =
    moreDestinationSelect2.style.display === "none" ? "flex" : "none";
});
