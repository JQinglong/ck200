<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{

    public $autoId = false;

    public function up()
    {

        $this->table('CK200_M_HSK')
            ->addColumn('ID', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addPrimaryKey(['ID'])
            ->addColumn('LEVEL', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('WORD', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $this->table('CK200_M_SINGER')
            ->addColumn('ID', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addPrimaryKey(['ID'])
            ->addColumn('SINGER_CD', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('SINGER_NM', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('IMG_URL', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $this->table('CK200_M_TITLE')
            ->addColumn('ID', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addPrimaryKey(['ID'])
            ->addColumn('MUSIC_CD', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('TITLE_NM', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('LYLICS', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('SINGER_CD', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('CK200_T_LYLICS')
            ->addColumn('ID', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addPrimaryKey(['ID'])
            ->addColumn('MUSIC_CD', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('ORD', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('LYLICS', 'string', [
                'default' => null,
                'limit' => 4,
                'null' => false,
            ])
            ->create();

        $this->table('hskwords')
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('level', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('word', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $this->table('lylics')
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('music_id', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('ord', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('lylics', 'string', [
                'default' => null,
                'limit' => 4,
                'null' => false,
            ])
            ->create();

        $this->table('music_hskcounts')
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('music_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('level', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('cnt_lylics', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('cnt_dist', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('musics')
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('music_nm', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('lylicstr', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('singer_id', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('cnt_lylics', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('cnt_dist', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('singers')
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('singer_nm', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('img_url', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $this->table('users')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('kana', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('address', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('age', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('wp_blc_filters')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('params', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('wp_blc_instances')
            ->addColumn('instance_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['instance_id'])
            ->addColumn('link_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('container_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('container_type', 'string', [
                'default' => 'post',
                'limit' => 40,
                'null' => false,
            ])
            ->addColumn('link_text', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('parser_type', 'string', [
                'default' => 'link',
                'limit' => 40,
                'null' => false,
            ])
            ->addColumn('container_field', 'string', [
                'default' => '',
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('link_context', 'string', [
                'default' => '',
                'limit' => 250,
                'null' => false,
            ])
            ->addColumn('raw_url', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'link_id',
                ]
            )
            ->addIndex(
                [
                    'container_type',
                    'container_id',
                ]
            )
            ->addIndex(
                [
                    'parser_type',
                ]
            )
            ->create();

        $this->table('wp_blc_links')
            ->addColumn('link_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['link_id'])
            ->addColumn('url', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('first_failure', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('last_check', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('last_success', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('last_check_attempt', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('check_count', 'integer', [
                'default' => '0',
                'limit' => 4,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('final_url', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('redirect_count', 'integer', [
                'default' => '0',
                'limit' => 5,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('log', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('http_code', 'integer', [
                'default' => '0',
                'limit' => 6,
                'null' => false,
            ])
            ->addColumn('status_code', 'string', [
                'default' => '',
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('status_text', 'string', [
                'default' => '',
                'limit' => 250,
                'null' => true,
            ])
            ->addColumn('request_duration', 'float', [
                'default' => '0',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('timeout', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('broken', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('warning', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('may_recheck', 'boolean', [
                'default' => true,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('being_checked', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('result_hash', 'string', [
                'default' => '',
                'limit' => 200,
                'null' => false,
            ])
            ->addColumn('false_positive', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('dismissed', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'url',
                ]
            )
            ->addIndex(
                [
                    'final_url',
                ]
            )
            ->addIndex(
                [
                    'http_code',
                ]
            )
            ->addIndex(
                [
                    'broken',
                ]
            )
            ->create();

        $this->table('wp_blc_synch')
            ->addColumn('container_id', 'integer', [
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('container_type', 'string', [
                'default' => null,
                'limit' => 40,
                'null' => false,
            ])
            ->addPrimaryKey(['container_id', 'container_type'])
            ->addColumn('synched', 'integer', [
                'default' => null,
                'limit' => 2,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('last_synch', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'synched',
                ]
            )
            ->create();

        $this->table('wp_commentmeta')
            ->addColumn('meta_id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['meta_id'])
            ->addColumn('comment_id', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('meta_key', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('meta_value', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => true,
            ])
            ->addIndex(
                [
                    'comment_id',
                ]
            )
            ->addIndex(
                [
                    'meta_key',
                ]
            )
            ->create();

        $this->table('wp_comments')
            ->addColumn('comment_ID', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['comment_ID'])
            ->addColumn('comment_post_ID', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('comment_author', 'text', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('comment_author_email', 'string', [
                'default' => '',
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('comment_author_url', 'string', [
                'default' => '',
                'limit' => 200,
                'null' => false,
            ])
            ->addColumn('comment_author_IP', 'string', [
                'default' => '',
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('comment_date', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('comment_date_gmt', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('comment_content', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('comment_karma', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('comment_approved', 'string', [
                'default' => '1',
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('comment_agent', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('comment_type', 'string', [
                'default' => '',
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('comment_parent', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('user_id', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'comment_post_ID',
                ]
            )
            ->addIndex(
                [
                    'comment_approved',
                    'comment_date_gmt',
                ]
            )
            ->addIndex(
                [
                    'comment_date_gmt',
                ]
            )
            ->addIndex(
                [
                    'comment_parent',
                ]
            )
            ->addIndex(
                [
                    'comment_author_email',
                ]
            )
            ->create();

        $this->table('wp_links')
            ->addColumn('link_id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['link_id'])
            ->addColumn('link_url', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('link_name', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('link_image', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('link_target', 'string', [
                'default' => '',
                'limit' => 25,
                'null' => false,
            ])
            ->addColumn('link_description', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('link_visible', 'string', [
                'default' => 'Y',
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('link_owner', 'biginteger', [
                'default' => '1',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('link_rating', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('link_updated', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('link_rel', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('link_notes', 'text', [
                'default' => null,
                'limit' => 16777215,
                'null' => false,
            ])
            ->addColumn('link_rss', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => false,
            ])
            ->addIndex(
                [
                    'link_visible',
                ]
            )
            ->create();

        $this->table('wp_nextend2_image_storage')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('hash', 'string', [
                'default' => null,
                'limit' => 32,
                'null' => false,
            ])
            ->addColumn('image', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('value', 'text', [
                'default' => null,
                'limit' => 16777215,
                'null' => false,
            ])
            ->addIndex(
                [
                    'hash',
                ],
                ['unique' => true]
            )
            ->create();

        $this->table('wp_nextend2_section_storage')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('application', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('section', 'string', [
                'default' => null,
                'limit' => 128,
                'null' => false,
            ])
            ->addColumn('referencekey', 'string', [
                'default' => null,
                'limit' => 128,
                'null' => false,
            ])
            ->addColumn('value', 'text', [
                'default' => null,
                'limit' => 16777215,
                'null' => false,
            ])
            ->addColumn('system', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('editable', 'integer', [
                'default' => '1',
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'application',
                    'section',
                    'referencekey',
                ]
            )
            ->addIndex(
                [
                    'application',
                    'section',
                ]
            )
            ->create();

        $this->table('wp_nextend2_smartslider3_generators')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('group', 'string', [
                'default' => null,
                'limit' => 254,
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 254,
                'null' => false,
            ])
            ->addColumn('params', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('wp_nextend2_smartslider3_sliders')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('params', 'text', [
                'default' => null,
                'limit' => 16777215,
                'null' => false,
            ])
            ->addColumn('time', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('thumbnail', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('ordering', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('wp_nextend2_smartslider3_sliders_xref')
            ->addColumn('group_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('slider_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['group_id', 'slider_id'])
            ->addColumn('ordering', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('wp_nextend2_smartslider3_slides')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 200,
                'null' => false,
            ])
            ->addColumn('slider', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('publish_up', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('publish_down', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('published', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('first', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('slide', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => true,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('thumbnail', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('params', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('ordering', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('generator_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('wp_options')
            ->addColumn('option_id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['option_id'])
            ->addColumn('option_name', 'string', [
                'default' => '',
                'limit' => 191,
                'null' => false,
            ])
            ->addColumn('option_value', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => false,
            ])
            ->addColumn('autoload', 'string', [
                'default' => 'yes',
                'limit' => 20,
                'null' => false,
            ])
            ->addIndex(
                [
                    'option_name',
                ],
                ['unique' => true]
            )
            ->create();

        $this->table('wp_postmeta')
            ->addColumn('meta_id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['meta_id'])
            ->addColumn('post_id', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('meta_key', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('meta_value', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => true,
            ])
            ->addIndex(
                [
                    'post_id',
                ]
            )
            ->addIndex(
                [
                    'meta_key',
                ]
            )
            ->create();

        $this->table('wp_posts')
            ->addColumn('ID', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['ID'])
            ->addColumn('post_author', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('post_date', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('post_date_gmt', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('post_content', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => false,
            ])
            ->addColumn('post_title', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('post_excerpt', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('post_status', 'string', [
                'default' => 'publish',
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('comment_status', 'string', [
                'default' => 'open',
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('ping_status', 'string', [
                'default' => 'open',
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('post_password', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('post_name', 'string', [
                'default' => '',
                'limit' => 200,
                'null' => false,
            ])
            ->addColumn('to_ping', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('pinged', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('post_modified', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('post_modified_gmt', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('post_content_filtered', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => false,
            ])
            ->addColumn('post_parent', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('guid', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('menu_order', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('post_type', 'string', [
                'default' => 'post',
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('post_mime_type', 'string', [
                'default' => '',
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('comment_count', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
            ])
            ->addIndex(
                [
                    'post_name',
                ]
            )
            ->addIndex(
                [
                    'post_type',
                    'post_status',
                    'post_date',
                    'ID',
                ]
            )
            ->addIndex(
                [
                    'post_parent',
                ]
            )
            ->addIndex(
                [
                    'post_author',
                ]
            )
            ->create();

        $this->table('wp_term_relationships')
            ->addColumn('object_id', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('term_taxonomy_id', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['object_id', 'term_taxonomy_id'])
            ->addColumn('term_order', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'term_taxonomy_id',
                ]
            )
            ->create();

        $this->table('wp_term_taxonomy')
            ->addColumn('term_taxonomy_id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['term_taxonomy_id'])
            ->addColumn('term_id', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('taxonomy', 'string', [
                'default' => '',
                'limit' => 32,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => false,
            ])
            ->addColumn('parent', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('count', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
            ])
            ->addIndex(
                [
                    'term_id',
                    'taxonomy',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'taxonomy',
                ]
            )
            ->create();

        $this->table('wp_termmeta')
            ->addColumn('meta_id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['meta_id'])
            ->addColumn('term_id', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('meta_key', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('meta_value', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => true,
            ])
            ->addIndex(
                [
                    'term_id',
                ]
            )
            ->addIndex(
                [
                    'meta_key',
                ]
            )
            ->create();

        $this->table('wp_terms')
            ->addColumn('term_id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['term_id'])
            ->addColumn('name', 'string', [
                'default' => '',
                'limit' => 200,
                'null' => false,
            ])
            ->addColumn('slug', 'string', [
                'default' => '',
                'limit' => 200,
                'null' => false,
            ])
            ->addColumn('term_group', 'biginteger', [
                'default' => '0',
                'limit' => 10,
                'null' => false,
            ])
            ->addIndex(
                [
                    'slug',
                ]
            )
            ->addIndex(
                [
                    'name',
                ]
            )
            ->create();

        $this->table('wp_usermeta')
            ->addColumn('umeta_id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['umeta_id'])
            ->addColumn('user_id', 'biginteger', [
                'default' => '0',
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('meta_key', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('meta_value', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => true,
            ])
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->addIndex(
                [
                    'meta_key',
                ]
            )
            ->create();

        $this->table('wp_users')
            ->addColumn('ID', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['ID'])
            ->addColumn('user_login', 'string', [
                'default' => '',
                'limit' => 60,
                'null' => false,
            ])
            ->addColumn('user_pass', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('user_nicename', 'string', [
                'default' => '',
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('user_email', 'string', [
                'default' => '',
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('user_url', 'string', [
                'default' => '',
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('user_registered', 'datetime', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('user_activation_key', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('user_status', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('display_name', 'string', [
                'default' => '',
                'limit' => 250,
                'null' => false,
            ])
            ->addIndex(
                [
                    'user_login',
                ]
            )
            ->addIndex(
                [
                    'user_nicename',
                ]
            )
            ->addIndex(
                [
                    'user_email',
                ]
            )
            ->create();

        $this->table('wp_yoast_seo_links')
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('url', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('post_id', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('target_post_id', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addIndex(
                [
                    'post_id',
                    'type',
                ]
            )
            ->create();

        $this->table('wp_yoast_seo_meta')
            ->addPrimaryKey([''])
            ->addColumn('object_id', 'biginteger', [
                'default' => null,
                'limit' => 20,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('internal_link_count', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('incoming_link_count', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'object_id',
                ],
                ['unique' => true]
            )
            ->create();
    }

    public function down()
    {
        $this->dropTable('CK200_M_HSK');
        $this->dropTable('CK200_M_SINGER');
        $this->dropTable('CK200_M_TITLE');
        $this->dropTable('CK200_T_LYLICS');
        $this->dropTable('hskwords');
        $this->dropTable('lylics');
        $this->dropTable('music_hskcounts');
        $this->dropTable('musics');
        $this->dropTable('singers');
        $this->dropTable('users');
        $this->dropTable('wp_blc_filters');
        $this->dropTable('wp_blc_instances');
        $this->dropTable('wp_blc_links');
        $this->dropTable('wp_blc_synch');
        $this->dropTable('wp_commentmeta');
        $this->dropTable('wp_comments');
        $this->dropTable('wp_links');
        $this->dropTable('wp_nextend2_image_storage');
        $this->dropTable('wp_nextend2_section_storage');
        $this->dropTable('wp_nextend2_smartslider3_generators');
        $this->dropTable('wp_nextend2_smartslider3_sliders');
        $this->dropTable('wp_nextend2_smartslider3_sliders_xref');
        $this->dropTable('wp_nextend2_smartslider3_slides');
        $this->dropTable('wp_options');
        $this->dropTable('wp_postmeta');
        $this->dropTable('wp_posts');
        $this->dropTable('wp_term_relationships');
        $this->dropTable('wp_term_taxonomy');
        $this->dropTable('wp_termmeta');
        $this->dropTable('wp_terms');
        $this->dropTable('wp_usermeta');
        $this->dropTable('wp_users');
        $this->dropTable('wp_yoast_seo_links');
        $this->dropTable('wp_yoast_seo_meta');
    }
}

