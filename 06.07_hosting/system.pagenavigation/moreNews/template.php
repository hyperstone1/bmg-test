
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
    $lang["POKAZAT_ESHE"] = "show more";


} else {
    $url_1 = "";
    $language = "RU";
    $lang["POKAZAT_ESHE"] = "показать еще";

}

?>

	<?if($arResult["NavPageCount"] > 1):?>
    
	    <?if ($arResult["NavPageNomer"]+1 <= $arResult["nEndPage"]):?>
	        <?
	        $plus = $arResult["NavPageNomer"]+1;
	        $url = $arResult["sUrlPathParams"] . "PAGEN_".$arResult["NavNum"]."=".$plus;
	        ?>
        <div class="load-more-items-news" data-url="<?=$url?>">
        <button class="btn-show_more news_company__show_more">
            <div class="btn-show_more-container">
              <div class="btn-show_more-text_container">
                <span class="btn-show_more--text"><?= $lang["POKAZAT_ESHE"];?></span>
              </div>
              <div class="btn-show_more-hover_container">
                <span class="btn-show_more--text"><?= $lang["POKAZAT_ESHE"];?></span>
              </div>
            </div>
            <div class="btn-show_more--icon">
              <div class="arrow_fill-next">
                <svg
                  width="30"
                  height="16"
                  viewBox="0 0 30 16"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M1 7C0.447715 7 0 7.44772 0 8C0 8.55228 0.447715 9 1 9V7ZM29.7071 8.70711C30.0976 8.31658 30.0976 7.68342 29.7071 7.29289L23.3431 0.928932C22.9526 0.538408 22.3195 0.538408 21.9289 0.928932C21.5384 1.31946 21.5384 1.95262 21.9289 2.34315L27.5858 8L21.9289 13.6569C21.5384 14.0474 21.5384 14.6805 21.9289 15.0711C22.3195 15.4616 22.9526 15.4616 23.3431 15.0711L29.7071 8.70711ZM1 9L29 9V7L1 7V9Z"
                    fill="#ffffff"
                  />
                </svg>
              </div>

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
                />
              </svg>
            </div>
          </button>
        </div>
	    <?endif?>
<?endif?>

