<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){ // Проверяем, что метод запроса - POST
    header('Content-Type: application/json');
    header('Accept: application/json');
    $_POST = json_decode(file_get_contents('php://input'), true);
    $jsonFilePath = 'data.json';

    function getData($query) {
        global $jsonFilePath;

        // Загрузка JSON-файла
        $jsonData = file_get_contents($jsonFilePath);

        // Преобразование JSON-данных в массив
        $data = json_decode($jsonData, true);

        // Проверка наличия ключа в запросе
        if (isset($data[$query])) {
            return $data[$query];
        } else {
            return "not user";
        }
    };
    $nick = $_POST['nick'];
    $result = getData($nick);
    echo json_encode($result);
}
?>
