const items = document.getElementsByClassName("item-informasi");

for (let i in items) {
  console.log(i % 2);
  if (i % 2 === 1) {
    items[i]
      .querySelector(".image")
      .setAttribute("class", "col-md-6 order-md-6");
  }
}
