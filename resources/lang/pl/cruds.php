<?php

return [
    'userManagement' => [
        'title'          => 'Zarządzanie użytkownikami',
        'title_singular' => 'Zarządzanie użytkownikami',
    ],
    'permission' => [
        'title'          => 'Uprawnienia',
        'title_singular' => 'Uprawnienie',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Role',
        'title_singular' => 'Rola',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Użytkownicy',
        'title_singular' => 'Użytkownik',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
        ],
    ],
    'craneManagement' => [
        'title'          => 'Crane Management',
        'title_singular' => 'Crane Management',
    ],
    'producer' => [
        'title'          => 'Producer',
        'title_singular' => 'Producer',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => 'Nazwa producenta',
            'description'        => 'Description',
            'description_helper' => 'Opis',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'type' => [
        'title'          => 'Type',
        'title_singular' => 'Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => 'Typ',
            'type_2'            => 'Type 2',
            'type_2_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'crane' => [
        'title'          => 'Crane',
        'title_singular' => 'Crane',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
            'sn'                => 'Sn',
            'sn_helper'         => 'Numer fabryczny',
            'producer'          => 'Producer',
            'producer_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'max_load'          => 'Max Load',
            'max_load_helper'   => 'Maksymalny udźwig',
            'udt'               => 'Udt',
            'udt_helper'        => 'UDT',
            'enova'             => 'Enova',
            'enova_helper'      => 'Enova',
            'year'              => 'Year',
            'year_helper'       => ' ',
        ],
    ],
    'contractManagement' => [
        'title'          => 'Contract Management',
        'title_singular' => 'Contract Management',
    ],
    'customer' => [
        'title'          => 'Customer',
        'title_singular' => 'Customer',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => 'Nazwa klienta',
            'name_2'            => 'Name 2',
            'name_2_helper'     => ' ',
            'nip'               => 'Nip',
            'nip_helper'        => 'NIP',
            'street'            => 'Street',
            'street_helper'     => 'ulica',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'project' => [
        'title'          => 'Project',
        'title_singular' => 'Project',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'name_2'            => 'Name 2',
            'name_2_helper'     => ' ',
            'city'              => 'City',
            'city_helper'       => 'Miasto',
            'street'            => 'Street',
            'street_helper'     => 'ulica',
            'file'              => 'File',
            'file_helper'       => 'Załączniki',
            'user'              => 'User',
            'user_helper'       => 'Opiekun',
            'enowa'             => 'Enowa',
            'enowa_helper'      => 'Nr projektu w Enovie',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'customer'          => 'Customer',
            'customer_helper'   => ' ',
            'rental'            => 'Rental',
            'rental_helper'     => ' ',
        ],
    ],
    'rental' => [
        'title'          => 'Rental',
        'title_singular' => 'Rental',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'crane'               => 'Crane',
            'crane_helper'        => 'Żuraw',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'project'             => 'Project',
            'project_helper'      => ' ',
            'rental_start'        => 'Rental Start',
            'rental_start_helper' => 'Początek wynajmu',
            'rental_end'          => 'Rental End',
            'rental_end_helper'   => 'Koniec wynajmu',
            'name_crane'          => 'Name Crane',
            'name_crane_helper'   => 'Nazwa żurawia na budowie',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'reportManagement' => [
        'title'          => 'Report Management',
        'title_singular' => 'Report Management',
    ],
    'report' => [
        'title'          => 'Report',
        'title_singular' => 'Report',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'sn'                => 'Sn',
            'sn_helper'         => ' ',
            'start'             => 'Start',
            'start_helper'      => ' ',
            'stop'              => 'Stop',
            'stop_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];
