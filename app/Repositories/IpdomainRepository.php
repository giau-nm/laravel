<?php

namespace App\Repositories;

use App\Models\Config;
use InfyOm\Generator\Common\BaseRepository;
use Illuminate\Support\Facades\DB;
use Excel;
use App\Http\Validators\DeviceValidator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Repositories\AppRepository;
use Carbon\Carbon;

class IpdomainRepository extends BaseRepository
{
    use AppRepository;

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Config::class;
    }

    private $listDNS = [
        // "209.244.0.3", "209.244.0.4",
        "64.6.64.6", "64.6.65.6",
        "8.8.8.8", "8.8.4.4",
        "9.9.9.9", "149.112.112.112",
        // "84.200.69.80", "84.200.70.40",
        // "8.26.56.26", "8.20.247.20",
        // "208.67.222.222", "208.67.220.220",
        // "199.85.126.10", "199.85.127.10",
        // "81.218.119.11", "209.88.198.133",
        // "195.46.39.39", "195.46.39.40",
        // "69.195.152.204", "23.94.60.240",
        // "208.76.50.50", "208.76.51.51",
        // "216.146.35.35", "216.146.36.36",
        // "37.235.1.174", "37.235.1.177",
        // "198.101.242.72", "23.253.163.53",
        // "77.88.8.8", "77.88.8.1",
        // "91.239.100.100", "89.233.43.71",
        // "74.82.42.42", 
        // "109.69.8.51",
        // "156.154.70.1", "156.154.71.1",
        "1.1.1.1", "1.0.0.1",
        // "45.77.165.194",
        // "185.228.168.9", "185.228.169.9"
    ];

    private $listHostNotCheck = [
        'google.com'
    ];


    public function checkSecurity($request)
    {
        $ip = $request->ip;
        $url = $request->url;

        if (is_null($ip) || is_null($url)) return ['status' => STATUS_ERROR, 'is_security' => false];

        $url = parse_url($url);

        if ($this->isInListHostNotCheck($url)) return ['status' => STATUS_NOT_CHECK, 'is_security' => true];

        return ['status' => STATUS_SUCCESS, 'is_security' => $this->checkIpByHost($url['host'], $ip)];
    }

    private function isInListHostNotCheck($url)
    {
        foreach ($this->listHostNotCheck as $_key => $host) {
            if (strpos($url['host'], $host) !== false) {
                return true;
            }
        }
        return false;
    }

    private function checkIpByHost($host, $ipCheck)
    {
        foreach ($this->listDNS as $_key => $dns) {
            $output = [];
            $retval = 0;
            exec("nslookup $host $dns",$output[],$retval);

            $listCurrentIp = [];
            $output = $output[0];
            foreach ($output as $_key => $value) {
                $ip = $this->findIpFromStr($value);
                if (is_null($ip)) continue;
                $listCurrentIp[] = $ip;
            }
            if ($this->checkIpInListIp($listCurrentIp, $ipCheck)) return true;
        }

        return false;
    }

    private function findIpFromStr($str, $textbefore = 'Address')
    {
        $length = strlen($str);
        $lengthTextBf = strlen($textbefore);
        if ($length < ($lengthTextBf + 8)) return null;
        if (substr($str, 0, $lengthTextBf) != $textbefore) return null;
        $ip = substr($str, ($lengthTextBf + 2), ($length - $lengthTextBf - 2));

        return explode('#', $ip)[0];
    }

    function checkIpInListIp($listIp, $ip)
    {
        foreach ($listIp as $_key => $currentIp) {
            if ($currentIp == $ip) return true;

            if (strlen($currentIp) > 15 && strlen($ip) > 15) {
                $partCIp = explode(':', $currentIp);
                $partIp = explode(':', $ip);

                if ($partIp[0] == $partCIp[0] && $partIp[1] == $partCIp[1]) return true;
            }
        }
        return false;
    }
}
