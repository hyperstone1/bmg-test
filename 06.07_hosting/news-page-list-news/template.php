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

$url = $APPLICATION->GetCurPage();
$page = explode('/', $url);

if ($page[1] == "en") {
    $url_1 = "/en";
    $language = "EN";
    $lang["NAME"] = "NAME_EN";
    $lang["CATEGORY"] = "CATEGORY_EN";
    $lang["SMALL_TEXT_CARD"] = "SMALL_TEXT_CARD_EN";


} else {
    $url_1 = "";
    $language = "RU";
    $lang["NAME"] = "NAME";
    $lang["CATEGORY"] = "CATEGORY";
    $lang["SMALL_TEXT_CARD"] = "SMALL_TEXT_CARD";


}
?>

<div class="news_company__news_list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>


        <a href="<?=$url_1;?><?=$arItem["DETAIL_PAGE_URL"];?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="news_company__news_list-item">
            <div class="news_company__news_list-img">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" alt="" />
            </div>
            <div class="news_company__news_list_description">
                <div class="news_company__news_list-gradient">
                    <img src="/bitrix/templates/bmg/images/news/news_item_gradient.webp" alt="" />
                </div>
                <div class="news_company__news_list_description-chapter"><?=$arItem["PROPERTIES"][$lang["CATEGORY"]]["VALUE"];?></div>
                <div class="news_company__news_list_description-title">
                    <?php if ($page[1] == "en") {

                        echo $arItem["PROPERTIES"][$lang["NAME"]]["VALUE"];
                    } else {
                        echo $arItem[$lang["NAME"]];
                    }
                    ?>
                </div>
                <div class="news_company__news_list_description-text">
                    <?=$arItem["PROPERTIES"][$lang["SMALL_TEXT_CARD"]]["~VALUE"];?>
                </div>
            </div>
        </a>

<?endforeach;?>

    
</div>

<div id="pag1" class="news_company__show_more">
    <?=$arResult["NAV_STRING"]?>
</div>

