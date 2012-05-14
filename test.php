<?php
include 'markdown.php';

$data = Markdown(file_get_contents("PHP Markdown Readme.text"));

file_put_contents("README.md",$data);