<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@app.com',
            'name' => 'admin',
            'password' => Hash::make(123456),
            'role' => 'admin',
        ]);



        DB::table('users')->insert([
            'email' => 'user@app.com',
            'name' => 'user',
            'password' => Hash::make(123456),
            'role' => 'approver',
        ]);

        $controls = ['القوائم', 'الاسلايدر', 'الفعاليات', 'الاخبار', 'المشاريع', 'شركاء النجاح', 'الفوتر'];

        foreach ($controls as $control) {
            DB::table('controls')->insert([
                'section_name' => $control,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $menus = [
            [
                'name' => 'الرئيسية',
                'endpoint' => '/index',
                'route_name' => 'site.home',
            ],
            [
                'name' => 'عن الجمعية',
                'endpoint' => '#',
                'subMenu' => [
                    [
                        'name' => 'الإدارات',
                        'endpoint' => '/document/departments',
                        'route_name' => 'site.document.departments',
                    ],
                    [
                        'name' => 'اللائحة التنفيذية',
                        'endpoint' => '/document/governance',
                        'route_name' => 'site.document.governance',
                    ],
                    [
                        'name' => 'التقارير',
                        'endpoint' => '/document/reports',
                        'route_name' => 'site.document.reports',
                    ],
                    [
                        'name' => 'الاجتماعات',
                        'endpoint' => '/document/meetings',
                        'route_name' => 'site.document.meetings',
                    ]
                ]
            ],
            [
                'name' => 'الفعاليات',
                'endpoint' => '#',
            ],
            [
                'name' => 'المركز الإعلامي',
                'endpoint' => '#',
                'subMenu' => [
                    [
                        'name' => 'اخر الاخبار',
                        'endpoint' => '/#',
                        'route_name' => '',
                    ],
                    [
                        'name' => 'معرض الصور والفيديوهات',
                        'endpoint' => '/galleries/index',
                        'route_name' => 'site.gallery.index',
                    ]
                ]
            ],
            [
                'name' => 'البرامج و المشاريع',
                'endpoint' => '#',
            ],
            [
                'name' => 'العضوية',
                'endpoint' => '/membership/create',
                'route_name' => 'site.membership.create',
            ],
            [
                'name' => 'تواصل معانا',
                'endpoint' => '/contact',
                'route_name' => 'site.contact',
            ],


        ];

        foreach ($menus as $menu) {
            DB::table('main_menus')->insert([
                'name' => $menu['name'],
                'endpoint' => $menu['endpoint'],
            ]);
            if (isset($menu['subMenu'])) {
                foreach ($menu['subMenu'] as $subMenu) {
                    DB::table('sub_menus')->insert([
                        'name' => $subMenu['name'],
                        'endpoint' => $subMenu['endpoint'],
                        'route_name' => $subMenu['route_name'],
                        'main_meun_id' => DB::table('main_menus')->where('name', $menu['name'])->first()->id,
                    ]);
                }
            }
        }
    }
}
