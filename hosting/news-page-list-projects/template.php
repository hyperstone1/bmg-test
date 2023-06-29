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

    <div class="swiper-slide news_summary__projects-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="news_summary__project-img">
            <a href="<?=$arItem["DETAIL_PAGE_URL"];?>"> <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" alt="<?=$arItem["NAME"];?>" /></a>
        </div>
        <div class="news_summary__project_info">
            <h4 class="news_summary__project-title"><a href="<?=$arItem["DETAIL_PAGE_URL"];?>"><?=$arItem["NAME"];?></a></h4>
            <div class="news_summary__project-description">

                <p><a href="<?=$arItem["DETAIL_PAGE_URL"];?>"><?=$arItem["PREVIEW_TEXT"];?></a></p>
            </div>
        </div>
    </div>


<?endforeach;?>

