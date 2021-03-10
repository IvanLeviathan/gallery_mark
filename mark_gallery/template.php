<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<?
if($arResult['GALLERY']){?>
	<style>
		.wraps.galerys-block{
			margin-top: 40px;
		}
		.wraps.galerys-block .border .flex-direction-nav li{
			background-color: #e20000;
		}
		.wraps.galerys-block .border.custom_flex .flex-direction-nav li:hover, .wraps.galerys-block .border.custom_flex .flex-direction-nav li:hover a{
			background-color: #e20000 !important;
		}
		.wraps.galerys-block .custom_flex .flex-direction-nav li a{
			background-image: url('/local/templates/aspro_next/images/svg/arrows2_light.svg');
		}

		.with-padding.wraps.galerys-block .top_right.border.custom_flex .flex-direction-nav{
			top: -30px;
		}
		/* можно вынести эти стили в отдельный файл, что бы не плодить копии (если напр. несколько галерей на странице) */
	</style>
	<?
	makeGallery($arResult['GALLERY'], $arParams);
}

?>
