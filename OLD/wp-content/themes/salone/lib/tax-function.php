<?php

			//Verifico che ci siano Benefici e Kit Composition per ogni prodotto

				function exist_ACF_group_by_title($title_str) {
				global $wpdb;
				return $wpdb->get_row("SELECT * FROM wp_posts WHERE  post_status = 'publish' && post_type = 'acf-field-group'", 'ARRAY_A');
				}

				//SUPPONGO NUM TOTALE DI COLONNE = 12

				$tot_span = 12;


				function count_group_fields($tot_span){

					$tot_el = array();

					if(exist_ACF_group_by_title('Benefit 1') && get_field('titolo_benefit_1')!=""){

						array_push($tot_el, 'benefit_1');

					}

					if(exist_ACF_group_by_title('Benefit 2')&& get_field('titolo_benefit_2')!=""){
						
						array_push($tot_el, 'benefit_2');

					}

					if(exist_ACF_group_by_title('Benefit 3')&& get_field('titolo_benefit_3')!=""){
						
						array_push($tot_el, 'benefit_3');

					}

					if(exist_ACF_group_by_title('Kit composition')&& get_field('titolo_kit')!=""){

						array_push($tot_el, 'kit');

					}
				//CONTO IL NUMERO DI BENEFICI ATTIVI PER IL PRODOTTO E GENERO IL NUMERO DI SPAN PER DIV

				  $elements = count($tot_el);

			      if($elements>0){

					foreach ($tot_el as $element) {

					  if($elements == 1):
						  $col_span = $tot_span;
					  else :
					      $col_span = $tot_span/2;
					  endif;

					  $height = '';

					  if($elements <= 3):

					  	$height = 'height';

					  endif; 

					?>
					
						<div class="span<?php echo $col_span.' '.$element .' '.$height; ?>">

					<?php

					//CREO IL TEMPLATE PER I BENEFIT E KIT COMPOSITION

						if(get_field('titolo_'.$element.'')){

						$tit = '<div class="benefit-title">';
						$tit .= get_field('titolo_'.$element.'');
						$tit .= '</div>';
						echo $tit;

						}


						if(get_field('sottotitolo_'.$element.'')){

						$sottotit  = '<div class="benefit-paragraph">';
						$sottotit .= get_field('sottotitolo_'.$element.'');
						$sottotit .= '</div>';
						echo $sottotit;

						}

						$image = get_field('immagine_'.$element.'');
						
						if( !empty($image) ):

							$url = $image['url'];
							$alt = $image['alt']; 

						?> 

							<img src="<?php echo $url ; ?>" class="<?php echo $element; ?>" alt="<?php echo $alt ; ?>" />

						<?php endif; ?>

						</div>
					<?php
					}
				  }
				
				}
			?>

