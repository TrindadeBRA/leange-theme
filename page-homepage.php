<?php get_header(); ?>

<?php echo do_shortcode( "[rev_slider alias='home']" ) ?>

<div class="container">
  
  <div class="HSystemBox">

    <label class="d-none-xs">Chegada<br>
      <input id="chegada" type="date">
    </label>

    <label class="d-none-xs">Saída
      <input id="saida" type="date">
    </label>

    <label class="d-none-xs select">Adultos
      <select name="adultos" id="adulto" class="minimal">
        <option value="1">1 Adulto</option>
        <option value="2">2 Adultos</option>
      </select>
    </label>

    <input class="book" type="button" value="RESERVAR" onclick="book()">
    
  </div>

  <small>*Idade mínima para hospedagem 16 anos.</small><br>
  <small>*Mínimo de 2 diárias.</small>

</div>



<div class="HSystemBox">

<?php get_footer(); ?>