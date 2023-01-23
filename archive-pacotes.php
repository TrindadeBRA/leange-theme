<?php
/**
 * Template Name: Pacotes Archive
 */

get_header();
?>

<style>
#Subheader {
    display: none!important;
}
</style>

<?php
    $argsHoliday = array(
        'post_type' => 'pacotes',
        'numberposts' => 8,
        'meta_query'	=> array(
            array(
                'key'		=> 'tipo_pct',
                'value'		=> 'Feriados',
                'compare'	=> 'LIKE'
            ),
        ),
        'meta_key' => 'data_de_check-in',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
    );
    $argsFDS = array(
        'post_type' => 'pacotes',
        'numberposts' => 8,
        'meta_query'	=> array(
            array(
                'key'		=> 'tipo_pct',
                'value'		=> 'Finais de Semana Especiais',
                'compare'	=> 'LIKE'
            ),
        ),
        'meta_key' => 'data_de_check-in',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
    );
    $argsDaily = array(
        'post_type' => 'pacotes',
        'numberposts' => 8,
        'meta_query'	=> array(
            array(
                'key'		=> 'tipo_pct',
                'value'		=> 'Diárias',
                'compare'	=> 'LIKE'
            ),
        ),
        'meta_key' => 'data_de_check-in',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
    );
    $pct_feriados = get_posts($argsHoliday);
    $pct_fds = get_posts($argsFDS);
    $pct_diarias = get_posts($argsDaily);

?>

<div id="Content">
	<div class="content_wrapper clearfix">
		<div class="sections_group">
			<div class="section">
				<div class="section_wrapper clearfix">
                    <img class="scale-with-grid img-center" src="https://pousadaleange.com.br/wp-content/uploads/2022/05/star.webp" alt="star" title="star" width="88" height="54">
                    <h2 class="title-type">Feriadoss</h2>
                    <?php get_template_part( "components/pacotes-grid", null, ["wpquery" => $pct_feriados]  );?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="Content">
	<div class="content_wrapper clearfix">
		<div class="sections_group">
            <div class="section">
                <div class="section_wrapper clearfix">
                    <img class="scale-with-grid img-center" src="https://pousadaleange.com.br/wp-content/uploads/2022/05/star.webp" alt="star" title="star" width="88" height="54">
                    <h2 class="title-type">Finais de Semana Especiais</h2>
                    <?php get_template_part( "components/pacotes-grid", null, ["wpquery" => $pct_fds]  );?>
                </div>
            </div>
        </div>
	</div>
</div>


<div id="Content">
	<div class="content_wrapper clearfix">
		<div class="sections_group">
            <div class="section">
                <div class="section_wrapper clearfix">
                    <img class="scale-with-grid img-center" src="https://pousadaleange.com.br/wp-content/uploads/2022/05/star.webp" alt="star" title="star" width="88" height="54">
                    <h2 class="title-type">Diárias</h2>
                    <?php get_template_part( "components/pacotes-grid", null, ["wpquery" => $pct_diarias]  );?>
                </div>
            </div>
        </div>
	</div>
</div>



<?php get_footer();

