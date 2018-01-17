<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/imprimir_style.css">
  <script src="<?= base_url(); ?>assets/js/imprimir_script.js"></script>
</head>

<body>
  <div class="ticket">
    <p class="centrado">JAMPOOL
      <br>RIF: J-0000000000
      <br>N. de Ticket: <?= $ticket->numero; ?>
      <br>N. Serial: 000000000000
      <br><?= $ticket->fecha.' / '.$ticket->hora; ?>
      <br><b>LOTTO ACTIVO</b>
      <br>Sorteos:
      <?php foreach ($horas as $hora) : ?>
        <?= '('.$hora->hora_jugada.') '; ?>
      <?php endforeach; ?>
    </p>
    <table>
      <thead>
        <tr class="centrado">
          <td class="cantidad">N.</td>
          <td class="producto">ANIMAL</td>
          <td class="precio">BS</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($jugadas as $jugada) : ?>
          <tr>
            <td class="cantidad"><?= $jugada->numero; ?></td>
            <td class="producto"><?= $jugada->animal; ?></td>
            <td class="precio"><?= number_format($jugada->costo,0,',','.'); ?></td>
          </tr>
        <?php endforeach; ?>
        <tr class="total">
          <td class="precio-total" colspan="3"><?= 'TOTAL: '.number_format($ticket->costo_total,0,',','.'); ?></td>
        </tr>
      </tbody>
    </table>
    <p class="centrado">
      CADUCA A LOS 5 DÍAS
      <br>¡SUERTE!
    </p>
  </div>
</body>

</html>