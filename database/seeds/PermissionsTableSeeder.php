<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'task_management_access',
            ],
            [
                'id'    => '18',
                'title' => 'task_status_create',
            ],
            [
                'id'    => '19',
                'title' => 'task_status_edit',
            ],
            [
                'id'    => '20',
                'title' => 'task_status_show',
            ],
            [
                'id'    => '21',
                'title' => 'task_status_delete',
            ],
            [
                'id'    => '22',
                'title' => 'task_status_access',
            ],
            [
                'id'    => '23',
                'title' => 'task_tag_create',
            ],
            [
                'id'    => '24',
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => '25',
                'title' => 'task_tag_show',
            ],
            [
                'id'    => '26',
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => '27',
                'title' => 'task_tag_access',
            ],
            [
                'id'    => '28',
                'title' => 'task_create',
            ],
            [
                'id'    => '29',
                'title' => 'task_edit',
            ],
            [
                'id'    => '30',
                'title' => 'task_show',
            ],
            [
                'id'    => '31',
                'title' => 'task_delete',
            ],
            [
                'id'    => '32',
                'title' => 'task_access',
            ],
            [
                'id'    => '33',
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => '34',
                'title' => 'reminder_access',
            ],
            [
                'id'    => '35',
                'title' => 'meeting_create',
            ],
            [
                'id'    => '36',
                'title' => 'meeting_edit',
            ],
            [
                'id'    => '37',
                'title' => 'meeting_show',
            ],
            [
                'id'    => '38',
                'title' => 'meeting_delete',
            ],
            [
                'id'    => '39',
                'title' => 'meeting_access',
            ],
            [
                'id'    => '40',
                'title' => 'documents_expiry_date_create',
            ],
            [
                'id'    => '41',
                'title' => 'documents_expiry_date_edit',
            ],
            [
                'id'    => '42',
                'title' => 'documents_expiry_date_show',
            ],
            [
                'id'    => '43',
                'title' => 'documents_expiry_date_delete',
            ],
            [
                'id'    => '44',
                'title' => 'documents_expiry_date_access',
            ],
            [
                'id'    => '45',
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => '46',
                'title' => 'crm_status_create',
            ],
            [
                'id'    => '47',
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => '48',
                'title' => 'crm_status_show',
            ],
            [
                'id'    => '49',
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => '50',
                'title' => 'crm_status_access',
            ],
            [
                'id'    => '51',
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => '52',
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => '53',
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => '54',
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => '55',
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => '56',
                'title' => 'crm_note_create',
            ],
            [
                'id'    => '57',
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => '58',
                'title' => 'crm_note_show',
            ],
            [
                'id'    => '59',
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => '60',
                'title' => 'crm_note_access',
            ],
            [
                'id'    => '61',
                'title' => 'crm_document_create',
            ],
            [
                'id'    => '62',
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => '63',
                'title' => 'crm_document_show',
            ],
            [
                'id'    => '64',
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => '65',
                'title' => 'crm_document_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
