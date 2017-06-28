<!DOCTYPE html>
<html>
<head>
  <title>Pokeagenda</title>
  <link rel="icon" href="<?= baseUrl('assets/images/favicon.ico'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?= baseUrl('assets/bootstrap-3.3.7/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= baseUrl('assets/css/pokemons.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= baseUrl('assets/css/pace.css'); ?>">
</head>
<body>
  <input type="hidden" id="base-url" value="<?= baseUrl(); ?>">
  <div class="pokedex-content">
    <div class="table-content">
      <table class="table pokemon-list" data-next="<?= $next; ?>">
        <tbody>
          <?php foreach ($pokemons as $pokemon) : ?>
            <tr data-url="<?= $pokemon->url; ?>">
              <td><?= $pokemon->name; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="pokemon-detail">
    </div>
    <img class="pokedex-image" src="<?= baseUrl('assets/images/pokedex.png'); ?>">
  </div>
  <div class="modal fade" id="modal-detalhes" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <ul class="list-group">
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= baseUrl('assets/js/jquery-3.2.1.min.js'); ?>" type="text/javascript" charset="utf-8"></script>
  <script src="<?= baseUrl('assets/bootstrap-3.3.7/js/bootstrap.min.js'); ?>" type="text/javascript" charset="utf-8"></script>
  <script src="<?= baseUrl('assets/js/mustache.min.js'); ?>" type="text/javascript" charset="utf-8"></script>
  <script src="<?= baseUrl('assets/js/pace.min.js'); ?>" type="text/javascript" charset="utf-8"></script>
  <script src="<?= baseUrl('assets/js/scroll-pagination.js'); ?>" type="text/javascript" charset="utf-8"></script>
  <script src="<?= baseUrl('assets/js/pokemons.js'); ?>" type="text/javascript" charset="utf-8"></script>
</body>
</html>