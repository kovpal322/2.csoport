// Függvény a háttérkép frissítéséhez
function updateBackground() {
  $.ajax({
    url:'get_random_background.php',
    type: 'GET',
    success: function(data) {
      data = JSON.parse(data);
      
      // Az oldal teljes háttérképét változtatjuk meg
      $('body').css('background-image', 'url(' + data.image_path + ')');
    },
    error: function(error) {
      console.log('Hiba a háttérkép frissítésekor:', error);
    }
  });
}
// Függvény az anime adatainak frissítéséhez
function updateAnime() {
  $.ajax({
    url: 'get_random_anime.php',
    type: 'GET',
    success: function(data) {
      data = JSON.parse(data); // Az adatokat JSON formátumból JavaScript objektummá alakítjuk
      $('#animeTitle').text(data.title);
      $('#animeCategory').text(data.category_name);
      $('#animeDescription').text(data.description);
    },
    error: function(error) {
      console.log('Hiba az anime frissítésekor:', error);
    }
  });
}

// Háttérkép és anime frissítése 5 másodpercenként
setInterval(function() {
  updateBackground();
  updateAnime();
}, 5000);

