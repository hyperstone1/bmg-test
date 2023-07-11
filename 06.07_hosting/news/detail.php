<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


$url = $APPLICATION->GetCurPage();
$page = explode('/', $url);


if ($page[1] == "en") {
    $APPLICATION->SetTitle("NEWS");
    $url_1 = "/en";
    $language = "EN";
    include_once "description_en.php";
} else {
    $APPLICATION->SetTitle("Новости");
    $url_1 = "";
    $language = "RU";
    include_once "description_ru.php";
}

?>
<section class="news_details">
  <div class="news_details_container">
    <div class="news_details__info">
      <div class="news_details__info-subtitle"><?=$lang["TITLE1"];?></div>
        <?php
        $arElementNew = CIBlockElement::GetList(
            Array("SORT" => "ASC"),
            Array("IBLOCK_ID" => 4, 'ACTIVE' => 'Y', "CODE" => $_GET['ELEMENT_CODE']),
            false,
            Array(),
            Array("NAME", "PROPERTY_FULL_NEWS", "PROPERTY_FULL_NEWS_EN", "PREVIEW_PICTURE", "PROPERTY_CATEGORY", "PROPERTY_CATEGORY_EN", "DETAIL_TEXT", "PREVIEW_TEXT")
        );
        while ($obNew = $arElementNew->GetNext()) {
        ?>
      <div class="news_details__info-title">
          <?=$obNew[$lang["FULL_NEWS_NAME"]];?>
      </div>
      <div class="news_details__info-img">
        <img src="<?=CFile::GetPath($obNew['PREVIEW_PICTURE'])?>" alt="" />
      </div>
      <div class="news_details__info-chapter"><?=$obNew[$lang["CATEGORY"]];?></div>
      <div class="news_details__info-text">
          <?=$obNew[$lang["NEWS_DESCRIPTION_DETAIL"]];?>
      </div>
        <?php } ?>
    </div>
    <div class="news_details__other_news">
      <div class="news_details__other_news-list">
          <?php
          $arElementLastNews = CIBlockElement::GetList(
              Array("PROPERTY_DATE_NEWS" => "DESC"), // Сортировка по дате 
              Array( "IBLOCK_ID" => 4, 'ACTIVE' => 'Y', "SECTION_ID" => 16 ),
              false,
              Array ("nTopCount" => 3),
              Array ("NAME", "PROPERTY_NAME_EN", "DETAIL_PAGE_URL", "PROPERTY_CATEGORY", "PROPERTY_CATEGORY_EN", "PROPERTY_SMALL_TEXT_CARD", "PROPERTY_SMALL_TEXT_CARD_EN")
          );
          while ($obLastNews = $arElementLastNews->GetNext()) {
          ?>
        <a href="<?=$url_1;?><?=$obLastNews['DETAIL_PAGE_URL'];?>">
            <div class="news_details__other_news-item">
              <div class="news_details__other_news-chapter"><?=$obLastNews[$lang["CATEGORY"]];?></div>
              <div class="news_details__other_news-title"><?=$obLastNews[$lang["NAME_NEWS"]];?></div>
              <div class="news_details__other_news-text">
                  <?=$obLastNews[$lang["NEWS_DESCRIPTION_SMALL"]];?>
              </div>
            </div>
        </a>
          <?php } ?>
      </div>
    </div>
  </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
