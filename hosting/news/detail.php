<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
?>
<section class="news_details">
  <div class="news_details_container">
    <div class="news_details__info">
      <div class="news_details__info-subtitle">Будь в курсе</div>
        <?php
        $arElementNew = CIBlockElement::GetList(
            Array("SORT" => "ASC"),
            Array("IBLOCK_ID" => 4, "ID" => $_GET['ID']),
            false
        );
        while ($obNew = $arElementNew->GetNextElement()) {
        $arFieldsNew = $obNew->GetFields();
        $arPropertiesNew = $obNew->GetProperties();
        ?>
      <div class="news_details__info-title">
          <?=$arPropertiesNew['FULL_NEWS']['VALUE'];?>
      </div>
      <div class="news_details__info-img">
        <img src="<?=CFile::GetPath($arFieldsNew['DETAIL_PICTURE'])?>" alt="" />
      </div>
      <div class="news_details__info-chapter"><?=$arPropertiesNew['CATEGORY']['VALUE'];?></div>
      <div class="news_details__info-text">
          <?=$arFieldsNew['DETAIL_TEXT'];?>
      </div>
        <?php } ?>
    </div>
    <div class="news_details__other_news">
      <div class="news_details__other_news-list">
          <?php
          $arElementLastNews = CIBlockElement::GetList(
              Array("ACTIVE_FROM" => "DESC"), // Сортировка по дате активности, с самой поздней
              Array("IBLOCK_ID" => 4),
              false,
              Array ("nTopCount" => 3)
          );
          while ($obLastNews = $arElementLastNews->GetNextElement()) {
          $arFieldsLastNews = $obLastNews->GetFields();
          $arPropertiesLastNews = $obLastNews->GetProperties();
          ?>
        <a href="<?=$arFieldsLastNews['DETAIL_PAGE_URL'];?>">
            <div class="news_details__other_news-item">
              <div class="news_details__other_news-chapter"><?=$arPropertiesLastNews['CATEGORY']['VALUE'];?></div>
              <div class="news_details__other_news-title"><?=$arFieldsLastNews['NAME'];?></div>
              <div class="news_details__other_news-text">
                  <?=$arFieldsLastNews['PREVIEW_TEXT'];?>
              </div>
            </div>
        </a>
          <?php } ?>
      </div>
    </div>
  </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
