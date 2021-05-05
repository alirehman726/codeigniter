<?php 

    function pre($data = null)
    {
        echo '<pre>';
        print_r($data);
        exit;
    }
    // function pr($data = null)
    // {
    //     echo '<pre>';
    //     print_r($data);
    //     echo '</pre>';
    // }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

?>