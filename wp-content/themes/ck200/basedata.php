<?php
/**
 * Template Name: basedata
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package islemag
 */
 
session_start();

get_header();

?>
<table id="grid-data" class="table table-condensed table-hover table-striped">
    <thead>
        <tr>
            <th data-column-id="id" data-type="numeric">ID</th>
            <th data-column-id="曲名">曲名</th>
            <th data-column-id="歌手" data-order="desc">歌手</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
        </tr>
    </thead>
</table>

<table id="grid-basic" class="table table-condensed table-hover table-striped">
<thead>
  <tr>
    <th data-column-id="id" data-type="numeric">ID</th>
    <th data-column-id="namae">名前</th>
    <th data-column-id="received" data-order="desc">メール</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>1</td>
    <td>たろう</td>
    <td>taro@gmail.co</td>
  </tr>
  <tr>
    <td>2</td>
    <td>じろう</td>
    <td>jiro@gmail.co</td>
  </tr>
  <tr>
    <td>3</td>
    <td>さぶろう</td>
    <td>36@gmail.co</td>
  </tr>
  <tr>
    <td>4</td>
    <td>たけし</td>
    <td>take@gmail.co</td>
  </tr>
  <tr>
    <td>5</td>
    <td>佐藤</td>
    <td>suger@icloud.com</td>
  </tr>
  <tr>
    <td>6</td>
    <td>高橋</td>
    <td>taka@gmail.co</td>
  </tr>
  <tr>
    <td>7</td>
    <td>伊藤</td>
    <td>i10@gmail.co</td>
  </tr>
  <tr>
    <td>8</td>
    <td>渡辺</td>
    <td>watanabe@gmail.co</td>
  </tr>
  <tr>
    <td>8</td>
    <td>渡辺</td>
    <td>watanabe@gmail.co</td>
  </tr>
  <tr>
    <td>9</td>
    <td>小林</td>
    <td>koba@gmail.co</td>
  </tr>
  <tr>
    <td>10</td>
    <td>吉田</td>
    <td>yosi@gmail.co</td>
  </tr>
  <tr>
    <td>11</td>
    <td>松本</td>
    <td>mat@gmail.co</td>
  </tr>
  <tr>
    <td>13</td>
    <td>佐々木</td>
    <td>s@gmail.co</td>
  </tr>
</tbody>
</table>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/wp-content/themes/ck200/js/jquery.bootgrid.min.js"></script>
<script>
$(function() {
  $("#grid-basic").bootgrid();
});
</script>

<?php get_footer(); ?>
