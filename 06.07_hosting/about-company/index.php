<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("BMG");

$url = $APPLICATION->GetCurPage();
$page = explode('/', $url);

if ($page[1] == "en") {
    $url_1 = "/en";
    $language = "EN";
    $lang["TITLE_NAME"] = "TITLE_NAME_EN";
    $lang["TITLE_DESCRIPTION"] = "TITLE_DESCRIPTION_EN";
    $lang["ZAYAVKA"] = "Submit your application";
    $lang["AGE"] = "years";
    $lang["DESCRIPTION_AGE"] = "DESCRIPTION_AGE_EN";
    $lang["ABOUT"] = "About company";
    $lang["O_COMPANY_TITLE"] = "O_COMPANY_BIG_EN";
    $lang["O_COMPANY_DESCRIPTION"] = "O_COMPANY_SMALL_EN";
    $lang["WORK_WITH"] = "WORK_WITH_EN";
    $lang["PREIMYSHESTVA_TITLE"] = "Advantages";
    $lang["PREIMYSHESTVA"] = "ADVANTAGES_EN";

} else {
    $url_1 = "";
    $language = "RU";
    $lang["TITLE_NAME"] = "TITLE_NAME";
    $lang["TITLE_DESCRIPTION"] = "TITLE_DESCRIPTION";
    $lang["ZAYAVKA"] = "Оставить заявку";
    $lang["AGE"] = "лет";
    $lang["DESCRIPTION_AGE"] = "DESCRIPTION_AGE";
    $lang["ABOUT"] = "О компании";
    $lang["O_COMPANY_TITLE"] = "O_COMPANY_BIG";
    $lang["O_COMPANY_DESCRIPTION"] = "O_COMPANY_SMALL";
    $lang["WORK_WITH"] = "WORK_WITH";
    $lang["PREIMYSHESTVA_TITLE"] = "Преимущества";
    $lang["PREIMYSHESTVA"] = "ADVANTAGES";


}


$arElement = CIBlockElement::GetList(
    Array("SORT" => "ASC"), // Сортировка элементов
    Array( "IBLOCK_ID" => 5),
    false,
    Array ("nTopCount" => 1)
);
while ($ob = $arElement->GetNextElement()) {
$arProperties = $ob->GetProperties();?>

<section class="about">
  <section class="about_aim">
    <div class="about_container">
      <div class="about_aim__complex">
        <div class="about_aim-title"><?=$arProperties[$lang["TITLE_NAME"]]['VALUE'];?></div>
        <div class="about_aim-subtitle">
            <?=$arProperties[$lang["TITLE_DESCRIPTION"]]['VALUE'];?>
        </div>
        <a href="#down1" class="about_aim__btn">
          <button class="btn-show_more">
            <div class="btn-show_more-container">
              <div class="btn-show_more-text_container">
                <span class="btn-show_more--text"><?=$lang["ZAYAVKA"];?></span>
              </div>
              <div class="btn-show_more-hover_container">
                <span class="btn-show_more--text"><?=$lang["ZAYAVKA"];?></span>
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
        </a>
      </div>
      <div class="about_aim__projects">
        <div class="about_aim__advantage">
          <div class="about_aim__advantage-title"><?=$arProperties['NUMBER_AGE']['VALUE'];?> <?=$lang["AGE"];?></div>
          <div class="about_aim__advantage-subscription">
              <?=$arProperties[$lang["DESCRIPTION_AGE"]]['VALUE'];?>
          </div>
        </div>
        <div class="about_aim__project">
          <div class="about_aim__project-img">
            <img src="/bitrix/templates/bmg/images/about/about_project_1.webp" alt="" />
          </div>
          <div class="about_aim__project-img">
            <img src="/bitrix/templates/bmg/images/about/about_project_2.webp" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="about_company">
    <div class="container about_company_container">
      <div class="about_company__gradient">
        <img src="/bitrix/templates/bmg/images/about/background.webp" alt="" />
      </div>
      <h2 class="about_company-title"><?=$lang["ABOUT"];?></h2>
      <div class="about_company__content">
        <div class="about_company__content-img">
          <img src="/bitrix/templates/bmg/images/about/about_company_img.webp" alt="" />
        </div>
        <div class="about_company__info">
          <div class="about_company__info_text">
            <h5 class="about_company__info-title"><?=$arProperties[$lang["O_COMPANY_TITLE"]]['VALUE'];?></h5>
            <span class="about_company__info-subscription">
              <p>
                  
                 <?php echo $arProperties[$lang["O_COMPANY_DESCRIPTION"]]['~VALUE']['TEXT'];?>
              </p>
            </span>
          </div>

          <div class="about_company__footer">
            <div class="about_company__footer-work"> <?=$arProperties[$lang["WORK_WITH"]]['VALUE'];?></div>
            <div class="about_company__footer__img">
              <img src="/bitrix/templates/bmg/images/about/footer_img.webp" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about_advantages">
    <div class="container about_advantages_container">
      <div class="about_advantages-title"><?=$lang["PREIMYSHESTVA_TITLE"];?></div>
      <div class="about_advantages__list">
          <?php

          foreach ($arProperties[$lang["PREIMYSHESTVA"]]['VALUE'] as $advantage) {
          ?>
        <div class="about_advantages__list-advantage">
          <div class="about_advantages__list-gradient">
            <img
              src="/bitrix/templates/bmg/images/about/gradient_1.webp"
              alt="<?=$advantage;?>"
            />
          </div>
          <div class="about_advantages__list-title"><?=$advantage;?></div>
        </div>
          <?php } ?>
      </div>
    </div>
  </section>
</section>
    
<?php } ?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/bmg/сonnection.php");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>


