<?php
/**
 * Slider block
 *
 * @var array     $attributes Block attributes.
 * @var string    $content    Block default content.
 * @var \WP_Block $block      Block instance.
 *
 * @package wpe/slider-block
 */

$autoplay   = empty( $attributes['autoplay'] ) ? false : $attributes['autoplay'];
$navigation = empty( $attributes['navigation'] ) ? false : $attributes['navigation'];
$pagination = empty( $attributes['pagination'] ) ? false : $attributes['pagination'];
$unique_id  = empty( $attributes['uniqueId'] ) ? '' : $attributes['uniqueId'];

$swiper_attr = array(
	'autoplay'   => $autoplay,
	'navigation' => $navigation,
	'pagination' => $pagination,
);
$swiper_attr = htmlspecialchars( wp_json_encode( $swiper_attr ) );

$wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class' => 'swiper',
	)
);
?>

<div <?php echo wp_kses_data( $wrapper_attributes ) . 'data-swiper="' . esc_attr( $swiper_attr ) . '" data-unique-id="' . esc_attr( $unique_id ) . '"'; ?>>
	<div class="swiper-wrapper">
		<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>

</div><!-- .swiper -->
<?php if( $navigation ): ?>
<div class="swiper-button-prev swiper-button-prev-<?php echo esc_attr( $unique_id ); ?>"></div>
<div class="swiper-button-next swiper-button-next-<?php echo esc_attr( $unique_id ); ?>"></div>
<?php endif; ?>
