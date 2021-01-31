<?php

Route::apiResource('/class','Api\ClassController');
Route::apiResource('/subject','Api\SubjectController');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
