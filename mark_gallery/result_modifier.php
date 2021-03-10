<?

if($arResult['PROPERTIES']['GALLERY']['VALUE']){
	foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $key => $img) {
		$arFileTmp = CFile::ResizeImageGet(
			$img,
			array("width" => 325, "height" => 260),
			BX_RESIZE_IMAGE_EXACT,
			true
		);

		if($arFileTmp)
			$arResult['GALLERY'][$key]['PREVIEW']['src'] = $arFileTmp['src'];

		$arResult['GALLERY'][$key]['DETAIL']['SRC'] = CFile::GetPath($img);
	}
	foreach ($arResult['PROPERTIES']['GALLERY']['DESCRIPTION'] as $key => $desciption) {
		$arResult['GALLERY'][$key]['TITLE'] = $arResult['GALLERY'][$key]['ALT'] = $desciption;
	}
}




function makeGallery($gallery, $arParams = array()){?>
	<div class="wraps galerys-block with-padding">
		<?/*<h5><?=(strlen($arParams['T_GALLERY']) ? $arParams['T_GALLERY'] : Loc::getMessage('T_GALLERY'))?></h5>*/?>
		<?if($arParams['GALLERY_TYPE'] == 'small'):?>
			<div class="small-gallery-block">
				<div class="flexslider unstyled front border small_slider custom_flex top_right color-controls" data-plugin-options='{"animation": "slide", "useCSS": true, "directionNav": true, "controlNav" :true, "animationLoop": true, "slideshow": false, "counts": [4, 3, 2, 1]}'>
					<ul class="slides items">
						<?foreach($gallery as $i => $arPhoto):?>
							<li class="col-md-3 item visible">
								<div>
									<img src="<?=$arPhoto['PREVIEW']['src']?>" class="img-responsive inline" title="<?=$arPhoto['TITLE']?>" alt="<?=$arPhoto['ALT']?>" />
								</div>
								<a href="<?=$arPhoto['DETAIL']['SRC']?>" class="fancy dark_block_animate" rel="gallery" target="_blank" title="<?=$arPhoto['TITLE']?>"></a>
							</li>
						<?endforeach;?>
					</ul>
				</div>
			</div>
		<?else:?>
			<div class="gallery-block">
				<div class="gallery-wrapper">
					<div class="inner">
						<?if(count($gallery) > 1):?>
							<div class="small-gallery-wrapper">
								<div class="flexslider unstyled small-gallery center-nav" data-plugin-options='{"slideshow": false, "useCSS": true, "animation": "slide", "animationLoop": true, "itemWidth": 60, "itemMargin": 20, "minItems": 1, "maxItems": 9, "slide_counts": 1, "asNavFor": ".gallery-wrapper .bigs"}' id="carousel1">
									<ul class="slides items">
										<?foreach($gallery as $arPhoto):?>
											<li class="item">
												<img class="img-responsive inline" border="0" src="<?=$arPhoto["THUMB"]["src"]?>" title="<?=$arPhoto['TITLE']?>" alt="<?=$arPhoto['ALT']?>" />
											</li>
										<?endforeach;?>
									</ul>
								</div>
							</div>
						<?endif;?>
						<div class="flexslider big_slider dark bigs color-controls" id="slider" data-plugin-options='{"animation": "slide", "useCSS": true, "directionNav": true, "controlNav" :true, "animationLoop": true, "slideshow": false, "sync": ".gallery-wrapper .small-gallery", "counts": [1, 1, 1]}'>
							<ul class="slides items">
								<?foreach($gallery as $i => $arPhoto):?>
									<li class="col-md-12 item">
										<a href="<?=$arPhoto['DETAIL']['SRC']?>" class="fancy" rel="gallery" target="_blank" title="<?=$arPhoto['TITLE']?>">
											<img src="<?=$arPhoto['PREVIEW']['src']?>" class="img-responsive inline" title="<?=$arPhoto['TITLE']?>" alt="<?=$arPhoto['ALT']?>" />
											<span class="zoom"></span>
										</a>
									</li>
								<?endforeach;?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<?endif;?>
	</div>
<?}

?>
