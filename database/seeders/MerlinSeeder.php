<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Serial;
use App\Models\SerialEpisode;
use App\Models\Movie;

class MerlinSeeder extends Seeder
{
    public function run()
    {
        $serialName = "Merlin (Subtitle)";
        $channelId = "-1003605893088";
        $lang = 'en';

        // Check if serial exists, set its language
        $serial = Serial::firstOrCreate(['name' => $serialName]);
        $serial->language = $lang;
        $serial->save();

        $episodes = [
            // List of arrays:
            ['ep' => 1, 'code' => '2001', 'msg_id' => 229, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAPlabg78bHCsZtxVJgPGbo-540Ptc8AAjIUAAL4WFhJZwdp3gABtms2OgQ'],
            ['ep' => 2, 'code' => '2002', 'msg_id' => 230, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAPmabg8LsEaPNm6wjHTHOdFdOkCtxkAAtYWAAIZ7nhJGqoMRpgbbEw6BA'],
            ['ep' => 3, 'code' => '2003', 'msg_id' => 231, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAPnabg8TdlLDImQ62xXwdqammnSYPUAApsVAAKQEYlJTT2Zm7SuBtI6BA'],
            ['ep' => 4, 'code' => '2004', 'msg_id' => 232, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAPoabg8XJ1_XxTziT6Q-3VE7dgufMsAAlQWAAJw56FJDMLABRggqsE6BA'],
            ['ep' => 5, 'code' => '2005', 'msg_id' => 233, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAPpabg8ZaM-pdU3oi1D-T1DJWbAmdwAAp0ZAAJU1alJZloPnoMAAc9FOgQ'],
            ['ep' => 6, 'code' => '2006', 'msg_id' => 234, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAPqabg_nkMRsyQR-d1ATpvgDwui6_MAAjoZAAJU1blJt1Y44Hkmu706BA'],
            ['ep' => 7, 'code' => '2007', 'msg_id' => 235, 'file_id' => 'BAACAgQAAyEFAATW7Y_gAAPrabg_khSEKZj1cxDTyWUBMX2NqSUAAvsIAAK1pSBSKW3HLVR40Ik6BA'],
            ['ep' => 8, 'code' => '2008', 'msg_id' => 236, 'file_id' => 'BAACAgQAAyEFAATW7Y_gAAPsabg_hhvWj_KCkPFiyk4gVnef9-EAAiMJAAJYxiFSfaPAH6c1jHI6BA'],
            ['ep' => 9, 'code' => '2009', 'msg_id' => 237, 'file_id' => 'BAACAgQAAyEFAATW7Y_gAAPtabg_efkwZ3s-MbMBiNCgBVUnm_8AAiQJAAJYxiFSe0AxKHh8Nfc6BA'],
            ['ep' => 10, 'code' => '2010', 'msg_id' => 238, 'file_id' => 'BAACAgQAAyEFAATW7Y_gAAPuabg_cA2Og1Lt0drpJOl1uOHDzUAAAiUJAAJYxiFS6Z1PtW7RI1I6BA'],
            ['ep' => 11, 'code' => '2011', 'msg_id' => 239, 'file_id' => 'BAACAgQAAyEFAATW7Y_gAAPvabg_Zpv90GieFDorRa6z1UR8mpoAAiYJAAJYxiFSXFj4y0wvXUA6BA'],
            ['ep' => 12, 'code' => '2012', 'msg_id' => 240, 'file_id' => 'BAACAgQAAyEFAATW7Y_gAAPwabg_WvN2EWIoYp_A6wM9NrA98bkAAigJAAJYxiFSnMdMxiHmTrk6BA'],
            ['ep' => 13, 'code' => '2013', 'msg_id' => 241, 'file_id' => 'BAACAgQAAyEFAATW7Y_gAAPxabg_S6gf5nNynK2XgODANtjlE6kAAisJAAJYxiFSj1thVAS9wd06BA'],
            ['ep' => 14, 'code' => '2014', 'msg_id' => 242, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAPyabg_QzASMGqnuukAAaEubSdoIgfzAAIJEgACQCyISz4fq8E3vAfMOgQ'],
            ['ep' => 15, 'code' => '2015', 'msg_id' => 243, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAPzabg_OUNF_NN8iczo8yuEaw8vTgIAAg0SAAJALIhL5mvx3iCLIrQ6BA'],
            ['ep' => 16, 'code' => '2016', 'msg_id' => 244, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAP0abg_LzZV4V7Ad3Kc9V26LA24vCYAAg8SAAJALIhLAAHCFKFF8JTrOgQ'],
            ['ep' => 17, 'code' => '2017', 'msg_id' => 245, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAP1abg_JB_h3D0XL350BUfuholLbUcAAhESAAJALIhLtyDN4FIFfLo6BA'],
            ['ep' => 18, 'code' => '2018', 'msg_id' => 246, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAP2abg_Gkz0df8AAVy7smeki348EVCTAAITEgACQCyIS42AqhEktVGqOgQ'],
            ['ep' => 19, 'code' => '2019', 'msg_id' => 247, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAP3abg_EU3t3fv6c8mf40VuDo9eagQAAhYSAAJALIhL6teSIHHGlQg6BA'],
            ['ep' => 20, 'code' => '2020', 'msg_id' => 248, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAP4abg_CWnqNSfKZQ3pbeLKwDD5NuEAAhgSAAJALIhLR2qqYsmpbik6BA'],
            ['ep' => 21, 'code' => '2021', 'msg_id' => 249, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAP5abg-_-ZXK_M7-Aa6DlJYn3D-i6QAAh0SAAJALIhL76vl-CnCtNQ6BA'],
            ['ep' => 22, 'code' => '2022', 'msg_id' => 250, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAP6abg-9JcBfrn69bb-AAG4LVnPONGhAAIfEgACQCyIS9ZelMqN9DqoOgQ'],
            ['ep' => 23, 'code' => '2023', 'msg_id' => 251, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAP7abg-63-sqv_HL7lI9oLi_8yCxB0AAiISAAJALIhLuzQZUnnuApw6BA'],
            ['ep' => 24, 'code' => '2024', 'msg_id' => 252, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAP8abg-3_BwGnclt9QbAaqe6btVWe8AAiUSAAJALIhLWA5WvRa4t086BA'],
            ['ep' => 25, 'code' => '2025', 'msg_id' => 253, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAP9abg-05gG_ubK_hpq7_eftnx-Ug4AAioSAAJALIhLsGaIrPO8l3E6BA'],
            ['ep' => 26, 'code' => '2026', 'msg_id' => 254, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAP-abg-ysOfEMBWOb_j7ewLGPayu18AAv8RAAJALIhLGS4E6lFcWIo6BA'],
            ['ep' => 27, 'code' => '2027', 'msg_id' => 255, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAP_abg-v9MRMdPfVmd4SeEHkhKiTcYAAhIYAAL1sPBJY0-iiwlBrlU6BA'],
            ['ep' => 28, 'code' => '2028', 'msg_id' => 256, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBAAFpuD62_owvtx0WaXEq2F9tvTpZ_AACExgAAvWw8EmjSyoAAXFF88A6BA'],
            ['ep' => 29, 'code' => '2029', 'msg_id' => 257, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBAWm4PqskHObtA0ikW--UHRMhi6KvAAIUGAAC9bDwSQGiHpmmhj-bOgQ'],
            ['ep' => 30, 'code' => '2030', 'msg_id' => 258, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBAmm4PqIPwU6nDT-WNAV32rIVaO3ZAAIVGAAC9bDwSSo8hyj_8XIEOgQ'],
            ['ep' => 31, 'code' => '2031', 'msg_id' => 259, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBA2m4PpHZ6NDa5W_dRlECsi9x75TFAAIWGAAC9bDwSTVO4BDBoIXmOgQ'],
            ['ep' => 32, 'code' => '2032', 'msg_id' => 260, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBBGm4Poh9eOX1utKaLP8AAVxqkVTcSgACFxgAAvWw8EmkFJ7NyvTH0joE'],
            ['ep' => 33, 'code' => '2033', 'msg_id' => 261, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBBWm4Pn0_oYKKFwABbLDdizxjzvaxYAACHRgAAvWw8EkEd3eknpHmkDoE'],
            ['ep' => 34, 'code' => '2034', 'msg_id' => 262, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBBmm4PnMfuzXXfriAmekLEY-oB2uoAAIYGAAC9bDwSc7Jv5PRFM5iOgQ'],
            ['ep' => 35, 'code' => '2035', 'msg_id' => 263, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBHabg-aNPuxxf9By6dEy0L7TStPFIAAh4YAAL1sPBJI-RTaipvBDIBAAdtAAM6BA'],
            ['ep' => 36, 'code' => '2036', 'msg_id' => 264, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBCGm4PWdCKXpJckVVgoGiMvVHXgXAAAIhGAAC9bDwSehRYbi8g_n6OgQ'],
            ['ep' => 38, 'code' => '2038', 'msg_id' => 265, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBCWm4PV10Qka_V3748K5ihveEPZsLAAImGAAC9bDwSaQbXDXiI6W7OgQ'],
            ['ep' => 39, 'code' => '2039', 'msg_id' => 266, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBCmm4PVOi5R_9PeL4Jo26ulrzxxgwAAIoGAAC9bDwSfVtWvp35iYVOgQ'],
            ['ep' => 40, 'code' => '2040', 'msg_id' => 267, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBC2m4PUiwO1yxvmcZTh1SiL9hD62KAAKdFQAC3qOZSQsPFDOVj_xgOgQ'],
            ['ep' => 41, 'code' => '2041', 'msg_id' => 268, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBDGm4PUAkaRo5_-zalvJeQ2a8S0shAAKfFQAC3qOZSV6X13p6zMx_OgQ'],
            ['ep' => 42, 'code' => '2042', 'msg_id' => 269, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBDWm4PTjN4nCS5f_xwA-R4yj9FUWyAAKgFQAC3qOZScbPEQNKxktlOgQ'],
            ['ep' => 43, 'code' => '2043', 'msg_id' => 270, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBDmm4PS0T4t1_rwb-CbC-FvbBEyl7AALuFQACIqv5SS-lF_RcNvprOgQ'],
            ['ep' => 44, 'code' => '2044', 'msg_id' => 271, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBD2m4PSTYnBahJVfZQDoDetuSGczrAALxFQACIqv5SdgadtnF3_1xOgQ'],
            ['ep' => 45, 'code' => '2045', 'msg_id' => 272, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBEGm4PRmneCmcuY-BjK0KnMoosG2PAALzFQACIqv5SUl98CWUZf_yOgQ'],
            ['ep' => 46, 'code' => '2046', 'msg_id' => 273, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBEWm4PRDlygJQxPGAzH-HIVtH8is3AAL1FQACIqv5SaBh5-JKDUhvOgQ'],
            ['ep' => 47, 'code' => '2047', 'msg_id' => 274, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBEmm4PQdhWie20uzVPOVlHsu7TIhZAAL2FQACIqv5Sbb0JybVRLBtOgQ'],
            ['ep' => 48, 'code' => '2048', 'msg_id' => 275, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBE2m4PPS0sE7RM3CW_2uSJG38FOihAAL3FQACIqv5SQ4PXyz-cWgGOgQ'],
            ['ep' => 49, 'code' => '2049', 'msg_id' => 276, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBFGm4POhUYI6wlkubC_90VWPRSn10AAL6FQACIqv5SWGY1vaoVdU_OgQ'],
            ['ep' => 50, 'code' => '2050', 'msg_id' => 277, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBFWm4PNiaFaV3_0n1ZFu_xRqfQyrwAAL7FQACIqv5SablE6NppPSDOgQ'],
            ['ep' => 51, 'code' => '2051', 'msg_id' => 278, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBFmm4PM2Hd5E9IdFRjcdcEMZXC2ZYAAL9FQACIqv5ScFAM069X0DJOgQ'],
            ['ep' => 52, 'code' => '2052', 'msg_id' => 279, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBF2m4PMP4qiCUFLKpTYNkXyXG0WhnAAL-FQACIqv5SSbu7HXLOuFFOgQ'],
            ['ep' => 53, 'code' => '2053', 'msg_id' => 280, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBGGm4PJUrv71M9Cg_LMLdZRE1lWRzAAL_FQACIqv5SZHjOf9dj3e6OgQ'],
            ['ep' => 54, 'code' => '2054', 'msg_id' => 281, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBGWm4PIrWTtZQ--jMiYqjSjTGDxoVAAIBFgACIqv5Sf0zGmchT_BVOgQ'],
            ['ep' => 55, 'code' => '2055', 'msg_id' => 282, 'file_id' => 'BAACAgIAAyEFAATW7Y_gAAIBGmm4PHwhnzdULNBgBQnMkl8MzuTEAAICFgACIqv5SQZvzYKcdVccOgQ'],
        ];

        foreach ($episodes as $ep) {
            $movieName = "{$serialName} {$ep['ep']}-qism";

            Movie::updateOrCreate(
                ['code' => $ep['code']],
                [
                    'name' => $movieName,
                    'file_id' => $ep['file_id'],
                    'message_id' => $ep['msg_id'],
                    'channel_id' => $channelId,
                    'views' => rand(200, 300)
                ]
            );

            SerialEpisode::updateOrCreate(
                [
                    'serial_id' => $serial->id,
                    'episode_number' => $ep['ep'],
                ],
                [
                    'file_id' => $ep['file_id'],
                ]
            );
        }
    }
}
