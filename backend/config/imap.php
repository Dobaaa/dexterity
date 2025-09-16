<?php
/*
* File:     imap.php
* Category: config
* Author:   M. Goldenbaum
* Created:  24.09.16 22:36
* Updated:  -
*
* Description:
*  Laravel IMAP integration configuration
*/

return [

    /*
    |--------------------------------------------------------------------------
    | IMAP default account
    |--------------------------------------------------------------------------
    */
    'default' => env('IMAP_DEFAULT_ACCOUNT', 'default'),

    /*
    |--------------------------------------------------------------------------
    | Default date format
    |--------------------------------------------------------------------------
    */
    'date_format' => 'd-M-Y',

    /*
    |--------------------------------------------------------------------------
    | Available IMAP accounts
    |--------------------------------------------------------------------------
    | إعدادات البريد الإلكتروني
    */
    'accounts' => [

        'default' => [
         'host'          => env('MAIL_HOST', 'localhost'),
         'port'          => env('MAIL_PORT', 993),
        'protocol'      => 'imap',
        'encryption'    => env('MAIL_ENCRYPTION', 'ssl'), 
        'validate_cert' => true,
        'username'      => env('MAIL_USERNAME'),
        'password'      => env('MAIL_PASSWORD'),

            // لو مش محتاج بروكسي سيب القيم دي فاضية
            'proxy' => [
                'socket'          => null,
                'request_fulluri' => false,
                'username'        => null,
                'password'        => null,
            ],
            "timeout" => 30,
            "extensions" => []
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IMAP options
    |--------------------------------------------------------------------------
    */
    'options' => [
        'delimiter' => '/',
        'fetch' => \Webklex\PHPIMAP\IMAP::FT_PEEK,
        'sequence' => \Webklex\PHPIMAP\IMAP::ST_UID,
        'fetch_body' => true,
        'fetch_flags' => true,
        'soft_fail' => false,
        'rfc822' => true,
        'debug' => false,
        'uid_cache' => true,
        'boundary' => '/boundary=(.*?(?=;)|(.*))/i',
        'message_key' => 'list',
        'fetch_order' => 'asc',
        'dispositions' => ['attachment', 'inline'],
        'common_folders' => [
            "root"   => "INBOX",
            "junk"   => "INBOX/Junk",
            "draft"  => "INBOX/Drafts",
            "sent"   => "INBOX/Sent",
            "trash"  => "INBOX/Trash",
        ],
        'open' => [
            // 'DISABLE_AUTHENTICATOR' => 'GSSAPI'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Decoding options
    |--------------------------------------------------------------------------
    */
    'decoding' => [
        'options' => [
            'header'     => 'utf-8',
            'message'    => 'utf-8',
            'attachment' => 'utf-8'
        ],
        'decoder' => [
            'header'     => \Webklex\PHPIMAP\Decoder\HeaderDecoder::class,
            'message'    => \Webklex\PHPIMAP\Decoder\MessageDecoder::class,
            'attachment' => \Webklex\PHPIMAP\Decoder\AttachmentDecoder::class
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Available flags
    |--------------------------------------------------------------------------
    */
    'flags' => ['recent', 'flagged', 'answered', 'deleted', 'seen', 'draft'],

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    */
    'events' => [
        "message" => [
            'new'      => \Webklex\IMAP\Events\MessageNewEvent::class,
            'moved'    => \Webklex\IMAP\Events\MessageMovedEvent::class,
            'copied'   => \Webklex\IMAP\Events\MessageCopiedEvent::class,
            'deleted'  => \Webklex\IMAP\Events\MessageDeletedEvent::class,
            'restored' => \Webklex\IMAP\Events\MessageRestoredEvent::class,
        ],
        "folder" => [
            'new'     => \Webklex\IMAP\Events\FolderNewEvent::class,
            'moved'   => \Webklex\IMAP\Events\FolderMovedEvent::class,
            'deleted' => \Webklex\IMAP\Events\FolderDeletedEvent::class,
        ],
        "flag" => [
            'new'     => \Webklex\IMAP\Events\FlagNewEvent::class,
            'deleted' => \Webklex\IMAP\Events\FlagDeletedEvent::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Masks
    |--------------------------------------------------------------------------
    */
    'masks' => [
        'message'    => \Webklex\PHPIMAP\Support\Masks\MessageMask::class,
        'attachment' => \Webklex\PHPIMAP\Support\Masks\AttachmentMask::class
    ]
];
