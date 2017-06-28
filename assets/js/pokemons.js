$(document).ready(function () {

  var baseUrl = $.trim($('#base-url').val());
  var listContent = $('.pokemon-list');
  var detailContent = $('.pokemon-detail');
  var modalDetalhes = $('#modal-detalhes');

  // Templates
  var tmpLinhaTabela, tmpDetalhePokemon, tmpListItem;

  $.when(
    $.get(baseUrl + 'templates/linha-tabela.mu', function (template) {
      tmpLinhaTabela = template;
    }),
    $.get(baseUrl + 'templates/detalhe-pokemon.mu', function (template) {
      tmpDetalhePokemon = template;
    }),
    $.get(baseUrl + 'templates/list-item.mu', function (template) {
      tmpListItem = template;
    })
  ).then(function () {
    $('.pokemon-list > tbody').on('click', 'tr', function () {
      $(this).siblings('tr').removeClass('active');
      $(this).addClass('active');
      detailContent.empty();
      $.ajax({
        url: baseUrl + 'Pokeagenda/getPokemonInfo/',
        method: 'GET',
        dataType: 'JSON',
        data: { url: $.trim($(this).data('url')) }
      }).done(function (response) {
        detailContent.empty();
        var elemento = $(Mustache.render(tmpDetalhePokemon, response));
        elemento.data('tipos', response.types);
        elemento.data('habilidades', response.abilities);
        elemento.data('movimentos', response.moves);
        $(elemento).appendTo(detailContent);
      });
    });

    $('.table-content').scrollPagination(function () {
      if (listContent.data('next') !== null) {
        $.ajax({
          url: baseUrl + 'Pokeagenda/getProximo',
          method: 'GET',
          dataType: 'JSON',
          data: { url: $.trim(listContent.data('next')) }
        }).done(function (response) {
          listContent.data('next', response.next);
          $.each(response.results, function () {
            listContent.find('tbody').append(Mustache.render(tmpLinhaTabela, this));
          });
        });
      }
    });
  });

  $('.pokemon-detail').on('click', '.ver-tipos', function (evt) {
    evt.preventDefault();
    var tipos = $(this).closest('.detail').data('tipos');
    var response = [];
    $.each(tipos, function () {
      response.push({nome: this.type.name});
    });
    var itens = Mustache.render(tmpListItem, { itens: response });
    modalDetalhes.find('.list-group').html(itens);
    modalDetalhes.modal('show');
  });

  $('.pokemon-detail').on('click', '.ver-habilidades', function (evt) {
    evt.preventDefault();
    var habilidades = $(this).closest('.detail').data('habilidades');
    var response = [];
    $.each(habilidades, function () {
      response.push({nome: this.ability.name});
    });
    var itens = Mustache.render(tmpListItem, { itens: response });
    modalDetalhes.find('.list-group').html(itens);
    modalDetalhes.modal('show');
  });

  $('.pokemon-detail').on('click', '.ver-movimentos', function (evt) {
    evt.preventDefault();
    var movimentos = $(this).closest('.detail').data('movimentos');
    var response = [];
    $.each(movimentos, function () {
      response.push({nome: this.move.name});
    });
    var itens = Mustache.render(tmpListItem, { itens: response });
    modalDetalhes.find('.list-group').html(itens);
    modalDetalhes.modal('show');
  });

});