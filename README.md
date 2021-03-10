# gallery_mark
> #GALLERY_123# - где 123, ID элемента из инфоблока с "галереями"

``` php
// init.php
if(!defined("ADMIN_SECTION")){
	AddEventHandler("main", "OnEndBufferContent", "ChangeMyContent");
	function ChangeMyContent(&$content)
	{
		$content = preg_replace_callback(
			"/#GALLERY_(\d+)#/is".BX_UTF_PCRE_MODIFIER,
			function($matches) use ($arResult){
				ob_start();
				$GLOBALS["APPLICATION"]->IncludeComponent(
                    "bitrix:news.detail",
                    "mark_gallery",
                    Array(
                        "GALLERY_TYPE" => "small",
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_ELEMENT_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "BROWSER_TITLE" => "-",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "N",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "ELEMENT_CODE" => "",
                        "ELEMENT_ID" => $matches[1],
                        "FIELD_CODE" => array("",""),
                        "IBLOCK_ID" => "27", //ID инфоблока с "галереями"
                        "IBLOCK_TYPE" => "aspro_next_content", //Тип инфоблока с "галереями"
                        "IBLOCK_URL" => "",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                        "MESSAGE_404" => "",
                        "META_DESCRIPTION" => "-",
                        "META_KEYWORDS" => "-",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Страница",
                        "PROPERTY_CODE" => array("","GALLERY"), //свойство GALLERY в инфоблоке с "галереями" (файл, множественный)
                        "SET_BROWSER_TITLE" => "N",
                        "SET_CANONICAL_URL" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "STRICT_SECTION_CHECK" => "N",
                        "USE_PERMISSIONS" => "N",
                        "USE_SHARE" => "N"
                    )
				);
				$returnStr = @ob_get_contents();
				//AddMessage2Log($returnStr);
				ob_get_clean();
				return $returnStr;
			},
			$content
		);
	}
}
```