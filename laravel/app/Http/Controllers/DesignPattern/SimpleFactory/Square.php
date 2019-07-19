<?php

namespace App\Http\Controllers\DesignPattern\SimpleFactory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class Square extends Controller implements shapeInterface
{
    public $a;

    public function __construct($a)
    {
        $this->a = $a;
    }
    public function getArea()
    {
        return $this->a * $this->a;
    }

    public function getPerimeter()
    {
        return 4 * $this->a;
    }
    /*
                                MMMMM
                                  MMMMMM
                                    MMMMMMM
                                     MMMMMMMM     .
                                      MMMMMMMMM
                                      HMMMMMMMMMM
                                       MMMMMMMMMMMM  M
                                       MMMMMMMMMMMMM  M
                                        MMMMMMMMMMMMM  M
                                        MMMMMMMMMMMMM:
                                        oMMMMMMMMMMMMMM
              .MMMMMMMMMMMMMMo           MMMMMMMMMMMMMMM M
        MMMMMMMMMMMMMMMMMMMMMMMMMMM      MMMMMMMMMMMMMMMM
          MMMMMMMMMMMMMMMMMMMMMMMMMMMM.  oMMMMMMMMMMMMMMM.M
            MMMMMMMMMMMMMMMMMMMMMMMMMMMM  MMMMMMMMMMMMMMMM
              MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
                oMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
                  MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
                    MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM:                     H
                     MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM                  .         MMM
                      MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM              M       MMMMMM
                       .MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM          M   MMMMMMMMMM
                MM.      MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM       M MMMMMMMMMMMM
                    MM    MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM    .MMMMMMMMMMMMMM
                      MM  MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
                        MM MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
               .MMMMMMMMM MMMMMMMMMMMMMMMMMMMMMMMM.MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
                  HMMMMMMMMMMMMMMMMMMMMM.MMMMMMMMM.MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
                     MMMMMMMMMMMMMMM MMM.oMMMMMMM..MMMMMMMMM:MMMMMMMMMMMMMMMMMMMMMMM
                       MMMMMMMMMMMMMM MM..MMMMMMM...MMMMMMM. MMMMMMMMMMMMMMMMMMMMM
                         MMMMMMMMMMMMMMM ..MMMMMM...MMMMMM ..MMMMMMMMMMMMMMMMMMM
                          MMMMMMM:M.MMM.M.. MMMMM M..MMMMM...MMMMMMMMMMMMMMMMMM  MMM
                            MMMM. .M..MM.M...MMMMMM..MMMMM.. MMMMMMMMMMMMMMMMMMMMMMMMMMMMMM .
                             MMMM..M....M.....:MMM .MMMMMM..MMMMMMM...MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
                              MMM.M.. ...M......MM.MMMMM.......MHM.M  .MMMMMMMMMMMMMMMMMMMMMMMMM
                         MMMMMMMM..MM. . MMM.....MMMMMM.M.....M ..MM..M MMMMMMMMMMMMMMMMMMM
                            .MMMMMHMM. ..MMMM. MMM............o..... . .MMMMMMMMMMMMMMM
                               MMM. M... .........................M..:.MMMMMMMMMMMM
                                 oMMM............ .................M.M.MMMMMMMMM
                                    .....MM........................ . MMMMMM
                                   M.....M.....................o.MM.MMMMMMMM.
                                    M........................M.. ...MMMMMMMMMMMMMo
                                      :....MMM..............MMM..oMMMMMMM
                                       M...MMM.............MMMMMMM
                                          .............:MMMMMMMM
                                          M..... MMM.....M
                                          M M.............
                                          ................M
                                       ooM.................MM  MoMMMMMoooM
                                  MMoooM......................MoooooooH..oMM
                              MHooooMoM.....................MMooooooM........M
                            oooooooMoooM......... o........MoooooooM............
                            Mooooooooooo.......M.........Moooooooo:..............M
                           MooMoooooooooM...M........:Mooooooooooo:..............M
                          M..oooooooooooo .........Mooooooooooooooo..............M
                         M...Mooo:oooooooo.M....ooooooooooooooooooo..M...........M
                          ...oooooMoooooooM..Mooooooooooooo:oooooooM.M...........M.
                         M...ooooooMoo:ooooMoooooooooooooHoooooooooH:M. ...........:
                         M..MoooooooMoooooooooooooooooo:ooooooMooooMoM..............M
                         M..ooooooooooMooooooooooooooHoooooooMooHooooM...............M
                         ...ooooooooooooooooooo:MooooooooooooooMoMoooM................
                        M...oooooooooooooooooooooooooooooooooooooMooMM................M
                        ...MooooooooooooooooooooooooooooooooooooooooMo ................
                        ...MooooooooooooooooooooooooooooooooooooooooM M................M
                       M...ooooooooooooooooooooooooooooooooooooooooM   ................M
                       ...MoooooooooooooooooooooooooooooooooooooooMM   .:...............
                       .....MooooooooooooooooooooooooooooooooooooMoo       .............M
                       M...... ooooooooooooooooooooooooooooooooooooM       M..............M
                       M........MooooMMM MM MM  MMMMMMMMMooooooooM         M...............M
                       .........HM     M:  MM :MMMMMM          M           M...............
                      M..........M     M   MoM M                           M................M
                      M.........:M  MoH  M M M MooooHoooMM.   M             M...............M
                      M..........Moooo MMooM    oooooMooooooooM              M..............H
                      M.........MooooM  Mooo  : ooooooMooooMoooM              M........ . .o.M
                      H..  .....ooooo   oooo  M MooooooooooooooM               M... MMMMMMMMMMM
                      MMMMMMMMMMooooM M oooo  .  ooooooMooooooooM              .MMMMMMMMMMMMMMM
                      MMMMMMMMMMooooH : ooooH    oooooooooooooooo               MMMMMMMMMMMMMMM
                      MMMMMMMMMMoooo    ooooM    Moooooooooooooooo              .MMMMMMMMMMMMMMM
                      MMMMMMMMMMoooo    ooooM    MooooooooooooooooM              MMMMMMMMMMMMMMM
                      MMMMMMMMMMoooM    ooooM     ooooooooooooooooo               MMMMMMMMMMM:M
                      MMMMMMMMMMoooM   MooooM     oooooooooooMoooooo               MH...........
                       . ......Mooo.   MooooM     oooooooooooooooooo              M............M
                      M.M......oooo    MooooM     Moooooooooooooooooo:           .........M.....
                      M.M.....Moooo    MooooM      ooooooooooooooooooM            .M............
                      .......MooooH    MooooM      oooooooooMoooooooooo          M..o...M..o....M
                      .o....HMooooM    MooooH      MooooooooMooooooooooM          .:M...M.......M
                     M..M.....MoooM    :oooo:    .MooooooooHooMoooooooooM         M M... ..oM.M
                      M...M.:.Mooo. MMMMooooo   oooooooooooMoooooooooooooM          ....M. M
                       M:M..o.Moooooooooooooo MooooooooooooooMooooooooooooM          .Mo
                              MooooooooooooooMooooooooooooMoMoooooooooooooo
                              Mooooooooooooooo:ooooooooooooooooooooooooooooo
                              ooooooooooooooooMooooooooooMoooooooooooooooooo
                              ooooooooooooooooMoooooooooooMooooooooooooooooHo
                              ooMooooooooooooooMoooooooooooooooooooooooooooMoM
                             MooMoooooooooooooo.ooooooooooooooooooooooooooo:oM
                             MoooooooooooooooooooooooooooooooooooooooooooooooM
                             MoooMooooooooooooooMooooooooooooooooooooooooooooo.
                             MoooMooooooooooooooMoooooooooooooooooooooooooMooooM
                             MooooooooooooooooooMoooooooooooooooooooooooooMoooooM
                             MooooMoooooooooooooMoooooooooooooooooooooooooMoHooooM
                             ooooooMooooooooooooooooooooooooooooooooooooooooMoMoooM
                            MooooooooooooooooooooMooooooooooooooooooooooooooMoooooH:
                            MoooooooMooooooooooooMoooooooooooooooooooooooooooooHoooM
                            MooooooooMoooooooooooMoooooooooooooooooooooooooMoooMooooM
                            Moooooooooooooooooooooooooooooooooooooooooooooo.oooMooooo
                            MoooooooooooooooooooooooooooooooooooooooooooooMoooooooooM
                             MooooooooooooooooooooMoooooooooooooooooooooooooooooooooM
                              MooooooooooooooooooooMHooooooooooooooooooooMoooo:ooooo
                               MMooooooooooooooooooMoMHoooooooooooooooooooooooMooooo
                                MMoooooooooooooooMMooo MMooooooooooooooooooooooooooM
                                MMMoooooooooooooMooooo  oooooooooooooooooooooMooooo
                                MooMMoooooooooMoooMMoM  ooooHooooooooooooooooMooooM
                                MooooMooooooMooooMoooM  MoooooMoooooooooooooMooooo
                                ooooooMMooooooooMooooM  MoooooooooMooooooooooooooM
                                HooooooMoooooooMooooM    HoooooooHooMooooooooooooo
                                 oooMoooooooooHoooM         MoooooooooMoooooooooM
                                  HooooooooooooHM             MooooooooMMoooooooM
                                   MMMMMMMMMMMMMM                Moooooo:MooooHMM
                                    MMMMMMM: ...                  MMMMMMMMMMMMMM
                                   M............M                  MMMMMMMMM ....
                                   M.MM..........                  M.............M
                                M ..............MM                 M..............
                             MMMMM............MMMM                 ..MMMMMMMM ....M
                           MMMMMMMMMMMMMMMMMMMMMMMM               MMMMMMMMMMMMM...M
                        .MMMMMMMMMMMMMMMMMMMMMMMMMM               MMMMMMMMMMMMMMMMMM
                        MMMMMMMMMMMMMMMMMMMMMMMMM                MMMMMMMMMMMMMMMMMMM
                        :MMMMMMMMMMMMMMMMMMH                     MMMMMMMMMMMMMMMMMMM
                           By EBEN Jérôme                        MMMMMMMMMMMMMMMMMM
                                                                 MMMMMMMMMMMMMMM
                                                                  HMMMMMM

    */

    /*
        quu..__
         $$$b  `---.__
          "$$b        `--.                          ___.---uuudP
           `$$b           `.__.------.__     __.---'      $$$$"              .
             "$b          -'            `-.-'            $$$"              .'|
               ".                                       d$"             _.'  |
                 `.   /                              ..."             .'     |
                   `./                           ..::-'            _.'       |
                    /                         .:::-'            .-'         .'
                   :                          ::''\          _.'            |
                  .' .-.             .-.           `.      .'               |
                  : /'$$|           .@"$\           `.   .'              _.-'
                 .'|$u$$|          |$$,$$|           |  <            _.-'
                 | `:$$:'          :$$$$$:           `.  `.       .-'
                 :                  `"--'             |    `-.     \
                :##.       ==             .###.       `.      `.    `\
                |##:                      :###:        |        >     >
                |#'     `..'`..'          `###'        x:      /     /
                 \                                   xXX|     /    ./
                  \                                xXXX'|    /   ./
                  /`-.                                  `.  /   /
                 :    `-  ...........,                   | /  .'
                 |         ``:::::::'       .            |<    `.
                 |             ```          |           x| \ `.:``.
                 |                         .'    /'   xXX|  `:`M`M':.
                 |    |                    ;    /:' xXXX'|  -'MMMMM:'
                 `.  .'                   :    /:'       |-'MMMM.-'
                  |  |                   .'   /'        .'MMM.-'
                  `'`'                   :  ,'          |MMM<
                    |                     `'            |tbap\
                     \                                  :MM.-'
                      \                 |              .''
                       \.               `.            /
                        /     .:::::::.. :           /
                       |     .:::::::::::`.         /
                       |   .:::------------\       /
                      /   .''               >::'  /
                      `',:                 :    .'
                                           `:.:'


     */
    /*
                           _ooOoo_
                          o8888888o
                          88" . "88
                          (| -_- |)
                          O\  =  /O
                       ____/`---'\____
                     .'  \\|     |//  `.
                    /  \\|||  :  |||//  \
                   /  _||||| -:- |||||-  \
                   |   | \\\  -  /// |   |
                   | \_|  ''\---/''  |   |
                   \  .-\__  `-`  ___/-. /
                 ___`. .'  /--.--\  `. . __
              ."" '<  `.___\_<|>_/___.'  >'"".
             | | :  `- \`.;`\ _ /`;.`/ - ` : | |
             \  \ `-.   \_ __\ /__ _/   .-` /  /
        ======`-.____`-.___\_____/___.-`____.-'======
                           `=---='
        ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                 佛祖保佑       永无BUG
    */
    /*
        11111111111111111111111111111111111111001111111111111111111111111
        11111111111111111111111111111111111100011111111111111111111111111
        11111111111111111111111111111111100001111111111111111111111111111
        11111111111111111111111111111110000111111111111111111111111111111
        11111111111111111111111111111000000111111111111111111111111111111
        11111111111111111111111111100000011110001100000000000000011111111
        11111111111111111100000000000000000000000000000000011111111111111
        11111111111111110111000000000000000000000000000011111111111111111
        11111111111111111111111000000000000000000000000000000000111111111
        11111111111111111110000000000000000000000000000000111111111111111
        11111111111111111100011100000000000000000000000000000111111111111
        11111111111111100000110000000000011000000000000000000011111111111
        11111111111111000000000000000100111100000000000001100000111111111
        11111111110000000000000000001110111110000000000000111000011111111
        11111111000000000000000000011111111100000000000000011110001111111
        11111110000000011111111111111111111100000000000000001111100111111
        11111111000001111111111111111111110000000000000000001111111111111
        11111111110111111111111111111100000000000000000000000111111111111
        11111111111111110000000000000000000000000000000000000111111111111
        11111111111111111100000000000000000000000000001100000111111111111
        11111111111111000000000000000000000000000000111100000111111111111
        11111111111000000000000000000000000000000001111110000111111111111
        11111111100000000000000000000000000000001111111110000111111111111
        11111110000000000000000000000000000000111111111110000111111111111
        11111100000000000000000001110000001111111111111110001111111111111
        11111000000000000000011111111111111111111111111110011111111111111
        11110000000000000001111111111111111100111111111111111111111111111
        11100000000000000011111111111111111111100001111111111111111111111
        11100000000001000111111111111111111111111000001111111111111111111
        11000000000001100111111111111111111111111110000000111111111111111
        11000000000000111011111111111100011111000011100000001111111111111
        11000000000000011111111111111111000111110000000000000011111111111
        11000000000000000011111111111111000000000000000000000000111111111
        11001000000000000000001111111110000000000000000000000000001111111
        11100110000000000001111111110000000000000000111000000000000111111
        11110110000000000000000000000000000000000111111111110000000011111
        11111110000000000000000000000000000000001111111111111100000001111
        11111110000010000000000000000001100000000111011111111110000001111
        11111111000111110000000000000111110000000000111111111110110000111
        11111110001111111100010000000001111100000111111111111111110000111
        11111110001111111111111110000000111111100000000111111111111000111
        11111111001111111111111111111000000111111111111111111111111100011
        11111111101111111111111111111110000111111111111111111111111001111
        11111111111111111111111111111110001111111111111111111111100111111
        11111111111111111111111111111111001111111111111111111111001111111
        11111111111111111111111111111111100111111111111111111111111111111
        11111111111111111111111111111111110111111111111111111111111111111


        */
    /*
                                                 __----~~~~~~~~~~~------___
                                      .  .   ~~//====......          __--~ ~~
                      -.            \_|//     |||\\  ~~~~~~::::... /~
                   ___-==_       _-~o~  \/    |||  \\            _/~~-
           __---~~~.==~||\=_    -_--~/_-~|-   |\\   \\        _/~
       _-~~     .=~    |  \\-_    '-~7  /-   /  ||    \      /
     .~       .~       |   \\ -_    /  /-   /   ||      \   /
    /  ____  /         |     \\ ~-_/  /|- _/   .||       \ /
    |~~    ~~|--~~~~--_ \     ~==-/   | \~--===~~        .\
             '         ~-|      /|    |-~\~~       __--~~
                         |-~~-_/ |    |   ~\_   _-~            /\
                              /  \     \__   \/~                \__
                          _--~ _/ | .-~~____--~-/                  ~~==.
                         ((->/~   '.|||' -_|    ~~-/ ,              . _||
                                    -_     ~\      ~~---l__i__i__i--~~_/
                                    _-~-__   ~)  \--______________--~~
                                  //.-~~~-~_--~- |-------~~~~~~~~
                                         //.-~~~--\


    */
}
