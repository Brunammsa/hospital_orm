<?php

$data = DateTimeImmutable::createFromFormat('Y-m-d', '1993-06-09');
var_dump($data);

$novaDataAs2130 = $data->setTime(21,30);
var_dump($data);
var_dump($novaDataAs2130);