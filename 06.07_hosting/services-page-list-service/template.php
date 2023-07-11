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
    $lang["DESCRIPTION"] = "SMALL_TEXT_CARD_EN";

} else {
    $url_1 = "";
    $language = "RU";
    $lang["NAME"] = "NAME";
    $lang["DESCRIPTION"] = "SMALL_TEXT_CARD";

}
?>

<div class="services_list__projects">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

    <div class="services_list__projects-item">
        <a class="services_list__projects-link" href="<?=$url_1;?><?=$arItem["DETAIL_PAGE_URL"];?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="services_list__projects-img">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" alt="" />
            </div>
            <div class="services_list__projects_text">
                <div class="services_list__projects_text-gradient">
                    <img src="/bitrix/templates/bmg/images/services/services_card_gradient.webp" alt="" />
                </div>
                <div class="services_list__projects_text-title">
                    <span><p>

                            <?php if ($page[1] == "en") {

                                echo $arItem["PROPERTIES"][$lang["NAME"]]["VALUE"];
                            } else {
                                echo $arItem[$lang["NAME"]];
                            }
                            ?>


                        </p></span>
                    <div class="services_list__projects_text-btn">
                        <button class="btn-show_more">
                            <div class="btn-show_more--icon">
                                <svg
                                        width="30"
                                        height="16"
                                        viewBox="0 0 30 16"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M1 7C0.447715 7 0 7.44772 0 8C0 8.55228 0.447715 9 1 9V7ZM29.7071 8.70711C30.0976 8.31658 30.0976 7.68342 29.7071 7.29289L23.3431 0.928932C22.9526 0.538408 22.3195 0.538408 21.9289 0.928932C21.5384 1.31946 21.5384 1.95262 21.9289 2.34315L27.5858 8L21.9289 13.6569C21.5384 14.0474 21.5384 14.6805 21.9289 15.0711C22.3195 15.4616 22.9526 15.4616 23.3431 15.0711L29.7071 8.70711ZM1 9L29 9V7L1 7V9Z"
                                            fill="#D01181"
                                    ></path>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="services_list__projects_text-subtitle">
                    <?=$arItem["PROPERTIES"][$lang["DESCRIPTION"]]["~VALUE"]["TEXT"];?>
                </div>
            </div>
        </a>
    </div>

<?endforeach;?>
</div>



<div id="pag2" class="btn-show_more">
    <?=$arResult["NAV_STRING"]?>
</div>

