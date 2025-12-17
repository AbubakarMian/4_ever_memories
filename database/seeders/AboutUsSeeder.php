<?php

namespace Database\Seeders;

use App\Models\About_us;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About_us::firstOrCreate(
            ['id'    => 1],
            [
                'id'    => 1,
                'image' => 'https://4evermemorial.com/public/theme/user_theme/images/about-us.png',
                'description_first'   => 'Grief is personal, and remembrance should reflect that. 4EverMemorial is a gentle online space where families and friends can honor the lives of those they love, keep their stories close, and support one another through the healing journey. Our purpose is simple: provide a respectful, accessible place to remember—whenever you need it.
                On 4EverMemorial, you can create a dedicated memorial page that feels true to the person you’re honoring. Add photos and videos, write tributes, share favorite songs, and capture the moments that defined their life. Visitors can contribute memories, offer condolences, and light digital candles, turning each page into a living collection of love and testimony.
                We designed the experience to be thoughtful and calm. Whether you prefer something quiet and simple or richly detailed, every memorial can be shaped to your needs. The platform is available at any time, so birthdays, anniversaries, and unexpected waves of grief can be met with a steady place to reflect and feel close again.
                Community matters in times of loss. 4EverMemorial makes it easy for friends and family—near or far—to gather around a shared space, console one another, and keep stories alive. Message boards and guest books invite gentle conversation, while privacy and moderation tools help families maintain a setting that is safe and respectful.
                Our team is committed to dignity, security, and ease of use. We work to ensure the site remains a source of comfort, a trusted keeper of memories, and an enduring tribute to cherished lives. If you choose to create a memorial here, we are honored to hold that space with you.
                4EverMemorial is a haven for ongoing reflection and a lasting promise to remember. Create a memorial today and join us in honoring the people who shaped our lives.
',
            ]
        );
    }
}
