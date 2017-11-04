#!/bin/bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
 
## urlにc9のURLを入力
wp core install --url='https://ck200-konno.c9users.io' --title='wordpress' --admin_name='admin' --admin_password='admin' --admin_email='konnokiyotaka@gmail.com'
 
## 日本語化
wp core language install ja
wp core language activate ja
 
## いろいろなプラグインをインストール
echo "いろいろなプラグインをインストールしますか? [Y/N]"
read ANSWER1
 
case $ANSWER1 in
"" | "Y" | "y" | "yes" | "Yes" | "YES" )
wp plugin install wp-multibyte-patch \
theme-check \
debug-bar \
debug-bar-extender \
contact-form-7 \
contact-form-7-to-database-extension \
contact-form-7-add-confirm \
category-posts \
lightweight-social-icons \
slack \
google-analytics-dashboard-for-wp \
amazon-web-services \
amazon-s3-and-cloudfront \
arconix-faq \
bwp-google-xml-sitemaps \
siteorigin-panels \
so-widgets-bundle \
smart-slider-3 \
tablepress \
tinymce-advanced \
wp-total-hacks \
wp-mail-smtp \
wordpress-seo \
wordpress-importer \
wp-social-bookmarking-light \
broken-link-checker \
jetpack \
syntaxhighlighter \
wp-pagenavi \
--activate
;;
* ) echo "plugin Done!";;
esac
 
## テーマユニットテストデータのインストール
echo "テーマユニットテストデータをインストールしますか? [Y/N]"
read ANSWER2
 
case $ANSWER2 in
"" | "Y" | "y" | "yes" | "Yes" | "YES" )
wget https://raw.github.com/jawordpressorg/theme-test-data-ja/master/wordpress-theme-test-date-ja.xml &amp;&amp; wp plugin install wordpress-importer --activate &amp;&amp; wp import wordpress-theme-test-date-ja.xml --authors=create &amp;&amp; rm wordpress-theme-test-date-ja.xml &amp;&amp; echo "Theme Test Data install Done!!";;
esac
 
## オプション
wp option update timezone_string 'Asia/Tokyo'
wp option update date_format 'Y年n月j日'
wp option update time_format 'H:i'
 
## プラグインとテーマのアプデ
wp plugin update-all
wp theme update-all
 
## 翻訳ファイルのアプデ
wp core language update
 
## 日本語コアファイルのアプデ
wp core update --locale=ja --force
wp core update-db