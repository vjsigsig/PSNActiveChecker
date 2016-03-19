<?php

function v()
{
	foreach (func_get_args() as $val) {
		var_dump($val);
	}
}



function ve()
{
	foreach (func_get_args() as $val) {
		v($val);
	}
	exit;
}
