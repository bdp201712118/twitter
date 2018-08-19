<html>
<body>
    <h3>XML file download</h3>
</body>
</html>
<?php
// $users_array = array(
//     "users" => array(
//         array(
//             "id" => 1,
//             )
//         ),
//         array(
//             "id" => 2,
//         ),
//         array(
//             "id" => 3,
//         ),
// );

$users_array = array("Volvo", "BMW", "Toyota");

//function defination to convert array to xml
function array_to_xml($array, &$xml_user_info) {
    $key= "follower";
    foreach($array as $val) {
        $xml_user_info->addChild("$key",htmlspecialchars("$val"));
    }
    // foreach($array as $key => $value) {
    //     if(is_array($value)) {
    //         if(!is_numeric($key)){
    //             $subnode = $xml_user_info->addChild("$key");
    //             array_to_xml($value, $subnode);
    //         }else{
    //             $subnode = $xml_user_info->addChild("item$key");
    //             array_to_xml($value, $subnode);
    //         }
    //     }else {
    //         $xml_user_info->addChild("$key",htmlspecialchars("$value"));
    //     }
    // }
}

//creating object of SimpleXMLElement
$xml_user_info = new SimpleXMLElement("<?xml version=\"1.0\"?><user_info></user_info>");

//function call to convert array to xml
$key= "follower";
    foreach($users_array as $val) {
        $xml_user_info->addChild("$key",htmlspecialchars("$val"));
    }

//saving generated xml file
$xml_file = $xml_user_info->asXML('users.xml');

//success and error message based on xml creation
if($xml_file){
    echo 'XML file have been generated successfully.';
}else{
    echo 'XML file generation error.';
}
?>