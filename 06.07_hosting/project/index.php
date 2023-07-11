<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


$url = $APPLICATION->GetCurPage();
$page = explode('/', $url);

if ($page[1] == "en") {
    $APPLICATION->SetTitle("Projects");
    $url_1 = "/en";
    $language = "EN";
    include_once "description_en.php";
} else {
    $APPLICATION->SetTitle("Проекты");
    $url_1 = "";
    $language = "RU";
    include_once "description_ru.php";
}

?><section class="portfolio"> <section class="portfolio_main">
<div class="portfolio_main-gradient">
 <img src="/bitrix/templates/bmg/images/portfolio/portfolio_gradient.webp" alt="">
</div>
<div class="portfolio_main_container">
	<div class="portfolio_main__info">
		<div class="portfolio_main__info-title">
			<p>
				<?=$lang["TITLE1"];?>
			</p>
			<p>
                <?=$lang["TITLE2"];?>
			</p>
			<p>
                <?=$lang["TITLE3"];?>
			</p>
			<p>
				 BMG
			</p>
		</div>
		<div class="portfolio_main__info_advantage">
			 <?php
                        $arElement = CIBlockElement::GetList(
                            Array("SORT" => "ASC"), // Сортировка элементов
                            Array( "IBLOCK_ID" => 5, 'ACTIVE' => 'Y'),
                            false,
                            Array ("nTopCount" => 1)
                        );

                    while ($ob = $arElement->GetNextElement()) {
                        $arFieldsProject = $ob->GetFields();
                        $arProperties = $ob->GetProperties();?>
			<div class="portfolio_main__info_advantage-title">
				 <?=$arProperties['NUMBER_AGE']['VALUE'];?> <?=$lang["AGE"];?>
			</div>
			<div class="portfolio_main__info_advantage-description">
				 <?=$arProperties[$lang["DESCRIPTION_AGE"]]['VALUE'];?>
			</div>
 <span class="portfolio_main__info_advantage-year"><?=$arProperties['NUMBER_AGE']['VALUE'];?></span>
			<?php } ?>
		</div>
	</div>
	<div class="portfolio_main__img">
		<div class="portfolio_main__img-left">
 <img src="/bitrix/templates/bmg/images/portfolio/1.webp" alt="Портфолио">
		</div>
		<div class="portfolio_main__img-right">
 <img src="/bitrix/templates/bmg/images/portfolio/2.webp" alt="Портфолио">
		</div>
		<div class="portfolio_main__img-title">
			 <?=$lang["OUR_PROJECT_TEXT1"];?>
		</div>
	</div>
</div>
 </section> <section class="portfolio_projects">
<div class="portfolio_projects_container">
	<div class="portfolio_projects__title">
		<div class="portfolio_projects__title-title">
            <?=$lang["OUR_PROJECT_TEXT2"];?>
		</div>
		<div class="portfolio_projects__title-subtitle">
            <?=$lang["OUR_PROJECT_TEXT3"];?>
		</div>
	</div>
	<div class="portfolio_projects__filter">
		<ul class="portfolio_projects-filter">
			<li class="portfolio_projects__filter-category"><?=$lang["ALL"];?></li>
			<li class="portfolio_projects__filter-category"> </li>
		</ul>
		<div class="portfolio_projects__filter_all">
			 <?php
                        $arElementProj = CIBlockElement::GetList(
                            Array("SORT" => "ASC"), // Сортировка элементов
                            Array( "IBLOCK_ID" => 3, 'ACTIVE' => 'Y'),
                            false,
                            Array(),
                            Array("NAME", "PROPERTY_NAME_EN", "DETAIL_PAGE_URL")
                        );
                            $totalElements = $arElementProj->SelectedRowsCount(); // Общее количество элементов
                            $elementsPerColumn = 7; // Количество элементов в одном столбце

                            $currentColumn = 1; // Номер текущего столбца

                            echo '<ul>';

                            $i = 1; // Счетчик элементов
                            while ($obProj = $arElementProj->GetNext()) {


                                if ($i > $elementsPerColumn && ($i - 1) % $elementsPerColumn == 0) {
                                    echo '</ul>';
                                    echo '<ul>';
                                    $currentColumn++;
                                }

                                echo '<li class="portfolio_projects__filter-category"><a href=" ' . $url_1 . $obProj["DETAIL_PAGE_URL"] . '" > ' . $obProj[$lang["PROJECT_NAME"]] . '</a></li>';

                                $i++;

                                if ($i > $totalElements && ($i - 1) % $elementsPerColumn != 0) {
                                    echo '</ul>';
                                }
                            }
                            echo '</ul>'; ?>
			<div class="portfolio_projects__filter_all-btn">
 <a href="#down"><?=$lang["GO_PROJECT"];?></a>
			</div>
		</div>
	</div>
	 <a name="down"></a> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"project-page-list", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "Raznoe",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "6",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "more",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "SMALL_TEXT_CARD",
			1 => "BIG_TEXT_CARD",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "project-page-list"
	),
	false
);?>
</div>
 </section> </section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>