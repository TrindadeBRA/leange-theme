<div class="posts-area">
    <?php foreach ($args["wpquery"] as $pct){ ?>
        <div class="one-third column">
            <?php
                $allfields = get_fields($post_id);
                $post_id = $pct->ID;
                $pct_name = $pct->post_title;
                $checkin_date = get_field('data_de_check-in', $post_id);
                $checkout_date = get_field('data_de_check-out', $post_id);
                $tipo_pct = get_field('tipo_pct', $post_id);

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
                
                
                $comodidades_list = get_field('lista_de_comodidades', $post_id);
                $suite_standart = get_field('valor_standart', $post_id);
                $suite_superior = get_field('valor_superior', $post_id);
                $suite_master = get_field('valor_master', $post_id);

                $promo_standart = get_field('promo_suite_standart', $post_id);
                $promo_superior = get_field('promo_suite_superior', $post_id);
                $promo_master = get_field('promo_suite_master', $post_id);

                $hbook_url = "https://hbook.hsystem.com.br/Booking?companyId=5e331846ab41d417304faf87&checkin=${checkin_date}&checkout=${checkout_date}&adults=2";
                $wpp_url = "https://api.whatsapp.com/send?phone=5521991429642";
                $direct_to = get_field('direct_to', $post_id);

                switch ($direct_to) {
                    case 'hbook':
                        $post_url = $hbook_url;
                        break;

                    case 'whatsapp':
                        $post_url = $wpp_url;
                        break;
                        
                    case 'interna':
                        $post_url = get_permalink($post_id);
                        break;
                    
                }

                $url_thumbnail = get_field('thumbnail_card', $post_id);
                $description_main = get_field('descricao_pct', $post_id);
                $description_optional = get_field('breve_descricao_pct', $post_id);

                $badge_group = get_field('badge_thumbnail', $post_id);

                $dateTimeEnd = "{$checkout_explode[1]}/{$checkout_explode[0]}/{$checkout_explode[2]}";
                if( strtotime($dateTimeEnd) <= strtotime('now') ) {
                    $post = array( 'ID' => $post_id, 'post_status' => 'draft' );
                    wp_update_post($post);
                }
            ?>

        <a data="<?php echo strtotime($dateTimeEnd); ?>" href="<?php echo $post_url ?>" class="path-package">
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

                        <?php if($tipo_pct != "Diárias") : ?>
                            <div class="date-zone-package">
                                <h4>
                                    <?php echo $checkin_date ?><i class="icon-right-open"></i><?php echo $checkout_date ?> (<?php echo $text_daily ?>)
                                </h4>
                            </div>
                        <?php endif ?>

                        <?php if($tipo_pct === "Feriados" || $tipo_pct === "Finais de Semana Especiais") : ?>

                            <div class="prices">
                                <div class="room-standart">
                                    <span>Suíte<br>Standard</span>
                                    <?php
                                        if ($suite_standart == "-") {
                                    ?>
                                        <p><?php echo $suite_standart ?></p>

                                    <?php  } else { ?>
                                        
                                        <p>R$ <?php echo $suite_standart ?></p>

                                    <?php  } ?>
                                </div>
                                <div class="room-superior">
                                    <span>Suíte<br>Superior</span>
                                    <?php
                                        if ($suite_superior == "-") {
                                    ?>
                                        <p><?php echo $suite_superior ?></p>

                                    <?php  } else { ?>
                                        
                                        <p>R$ <?php echo $suite_superior ?></p>

                                    <?php  } ?>
                                </div>
                                <div class="room-master">
                                    <span>Suíte<br>Master</span>
                                    <?php
                                        if ($suite_master == "-") {
                                    ?>
                                        <p><?php echo $suite_master ?></p>

                                    <?php  } else { ?>
                                        
                                        <p>R$ <?php echo $suite_master ?></p>

                                    <?php  } ?>

                                </div>
                            </div>

                        <?php elseif($tipo_pct === "Diárias") : ?>

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
                        
                        <?php endif ?>
                        

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

                        <button class="cta-button" href="<?php echo $post_url ?>">Reserve agora!</button>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
</div>