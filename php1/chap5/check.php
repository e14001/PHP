<?php


function check(){

	$errors = array();

	// 名前の入力チェック
	if(!isset($_POST["name"])){
		$errors["name"] = "名前が入力されていません";
	}elseif(mb_strlen($_POST["name"]) == 0){
		$errors["name"] = "名前が入力されていません";
	}elseif(mb_strlen($_POST["name"]) > 20){
		$errors["name"] = "名前は20文字以内で入力してください";
	}
	

// コメントの入力チェック
	if(!isset($_POST["comment"])){
		$errors["comment"] = "コメントが入力されていません";
	}elseif(mb_strlen($_POST["comment"]) == 0){
		$errors["comment"] = "コメントが入力されていません";
	}elseif(mb_strlen($_POST["comment"]) > 400){
		$errors["comment"] = "コメントは400文字以内で入力してください";
	}
	return $errors;
}


