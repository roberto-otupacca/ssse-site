<?php

return [
    'userManagement' => [
        'title'          => 'Gestione Utenti',
        'title_singular' => 'Gestione Utenti',
    ],
    'permission'     => [
        'title'          => 'Permessi',
        'title_singular' => 'Permesso',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Nome',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'           => [
        'title'          => 'Ruoli',
        'title_singular' => 'Ruolo',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Nome',
            'title_helper'       => ' ',
            'permissions'        => 'Permessi',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'           => [
        'title'          => 'Utenti',
        'title_singular' => 'Utente',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Nome',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verificata al',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Ruoli',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'link'           => [
        'title'          => 'Links',
        'title_singular' => 'Link',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'link'                 => 'Url',
            'link_helper'          => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'title'                => 'Titolo',
            'title_helper'         => ' ',
            'display_order'        => 'Nro Ord.',
            'display_order_helper' => ' ',
            'category'             => 'Categoria/sezione (colore)',
            'category_helper'      => ' ',
            'pages'                => 'Pagine collegate',
            'pages_helper'         => ' ',
            'news'                 => 'News collegate',
            'news_helper'          => ' ',
        ],
    ],
    'page'           => [
        'title'          => 'Pagine',
        'title_singular' => 'Pagine',
        'title_tree' => 'Albero delle pagine',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'title'                => 'Titolo',
            'title_helper'         => ' ',
            'text'                 => 'Testo',
            'text_helper'          => ' ',
            'menu_top'             => 'Vis. menu sopra',
            'menu_top_helper'      => ' ',
            'menu_right'           => 'Vis. menu destra',
            'menu_right_helper'    => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'photo'                => 'Foto',
            'photo_helper'         => ' ',
            'display_order'        => 'Nro Ord.',
            'display_order_helper' => ' ',
            'parent'               => 'Pagina padre',
            'parent_helper'        => ' ',
            'slug'                 => 'Url relativo',
            'slug_helper'          => ' ',
            'color'                => 'Colore',
            'color_helper'         => ' ',
            'draft'                => 'Bozza',
            'draft_helper'         => ' ',
        ],
    ],
    'news'           => [
        'title'          => 'News',
        'title_singular' => 'News',
        'title_tree'     => 'Albero delle news',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'title'             => 'Titolo',
            'title_helper'      => ' ',
            'text'              => 'Testo',
            'text_helper'       => ' ',
            'date_start'        => 'Data inizio validità',
            'date_start_helper' => ' ',
            'date_end'          => 'Data fine validità',
            'date_end_helper'   => ' ',
            'photo'             => 'Foto',
            'photo_helper'      => ' ',
            'slug'              => 'Url relativo',
            'slug_helper'       => ' ',
            'category'          => 'Categoria/sezione',
            'category_helper'   => ' ',
            'text_color'        => 'Colore testo titolo news:',
            'text_color_helper' => ' ',
        ],
    ],
    'category'       => [
        'title'          => 'Sezioni/categorie',
        'title_singular' => 'Sezioni/categorie',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Nome',
            'name_helper'          => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'description'          => 'Descrizione',
            'description_helper'   => ' ',
            'color'                => 'Colore',
            'color_helper'         => ' ',
            'display_order'        => 'Nro ord.',
            'display_order_helper' => ' ',
        ],
    ],
    'file'           => [
        'title'          => 'Documenti',
        'title_singular' => 'Documenti',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'title'                => 'Titolo',
            'title_helper'         => ' ',
            'file'                 => 'File',
            'file_helper'          => ' ',
            'category'             => 'Categoria/sezione',
            'category_helper'      => ' ',
            'display_order'        => 'Nro Ord.',
            'display_order_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'pages'                => 'Pagine collegate',
            'pages_helper'         => ' ',
            'slug'                 => 'Url relativo',
            'slug_helper'          => ' ',
            'news'                 => 'News collegate',
            'news_helper'          => ' ',
        ],
    ],
    'color'          => [
        'title'          => 'Colori',
        'title_singular' => 'Colori',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Colore',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'css_name'          => 'Colore CSS',
            'css_name_helper'   => ' ',
        ],
    ],
];
