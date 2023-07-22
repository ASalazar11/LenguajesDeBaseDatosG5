$(document).ready(function() {
    $('.favorite-btn').click(function() {
      var favoriteBtn = $(this);
      if (favoriteBtn.hasClass('favorite')) {
        // El botón ya está marcado como favorito, hay que quitar la marca
        favoriteBtn.removeClass('favorite');
        favoriteBtn.find('.fas.fa-heart').removeClass('fas').addClass('far');
      } else {
        // El botón no está marcado como favorito, hay que agregar la marca
        favoriteBtn.addClass('favorite');
        favoriteBtn.find('.far.fa-heart').removeClass('far').addClass('fas');
      }
    });
  });