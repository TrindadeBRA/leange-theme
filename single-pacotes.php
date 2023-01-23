<?php
/**
* Template Name: Pacotes Single
*/

get_header();
?>

<style>

#Subheader {
    display: none!important;
}

.post-title {
  text-align: left;
  font-size: 46px;
}

.slick-pct .gallery img {
  height: 520px!important;
  width: 100%!important;
  object-fit: cover;
  border-radius: 10px;
}

.slick-pct .thumbs img {
    width: calc(100% - 32px);
    height: 100px !important;
    object-fit: cover;
    object-position: topc;
    margin: 8px 16px 8px 16px !important;
    border: 2px solid #9cba5b;
    box-shadow: 0px 0px 12px -3px #fff;
    border-radius: 6px;
}

.slick-current img {
  box-shadow: 0 0 5px 5px #fff !important;
}

.slick-pct .thumbs {
    margin-top: 20px;
}


.one.column.slick-pct {
  position: relative;
}

@media only screen and (max-width: 769px) {
    .slick-pct .gallery img {
        height: 280px!important;
    }
}



/* Testimonials */

.slick-dots {
	 display: flex;
	 justify-content: center;
	 margin: 0;
	 padding: 1rem 0;
	 list-style-type: none;
}

.slick-dots li {
    margin: 0 0.25rem;
}

.slick-dots button {
    display: block;
    width: 1rem;
    height: 1rem;
    padding: 0;
    border: none;
    border-radius: 100%;
    background-color: #d8ecaf;
    text-indent: -9999px;
}

.slick-dots li.slick-active button {
    background-color: #9cba5b;
}
 
.testimonials h4 {
  text-align: center;
}

.testimonials p {
  text-align: center;
}

.testimonial-title {
  color: #9cba5b;
  text-align: center;
  margin-top: 40px;
  text-transform: uppercase;
  margin-bottom: 20px;
}


.opecoes-diaria-area {
  display: flex;
  flex-direction: column;
  text-align: center;
  gap: 8px;
}
.opecoes-diaria-area a {
  padding: 10px 0;
}

</style>

<?php
    $post_id = get_the_ID();
    $pct_name = get_the_title($post_id);
    $imgs_carousel = get_field('imgs_carousel', $post_id);
    $checkin_date = get_field('data_de_check-in', $post_id);
    $checkout_date = get_field('data_de_check-out', $post_id);
    $checkin_explode = explode("/", $checkin_date);
    $checkout_explode = explode("/", $checkout_date);
    $datetime1 = date_create("{$checkin_explode[2]}-{$checkin_explode[1]}-{$checkin_explode[0]}");
    $datetime2 = date_create("{$checkout_explode[2]}-{$checkout_explode[1]}-{$checkout_explode[0]}");
    $interval = date_diff($datetime1, $datetime2);
    $num_dailys = $interval->d;
    if($num_dailys == 1){
        $text_daily = "Uma diária";
    } else {
        $text_daily = "{$num_dailys} diárias";
    }
    $tipo_do_pct = get_field('tipo_pct', $post_id);
    $comodidades_list = get_field('lista_de_comodidades', $post_id);
    $suite_standart = get_field('valor_standart', $post_id);
    $suite_superior = get_field('valor_superior', $post_id);
    $suite_master = get_field('valor_master', $post_id);
    $promo_standart = get_field('promo_suite_standart', $post_id);
    $promo_superior = get_field('promo_suite_superior', $post_id);
    $promo_master = get_field('promo_suite_master', $post_id);
    $hbook_url = "https://hbook.hsystem.com.br/Booking?companyId=5e331846ab41d417304faf87&checkin=${checkin_date}&checkout=${checkout_date}&adults=2";
    $direct_to_hbook = get_field('direct_to_hbook', $post_id);
    $url_thumbnail = get_field('thumbnail_card', $post_id);
    $description_main = get_field('descricao_pct', $post_id);
    $description_optional = get_field('breve_descricao_pct', $post_id);
    $testimonial_clients = get_field('depoimento_dos_clientes', $post_id);
    $opcoes_diarias = get_field('opcoes_diarias', $post_id);

    $badge_group = get_field('badge_thumbnail', $post_id);


?>

<div id="Content">
	<div class="content_wrapper clearfix">

		<div class="section slider-vitrine" style="padding-bottom:25px;">
            <div class="section_wrapper clearfix">
                <div class="one column slick-pct">

                    <div class="slick-carousel gallery">
                        <?php foreach ($imgs_carousel as $img_carousel){ ?>
                            <div><img src="<?php echo $img_carousel["url"]?>" alt=""></div>
                        <?php } ?>
                    </div>

                    <div class="slick-carousel thumbs">
                        <?php foreach ($imgs_carousel as $img_carousel){ ?>
                            <div><img src="<?php echo $img_carousel["sizes"]["medium"]?>" alt=""></div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>


        <div class="section geral" style="padding-top:25px;">

            <div class="section_wrapper clearfix">
                <div class="two-third column">
                    <h1 class="post-title"><?php echo $pct_name; ?></h1>
                    <div style="padding-right:16px;">
                        <?php echo $description_main; ?>
                    </div>

                    <?php
                        if ($tipo_do_pct == "Diárias") {
                            echo "<div class='opecoes-diaria-area'>";
                            foreach ($opcoes_diarias as $opcao_diaria) {
                                $check_in_diaria = $opcao_diaria["check-in-diaria"];
                                $check_out_diaria = $opcao_diaria["check-out-diaria"];
                                echo "<a class='cta-button' href='https://hbook.hsystem.com.br/Booking?companyId=5e331846ab41d417304faf87&amp;checkin={$check_in_diaria}&amp;checkout={$check_out_diaria}&amp;adults=2' target='_blank'>{$check_in_diaria} até {$check_out_diaria}</a>";
                                
                            }
                            echo "</div>";
                        }
                    ?>
                    
                </div>
                
                <div class="one-third column">
                    <div class="package-card">
                        <div class="thumbnail-package">
                            <?php
                                if ($badge_group["badge"] === true ){
                                    echo "<span class='badge' style='background-color:{$badge_group['badge_bg']}; color:{$badge_group['badge_color']};'>{$badge_group['badge_text']}</span>";
                                }
                            ?>
                            <img src="<?php echo $url_thumbnail ?>" title="<?php echo $pct_name ?>" alt="<?php echo $pct_name ?>">
                        </div>
                        <div class="content">
                            <h3 class="title-package" title="<?php echo $pct_name ?>" alt="<?php echo $pct_name ?>"><?php echo $pct_name ?></h3>
                            <?php
                                if ($tipo_do_pct !== "Diárias") {
                            ?>
                                <div class="date-zone-package">
                                    <h4>
                                        <?php echo $checkin_date ?><i class="icon-right-open"></i><?php echo $checkout_date ?> (<?php echo $text_daily ?>)
                                    </h4>
                                </div>
                            <?php
                                }
                            ?>

                            <?php
                                if ($tipo_do_pct == "Diárias") {
                            ?>
                                <div class="prices">
                                    <div class="room-standart">
                                        <span>Suíte<br>Standard</span>
                                        <p class="old-price"><s>R$ <?php echo $suite_standart ?></s></p>
                                        <p>R$ <?php echo $promo_standart ?></p>
                                    </div>
                                    <div class="room-superior">
                                        <span>Suíte<br>Superior</span>
                                        <p class="old-price"><s>R$ <?php echo $suite_superior ?></s></p>
                                        <p>R$ <?php echo $promo_superior ?></p>
                                    </div>
                                    <div class="room-master">
                                        <span>Suíte<br>Master</span>
                                        <p class="old-price"><s>R$ <?php echo $suite_master ?></s></p>
                                        <p>R$ <?php echo $promo_master ?></p>
                                    </div>
                                </div>
                            <?php
                                } else {
                            ?>
                                <div class="prices">
                                    <div class="room-standart">
                                        <span>Suíte<br>Standart</span>
                                        <p>R$ <?php echo $suite_standart ?></p>
                                    </div>
                                    <div class="room-superior">
                                        <span>Suíte<br>Superior</span>
                                        <p>R$ <?php echo $suite_superior ?></p>
                                    </div>
                                    <div class="room-master">
                                        <span>Suíte<br>Master</span>
                                        <p>R$ <?php echo $suite_master ?></p>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>




                            <p class="warning">*Valores para 2 adultos.</p>

                            <div class="features-list">
                                <?php
                                    foreach ($comodidades_list as $comodidade) {
                                        $comodidade_text = $comodidade["comodidades"];
                                        echo "<p class='feature'><i class='icon-check'></i> {$comodidade_text} </p>";
                                    }
                                ?>
                            </div>

                            <?php
                                if($description_optional){
                                    echo "<div class='optional-description'>{$description_optional} </div>";
                                }
                            ?>

                            <?php
                                if ($tipo_do_pct !== "Diárias") {
                            ?>
                                <button class="cta-button" onclick="window.open('<?php echo $hbook_url?>', '_blank')">Reserve agora!</button>
                            <?php
                                }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section mcb-section mcb-section-j2o1fhk1q  no-margin-h no-margin-v equal-height bg-cover" style="padding-bottom:125px;background-image:url(https://pousadaleange.com.br/wp-content/uploads/2022/05/bg-home.webp);background-repeat:no-repeat;background-position:center;background-attachment:fixed;background-size:cover">
            <div class="section_wrapper mcb-section-inner">
                <div class="wrap mcb-wrap mcb-wrap-yxe3qdypq one  valign-top move-up clearfix" style="margin-top:-37px" data-mobile="no-up">
                    <div class="mcb-wrap-inner">
                        <div class="column mcb-column mcb-item-yfj5ib2jj one column_image" style="height: 73px;">
                        <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                            <div class="image_wrapper"><img class="scale-with-grid" src="https://pousadaleange.com.br/wp-content/uploads/2022/05/divider.webp" alt="divider" title="divider" width="7" height="73"></div>
                        </div>
                        </div>
                        <div class="column mcb-column mcb-item-6prowa30o one column_divider" style="height: 73px;">
                        <hr class="no_line" style="margin:0 auto 50px">
                        </div>
                        <div class="column mcb-column mcb-item-y969c2ip1 one column_column" style="height: 73px;">
                        <div class="column_attr clearfix align_center" style="">
                            <h3 style="color:#fff;">NOSSA POUSADA</h3>
                        </div>
                        </div>
                        <div class="column mcb-column mcb-item-ih26tl0n6 one column_divider" style="height: 73px;">
                        <hr class="no_line" style="margin:0 auto 20px">
                        </div>
                    </div>
                </div>
                <div class="wrap mcb-wrap mcb-wrap-73h8cjex1 divider  valign-top clearfix" style="">
                    <div class="mcb-wrap-inner"></div>
                </div>
                <div class="wrap mcb-wrap mcb-wrap-0t9xeh553 two-third  valign-top clearfix" style="padding:0 1%">
                    <div class="mcb-wrap-inner">
                        <div class="column mcb-column mcb-item-88s6ctn4v one-second column_column order1" style="height: 413px;">
                        <div class="column_attr clearfix bg-cover" style="background-image:url('https://pousadaleange.com.br/wp-content/uploads/2022/05/oetfriendly.webp');background-repeat:no-repeat;background-position:center;">
                            <hr class="no_line" style="margin:0 auto 300px">
                        </div>
                        </div>
                        <div class="column mcb-column mcb-item-due8l5c0w one-second column_column order2" style="height: 413px;">
                        <div class="column_attr clearfix align_center" style="background-color:#637935;padding:50px 9%;">
                            <i class="fas fa-paw themecolor" style="font-size:70px"></i>
                            <hr class="no_line" style="margin:0 auto 20px">
                            <h3 style="color:#fff;">PET FRIENDLY</h3>
                            <p style="color:#fff;">Não temos restrições quanto ao porte ou raça do seu pet, também não cobramos taxas adicionais para a vinda deles. Seu pet tem liberdade total para acessar todas as nossas comodidades!</p>
                        </div>
                        </div>
                        <div class="column mcb-column mcb-item-ylhh8nd4t one column_divider" style="height: 413px;">
                        <hr class="no_line" style="margin:0 auto 20px">
                        </div>
                        <div class="column mcb-column mcb-item-208cfd2ls one-second column_column middle-align order3" style="height: 413px;">
                        <div class="column_attr clearfix align_center" style="background-color:#ece9e4;padding:50px 9%;">
                            <p style="color:#000;">Nossa maravilhosa piscina de borda infinita possui aquecimento solar e tratamento especial por ozônio, com níveis baixíssimos de cloro, além de contar com o ofurô aquecido, perfeito para aproveitar no final de tarde em que temos um pôr do sol incrível para acompanhar.</p>
                        </div>
                        </div>
                        <div class="column mcb-column mcb-item-2j4xa44jp one-second column_column order4" style="height: 413px;">
                        <div class="column_attr clearfix bg-cover" style="background-image:url('https://pousadaleange.com.br/wp-content/uploads/2022/05/piscina-1.webp');background-repeat:no-repeat;background-position:center;">
                            <hr class="no_line" style="margin:0 auto 300px">
                        </div>
                        </div>
                        <div class="column mcb-column mcb-item-ay1hc1pwg one column_divider" style="height: 413px;">
                        <hr class="no_line" style="margin:0 auto 20px">
                        </div>
                        <div class="column mcb-column mcb-item-ri761pj1p one-second column_column" style="height: 413px;">
                        <div class="column_attr clearfix bg-cover" style="background-image:url('https://pousadaleange.com.br/wp-content/uploads/2022/05/sauna-1.webp');background-repeat:no-repeat;background-position:center;">
                            <hr class="no_line" style="margin:0 auto 300px">
                        </div>
                        </div>
                        <div class="column mcb-column mcb-item-beugtubdw one-second column_column middle-align" style="height: 413px;">
                        <div class="column_attr clearfix align_center" style="background-color:#402c1b;padding:50px 9%;">
                            <p style="color:#fff;">A área da sauna fica localizada ao lado da mata, com barulho do rio que passa e conta com um HotTub abastecido por água natural e aquecido à lenha, o combo completo para você relaxar!</p>
                        </div>
                        </div>
                        <div class="column mcb-column mcb-item-ldvxy2k7y one column_divider" style="height: 413px;">
                        <hr class="no_line" style="margin:0 auto 20px">
                        </div>
                        <div class="column mcb-column mcb-item-08912k2nq one-second column_column middle-align" style="height: 413px;">
                        <div class="column_attr clearfix align_center" style="background-color:#ece9e4;padding:50px 9%;">
                            <p style="color:#000;">Uma adega subterrânea para climatização perfeita dos vinhos, bar com carta variada de drinks, cervejas e destilados e nosso aconchegante restaurante!</p>
                        </div>
                        </div>
                        <div class="column mcb-column mcb-item-6djtzcm3c one-second column_column" style="height: 413px;">
                        <div class="column_attr clearfix bg-cover" style="background-image:url('https://pousadaleange.com.br/wp-content/uploads/2022/05/adega-1.webp');background-repeat:no-repeat;background-position:center;">
                            <hr class="no_line" style="margin:0 auto 300px">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="wrap mcb-wrap mcb-wrap-xwv3mc0w6 one-third  valign-top clearfix" style="padding:0 1%">
                    <div class="mcb-wrap-inner">
                        <div class="column mcb-column mcb-item-wp24v196l one column_column" style="height: 301px;">
                        <div class="column_attr clearfix bg-cover" style="background-image:url('https://pousadaleange.com.br/wp-content/uploads/2022/05/trilhasrio.webp');background-repeat:no-repeat;background-position:center;">
                            <hr class="no_line" style="margin:0 auto 300px">
                        </div>
                        </div>
                        <div class="column mcb-column mcb-item-7xjg0b1wc one column_column" style="height: 301px;">
                        <div class="column_attr clearfix align_center" style="background-color:#d8d0c5;padding:50px 9%;middle-align">
                            <p>Na propriedade, temos trilhas dentro da natureza, beirando o rio! Em diversos pontos você pode escolher dar uma paradinha para tomar um banho e renovar as energias e até mesmo relaxar na rede! </p>
                        </div>
                        </div>
                        <div class="column mcb-column mcb-item-0ndf2e5ta one column_divider" style="height: 301px;">
                        <hr class="no_line" style="margin:0 auto 20px">
                        </div>
                    </div>
                </div>
                <div class="wrap mcb-wrap mcb-wrap-hgmv8ovbd one-third  valign-top clearfix" style="padding:0 1%">
                    <div class="mcb-wrap-inner">
                        <div class="column mcb-column mcb-item-pr0sbj76l one column_column" style="height: 301px;">
                        <div class="column_attr clearfix bg-cover" style="background-image:url('https://pousadaleange.com.br/wp-content/uploads/2022/05/biblioteca.webp');background-repeat:no-repeat;background-position:center;">
                            <hr class="no_line" style="margin:0 auto 300px">
                        </div>
                        </div>
                        <div class="column mcb-column mcb-item-onqybqfaz one column_column" style="height: 301px;">
                        <div class="column_attr clearfix align_center" style="background-color:#d8d0c5;padding:50px 9%;middle-align">
                            <p>Nossas áreas internas, contam com três salas super equipadas e aconchegantes, sendo elas: sala de TV, sala de estar, sala de jogos com mesa de bilhar, carteado, jogos de tabuleiro e biblioteca</p>
                        </div>
                        </div>
                        <div class="column mcb-column mcb-item-xmq87niug one column_divider" style="height: 301px;">
                        <hr class="no_line" style="margin:0 auto 20px">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Areas da Pousada -->

        <?php if ($testimonial_clients){ ?>
            <div class="section slider-testimonials" style="background-color:#efefef;">
                <div class="section_wrapper clearfix">
                    <div class="one column">
                        <h3 class="testimonial-title">Depoimentos de nossos hóspedes</h3>
                        <div class="testimonials">

                            <?php foreach ($testimonial_clients as $testimonial_client){ ?>
                                <div>
                                    <h4><?php echo $testimonial_client["nome_do_cliente"]?></h4>
                                    <p><?php echo $testimonial_client["depoimento_do_cliente"]?></p>
                                </div>
                            <?php } ?>
                                
                        </div>
                        <div class="dots-container"></div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div><!--content_wrapper -->
</div><!--content -->

<script>

    jQuery(document).ready(function(){
        jQuery('.gallery').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            infinite: true,
            asNavFor: '.thumbs',
        });
        
        jQuery('.thumbs').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.gallery',
            dots: true,
            arrows: false,
            focusOnSelect: true,
            centerPadding: '60px',
            infinite: true,
            centerMode: true,
            lazyLoad: 'ondemand',
            responsive: [
                {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
                },
            ]
        });
        
        jQuery('.testimonials').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            appendDots:'.dots-container',
            infinite: true,
        });

    });
</script>

<?php get_footer();




