<?php


namespace Kagatan\MikBillAdminAPI;


use GuzzleHttp\Client;

class AdminAPI
{
    private $_token;

    public function __construct($login = '', $pass = '', $host = false)
    {

        $this->client = new Client([
            'base_uri' => $host,
            'cookies'  => true,
            'verify'   => false
        ]);

        if (!$this->checkLoggedIn()) {
            $params = [
                "login"    => $login,
                "password" => md5($pass),
            ];
            $this->authBilling($params);
        }
    }

    public function checkLoggedIn()
    {
        $response = $this->getCountUsers();

        if (isset($response['success'])) {
            return $response['success'];
        }

        return false;
    }

    public function authBilling($params)
    {
        $response = $this->auth($params);
        if (isset($response["data"]['jwt'])) {
            $this->_token = $response["data"]['jwt'];
            return $response;
        }

        return false;
    }

    public function getUser($params)
    {
        return $this->sendRequest('/json/users/getuserdatambp', $params);
    }

    public function getCountUsers()
    {
        return $this->sendRequest('/json/users/getcountfl');
    }

    public function updateUser($params)
    {
        return $this->sendRequest('/extjs/users/updateuser', $params);
    }

    public function doChangeTarifFlex($params)
    {
        return $this->sendRequest('/json/users/dochangetarifflex', $params);
    }

    public function vklUserFlex($params)
    {
        return $this->sendRequest('/json/users/vkluserflex', $params);
    }


    public function auth($params)
    {
        return $this->sendRequest('/extjs/index/auth', $params);
    }

    public function getDevTypesList()
    {
        return $this->sendRequest('/json/users/getdevtypesfulllist');
    }

    public function getUserDevicesByUid($params)
    {
        return $this->sendRequest('/json/users/getuserdevicesbyuid', $params);
    }

    public function addDevType($params)
    {
        return $this->sendRequest('/json/users/adddevtype', $params);
    }

    public function addUserDev($params)
    {
        return $this->sendRequest('/extjs/users/adduserdev', $params);
    }

    public function getUsers($params = [])
    {
        return $this->sendRequest('/json/users/searchflex', $params);
    }

    public function getSettlementsList()
    {
        return $this->sendRequest('/json/users/settlementslist');
    }

    public function getNeighborhoodsList()
    {
        return $this->sendRequest('/json/users/neighborhoodslist');
    }

    public function getLanesList()
    {
        return $this->sendRequest('/json/users/getlanesneighborhoods');
    }

    public function getPacketsList()
    {
        return $this->sendRequest('/json/tarif/gettarifsfl');
    }

    public function addSector($params)
    {
        return $this->sendRequest('/json/options/sectoraddflex', $params);
    }

    public function setFreezeUser($params)
    {
        return $this->sendRequest('/json/users/dofreezeuserfl', $params);
    }

    public function setPersonalServiceUser($params)
    {
        return $this->sendRequest('/json/users/setpersonalserviceuser', $params);
    }

    public function editSector($params)
    {
        return $this->sendRequest('/json/options/sectoreditflex', $params);
    }

    public function getSectorList()
    {
        return $this->sendRequest('/json/users/sectorlistflex');
    }

    public function getSwitchList()
    {
        return $this->sendRequest('/json/users/switchlistflex');
    }

    public function editSettlement($params)
    {
        return $this->sendRequest('/json/options/editsettlement', $params);
    }

    public function addSettlement($params)
    {
        return $this->sendRequest('/json/options/addsettlement', $params);
    }

    public function createAbonent($params)
    {
        return $this->sendRequest('/extjs/users/createabonent', $params);
    }

    public function deleteHouse($houseId)
    {
        $params = [
            "houseid" => $houseId
        ];

        return $this->sendRequest('/json/options/delhouseflex', $params);
    }

    public function addHouse($params)
    {
        return $this->sendRequest('/json/options/addhouseflex', $params);
    }

    public function editHouse($params)
    {
        return $this->sendRequest('/json/options/edithouselaneflex', $params);
    }

    public function addNeighborhood($params)
    {
        return $this->sendRequest('/json/options/addneighborhood', $params);
    }

    public function editNeighborhood($params)
    {
        return $this->sendRequest('/json/options/editneighborhood', $params);
    }

    public function addSwitchType()
    {
        return $this->sendRequest('/json/options/addswitchtypeflex');
    }

    public function createStickyNotesUser($params)
    {
        return $this->sendRequest('/extjs/users/createstickynotesuser', $params);
    }

    public function editSwitchType($params)
    {
        return $this->sendRequest('/json/options/editswithchtypeflex', $params);
    }

    public function delSwitchType($params)
    {
        return $this->sendRequest('/json/options/delswitchtypeflex', $params);
    }

    public function addSwitch()
    {
        return $this->sendRequest('/json/options/addswitchflex');
    }

    public function editSwitch($params)
    {
        return $this->sendRequest('/json/options/editswitchflex', $params);
    }

    public function delSwitch($params)
    {
        return $this->sendRequest('/json/options/delswitchflex', $params);
    }

    public function addLane($params)
    {
        return $this->sendRequest('/json/options/addlanesflex', $params);
    }

    public function editLane($params)
    {
        return $this->sendRequest('/json/options/editlaneflex', $params);
    }

    public function addPacket($params)
    {
        return $this->sendRequest('/json/tarif/addtarifflex', $params);
    }

    public function editPacket($params)
    {
        return $this->sendRequest('/json/tarif/updatetariffl', $params);
    }

    public function getSwitchTypeList()
    {
        return $this->sendRequest('/json/options/switchtypelistflex');
    }

    public function getUsersGroupsList()
    {
        return $this->sendRequest('/json/options/usersgroupslist');
    }

    public function createUsersGroup($params)
    {
        return $this->sendRequest('/json/options/setusersgroup', $params);
    }

    public function getUsersHousesFullList()
    {
        return $this->sendRequest('/json/users/housesfulllist');
    }

    public function payment($params)
    {
        return $this->sendRequest('/json/users/paymentdoflex', $params);
    }

    /**
     * История платежей по абоненту
     *
     * @param $params
     * @return bool|mixed
     */
    public function getUsersHistoryPayments($params)
    {
        return $this->sendRequest('/json/users/statpaymfl', $params);
    }

    public function getSystemOptions()
    {
        return $this->sendRequest('/extjs/users/getsystemoptions');
    }

    /**
     * Получить краткую историю по абоненту. Old
     *
     * @param $params
     * @return bool|mixed
     */
    public function getUserCanvasStat($params)
    {
        return $this->sendRequest('/json/users/getusercanvasstat', $params);
    }

    /**
     * Выкинуть абонента
     *
     * @param $params
     * @return bool|mixed
     */
    public function userKickOnline($params)
    {
        return $this->sendRequest('/json/users/userkickfl', $params);
    }

    public function getUserShortHistory($params)
    {
        return $this->sendRequest('/extjs/users/usershorthistory', $params);
    }


    public function consoleMe($params)
    {
        return $this->sendRequest('/json/options/consolme', $params);
    }

    private function sendRequest($uri, $params = [])
    {
        $res = $this->client->request('POST', $uri, [
            'form_params' => $params
        ]);

        if ($res->getStatusCode() == 200) { // 200 OK
            return json_decode($res->getBody()->getContents(), true);
        }

        return false;
    }
}