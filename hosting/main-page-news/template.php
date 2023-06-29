<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

    <div class="swiper-slide last_news__list-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div  class="last_news__list-img">
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" alt=""/></a>
        </div><?=$arItem["PREVIEW_PICTURE"]["SRC"];?>"
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
        <div class="last_news__list-item_container">
            <div class="last_news__list-title"><?=$arItem["NAME"];?></div>
            <div class="last_news__list_bottom">
                <div class="last_news__list_bottom-chapter">NEWS</div>
                <div class="last_news__list_bottom-text">
                    <?=$arItem["PREVIEW_TEXT"];?>
                </div>
                <div class="last_news__list_bottom-gradient">
                    <img src="/bitrix/templates/bmg//images/home/gradient-news.webp" alt="" />
                </div>
            </div>
        </div>
        </a>
    </div>

<?endforeach;?>

