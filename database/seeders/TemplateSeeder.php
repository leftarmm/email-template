<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('templates')->insert([
            'title' =>  "การทดสอบวัดความรู้ภาษาอังกฤษในรูปแบบออนไลน์ สำหรับการเปิดใช้โปรแกรมพัฒนาภาษาอังกฤษด้วยตนเอง neo+",
            'body' => '<span>ผู้มีสิทธิ์สอบ #name#</span><br/>' .
            '<span>รหัสนิสิต: #code#</span><br/>' .
            '<span>สาขาวิชา / คณะ: #department#</span><br/>' .
            '<span>ห้องสอบ: #room#</span><br/>' .
            '<span>เวลาสอบ: #time#</span><br/><br/>' .
            '<h2 style="color:red;">**โปรดศึกษาวิธีการกรอกข้อมูลจากรูปภาพที่แนบมาก่อนคลิกลิงค์สอบ**</h2><br/>' .
            '<span>อีเมลสำหรับใช้กรอกข้อมูลก่อนสอบ : #email#</span><br/>' .
            '<span>เริ่มการสอบคลิก<a href="https://kate.myneo.cloud/university-of-phayao-2565/vMrOlwAN">ที่นี่</a></span><br/>' .
            'รหัสผ่านคือ <b>PASSWORD</b> (ตัวใหญ่ทั้งหมด)<br/>' .
            '<span>หากมีคำถาม สามารถติดต่ออาจารย์ที่คุมสอบประจำห้องสอบ</span><br/><br/>' .
            '<span>ขอให้โชคดีในการสอบ</span><br/>' .
            '<span>Good Luck!</span>' .
            '<br/><br/><img src="http://email-service.lanna.co.th/img/manual.png" width="100%" />'
        ]);

        DB::table('templates')->insert([
            'title' =>  "นักศึกษาที่เข้าร่วมโครงการการเรียนรู้ภาษาอังกฤษออนไลน์ DynEd ผ่านแอพพลิเคชั่น Neo ประจำปีการศึกษา 2564",
            'body' => '<span>ผู้มีสิทธิ์สอบ #name#</span><br/>' .
            '<span>รหัสนิสิต: #code#</span><br/>' .
            '<span>สาขาวิชา / คณะ: #department#</span><br/>' .
            '<span>ห้องสอบ: #room#</span><br/>' .
            '<span>เวลาสอบ: #time#</span><br/><br/>' .
            '<h2 style="color:red;">**โปรดศึกษาวิธีการกรอกข้อมูลจากรูปภาพที่แนบมาก่อนคลิกลิงค์สอบ**</h2><br/>' .
            '<span>อีเมลสำหรับใช้กรอกข้อมูลก่อนสอบ : #email#</span><br/>' .
            '<span>เริ่มการสอบคลิก<a href="https://kate.myneo.cloud/university-of-phayao-64/dYhZqdfz">ที่นี่</a></span><br/>' .
            '<span>หากมีคำถาม สามารถติดต่ออาจารย์ที่คุมสอบประจำห้องสอบ</span><br/><br/>' .
            '<span>ขอให้โชคดีในการสอบ</span><br/>' .
            '<span>Good Luck!</span>' .
            '<br/><br/><img src="https://www.img.in.th/images/4de62c81cca53c9def24083d035d42ce.png" width="100%" />'
        ]);
    }
}
