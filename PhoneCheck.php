<?php
/**
 * Created by PhpStorm.
 * User: kbworkingpro
 * Date: 2019/4/3
 * Time: 11:23 AM
 */

namespace util\validate;

/**
 * Class PhoneCheck
 */
class PhoneCheck
{

    /**
     * 移动电话1开头
     *
     * @var string
     */
    static public $mobilePattern = '/(?<phone>(?:1[3-9](\d[-|\s]?){6}\d{3}))/';

    /**
     * 固定电话01|02开头
     *
     * @var string
     */
    static public $telPattern02 = '/(?<phone>(?:0[12]\d[-|\s]?\d{8}([-|\s]?\d{1,4})?))/';

    /**
     * 固定电话非01|02开头
     *
     * @var string
     */
    static public $telPattern03 = '/(?<phone>(?:0[^12]\d{2}[-|\s]?\d{7,8}([-|\s]?\d{1,4})?))/';

    /**
     * 企业电话400|800
     *
     * @var string
     */
    static public $corpPattern = '/(?<phone>(?:[4|8]00[-|\s]?(\d[-|\s]?){4}[-|\s]?\d{3}))/';

    /**
     * Config Key
     *
     * @var string
     */
    static private $logKey = 'validate:tel:warning';

    /**
     * Tel Rules
     *
     * @var array
     */
    static private $telRules = [
        '010'  => 8,
        '021'  => 8,
        '022'  => 8,
        '023'  => 8,
        '024'  => 8,
        '025'  => 8,
        '027'  => 8,
        '028'  => 8,
        '029'  => 8,
        '020'  => 8,
        '0312' => 7,
        '0313' => 7,
        '0311' => 8,
        '0314' => 7,
        '0315' => 7,
        '0316' => 7,
        '0317' => 7,
        '0319' => 7,
        '0318' => 7,
        '0310' => 7,
        '0349' => 7,
        '0335' => 7,
        '0351' => 7,
        '0352' => 7,
        '0353' => 7,
        '0354' => 7,
        '0356' => 7,
        '0355' => 7,
        '0357' => 7,
        '0358' => 7,
        '0350' => 7,
        '0371' => 8,
        '0359' => 7,
        '0372' => 7,
        '0373' => 7,
        '0375' => 7,
        '0374' => 7,
        '0377' => 8,
        '0376' => 7,
        '0379' => 8,
        '0370' => 7,
        '0391' => 7,
        '0392' => 7,
        '0393' => 7,
        '0394' => 7,
        '0395' => 7,
        '0396' => 7,
        '0398' => 7,
        '0412' => 7,
        '0411' => 8,
        '0416' => 7,
        '0415' => 7,
        '0417' => 7,
        '0418' => 7,
        '0419' => 7,
        '0421' => 7,
        '0427' => 7,
        '0429' => 7,
        '0431' => 8,
        '0432' => 8,
        '0433' => 7,
        '0434' => 7,
        '0435' => 7,
        '0436' => 7,
        '0437' => 7,
        '0438' => 7,
        '0439' => 7,
        '0451' => 8,
        '0453' => 7,
        '0452' => 7,
        '0454' => 7,
        '0455' => 7,
        '0456' => 7,
        '0458' => 7,
        '0457' => 7,
        '0459' => 7,
        '0464' => 7,
        '0467' => 7,
        '0469' => 7,
        '0468' => 7,
        '0471' => 7,
        '0472' => 7,
        '0473' => 7,
        '0475' => 7,
        '0474' => 7,
        '0476' => 7,
        '0477' => 7,
        '0478' => 7,
        '0470' => 7,
        '0479' => 7,
        '0482' => 7,
        '0483' => 7,
        '0511' => 8,
        '0512' => 8,
        '0513' => 8,
        '0514' => 8,
        '0515' => 8,
        '0516' => 8,
        '0517' => 8,
        '0518' => 8,
        '0519' => 8,
        '0510' => 8,
        '0523' => 8,
        '0527' => 8,
        '0531' => 8,
        '0532' => 8,
        '0533' => 7,
        '0534' => 7,
        '0535' => 7,
        '0536' => 7,
        '0538' => 7,
        '0537' => 7,
        '0539' => 7,
        '0530' => 7,
        '0543' => 7,
        '0631' => 7,
        '0546' => 7,
        '0632' => 7,
        '0633' => 7,
        '0634' => 7,
        '0551' => 8,
        '0635' => 7,
        '0552' => 7,
        '0554' => 7,
        '0553' => 7,
        '0556' => 7,
        '0555' => 7,
        '0557' => 7,
        '0558' => 7,
        '0559' => 7,
        '0550' => 7,
        '0561' => 7,
        '0562' => 7,
        '0564' => 7,
        '0563' => 7,
        '0566' => 7,
        '0571' => 8,
        '0572' => 7,
        '0574' => 8,
        '0573' => 8,
        '0576' => 8,
        '0575' => 8,
        '0577' => 8,
        '0579' => 8,
        '0578' => 7,
        '0570' => 7,
        '0580' => 7,
        '0591' => 8,
        '0592' => 7,
        '0593' => 7,
        '0594' => 7,
        '0595' => 8,
        '0596' => 7,
        '0597' => 7,
        '0598' => 7,
        '0599' => 7,
        '0662' => 7,
        '0663' => 7,
        '0668' => 7,
        '0660' => 7,
        '0691' => 7,
        '0692' => 7,
        '0711' => 7,
        '0712' => 7,
        '0713' => 7,
        '0714' => 7,
        '0715' => 7,
        '0716' => 7,
        '0717' => 7,
        '0718' => 7,
        '0710' => 7,
        '0719' => 7,
        '0722' => 7,
        '0724' => 7,
        '0728' => 7,
        '0731' => 8,
        '0734' => 7,
        '0735' => 7,
        '0736' => 7,
        '0737' => 7,
        '0738' => 7,
        '0739' => 7,
        '0730' => 7,
        '0743' => 7,
        '0744' => 7,
        '0745' => 7,
        '0746' => 7,
        '0751' => 7,
        '0752' => 7,
        '0753' => 7,
        '0754' => 8,
        '0755' => 8,
        '0756' => 7,
        '0757' => 8,
        '0758' => 7,
        '0759' => 7,
        '0750' => 7,
        '0763' => 7,
        '0762' => 7,
        '0766' => 7,
        '0768' => 7,
        '0769' => 8,
        '0760' => 8,
        '0771' => 7,
        '0772' => 7,
        '0773' => 7,
        '0774' => 7,
        '0775' => 7,
        '0776' => 7,
        '0777' => 7,
        '0778' => 7,
        '0779' => 7,
        '0791' => 8,
        '0770' => 7,
        '0792' => 7,
        '0793' => 7,
        '0794' => 7,
        '0795' => 7,
        '0796' => 7,
        '0797' => 7,
        '0798' => 7,
        '0799' => 7,
        '0701' => 7,
        '0790' => 7,
        '0812' => 7,
        '0813' => 7,
        '0816' => 7,
        '0817' => 7,
        '0818' => 7,
        '0825' => 7,
        '0826' => 7,
        '0827' => 7,
        '0831' => 7,
        '0832' => 7,
        '0833' => 7,
        '0834' => 7,
        '0837' => 7,
        '0835' => 7,
        '0836' => 7,
        '0838' => 7,
        '0839' => 7,
        '0830' => 7,
        '0851' => 8,
        '0854' => 7,
        '0855' => 7,
        '0856' => 7,
        '0857' => 7,
        '0858' => 7,
        '0859' => 7,
        '0871' => 8,
        '0872' => 7,
        '0874' => 7,
        '0873' => 7,
        '0875' => 7,
        '0876' => 7,
        '0877' => 7,
        '0879' => 7,
        '0878' => 7,
        '0870' => 7,
        '0883' => 7,
        '0886' => 7,
        '0887' => 7,
        '0888' => 7,
        '0891' => 7,
        '0892' => 7,
        '0893' => 7,
        '0894' => 7,
        '0895' => 7,
        '0896' => 7,
        '0897' => 7,
        '0898' => 8,
        '0911' => 7,
        '0912' => 7,
        '0913' => 7,
        '0914' => 7,
        '0915' => 7,
        '0916' => 7,
        '0917' => 7,
        '0919' => 7,
        '0931' => 7,
        '0932' => 7,
        '0933' => 7,
        '0934' => 7,
        '0936' => 7,
        '0935' => 7,
        '0937' => 7,
        '0938' => 7,
        '0939' => 7,
        '0930' => 7,
        '0941' => 7,
        '0943' => 7,
        '0951' => 7,
        '0953' => 7,
        '0952' => 7,
        '0955' => 7,
        '0954' => 7,
        '0971' => 7,
        '0972' => 7,
        '0973' => 7,
        '0974' => 7,
        '0976' => 7,
        '0975' => 7,
        '0977' => 7,
        '0979' => 7,
        '0970' => 7,
        '0992' => 7,
        '0991' => 7,
        '0993' => 7,
        '0994' => 7,
        '0995' => 7,
        '0997' => 7,
        '0996' => 7,
        '0998' => 7,
        '0999' => 7,
        '0901' => 7,
        '0990' => 7,
        '0902' => 7,
        '0903' => 7,
        '0906' => 7,
        '0909' => 7,
        '0908' => 7,
    ];

    static public function analysis(string $str):array
    {
        $data = [
            'mobile' => '',
            'tel'    => '',
        ];
        $index = $str[0];
        if ('0' === $index) {
            $phone = self::hasTel($str);
            if ($phone) {
                $str = preg_replace("/[^\d]/", '', str_replace($phone, 'p', $str));
                $data['tel'] = self::formatTel($phone);
            }
            $mobile = self::hasMobile($str);
            $data['mobile'] = $mobile ? self::formatMobile($mobile) : '';
        }

        if ('1' === $index) {
            $mobile = self::hasMobile($str);
            if ($mobile) {
                $data['mobile'] = self::formatMobile($mobile);
                $str = preg_replace("/[^\d]/", '', str_replace($mobile, 'p', $str));
            }
            $phone = self::hasTel($str);
            if ($phone) {
                $data['tel'] = self::formatTel($phone);
            } else {
                $phone = self::hasCorp($str);
                if ($phone) {
                    $data['tel'] = self::formatCorp($phone);
                }
            }
        }

        if (\in_array($index, ['4', '8'])) {
            $phone = self::hasCorp($str);
            if ($phone) {
                $str = preg_replace("/[^\d]/", '', str_replace($phone, 'p', $str));
                $data['tel'] = self::formatCorp($phone);
            }
            $mobile = self::hasMobile($str);
            $data['mobile'] = $mobile ? self::formatMobile($mobile) : '';
        }
        return $data;
    }

    static public function analysisMobile(string $str):string
    {
        $ret = '';
        $phone = self::hasMobile($str);
        if ($phone) {
            $ret = self::formatMobile($phone);
        }
        return $ret;
    }

    static public function analysisTel(string $str):string
    {
        $ret = '';
        $phone = self::hasTel($str);
        if ($phone) {
            $ret = self::formatTel($phone);
        }
        return $ret;
    }

    static public function analysisCorp(string $str):string
    {
        $ret = '';
        $phone = self::hasCorp($str);
        if ($phone) {
            $ret = self::formatCorp($phone);
        }
        return $ret;
    }

    static private function hasMobile(string $str):string
    {
        $pattern = self::$mobilePattern;
        preg_match($pattern, $str, $matches);
        if (isset($matches['phone']) && $matches['phone']) {
            return $matches['phone'];
        }
        return '';
    }

    static private function hasTel(string $str):string
    {
        $pattern02 = self::$telPattern02;
        preg_match($pattern02, $str, $matches02);
        if (isset($matches02['phone']) && $matches02['phone']) {
            return $matches02['phone'];
        }

        $pattern03 = self::$telPattern03;
        preg_match($pattern03, $str, $matches03);
        if (isset($matches03['phone']) && $matches03['phone']) {
            return $matches03['phone'];
        }

        return '';
    }

    static private function hasCorp(string $str):string
    {
        $pattern = self::$corpPattern;
        preg_match($pattern, $str, $matches);
        if (isset($matches['phone']) && $matches['phone']) {
            return $matches['phone'];
        }
        return '';
    }

    static private function formatMobile(string $mobile):string
    {
        return preg_replace("/[^\d]/", '', $mobile);
    }

    static private function formatTel(string $tel):string
    {
        $tel = preg_replace("/[^\d]/", '', $tel);
        $code_n = \in_array($tel[1], [1, 2]) ? 3 : 4;
        $code = substr($tel, 0, $code_n);
        $number_n = self::$telRules[$code] ?? 0;
        if (!\in_array($number_n, [7, 8])) {
            logWarning($code . ' not exist', self::$logKey, 'code not found!');
            return '';
        }
        $number = substr($tel, $code_n, $number_n);
        $ret = $code . '-' . $number;
        $code_number = $code_n + $number_n;

        if (strlen($tel) < $code_number) {
            logWarning('区号' . $code . '下固话是' . $number_n . '位，' . $tel . '不符合规则！', self::$logKey, '固话长度不对!');
            return '';
        }

        if (strlen($tel) > $code_number) {
            $ret .= '-' . substr($tel, $code_number);
        }
        return $ret;
    }

    static private function formatCorp(string $corp):string
    {
        $corp = preg_replace("/[^\d]/", '', $corp);
        return chunk_split(substr($corp, 0, 6), 3, "-") . substr($corp, 6);
    }
}