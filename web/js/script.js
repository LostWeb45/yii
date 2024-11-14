function sendBasket(id) {
  $.ajax({
    url: "../basket/add?id=" + id,
  });
}
