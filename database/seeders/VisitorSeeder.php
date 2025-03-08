<?php

namespace Database\Seeders;

use App\Models\Visitor;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class VisitorSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $domains = [
            'google.com',
            'facebook.com',
            'twitter.com',
            'instagram.com',
            'garifull.in'
        ];

        for ($i = 0; $i < 750; $i++) {
            $url = $domains[array_rand($domains)];
            $v['uid'] = self::generateId();

            for ($j = 0; $j < rand(1, 4); $j++) {
                    $v['vid'] = self::generateId();
                    $v['agent'] = $faker->userAgent;
                    $v['language'] = $faker->languageCode;
                    $v['url'] = $url . '/' . $faker->slug(2);
                    $v['site'] = $url;
                    $v['ip'] = $faker->ipv4;

                $at = $faker->dateTimeBetween('-30 days');
                for ($k = 0; $k < rand(1, 2); $k++) {
                    $v['at'] = $at->add(new \DateInterval('PT' . rand(1, 5) . 'M'));

                    Visitor::create($v);
                }
            }
        }
    }

    private static function generateId(): string
    {
        return substr(bin2hex(random_bytes(11)), 0, 11);
    }
}
