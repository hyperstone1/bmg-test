<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


$url = $APPLICATION->GetCurPage();
$page = explode('/', $url);

if ($page[1] == "en") {
    $url_1 = "/en";
    $language = "EN";
    $lang["TITLE1"] = "What is included in the service";
    $lang["ZAYAVKA"] = "Submit your application";
    $lang["NAME"] = "NAME_EN";
    $lang["NAME_DETAIL"] = "NAME_DETAIL_EN";
    $lang["POD_NAME_DETAIL"] = "POD_NAME_DETAIL_EN";
    $lang["COD_SLOVO"] = "COD_SLOVO_EN";
    $lang["DETAIL_TEXT_USLUGA"] = "DETAIL_TEXT_USLUGA_EN";

} else {
    $url_1 = "";
    $language = "RU";
    $lang["TITLE1"] = "Что входит в услугу";
    $lang["ZAYAVKA"] = "Оставить заявку";
    $lang["NAME"] = "NAME";
    $lang["NAME_DETAIL"] = "NAME_DETAIL";
    $lang["POD_NAME_DETAIL"] = "POD_NAME_DETAIL";
    $lang["COD_SLOVO"] = "COD_SLOVO";
    $lang["DETAIL_TEXT_USLUGA"] = "DETAIL_TEXT_USLUGA";


}



$arElementServices = CIBlockElement::GetList(
  Array("SORT" => "ASC"), // Сортировка элементов
  Array( "IBLOCK_ID" => 2, 'ACTIVE' => 'Y', "CODE" => $_GET['ELEMENT_CODE']),
  false,
  Array("nTopCount" => 1)
 );
 while ($obServices = $arElementServices->GetNextElement()) {
  $arFieldsServices = $obServices->GetFields();

  $arPropertiesServices = $obServices->GetProperties();

     if ($page[1] == "en") {
         $APPLICATION->SetTitle($arPropertiesServices[$lang["NAME"]]['VALUE']);
     } else {
         $APPLICATION->SetTitle($arFieldsServices[$lang["NAME"]]);
     }


?>
         
<section class="brokeridge">
  <div class="brokeridge-gradient">
    <img src="/bitrix/templates/bmg/images/news/news_gradient.webp" alt="" />
  </div>
  <section class="brokeridge_summary">
    <div class="brokeridge_summary__container">
      <div class="brokeridge_summary__text">
        <div class="brokeridge_summary__text-title">
          <?=$arPropertiesServices[$lang["NAME_DETAIL"]]['VALUE']; ?>
        </div>
        <div class="brokeridge_summary__text-description">
        <?=$arPropertiesServices[$lang["POD_NAME_DETAIL"]]['VALUE']; ?>


        </div>
      </div>
    </div>
    <div class="brokeridge_summary-img">
      <img src="<?=CFile::GetPath($arPropertiesServices['IMG_DETAIL']['VALUE'][0]); ?>" alt="" />
    </div>
  </section>
  <section class="brokeridge_company">
    <div class="brokeridge_company_container">
      <div class="brokeridge_company-title"><?=$lang["TITLE1"];?></div>
      <div class="brokeridge_company__brokeridge">
        <div class="brokeridge_company__brokeridge_list">
          <?php
          $countCodeSlovo = count($arPropertiesServices[$lang["COD_SLOVO"]]['VALUE']);
          for ($i = 0; $i < $countCodeSlovo ; $i++) { ?>
          <div class="brokeridge_company__brokeridge_list-item">
            <div class="brokeridge_company__brokeridge_list_description">
              <div class="brokeridge_company__brokeridge_list_description-title"><?=$arPropertiesServices[$lang["COD_SLOVO"]]['VALUE'][$i];?></div>
              <div class="brokeridge_company__brokeridge_list_description-text">
                  <?=$arPropertiesServices[$lang["DETAIL_TEXT_USLUGA"]]['~VALUE'][$i]['TEXT'];?>
              </div>
            </div>
          </div>
          <?php } ?>
          <a href="#down1" class="btn__submit">
            <button class="btn-show_more portfolio_projects__projects_show">
                <div class="btn-show_more-container">
                  <div class="btn-show_more-text_container">
                    <span class="btn-show_more--text"><?=$lang["ZAYAVKA"];?></span>
                  </div>
                  <div class="btn-show_more-hover_container">
                    <span class="btn-show_more--text"><?=$lang["ZAYAVKA"];?></span>
                  </div>
                </div>
                <div class="btn-show_more--icon">
                  <!-- <div class="arrow_next-hover_container banner-arrow"> -->
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
                      ></path>
                    </svg>
                  </div>

                  <!-- </div> -->
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
          </a>
        </div>
      </div>
      <div class="brokeridge_company-img">
        <img src="<?=CFile::GetPath($arPropertiesServices['IMG_DETAIL']['VALUE'][1]); ?>" alt="" />
      </div>
    </div>
  </section>
</section>
<? }
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/bmg/сonnection.php");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
